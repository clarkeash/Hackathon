<?php

namespace OVH\Http\Controllers;

use Illuminate\Http\Request;

use OVH\Http\Requests;
use OVH\Http\Controllers\Controller;
use OVH\Http\Requests\LoginRequest;
use OVH\User;

class DashboardController extends Controller
{
    public function showLogin(Request $request)
    {
        if ($request->user()) {
            return redirect('dashboard');
        }

        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $account = User::where('email', $request->input('email'))
            ->first();

        if (is_null($account)) {
            return redirect()
                ->back()
                ->withErrors('Email does not exist', 'email');
        }

        auth()->loginUsingId($account->id);

        return redirect('dashboard');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
