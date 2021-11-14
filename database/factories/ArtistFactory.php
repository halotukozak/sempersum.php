<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spotify;

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
            'slug' => $this->faker->unique(true)->slug(),
            'name' => $this->faker->unique(true)->name(),
            'description' => $this->faker->text(),
            'website' => $this->faker->url(),
            'facebook' => $this->faker->url(),
            'instagram' => $this->faker->url(),
            'email' => $this->faker->email(),
            'spotify' => Spotify::searchArtists($this->faker->randomLetter())->limit(1)->get('artists')['items'][0]['id'],
            'youtube' => $this->faker->randomElement(['3k4IXngEeRFfKiBNiUn4qV', '53l3yjX8ITilPIlCRsVKEB', '4X5vA3EzcDxZQxAcECzGqH'])
        ];
    }
}
