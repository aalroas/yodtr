<?php

namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    use MultiLanguage;

    protected $fillable = [
        'title_ar', 'title_en', 'title_tr',
        'text_ar', 'text_en', 'text_tr',
    ];

    /**
     * This array will have the attributes which you want it to support multi languages
     */
    protected $multi_lang = [
        'title',
        'text'
    ];
    public function branch()
    {
        return  $this->hasOne('App\Models\Branch', 'id', 'branch_id');
    }
}
