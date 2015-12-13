<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include ('mysql.php');
    mysql_select_db($database_connection) or die ("unable to connect to the database");
    if($_SESSION['profile_id']){
        $profile_id = $_SESSION['profile_id'];
        }else{
            echo "<script type = 'text/javascript' language='javascript'>
        location.replace('log_in.php');</script>";
        }
        
        //////find profile id///
       $find_profile = mysql_query("SELECT * FROM profile WHERE profile_id = '$profile_id'");
       $row_info = mysql_fetch_array($find_profile);
       $query_production = "Select * from product_line where profile_id = '$profile_id'";
       $result_production = mysql_query($query_production);
       $query_favorites = "Select favorite_id, fb.profile_id, company_id, company_name from favorite fb, profile pr where fb.profile_id = '$profile_id' and company_id = pr.profile_id";
       $result_fav = mysql_query($query_favorites);
       $find_pm = mysql_query("SELECT count(user_read) as message FROM pm where profile_id = '$profile_id' and user_read = 'no'");
       $row_pm = mysql_fetch_array($find_pm);
       ?>

    
    
<head>
    <link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
    <meta charset="utf-8">
    <title><?php echo $row_info['company_name'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
      

    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<!-- End Styles --> 
	
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
    
  </head>
	<body>
		<div class="head" style="background:#bbedfe;"><!-- Cabezera (logo, fondo azul claro, agrowebpr banner) -->
			  <div class="row-fluid">
				  <div class="span12">
					  <div class="span2">
						  <a class="brand" href="index.php"><img src ="img/pawlogo05 beta.png"> </a>
					  </div>
					  <div class="row-fluid">
						  <div class="span6">
							  <a  href="index.php" ><img class="banner-agrow" src="img/AgroWebPR banner text clear.png"></a>
						  </div>
					  </div>
				  </div>
			  </div>
		</div><!--  Fin de Cabezera (logo, fondo azul claro, agrowebpr banner) -->
		<div class="navbar"><!-- Navbar -->
			<div class="navbar-inner"><!-- navbar-inner -->
				<div class="container"><!-- container -->
				  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><!-- -->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button><!-- -->
				  <div class="nav-collapse collapse"><!-- SubNavegacion -->
					<ul class="nav"><!-- De Inicio a Contactos -->
						<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
						<li><a href="nosotros.php">Nosotros</a></li>
						<li><a href="Contacts.php">Contactos</a></li>
					</ul><!-- fin de Inicio a Contactos -->
						<div class="pull-right"><!-- Subnavegador de bienvenida al usuario y dropdown -->
							<ul class="nav pull-right"><!-- Dropdown de Bienvenida de Usuario-->
								<li>
									<a href="" class="dropdown-toggle">Bienvenido, <?php echo $row_info['full_name'];?> 
										<b class="caret"></b>
									</a>
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
							</ul><!-- fin Dropdown de Bienvenida de Usuario-->
						</div><!-- Fin de Subnavegador de bienvenida al usario y dropdown -->
						<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
							<input class="search" name="keyword" type="search" placeholder = "Busqueda">
							<button type="submit" class="btn"><i class="icon-search"></i></button>
						</form><!--Fin Search de Navegación-->
				  </div><!-- Fin de SubNavegacion -->
				</div><!-- /.container -->
			</div><!-- /.navbar-inner -->
		</div><!--/.navbar -->
		<div class="container"> <!--container--> 
			<div class="row"><!-- row -->
				<div class="span2"><!-- Menu de Agricultor-->
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
				<div class="span2 offset2"><!-- Imagen de Profile-->
					<img src = img/default-user-icon-profile.png class="img-rounded"/>
				</div><!-- Fin de Imagen de Profile-->
				<div class = "span4">
					<blockquote>
						<p><?echo $row_info['company_name'];?></p>
						<small>
							<cite title="Source Title"><?echo $row_info['town'];?>
								<i class="icon-map-marker"></i>
							</cite>
						</small>
					</blockquote>
					<p>
						<?php echo $row_info['description'];?><br>
						<i class="icon-envelope"></i><?php echo $row_info['email'];?><br>
						<i class="icon-globe"></i><?php echo $row_info['web_page'];?>
					</p>
				</div>
			</div><!-- /.row -->
			<div class = "row"><!-- row -->
					<div class = "span2"><!-- Mis Favoritos -->
						<table align = "left">
							<tr>
								<td width="389" height="50">Favoritos</td>
								<td width="79">Borrar</td>
							</tr>
							<?php
							while($row_fav = mysql_fetch_array($result_fav)){
							?>
							<td>
								<a href="view_profile.php?company_id=<?php echo $row_fav['company_id'];?>"><?php echo $row_fav['company_name']?></a>
							</td>
							<td>
								<center>
									<a href ="delete_fav.php?favorite_id=<?php echo $row_fav['favorite_id']; ?>" class="btn">
										<i class="icon-trash"></i>
									</a>
								</center>
							</td>
							</tr>
							<?php } ?>
						</table>
					</div><!-- Fin Mis Favoritos -->
					<div class = "span8 offset1"><!-- Mis Cultivos -->
						<table align="center">
							<tr>
								<td width="389" height="50">Mis Cultivos</td>
								<td width ="79">Editar</td>
								<td width="79">Borrar</td>
							</tr>
							<?php
							while($myrow = mysql_fetch_array($result_production)){
							?>
							<td>
								<a href ="production.php?production_id=<?php echo $myrow['production_id']; ?>"><?php echo "<p>" . $myrow['product_name']
									 . " " . $myrow['variedad_name'] . "</a><p>" . $myrow['quantity'] . " " . "Plantas </font></p>"; ?>
								</a>
							</td> 
							<td>
								<center>
									<a href ="restock_product.php?production_id= <?php echo $myrow['production_id']; ?>"class="btn">
										<i class="icon-edit"></i>
									</a>
								</center>
							</td>
							<td>
								<center>
									<a href ="delete_production.php?production_id= <?php echo $myrow['production_id']; ?>"class="btn">
										<i class="icon-trash"></i>
									</a>
								</center>
							</td> 
							</tr>        
							<?php } ?>
						</table>
					</div><!-- Fin de Mis Cultivos -->
			</div><!-- /.row --> 
			<hr><!-- linea divisoria -->
			<div class="footer"><!-- footer -->
				<p>&copy; AgroWebPR 2013</p>
			</div><!--/.footer -->
		</div><!-- /.container -->

									<!-- Javascript-->
				<!-- ================================================= -->
				<!-- Placed at the end of the document so the pages load faster -->
				<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
				<script type="text/javascript" src="js/bootstrap.min.js"></script>
				<script type="text/javascript"> 
				$(document).ready(function () { 
				$('.dropdown-toggle').dropdown(); 
				}); 
				</script>
			<!-- ================================================= -->
	</body>
</html>
