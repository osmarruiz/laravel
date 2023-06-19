<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludoController extends Controller
{
    public function Mensaje($nombre){
        return "hola, {$nombre}!";
    }
    public function Saludar($nombre){
        return strtoupper($nombre);
    }

    public function Comparar($nom1, $nom2){
        $i= strcmp($nom1, $nom2);
        if($i<0)
            return "{$nom1} es menor";
        else if($i==0)
            return "Son iguales";
        else
            return "{$nom2} es menor";
    }

    public function CalcularEdad($nombre, $anyo_nac) {
        $edad = date("Y") - $anyo_nac;
        return view('VistaEdad', compact('nombre','edad'));
    }

    public function ComparaNombres($nombre1, $nombre2)
    {
        $res=strcmp($nombre1,$nombre2);
        return view("ComparaView")->with("nombre1",$nombre1)->with("nombre2",$nombre2)->with("res",$res);
    }
}
