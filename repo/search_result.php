<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
    <meta charset="utf-8">
    <title>Resultados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<!-- End Styles -->
  
    <script type="text/JavaScript">
		function lookup(inputString){
		if (inputString.length==0){
		$('#suggestions').hide();
		} else{
		$.post("suggestions.php",{
		queryString: "" + inputString + ""},
		function(data){
		$('#suggestions').html(data);
		});
		}
		}
	</script>



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
		include('mysql.php');
		mysql_select_db($database_connection) or die ("unable to connect to the database");

		//This checks to see if there is a page number. If not, it will set it to page 1 

		 
		 
		$keyword = $_REQUEST['keyword'];
		if(isset($_SESSION['profile_id'])){
		 $profile_id=$_SESSION['profile_id'];
		$find_profile = mysql_query("SELECT * FROM profile WHERE profile_id = '$profile_id'");
		$row_info = mysql_fetch_array($find_profile);   
		}

		$query_venta = "SELECT production_id,account_type,expected_finish,quantity, town, sell_price, unit, product_name,variedad_name, product_type, pl.profile_id, company_name
			FROM product_line pl NATURAL JOIN profile pro WHERE pl.profile_id = pro.profile_id AND company_name LIKE '%$keyword%' OR product_name LIKE '%$keyword%' OR product_type LIKE '%$keyword%' ORDER BY product_name ASC";
		$result_query = mysql_query($query_venta) or die(mysql_error());
		$nr=  mysql_num_rows($result_query);
		if(isset($_GET['pn'])){
			$pn = preg_replace('#[^0-9]#i',"", $_GET['pn']);
					
		}else{
			$pn=1;
		}

		//This is where we set how many database items to show on each page
		$itemsPerPage=5;
		//Get the value of the last page in the pagination result set
		$lastPage = ceil($nr/$itemsPerPage);

		if($pn<1){
			$pn=1;
		}else if($pn>$lastPage){
			$pn = $lastPage;
		}

		$centerPages="";
		$sub1=$pn - 1;
		$sub2 = $pn - 2;
		$add1 = $pn + 1;
		$add2 = $pn + 2;

		if($pn == 1){
			$centerPages = '&nbsp;<span class="pagNumActive">'.$pn.'</span>&nbsp;';
		 $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
		} else if ($pn == $lastPage) {
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
		} else if ($pn > 2 && $pn < ($lastPage - 1)) {
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
		} else if ($pn > 1 && $pn < $lastPage) {
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
		}

		$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 

		$sql2 = mysql_query("SELECT production_id,account_type,expected_finish, quantity, town, sell_price, unit, product_name,variedad_name, product_type, pl.profile_id, company_name
			FROM product_line pl NATURAL JOIN profile pro WHERE pl.profile_id = pro.profile_id AND company_name LIKE '%$keyword%' OR product_name LIKE '%$keyword%' OR product_type LIKE '%$keyword%' ORDER BY product_name ASC $limit");

		$paginationDisplay = "";

		if($lastPage != "1"){
			$paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
			// If we are not on page 1 we can place the Back button
			if ($pn != 1) {
				$previous = $pn - 1;
				$paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
			} 
			// Lay in the clickable numbers display here between the Back and Next links
			$paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
			// If we are not on the very last page we can place the Next button
			if ($pn != $lastPage) {
				$nextPage = $pn + 1;
				$paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> Next</a> ';
			} 
		}
		 
		 
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

    <div class="navbar"><!--navbar-->
		<div class="navbar-inner"><!--navbar-inner-->
			<div class="container"><!--container -->
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><!-- --> 
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button><!-- --> 
				<div class="nav-collapse collapse"><!--nav-collapse collapse-->
					<ul class="nav"><!-- De Inicio a Contactos -->
						<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
						<li><a href="nosotros.php">Nosotros</a></li>
						<li><a href="Contacts.php">Contactos</a></li>
					</ul><!-- Fin De Inicio a Contactos -->
					<div class="pull-right">
						<ul class="nav pull-right">
							<?php if(isset($_SESSION['profile_id'])){
							?>
							<!-- Dropdown de bienvenida del usuario --> 
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
							</li><!--Fin de  Dropdown de bienvenida del usuario --> 		
							<?php }else{?>
							<li><a href="register.php">Registrarme</a></li><!-- Boton Registrarme -->
							<li class="divider-vertical"></li>
							<li class="dropdown"><!-- Login --> 
								<a class="dropdown-toggle" href="#" data-toggle="dropdown">Identificarme<strong class="caret"></strong></a>
								<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
									<form method="post" action="login.php"  accept-charset="UTF-8">
										<input style="margin-bottom: 15px;" type="text" placeholder="Email" id="username" name="email">
										<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
										<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
										<label class="string optional" for="user_remember_me">Recordar</label>
										<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
									</form>
								</div>
							</li><!-- End Login --> 
							<?php }?>
						</ul>
					</div>
					<form class="navbar-form pull-right" action ="search_result.php" method="GET"><!--Search de Navegación-->
						<input class="search" name="keyword" type="search" onkeyup="showResult(this.value)" placeholder = "Busqueda">
						<button type="submit" class="btn"><i class="icon-search"></i></button>
					</form><!--Fin Search de Navegación-->
				</div><!--/.nav-collapse collapse-->
			</div><!--/.container -->
        </div><!--/.navbar-inner-->
    </div><!--/.navbar-->
    <div class="container">
		<h2> Resultados: <?php echo $nr; ?> </h2>
		<?php 
			if($nr==0)
			{
				echo'No hay ninguna venta disponible';
				
			}else{
		?>
		<?php while($myrow=  mysql_fetch_array($sql2)){
		?>
		<div class="row"><!-- Nombre y Id de Producto --> 
		  <div class="span2">
			<h4><strong><a href="production.php?production_id=<?php echo $myrow['production_id']; ?>"><?php echo $myrow['product_name']. " ". $myrow['variedad_name'];?></a></strong></h4>
		  </div>
		</div><!-- Fin Nombre y Id de Producto --> 
		<div class="row"><!-- row -->
		  <div class="span2"><!-- Imagen del producto -->
			<a href="#" class="thumbnail">
				<img src=“img/<?php echo $myrow['product_img']; ?>“ alt="">
			</a>
		  </div><!-- Fin Imagen del producto -->
		  <div class="span5">  <!-- span5, box de info del producto e venta-->    
			<p><!-- Nombre de Compañia, Cantidad y Precio del Producto en venta -->
				<label><strong>Nombre de Compañia:</strong> <a href="view_profile.php?company_id=<?php echo $myrow['profile_id'];?>"><?php echo $myrow['company_name'];?></a>
                                    <label><strong>Typo de Cuenta:</strong><?php echo $myrow['account_type']; ?> </label>
				<label><strong>Cantidad:</strong><span style="font-size: 1.5em; color: orange;"><?php echo $myrow['quantity'];?></span><span style="font-size: 1em;">/unidades</span></label>
				<label><strong>Precio:</strong><span style="font-size: 1.5em; color: green;">$<?php echo $myrow['sell_price'];?></span><span style="font-size: 1em; color: black;">/<?php echo $myrow['unit']?></span></label>
                                                                <label><strong>Disponibilidad:</strong><?php echo $myrow['expected_finish'];?></label>

                                    
				<i class="icon-globe"></i><?php echo $myrow['town'];?>
			</p><!-- Fin Nombre de Compañia, Cantidad y Precio del Producto en venta -->
			<div class="row-fluid"><!-- Imagen satelital google, ubicacion de finca -->
				<div class="span7">
					<iframe width="500" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
					src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo "$myrow[town]";?>,+Puerto+Rico&amp;aq=0&amp;oq=barceloneta&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo "$myrow[town]";?>,+Puerto+Rico&amp;t=m&amp;z=14&amp;output=embed"></iframe>
				</div>
			</div><!-- Fin imagen satelital google, ubicacion de finca -->
			<hr><!-- linea divisoria -->
		  </div><!-- Fin span5, box de info del producto e venta-->
		</div><!-- Fin row -->
   		<? }}?><!-- ????????????????????????????-->
		<center>
			<div style="margin-left:58px; margin-right:58px; padding: 6px; background-color:#FFF; border:#999 1px solid;">
				<?php echo $paginationDisplay; ?> 
			</div>
		</center>
			<hr><!-- linea divisoria -->
		<div class="footer"><!-- footer -->
			<p>&copy; AgroWebPR 2013</p>
		</div><!-- /.footer -->
	</div><!-- /.container -->


						<!-- Javascript-->
    <!-- ================================================== -->
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
	$(document).ready(function () { 
	$('.dropdown-toggle').dropdown(); 
	}); 
	</script>

  </body>
</html>
