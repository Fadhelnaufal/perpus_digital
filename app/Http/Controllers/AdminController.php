<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function listUsers()
    {$users = User::latest()->paginate(10);
    $roles = Role::whereIn('name', ['admin', 'teacher', 'student'])->get();
    return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
{
    $roles = \Spatie\Permission\Models\Role::all(); // pastikan namespace-nya benar
    return view('admin.users.index', compact('roles'));
}

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:admin,teacher,student',
    ]);

    $role = Role::where('name', $request->role)->firstOrFail();

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // ⬅️ Tambahkan ini agar bisa akses route dengan middleware 'role'
    $user->assignRole($request->role);

    // Sub-table
    if ($request->role === 'admin') {
        Admin::create([
            'id_admin' => 'ADM' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
            'id_user' => $user->id,
            'name' => $user->name,
            'address_admin' => '',
            'gender' => 'Laki-laki',
        ]);
    } elseif ($request->role === 'teacher') {
        Teacher::create([
            'id_teacher' => 'TCH' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
            'id_user' => $user->id,
            'name' => $user->name,
            'address_teacher' => '',
            'gender' => 'Laki-laki',
        ]);
    } elseif ($request->role === 'student') {
        Student::create([
            'id_students' => 'STD' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
            'id_user' => $user->id,
            'name' => $user->name,
            'class' => null,
            'gender' => 'Laki-laki',
            'address_students' => '',
        ]);
    }

    return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
}


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,teacher,student',
        ]);

        $role = Role::where('name', $request->role)->firstOrFail();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $role->id,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Hapus relasi sesuai role
        if ($user->role && $user->role->name === 'teacher') {
            Teacher::where('id_user', $user->id)->delete();
        } elseif ($user->role && $user->role->name === 'admin') {
            Admin::where('id_user', $user->id)->delete();
        } elseif ($user->role && $user->role->name === 'student') {
            Student::where('id_user', $user->id)->delete();
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
