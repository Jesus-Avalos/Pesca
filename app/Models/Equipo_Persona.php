<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Equipo_Persona extends Pivot
{
    protected $table = 'equipo_persona';
    
    public $incrementing = true;

    protected $fillable = ['equipo_id','persona_id','tipo'];
}
