<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\UserDetail;
use App\Models\Zipcode;
use App\Models\Colonia;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CoordinadorController extends Controller
{

  public function __construct()
  {

  }

  public function index() {
    if(!Auth::user() || Auth::user()->level != "Coordinador")
      return redirect("/dashboard");

    $page_title = 'Dashboard';
    $page_description = 'Some description for the page';
    $logo = "images/logo.png";
    $logoText = "images/logo-text.png";
    $active="active";
    $event_class="schedule-event";
    $button_class="btn-primary";
    $action = "dashboard_1";

    return view('admin.dashboard', compact('page_title', 'page_description','action','logo','logoText','active','event_class','button_class'));
  }

  public function createNewSeccional( $parent_id = 0, $isCreate = 1 ) {

    $weight = config('dz.public.weight');

    if ( ! Auth::user() || $weight[Auth::user()->level] > $weight['Coordinador'] ) {
        return redirect( '/dashboard' );
    }
    if ( $parent_id === 0 ) {
        $parent_id = Auth::user()->id;
    }

    $level = "Seccional";

    $states        = State::all();
    $auto_password = Str::random( 8 );

    $page_title       = $isCreate ? 'Create New ' . $level : 'Edit ' . $level;
    $page_description = 'Some description for the page';

    $action = 'create_new_seccional';

    $u_user = null;
    if(!$isCreate) {
        $u_user = User::find($parent_id);
    }

    return view( 'coordinador.createNewSeccional', compact( 'page_title', 'page_description', 'action', 'states', 'auto_password', 'parent_id', 'level', 'u_user' ) );
}

    public function editSeccional($user_id) {
        $isCreate = 0;
        $parent_id=$user_id;

        $weight = config('dz.public.weight');

        if ( ! Auth::user() || $weight[Auth::user()->level] > $weight['Coordinador'] ) {
            return redirect( '/dashboard' );
        }
        if ( $parent_id === 0 ) {
            $parent_id = Auth::user()->id;
        }

        $level = "Seccional";

        $states        = State::all();
        $auto_password = Str::random( 8 );

        $page_title       = $isCreate ? 'Create New ' . $level : 'Edit ' . $level;
        $page_description = 'Some description for the page';

        $action = 'edit_seccional';

        $u_user = null;
        if(!$isCreate) {
            $u_user = User::find($parent_id);
        }

        return view( 'coordinador.createNewSeccional', compact( 'page_title', 'page_description', 'action', 'states', 'auto_password', 'parent_id', 'level', 'u_user' ) );
    }

  public function create(Request $request) {
    //   return redirect()->to(app('url')->previous() . "#wizard_section_2");
    $weight = config('dz.public.weight');

		if ( ! Auth::user() || ! $request->input( 'level' ) || ! ( $weight[ Auth::user()->level ] < $weight[ $request->input( 'level' ) ] ) ) {
			return back()->withInput( $request->input() );
		} else {
			$inputs    = $request->all();
			$validator = Validator::make(
				$inputs,
				array(
					'username'                    => 'required|unique:users|min:8',
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
			$exist_colonia = Colonia::where('name', $validated['colonia_name'])->get()->first();
			if(!isset($exist_colonia)) {
				$new_colonia = new Colonia;
				$new_colonia->section_id = $validated['section_id'];
				$new_colonia->name = $validated['colonia_name'];
				$new_colonia->save();
				$validated['colonia_id'] = $new_colonia->id;
			} else {
				$validated['colonia_id'] = $exist_colonia->id;
			}
			$exist_zipcode = Zipcode::where('code', $validated['postal_code_code'])->get()->first();
			if(!isset($exist_zipcode)) {
				$new_zipcode = new Zipcode;
				$new_zipcode->section_id = $validated['section_id'];
				$new_zipcode->code = $validated['postal_code_code'];
				$new_zipcode->save();
				$validated['postal_code_id'] = $new_zipcode->id;
			} else {
				$validated['postal_code_id'] = $exist_zipcode->id;
			}

			/*$avatar_url = time() . '.' . $request->image->extension();
			$request->image->move( public_path( 'images/avatar' ), $avatar_url );*/
			$avatar_url = time() . ".jpg";
			$path = 'images/avatar/' . $avatar_url;
			$img = $request->input('photo_data');
			if ($img != null ){
				$img = str_replace('data:image/png;base64,', '', $request->input('photo_data'));
				$img = str_replace('data:image/jpeg;base64,', '', $img );
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				$source = imagecreatefromstring($data);
				$angle = 0;
				$rotate = imagerotate($source, $angle, 0); // if want to rotate the image
				$imageSave = imagejpeg($rotate,$path,100);
				imagedestroy($source);
			}


			$validated['password'] = Hash::make( $validated['password'] );
			$user                  = User::create( $validated );
			$user->avatar_url      = $avatar_url;
			$user->save();
			$validated['user_id'] = $user->id;
			$user_detail          = UserDetail::create( $validated );
			$user_detail->save();

			$from_email = Auth::user()->email;

			// Mail::send(
			// 	array( 'text' => 'mail.contact' ),
			// 	array(
			// 		'content'    => 'Your account created',
			// 		'name'       => $user->first_name . '  ' . $user->last_name,
			// 		'from_email' => $from_email,
			// 	),
			// 	function( $message ) use ( $user, $from_email ) {
			// 		$message->to( $user->email, $user->first_name . '  ' . $user->second_name )->subject( 'Your account created' );
			// 		$message->from( $from_email, $user->first_name . '  ' . $user->second_name );
			// 	}
			// );
            // mail("fernando262646@gmail.com", "My subject", "msg");

			return redirect( '/profile/' . $validated['user_id'] );
    }
  }

  public function edit( $user_id, Request $request ) {
    $weight = config('dz.public.weight');

		if ( ! Auth::user() || ! $request->input( 'level' ) || ! ( $weight[ Auth::user()->level ] < $weight[ $request->input( 'level' ) ] ) ) {
			return back()->withInput( $request->input() );
		} else {
			$inputs    = $request->all();
			$validator = Validator::make(
				$inputs,
				array(
					// 'username'                    => 'required|unique:users|min:8',
					// 'password'                    => 'required:min:8',
					'first_name'                  => 'required',
					'second_name'                 => 'required',
					'father_name'                 => 'required',
					'mother_name'                 => 'required',
					// 'phone_number'                => 'required|unique:users',
					'phone_number_2'              => 'nullable',
					// 'email'                       => 'required|unique:users',
					// 'level'                       => 'required',
					// 'parent_id'                   => 'required',
					// 'user_id'                     => 'nullable',
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
			$exist_colonia = Colonia::where('name', $validated['colonia_name'])->get()->first();
			if(!isset($exist_colonia)) {
				$new_colonia = new Colonia;
				$new_colonia->section_id = $validated['section_id'];
				$new_colonia->name = $validated['colonia_name'];
				$new_colonia->save();
				$validated['colonia_id'] = $new_colonia->id;
			} else {
				$validated['colonia_id'] = $exist_colonia->id;
			}
			$exist_zipcode = Zipcode::where('code', $validated['postal_code_code'])->get()->first();
			if(!isset($exist_zipcode)) {
				$new_zipcode = new Zipcode;
				$new_zipcode->section_id = $validated['section_id'];
				$new_zipcode->code = $validated['postal_code_code'];
				$new_zipcode->save();
				$validated['postal_code_id'] = $new_zipcode->id;
			} else {
				$validated['postal_code_id'] = $exist_zipcode->id;
			}

			// $validated['password'] = Hash::make( $validated['password'] );
			$user                  = User::find( $user_id);

            if($request->image)
			{
                $avatar_url = time() . '.' . $request->image->extension();
		    	$request->image->move( public_path( 'images/avatar' ), $avatar_url );
                $user->avatar_url      = $avatar_url;
            }

            $user->update($validated);

			$user_detail          = UserDetail::find( UserDetail::where("user_id", $user_id)->get()->first()->id );
            $user_detail->update($validated);

			$from_email = Auth::user()->email;

			// Mail::send(
			// 	array( 'text' => 'mail.contact' ),
			// 	array(
			// 		'content'    => 'Your account created',
			// 		'name'       => $user->first_name . '  ' . $user->last_name,
			// 		'from_email' => $from_email,
			// 	),
			// 	function( $message ) use ( $user, $from_email ) {
			// 		$message->to( $user->email, $user->first_name . '  ' . $user->second_name )->subject( 'Your account created' );
			// 		$message->from( $from_email, $user->first_name . '  ' . $user->second_name );
			// 	}
			// );

			return redirect( '/profile/' . $user_id );
    }
  }

}
?>
