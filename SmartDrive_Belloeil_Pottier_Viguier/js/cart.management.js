function addArticle(name, quantity) {
	document.getElementById("content_panier").innerHTML += "<div>" + name + "  " + quantity + "<br/></div>";
	$.post('../utils/addArticle.php', { name: name, quantity: quantity } )
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