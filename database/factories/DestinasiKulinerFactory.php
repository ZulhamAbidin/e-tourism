<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\DestinasiKuliner;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DestinasiKuliner>
 */
class DestinasiKulinerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DestinasiKuliner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $foodImageThemes = [
            'makanan', 'kuliner', 'food', 'restaurant', 'delicious',
        ];

        return [
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'JamBuka' => $this->faker->time('H:i'),
            'Deskripsi' => $this->faker->paragraph,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'sampul' => $this->faker->imageUrl(200, 200, $this->faker->randomElement($foodImageThemes)),
            'gambar' => $this->faker->imageUrl(800, 600, $this->faker->randomElement($foodImageThemes)),
            'MenuKuliner' => $this->faker->sentence,
            'rating' => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}
