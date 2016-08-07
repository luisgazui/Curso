<?php

use Faker\Factory as Faker;
use App\Models\Curso1;
use App\Repositories\Curso1Repository;

trait MakeCurso1Trait
{
    /**
     * Create fake instance of Curso1 and save it in database
     *
     * @param array $curso1Fields
     * @return Curso1
     */
    public function makeCurso1($curso1Fields = [])
    {
        /** @var Curso1Repository $curso1Repo */
        $curso1Repo = App::make(Curso1Repository::class);
        $theme = $this->fakeCurso1Data($curso1Fields);
        return $curso1Repo->create($theme);
    }

    /**
     * Get fake instance of Curso1
     *
     * @param array $curso1Fields
     * @return Curso1
     */
    public function fakeCurso1($curso1Fields = [])
    {
        return new Curso1($this->fakeCurso1Data($curso1Fields));
    }

    /**
     * Get fake data of Curso1
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCurso1Data($curso1Fields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'aula' => $fake->randomDigitNotNull,
            'seccion' => $fake->word,
            'matricula' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $curso1Fields);
    }
}
