<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use stdClass;

class CarController extends Controller
{
    public function create()
    {
        return view('car.create');
    }

    public function insert(request $request)
    {
        $carsArray = array();
        $result = " ";
        $listNull = array();

        if ($request->isMethod("post") && $request->has("submit")) {
            if (Storage::disk('local')->exists('file_cars.txt')) {
                $file = Storage::get('file_cars.txt');
                $carsArray = unserialize($file);
            }
            $picture = $request->file("n-picture");
            $namepicture = $picture->getClientOriginalName();
            Storage::disk('public')->put($namepicture, File::get($picture));

            $carObject = new stdClass();
            $carObject->brand = $request->input("n-brand");
            $carObject->model = $request->input("n-model");
            $carObject->year = $request->input("n-year");
            $carObject->picture = $namepicture;
            //se guarda el objeto en una lista de objetos
            array_push($carsArray, $carObject);
            $carsSerealize = serialize($carsArray);
            Storage::disk('local')->put('file_cars.txt', $carsSerealize);
            $result = "Coche guardado correctamente";
            return view('car.action')->with('result', $result)->with('list', $listNull);
        }
    }
    public function update(Request $request)
    {
        $carsArray = array();
        $listNull = array();
        $id = $request->input("submit");
        if ($request->isMethod("post") && $request->has("submit")) {
            if (Storage::disk('local')->exists('file_cars.txt')) {
                $file = Storage::get('file_cars.txt');
                $carsArray = unserialize($file);
            }
            $carsArray[$id]->brand = $request->input('n-brand');
            $carsArray[$id]->model = $request->input('n-model');
            $carsArray[$id]->year = $request->input('n-year');

            if ($request->file('n-picture') != null) {
                if (Storage::disk('public')->exists($carsArray[$id]->picture)) {
                    Storage::disk('public')->delete($carsArray[$id]->picture);
                }
                $picture = $request->file("n-picture");
                $namepicture = $picture->getClientOriginalName();
                Storage::disk('public')->put($namepicture, file::get($picture));
                $carsArray[$id]->picture = $namepicture;
            }
            $carsSerealize = serialize($carsArray);
            Storage::disk('local')->put('file_cars.txt', $carsSerealize);
            $result = "Coche actualizado correctamente";
            return view('car.action')->with('result', $result)->with('list', $listNull);
        }
    }
    public function list()
    {
        $carsArray = array();
        if (storage::disk('local')->exists('file_cars.txt')) {
            $file = Storage::get('file_cars.txt');
            $carsArray = unserialize($file);
        }
        return view('car.action')->with('result', null)->with('list', $carsArray);
    }
    public function delete($id)
    {
        $carsArray = array();
        $listNull = array();
        if (Storage::disk('local')->exists('file_cars.txt')) {
            $file = Storage::get('file_cars.txt');
            $carsArray = unserialize($file);
        }
        if (Storage::disk('public')->exists($carsArray[$id]->picture)) {
            Storage::disk('public')->delete($carsArray[$id]->picture);
        }
        unset($carsArray[$id]);
        sort($carsArray);
        $carsSerealize = serialize($carsArray);
        Storage::disk('local')->put('file_cars.txt', $carsSerealize);
        $result = "Coche eliminado correctamente";
        return view('car.action')->with('result', $result)->with('list', $listNull);
    }
    public function edit($id)
    {
        $carsArray = array();
        if (Storage::disk('local')->exists('file_cars.txt')) {
            $file = Storage::get('file_cars.txt');
            $carsArray = unserialize($file);
        }
        return view('car.edit')->with('car', $carsArray[$id])->with('id', $id);
    }
}
