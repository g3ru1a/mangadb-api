<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\SeriesName;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SeriesName>
 */
class SeriesNameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lang = fake()->randomElement(['en_GB', 'ja_JP', 'ko_KR']);
        $iso = $lang == 'en_GB' ? 'en' : ($lang == 'ja_JP' ? 'ja' : 'ko');
        return [
            'name' => fake($lang)->name(),
            'language_id' => Language::where('iso_639_1', $iso)->first()->id,
        ];
    }
}
