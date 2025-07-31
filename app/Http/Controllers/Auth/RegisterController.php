<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

   public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    // Assign default role to user
    $user->assignRole('student'); // otomatis jadi siswa
    // ✅ Generate ID STUDENT sebelum insert
    $id_students = 'STD' . str_pad($user->id, 3, '0', STR_PAD_LEFT);

    Student::create([
        'id_students' => $id_students,
        'id_user' => $user->id,
        'name' => $user->name,
        'class' => null,
        'gender' => 'Laki-laki',
        'address_students' => '',
    ]);

    Auth::login($user);

    return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
}


}
