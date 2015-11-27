<?php

namespace OVH\Http\Controllers;

use Illuminate\Http\Request;

use OVH\Http\Requests;
use OVH\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function login(Request $request)
    {
        if ($request->user()) {
            return redirect('dashboard');
        }

        return view('login');
    }
}
