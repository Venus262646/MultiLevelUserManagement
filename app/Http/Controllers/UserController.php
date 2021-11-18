<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Colonia;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\UserDetail;
use App\Models\Zipcode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;
use Twilio\Rest\Client;

class UserController extends Controller {
	private $users_tree;
	private $users;
	private $users_count = array(
		'SuperAdmin'  => 0,
		'Admin'       => 0,
		'Coordinador' => 0,
		'Seccional'   => 0,
		'Movilizador' => 0,
		'Familiar'    => 0,
		'Call Center' => 0,
		'sum' 				=> 0,
		'this_month' 	=> 0,
	);

	public function __construct() {
	}

	public function getLoginForm() {

		$page_title       = 'Login';
		$page_description = 'Login Page';

		$action = __FUNCTION__;

		return view( 'page.login', compact( 'page_title', 'page_description', 'action' ) );
	}

	public function login( Request $request ) {

		$credentials = $request->only( 'email', 'password' );

		if ( Auth::attempt( $credentials ) ) {
			return redirect( 'dashboard' );
		} else {
			return back()->withErrors(["error"=> "Invalid email or password"])->withInput($request->input());
		}
	}

	public function userList( Request $request ) {
		$search_term = '%' . $request->input( 'search_term', '' ) . '%';
		if ( ! Auth::user() || Auth::user()->level === 'Familiar' ) {
			redirect( '/login' );
		}

		if ( $search_term == '%%' ) {
			$this->users      = User::where('level', '!=' , 'Call Center')->get();
			$this->users_tree = collect( array() );
			if(Auth::user()->level == "Call Center") {
				$superadmin_id = User::where('level', 'SuperAdmin')->get()->first()->level;
				$this->treeUsers( $superadmin_id, 0 );
				$this->removeAdmins();
			} else
				$users = $this->treeUsers( Auth::user()->id, 0);
			$users = $this->users_tree;
		} else {
			$user_lists = User::where( 'username', 'LIKE', $search_term )
				  ->orWhere( 'first_name', 'LIKE', $search_term )
				  ->orWhere( 'second_name', 'LIKE', $search_term )
				  ->orWhere( 'father_name', 'LIKE', $search_term )
				  ->orWhere( 'mother_name', 'LIKE', $search_term )
				  ->get();
			$this->users      = $user_lists;
			$this->users_tree = collect( array() );
			if(Auth::user()->level == "Call Center") {
				$superadmin_id = User::where('level', 'SuperAdmin')->get()->first()->level;
				$this->treeUsers( $superadmin_id, 0 );
				$this->removeAdmins();
			} else
			$this->treeUsers( Auth::user()->id, 0 );
			$users = $this->users_tree;
		}

		$search_term = $request->input( 'search_term', '' );

		$page_title       = 'Usuarios';
		$page_description = 'Some description for the page';

		$action = 'uc_nestable';

        // foreach ($users as $index => $user) {
        //     if($user['parentId'] == Auth::user()->id) {
        //         $user['parentId'] = null;
        //     }
        // }
        $users = $users->map(function($item, $key) {
            if($item['parentId'] == Auth::user()->id) {
                $item['parentId'] = null;
                return $item;
            }
            else return $item;
        });

		return view( 'user.list', compact( 'page_title', 'page_description', 'action', 'users', 'search_term' ) );
	}

	public function dashboard() {
		if ( ! Auth::user() ) {
			return redirect( 'login' );
		}

		$page_title       = 'Dashboard';
		$page_description = 'Some description for the page';
		$logo             = 'images/logo.png';
		$logoText         = 'images/logo-text.png';
		$active           = 'active';
		$event_class      = 'schedule-event';
		$button_class     = 'btn-primary';
		$action           = 'dashboard_1';

		$user    = Auth::user();
		$directs = User::where( 'parent_id', $user->id )->get();

		$current_time_array = Carbon::now()->toArray();
		$start_of_this_month = $current_time_array['year']."-".$current_time_array['month']."-01";
		$directs_this_month_count = User::where( 'parent_id', $user->id )->where('created_at', '>', $start_of_this_month)->get()->count();

		$this->users      = User::all();
		$this->users_tree = collect( array() );
		$this->constructTree( Auth::user()->id, 0 );
		$users_count = $this->users_count;

		$chart_users = ['0' => 0];
		if(Auth::user()->level == 'SuperAdmin')
			$chart_users['Admin'] = $users_count['Admin'];
		if(Auth::user()->level == 'SuperAdmin' || Auth::user()->level == "Admin")
			$chart_users['Call Center'] = $users_count['Call Center'];
		if(Auth::user()->level == 'SuperAdmin' || Auth::user()->level == "Admin" || Auth::user()->level == "Call Center")
			$chart_users['Coordinador'] = $users_count['Coordinador'];
		if(Auth::user()->level == 'SuperAdmin' || Auth::user()->level == "Admin" || Auth::user()->level == "Call Center" || Auth::user()->level == "Coordinador")
			$chart_users['Seccional'] = $users_count['Seccional'];
		if(Auth::user()->level == 'SuperAdmin' || Auth::user()->level == "Admin" || Auth::user()->level == "Call Center" || Auth::user()->level == "Coordinador" || Auth::user()->level == "Seccional")
			$chart_users['Movilizador'] = $users_count['Movilizador'];
		if(Auth::user()->level == 'SuperAdmin' || Auth::user()->level == "Admin" || Auth::user()->level == "Call Center" || Auth::user()->level == "Coordinador" || Auth::user()->level == "Seccional" || Auth::user()->level == "Movilizador")
			$chart_users['Familiar'] = $users_count['Familiar'];

		// dd($chart_users, $users_count);
		return view( 'user.dashboard', compact( 'page_title', 'page_description', 'action', 'logo', 'logoText', 'active', 'event_class', 'button_class', 'directs', 'directs_this_month_count', 'users_count', 'chart_users' ) );
		// switch(Auth::user()->level) {
		//   case "SuperAdmin":
		//     return redirect('superadmin/');
		//     break;
		//   case "Admin":
		//     return redirect('admin/');
		//     break;
		//   case "Coordinator":
		//     return redirect('coordinator/');
		//     break;
		//   case "Seccional":
		//     return redirect('seccional/');
		//     break;
		//   case "Movilizador":
		//     return redirect('movilizador/');
		//     break;
		//   case "Familiar":
		//     return redirect('familiar/');
		//     break;
		//   default :
		//     return redirect("/login");
		//     break;
		// }
	}

	public function checkDuplicate( Request $request ) {
		$user = User::where( 'email', $request->email )->get()->first();
		if ( ! isset( $user ) ) {
			echo json_encode( 'email_duplicated' );
			return;
		}
		echo json_encode( 'success' );
	}

	public function logout() {
		Auth::logout();
		return redirect( 'login' );
	}

	public function createNewUser( $level, $parent_id = 0 ) {
		// if ( ! Auth::user() ) {
		// 	return redirect( '/login' );
		// }
		// if ( $parent_id === 0 ) {
		// 	$parent_id = Auth::user()->id;
		// }

		// $states        = State::all();
		// $auto_password = Str::random( 8 );

		// $page_title       = 'Create New ' . $level;
		// $page_description = 'Some description for the page';

		// $action = 'create_new_coordinator';

		// return view( 'user.createNewUser', compact( 'page_title', 'page_description', 'action', 'states', 'auto_password', 'parent_id', 'level' ) );
        if($parent_id === 0) $parent_id = Auth::user()->id;
        $level = User::find($parent_id)->level;

        $weight = config('dz.public.weight');
        if(!Auth::user() || $weight[$level] < $weight[Auth::user()->level]) return redirect('/login');


        switch ($weight[$level]) {
            case 1:
                return redirect('/superadmin/createNewAdmin');
                break;
            case 2:
                return redirect('/admin/createNewCoordinador/' . $parent_id);
                break;
            case 3:
                return redirect('/coordinador/createNewSeccional/' . $parent_id);
                break;
            case 4:
                return redirect('/seccional/createNewMovilizador/' . $parent_id);
                break;
            case 5:
                return redirect('/movilizador/createNewFamiliar/' . $parent_id);
                break;
            default:
                return back();
                break;
        }
	}

	public function editUser( $user_id ) {
		// if ( ! Auth::user() ) {
		// 	return redirect( '/login' );
		// }

		// $states        = State::all();
		// $u_user				 = User::where('id', $user_id)->get()->first();
		// $parent_id		 = $u_user->parent_id;
		// $auto_password = "Can't be able to change";
		// $level = $u_user->level;

		// $page_title       = 'Edit ';
		// $page_description = 'Some description for the page';

		// $action = 'create_new_coordinator';

		// return view( 'user.createNewUser', compact( 'page_title', 'page_description', 'action', 'states', 'auto_password', 'parent_id', 'level', 'u_user' ) );
        if($user_id === 0) $user_id = Auth::user()->id;
        $level = User::find($user_id)->level;

        $weight = config('dz.public.weight');
        if(!Auth::user() || $weight[$level] < $weight[Auth::user()->level]) return redirect('/login');

        switch ($weight[$level]) {
            case 2:
                return redirect('/superadmin/editAdmin/' . $user_id);
                break;
            case 3:
                return redirect('/admin/editCoordinador/' . $user_id);
                break;
            case 4:
                return redirect('/coordinador/editSeccional/' . $user_id);
                break;
            case 5:
                return redirect('/seccional/editMovilizador/' . $user_id);
                break;
            case 6:
                return redirect('/movilizador/editFamiliar/' . $user_id);
                break;
            default:
                return back();
                break;
        }
	}

	public function create( Request $request ) {

		$weight = array(
			'SuperAdmin'  => 1,
			'Admin'       => 2,
			'Coordinador' => 3,
			'Seccional'   => 4,
			'Movilizador' => 5,
			'Familiar'    => 6,
		);

		if ( ! Auth::user() || ! $request->input( 'level' ) || ! ( $weight[ Auth::user()->level ] < $weight[ $request->input( 'level' ) ] ) ) {
			return back()->withInput( $request->input() );
		} else {
			$inputs    = $request->all();
			$validator = Validator::make(
				$inputs,
				array(
					'username'                    => 'required|unique:users|min:10',
					'password'                    => 'required:min:8',
					'first_name'                  => 'required',
					'second_name'                 => 'required',
					'father_name'                 => 'required',
					'mother_name'                 => 'required',
					'phone_number'                => 'required|unique:users',
					'phone_number_2'              => 'nullable',
					'email'                       => 'required|unique:users',
					'level'                       => 'required',
					'parent_id'                   => 'required',
					'user_id'                     => 'nullable',
					'elector_key'                 => 'nullable',
					'state_id'                    => 'nullable',
					'section_id'                  => 'nullable',
					'town_id'                     => 'nullable',
					'townhall_id'                 => 'nullable',
					'colonia_name'								=> 'required',
					'colonia_id'                  => 'nullable',
					'street'                      => 'nullable',
					'exterior_no'                 => 'nullable',
					'interior_no'                 => 'nullable',
					'postal_code_code'						=> 'required',
					'postal_code_id'              => 'nullable',
					'scholarship'                 => 'nullable',
					'gender'                      => 'nullable',
					'facebook_link'               => 'nullable',
					'twitter_link'                => 'nullable',
					'instagram_link'              => 'nullable',
					'assigned_state_id'           => 'nullable',
					'tipo'                        => 'nullable',
					'assigned_zone'               => 'nullable',
					'assigned_electoral_sections' => 'nullable',
					'district'                    => 'nullable',
					'verified'                    => 'nullable',
					'assigned_sectional'          => 'nullable',
					'geo_data'                    => 'nullable',
					'age'                         => 'nullable',
					'curp'                        => 'nullable',
				)
			);

			if ( $validator->fails() ) {
				// dd( $validator->errors() );
				return back()
				->withErrors( $validator->errors() )
				->withInput( $request->input() );
			}
			$validated             = $validator->validated();
			if($validated['colonia_id'] == 0) {
				$new_colonia = new Colonia;
				$new_colonia->section_id = $validated['section_id'];
				$new_colonia->name = $validated['colonia_name'];
				$new_colonia->save();
				$validated['colonia_id'] = $new_colonia->id;

			}
			if($validated['postal_code_id'] == 0) {
				$new_zipcode = new Zipcode();
				$new_zipcode->section_id = $validated['section_id'];
				$new_zipcode->code = $validated['postal_code_code'];
				$new_zipcode->save();
				$validated['postal_code_id'] = $new_zipcode->id;
			}
			$avatar_url = time() . '.' . $request->image->extension();

			$request->image->move( public_path( 'images/avatar' ), $avatar_url );


			$validated['password'] = Hash::make( $validated['password'] );
			$user                  = User::create( $validated );
			$user->avatar_url      = $avatar_url;
			$user->save();
			$validated['user_id'] = $user->id;
			$user_detail          = UserDetail::create( $validated );
			$user_detail->save();

			$from_email = Auth::user()->email;

			Mail::send(
				array( 'text' => 'mail.contact' ),
				array(
					'content'    => 'Your account created',
					'name'       => $user->first_name . '  ' . $user->last_name,
					'from_email' => $from_email,
				),
				function( $message ) use ( $user, $from_email ) {
					$message->to( $user->email, $user->first_name . '  ' . $user->second_name )->subject( 'Your account created' );
					$message->from( $from_email, $user->first_name . '  ' . $user->second_name );
				}
			);

			return redirect( '/dashboard' );
		}
	}

	public function setVerified(Request $request) {

		$userDetail = UserDetail::where('user_id', $request->user_id)->get()->first();
		if(!$userDetail || !Auth::user() || Auth::user()->level != 'Call Center')
			return back()->withInput($request->input());

		$userDetail->verified = $request->verified;
		$userDetail->save();

		return redirect('/profile/'.$request->user_id)
					->withErrors('success', 'Set Verified Successfully!');
	}

	public function profile($user_id = 0) {
		$page_title       = 'Profile';
		$page_description = 'Some description for the page';

		$action = 'app_profile';

		if($user_id == 0)
			$user = Auth::user();
		else
			$user = User::where('id', $user_id)->get()->first();

		return view( 'app.profile', compact( 'page_title', 'page_description', 'action', 'user' ) );
	}

	public function passwordReset( Request $request ) {
		$user = Auth::user();

		if ( $request->input( 'password' ) ) {
			if ( ! Hash::check( $request->input( 'password' ), $user->password ) ) {
				return back()->withErrors( array( 'password' => 'Current Password Does not match our records' ) );
			}
			if ( $request->input( 'new_password' ) ) {
				$user->password = Hash::make( $request->input( 'new_password' ) );
			}
		}

		$user->save();

		return back();
	}

	/**
   * Construct sorted users tree
   *
   *
   */
    private function treeUsers($parent) {
        $children = $this->users->filter(
			function ( $item ) use ( $parent ) {
				return $item->parent_id == $parent;
			}
		);

        $children->each(
            function ($item){
                $cur = array();
                $cur['id'] = $item->id;
                $cur['parentId'] = $item->parent_id ? $item->parent_id : null;
                $cur['avatarUrl']= asset('images/avatar/' . $item->avatar_url);
                $cur['fullName'] = $item->first_name . " " . $item->second_name;
                $cur['levelRole'] = $item->level;

                $date=date_create($item->created_at);
                $cur['createdAt'] = date_format($date,"Y/m/d H:i");
                $this->users_tree->push($cur);
                $this->treeUsers( $item->id, 0);
            }
        );
    }

	private function constructTree( $parent, $depth ) {
		$children = $this->users->filter(
			function ( $item ) use ( $parent ) {
				return $item->parent_id == $parent;
			}
		);

		$children->each(
			function ( $item ) use ( $depth ) {
				$current_time_array = Carbon::now()->toArray();
				$item->depth = $depth;
				$this->users_tree->push( $item );
				$this->users_count[ $item->level ] = $this->users_count[ $item->level ] + 1;
				$this->users_count[ 'sum' ] += 1;
				if($item->created_at > $current_time_array['year']."-".$current_time_array['month']."-01")
					$this->users_count[ 'this_month' ] += 1;
				$this->constructTree( $item->id, $depth + 1 );
			}
		);
	}

	private function removeAdmins() {
		$temp_users_tree = $this->users_tree;
		$this->users_tree = collect(array());
		$temp_users_tree->each(
			function ( $item ) {
				if($item->level != 'SuperAdmin' && $item->level != 'Admin' && $item->level != 'Call Center')
					$this->users_tree->push( $item );
			}
		);
	}

    public function smsVerify(Request $request) {
		$phone_number = $request->phone_number;

        $token = "eb0e9fd2f4b5a722ff68d909ea2d75b8";
		$twilio_sid = "AC824b10f8fc5f9de44d230861aab75d2c";
		$twilio_verify_sid = "VA7e2800317610bbd2ad5d9c38b418f38c";
		$twilio = new Client($twilio_sid, $token);
		$verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create("+1" . $phone_number, "sms");
		if ($verification->valid) {
			echo "success";
		}else{
			echo "failed";
		}
		// print($message->sid);
    }
}

