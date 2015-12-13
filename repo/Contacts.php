<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
		<meta charset="utf-8">
		<title>Contactos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
                
		<?
		include("mysql.php");
		mysql_select_db($database_connection) or die ("unable to connect to the database");
                //Determina si hay un usuario Log In de no ser cierto lo envia a la pagina de log in
		if($_SESSION['profile_id']){
		$profile_id = $_SESSION['profile_id'];
		}else{
			  echo "<script type = 'text/javascript' language='javascript'>
			  location.replace('log_in.php');</script>";
			}
                //Query para buscar la informacion del usuario
		$find_profile = mysql_query("SELECT * FROM profile WHERE profile_id = '$profile_id'");
		$row_info = mysql_fetch_array($find_profile);
                //Query de favoritos en base al usario 
		$query_favorites = "Select fb.profile_id, company_id, phone, town, company_name, img_path from favorite fb, profile pr where fb.profile_id = '$profile_id' and company_id = pr.profile_id";
		$result_fav = mysql_query($query_favorites);
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
		<link rel="shortcut icon" href="assets/ico/favicon.png">
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
		<div class="navbar"><!--navbar-->
			<div class="navbar-inner"><!--navbar-inner-->
				<div class="container"><!--container-->
				  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><!--  -->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button><!--  -->
				  
				  <div class="nav-collapse collapse">
					<ul class="nav"><!-- De Inicio a Contactos -->
						<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
						<li><a href="nosotros.php">Nosotros</a></li>
						<li><a href="Contacts.php">Contactos</a></li>
					</ul><!-- Fin De Inicio a Contactos -->
					
					<div class="pull-right"><!-- Dropdown de bienvenida del usuario -->
						<ul class="nav pull-right">
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Bienvenido, <?php echo $row_info['full_name'];?> <b class="caret"></b></a>
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
						</ul>
					</div><!--Fin de  Dropdown de bienvenida del usuario -->
					<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
					  <input class="search" type="search" placeholder = "Busqueda">
					  <button type="submit" class="btn"><i class="icon-search"></i></button>
					</form><!--Fin Search de Navegación-->
				  </div><!--/.nav-collapse collapse-->			  
				</div><!--/.container-->
			</div><!--/.navbar-inner-->
		</div><!--/.navbar-->
		<div class="container"><!--container-->
			<div class="row"><!--row-->
					<div class="span2"> <!-- Menu de Agricultor -->
						<div class="sidebar-nav">
							<div class="well">
								<ul class="nav nav-list"> 
								  <li class="nav-header">Menu Agricultor</li>        
								  <li><a href="profile.php"><i class="icon-home"></i>Perfil</a></li>
								  <li><a href="list_pm.php"><i class="icon-envelope"></i>Mensajes<span class="badge badge-info"><?php echo $row_pm['message']?></span></a></li>
								  <li><a href="offers.php"><i class="icon-tags"></i>Ofertas</a></li>
								  <li><a href="add_product.php"><i class="icon-plus-sign"></i>Añadir Produccion</a></li>
								  <li><a href="profile_edit.php"><i class="icon-pencil"></i>Editar Perfil</a></li>
								  <li><a href="Contacts.php"><i class="icon-user"></i>Contactos</a></li>
								  <li><a href="reports.php"><i class="icon-folder-close"></i>Reportes</a></li>
								  <li class="divider"></li>
								  <li><a href="logout.php"><i class="icon-share"></i>Salir</a></li>
								</ul>
							</div>
						</div>
					</div><!-- Fin de Menu de Agricultor -->
					<div class="offset4"><!-- Caja de Contactos Favoritos ya añadidos --> 
						<?php while($row_favorite = mysql_fetch_array($result_fav)){
						?>
						<ul class="thumbnails">
							<li class="span5 clearfix">
							  <div class="thumbnail clearfix">
								<img src="img/<?php echo $row_favorite['img_path'];?>" alt="" class="pull-left span2 clearfix" style='margin-right:10px'>
								<div class="caption" class="pull-left">
								  <h4>      
									<a href="view_profile.php?company_id=<?php echo $row_favorite['company_id'];?>"><?php echo $row_favorite['company_name']?></a>
								  </h4>
								  <small><b>Telefono:</b><?php echo $row_favorite['phone']?></small><br>
								  <small><i class="icon-globe"></i><?php echo $row_favorite['town']?></small>
								</div>
							  </div>
							</li>
						</ul>
						<?php } ?>
					</div><!-- Fin de Caja de Contactos Favoritos ya añadidos --> 
					<hr><!-- linea divisoria -->
					<div class="footer"><!--footer-->
						<p>&copy; AgroWebPR 2013</p>
					</div><!--/.footer-->
			</div><!-- /.row -->
		</div><!-- /.container -->


							<!-- Javascript-->
		<!--================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript"> 
		$(document).ready(function () { 
		$('.dropdown-toggle').dropdown(); 
		}); 
		</script>
		<!-- End Javascript -->

	</body>
</html>
