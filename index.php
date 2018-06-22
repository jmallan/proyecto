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
	<?php include "vistas/jumbotron.php";?>
	</div>
	<div class="row">
		<div class="col-md-4" id="navVertical">
		</div>
		<div class="col-md-8" id="body">
			
				<?php include "vistas/main.php";?>

		</div>
	</div>
	<div id="footer">
		<!--<?php include "vistas/footer.php";?>-->
	</div>

</body>
</html>