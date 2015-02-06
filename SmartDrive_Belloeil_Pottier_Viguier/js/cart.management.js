function addArticle(_name, _quantity) {
	document.getElementById("content_panier").innerHTML += "<div><b>" + _name + "</b> : " + _quantity + "<br/></div>";
	$.post('../utils/addArticle.php', { name: _name, quantity: _quantity } )
	.done(function(data) {
		// empty
	});
}

function removeCart() {
	document.getElementById("content_panier").innerHTML = "";
	$.post('../utils/removeCart.php')
	.done(function(data) {
		alert("Data Loaded: " + data);
	});
}

function removeArticle(_id) {
	$.post('../utils/removeArticle.php', { id: _id } )
	.done(function(data) {
		// empty
	});
	window.location.reload();
}