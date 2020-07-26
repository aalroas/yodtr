<?php

namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use MultiLanguage;

    protected $fillable = [
        'name_en', 'name_ar', 'name_tr',
        'description_en', 'description_ar', 'description_tr',
    ];

    /**
     * This array will have the attributes which you want it to support multi languages
     */
    protected $multi_lang = [
        'name',
        'description'
    ];



    public function city()
    {
        return  $this->hasOne('App\Models\City','id','city_id');
    }

    public function users()
    {
        return  $this->hasOne('App\Models\User', 'branch_id', 'id');
    }





}
