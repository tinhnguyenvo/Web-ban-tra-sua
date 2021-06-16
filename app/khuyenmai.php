<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khuyenmai extends Model
{
    public $timestamps = false;
    protected $table = "khuyenmai";

    public function ctkhuyenmai(){
    	return $this->hasMany('app\ctkhuyenmai','id_km','id'); // Mot hoa don co nhieu chi tiet hoa don
    }
}
