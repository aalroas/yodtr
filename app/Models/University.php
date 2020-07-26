<?php

namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use MultiLanguage;

    protected $fillable = [
        'name_en', 'name_ar', 'name_tr',
        'overview_en', 'overview_ar', 'overview_tr',
        'contact_details_en', 'contact_details_ar', 'contact_details_tr',
    ];

    /**
     * This array will have the attributes which you want it to support multi languages
     */
    protected $multi_lang = [
        'name',
        'overview',
        'contact_details',
    ];







    public function languages()
    {
        return  $this->belongsToMany('App\Models\Language', 'university_languages')->withTimestamps();
    }


    public function departments()
    {
        return  $this->belongsToMany('App\Models\Department', 'university_departments')->withTimestamps();
    }


    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_universities')->paginate(5);
    }

    public function city()
    {
        return  $this->hasOne('App\Models\City', 'id', 'city_id');
    }



    public function branch()
    {
        return  $this->hasOne('App\Models\Branch', 'id', 'branch_id');
    }




}
