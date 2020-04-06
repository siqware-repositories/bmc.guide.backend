<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    public function gallery(){
        return $this->belongsTo(Gallery::class)->with('gallery_detail');
    }
}
