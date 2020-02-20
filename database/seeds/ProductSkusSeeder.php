<?php

use Illuminate\Database\Seeder;

class ProductSkusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ProductSku::class, 20)->create();

    }
}
