<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller{
  public function login(Request $request){
    $name = $request->username;
    $pass = $request->password;

    $data = User::where('name', '=', $name)->where('password', '=', hash('md5', $pass))->get();
    if(count($data) > 0){
      if($data[0]->name == $name && $data[0]->pass == hash('md5', $pass)){
        return response()->json(array('success' => 1));
      }
    }
    else{
      return response()->json(array('success' => 0));
    }
  }
}