<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
    <meta charset="utf-8">
    <title>Reportes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <?php
     include('mysql.php');
     mysql_select_db($database_connection) or die ("unable to connect to the database");

      
     $profile_id = $_SESSION['profile_id'];
        
    $query = "SELECT * FROM profile WHERE profile_id = '$profile_id';";
    $result = mysql_query($query);
    $row_info=  mysql_fetch_array($result);
    
    $sql = mysql_query("SELECT product_name, offer_quantity * sell_price as total FROM offer off, product_line pl WHERE pl.production_id = off.production_id and company_id = $profile_id Group By product_name");
    
    $rows = array();
    $table= array();
    $table['cols']=array(
        array('label'=> 'Nombre de Producto','type' => 'string'),
        array('label'=> 'Total Comprado', 'type' => 'number')
    );
    
    $rows = array();
    while($r = mysql_fetch_array($sql)){
        $temp = array();
        
        $temp[]= array('v'=> (string) $r['product_name']);
        
        //Values of each bar
        
        $temp[] = array('v'=>(float) $r['total']);
        $rows[] = array('c' => $temp);
    }
    
    $table['rows'] = $rows;
    $jsonTable = json_encode($table);
         
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
    <link rel="shortcut icon" href=".assets/ico/favicon.png">
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
						<div class="pull-right"><!-- Dropdown de Bienvenida de Usuario -->
							<ul class="nav pull-right">
								<li><a href="" class="dropdown-toggle">Bienvenido, <?php echo $row_info['full_name'];?> <b class="caret"></b></a>
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
						  <input class="search" name="keyword" type="search" placeholder = "Busqueda">
						  <button type="submit" class="btn"><i class="icon-search"></i></button>
						</form><!--Fin Search de Navegación-->
					</div><!-- /.nav-collapse collapse -->
				</div><!--/.container -->
			</div><!-- /.navbar-inner -->
		</div><!-- /.navbar -->
		<div class="container">
			<div class="row"><!-- row -->
				<div class="span2"><!-- Menu de Perfil -->
					<div class="sidebar-nav">
						<div class="well">
							<ul class="nav nav-list"> 
							  <li class="nav-header">Menu de Perfil</li>        
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
				</div><!-- Fin de menu de perfil -->
				<div class="offset3"> 
					<div id="chart_div"></div>
				</div>
				<!-- -->
				<div class="span2_2">				
					<div class="span2_1"> 
						<div class="sidebar-nav">
							<div class="well_1">
								<ul class="nav nav-list">      
								  <li><a href="reports.php">Ofertas Realizadas</a></li>
								</ul>
							</div>
						</div>
					</div> 
					<div class="span2_1">
						<div class="sidebar-nav">
							<div class="well_1">
								<ul class="nav nav-list">
								  <li><a href="reports2.php">Ofertas Recibidas</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="span2_1">
						<div class="sidebar-nav">
							<div class="well_2">
								<ul class="nav nav-list">
								  <li><a href="reports3.php">Promedio de Precio por Producto</a></li>
								</ul>
							</div>
						</div>
					</div><!-- -->
				</div>
			</div><!-- /.row -->
			<hr><!-- linea divisoria -->
			<div class="footer"><!-- footer -->
				<p>&copy; AgroWebPR 2013</p>
			</div><!-- /.footer -->
		</div><!-- container -->
      
      

						<!-- Javascript-->
    <!-- ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	
				
				
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function () { 
				$('.dropdown-toggle').dropdown(); 
				}); 
		
		// Load the Visualization API and the piechart package.
		google.load('visualization', '1', {'packages':['corechart']});
		  
		// Set a callback to run when the Google Visualization API is loaded.
		google.setOnLoadCallback(drawChart);
		  
		function drawChart() {          
		  // Create our data table out of JSON data loaded from server.
		  var data = new google.visualization.DataTable(<?=$jsonTable?>);
		  var options={
			  title: 'Mis Ventas',
			  is3d: 'true',
			  width: 800,
			  height: 600
		  };
var formatter = new google.visualization.NumberFormat({prefix: '$'});
                  formatter.format(data, 1); // Apply formatter to second column

		  // Instantiate and draw our chart, passing in some options.
		  var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
		  chart.draw(data,options);
		}
    </script>
	
 
  </body>
</html>
