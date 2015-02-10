function addArticle(_id, _name, _quantity, _price) {
	$.post('../utils/addArticle.php', {id: _id, name: _name, quantity: _quantity, price: _price } )
	.done(function(data) {
		// alert("Data Loaded: " + data);
	});
	window.location.reload();
}

function removeCart() {
	document.getElementById("content_panier").innerHTML = "";
	$.post('../utils/removeCart.php')
	.done(function(data) {
		// alert("Data Loaded: " + data);
	});
}

function removeArticle(_id) {
	$.post('../utils/removeArticle.php', { id: _id } )
	.done(function(data) {
		// alert("Data Loaded: " + data);
	});
	window.location.reload();
}