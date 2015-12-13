<?php
 session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php
    include('mysql.php');
    mysql_select_db($database_connection) or die ("unable to connect to the database");


	$profile_id=$_SESSION['profile_id'];
	$find_profile = mysql_query("SELECT * FROM profile WHERE profile_id = '$profile_id'");
	$row_info = mysql_fetch_array($find_profile);   
	?>
 
    <head>
		<link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
		<meta charset="utf-8">
		<title>Mensajes Personales</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Styles -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<!--  End Styles -->
		
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
    </div><!-- Fin de Cabezera (logo, fondo azul claro, agrowebpr banner) -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><!-- .btn btn-navbar-->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button><!--/.btn btn-navbar -->
				<div class="nav-collapse collapse">
					<ul class="nav"><!-- De Inicio a Contactos -->
						<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
						<li><a href="nosotros.php">Nosotros</a></li>
						<li><a href="Contacts.php">Contactos</a></li>
					</ul><!-- fin de Inicio a Contactos -->
					<ul class="nav pull-right"><!-- Dropdown de bienvenida del usuario -->
						<li>
							<a href="" class="dropdown-toggle">Bienvenido, <?php echo $row_info['full_name'];?><b class="caret"></b></a>
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
					</ul><!-- Fin de Dropdown de bienvenida del usuario -->
					<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
						<input class="search" type="search" placeholder = "Busqueda">
						<button type="submit" class="btn"><i class="icon-search"></i></button>
					</form><!--Fin Search de Navegación-->
				</div><!-- /.nav-collapse collapse -->
			</div><!--/.container -->
		</div><!--/.navbar-inner-->
    </div><!--/.navbar-->
 	<div class="container"><!--/.container -->
			<?php

			//We check if the user is logged
			if(isset($_SESSION['profile_id']))
			{
			//We list his messages in a table
			//Two queries are executes, one for the unread messages and another for read messages
			$req1 = mysql_query('select message_id, pm1.profile_id, company_id, title, message, timestamp, user_read,company_name from pm pm1, profile pr where pm1.profile_id="'.$_SESSION['profile_id'].'" and company_id = pr.profile_id and user_read="no"');
			$req2 = mysql_query('select message_id, pm1.profile_id, company_id, title, message, timestamp, user_read,company_name from pm pm1, profile pr where pm1.profile_id="'.$_SESSION['profile_id'].'" and company_id = pr.profile_id and user_read="yes"');
			?>

			<h3>Mensajes Sin Leer(<?php echo intval(mysql_num_rows($req1)); ?>):</h3><!-- Mensajes sin leer -->
			<table>
				<tr>
					<th class="title_cell">Titulo</th>
					<th>Participante</th>
					<th>Dia de creación</th>
				</tr>
				<?php
				//We display the list of unread messages
				while($dn1 = mysql_fetch_array($req1))
				{
				?>
				<tr>
					<td class="left"><a href="read_pm.php?id=<?php echo $dn1['message_id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
					<td><?php echo htmlentities($dn1['company_name'], ENT_QUOTES, 'UTF-8'); ?></a></td>
					<td><?php echo date('Y/m/d H:i:s' ,$dn1['timestamp']); ?></td>
				</tr>
				<?php
				}
				//If there is no unread message we notice it
				if(mysql_num_rows($req1)==0)
				{
				?>
				<tr>
					<td colspan="4" class="center">Usted no tiene mensajes sin leer.</td>
				</tr>
				<?php
				}
				?>
			</table><!-- Fin de Mensajes sin leer -->
			<br><!--Espacio-->
			<br><!--Espacio-->
			<h3>Mensajes Leidos(<?php echo intval(mysql_num_rows($req2)); ?>):</h3><!-- Mensajes Leidos -->
			<table>
				<tr>
					<th class="title_cell">Titulo</th>
					<th>Participante</th>
					<th>Dia de creación</th>
				</tr>
				<?php
				//We display the list of read messages
				while($dn2 = mysql_fetch_array($req2))
				{
				?>
				<tr>
					<td class="left"><a href="read_pm.php?id=<?php echo $dn2['message_id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
					<td><?php echo htmlentities($dn2['company_name'], ENT_QUOTES, 'UTF-8'); ?></a></td>
					<td><?php echo date('Y/m/d H:i:s' ,$dn2['timestamp']); ?></td>
				</tr>
				<?php
				}
				//If there is no read message we notice it
				if(mysql_num_rows($req2)==0)
				{
				?>
					<tr>
						<td colspan="4" class="center">Usted no tiene mensajes sin leer.</td>
					</tr>
				<?php
				}
				?>
			</table><!-- Fin de Mensajes Leidos -->
			<?php
			}
			else
			{
						echo "<script type = 'text/javascript' language='javascript'>
					location.replace('log_in.php');</script>";
					}
			?>				
			<hr><!-- linea divisoria -->
			<div class="footer"><!--footer-->
				<p>&copy; AgroWebPR 2013</p>
			</div><!--/.footer-->
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