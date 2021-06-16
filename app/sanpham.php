<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $table = "sanpham";

    public function loaisp(){
    	return $this->belongsTo('app\loaisp','id_loai','id'); // một sản phẩm chỉ thuộc về một loại sản phẩm
    }
    public function cthoadon(){
    	return $this->hasMany('app\cthoadon','id_sp','id'); // mot san pham se co nhieu trong chi tiet hoa don
    }
}
