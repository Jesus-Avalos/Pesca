<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Embarcacion;
use App\Models\Persona;
use App\Models\Torneo;

use DB;

class EmbarcacionController extends Controller
{
    public function store(Request $request)
    {
    	try {
    		DB::beginTransaction();
		    	$equipo = Equipo::create([
		    		'name'=>$request->equipo,
		    		'integrantes' => $request->integrantes
                ]);

                switch ($request->integrantes) {
                    case '2': $iter = 5; break;
                    case '3': $iter = 7; break;
                    case '4': $iter = 10; break;
                }

                $bloques = [];
                for ($i=0; $i < $iter; $i++) { array_push($bloques,0); }
                
                $names = $request->names;
                $cities = $request->cities;
                $phones = $request->phones;
                $emails = $request->emails;
                
				$torneo = Torneo::find($request->torneo_id);
				$torneo->equipos()->attach($equipo->id,[
                    'bloque1' => json_encode($bloques),
                    'bloque2' => json_encode($bloques),
                    'bloque3' => json_encode($bloques),
                    'total' => 0,
                ]);

		    	for ($i = 0; $i < $request->integrantes; $i++) { 
		    		$persona = Persona::create([
						'name' => $names[$i],
						'ciudad' => $cities[$i],
						'telefono' => ($phones[$i])?? null,
						'email' => ($emails[$i])?? null
					]);
					
					$tipo = ($i == 0) ? 'Capitan' : 'Partner';
					$equipo->personas()->attach($persona, ['tipo' => $tipo]);
                }

		    DB::commit();
    	} catch (Exception $e) {
    		DB::rollback();
    	}

    	return $torneo->equipos()->where('equipo_id',$equipo->id)->get();
    }

    public function update(Request $request, Embarcacion $equipo)
    {
        $equipo->update([
            'bloque1' => $request->bloques[0],
            'bloque2' => $request->bloques[1],
            'bloque3' => $request->bloques[2],
            'total'   => $request->total
        ]);
        return $equipo;
    }

    public function destroy(Request $request) 
    {
        $embarcacion = Embarcacion::find($request->pivot_id);
        $equipo = Equipo::find($embarcacion->equipo_id);

        if ($request->deleteTeam === true) {
            $torneo = Torneo::find($embarcacion->torneo_id);
            $torneo->equipos()->detach($equipo->id);
            
            if ($request->deletePeople === true) {
                foreach ($equipo->personas as $value) {
                    $equipo->personas()->detach($value->id);
                    Persona::find($value->id)->delete();
                }
            }
            $equipo->delete();
        }
        $embarcacion->delete();

        return 'success';
    }
}
