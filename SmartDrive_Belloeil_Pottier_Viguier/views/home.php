<?php
	// Contenu de la page d'accueil (choix du drive)
?>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../utils/slick/slick.min.js"></script>

<div class="orbit-container">
	<div id="slides" class="example-orbit">
	    <div>
			<img src="../img/Banniere1.png" alt="slide 1" />
			<div class="orbit-caption">
				Il ya bien une chose qui ne peut battre les Croustibat : nos prix !
			</div>
	    </div>
	    <div>
			<img src="../img/Banniere2.png" alt="slide 2" />
			<div class="orbit-caption">
	        	Laisse tomber les P&eacutepitos, on a des Granolas !
			</div>
	    </div>
	    <div>
      	<img src="../img/Banniere3.png" alt="slide 3" />
      	<div class="orbit-caption">
        		Au bon lait UHT !
      	</div>
	    </div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#slides').slick({
			infinite: true,
			autoplay: true,
			autoplaySpeed: 1800
		});
	});
</script>
