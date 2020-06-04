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
                        <div class="row justify-content-center">
                            @if ($torneo->tipo === 'Orilla' || $torneo->tipo === 'Both')
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-header">Orilla</div>
                                        <div class="card-body pr-0">
                                            <div class="row">
                                                <div class="row justify-content-center col-12 col-sm-7">
                                                    @foreach ($datos['Orilla'] as $key => $item)
                                                        <div class="col-sm text-center">
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
                            @endif
                            @if($torneo->tipo === 'Embarcacion' || $torneo->tipo === 'Both')
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-header">Embarcación</div>
                                        <div class="card-body pr-0">
                                            <div class="row">
                                                <div class="row col-12 col-sm-7 justify-content-center">
                                                    @foreach ($datos['Equipo'] as $key => $item)
                                                        <div class="col-sm text-center">
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </v-app>
@endsection