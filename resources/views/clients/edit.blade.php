@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <div class="card">
        <br>
        <form class="form-horizontal form-group" method="POST" action="/clients/{{$client->id}}">
        @method('PUT')
        @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <span class="text-danger">{{$error}}</span><br>
                    @endforeach
                </div>
            @endif

            <div class="card-body">
                <h4 class="card-title">Editar Cliente</h4>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Identificación</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="identification" name="identification" value="{{ $client->identification }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Tipo de Identificación</label>
                    <div class="col-sm-9">
                        <select name="identification_type" id="identification_type" class="form-control" >
                            <option value="">Seleccione</option>
                            <option value="CC" {{  $client->identification_type == 'CC' ? "selected" : "" }}>CC</option>
                            <option value="RC" {{  $client->identification_type == 'RC' ? "selected" : "" }}>RC</option>
                            <option value="TI" {{  $client->identification_type == 'TI' ? "selected" : "" }}>TI</option>
                            <option value="AS" {{  $client->identification_type == 'AS' ? "selected" : "" }}>AS</option>
                            <option value="MS" {{  $client->identification_type == 'MS' ? "selected" : "" }}>MS</option>
                            <option value="PA" {{  $client->identification_type == 'PA' ? "selected" : "" }}>PA</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Primer Nombre</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $client->first_name }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Segundo Nombre</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="second_name" name="second_name" value="{{ $client->second_name }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Primer Apellido</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $client->last_name }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Segundo Apellido</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="second_last_name" name="second_last_name" value="{{ $client->second_last_name }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Dirección</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="address" value="{{ $client->address }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Teléfono</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $client->phone }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">E-Mail</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="{{ $client->email }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Ocupación</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="position" name="position" value="{{ $client->position }}">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Departamento</label>
                    <div class="col-sm-9">
                        <select name="department" id="department" class="form-control" >
                            <option value="">Seleccione</option>
                            @foreach ($departments as $department)
                                <option value="{{$department->department_code}}" {{ $client->city_id == $department->id ? 'selected="selected"' : '' }}>{{$department->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Municipio</label>
                <div class="col-sm-9">
                <select name="city_id" id="city_id" class="form-control" ><option value="">Seleccione</option></select>
                </div>
            </div>

            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">

        $('#department').on('change', function(e){
          var department_code = e.target.value;
          $.get('{{ url("/") }}/api/select_municipality/' + department_code,function(data) {
            $('#city_id').empty();
            $('#city_id').append('<option value="">Seleccione</option>');
            $.each(data, function(fetch, regenciesObj){
              $('#city_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.municipality_name +'</option>');
            })
          });
        });

        $(document).ready(function() {
            var department_code = {{ $selected_city }};
          $.get('{{ url("/") }}/api/select_municipality/' + department_code,function(data) {
            $('#city_id').empty();
            $('#city_id').append('<option value="">Seleccione</option>');
            $.each(data, function(fetch, regenciesObj){
              selected = '';
              city_selected = {{$client->city_id}};
              if(city_selected == regenciesObj.id){
                  selected = 'selected="selected"';
              }else{
                selected = '';
              }
              $('#city_id').append('<option value="'+ regenciesObj.id +'" '+selected+'>'+ regenciesObj.municipality_name +'</option>');
            })
          });
        });
    </script>
@endsection
