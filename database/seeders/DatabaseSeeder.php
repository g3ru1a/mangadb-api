<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->set('email', 'user@test.com')->set('name', 'user')->set('editor', 0)->create();
        User::factory(1)->set('email', 'editor@test.com')->set('name', 'editor')->set('editor', 1)->create();
        $this->call([
            StaffSeeder::class,
            PublisherSeeder::class,
            StatusSeeder::class,
            BindingSeeder::class,
            ItemTypeSeeder::class,
            LanguageSeeder::class,
            SeriesSeeder::class,
            BookSeeder::class,
        ]);
    }
}
