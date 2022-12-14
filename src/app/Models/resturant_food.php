<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resturant_food extends Model
{
    use HasFactory;


    public $fillable=["resturant_id","food_id","isVisiable","price","currency_id"];

    public $hidden=["created_at","updated_at"];


    public function currency(){

        return $this->belongsTo("\App\Models\currency","currency_id");

    }


    public function wishlists(){

        return $this->hasMany("\App\Models\wishlist","resturant_food_id");
    }

    public function carts(){


        return $this->hasMany("\App\Models\cart","resturant_food_id");
    }


}
