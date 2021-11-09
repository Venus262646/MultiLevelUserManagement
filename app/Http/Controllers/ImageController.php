<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CoordinatorController extends Controller {
	public function __construct() {
	}
	/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
	public function imageUploadPost( Request $request ) {
		$request->validate(
			array(
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			)
		);

		$imageName = time() . '.' . $request->image->extension();

		$request->image->move( public_path( 'images/avatar' ), $imageName );

		/* Store $imageName name in DATABASE from HERE */

		return $imageName;
	}
}

