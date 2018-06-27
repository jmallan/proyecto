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
	<?php if(isset($_SESSION['user'])){?>
	<div id="header">
  		
		<?php include "vistas/header.php";?>
	</div>
		<div class="row">
			<?php include ("vistas/navbar.php");
			?>
			<div id="body">
				<?php include "vistas/main.php";?>

			</div>
		</div>
		<style>
					@import "vistas/css/estils.css";
				</style>
	<?php }else {
		include("vistas/body/login.php");
	?>
	<style>
		@import "vistas/css/login.css";
	</style>
	<?php } ?>
	<div id="footer">
<!-- 		<a href="vistas/main.php?logout">logout</a> -->
		<!--<?php include "vistas/footer.php";?>-->
	</div>

</body>
</html>