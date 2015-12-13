<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
    <meta charset="utf-8">
    <title>Editar Produccion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <?
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

	if(isset($_REQUEST['production_id'])){
			$production_id = $_REQUEST['production_id'];
		 }else if(isset($_SESSION['production_id'])){
			 $production_id = $_SESSION['production_id'];
		 }
	 $query_production = "Select * from product_line pl, profile pr where production_id = '$production_id' and pl.profile_id = pr.profile_id";
		   $query_result = mysql_query($query_production);
		   $row_prod = mysql_fetch_array($query_result);
	?>
  

    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- End Styles -->
  
    <script type="text/javascript">
	function MM_jumpMenu(targ,selObj,restore){ //v3.0
	  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	  if (restore) selObj.selectedIndex=0;
	}
	</script>


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/assets/ico/favicon.png">
	<!-- End Fav and touch icons -->

	
	<?php
	include('mysql.php');
	mysql_select_db($database_connection) or die ("unable to connect to the database");
	?>

</head>
<body>

    <div class="head" style="background:#bbedfe;"><!-- Cabezera de Pagina, fondo azul, logo, agrowebpr banner -->
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
    </div><!-- Fin de Cabezera de Pagina, fondo azul, logo, agrowebpr banner -->

    <div class="navbar"><!-- navbar -->
      <div class="navbar-inner"><!-- navbar-inner -->
        <div class="container"><!-- container -->
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><!--  -->
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><!--  -->
          
          <div class="nav-collapse collapse">
            <ul class="nav"><!-- De Inicio a Contactos -->
				<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
				<li><a href="about.php">Nosotros</a></li>
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
            </div><!-- Fin Dropdown de bienvenida del usuario -->
            <form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegacion-->
                <input class="search" type="search" placeholder = "Busqueda">
                <button type="submit" class="btn"><i class="icon-search"></i></button>
            </form><!-- Fin Search de Navegacion-->
          </div><!-- /.nav-collapse collapse -->
        </div><!--/.container -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
    <div class="container">
		<div class="row">
			<div class="span2"><!-- Menu agricultor -->
				<div class="sidebar-nav">
					<div class="well">
						<ul class="nav nav-list"> 
						  <li class="nav-header">Menu Agricultor</li>        
						  <li><a href="profile.php"><i class="icon-home"></i>Perfil</a></li>
						  <li><a href="list_pm.php"><i class="icon-envelope"></i>Mensajes<span class="badge badge-info"></span></a></li>
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
			</div><!-- Fin Menu agricultor -->
			<div class="offset4">
				<div class="span2"><!-- Imagen de producto -->
					<img src = "img/<?php echo $row_prod['product_img'];?>" alt="" class="img"/>
				</div><!-- Fin Imagen de producto -->
				<div class = "span4"><!--span4 box -->
					<blockquote>
						<p><?php echo $row_prod['product_name'];?> <?php echo $row_prod['variedad_name'];?></p>
					</blockquote>
					<p><!-- Precio por unidad de la cantidad del producto -->
						<label><strong>Cantidad: </strong><span style="font-size: 1.5em; color: orange;"><?php echo $row_prod['quantity'];?></span><span style="font-size: 1em;">/unidades</span></label>
						<label><strong>Precio: </strong><span style="font-size: 1.5em; color: red;">$<?php echo $row_prod['sell_price']?></span><span style="font-size: 1em; color: black;">/<?php echo $row_prod['unit']?></span></label>
					</p><!-- Fin Precio por unidad de la cantidad del producto -->
					<form action="add_restock.php?production_id= <?php echo $row_prod['production_id']; ?>" method="post"><!-- box de nueva informacion del producto -->
						<table class="table"><!-- Tabla de info -->
							<tbody>
								<tr>
									<td>Nueva Cantidad</td>
									<td>Fecha Empezada</td>
									<td>Fecha Finalizada</td>
								</tr>
								<tr>
									<td>
									  <input type="number" name="quantity"  required style="width: 45px; padding: 1px" value="<?php echo $row_prod['quantity']; ?>" min="<?php echo $row_prod['quantity']; ?>"> 
									</td>
									<td>
									  <input type="date" value="<?php echo $row_prod['date_started'];?>" name="date_started" required> 
									</td>
									<td>
									   <input type="date" value="<?php echo $row_prod['expected_finish'];?>" name="date_ended" required>
									</td>
								</tr>
							</tbody>
						</table><!-- fin de Tabla de info -->
						<button class="btn btn-default" type="reset" >Cancelar</button><!-- Boton cancelar -->
						<button class="btn btn-primary" type="submit">Guardar</button> <!-- Boton guardar -->     
					</form><!-- fin box de nueva informacion del producto -->
				</div><!-- /.span4 -->
			</div><!-- /.offset4 -->
		</div><!-- /.row -->
		<br><!-- Espacio -->
		<hr><!-- Linea divisoria -->
		<div class="footer"><!-- footer -->
			<p>&copy; AgroWebPR 2013</p>
		</div><!-- /.footer -->
	</div> <!-- /.container -->

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
