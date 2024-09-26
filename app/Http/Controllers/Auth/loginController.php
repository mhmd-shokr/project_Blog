<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // لعرض نموذج تسجيل الدخول
    public function showLoginForm()
    {
        return view('auth.login'); // تأكد من وجود هذا العرض
    }

    // لمعالجة تسجيل الدخول
    public function login(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // محاولة تسجيل الدخول
        if (Auth::attempt($credentials)) {
            // إعادة التوجيه إلى الصفحة الرئيسية عند النجاح
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        // إعادة التوجيه مع رسالة خطأ عند الفشل
        return back()->with('error', 'Invalid credentials.')->withInput();
    }

    // لتسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}