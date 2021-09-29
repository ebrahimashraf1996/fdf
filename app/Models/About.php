<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{

    protected $table = "abouts";


    protected $fillable = ['content', 'photo', 'is_active', 'created_at', 'updated_at'];


    public function getActive(){
        return  $this -> is_active  == 0 ?  'غير مفعل'   : 'مفعل' ;
    }

    public function scopeActive($query){
        return $query -> where('is_active',1) ;
    }

    public function scopeSelection($query){
        return $query -> select([
            'id',
            'content',
            'photo',
            'is_active'
        ]) ;
    }

    public function  getPhotoAttribute($val){
        return ($val !== null) ? asset('assets/images/about/' . $val) : "";
    }

}
