<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisp extends Model
{
    protected $table = "loaisp";

    public function sanpham(){
    	return	$this->hasMany('app\sanpham' , 'id_loai' , 'id'); // một loại sản phẩm có thể chứa nhiều sản phẩm
    }
}
