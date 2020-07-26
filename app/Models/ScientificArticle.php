<?php

namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class ScientificArticle extends Model
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
        return  $this->belongsToMany('App\Models\Tag', 'ScientificArticle_categories')->withTimestamps();
    }


    public function categories()
    {
        return  $this->belongsToMany('App\Models\Category', 'ScientificArticle_tags')->withTimestamps();
    }




    public function user()
    {
        return $this->belongsTo("User");
    }
}
