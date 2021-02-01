@extends('layouts.app')

@section('title', 'Creación de Cliente')

@section('content')
    <div class="card">
        <br>
        <form class="form-horizontal form-group" method="POST" action="/clients">
        @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <span class="text-danger">{{$error}}</span><br>
                    @endforeach
                </div>
            @endif

            <div class="card-body">
                <h4 class="card-title">Creación de Cliente</h4>
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Identificación</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="identification" name="identification">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Tipo de Identificación</label>
                    <div class="col-sm-9">
                        <select name="identification_type" id="identification_type" class="form-control" >
                            <option value="">Seleccione</option>
                            <option value="CC">CC</option>
                            <option value="RC">RC</option>
                            <option value="TI">TI</option>
                            <option value="AS">AS</option>
                            <option value="MS">MS</option>
                            <option value="PA">PA</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Primer Nombre</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Segundo Nombre</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="second_name" name="second_name">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Primer Apellido</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Segundo Apellido</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="second_last_name" name="second_last_name">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Dirección</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Teléfono</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">E-Mail</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-3 text-right control-label col-form-label">Ocupación</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="position" name="position">
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
                                <option value="{{$department->department_code}}">{{$department->department_name}}</option>
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
          console.log(data);
        $('#city_id').empty();
        $('#city_id').append('<option value="">Seleccione</option>');
        $.each(data, function(fetch, regenciesObj){
          console.log(regenciesObj.municipality_name);
          $('#city_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.municipality_name +'</option>');
        })
      });
    });
</script>
@endsection



