<?php

namespace Database\Seeders;

use App\Models\Binding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BindingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Binding::create(['name'=>'Paperback']);
        Binding::create(['name'=>'Hardback']);
        Binding::create(['name'=>'Deluxe']);
    }
}
