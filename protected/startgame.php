<?php

	function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
$color = "#" . random_color();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<title></title>
</head>
<body> 
	<div class="container">
	<div class="col-md-9" id="game">
	<canvas id="canvas" width="800px" height="800px"></canvas>
		<script>
		var canvas = document.getElementById("canvas"),
	    c = canvas.getContext("2d");
		canvas.addEventListener('click', handleClick);

		function drawBox() {
		    c.beginPath();
		    c.fillStyle = "white";
		    c.lineWidth = 3;
		    c.strokeStyle = 'black';
		    var sizeofsquare = 20;
		    for (var row = 0; row < sizeofsquare; row++) {
		        for (var column = 0; column < sizeofsquare; column++) {
		            var x = column * 40;
		            var y = row * 40;
		            c.rect(x, y, 40, 40);
		            c.fill();
		            c.stroke();
		        }
		    }
		    c.closePath();
		}

		function handleClick(e) {
	    	c.fillStyle = "<?php echo $color; ?>";
			console.log(e);
	    	c.fillRect(Math.floor(e.offsetX/40)*40,
	        	       Math.floor(e.offsetY/40)*40,
	            	   40, 40);
		}

		drawBox();
		</script>
</body>
</html>
