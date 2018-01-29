<?php

namespace App\Http\Controllers;

use App\Car;
use App\Category;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;
use Illuminate\Support\Facades\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $categories = Category::orderBy('title', 'asc')->get();
        $cars = Car::paginate(8);
        if ($cars || $categories){
            return view('cars',compact('cars','categories'));
        }
    }
    //filter with paginate by category
    public function category($id)
    {
        $categories = Category::orderBy('title', 'asc')->get();
        $cars = Car::where('category_id', $id)->paginate(8);
        if ($cars || $categories){
            return view('cars',compact('cars','categories'));
        }
    }

    public function create()
    {
        $categories = Category::get();
        return view('cars/create',compact('categories'));
    }


    public function store(Request $request)
    {
        $validator = $this->validate($request, array(
            'name' => 'required|string|max:255|unique:cars',
            'price'=> 'required|numeric|min:100000',
            'logo' => 'required|mimes:jpeg,jpg,png',
            "images.*" => 'sometimes|mimes:jpeg,jpg,png',
            'description' => 'sometimes|nullable|string|max:255',
            'tax'=> 'sometimes|nullable|integer|numeric|max:100',
            'category_id'=>'numeric'
        ));
        $car = new Car();
        $car->name = $request->name;
        $car->description = $request->description;
        $car->price = $request->price;
        $car->tax = $request->tax;
        $car->category_id = $request->category_id;
        //logo
        $logo = Input::file('logo');
        $logoName = $request->name . '.' . $logo->getClientOriginalExtension();
        $car->logo = $logoName;
        $logo->move(public_path('/uploads/logo'), $logoName);
        $car->save();
        //images
        //$images = Input::file('images[]');
        $i = 0;
        if($images=$request->file('images')) {
            var_dump($images);
            foreach ($images as $image) {
                $imageName = $car->name . $i . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/images'), $imageName);
                $i++;
                if($validator) {
                    $imageDB = new Image();
                    $imageDB->title = $imageName;
                    $imageDB->car_id = $car->id;
                    $imageDB->save();
                }
            }
        }
        return back()->with('status', 'Car Added Successfully!');
    }

    public function show($id)
    {
        $car = Car::find($id);
        $images = Image::all()->where('car_id', $id);
        return view("cars/carShow",compact('car','images'));
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
            File::delete($car->logo);
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
        File::delete(public_path("uploads/logo/$car->logo"));
        $car->delete();
        //delete the car'images
        $images = Image::all()->where('car_id',$id);
        if($images) {
            foreach ($images as $image) {
                File::delete(public_path("uploads/images/$image->title"));
                $image->delete();
            }
        }
        return redirect('./cars');
    }
}
