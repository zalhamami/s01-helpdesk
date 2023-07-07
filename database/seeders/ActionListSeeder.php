<?php

namespace Database\Seeders;

use App\Models\ActionList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            'Periksa kembali kabel MPLS',
            'Pengecekan link MPLS',
            'Periksa kembali Antena pada Perangkat',
            'Pengecekan SIM card'
        ];

        foreach ($values as $value) {
            ActionList::create([
                'name' => $value,
            ]);
        }
    }
}
