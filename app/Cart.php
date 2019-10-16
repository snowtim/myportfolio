<?php

namespace App;

class Cart
{

	public $items = null;
	public $totalquantity = 0;
	public $totalprice = 0;
	
	public function __construct($oldCart) {

		if($oldCart) {
			$this->items = $oldCart->items;
			$this->totalquantity = $oldCart->totalquantity;
			$this->totalprice = $oldCart->totalprice;
		}

	}

	public function add($item, $id) {
		$storeItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

		if($this->items) {
			if(array_key_exists($id, $this->items)) {
				$storeItem = $this->items[$id];
			}
		}
		$storeItem['qty']++;
		$storeItem['price'] = $item->price * $storeItem['qty'];
		$this->items[$id] = $storeItem;
		$this->totalquantity++;
		$this->totalprice += $item->price;
	}

}