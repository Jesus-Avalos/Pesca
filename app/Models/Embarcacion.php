<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Embarcacion extends Pivot
{
    protected $table = 'equipo_torneo';
    
    public $incrementing = true;

    protected $fillable = ['equipo_id','torneo_id','bloque1','bloque2','bloque3','total'];
}
