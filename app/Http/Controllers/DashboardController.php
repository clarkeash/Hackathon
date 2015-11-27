<?php

namespace OVH\Http\Controllers;

use Illuminate\Http\Request;

use OVH\Category;
use OVH\Http\Requests;
use OVH\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(auth()->user()->type == "admin")
        {
            $cats = Category::all();

            return view('admin.dashboard')->with(compact('cats'));
        }
        return view('dashboard');
    }
}
