<?php

namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
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


    public function universities()
    {
        return  $this->belongsToMany('App\Models\University', 'university_departments')->paginate(5);
    }



    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_departments')->paginate(5);
    }

}
