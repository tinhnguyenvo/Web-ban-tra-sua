<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    protected $table = "khachhang";
    public function hoadon(){
    	return $this->hasMany('app\hoadon','id_kh','id'); // mot khach hang co nhieu hoa don
    }
}
