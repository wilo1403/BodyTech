@extends('layouts.app')

@section('title', 'Listado de clientes')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Listado de clientes</h5>
            <br><br>
            <div class="table-responsive">

                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            <td>{{$client->name}}</td>
                            <td>
                                <a href="clients/{{$client->id}}/edit" class="btn btn-outline-primary">Modificar</a>
                                <form action="/clients/{{$client->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="alerta()" type="submit" class="btn btn-outline-danger">Eliminar&nbsp;&nbsp;</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $clients->links() }}
            </div>

        </div>
    </div>

    <script>
        function alerta(){
            var mensaje;
            var opcion = confirm("¿Esta seguro de eliminar el registro?");
            if (opcion == false) {
                event.preventDefault()
            }
        }
    </script>

@endsection
