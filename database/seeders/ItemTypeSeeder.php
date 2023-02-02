<?php

namespace Database\Seeders;

use App\Models\ItemType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemType::create(['name'=>'Manga']);
        ItemType::create(['name'=>'Light Novel']);
        ItemType::create(['name'=>'Novel']);
        ItemType::create(['name'=>'Art Book']);
        ItemType::create(['name'=>'Fan Book']);
    }
}
