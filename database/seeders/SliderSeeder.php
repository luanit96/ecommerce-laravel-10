<?php

namespace Database\Seeders;

use Faker\Factory;
use \App\Models\Slider;
use Illuminate\Database\Seeder;


class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::factory()->count(10)->create();
    }
}
