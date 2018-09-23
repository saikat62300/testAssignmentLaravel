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

class DashboardController extends Controller
{
    public function index(Request $request) {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('dashboard.index');
    }
}
