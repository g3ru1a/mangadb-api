<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['name' => 'Ongoing']);
        Status::create(['name' => 'Finished']);
        Status::create(['name' => 'Axed']);
        Status::create(['name' => 'Hiatus']);
    }
}
