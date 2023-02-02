<?php

namespace Database\Factories;

use App\Models\ItemType;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeriesType>
 */
class SeriesTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_type_id' => ItemType::all()->random()->id,
            'status_id' => Status::all()->random()->id,
        ];
    }
}
