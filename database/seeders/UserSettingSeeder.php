<?php

namespace Database\Seeders;

use App\Models\UserSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = ['Admin', 'Helpdesk', 'Teknisi'];

        foreach ($values as $value) {
            UserSetting::create([
                'name' => $value,
            ]);
        }
    }
}
