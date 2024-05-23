<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::factory(5)->create();

        Product::factory(5)->create();
        
        Order::factory(5)->create();

        OrderDetail::factory(5)->create();

        
        // User::factory(3)->create();

        
    }
}
