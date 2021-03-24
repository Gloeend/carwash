<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function main()
    {
        return redirect(route('orders-admin'));
    }

    public function login(Request $obRequest)
    {
        if (!$obRequest->ajax()) {
            return view('admin.login');
        }
        return ($auth = Auth::attempt([
            'email' => $obRequest->input('email'),
            'password' => $obRequest->input('password'),
        ], $obRequest->rememberMe)) ?
            response()->json(['validationMessage' => 'success']) :
            response()->json([
                'validationMessage' => 'Неправильный логин или пароль', $auth
            ]);
    }
}
