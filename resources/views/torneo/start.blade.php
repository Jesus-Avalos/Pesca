@extends('layouts.app')

@section('content')
    <v-app class="m-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{ $torneo->name }}
                    </div>

                    <div class="card-body">
                        @if ($torneo->tipo === 'Orilla')
                            <div class="row">
                                <div class="row col-12 col-sm-7">
                                    @foreach ($datos as $key => $item)
                                        <div class="col-3 col-sm-2">
                                            <orilla-start index=" {{ $key + 1 }}" datos="{{ $item }}" torneo_id="{{ $torneo->id }}"></orilla-start>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-12 col-sm-5">
                                    <parts-component datos="{{ $datos }}"></parts-component>
                                </div>
                            </div>
                        @elseif($torneo->tipo === 'Embarcacion')
                            <div class="row">
                                <div class="row col-12 col-sm-7">
                                    @foreach ($datos as $key => $item)
                                        <div class="col-3 col-sm-2">
                                            <equipo-start index=" {{ $key + 1 }}" datos="{{ $item }}" torneo_id="{{ $torneo->id }}"></equipo-start>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-12 col-sm-5">
                                    <parts-component datos="{{ $datos }}"></parts-component>
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Orilla
                                        </div>
                    
                                        <div class="card-body pr-0">
                                            <div class="row">
                                                <div class="row col-12 col-sm-7">
                                                    @foreach ($datos['Orilla'] as $key => $item)
                                                        <div class="col-sm">
                                                            <orilla-start index=" {{ $key + 1 }}" datos="{{ $item }}" torneo_id="{{ $torneo->id }}"></orilla-start>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="col-12 col-sm-5 pl-0 pr-0">
                                                    <parts-component datos="{{ $datos['Orilla'] }}"></parts-component>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Embarcación
                                        </div>
                    
                                        <div class="card-body pr-0">
                                            <div class="row">
                                                <div class="row col-12 col-sm-7">
                                                    @foreach ($datos['Equipo'] as $key => $item)
                                                        <div class="col-sm">
                                                            <equipo-start index=" {{ $key + 1 }}" datos="{{ $item }}" torneo_id="{{ $torneo->id }}"></equipo-start>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="col-12 col-sm-5 pl-0 pr-0">
                                                    <parts-component datos="{{ $datos['Equipo'] }}"></parts-component>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </v-app>
@endsection