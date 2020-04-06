<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        return response()->json(['url'=>url('/images/'.$imageName)]);
    }
    public function file_upload(Request $request){
        $file = $request->file('file');
        $img = Image::make($file)->encode('png',100);
        $name = uniqid().'-'.time() . '.png';
        Storage::disk('public')->put($name, $img);
        return response()->json(['path'=>url(Storage::url($name))]);

    }
}
