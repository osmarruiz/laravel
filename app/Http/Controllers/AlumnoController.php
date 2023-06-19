<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use stdClass;

class AlumnoController extends Controller
{
    public function create()
    {
       return view('alumno.create');
    }
 
    public function insert(Request $request)
    {
       $alumnos = array();
       $resultado = " ";
       $lista = array();
 
       if ($request->isMethod("post") && $request->has("btEnviar")) {
 
          if (Storage::disk('local')->exists('archivo_alumnos.txt')) {
             $file = Storage::get('archivo_alumnos.txt');
             $alumnos = unserialize($file);
          }
 
          $foto = $request->file("a-foto");
          //obtenemos el nombre del archivo
          $nombrearchivofoto = $foto->getClientOriginalName();
          //indicamos que queremos guardar un nuevo archivo en el disco local
          Storage::disk('public')->put($nombrearchivofoto,  File::get($foto));
 
          $al = new stdClass();
          $al->email = $request->input("a-email");
          $al->nombre = $request->input("a-nombre");
          $al->carnet = $request->input("a-ncarnet");
          $al->edad = $request->input("a-edad");
          $al->curso = $request->input("a-curso");       
          $al->foto = $nombrearchivofoto;
 
          array_push($alumnos, $al);
          $alumnosSerialice = serialize($alumnos);
          Storage::disk('local')->put('archivo_alumnos.txt', $alumnosSerialice);
 
          $resultado = "Registro guardado satisfactoriamente...";
       }
 
       return view('alumno.resformu')->with('res', $resultado)->with('listado', $lista);
    }
 
    public function list()
    {
       $lista = array();
 
       if (Storage::disk('local')->exists('archivo_alumnos.txt')) {
          $file = Storage::get('archivo_alumnos.txt');
          $lista = unserialize($file);
          return view('alumno.resformu')->with('res', null)->with('listado', $lista);
       }
       return view('alumno.resformu')->with('res', null)->with('listado', $lista);
    }
      // Funcion eliminar
   public function eliminar ($id){
      $lista = array();
      $alumnos = array();

      if (Storage::disk('local')->exists('archivo_alumnos.txt')) {
         $file = Storage::get('archivo_alumnos.txt');
         $lista = unserialize($file);
      }

      unset($lista[$id]);
      sort($lista);
      
      $alumnosSerialice = serialize($lista);
      Storage::disk('local')->put('archivo_alumnos.txt', $alumnosSerialice);

      $resultado = "Registro eliminado satisfactoriamente...";
      return view('alumno.resformu')->with('res', $resultado)->with('listado', $alumnos);
   }


   //Funcion edit
   public function edit($id){
      $lista = array();
      if (Storage::disk('local')->exists('archivo_alumnos.txt')) {
         $file = Storage::get('archivo_alumnos.txt');
         $lista = unserialize($file);
      }
      
      return view('alumno.edicion')->with('datos',$lista[$id])->with('id',$id);
   }


   //Funcion update
   public function update(Request $request){
      $lista = array();
      $alumnos = array();
      $resultado = " ";
      $id = $request->input("btEnviar");

      if ($request->isMethod("post") && $request->has("btEnviar")) {

         if (Storage::disk('local')->exists('archivo_alumnos.txt')) {
            $file = Storage::get('archivo_alumnos.txt');
            $lista = unserialize($file);
         }

         //Se actualizan los registros sin incluir la foto
         $lista[$id]->email = $request->input("a-email");
         $lista[$id]->nombre = $request->input("a-nombre");
         $lista[$id]->carnet = $request->input("a-ncarnet");
         $lista[$id]->edad = $request->input("a-edad");
         $lista[$id]->curso = $request->input("a-curso");

         //Verifica si se cambio la foto antes de actualizarla
         if ($request->file("a-foto") != null){
            $foto = $request->file("a-foto");
            //obtenemos el nombre del archivo
            $nombrearchivofoto = $foto->getClientOriginalName();
            //indicamos que queremos guardar un nuevo archivo en el disco local
            Storage::disk('public')->put($nombrearchivofoto,  File::get($foto));
            $lista[$id]->foto = $nombrearchivofoto;
         }
         
         $alumnosSerialice = serialize($lista);
         Storage::disk('local')->put('archivo_alumnos.txt', $alumnosSerialice);
      }
      $resultado = "Registro actualizado satisfactoriamente...";
      return view('alumno.resformu')->with('res', $resultado)->with('listado', $alumnos);
      
   }
}
