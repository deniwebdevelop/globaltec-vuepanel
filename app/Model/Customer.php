<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = ['name','company','mobile_no','mobile_two','mobile_three','email','position','country','state','city','address','postal'
    ,'cuit','website','status'];
}
