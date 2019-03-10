<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use App\Order;

class OrderController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	public function ordercreate() {

		$orders = Order::where('user_id', '=', Auth::user()->id)->get();

		return view('Order.buy', compact('orders'));

	}

	public function orderstore(Request $request) {

		$result_product = Product::where('id', '=', $request['id'])->value('price');
		$total_price =	$request['quantity'] * $result_product;
		Order::create([
			'quantity' => $request['quantity'],
			'total_price' => $total_price,
			'order_description' => $request['order_description'],
			'user_id' => Auth::user()->id
		]);

		return redirect('/order/buy');

	}
	
	public function destroy() {

		Order::find($_POST['id'])->delete();

		return redirect('/order/buy');

	}
	
}
