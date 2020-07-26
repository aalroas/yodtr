<?php

namespace App\Models;

use App\Models\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class AchievementType extends Model
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

    public function achievements()
    {
        return  $this->belongsToMany('App\Models\Achievement', 'achievements_achievement_types')->paginate(5);
    }

}
