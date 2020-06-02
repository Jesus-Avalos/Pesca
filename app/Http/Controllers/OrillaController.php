<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Orilla;
use App\Models\Persona;
use App\Models\Torneo;
use DB;

class OrillaController extends Controller
{
    public function store(Request $request)
    {
    	try {
    		DB::beginTransaction();
		    	$persona = Persona::create([
                    'name' => $request->name,
                    'ciudad' => $request->ciudad,
                    'telefono' => $request->telefono,
                    'email' => $request->email
                ]);

                $torneo = Torneo::find($request->torneo_id);

                $persona->torneo()->attach($torneo->id,[
                    'bloque1' => json_encode([0,0,0,0,0]),
                    'bloque2' => json_encode([0,0,0,0,0]),
                    'bloque3' => json_encode([0,0,0,0,0]),
                    'total' => 0
                ]);
            DB::commit();
    	} catch (Exception $e) {
    		DB::rollback();
    	}

    	return $torneo->personas()->where('persona_id',$persona->id)->get();
    }

    public function update(Request $request, Orilla $orilla)
    {
        $orilla->update([
            'bloque1' => $request->bloques[0],
            'bloque2' => $request->bloques[1],
            'bloque3' => $request->bloques[2],
            'total'   => $request->total
        ]);
        return 'Registrado correctamente';
    }

    public function destroy(Request $request)
    {
        $orilla = Orilla::find($request->pivot_id);
        if ($request->checked === true) {
            Persona::find($orilla->persona_id)->delete();
        }
        $orilla->delete();

        return 'success';
    }
}
