<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $fillable = [
        'name',
        'tipo',
        'status'
    ];
    
    public function equipos()
    {
        return $this->belongsToMany('App\Models\Equipo')->using('App\Models\Embarcacion')->withTimestamps()->withPivot('id','bloque1','bloque2','bloque3','total');
    }

    public function personas()
    {
        return $this->belongsToMany('App\Models\Persona')->using('App\Models\Orilla')->withTimestamps()->withPivot('id','bloque1','bloque2','bloque3','total');
    }

    public function golones()
    {
        return $this->belongsToMany('App\Models\Persona','golon')->using('App\Models\Golon')->withTimestamps()->withPivot('id','peso_golon');
    }
}
