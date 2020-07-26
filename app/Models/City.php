<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\MultiLanguage;
class City extends Model
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

    public function branches()
    {
        return $this->belongsTo('App\Models\Branch', 'city_id', 'id');
    }




}
