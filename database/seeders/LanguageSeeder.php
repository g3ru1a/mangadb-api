<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create(['name' => 'English', 'iso_639_1' => 'en']);
        Language::create(['name' => 'Japanese', 'iso_639_1' => 'ja']);
        Language::create(['name' => 'Chinese', 'iso_639_1' => 'zh']);
        Language::create(['name' => 'Korean', 'iso_639_1' => 'ko']);
        Language::create(['name' => 'Vietnamese', 'iso_639_1' => 'vi']);
    }
}
