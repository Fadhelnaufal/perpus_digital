<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan role admin tersedia
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Cek user admin
        $admin = User::where('email', 'admin@pusdiglah.com')->first();

        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin Fadhel',
                'email' => 'admin@pusdiglah.com',
                'password' => Hash::make('password'),
            ]);

            $admin->assignRole($adminRole);

            $this->command->info('✅ Admin user berhasil dibuat:');
            $this->command->info('📧 Email: admin@pusdiglah.com');
            $this->command->info('🔑 Password: password');
        } else {
            $this->command->info('⚠️ Admin user sudah ada.');
        }
    }
}
