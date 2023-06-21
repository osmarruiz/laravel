@extends('template')

@section('content')
<h1 class="text-center">Registra tu coche aqui</h1>
<hr>
<form action="{{url('/car/insert')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="mb-3">
        <label for="brand" class="form-label">Marca: </label>
        <input type="text" id="brand" name="n-brand" class="form-control" placeholder="Ingresa la marca aqui" required max="20">
    </div>
    <div class="mb-3">
        <label for="model" class="form-label">Modelo: </label>
        <input type="text" id="model" name="n-model" class="form-control" placeholder="Ingresa la modelo aqui" required max="20" >
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Año: </label>
        <input type="text" id="year" name="n-year" class="form-control" placeholder="Ingresa el año aqui" required min="1950" max="2023">
    </div>
    <div class="mb-3">
        <label for="picture" class="form-label">Foto: </label>
        <input type="file" id="picture" name="n-picture" class="form-control" required>
    </div>
    <div class="mb-3 text-center">
        <button type="submit" class="btn btn-primary" name="submit" value="submitted" >Enviar</button>
    </div>
</form>

@endsection