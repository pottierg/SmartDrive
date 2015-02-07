<?php
	if(isset($_SESSION['cart'])) {
		$cart = unserialize($_SESSION['cart']);
?>
<table>
	<thead>
	<tr>
		<th width="300">Produit</th>
		<th width="100">Quantity</th>
		<th width="150">Supprimer</th>
	</tr>
	</thead>
	<tbody>
		<?php $cart->displayRow(); ?>
	</tbody>
</table>
<?php
	} else {
		echo "<center style='margin-top: 2em;'><b>Le panier est vide</b><center>";
	}
?>