<h1 class="site-heading text-center text-white d-none d-lg-block">
	<div id="cart" class="site-heading-upper text-right" style="font-size:medium">
		<!--i class="fas fa-shopping-cart"></i-->
		<!--a href="/cart">Your Cart</a-->
		<a href="/shoppingcart"><i class="fas fa-shopping-cart"></i>Your Cart
			<span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalquantity : '' }}</span>
		</a>
	</div>
    <span class="site-heading-upper text-primary mb-3">A Free Bootstrap 4 Business Theme</span>
    <span class="site-heading-lower">Business Casual</span>
</h1>