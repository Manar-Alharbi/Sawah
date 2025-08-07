<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * عرض صفحة تسجيل دخول المدير
     */
    public function showLoginForm()
    {
        return view('admin.login'); // صفحة Blade: resources/views/admin/login.blade.php
    }

    /**
     * تسجيل دخول المدير
     */
    public function login(Request $request)
    {
        // التحقق من المدخلات
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // تسجيل الدخول باستخدام guard الخاص بالمدير
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        // إذا كانت البيانات خاطئة
        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ]);
    }

    /**
     * تسجيل خروج المدير
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}