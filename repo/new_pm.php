<?php
 session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
		<meta charset="utf-8">
		<title>Mensajes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		  <?php
		  include("mysql.php");
		  mysql_select_db($database_connection) or die ("unable to connect to the database");

		if($_SESSION['profile_id']){
		$profile_id = $_SESSION['profile_id'];
		}else{
				echo "<script type = 'text/javascript' language='javascript'>
			location.replace('log_in.php');</script>";
			}

	$find_profile = mysql_query("SELECT * FROM profile WHERE profile_id = '$profile_id'");
	$row_info = mysql_fetch_array($find_profile);
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
		<div class="navbar"><!-- navbar -->
			<div class="navbar-inner"><!-- navbar-inner -->
				<div class="container"><!-- container -->
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><!--  -->
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button><!--  -->
					<div class="nav-collapse collapse"><!-- nav-collapse collapse -->
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
						</div><!-- Fin de Dropdown de bienvenida del usuario -->
						<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
							<input class="search" type="search" placeholder = "Busqueda">
							<button type="submit" class="btn"><i class="icon-search"></i></button>
						</form><!-- Fin Search de Navegación-->
					</div><!-- /.nav-collapse collapse -->
				</div><!--/.container -->
			</div><!-- /.navbar-inner -->
		</div><!-- /.navbar -->
		<div class="container"><!-- container -->
			<div class="row"><!-- row -->
				<div class="span6"><!-- sistema de mensaje -->
					<?php
					include('mysql.php');
					//We check if the user is logged
					if(isset($_SESSION['profile_id']))
					{
					if(isset($_REQUEST['company_id'])){
							$recip = $_REQUEST['company_id'];
						 }else if(isset($_SESSION['company_id'])){
							 $recip = $_SESSION['company_id'];
						 }
					$form = true;
					$otitle = '';
					$omessage = '';
					//We check if the form has been sent
					if(isset($_POST['title'], $_POST['message']))
					{
							$otitle = $_POST['title'];
							$omessage = $_POST['message'];
							//We remove slashes depending on the configuration
							if(get_magic_quotes_gpc())
							{
									$otitle = stripslashes($otitle);
									$omessage = stripslashes($omessage);
							}
							//We check if all the fields are filled
							if($_POST['title']!='' and $_POST['message']!='')
							{
									//We protect the variables
									$title = mysql_real_escape_string($otitle);
									$message = mysql_real_escape_string(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
									//We check if the recipient exists
								   
											//We check if the recipient is not the actual user
											if($recip !=$_SESSION['profile_id'])
											{
													//We send the message
					if(mysql_query('insert into pm (title, profile_id, company_id, message, timestamp, user_read)values("'.$title.'", "'.$recip.'", "'.$_SESSION['profile_id'].'", "'.$message.'", "'.time().'","no")'))                                {
					?>
						
					<div class="message">The message has successfully been sent. EL mensaje  se a enviado satisfactoriamente.
					<br>
						<a href="list_pm.php">List of my Personal messages</a>
					</div>
						<?php
																$form = false;
														}
														else
														{
																//Otherwise, we say that an error occured
																$error = 'An error occurred while sending the message';
														}
												}
												else
												{
														//Otherwise, we say the user cannot send a message to himself
														$error = 'You cannot send a message to yourself.';
												}
										}
									   
								else
								{
										//Otherwise, we say a field is empty
										$error = 'A field is empty. Please fill of the fields.';
								}
						}
						if($form)
						{
						//We display a message if necessary
						if(isset($error))
						{
								echo '<div class="message">'.$error.'</div>';
						}
						//We display the form
						?>
				 

					<h4>Nuevo Mensaje Personal</h4>
					<form action="new_pm.php?company_id=<? echo $recip;?>" method="post"><!--  -->
						<br><!--  -->
						<div class="controls controls-row">
							<label for="title">Titulo</label><input type="text" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" class="span3" /><br />
						</div>
						<div class="controls">
							<label for="message">Mensaje</label><textarea  class="span6" rows="5" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea><br />
						</div>
						<div class="controls">
							<button id="contact-submit" type="submit" class="btn btn-primary input-medium pull-right">Send</button>
						</div>
					</form><!--  -->
					<?php
						}
						}
						else{
						echo "<script type = 'text/javascript' language='javascript'>
						location.replace('log_in.php');</script>";
						}
					?>
				</div><!-- fin sistema de mensaje -->
			</div><!-- /.row -->
			<hr><!--Linea divisible-->
			<div class="footer<!-- footer -->
				<p>&copy; AgroWebPR 2013</p>
			</div><!-- /.footer -->
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