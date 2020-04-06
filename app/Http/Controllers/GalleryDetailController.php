<?php

namespace App\Http\Controllers;

use App\GalleryDetail;
use App\Travel;

class GalleryDetailController extends Controller
{
    public function destroy($id){
        GalleryDetail::findOrFail($id)->delete();
    }
}
