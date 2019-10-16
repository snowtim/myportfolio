<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use App\Cart;

use Session;

class ProductController extends Controller
{	

	public function productindex() {

		$products = Product::all();

		return view('index', compact('products'));

		/*return view('Product.product', compact('products'));*/

	}

	public function create() {

		if(Auth::user()->adminright) {
			return view('Product.create');
		} else {
			return view('home');
		}

	}

	public function store(Request $request) {

		$validator = Validator::make($request->all(), [
			'product_id' => ['required', 'string', 'max:255'],
			'product_name' => ['required', 'string', 'max:255'],
			'description' => ['required', 'string', 'max:255'],
			'price' => ['required', 'string']
		]);

		Product::create([
			'product_id' => $request['product_id'],
			'product_name' => $request['product_name'],
			'description' => $request['description'],	
			'price' => $request['price'],
			'picture' => $request['picture'],
			'pic_name' => $_FILES['picture']['name'],
			'pic_type' => $_FILES['picture']['type'],
			'pic_tmp_name' => $_FILES['picture']['tmp_name'],
			'pic_size' => $_FILES['picture']['size']
		]);

		$request->file('picture')->move('~/formal/flowerofspring/public/webimg/', Product::where('product_id', $request['product_id'])->get()->first()->pic_name);

		return redirect('/products');

	}

	public function show($id) {

		$product = Product::where('id', '=', $id)->get(); 
		//dd(session());
		//dd($product->first());
		return view('Product.show', compact('product'));

	}

	public function edit($id) {
//dd(Auth::check());
		if(Auth::check() == true) {

			if(Auth::user()->adminright) {

				$product = Product::find($id);

				return view('Product.edit', compact('product'));

			} else {

				return view('home');

			}

		} else {

			return redirect('/products');

		}

	}

	public function update(Request $request, $id) {

		$validator = Validator::make($request->all(), [
			'product_name' => ['required', 'string', 'max:255'],
			'description' => ['requ1ired', 'string', 'max:255'],
			'price' => ['required', 'string']
		]);


		$product = Product::where('id', '=', $id)->update([
			'product_name' => $request['product_name'],
			'description' => $request['description'],
			'price' => $request['price']
		]);

		return redirect('/products');

	}

	public function delete($id) {

		$product = Product::where('id', '=', $id);

		$product->delete();

		return redirect('/products');

	}

	public function addtocart(Request $request, $id) {

		$product = Product::where('id', '=', $id)->get()->first();
		$oldcart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldcart);
		$cart->add($product, $product->id);

		$request->session()->put('cart', $cart);
		return redirect('/');
	}

	public function shoppingcart() {

		return view('Cart.shoppingcart');

	}

}
