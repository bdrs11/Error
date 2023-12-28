<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Target::insert([
            [
                'id' => '1',
                'bulan' => 'januari',
                'target_penjualan' => '50000',
                'penjualan_aktual' => '70000',
                'selisih' => '20000',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
