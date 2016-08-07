<?php

namespace App\Repositories;

use App\Models\curso3;
use InfyOm\Generator\Common\BaseRepository;

class curso3Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre',
        'Aula',
        'Seccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return curso3::class;
    }
}
