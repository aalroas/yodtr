<?php

namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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




    public function books()
    {
        return  $this->belongsToMany('App\Models\Book', 'book_tags')->withTimestamps();
    }


    public function posts()
    {
        return  $this->belongsToMany('App\Models\Post', 'post_tags')->withTimestamps();
    }

    public function events()
    {
        return  $this->belongsToMany('App\Models\Event', 'event_tags')->withTimestamps();
    }


    public function news()
    {
        return  $this->belongsToMany('App\Models\News', 'new_tags')->withTimestamps();
    }

    public function scientific_articles()
    {
        return  $this->belongsToMany('App\Models\ScientificArticle', 'scientificarticles_tags')->withTimestamps();
    }
}
