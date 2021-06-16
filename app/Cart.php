<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
//Thêm sản phẩm vào giỏ hàng
	public function add($item, $id){
		$giohang = ['qty'=>0, 'price' => $item->unit_or_promotion_price, 'gia' => $item->gia, 'giakm' => $item->giakm, 'item' => $item];
		if($this->items){
		 if(array_key_exists($id, $this->items)){
		  $giohang = $this->items[$id];
		 }
		}
		$giohang['qty']++;
		if($item->giakm == 0) {
		 $item->unit_or_promotion_price = $item->gia;
		} else {
		 $item->unit_or_promotion_price = $item->giakm;
		}
		$giohang['price'] = $item->unit_or_promotion_price * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $item->unit_or_promotion_price;
	   }
//Them sản phẩm theo số lượng vào giỏ hàng
	public function addSL($item, $id, $sl){
		$giohang = ['qty'=>0, 'price' => $item->unit_or_promotion_price, 'gia' => $item->gia, 'giakm' => $item->giakm, 'item' => $item];
		if($this->items){
		if(array_key_exists($id, $this->items)){
		$giohang = $this->items[$id];
			}
		}
		$giohang['qty']+=$sl;
		if($item->giakm == 0) {
		$item->unit_or_promotion_price = $item->gia;
		} else {
		$item->unit_or_promotion_price = $item->giakm;
		}
		$giohang['price'] = $item->unit_or_promotion_price * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty+=$sl;
		$this->totalPrice = $giohang['price'];
	}


	//xóa 1
	public function reduceByOne($id){
	
		$this->items[$id]['qty']--;

		if($this->items[$id]['item']['giakm'] == 0){
			$this->items[$id]['price'] -=   $this->items[$id]['item']['gia'] ;
			$this->totalQty--;
			$this->totalPrice -= $this->items[$id]['item']['gia'];

			if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
			}
		}
		else{
			$this->items[$id]['price'] -=   $this->items[$id]['item']['giakm'] ;
			$this->totalQty--;
			$this->totalPrice -= $this->items[$id]['item']['giakm'];

			if($this->items[$id]['qty']<=0){
				unset($this->items[$id]);
			}
		}
	
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
