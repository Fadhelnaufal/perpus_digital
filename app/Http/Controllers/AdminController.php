<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // GET /admin/users
    public function index()
    {
        $users = User::latest()->paginate(10);
        $roles = Role::whereIn('name', ['admin', 'teacher', 'student'])->get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    // GET /admin/users/create
    public function create()
    {
        $roles = Role::whereIn('name', ['admin', 'teacher', 'student'])->get();
        return view('admin.users.create', compact('roles'));
    }

    // POST /admin/users
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,teacher,student',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        // Sub-table insert
        switch ($request->role) {
            case 'admin':
                Admin::create([
                    'id_admin' => 'ADM' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
                    'id_user' => $user->id,
                    'name' => $user->name,
                    'address_admin' => '',
                    'gender' => 'Laki-laki',
                ]);
                break;

            case 'teacher':
                Teacher::create([
                    'id_teacher' => 'TCH' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
                    'id_user' => $user->id,
                    'name' => $user->name,
                    'address_teacher' => '',
                    'gender' => 'Laki-laki',
                ]);
                break;

            case 'student':
                Student::create([
                    'id_students' => 'STD' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
                    'id_user' => $user->id,
                    'name' => $user->name,
                    'class' => null,
                    'gender' => 'Laki-laki',
                    'address_students' => '',
                ]);
                break;
        }

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // GET /admin/users/{user}/edit
    public function edit(User $user)
    {
        $roles = Role::whereIn('name', ['admin', 'teacher', 'student'])->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // PUT /admin/users/{user}
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|in:admin,teacher,student',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        $user->syncRoles([$request->role]); // Update role

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    // DELETE /admin/users/{user}
    public function destroy(User $user)
    {
        // Hapus dari tabel sub-role
        if ($user->hasRole('teacher')) {
            Teacher::where('id_user', $user->id)->delete();
        } elseif ($user->hasRole('admin')) {
            Admin::where('id_user', $user->id)->delete();
        } elseif ($user->hasRole('student')) {
            Student::where('id_user', $user->id)->delete();
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
