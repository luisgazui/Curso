<?php

use Faker\Factory as Faker;
use App\Models\curso3;
use App\Repositories\curso3Repository;

trait Makecurso3Trait
{
    /**
     * Create fake instance of curso3 and save it in database
     *
     * @param array $curso3Fields
     * @return curso3
     */
    public function makecurso3($curso3Fields = [])
    {
        /** @var curso3Repository $curso3Repo */
        $curso3Repo = App::make(curso3Repository::class);
        $theme = $this->fakecurso3Data($curso3Fields);
        return $curso3Repo->create($theme);
    }

    /**
     * Get fake instance of curso3
     *
     * @param array $curso3Fields
     * @return curso3
     */
    public function fakecurso3($curso3Fields = [])
    {
        return new curso3($this->fakecurso3Data($curso3Fields));
    }

    /**
     * Get fake data of curso3
     *
     * @param array $postFields
     * @return array
     */
    public function fakecurso3Data($curso3Fields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Nombre' => $fake->word,
            'Aula' => $fake->randomDigitNotNull,
            'Seccion' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $curso3Fields);
    }
}
