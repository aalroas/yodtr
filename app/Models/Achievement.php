<?php

namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use MultiLanguage;

    protected $fillable = [
        'student_name_ar', 'student_name_en', 'student_name_tr',
        'title_ar', 'title_en', 'title_tr',
        'body_ar', 'body_en', 'body_tr',
    ];

    /**
     * This array will have the attributes which you want it to support multi languages
     */
    protected $multi_lang = [
        'student_name',
        'title',
        'body'
    ];


    public function achievementtypes()
    {
        return  $this->belongsToMany('App\Models\AchievementType', 'achievements_achievement_types')->withTimestamps();
    }

    public function branch()
    {
        return  $this->hasOne('App\Models\Branch', 'id', 'branch_id');
    }


}
