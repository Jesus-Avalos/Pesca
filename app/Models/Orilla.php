<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Orilla extends Pivot
{
    protected $table = 'persona_torneo';
    
    public $incrementing = true;
    
    protected $fillable = ['persona_id','torneo_id','bloque1','bloque2','bloque3','total'];
}
