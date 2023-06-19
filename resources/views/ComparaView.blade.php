@extends('ejemploplantilla')
 
@section('contenido')
@if($res<0)
    El nombre <b>{{$nombre1}}</b> es menor que {{$nombre2}}
@else
    @if($res>0)
        El nombre <b>{{$nombre1}}</b> es mayor que {{$nombre2}}
    @else
        Los nombres <b>{{$nombre1}}</b> y {{$nombre2}} son iguales
    @endif
@endif
@endsection