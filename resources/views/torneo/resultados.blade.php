<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        
        <script> var urlhost = 'http://' + window.location.host; </script>
        <link rel="stylesheet" href="/css/app.css">
        <script>var torneo = @json($torneo);</script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img
                            width="90"
                            src="{{ asset('storage/bassrio.png') }}"
                            alt="John"
                        >
                        Bass Rioverde
                    </a>
                </div>
            </nav>
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
        </div>
        <script src="/js/app.js"></script>
        <script src="/js/results.js"></script>
    </body>
</html>