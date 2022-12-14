<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class currency extends Model
{
    use HasFactory,HasTranslations;

    public $fillable=["code","name","is_default_for_website","precent_value_in_dular"];
    public $hidden=["created_at","updated_at"];
    public $translatable = ['name'];


    public function resturant_food(){

        return $this->hasMany("\App\Models\\resturant_food","currency_id");
    }


    public function getIs_default_for_websiteAttribute($value){

        return ($value)?trans("admin.yes"):trans("admin.no");

    }

    public function tabletype(){

        return $this->belongsToMany("\App\Models\\tabletype","currency_id");
    }
    public function jobs(){

        return $this->hasMany("App\Models\job","currency_id");

    }



}
