<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablasMultiplicar extends Controller{
    public function Tablas(){
        
        for($i = 1; $i<=10; $i++){
            for($j =1; $j <=10; $j++){
                $result = $i * $j;
                echo "$i * $j = $result <br>";

            }
            echo "<br>";
        }

    }

    public function TablasNum($num){
        for($i = 1; $i<=10; $i++){
            $result = $i * $num;
            echo"$num * $i = $result <br>";
        }
    }
}