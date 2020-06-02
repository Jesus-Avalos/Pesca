<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';

    protected $fillable = ['name','ciudad','telefono','email'];

    public function golon() {
        return $this->hasOne('App\Models\Golon', 'persona_id');
    }

    public function bloque()
    {
        return $this->hasMany('App\Models\Bloque_Orilla');
    }

    public function torneo()
    {
        return $this->belongsToMany('App\Models\Torneo')->using('App\Models\Orilla')->withPivot('id','bloque1','bloque2','bloque3','total')->withTimestamps();
    }

    public function equipo()
    {
        return $this->belongsToMany('App\Models\Equipo')->using('App\Models\Equipo_Persona')->withPivot('id','bloque1','bloque2','bloque3','total')->withTimestamps();
    }
}
