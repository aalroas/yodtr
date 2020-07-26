<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class new_images extends Model
{


    protected $fillable = ['new_id', 'new_image_path'];

    public function new()
    {
        return $this->belongsTo('App\Models\News');
    }
}
