<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('Auth.register');
    }

    public function store(Request $request)
    {
        // dd( $request->all());
        // Validate the incoming request data

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'in:doctor,sick,pharmaceutical'],
        ], [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'الاسم يجب أن يكون نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا.',

            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.string' => 'البريد الإلكتروني يجب أن يكون نصًا.',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة.',
            'email.max' => 'يجب ألا يتجاوز البريد الإلكتروني 255 حرفًا.',
            'email.unique' => 'البريد الإلكتروني مُسجل بالفعل.',

            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.string' => 'كلمة المرور يجب أن تكون نصًا.',
            'password.min' => 'يجب أن لا تقل كلمة المرور عن 8 أحرف.',
            'password.confirmed' => 'كلمة المرور وتأكيدها غير متطابقين.',

            'user_type.required' => 'حقل نوع المستخدم مطلوب.',
            'user_type.in' => 'قيمة نوع المستخدم غير صالحة.'
        ]);


        // Create a new user instance
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => $request->user_type,
        ]);

        // إذا كان user_type = doctor → أنشئ سجل جديد في جدول doctors
        if ($user->user_type === 'doctor') {
            Doctor::create([
                'user_id' => $user->id,
                'specialization' => null,
                'license_number' => null,
                'working_hours' => null,
                'phone' => null,
                'section' => null,
            ]);
        }

        // Log the user in
        Auth::login($user);

        // Redirect to a desired location, e.g., home page
        return redirect()->route('login');
    }
}
