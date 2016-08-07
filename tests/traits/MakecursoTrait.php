<?php

use Faker\Factory as Faker;
use App\Models\curso;
use App\Repositories\cursoRepository;

trait MakecursoTrait
{
    /**
     * Create fake instance of curso and save it in database
     *
     * @param array $cursoFields
     * @return curso
     */
    public function makecurso($cursoFields = [])
    {
        /** @var cursoRepository $cursoRepo */
        $cursoRepo = App::make(cursoRepository::class);
        $theme = $this->fakecursoData($cursoFields);
        return $cursoRepo->create($theme);
    }

    /**
     * Get fake instance of curso
     *
     * @param array $cursoFields
     * @return curso
     */
    public function fakecurso($cursoFields = [])
    {
        return new curso($this->fakecursoData($cursoFields));
    }

    /**
     * Get fake data of curso
     *
     * @param array $postFields
     * @return array
     */
    public function fakecursoData($cursoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'aula' => $fake->randomDigitNotNull,
            'seccion' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cursoFields);
    }
}
