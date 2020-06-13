@extends('layouts.app')

@section('content')
    <div class="card m-4">
        <div class="card-header">
            Personas
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center peopleTable responsive nowrap" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personas as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->ciudad }}</td>
                            <td>{{ ($item->telefono)?? 'Ninguno' }}</td>
                            <td>{{ ($item->email)?? 'Ninguno' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(() => {
            $('.peopleTable').DataTable();
        })
    </script>
@endsection