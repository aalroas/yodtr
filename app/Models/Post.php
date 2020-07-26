<?php


namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
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
        return  $this->belongsToMany('App\Models\Tag', 'post_tags')->withTimestamps();
    }


    public function categories()
    {
        return  $this->belongsToMany('App\Models\Category', 'post_categories')->withTimestamps();
    }



    public function user()
    {
        return $this->belongsTo("User");
    }



    public function post_images()
    {
        return $this->hasMany('App\Models\post_images');
    }
}
