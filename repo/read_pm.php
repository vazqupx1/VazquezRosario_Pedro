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
    <title>Mensaje Personal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
      

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    
    
<link href="css/bootstrap-responsive.css" rel="stylesheet">

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
			<div class="container"><!--container  -->
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
					<div class="pull-right"><!-- Dropdown de Bienvenida de Usuario -->
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
					</div><!-- Fin Dropdown de Bienvenida de Usuario -->
					<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
					  <input class="search" type="search" placeholder = "Busqueda">
					  <button type="submit" class="btn"><i class="icon-search"></i></button>
					</form><!--Fin Search de Navegación-->
				</div><!-- /.nav-collapse collapse -->
			</div><!--/.container -->
		</div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
    <div class="container"><!-- container-->
			<?php


			//We check if the user is logged
			if(isset($_SESSION['profile_id']))
			{
			//We check if the ID of the discussion is defined
			if(isset($_GET['id']))
			{
			$id = intval($_GET['id']);
			//We get the title and the narators of the discussion
			$req1 = mysql_query('select * from pm where message_id="'.$id.'"');
			$dn1 = mysql_fetch_array($req1);
			//We check if the discussion exists
			if(mysql_num_rows($req1)==1)
			{
			//We check if the user have the right to read this discussion
			if($dn1['profile_id']==$_SESSION['profile_id'])
			{
			//The discussion will be placed in read messages
			if($dn1['profile_id']==$_SESSION['profile_id'])
			{
					mysql_query('update pm set user_read="yes" where message_id="'.$id.'"');
					$user_partic = 2;
			}
			//We get the list of the messages
			$req2 = mysql_query('select message_id, pm1.profile_id, company_id, company_name, title, message, timestamp, user_read from pm pm1, profile pr where message_id="'.$id.'" and company_id = pr.profile_id');
			//We check if the form has been sent
			if(isset($_POST['message']) and $_POST['message']!='')
			{
					$message = $_POST['message'];
					//We remove slashes depending on the configuration
					if(get_magic_quotes_gpc())
					{
							$message = stripslashes($message);
					}
					//We protect the variables
					$message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
					//We send the message and we change the status of the discussion to unread for the recipient
					if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('update pm set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
					{
			?>
			<div class="message">Your message has successfully been sent.<br />
			<a href="read_pm.php?id=<?php echo $id; ?>">Go to the discussion</a></div>
			<?php
					}
					else
					{
			?>
			<div class="message">An error occurred while sending the message.<br />
				<a href="read_pm.php?id=<?php echo $id; ?>">Go to the discussion</a>
			</div>
			<?php
					}
			}
			else
			{
			//We display the messages
			?>
		<div class="content"><!-- content -->
			<h1><?php echo $dn1['title']; ?></h1>
			<table class="messages_table">
				<tr>
					<th class="author">User</th>
					<th>Mensaje</th>
				</tr>
				<?php
				while($dn2 = mysql_fetch_array($req2))
				{
				?>
				<tr>
					<td class="author center"><?php
					?><br /><a href="view_profile.php?company_id=<?php echo $dn2['company_id']; ?>"><?php echo $dn2['company_name']; ?></a></td>
					<td class="left">
						<div class="date">Sent: <?php echo date('m/d/Y H:i:s' ,$dn2['timestamp']); ?></div>
						<?php echo $dn2['message']; ?>
					</td>
				</tr>
				<?php
				}}}}}}
				?>
			</table><br />

				
			<hr> <!-- linea divisoria -->
			<div class="footer"><!-- footer -->
				<p>&copy; AgroWebPR 2013</p>
			</div><!-- /.footer -->
		</div><!-- /.content -->
	</div><!-- /.container -->

					<!-- Javascript -->
    <!-- ================================================== -->
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