@extends('layouts.app')

@section('content')
    <div>
        <div class="card">
            <div class="card-header">
                Equipos
            </div>
            <div class="card-body">
                <table class="table table-bordered equipoTable responsive nowrap" style="width: 100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th># Integrantes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->integrantes }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(() => {
            $('.equipoTable').DataTable();
        })
    </script>
@endsection