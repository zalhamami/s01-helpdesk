<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('secret'),
                'user_setting_id' => 1,
                'location_id' => 1,
            ],
            [
                'name' => 'Helpdesk',
                'username' => 'helpdesk',
                'email' => 'helpdesk@mail.com',
                'password' => bcrypt('secret'),
                'user_setting_id' => 2,
                'location_id' => 1,
            ],
            [
                'name' => 'Teknisi',
                'username' => 'teknisi',
                'email' => 'teknisi@mail.com',
                'password' => bcrypt('secret'),
                'user_setting_id' => 3,
                'location_id' => 1,
            ],
        ];

        foreach ($values as $value) {
            User::create($value);
        }
    }
}
