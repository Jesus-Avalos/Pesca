<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';

    protected $fillable = ['name','integrantes'];

    public function torneo()
    {
        return $this->belongsToMany('App\Models\Torneo')->using('App\Models\Embarcacion')->withTimestamps()->withPivot('id','bloque1','bloque2','bloque3','total');
    }

    public function personas()
    {
        return $this->belongsToMany('App\Models\Persona')->using('App\Models\Equipo_Persona')->withTimestamps()->withPivot('id');
    }
}
