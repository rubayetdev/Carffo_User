<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function logging(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $hased = env('ADMIN_PASSWORD');

        if ($email == env('ADMIN_EMAIL') && Hash::check($password, $hased)) {
            session(['is_admin_authenticated' => true]);
            return redirect()->route('dashboard');
        }
    }

    public function welcome()
    {
        return view('admin.index');
    }

    public function logout()
    {
        session()->forget('is_admin_authenticated');

        return redirect()->route('loginPage');
    }
}
