<?php

namespace App\Http\Controllers;

use App\Car;
use App\Category;
use App\Image;
use App\SoldCars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $sold = new SoldCars();
        $sold->car_id = $car->id;
        $sold->user_id = $user->id;
        $sold->total_price = $car->price + ($car->price * 3/100);
        $sold->save();
        return back();
        //$images = Image::all()->where('car_id', $id);
        //return view("cars.carbuy",compact('car','images'));
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
