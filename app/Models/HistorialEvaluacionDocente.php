<?php

/**
 * Created by Santiago García Cabral.
 * Date: Sat, 11 Mar 2017
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialEvaluacionDocente
 * @package App\Models
 */
class HistorialEvaluacionDocente extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'HISTORIAL_EVALUACION_DOCENTE';
    protected $fillable = array(
        'evaluacion_id',
        'docente_id'
    );

    public function evaluacion(){
        return $this -> hasMany('App\Models\Evaluacion','id','evaluacion_id');
    }

    public function docente(){
        return $this -> hasMany('App\Models\Docente');
    }
}