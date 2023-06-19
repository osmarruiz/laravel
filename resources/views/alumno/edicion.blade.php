@extends('ejemploplantilla')

 
@section('contenido')
    
    <hr />

    <h1>Formulario Alumnos</h1>

    <form action="{{ url('/alumno/update') }}" method="post" class="col-md-6" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="email" value={{$datos->email}} class="form-control col-md-6" name="a-email" placeholder="Ingrese su correo electrónico"
                required>
        </div>
        <div class="form-group">
            <input type="text" value={{$datos->nombre}} class="form-control" name="a-nombre" placeholder="Ingrese su nombre completo" maxlength="200"
                required>
        </div>
        <div class="form-group">
            <input type="text" value={{$datos->carnet}} class="form-control col-md-6" name="a-ncarnet" placeholder="Ingrese su número de carnet"
                maxlength="10" required>
        </div>
        <div class="form-group">
            <input type="number" value={{$datos->edad}} class="form-control col-md-3" name="a-edad" placeholder="Edad" min="15" max="50" required>
        </div>
        <div class="form-group">
            <input type="number" value={{$datos->curso}} class="form-control col-md-3" name="a-curso" placeholder="Curso" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label>Foto Actual</label><br>
            <img src="{{ asset('/storage/'. $datos->foto) }}" alt='foto del alumno' width='112' height='112'/><br><br>
            <label>Elegir Nueva Foto</label><br>
            <input type="file"  class="form-control" name="a-foto" id="a-foto">
        </div>
        <button type="submit" name="btEnviar" value={{$id}} class="btn btn-primary">Enviar</button>
        {{-- <a class="btn btn-primary" href="/alumno/delete" role="button">Eliminar un Alumno</a> --}}
    </form>
@endsection