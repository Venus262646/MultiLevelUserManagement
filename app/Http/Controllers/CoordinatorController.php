<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CoordinatorController extends Controller
{

  public function __construct()
  {
    
  }

  public function index() {
    if(!Auth::user() || Auth::user()->level != "Coordinator")
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

  public function createNewSeccional() {

  }

  public function create(Request $request) {
    if(!Auth::user() || !(Auth::user()->level === "SuperAdmin" || Auth::user()->level === "Admin"))
      return back()->withInput($request->input());
    else {
      $inputs = $request->all();
      $validator = Validator::make($inputs, [
        'username' => 'required|unique:users|min:10',
        'password' => 'required:min:8',
        'first_name' => 'required',
        'second_name' => 'required',
        'father_name' => 'required',
        'mother_name' => 'required',
        'phone_number' => 'required|unique:users',
        'phone_number_2' => 'nullable',
        'email' => 'required|unique:users',
        'level' => 'required',
        'parent_id' => 'required',
        'user_id' => 'nullable',
        'elector_key'=> 'nullable',
        'state_id' => 'nullable',
        'section_id' => 'nullable',
        'town_id' => 'nullable',
        'townhall_id' => 'nullable',
        'colonia_id' => 'nullable',
        'street' => 'nullable',
        'exterior_no' => 'nullable',
        'interior_no' => 'nullable',
        'postal_code_id'=> 'nullable',
        'scholarship' => 'nullable',
        'gender' => 'nullable',
        'facebook_link' => 'nullable',
        'twitter_link' => 'nullable',
        'instagram_link' => 'nullable',
        'assigned_state_id' => 'nullable',
        'tipo' => 'nullable',
        'assigned_zone' => 'nullable',
        'assigned_electoral_sections' => 'nullable',
        'district' => 'nullable',
        'verified' => 'nullable',
        'assigned_sectional' => 'nullable',
        'geo_data' => 'nullable',
        'age' => 'nullable',
        'curp' => 'nullable',
      ]);
      
      if ($validator->fails()) {
        dd($validator->errors());
        return back()
          ->withErrors($validator->errors())
          ->withInput($request->input());
      }

      $validated = $validator->validated();
      $validated['password'] = Hash::make($validated['password']);
      $user = User::create($validated);
      $user->save();
      $validated['user_id'] = $user->id;
      $user_detail = UserDetail::create($validated);
      $user_detail->save();
      return redirect('/dashboard');
    }
  }

}
?>