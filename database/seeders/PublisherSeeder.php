<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::factory()->count(10)
            ->has(Media::factory(), 'media')->create();
    }
}
