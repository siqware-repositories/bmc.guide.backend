<?php

namespace App\Http\Controllers;

use App\MainLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MainLocationController extends Controller
{
    public function getLatLong($url){
        $lat_long = explode('@', $url);
        $lat_long = explode(',', $lat_long[1]);
        return $lat_long[0].','.$lat_long[1];
    }
    public function index(){
        return MainLocation::first();
    }
    public function update(Request $request,$id){
        $validData = $request->validate([
            'name'=>'required',
            'location_url'=>'required',
        ]);
        $icon = $request->
        $img = Image::make()->encode('jpg',75);
        $name = uniqid().'-'.time() . '.jpg';
        Storage::disk('public')->put($name, $img);
        $gallery = MainLocation::findOrFail($id);
        $gallery->name = $validData['name'];
        $gallery->location = $this->getLatLong($validData['location_url']);
        $gallery->location_url = $validData['location_url'];
        $gallery->save();
    }
}
