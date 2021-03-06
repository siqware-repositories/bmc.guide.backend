<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Travel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TravelController extends Controller
{
    public function getLatLong($url){
        $lat_long = explode('@', $url);
        $lat_long = explode(',', $lat_long[1]);
        return $lat_long[0].','.$lat_long[1];
    }
    public function index(){
        return Travel::with('gallery')->get();
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $thumbnail = $request->file('thumbnail');
        $galleries = $request->file('galleries');
        $validData = $request->validate([
            'galleries.*'=>'required',
            'thumbnail'=>'required',
            'title'=>'required',
            'location'=>'required',
            'description'=>'required',
            'category'=>'required',
        ]);
        $gallery = new Gallery();
        $gallery->title = 'Travel title';
        $gallery->description = 'Travel Description';
        $gallery->save();
        foreach ($galleries as $file){
            $img = Image::make($file)->encode('png',100);
            $name = uniqid().'-'.time() . '.png';
            Storage::disk('public')->put($name, $img);
            DB::table('gallery_details')->insert([
                'gallery_id'=>$gallery->id,
                'url'=>url(Storage::url($name)),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
        $img = Image::make($thumbnail)->encode('png',100);
        $name = uniqid().'-'.time() . '.png';
        Storage::disk('public')->put($name, $img);

        $store = new Travel();
        $store->gallery_id = $gallery->id;
        $store->title = $validData['title'];
        $store->thumbnail = url(Storage::url($name));
        $store->description = $validData['description'];
        $store->location = $this->getLatLong($validData['location']);
        $store->location_url = $validData['location'];
        $store->category = $validData['category'];
        $store->save();
        return Travel::with('gallery')->where('id',$store->id)->first();
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
        Travel::findOrFail($id)->delete();
    }
}
