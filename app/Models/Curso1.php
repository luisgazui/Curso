<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Curso1",
 *      required={"nombre", "aula", "seccion", "matricula"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="aula",
 *          description="aula",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="seccion",
 *          description="seccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="matricula",
 *          description="matricula",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Curso1 extends Model
{
    use SoftDeletes;

    public $table = 'curso1s';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'aula',
        'seccion',
        'matricula'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'aula' => 'integer',
        'seccion' => 'string',
        'matricula' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'aula' => 'required',
        'seccion' => 'required',
        'matricula' => 'required'
    ];
}
