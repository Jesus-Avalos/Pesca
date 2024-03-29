<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Golon extends Pivot
{
    protected $table = 'golon';
    
    public $incrementing = true;

    protected $fillable = ['total','persona_id','torneo_id'];
}
