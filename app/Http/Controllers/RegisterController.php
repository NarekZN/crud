<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
// {
//     public function save(Request $request){

//         if(Auth::check()){
//             return redirect(route("user.private"));
//         }
//         $validateFields = $request->validate([
//             "name"=>"required|min:3|max:20",
//             "email"=>"required|email",
//             "password"=>"required|min:6",
//         ]);

//         $user = User::create($validateFields);

//         if($user){
//             Auth::login($user);
//             return redirect(route("user.private"));
//         }
//         return redirect(route("user.login"))->withErrors([
//             "formError"=>"Oops! Something went wrong"
//         ]);
//     }
}
