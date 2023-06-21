@extends('template')
@section('content')
<h1 class="text-center">Edita el coche</h1>
<hr>
<form action="{{url('/car/update')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="mb-3">
        <label for="brand" class="form-label">Marca: </label>
        <input type="text" id="brand" name="n-brand" class="form-control" placeholder="Ingresa la marca aqui" value="{{$car->brand}}" required max="20">
    </div>
    <div class="mb-3">
        <label for="model" class="form-label">Modelo: </label>
        <input type="text" id="model" name="n-model" class="form-control" placeholder="Ingresa el modelo aqui" value="{{$car->model}}" required max="20">
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Año: </label>
        <input type="text" id="year" name="n-year" class="form-control" placeholder="Ingresa el año aqui" value="{{$car->year}}" required min="1950" max="2023">
    </div>
    <div class="mb-3">
        <label class="form-label">Foto Actual:</label>
        <img src="{{asset('/storage/'. $car->picture)}}" width='112' height='112'><br><br>
        <label for="picture" class="form-label">Elegir nueva foto: </label>
        <input type="file" id="picture" name="n-picture" class="form-control" >
    </div>
    <div class="mb-3 text-center">
        <button type="submit" class="btn btn-primary" name="submit" value="{{$id}}" >Actualizar</button>
    </div>
</form>

@endsection