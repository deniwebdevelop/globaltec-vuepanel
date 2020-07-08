<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id'); 
    }


    public function ptype(){
        return $this->belongsTo(Ptype::class,'ptype_id','id'); 
    }
}
