<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torneo;

class GolonController extends Controller
{
    public function store (Request $request) 
    {
        $exist = Torneo::find($request->torneo_id)->golones()->where('persona_id',$request->persona_id)->get();
        if (count($exist)) {
            Torneo::find($request->torneo_id)->golones()->updateExistingPivot($request->persona_id,['peso_golon'=>$request->golon]);
            return 'Actualizado correctamente';
        }else {
            Torneo::find($request->torneo_id)->golones()->attach($request->persona_id,['peso_golon'=>$request->golon]);
            return 'Registrado correctamente';
        }
    }
}
