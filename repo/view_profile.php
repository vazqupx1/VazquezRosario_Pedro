<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include ('mysql.php');
    mysql_select_db($database_connection) or die ("unable to connect to the database");
    
    if(isset($_REQUEST['company_id'])){
        $company_id = $_REQUEST['company_id'];
     }else if(isset($_SESSION['company_id'])){
         $company_id = $_SESSION['company_id'];
     }
   
    if($_SESSION['profile_id']){
            $profile_id = $_SESSION['profile_id'];
        }else
        {
            echo "<script type = 'text/javascript' language='javascript'>
        location.replace('log_in.php');</script>";
        }
        $query = "SELECT * FROM profile WHERE profile_id = '$profile_id';";
        $result = mysql_query($query);
        $row=  mysql_fetch_array($result);
         $query_info = "SELECT * FROM profile WHERE profile_id = '$company_id';";
         $result_info = mysql_query($query_info) or die (mysql_error());
         $row_info = mysql_fetch_array($result_info) or die (mysql_error());
         $empresa=$row_info['company_name'];
 ?>
<head>
    <link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
	<meta charset="utf-8">
    <title><?php echo $empresa; ?></title>
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
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <!-- End Fav and touch icons -->
    
    
    
  </head>

  <body>
	
    <div class="head" style="background:#bbedfe;"><!--Cabezera , fondo azul, logo, agrowebpr banner -->
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
    </div><!-- Fin de Cabezera, fondo azul, logo, agrowebpr banner -->
	<div class="navbar"><!--.navbar-->
		<div class="navbar-inner">
			<div class="container">
			<!-- -->
			  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <!-- -->
			  <div class="nav-collapse collapse">
					<ul class="nav"><!-- De Inicio a Contactos -->
						<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
						<li><a href="nosotros.php">Nosotros</a></li>
						<li><a href="Contacts.php">Contactos</a></li>
					</ul><!-- fin de Inicio a Contactos -->					
					<div class="pull-right"><!-- Dropdown de bienvenida del usuario -->
						<ul class="nav pull-right">
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
						</ul>
					</div><!-- Fin Dropdown de bienvenida del usuario -->
					<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
					  <input class="search" type="search" placeholder = "Busqueda">
					  <button type="submit" class="btn"><i class="icon-search"></i></button>
					</form><!--Fin Search de Navegación-->
			  </div>
			</div><!--/.container -->
		</div><!--/.navbar-inner-->
    </div><!--/.navbar-->
	<div class="container"><!-- container -->
			<div class="row"><!-- row -->
				<div class="span2"><!-- Imagen de usuario -->
					<img src = "img/default-user-icon-profile.png" alt="" class="img-rounded"/>
				</div><!-- Fin de imagen de usuario -->
				<div class = "span4"><!--span4-->
					<blockquote>
							<p><?echo $row_info['company_name'];?></p>
							<small><cite title="Source Title"><?echo $row_info['street_address'] . " " . $row_info['town'];?><i class="icon-map-marker"></i></cite></small>
					</blockquote>
					<p><!-- Enviar mensaje para este cliente, boton de mensajes y info de telefono -->
						<?php echo $row_info['description'];?><br>
						<?php if($company_id==$_SESSION['profile_id']){?>
						<i class="icon-bookmark"></i><?php echo $row_info['phone'];?><br>
						<?php }else{ ?>
						<label>Telefono:</label><?php echo $row_info['phone'];?><br>
						<i class="icon-envelope"></i><a href ="new_pm.php?company_id=<?php echo $company_id;?>">Mensajes</a><br>
						<?php } ?>
					</p><!-- Fin de Enviar mensaje para este cliente, boton de mensajes y info de  telefono -->
					<p> 
					<?php
						 if(isset($_SESSION['profile_id'])){
							 $already_favorite = mysql_query("SELECT * FROM favorite WHERE profile_id = '$profile_id' AND company_id ='$company_id'") or die(mysql_error());
							 $already_favorite_rows =  mysql_num_rows($already_favorite);
						 
						if(isset($_REQUEST['function']) && isset($_SESSION['profile_id']) 
							&& $_REQUEST['function']=="add_fav" && $already_favorite_rows==0){
							
							$profile_id=$_SESSION['profile_id'];
							$insert_fav="INSERT INTO favorite(profile_id, company_id)Values('$profile_id','$company_id');";
							mysql_query($insert_fav) or die(mysql_error());
						}}

						?>
							  <?php if($company_id==$_SESSION['profile_id']){
							  }else{
								  if($already_favorite_rows==0){
									  ?>
							  <a href ="view_profile.php?company_id=<?php echo $company_id;?>&function=add_fav"><i class="icon-star"></i>Añadir a Favoritos</a>
							  <?php }else{?>
							  <p>Esta es una de tus Empresas Favoritas</p>
								  
						  <?php    }} ?>
					</p>
				</div><!--/.span4-->
				<div class="row-fluid">
					<div class="span4">
						<iframe width="425" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
						src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo "$row_info[town]";?>,+Puerto+Rico&amp;aq=0&amp;oq=barceloneta&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo "$row_info[town]";?>,+Puerto+Rico&amp;t=m&amp;z=14&amp;output=embed"></iframe>
					</div>
				</div>
				<div class = "span6"><!-- span6, productos en venta -->
					<table align="center">
						<tr>
							<td width="389" height="50"> Ventas </td>
							
							
						</tr>
						<?php
						$query_venta="SELECT * FROM product_line WHERE profile_id = '$company_id';";
						
						$result_venta = mysql_query($query_venta) or die(mysql_error());
						
						?> 
					   <?php
						while($myrow = mysql_fetch_array($result_venta)){
					   ?>
						
						<td><a href ="production.php?production_id=<?php echo $myrow['production_id']; ?>"><?php echo "<p>" . $myrow['product_name']
								 . " " . $myrow['variedad_name'] . "</a><p>" . $myrow['quantity'] . "/" . $myrow['unit'] . "</font></p>"; ?></a></td> 
									   
						</tr>
							
						<?php } ?>
					</table>
				</div><!-- /.span6, productos en venta -->
			</div><!-- /.row -->	 
			<hr><!-- Linea divisoria -->
			<div class="footer"><!-- footer -->
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
