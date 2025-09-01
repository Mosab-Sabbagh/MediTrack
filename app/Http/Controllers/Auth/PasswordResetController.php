<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    // فورم طلب إعادة تعيين كلمة المرور
    public function showRequestForm()
    {
        return view('Auth.forgot-password'); // صفحة فيها حقل "email"
    }

    // إرسال الرابط (نسجله بالـ log بدل البريد)
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'هذا البريد غير مسجل']);
        }

        $token = Str::random(60);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        $resetUrl = url("/password/reset/{$token}");

        // نطبع الرابط في الـ log
        Log::info("Password reset link for {$request->email}: $resetUrl");

        return back()->with('status', 'تم إنشاء رابط إعادة تعيين (شوفه بالـ log)');
    }

    // عرض فورم إعادة التعيين
    public function showResetForm($token)
    {
        return view('auth.reset', ['token' => $token]);
    }

    // تنفيذ إعادة التعيين
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $reset = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'الرمز غير صحيح أو انتهت صلاحيته']);
        }

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/login')->with('status', 'تم تغيير كلمة المرور بنجاح');
    }
}
