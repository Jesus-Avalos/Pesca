<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Torneo;
use App\Models\Equipo;
use App\Models\Orilla;
use DB;

class TorneoController extends Controller
{
    public function store(Request $request) {
        return Torneo::create($request->all());
    }

    public function show(Torneo $torneo){
        if ($torneo->tipo === 'Orilla') {
            $datos = $torneo->personas;
        }elseif($torneo->tipo === 'Embarcacion') {
            $datos = $torneo->equipos;
        }else{
            $datos['Orilla'] = $torneo->personas;
            $datos['Equipo'] = $torneo->equipos;
        }
        return view('torneo.index',compact('torneo','datos'));
    }

    public function start(Torneo $torneo) {
        if ($torneo->tipo === 'Orilla') {
            $datos = $torneo->personas;
        }elseif($torneo->tipo === 'Embarcacion') {
            $datos = $torneo->equipos()->with('personas')->get();
        }else{
            $datos['Orilla'] = $torneo->personas;
            $datos['Equipo'] = $torneo->equipos()->with('personas')->get();
        }
        return view('torneo.start',compact('torneo','datos'));
        // return $datos;
    }
}
