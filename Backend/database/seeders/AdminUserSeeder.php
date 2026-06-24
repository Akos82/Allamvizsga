<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@planetarium.hu'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('planetarium2025'),
                'is_admin' => true,
            ]
        );

        $this->command->info('Admin felhasználó létrehozva: admin@planetarium.hu / planetarium2025');
    }
}
