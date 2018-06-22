<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ES-es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include "link.php";?>
  <title>Document</title>
</head>
<body>
	<div id=header>
		<div class="jumbotron">
  			<h1 class="display-4">Hello, world!</h1>
  			<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4" id="navVertical">
		</div>
		<div class="col-md-8" id="body">
			
				<?php include "vistas/main.php";?>

		</div>
	</div>
	<div id="footer">
		<!--<?php include "footer.php";?>-->
	</div>

</body>
</html>