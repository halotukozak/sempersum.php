<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'website' => $this->faker->url(),
            'facebook' => $this->faker->url(),
            'instagram' => $this->faker->url(),
            'mail' => $this->faker->email(),
            'spotifyId' => $this->faker->randomElement(['3k4IXngEeRFfKiBNiUn4qV', '53l3yjX8ITilPIlCRsVKEB', '4X5vA3EzcDxZQxAcECzGqH']),
            'youtubeId' => $this->faker->randomElement(['3k4IXngEeRFfKiBNiUn4qV', '53l3yjX8ITilPIlCRsVKEB', '4X5vA3EzcDxZQxAcECzGqH'])
        ];
    }
}
