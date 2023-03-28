<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    function viewLogin () {
        if (Auth::check()) {
            return redirect()->route('admin.cv_settings');
        }

        return view('pages.admin.login.login');
    }

    function handleLogin (Request $request) {
        $credentials = $request->only(['email', 'password']);

        $rules = [
            'email' => ['bail','required', 'email'],
            'password' => ['required'],
        ];

        $messages = [
            'email.required' => 'IEM1',
            'email.email' => 'IEM2',
            'password.required' => 'IEM1',
        ];

        $validator = Validator::make($credentials, $rules, $messages);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->onlyInput('email');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('admin.cv_settings');
        }
 
        return back()->withErrors([
            'email' => 'IEM3',
        ])->onlyInput('email');
    }
}
