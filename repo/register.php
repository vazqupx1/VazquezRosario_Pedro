<?
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/pawlogo05 beta.png" type="image/x-icon" />
    <meta charset="utf-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<!-- Styles -->
	
	
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
	<!-- End Fav and touch icons -->
</head>
<body> 
	<div class="head" style="background:#bbedfe;"><!--CAbezera , fondo azul, logo, agrowebpr banner -->
			  <div class="row-fluid">
				  <div class="span12">
					  <div class="span2">
						  <a class="brand" href="index.php"><img src ="img/pawlogo05 beta.png"> </a>
					  </div>
					  <div class="row-fluid">
						  <div class="span6">
							  <h1 class="muted" style="color:green; ">Bienvenidos a  <a  href="index.php" ><img class="banner-agrow" src="img/AgroWebPR banner text clear.png"></a></h1>
						  </div>
					  </div>
				  </div>
			  </div>
	</div><!-- Fin de CAbezera , fondo azul, logo, agrowebpr banner -->
	<br/>
	<div class="container"><!-- container -->
		<div class="row"><!-- row -->
			<div class="span4 offset1 well"><!-- Formulario de registro -->
				<legend class="Reg_1">Registro</legend>
				<form method="POST" action="register_form.php" accept-charset="UTF-8"><!--  -->
					<div class="control-group" ><!-- Nombre de Completo del Usiario -->
						<label class="control-label" for ="fullName">Nombre Completo</label>
						<div class="controls" style=" margin:10px;">
							<input type="text" name="full_name" id ="full_name" required="required" placeholder="E.g. Ashwin Hedge">
						</div>
					</div><!-- Fin Nombre de Completo del Usiario -->
					<div class="control-group"><!-- Correo -->
						<label class="control-label"  style=" margin:3px;"for ="email">Email</label>
						<div class="controls" style=" margin:10px;"> 
						  <input type="email" name="email" id ="email"  required="required" placeholder="E.g. fulano@agrowebpr.com">
						</div>
					</div><!-- FIn de Correo -->
					<div class="control-group"><!-- Contraseña -->
						<label class="control-label" style=" margin:3px;"for ="password">Contraseña</label>
						<div class="controls" style=" margin:10px;">
							<input type="password" name="password" required="required" id="password" placeholder="Min. 8 Characters">
						</div>
					</div><!-- Contraseña -->
					<div class="control-group"><!-- Repeticion Contraseña -->
						<label class="control-label" style=" margin:3px;"for ="password">Repita Contraseña</label>
						<div class="controls" style=" margin:10px;">
							<input type="password" name="password" required="required" id="password" placeholder="Min. 8 Characters">
						</div>
					</div><!-- Fin Repeticion Contraseña -->
					<div class="control_group"><!-- Nombre de su Compañia -->
						<label class="control-label"style=" margin:3px;" for ="company_name">Nombre de su Compañia </label>
						<div class="controls" style=" margin:10px;">
							<input type="text" name="company_name" required="required" placeholder="E.g. Finca de Juan">
						</div>
					</div><!-- Fin Nombre de su Compañia -->
					<div class="control-group"><!-- Seleccion de Tipo de Cuenta -->
						<label class ="control-label"style=" margin:3px;" >Tipo de Cuenta</label>  
						<div class="controls" style=" margin:10px;">
							<select  id="type" name="type" required>
								<option value ="">--Seleccione Tipo de Cuenta--</option>
								<option value ="farmer">Agricultor</option>
								<option value ="manufacturer">Manufacturero</option>
								<option value ="buyer">Vendedor </option>
							</select>
						</div>
					</div><!-- Fin de Seleccion de Tipo de Cuenta -->
					<div class="control-group"><!-- Terminos y condiciones + boton de registrar, Ayuda -->
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" required="required">Accepto todos los<a href="#">Terminos y Condiciones de Servicios.</a>
							</label>
							<button class="btn btn-success" type="submit">Registrarse</button>
							<button class="btn" type="button">Ayuda</button>
						</div>
					</div><!-- Fin Terminos y condiciones + boton de registrar, Ayuda -->
				</form> <!-- Fin formulario -->   
			</div><!-- Fin Formulario de registro -->
			<div class="span3"><!-- Pregunta ¿Ya tengo una cuenta? con la redireccion -->
				<form method="POST" action="log_in.php" accept-charset="UTF-8">
					<p>¿Ya tengo una cuenta? </p>
					<button class="btn btn-success" type="submit">Identificarme</button>
				</form>
			</div><!-- Fin Pregunta ¿Ya tengo una cuenta? con la redireccion -->
		</div><!-- /.row -->
		<hr><!-- linea divisoria -->
		<div class="footer"><!-- footer -->
			<p>&copy; AgroWebPR 2013</p>
		</div><!-- /.footer -->
	</div><!-- container -->


							<!-- Javascript-->
		<!-- ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>