@extends('ejemploplantilla')

@section('contenido')
{{$res}}

<br />

@if (count($listado) > 0)
<table class='table'>
   <tr>
      <th scope='col'> Foto </th>
      <th scope='col'> Información </th>
   </tr>
   @foreach($listado as $data)
   <tr>
      <td align='center'>
         <img src="{{ asset('/storage/'. $data->foto) }}" alt='foto del alumno' width='112' height='112' />
      </td>
      <td> <b>No. de Carnet:</b> {{ $data->carnet }} <br />
         Nombre: {{ $data->nombre }} <br />
         Correo Electrónico: {{ $data->email }} <br />
         Edad: {{ $data->edad }} <br /> Curso Actual: {{ $data->curso }} <br />
         <a href="/alumno/eliminar/{{array_search($data,$listado)}}" role="button" class="btn btn-danger">Eliminar</a>
         <a href="/alumno/editar/{{array_search($data,$listado)}}" role="button" class="btn btn-primary">Editar</a>
      </td>
   </tr>
   @endforeach
</table>
@endif

<br />
<a href='/alumno/create' class='card-link'>Ir Atrás</a>

@endsection