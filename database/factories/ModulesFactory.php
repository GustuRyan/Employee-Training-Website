<?php

namespace Database\Factories;

use App\Models\Modules;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModulesFactory extends Factory
{
    protected $model = Modules::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_modul' => $this->faker->word,
            'id_topik' => \App\Models\Topic::factory(),
            'judul' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph,
        ];
    }
}
