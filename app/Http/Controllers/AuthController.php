<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth,
    Cookie,
    Hash,
    Input,
    Lang,
    Redirect,
    Response,
    Route,
    Session,
    URL,
    View;
use Helper;

class AuthController extends Controller {

    /**
     * Login Functionality
     */
    public function login(Request $request) {
       
        if (Auth::check()) {
            return redirect(siteurl('dashboard'));
        }
       
        if ($request->isMethod('post')) {  
            $inputs = [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ];
            $auth = User::authorize($request, $inputs);
            return $auth;
        }

        $data = [
//            'page_scripts' => [VIEW_JS . 'auth/login.js?_=' . FILE_VERSION]
        ];      

        //setCsrfCookie($request->session()->get('_token'));

        return view('auth.login', $data);
    }

    /**
     * Logout Function
     */
    public function getLogout(Request $request) {
        Auth::logout();
//        $request->session()->reflash();
        return redirect('login');
    }

}

