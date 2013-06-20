<?php 

	if ( is_xhr() || isset( $_GET[ 'callback' ] ) && trim( $_GET[ 'callback' ] ) !== "" ) {
		if ( is_xhr() ) {
			header( "Content-type: text/json" );
			echo json_encode( $product );
		} else {
			$callback = preg_replace( '|[^a-z0-9-_$]|i', '', $_GET[ 'callback' ] );
			header( "Content-type: text/javascript" );
			echo $callback . "(" . json_encode( $product ) . ");";
		}

		exit;
	}

?>

<?php include dirname( __FILE__ ) . "/../partials/header.php" ?>

	<article class="product-details">
		<div class="primary-visuals">
			<img src="/products/<?= $product[ 'photos' ][0][ 'filename' ] ?>" width="800" height="533" class="product-thumbnail">
		</div>
		<form action="." method="POST" class="primary-details">
			<h2><?= $product[ 'name' ] ?></h2>
			<p class="price">$<?= $product[ 'price' ] ?> <span class="currency"><?= $product[ 'currency' ] ?></span></p>
			<div class="description shorten">
				<?= isset( $product[ 'long_description' ] ) ? $product[ 'long_description' ] : $product[ 'description' ] ?>
			</div>

			<div class="price-colors">

				<h3>Color Choices</h3>
				<select name="color">
					<option value="blue">Blue</option>
					<option value="red">Red</option>
					<option value="orange">Orange</option>
				</select>
				<ul class="color-choices">
					<li class="current" data-value="blue" title="Blue" style="background-color: blue;"></li><li title="Red" data-value="red" style="background-color: red;"></li><li title="Orange" data-value="orange" style="background-color: orange;"></li>
				</ul>
			</div>

			<button class="add-to-cart" type="submit">Add to Cart</button>
		</form>
	</article>

<?php include dirname( __FILE__ ) . "/../partials/footer.php" ?>