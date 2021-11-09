<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class CallCenterController extends Controller {

	private $users_tree;
	private $users;
	private $users_count = array(
		'SuperAdmin'  => 0,
		'Admin'       => 0,
		'Coordinador' => 0,
		'Seccional'   => 0,
		'Movilizador' => 0,
		'Familiar'    => 0,
	);

	public function __construct() {
	}

	public function index() {
		if ( ! Auth::user() || Auth::user()->level != 'SuperAdmin' ) {
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

		$user    = Auth::user();
		$directs = User::where( 'parent_id', $user->id )->get();

		$this->users      = User::all();
		$this->users_tree = collect( array() );
		// $this->constructTree( Auth::user()->id, 0 );
		if(Auth::user()->level == "Call Center") {
			$superadmin_id = User::where('level', 'SuperAdmin')->get()->first()->level;
			$this->constructTree( $superadmin_id, 0 );
			$this->removeAdmins();
		} else 
			$this->constructTree( Auth::user()->id, 0 );
		$users_count = $this->users_count;

		return view( 'superadmin.dashboard', compact( 'page_title', 'page_description', 'action', 'logo', 'logoText', 'active', 'event_class', 'button_class', 'directs', 'users_count' ) );
	}

	public function getCreateForm() {
		if ( ! Auth::user() || ( Auth::user()->level != 'SuperAdmin' && Auth::user()->level != 'Admin')) {
			return redirect( '/dashboard' );
		}

		$page_title       = 'Create New Call Center';
		$page_description = 'Some description for the page';

		$action = 'create_new_call_center';

		$auto_password = Str::random( 8 );

		return view( 'callcenter.createNewCallCenter', compact( 'page_title', 'page_description', 'action', 'auto_password' ) );
	}

  public function create( Request $request ) {
		if ( ! Auth::user() || (Auth::user()->level != 'SuperAdmin' && Auth::user()->level != 'Admin')) {
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
					'parent_id'      => 'required',
				)
			);

			if ( $validator->fails() ) {
				return back()
				->withErrors( $validator->errors() )
				->withInput( $request->input() );
			}

			$avatar_url = time() . '.' . $request->image->extension();

			$request->image->move( public_path( 'images/avatar' ), $avatar_url );

			$validated             = $validator->validated();
			$validated['password'] = Hash::make( $validated['password'] );
			$user                  = User::create( $validated );
			$user->avatar_url      = $avatar_url;
      $user->email_verified_at     = now();
			$user->save();
      
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
			return redirect( '/dashboard' );

		}
	}


	/**
   * Construct sorted users tree
   *
   *
   */
	private function constructTree( $parent, $depth ) {
		$children = $this->users->filter(
			function ( $item ) use ( $parent ) {
				return $item->parent_id == $parent;
			}
		);

		$children->each(
			function ( $item ) use ( $depth ) {
				$item->depth = $depth;
				$this->users_tree->push( $item );
				$this->users_count[ $item->level ] = $this->users_count[ $item->level ] + 1;
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

}

