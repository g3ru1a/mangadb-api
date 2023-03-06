<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::factory()->count(20)
            ->has(Media::factory(), 'media')->create();
    }
}
