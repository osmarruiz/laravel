<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperacionesController extends Controller
{
    public function Operaciones($num1,$op,$num2){
        switch($op){
            case '+':
                $suma = $num1 + $num2;
                return "$num1 + $num2 = $suma";
            case '-':
                $resta = $num1 - $num2;
                return "$num1 - $num2 = $resta";
            case '*':
                $mul = $num1 * $num2;
                return "$num1 * $num2 = $mul";
            case '/':
                $div = $num1 / $num2;
                return "$num1 / $num2 = $div";
            default:
                return "operacion no encontrada";
            }
    }
}
