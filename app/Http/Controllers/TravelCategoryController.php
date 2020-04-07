<?php

namespace App\Http\Controllers;

use App\TravelCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TravelCategoryController extends Controller
{
    public function index(){
        return TravelCategory::all();
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
        $store = new TravelCategory();
        $store->name = $validData['name'];
        $store->icon = url(Storage::url($name));
        $store->save();
        return TravelCategory::findOrFail($store->id);
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
        TravelCategory::findOrFail($id)->delete();
    }
}
