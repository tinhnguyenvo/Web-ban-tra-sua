<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    protected $table = "hoadon";

    public function cthoadon(){
    	return $this->hasMany('app\cthoadon','id_hd','id'); // Mot hoa don co nhieu chi tiet hoa don
    }

    public function hoadon(){
    	return $this->belongTo('app\khachhang','id_hd','id'); // Mot hoa don co nhieu chi tiet hoa don
    }

    public function sanpham(){
    	return $this->belongsTo('app\sanpham','id_sp','id'); 
    }
}
