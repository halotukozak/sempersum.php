<?php

namespace Database\Factories;

use App\Models\Songbook;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongbookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Songbook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title()
        ];
    }
}
