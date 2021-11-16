<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller {


	public function __construct() {
	}

	public function index() {
		if ( ! Auth::user() || Auth::user()->level != 'Admin' ) {
			return redirect( '/dashboard' );
		}

		$page_title       = 'Dashboard';
		$page_description = 'Some description for the page';
		$logo             = 'images/logo.png';
		$logoText         = 'images/logo-text.png';
		$active           = 'active';
		$event_class      = 'schedule-event';
		$button_class     = 'btn-primary';
		$action           = 'dashboard_1';

		return view( 'admin.dashboard', compact( 'page_title', 'page_description', 'action', 'logo', 'logoText', 'active', 'event_class', 'button_class' ) );
	}

	public function createNewCoordinador( $parent_id = 0, $isCreate = 1 ) {

        $weight = config('dz.public.weight');

		if ( ! Auth::user() || $weight[Auth::user()->level] > $weight['Admin'] ) {
			return redirect( '/dashboard' );
		}
		if ( $parent_id === 0 ) {
			$parent_id = Auth::user()->id;
		}

		$level = "Coordinador";

		$states        = State::all();
		$auto_password = Str::random( 8 );

		$page_title       = $isCreate ? 'Create New ' . $level : 'Edit ' . $level;
		$page_description = 'Some description for the page';

		$action = 'create_new_coordinador';

        $u_user = null;
        if(!$isCreate) {
            $u_user = User::find($parent_id);
        }

		return view( 'admin.createNewCoordinador', compact( 'page_title', 'page_description', 'action', 'states', 'auto_password', 'parent_id', 'level', 'u_user' ) );
	}

    public function editCoordinador($user_id) {
        return $this->createNewCoordinador($user_id, 0);
        // $user = User::find($user_id);

        // $page_title       = 'Edit New Coordinador';
		// $page_description = 'Some description for the page';

		// $action = 'edit_coordinador';

        // $states        = State::all();
		// $auto_password = Str::random( 8 );

        // return view('admin.editCoordinador', compact( 'page_title', 'page_description', 'action', 'states', 'auto_password', 'user' ));
    }

	public function create( Request $request ) {
		if ( ! Auth::user() || Auth::user()->level != 'SuperAdmin' ) {
			return back()->withInput( $request->input() );
		} else {
			$inputs    = $request->all();
			$validator = Validator::make(
				$inputs,
				array(
					'username'       => 'required|unique:users|min:10',
					'password'       => 'required:min:8',
					'first_name'     => 'required',
					'second_name'    => 'required',
					'father_name'    => 'required',
					'mother_name'    => 'required',
					'phone_number'   => 'required|unique:users',
					'phone_number_2' => 'nullable',
					'email'          => 'required|unique:users',
					'level'          => 'required',
					'parent_id'      => 'required'
				)
			);

			if ( $validator->fails() ) {
				return back()
				->withErrors( $validator->errors() )
				->withInput( $request->input() );
			}

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
			//$avatar_url = time() . '.' . $request->image->extension();
			//$request->image->move( public_path( 'images/avatar' ), $avatar_url );

			$validated             = $validator->validated();
			$validated['password'] = Hash::make( $validated['password'] );
			$user                  = User::create( $validated );
			$user->avatar_url      = $avatar_url;
			$user->email_verified_at     = now();
			$user->save();
			return redirect( '/superadmin/' );

		}
	}

    public function edit( $user_id, Request $request ) {
		if ( ! Auth::user() || Auth::user()->level != 'SuperAdmin' ) {
			return back()->withInput( $request->input() );
		} else {
			$inputs    = $request->all();
			$validator = Validator::make(
				$inputs,
				array(
					// 'username'       => 'required|unique:users|min:10',
					// 'username'       => 'required|min:10',
					// 'password'       => 'required:min:8',
					'first_name'     => 'required',
					'second_name'    => 'required',
					'father_name'    => 'required',
					'mother_name'    => 'required',
					// 'phone_number'   => 'required|unique:users',
					// 'phone_number'   => 'required',
					'phone_number_2' => 'nullable',
					// 'email'          => 'required',
					// 'email'          => 'required|unique:users',
				)
			);

			if ( $validator->fails() ) {
				return back()
				->withErrors( $validator->errors() )
				->withInput( $request->input() );
			}


			$validated             = $validator->validated();
			// $validated['password'] = Hash::make( $validated['password'] );
			$user                  = User::find( $user_id );
            $user = $user->setRawAttributes($validated);
			$user->email_verified_at     = now();

            if($request->image)
			{
                $avatar_url = time() . '.' . $request->image->extension();
		    	$request->image->move( public_path( 'images/avatar' ), $avatar_url );
                $user->avatar_url      = $avatar_url;
            }

			$user->save();
			return redirect( '/profile/' . $user_id );

		}
	}

}

