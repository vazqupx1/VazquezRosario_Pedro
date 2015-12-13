<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
   
     
<head>
    <link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
    <meta charset="utf-8">
    <title>Ofertas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
      

    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<!-- End Styles-->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>

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
	
    <?php
		include ('mysql.php');
		mysql_select_db($database_connection) or die ("unable to connect to the database");
		
		if($_SESSION['profile_id']){
				$profile_id = $_SESSION['profile_id'];
			}else{
				echo "<script type = 'text/javascript' language='javascript'>
			location.replace('log_in.php');</script>";
			}
			
		   $find_profile = mysql_query("SELECT * FROM profile WHERE profile_id = '$profile_id'");
		   $row_info = mysql_fetch_array($find_profile);
		   $find_offer = mysql_query("select * from offer off, profile pro, product_line prod where pro.profile_id=prod.profile_id and prod.production_id = off.production_id and off.company_id = '$profile_id'");
		   $find_offer_rev = mysql_query("select * from offer off, profile pro, product_line prod where pro.profile_id=off.company_id and prod.production_id = off.production_id and prod.profile_id = '$profile_id'");

	?>
    
    
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
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
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
						</ul><!-- fin de Inicio a Contactos -->
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
						</div><!-- Fin Dropdown de bienvenida del usuario -->
						<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
						  <input class="search" type="search" placeholder = "Busqueda">
						  <button type="submit" class="btn"><i class="icon-search"></i></button>
						</form><!--Fin Search de Navegación-->
					</div><!--/.nav-collapse collapse-->
				</div><!--/.container -->
			</div><!--/.navbar-inner-->
		</div><!--/.navbar-->
		<div class="container">
			<div class="row">
				<div class="span2"><!-- Menu de Perfil -->
					<div class="sidebar-nav">
						<div class="well">
							<ul class="nav nav-list"> 
							  <li class="nav-header">Menu de Perfil</li>        
							  <li><a href="profile.php"><i class="icon-home"></i>Perfil</a></li>
							  <li><a href="list_pm.php"><i class="icon-envelope"></i>Mensajes<span class="badge badge-info"></span></a></li>
							  <li><a href="offers.php"><i class="icon-tags"></i>Ofertas</a></li>
							  <li><a href="add_product.php"><i class="icon-plus-sign"></i>Añadir Producción</a></li>
							  <li><a href="profile_edit.php"><i class="icon-pencil"></i>Editar Perfil</a></li>
							  <li><a href="Contacts.php"><i class="icon-user"></i>Contactos</a></li>
							  <li><a href="reports.php"><i class="icon-folder-close"></i>Reportes</a></li>
							  <li class="divider"></li>
							  <li><a href="logout.php"><i class="icon-share"></i>Salir</a></li>
							</ul>
						</div>
					</div>
				</div><!-- Fin de Menu de Perfil -->
				<div class="offset4"><!-- offset4 -->
					<div class="row"><!-- row -->
						<div class="span8"><!-- Box Ofertas Realizadas -->
							<h3>Ofertas Realizadas </h3>
    						<table>
								<tr>
									<td><center>Nombre de Compañia</center></td>
									<td><center>Producto</center></td>
									<td><center>Cantidad</center></td>
									<td><center>Fecha de Entrega</center></td>
									<td><center>Estatus</center></td>
									<td><center>Comentarios</center></td>
								</tr>
								<?php
								while($row_offer = mysql_fetch_array($find_offer)){
									?>
									<td><center><a href="profile.php?company_id=<?php echo $row_offer['company_id'];?>"><?php echo $row_offer['company_name']?></a></center></td>
									<td><center><?php echo $row_offer['product_name']; ?> <?php echo $row_offer['variedad_name'];?></center></td>
									<td><center><?php echo $row_offer['offer_quantity'];?> <?php echo $row_offer['unit']; ?></center></td>
									<td><center><?php echo $row_offer['need_date']; ?></center></td>
<?php if($row_offer['offer_accept'] == null){?>

								<td><center>pendiente</center></td>
<?php }else{ ?>
								<td><center><?php echo $row_offer['offer_accept'];?></center></td>
<?php } ?>
									<td><center><?php echo $row_offer['comments'];?></center></td>
									</tr>
								<?php } ?>
							</table>
						</div><!-- Fin Box Ofertas Realizadas -->
						<div class="span8"><!-- Box Ofertas Recibidas -->
							<br><!--Espacio-->
							<br><!--Espacio-->
							<h3>Ofertas Recibidas</h3>
							<table>
								<tr>
									<td width="79" height="50"><center> Nombre de Compañia </center></td>
									<td width ="79"><center>Producto</center></td>
									<td width="79"><center>Cantidad</center></td>
									<td width="79"><center>Fecha de Entrega</center> </td>
									<td width="79"><center>Enviar Oferta</center></td>
									<td width="79"><center>Comentarios</center></td>
								</tr>
								<?php 
								while($row_offer_rev=  mysql_fetch_array($find_offer_rev)){
								?>
								<form action="offer_accept.php?offer_id=<?php echo $row_offer_rev['offer_id'];?>" method="post">
								<td><center><a href="profile.php?company_id=<?php echo $row_offer_rev['company_id'];?>"><?php echo $row_offer_rev['company_name']?></a></center></td>
								<td><center><?php echo $row_offer_rev['product_name']; ?> <?php echo $row_offer_rev['variedad_name'];?></center></td>
								<td><center><?php echo $row_offer_rev['offer_quantity']; ?></center></td>
								<td><center><?php echo $row_offer_rev['need_date']; ?></center></td>
								<?php if($row_offer_rev['offer_accept'] == 'pendiente'|| $row_offer_rev['offer_accept'] == null) {
								?>
								<td>
									<center>
										<select id="unit_select" name="status" style="width:70px">
										<option value="Si">Si</option>
										<option value="No">No</option>
										</select>
									</center>  
								</td>
								<td><center><input type="text" name="comment"></center></td>
								<td><center><button>Enviar</button></center></td>
								</tr>
								<?php }else{ ?>
								<td><center>Oferta ya Respondida </center></td>
								</tr>
								<?php }} ?>
							</table>
						</div><!-- Fin Box Ofertas Recibidas -->
					</div><!-- /.row -->
				</div><!-- /.offset4 -->
				<hr><!--Linea Divisible-->
			    <div class="footer"><!-- footer -->
					<p>&copy; AgroWebPR 2013</p>
			    </div><!-- /.footer -->
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
	</body>
</html>
