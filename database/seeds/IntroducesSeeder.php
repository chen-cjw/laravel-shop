<?php

use Illuminate\Database\Seeder;

class IntroducesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Introduce::class, 1)->create();
    }
}
