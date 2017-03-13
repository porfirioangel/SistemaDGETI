<?php

/**
 * Created by Santiago García Cabral.
 * Date: Sat, 11 Mar 2017
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CampoDisciplinar
 * @package App\Models
 */
class CampoDisciplinar extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'CAMPO_DISCIPLINAR';
    protected $fillable = array(
        'campo_disciplinar',
        'componente_formacion_id'
    );

    public function componente_formacion(){
        return $this->hasOne('App\Models\ComponenteFormacion','id','componente_formacion_id');
    }

    public function disciplina(){
        return $this->belongsTo('App\Models\Disciplina');
    }
}