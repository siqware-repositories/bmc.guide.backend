<?php

namespace App\Http\Controllers;

use App\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RestaurantCategoryController extends Controller
{
    public function index(){
        return RestaurantCategory::all();
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $icon = $request->file('icon');
        $validData = $request->validate([
            'name'=>'required'
        ]);
        $img = Image::make($icon)->encode('png',90);
        $name = uniqid().'-'.time() . '.png';
        Storage::disk('public')->put($name, $img);
        $store = new RestaurantCategory();
        $store->name = $validData['name'];
        $store->icon = url(Storage::url($name));
        $store->save();
        return RestaurantCategory::findOrFail($store->id);
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        RestaurantCategory::findOrFail($id)->delete();
    }
}
