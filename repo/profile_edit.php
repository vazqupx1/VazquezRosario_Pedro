<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
    <meta charset="utf-8">
    <title>Edición de Perfil</title>
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="/assets/ico/favicon.png">
<?php
include('mysql.php');
mysql_select_db($database_connection) or die ("unable to connect to the database");
   
    if(isset($_SESSION['profile_id'])){
        $profile_id = $_SESSION['profile_id'];
    }
 $query_user = "SELECT * FROM profile WHERE profile_id='$profile_id';";
 $result_user = mysql_query($query_user) or die (mysql_error());
 $row = mysql_fetch_array($result_user);
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
	<div class="navbar"><!-- navbar -->
		<div class="navbar-inner"><!-- navbar-inner -->
			<div class="container"><!-- container -->
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="nav-collapse collapse">
					<ul class="nav"><!-- De Inicio a Contactos -->
						<li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
						<li><a href="nosotros.php">Nosotros</a></li>
						<li><a href="Contacts.php">Contactos</a></li>
					</ul><!-- fin de Inicio a Contactos -->
					<div class="pull-right"><!-- Dropdown de Bienvenida de Usuario -->
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
					</div><!-- Fin Dropdown de Bienvenida de Usuario -->
					<form class="navbar-form pull-right" action="search_result.php" method="GET"><!--Search de Navegación-->
						<input class="search" type="search" placeholder = "Busqueda">
						<button type="submit" class="btn"><i class="icon-search"></i></button>
					</form><!--Fin Search de Navegación-->
				</div><!-- nav-collapse collapse -->
			</div><!--/.container -->
        </div><!--/.navbar-inner -->
    </div><!--/.navbar -->
	<div class="container"><!-- container -->
		<div class="row"><!-- row -->
			<div class="span2"><!-- Menu Agricultor -->
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
            </div><!-- Menu Agricultor -->
			<div class="offset3"> <!-- formulario De Editacion de perfil --> 
				<form class="form-signin" action="profile_insert.php" method="post" enctype="multipart/form-data">
					<h6><?php echo $row['company_name']?></h6>
					<input type="text" name="phone" class="input-block-level" placeholder="Phone Number" pattern ="^[0-9]{6}|[0-9]{8}|[0-9]{10}$"  value="<?php if($row>0){echo 
						$row['phone'];}?>"/>
					
					<textarea name="description" id="description" class="input-block-level" placeholder="Description"> </textarea>
					
					<input type="text" name="street_address"  class="input-block-level" placeholder="Address" value = "<?php if
						($row>0){echo $row['street_address'];}?>"/>
					
					<select name="town" required id="town">
						<option value ="0">Selecione el Pueblo</option>
						<option value="Adjuntas">Adjuntas</option>
						<option value="Aguada">Aguada</option>
						<option value="Aguadilla">Aguadilla</option>
						<option value="Aguas Buenas">Aguas Buenas</option>
						<option value ="Aibonito">Aibonito</option>
						<option value ="Anasco">Anasco</option>
						<option value ="Arecibo">Arecibo</option>
						<option value="Arroyo">Arroyo</option>
						<option value ="Barceloneta">Barceloneta</option>
						<option value="Barranquitas">Barranquitas</option>
						<option value="Bayamon">Bayamon</option>
						<option value="Cabo Rojo">Cabo Rojo</option>
						<option value ="Caguas"> Caguas</option>
						<option value ="Camuy">Camuy</option>
						<option value ="Canovanas">Canovanas</option>
						<option value="Carolina">Carolina</option>
						<option value="Catano">Catano</option>
						<option value="Cayey">Cayey</option>
						<option value="Ceiba">Ceiba</option>
						<option value="Ciales">Ciales</option>
						<option value="Cidra">Cidra</option>
						<option value="Coamo">Coamo</option>
						<option value="Comerio">Comerio</option>
						<option value="Corozal">Corozal</option>
						<option value="Culebra">Culebra</option>
						<option value="Dorado">Dorado</option>
						<option value="Fajardo">Fajardo</option>
						<option value="Florida">Florida</option>
						<option value="Guanabo">Guanabo</option>
						<option value="Guanica">Guanica</option>
						<option value="Guayama">Guayama</option>
						<option value="Guayanilla">Guayanilla</option>
						<option value="Gurabo">Gurabo</option>
						<option value="Hormigueros">Hormigueros</option>
						<option value="Humacao">Humacao</option>
						<option value="Isabela">Isabela</option>
						<option value="Jayuya">Jayuya</option>
						<option value="Juana Diaz">Juana Diaz</option>
						<option value="Juncos">Juncos</option>
						<option value="Lajas">Lajas</option>
						<option value="Lares">Lares</option>
						<option value="Las Marias">Las Marias</option>
						<option value="Las Piedras">Las Piedras</option>
						<option value="Loiza">Loiza</option>
						<option value="Luquillo">Luquillo</option>
						<option value="Manati">Manati</option>
						<option value="Maricao">Maricao</option>
						<option value="Maunabo">Maunabo</option>
						<option value="Mayaguez">Mayaguez</option>
						<option value="Moca">Moca</option>
						<option value="Mona">Mona</option>
						<option value="Morovis">Morovis</option>
						<option value="Naguabo">Naguabo</option>
						<option value="Naranjito">Naranjito</option>
						<option value="Orocovis">Orocovis</option>
						<option value="Patillas">Patillas</option>
						<option value="Penuela">Penuela</option>
						<option value="Ponce">Ponce</option>
						<option value="Quebradillas">Quebradillas</option>
						<option value="Rincon">Rincon</option>
						<option value="Rio Grande">Rio Grande</option>
						<option value="Rio Piedras">Rio Piedras</option>
						<option value="Sabana Grande">Sabana Grande</option>
						<option value="Salinas">Salinas</option>
						<option value="San German">San German</option>
						<option value="San Juan">San Juan</option>
						<option value="San Lorenzo">San Lorenzo</option>
						<option value="San Sebastian">San Sebastian</option>
						<option value="Santa Isabel">Santa Isabel</option>
						<option value="Toa Alta">Toa Alta</option>
						<option value="Toa Baja">Toa Baja</option>
						<option value="Trujillo Alto">Trujillo Alto</option>
						<option value="Utuado">Utuado</option>
						<option value="Vega Alta">Vega Alta</option>
						<option value="Vega Baja">Vega Baja</option>
						<option value="Vieques">Vieques</option>
						<option value="Villalba">Villalba</option>
						<option value="Yabucoa">Yabucoa</option>
						<option value="Yauco">Yauco</option>
					</select>
					<input type="text" name="zip" id="zip" class="input-block-level" placeholder="Zip Code" value="<?
					if($row>0){echo $row['zip'];}?>"/>
					
					<input type="text" name="web" class="input-block-level" placeholder="Web Page" value ="<?php if($row>0)
						{echo $row['web_page'];}?>"/>
					
					<label for="file">Imagen de Perfil:</label>
					<input type="file" name="upload"/>
					<button class="btn btn-large btn-success" type="submit">Editar Perfil</button>
				</form>
			</div><!-- Fin formulario De Editacion de perfil -->
			<hr><!-- linea divisoria -->
			<div class="footer"><!-- footer -->
				<p>&copy; AgroWebPR 2013</p>
			</div><!-- /.footer -->
		</div> <!-- /.row-->
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
