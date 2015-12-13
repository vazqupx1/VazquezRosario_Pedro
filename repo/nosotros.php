<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
		<meta charset="utf-8">
		<title>Nosotros</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<?php
		 include('mysql.php');
		 mysql_select_db($database_connection) or die ("unable to connect to the database");

		  
		if(isset($_SESSION['profile_id'])){
			
		$profile_id = $_SESSION['profile_id'];
			
		$query = "SELECT * FROM profile WHERE profile_id = '$profile_id';";
		$result = mysql_query($query);
		$row=  mysql_fetch_array($result);
			
		}
		
		
		$query_prod = mysql_query("Select * from product_line order by production_id desc limit 0,4");
		$query_users = mysql_query("Select * from profile order by profile_id desc limit 0,4");
		
		
		
		?>

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
		<div class="head" style="background:#bbedfe;"><!-- Cabezera de PAgina, fondo azul, logo, agrowebpr banner -->
			  <div class="row-fluid">
					<div class="span12">
						<div class="span2">
							<a class="brand" href="index.php"><img src ="img/pawlogo05 beta.png"></a>
						</div>
						<div class="row-fluid">
							<div class="span6">
								<a  href="index.php" ><img class="banner-agrow" src="img/AgroWebPR banner text clear.png"></a>
							</div>
						</div>
					</div>
			  </div>
		</div><!-- Fin de Cabezera de PAgina, fondo azul, logo, agrowebpr banner -->
	<div class="navbar"><!-- navbar -->
		<div class="navbar-inner"><!-- navbar-inner -->
			<div class="container><!-- container -->
			  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
				<!-- Navegacion  -->
				<div class="nav-collapse collapse">
					<ul class="nav"><!-- De Inicio a Contactos -->
						<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
						<li><a href="nosotros.php">Nosotros</a></li>
						<li><a href="Contacts.php">Contactos</a></li>
					</ul><!-- fin de Inicio a Contactos -->
					<div class="pull-right">
						<ul class="nav pull-right">
							<?php if(isset($_SESSION['profile_id'])){?>
							<!-- Dropdown de bienvenida del usuario -->
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Bienvenido, <?php echo $row['full_name'];?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="profile.php"><i class="icon-user"></i>Perfil</a></li>
									<li><a href="list_pm.php"><i class="icon-envelope"></i>Mensajes</a></li>
									<li><a href="offers.php"><i class="icon-tags"></i>Ofertas</a></li>
									<li><a href="Contacts.php"><i class="icon-book"></i>Contactos</a></li>
									<li><a href="reports.php"><i class="icon-folder-close"></i>Reportes</a></li>
									<li class="divider"></li>
									<li><a href="logout.php"><i class="icon-off"></i>Salir</a></li>
								</ul>
							</li>	
							<!-- Fin de Dropdown de bienvenida del usuario-->
		  					<?php }else{?>
							
							<li><a href="register.php">Registrarme</a></li>
							<li class="divider-vertical"></li>
							<!-- Identificarme (login) -->
							<li class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown">Identificarme<strong class="caret"></strong></a>
								<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
									<form method="post" action="login.php"  accept-charset="UTF-8">
										<input style="margin-bottom: 15px;" type="text" placeholder="Email" id="username" name="email">
										<input style="margin-bottom: 15px;" type="password" placeholder="Contraseña" id="password" name="password">
										<label class="string optional" for="user_remember_me"> 
											<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
											Recordarme
										</label>
										<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Iniciar Sesión">
									</form>
								</div>
							</li>
							<!-- Fin de Identificarme(login) -->
							<?php }?>
						</ul>
					</div>
					<form class="navbar-form pull-right" action ="search_result.php" method="GET"><!--Search de Navegación-->
						<input class="search" name="keyword" type="search" onkeyup="showResult(this.value)" placeholder = "Busqueda">
						<button type="submit" class="btn"><i class="icon-search"></i></button>
					</form><!-- Fin Search de Navegación-->
				</div>
				<!-- Fin de la Navegacion -->
			</div><!-- /.container -->
        </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
		<div class="container"><!-- container -->     
			<div class="row-fluid"><!-- categorias de productos -->
				<div class="span3">
					<div class="sidebar-nav">
						<div class="well">
							<ul class="nav nav-list"> 
								<li class="nav-header">Categorias</li>        
								<li><a href="search_result.php?keyword=<?php echo 'Cafe' ?>"> Cafe y Té </a></li>
								<li><a href="search_result.php?keyword=<?php echo 'Lacteos' ?>">Productos Lacteos</a></li>
								<li><a href="search_result.php?keyword=<?php echo 'Frutas' ?>">Frutas</a></li>
								<li><a href="search_result.php?keyword=<?php echo 'Viandas'?>">Viandas</a></li>
								<li><a href="search_result.php?keyword=<?php echo 'Vegetales'?>">Vegetales</a></li>
								<li><a href="search_result.php?keyword=<?php echo 'Otros'?>"> Otros</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div><!-- fin de categorias de productos -->
			
			<div class="row-fluid"><!-- -->
				<div class="span3" >
					<div class="sidebar-nav" >
						<div class="well"style="  position: absolute; padding-left: 10px; padding-right: 10px; width: 590px; left: 450px; top: 180px; ">
							<h3 style=" width: 590px; text-align: center;">AgroWebPR permite que la cadena de suministro del sector alimentario
							pueda tener una mejor coordinacion entre oferta y demanda. Participa para dar visibilidad a 
			los productos que interesas vender e identificar que suplidores pueden proveer lo que deseas comprar.
							</h3>
						</div>
					</div>
				</div>
			</div><!--  -->
			<hr><!-- linea divisoria -->
			<!-- Example row of columns -->
			<div class="row-fluid"><!-- Productos Y compañias recien añadidas -->
				<div class="span5">
					<h4>Productos Recien Añadidos</h4>
					<?php
					while($row_prod = mysql_fetch_array($query_prod)){
					?>
					<p><a href="production.php?production_id=<?php echo $row_prod['production_id']; ?>"><?php echo $row_prod['product_name']. " ". $row_prod['variedad_name'];?></a></p>
					<?php } ?>
				</div>
				<div class="span5">
					<h4>Compañías Recien Añadidas</h4>
					<?php 
					while($row_user = mysql_fetch_array($query_users)){
					?>
					<p><a href="view_profile.php?company_id=<?php echo $row_user['profile_id'];?>"><?php echo $row_user['company_name']?></a></p>
					<?php } ?>
				</div>
			</div><!-- Productos Y compañias recien añadidas -->
			<hr><!-- linea divisoria -->
			<div class="footer"><!-- footer -->
				<p>&copy; AgroWebPR 2013</p>
				<br>
				
			</div><!-- /.footer -->
		</div><!-- /.container -->
		  
		  

								<!-- Javascript-->
			<!--================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript"> 
		$(document).ready(function(){
			//Handles menu drop down
			$('.dropdown-menu').find('form').click(function (e) {
				e.stopPropagation();
			});
		});

		$(document).ready(function() {
			$('#myCarousel').carousel({
				interval: 10000
			})
		});
		</script>
	</body>
</html>
