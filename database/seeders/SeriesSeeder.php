<?php

namespace Database\Seeders;

use App\Models\ItemType;
use App\Models\Series;
use App\Models\SeriesName;
use App\Models\SeriesType;
use App\Models\Staff;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Series::factory()->count(5)->has(SeriesName::factory()->count(3), 'names')
            ->has(SeriesType::factory()->count(2)
                ->hasAttached(Staff::all()->random(2), ['role'=>'author'], 'staff'), 'types')
            ->create();
    }
}
