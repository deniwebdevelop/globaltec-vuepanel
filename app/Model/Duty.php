<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    public function customer(){
        return $this->hasMany(Customer::class,'customer','id');
    }
}
