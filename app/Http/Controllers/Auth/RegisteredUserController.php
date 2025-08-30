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
            'password.confirmed' => 'كلمة المرور وتأكيدها غير متطابقين'
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
