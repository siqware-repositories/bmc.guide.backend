<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function gallery_detail(){
        return $this->hasMany(GalleryDetail::class);
    }
}
