<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RentCar;

class RentCarController extends Controller
{
    public function index()
    {
        $vehicles = RentCar::all();
        return view('rent-cars.index')->with('vehicles', $vehicles);
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $newCar = new RentCar();

        $newCar->brand = $request->input('brand');
        $newCar->model = $request->input('model');
        $newCar->year = $request->input('year');
        $newCar->color = $request->input('color');
        $newCar->km = $request->input('km');
        $newCar->fuel = $request->input('fuel');

        $newCar->save();
        return view('rent-cars.view')->with('rent-cars', $newCar)
        ->with('msg', 'Veículo cadastrado com sucesso!');
    }

    public function show($id)
    {
        $getCarById = RentCar::find($id);
        if($getCarById){
            return view('rent-cars.edit')->with('rent-cars', $getCarById);
        }
        return view('rent-cars.show')->with('msg', 'Veículo não encontrado!');
    }

    public function edit($id)
     {
        $editCarById = RentCar::find($id);

        if($editCarById){
            return view('rent-cars.edit')->with('rent-cars', $editCarById);
        }

        $editCarById = RentCar::all();
        return view('rent-cars.index')->with('rent-cars', $editCarById)
            ->with('msg', 'Veículo não encontrado!');
    }

    public function update(Request $request, $id)
    {
        $updateCarById = RentCar::find($id);

        $updateCarById->brand = $request->input('brand');
        $updateCarById->model = $request->input('model');
        $updateCarById->year = $request->input('year');
        $updateCarById->color = $request->input('color');
        $updateCarById->km = $request->input('km');
        $updateCarById->fuel = $request->input('fuel');

        $updateCarById->save();

        $updateCarById = RentCar::all();
        return view('rent-cars.index')->with('rent-cars', $updateCarById)
            ->with('msg', 'Veículo atualizado com sucesso!');
    }
    public function destroy($id)
     {
        $deleteById = RentCar::find($id);

        $deleteById->delete();

        $deleteById = RentCar::all();

        return view('rent-cars.index')->with('vehicles', $deleteById)
        ->with('msg', "Veículo excluído com sucesso!");
     }
}
