<?php

namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    use MultiLanguage;

    protected $fillable = [
        'name_en', 'name_ar', 'name_tr',
    ];

    /**
     * This array will have the attributes which you want it to support multi languages
     */
    protected $multi_lang = [
        'name',
    ];










    public function tags()
    {
        return  $this->belongsToMany('App\Models\Tag', 'event_tags')->withTimestamps();
    }


    public function categories()
    {
        return  $this->belongsToMany('App\Models\Category', 'event_categories')->withTimestamps();
    }
}
