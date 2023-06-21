@extends('template')
@section('content')
<br>
<br>
{{$result}}
<br>
<br>
@if (count($list) > 0)
<table class="table">
    <tr>
        <th scope='col'> Fotografia </th>
        <th scope='col'> Información </th>
    </tr>
    @foreach($list as $data)
    <tr>
        <td class="text-center">
            <img src="{{ asset('/storage/'. $data->picture) }}" alt='foto del coche' width='112' height='112' />
        </td>
        <td>
            <b>Marca:</b> {{ $data->brand }} <br />
            Modelo: {{ $data->model }} <br />
            Año de fabricaci&oacuten: {{ $data->year }} <br />
            <a href="/car/delete/{{array_search($data,$list)}}" role="button" class="btn btn-danger">Eliminar</a>
            <a href="/car/edit/{{array_search($data,$list)}}" role="button" class="btn btn-primary">Editar</a>
        </td>
    </tr>
    @endforeach
</table>
@endif
<br />
<a href='/car/create' class='btn btn-success'>Atras</a>
@endsection