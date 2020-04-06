<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function gallery(){
        return $this->belongsTo(Gallery::class)->with('gallery_detail');
    }
}
