<?php

namespace App\Http\Controllers;

use App\Car;
use App\Category;
use App\Image;
use Illuminate\Http\Request;

class CarsUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index()
    {
        $cars = Car::get();
        if ($cars){
            return view('carsuser',compact('cars'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $car = Car::find($id);
        $images = Image::all()->where('car_id', $id);
        return view("cars/carShow",compact('car','images'));
    }

    public function edit($id)
    {

    }
    public function buy($id)
    {
        $car = Car::find($id);
        $images = Image::all()->where('car_id', $id);
        return view("cars.carbuy",compact('car','images'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
