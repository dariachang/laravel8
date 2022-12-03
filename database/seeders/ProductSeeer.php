<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::upsert([
            ['id' => 6, 'title' => '固定資料', 'content' => '固定內容', 'price' => rand(0,300), 'quantity' => 20],
            ['id' => 7, 'title' => '固定資料2', 'content' => '固定內容', 'price' => rand(0,300), 'quantity' => 20],
            ['id' => 8, 'title' => '固定資料3', 'content' => '固定內容', 'price' => rand(0,300), 'quantity' => 20]
        ], ['id'], ['price', 'quantity']);
    }
}
