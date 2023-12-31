<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Target;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TypesofgoodSeeder::class,
            UnitSeeder::class,
            SupplierSeeder ::class,
            PaymentSeeder::class,
            PaymentStatusSeeder::class,
            ProductSeeder::class,
            //SaleTargetSeeder::class,
            TargetSeeder::class,

        ]);
    }
}
