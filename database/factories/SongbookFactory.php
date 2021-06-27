<?php

namespace Database\Factories;

use App\Models\Songbook;
use App\Models\User;
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
            'name' => $this->faker->sentence(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'owner' => User::inRandomOrder()->first()
        ];
    }
}
