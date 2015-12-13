<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
    <meta charset="utf-8">
    <title>Añadir Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <?
    include("mysql.php");
    mysql_select_db($database_connection) or die ("unable to connect to the database");
     
//Determina si hay un usuario Log In de no ser cierto lo envia a la pagina de log in

    if($_SESSION['profile_id']){
    $profile_id = $_SESSION['profile_id'];
    }else{
            echo "<script type = 'text/javascript' language='javascript'>
        location.replace('log_in.php');</script>";
        }
  //Query para buscar la informacion del usuario
	$find_profile = mysql_query("SELECT * FROM profile WHERE profile_id = '$profile_id'");
	$row_info = mysql_fetch_array($find_profile);
	?>
  

    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<!-- End Styles-->
	
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
	
    <div class="head" style="background:#bbedfe;"><!-- Cabezera, logo, fondo azul, agrowebpr banner -->
          <div class="row-fluid">
              <div class="span12">
                  <div class="span2"><!-- Logo -->
                      <a class="brand" href="index.php"><img src ="img/pawlogo05 beta.png"> </a>
                  </div><!-- Fin Logo -->
                  <div class="row-fluid"><!-- Agrowebpr banner -->
                      <div class="span6">
                          <a  href="index.php" ><img class="banner-agrow" src="img/AgroWebPR banner text clear.png"></a>
                      </div>
                  </div><!--  Fin de Agrowebpr banner -->
              </div>
          </div>
      </div><!-- Fin de Cabezera, logo, fondo azul, agrowebpr banner-->
	<div class="navbar"><!--navbar-->
		<div class="navbar-inner"><!--navbar-inner-->
			<div class="container"><!--container-->
			  <!--  -->
			  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <!--  -->
			  <div class="nav-collapse collapse"><!-- nav-collapse collapse -->
				<ul class="nav"><!-- De Inicio a Contactos -->
					<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
					<li><a href="nosotros.php">Nosotros</a></li>
					<li><a href="Contacts.php">Contactos</a></li>
				</ul><!-- Fin De Inicio a Contactos -->
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
				  </div><!-- Fin de Dropdown de Bienvenida de Usuario -->
				<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
				  <input class="search" type="search" placeholder = "Busqueda">
				  <button type="submit" class="btn"><i class="icon-search"></i></button>
				</form><!--Fin Search de Navegación-->
			  </div><!-- /.nav-collapse collapse -->
			</div><!--/.container-->
        </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
    <div class="container"><!-- Container -->
		<div class="row">
			<div class="span2"><!-- Menu de Agricultor -->
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
			</div><!-- Fin de Menu de Agricultor -->
			<div class="offset3"><!-- Div de Añadir Producto -->
				<form class="form-signin" enctype="multipart/form-data" action="add_production.php" method="post"><!-- Formularion de Añadir Producto -->
					<label>Producto</label>
					<select name="product" required id="product" class="input-block-level"><!-- Lista de Productos  -->
						<option disabled ="disabled"></option>
						<option value="Aguacate">Aguacate</option>
						<option value="Ajo">Ajo</option>
						<option value="Apio">Apio</option>
						<option value="Ajies">Ajies</option>
						<option value="Batata">Batata</option>
						<option value="brocoli">Brocoli</option>
						<option value="Berenjena">Berenjena</option>
						<option value="Berro">Berro</option>
						<option value="Cafe">Cafe</option>
						<option value="Cilantrillo">Cilantrillo</option>
						<option value="Chironja">Chironja</option>
						<option value="China">China</option>
						<option value="Cantaloupe">Cantaloupe</option>
						<option value="Cebolla">Cebolla</option>
						<option value="Calabaza">Calabaza</option>
						<option value="Chayote">Chayote</option>
						<option value="Coco">Coco</option>
						<option value="Fresa">Fresa</option>
						<option value="Guineo">Guineo</option>
						<option value="Gingambo">Gingambo</option>
						<option value="Gengibre">Gengibre</option>
						<option value="Gandules">Gandules</option>
						<option value="Guimbombo">Guimbombo</option>
						<option value="Habichuela">Habichuela</option>
						<option value="Limon">Limon</option>
						<option value="Lechuga">Lechuga</option>
						<option value="Malanga">Malanga</option>
						<option value="Manzana">Manzana</option>
						<option value="Mango">Mango</option>
						<option value="Melon">Melon</option>
						<option value="Maiz">Maiz</option>
						<option value="Nectarines">Nectarines</option>
						<option value="Ñame">Ñame</option>
						<option value="Papaya">Papaya</option>
						<option value="Papa">Papa</option>
						<option value="Pepinillo">Pepinillo</option>
						<option value="Perejil">Perejil</option>
						<option value="Peras">Peras</option>
						<option value="Platano">Platano</option>
						<option value="Permison">Permison</option>
						<option value="Pimiento">Pimiento</option>
						<option value="Piña">Piña</option>
						<option value="Recao">Recao</option>
						<option value="Repollo">Repollo</option>
						<option value="Toronja">Toronja</option>
						<option value="Tomate">Tomate</option>
						<option value="Yautia">Yautia</option>
						<option value="Yuca">Yuca</option>
						<option value="Zanahoria">Zanahoria</option>
					</select><!-- Fin Lista de Productos -->
					<label>Variedad</label><input type="text" name="variedad" class="input-block-level"/><!-- Input de VAriedad -->
					<label>Typo de Producto </label> 
					<select name="type" id ="type" required class="input-block-level"><!-- Seleccion de Tipo de Producto -->
					  <option disabled ="disabled"></option>
					  <option value="Cafe">Café</option>
					  <option value="Lacteos">Lacteos</option>
					  <option value="Frutas">Frutas</option>
					  <option value="Viandas">Viandas</option>
					  <option value="Vegetales">Vegetales</option>
					  <option value="Otros">Otros</option>
					</select><!-- Fin de Seleccion de Tipo de Producto -->
					<label>Fecha Empezada</label><input type="date" required name="starting_date" class="input-block-level"/>
					<label>Fecha Esperada de Finalizacion</label><input type="date" required name="finished_date" class="input-block-level"/>
					<label>Cantidad de Produccion</label> <input type="text" name="quantity" required class="input-block-level"/>
					<label>Precio de Venta</label> <input type="text" name="sell_price" required  class="input-block-level"/>
					<label>Unidad de Venta</label><!-- Seleccion de Tipo de Unidad en que se va a vender el producto -->
					<select id="unit_select" name="unit_select" required style="width:200px">
					  <option value="racimos">Racimos</option>
					  <option value="libras">Libras</option>
					  <option value="sacos">Sacos </option>
					  <option value ="kilos"> Kilos </option>
					  <option value ="unidad">Unidad </option>
					  <option value ="caja"> Cajas </option>
					</select><!-- Fin de Seleccion de Tipo de Unidad en que se va a vender el producto -->
					<label>Imagen de Producto</label>
					<input type="file" name="product_img" class="input-block-level"/>
				    <br><!-- Espacio-->
					<button class="btn btn-default" >Cancelar</button>
					<button class="btn btn-primary" type="submit">Guardar</button>      
				</form><!-- Fin de Formulario de Añadir Producto -->
			</div> <!-- Fin de Div de Añadir Producto -->   
		</div><!-- /.row --> 
		<hr><!--linea divisoria-->
			<div class="footer"><!-- footer -->
				<p>&copy; AgroWebPR 2013</p>
			</div><!-- /.footer -->
    </div> <!-- /container -->

						<!-- Javascript-->
    <!-- ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		 <script type="text/javascript"> 
		$(document).ready(function () { 
		$('.dropdown-toggle').dropdown(); 
		}); 
		</script>
	<!-- End Javascript -->

  </body>
</html>
