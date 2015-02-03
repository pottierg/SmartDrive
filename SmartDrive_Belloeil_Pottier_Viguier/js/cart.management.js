function addArticle(_name, _quantity) {
	document.getElementById("content_panier").innerHTML += "<div>" + _name + "  " + _quantity + "<br/></div>";
	$.post('../utils/addArticle.php', { name: _name, quantity: _quantity } )
	.done(function(data) {
		alert("Data Loaded: " + data);
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
	$.post('../utils/removeArticle.php', {id: _id})
	.done(function(data) {
		alert("Data Loaded: " + data);
	});
	window.location.reload();
}