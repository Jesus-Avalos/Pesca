@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-header">
            Resultados {{ $torneo->name }}
            <button title="Actualizar" class="btn btn-sm btn-primary float-right" onclick="getResults()">Sync <i class="fas fa-sync-alt"></i></button>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($torneo->tipo == 'Orilla' || $torneo->tipo == 'Both')
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header">
                                Orilla
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="10%"><i class="fas fa-medal"></i></th>
                                            <th>Participante</th>
                                            <th>Puntos</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orillaDatos">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($torneo->tipo == 'Embarcacion' || $torneo->tipo == 'Both')
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-header">
                                Embarcación
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="10%"><i class="fas fa-medal"></i></th>
                                            <th>Equipo</th>
                                            <th>Puntos</th>
                                        </tr>
                                    </thead>
                                    <tbody id="equipoDatos">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            Golón
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="10%"><i class="fas fa-medal"></i></th>
                                        <th>Participante</th>
                                        <th>Peso</th>
                                    </tr>
                                </thead>
                                <tbody id="golonDatos">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection