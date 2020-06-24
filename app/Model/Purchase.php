<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id'); 
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id'); 
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id'); 
    }

    public function product(){
        return $this->belongsTo(Category::class,'category_id','id'); 
    }
}
