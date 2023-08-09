<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@beasiswa.com',
            'password' => bcrypt(env('INITIAL_PASSWORD_ADMIN') ?? '!!@@##$$DoNotEnter:D'),
            'alamat' => '',
            'jk' => '',
            'notelp' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' => 1,
        ]);
    }
}
