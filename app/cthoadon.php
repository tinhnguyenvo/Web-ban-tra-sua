<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cthoadon extends Model
{
    protected $table = "cthoadon";

    public function sanpham(){
    	return $this->hasMany('app\sanpham','id_sp','id'); 
    }

    public function hoadon(){
    	return $this->belongsTo('app\hoadon','id_hd','id');  // Mot chi tiet hoa don se thuoc ve mot hoa don nao do
    }
}
 