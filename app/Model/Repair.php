<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{

protected $fillable = ['repair_no','admission','labsent','labreturn','deliver','laboratory','producto','modelo','marca','serial','labcost','repaircost'
,'transportcost','markup','repair_total','status','file'];

public function product(){
    return $this->belongsTo(Category::class,'category_id','id'); 
}



}
