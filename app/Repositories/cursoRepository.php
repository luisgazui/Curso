<?php

namespace App\Repositories;

use App\Models\curso;
use InfyOm\Generator\Common\BaseRepository;

class cursoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'aula',
        'seccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return curso::class;
    }
}
