@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{ $torneo->name }}
                        <a href="/torneo/start/{{ $torneo->id }}" class="btn btn-sm btn-primary float-right">Comenzar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-success" role="alert" style="display: none"></div>
                        @if ($torneo->tipo === 'Orilla')
                            <orilla-component datos="{{ $datos }}" torneo_id="{{ $torneo->id }}"></orilla-component>
                        @elseif($torneo->tipo === 'Embarcacion')
                            <embarcacion-component datos="{{ $datos }}" torneo_id="{{ $torneo->id }}"></embarcacion-component>
                        @else
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <orilla-component datos="{{ $datos['Orilla'] }}" torneo_id="{{ $torneo->id }}"></orilla-component>
                                </div>
                                <div class="col-12 col-md-6">
                                    <embarcacion-component datos="{{ $datos['Equipo'] }}" torneo_id="{{ $torneo->id }}"></embarcacion-component>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection