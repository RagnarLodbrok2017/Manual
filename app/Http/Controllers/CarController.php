<?php

namespace App\Http\Controllers;

use App\Car;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;
class CarController extends Controller
{

    public function index()
    {
        $cars = Car::get();
        if ($cars){
            return view('cars',compact('cars'));
        }
    }

    public function create()
    {
        $categories = Category::get();
        return view('cars/create',compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255|unique:cars',
            'price'=> 'required|numeric|min:100000',
            'logo' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required|string|max:255',
            'tax'=> 'sometimes|nullable|integer|numeric|max:100',
            'category_id'=>'numeric'
        ));
        $car = new Car();
        $car->name = $request->name;
        $car->description = $request->description;
        $car->price = $request->price;
        $car->tax = $request->tax;
        $car->category_id = $request->category_id;
        $logo = Input::file('logo');
        $logoName = $request->name . '.' . $logo->getClientOriginalExtension();
        $car->logo = $logoName;
        $logo->move(public_path('/uploads/logo'), $logoName);
        $car->save();
        return back()->with('status', 'Car Added Successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::get();
        $car = Car::find($id);
        return view('cars/edit',compact('car','categories'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'price'=> 'required|numeric|min:100000',
            'logo' => 'sometimes|nullable|mimes:jpeg,jpg,png',
            'description' => 'required|string|max:255',
            'tax'=> 'sometimes|nullable|integer|numeric|max:100',
            'category_id'=>'numeric'
        ));
        $car = Car::find($id);
        if( Input::hasFile('logo') ){
            $logo = Input::file('logo');
            $logoName = $request->name . '.' . $logo->getClientOriginalExtension();
            $car->logo = $logoName;
            $logo->move(public_path('/uploads/logo'), $logoName);
        }else{
            $logoNameWithoutExtensions = explode(".", $car->logo);
            $i = 0;
            foreach ($logoNameWithoutExtensions as $logoNameWithoutExtension){
                if($logoNameWithoutExtension == "jpeg" ||$logoNameWithoutExtension ==  "jpg" ||$logoNameWithoutExtension ==  "png"){
                    $extension = $logoNameWithoutExtensions[$i];
                }
                $i++;
            }
            $logoNewName = "$request->name.$extension";
            File::move(public_path("/uploads/logo/$car->logo"), public_path("/uploads/logo/$logoNewName"));
            $car->logo = $logoNewName;
        }
        $car->update($request->except('logo'));
        return redirect('/cars')->with('status', 'Car Updated Successfully!');
    }


    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect('./cars');
    }
}
