<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Estado;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UtilsController extends Controller
{

  public function __construct()
  {
    
  }

  public function getSectionFromEstado(Request $request) {
    $sections = Section::where('estado_id', $request->estado_id)->get();
    echo json_encode($sections);
  }

}
?>