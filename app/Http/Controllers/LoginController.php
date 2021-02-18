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
        return response()->json(array('messages' => 'Thanh cong'));
      }
    }
    else{
      return response()->json(array('messages' => 'Dang nhap that bai'));
    }
  }
  
  public function register(Request $request){
    $user = new User();
    $user->name = $request->username;
    $user->email = $request->email;
    $user->password = hash('md5', $request->password);
    $user->save();
  }
}