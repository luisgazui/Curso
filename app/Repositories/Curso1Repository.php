<?php

namespace App\Repositories;

use App\Models\Curso1;
use InfyOm\Generator\Common\BaseRepository;

class Curso1Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'aula',
        'seccion',
        'matricula'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Curso1::class;
    }
}
