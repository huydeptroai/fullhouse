<div class="wrapper-cart">

	<span class="icon-close-cart">
		<!-- <ion-icon name="close"></ion-icon> -->
		<ion-icon name="arrow-forward"></ion-icon>
	</span>

	<div class="cart-box">
		<h2>Cart</h2>

		<div class="content-cart" id="content-cart">
			<div class="product-box">
				<span class="icon-close">
					<ion-icon name="close"></ion-icon>
				</span>
				<a class="p-image" href="#">
					<div class="product-image">
						<figure><img src="#" alt="image_product"></figure>
					</div>
					<p class="product-name">Radiant-360 R6 Wireless Omnidirectional Speaker [White]</p>
				</a>
				<div class="p-info">
					<span class="product-price">$250.00</span>
					<span class="product-quantity"> <input type="number" value="1"></span>
					<span class="product-amount">$ 250.00</span>
				</div>
			</div>

		</div>
		

		<div class="summary-site-cart">
			<p class="total-cart">Total: $ 123</p>
			<div class="group-btn">
				<a href="{{ route('cart') }}" class="btn">View Cart</a>
				<a href="{{ Route('checkout') }}" class="btn">Checkout</a>
			</div>
		</div>

	</div>

</div>