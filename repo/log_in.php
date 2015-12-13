<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
		<meta charset="utf-8">
		<title>AgrowebPR, Log In</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Styles -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<!-- End Styles -->

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="../assets/js/html5shiv.js"></script>
		<![endif]-->

		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href=".assets/ico/favicon.png">
		<!-- End Fav and touch icons -->
	</head>
	<body> 
		<div class="head" style="background:#bbedfe;"><!--CAbezera , fondo azul, logo, agrowebpr banner -->
			  <div class="row-fluid">
				  <div class="span12">
					  <div class="span2">
						  <a class="brand" href="index.php"><img src ="img/pawlogo05 beta.png"> </a>
					  </div>
					  <div class="row-fluid">
						  <div class="span6">
							  <h1 class="muted" style="color:green; ">Bienvenidos a <a  href="index.php" ><img class="banner-agrow" src="img/AgroWebPR banner text clear.png"></a></h1>
						  </div>
					  </div>
				  </div>
			  </div>
		</div><!-- Fin de CAbezera , fondo azul, logo, agrowebpr banner -->
		<br/>
		<div class="container"><!-- Container -->
			<div class="row"><!-- Box Log In -->
				<div class="span4 offset4 well" style=" width: 400px;">
					<legend style="text-align: center">Por favor Inicia Sesión</legend>
					<center>
					<form method="POST" action="login.php" accept-charset="UTF-8" style="padding: 10px;">
					<input type="text" id="email" class="span4" name="email" placeholder="Email" value="<?php echo $_COOKIE['remember_me'];?>">
					<input type="password" id="password" class="span4" name="password" placeholder="Contraseña" value="<?php echo $_COOKIE['remember_pass'];?>">
					</center>
					<label class="checkbox">
						<input type="checkbox" name="remember" 
						<?php if(isset($_COOKIE['remember_me'])){
							echo'checked="cheked"';
							
						}
						else{
							 echo'';   
						}
						?>> Recordarme
					</label>
					<button type="submit" name="submit" class="btn btn-info btn-block">Iniciar</button>
					</form>   
					
				</div>
			</div><!-- End Box Log In -->
			<div class="footer"><!--  -->
				<p><center>¿Usted aun no tiene un perfil?<a href ="register.php">Registrarme</a><i class="icon-arrow"></i></center></p>
			</div><!--  -->
			<hr><!--  -->
			<div class="footer"><!-- footer -->
				<p>&copy; AgroWebPR 2013</p>
			</div><!-- /.footer -->
		</div><!-- End Container -->
      

						<!-- Javascript-->
    <!--================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>