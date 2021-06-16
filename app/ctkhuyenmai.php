<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctkhuyenmai extends Model
{
    protected $table = "ctkhuyenmai";
    public $timestamps = false;
    public function sanpham(){
    	return $this->hasMany('app\sanpham','id_sp','id'); 
    }

    public function khuyenmai(){
    	return $this->belongsTo('app\khuyenmai','id_km','id');  // Mot chi tiet hoa don se thuoc ve mot hoa don nao do
    }
}
 