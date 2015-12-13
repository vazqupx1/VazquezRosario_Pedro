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
        
      $find_profile = mysql_query("SELECT * FROM profile WHERE profile_id = '$profile_id'");
       $row_info = mysql_fetch_array($find_profile);   
    
        
     if(isset($_REQUEST['production_id'])){
        $production_id = $_REQUEST['production_id'];
     }else if(isset($_SESSION['production_id'])){
         $production_id = $_SESSION['production_id'];
     }
        //////find profile id///
       
       $query_production = "Select * from product_line pl, profile pr where production_id = '$production_id' and pl.profile_id = pr.profile_id";
       $query_result = mysql_query($query_production);
       $row_prod = mysql_fetch_array($query_result);
       
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
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><!-- -->
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button><!-- -->
					<div class="nav-collapse collapse">
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
						</div><!-- Fin Dropdown de Bienvenida de Usuario-->
						<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
						  <input class="search" type="search" placeholder = "Busqueda">
						  <button type="submit" class="btn"><i class="icon-search"></i></button>
						</form><!--Fin Search de Navegación-->
					</div><!-- /.nav-collapse collapse-->
				</div><!--/.container -->
			</div><!-- /.navbar-inner -->
		</div><!-- /.navbar -->
		<div class="container"> <!-- container -->             
			<div class="row">
				<div class="span2"><!-- imagen de producto-->
					<img src = "img/<?php echo $row_prod['product_img'];?>" alt="" class="img"/>
				</div><!-- fin de imagen de producto-->
				<div class = "span4"><!-- info del producto -->
					<blockquote>
						<p><?php echo $row_prod['product_name'];?> <?php echo $row_prod['variedad_name'];?></p>
						<small><label>By:<a href="view_profile.php?company_id=<?php echo $row_prod['profile_id'];?>"><?php echo $row_prod['company_name']?></a></label></small>
						<small><cite title="Source Title"><?echo $row_prod['town'];?><i class="icon-map-marker"></i></cite></small>
					</blockquote>
					<p>
						<label><strong>Cantidad: </strong><span style="font-size: 1.5em; color: orange;"><?php echo $row_prod['quantity'];?></span><span style="font-size: 1em;">/unidades</span></label>
						<label><strong>Precio: </strong><span style="font-size: 1.5em; color: red;">$<?php echo $row_prod['sell_price']?></span><span style="font-size: 1em; color: black;">/<?php echo $row_prod['unit']?></span></label>
					</p>
					 <?php if($row_prod['profile_id'] == $_SESSION['profile_id'])
					{
					}else{?>
					<form action="add_offer.php?production_id=<?php echo $production_id;?>" method ="post">
						<table class="table">
							<tbody>
								<tr>
									<td>Cantidad</td>
									<td>Fecha de Entrega</td>
									<td>Hacer Oferta </td>
								</tr>
								<tr>
									<td>
										<input type="number" name="quantity" style="width: 45px; padding: 1px" value="1" min="1" max="<?php echo $row_prod['quantity']; ?>"> 
									</td>
									<td>
										<input type="date" name="need_date"> 
									</td>
									<td> 
										<center><button>
										<i class="icon-tag"></i></button></center>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div><!-- fin info del producto-->
			</div><!-- /.row -->
		</div>	<!--/.container -->
		<br><!-- espacio -->
		<hr><!-- linea divisoria -->
		<div class="footer"><!-- footer -->
			<p>&copy; AgroWebPR 2013</p>
		</div><!-- /.footer -->
		<?}?>
	</body>
</html>
