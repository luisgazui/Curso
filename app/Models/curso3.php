<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="curso3",
 *      required={"Nombre", "Aula", "Seccion"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Nombre",
 *          description="Nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Aula",
 *          description="Aula",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Seccion",
 *          description="Seccion",
 *          type="string"
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
class curso3 extends Model
{
    use SoftDeletes;

    public $table = 'curso3s';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Nombre',
        'Aula',
        'Seccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Nombre' => 'string',
        'Aula' => 'integer',
        'Seccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nombre' => 'required',
        'Aula' => 'required',
        'Seccion' => 'required'
    ];
}
