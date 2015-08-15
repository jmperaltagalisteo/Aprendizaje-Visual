<?php 
    session_start();

    //Idioma
    if(empty($_SESSION['lang']))
        $_SESSION['lang'] = 'es';

    //Numero
    if(empty($_SESSION['numero']))
        $_SESSION['numero'] = 1;

    //Vocal
    if(empty($_SESSION['vocal']))
        $_SESSION['vocal'] = 'a';

?>

<!DOCTYPE html>
<html lang="es">

<!--Incluimos los css y atributos-->
<?php include_once("../cargar/head.php"); ?>

<body>

    <!--Cargarmos el nav principal-->
	<?php include_once("../cargar/cabecera.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Condiciones
                    <small>Condiciones de uso y términos legales </small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
		<br>
        <!-- Projects Row -->
        <div class="row">
        	<div class="col-lg-12">
				<p>
					<strong>Copyrights</strong><br />
					El diseño, textos, gráficos y otros elementos son propiedad de Aprendizaje Visual. Todos los derechos reservados. Está terminantemente prohibida la reproducción parcial o total del presente portal sin permiso expreso. 
				</p>
				<p>
					<strong>Limitación de la responsabilidad</strong><br />
					Aprendizaje Visual declina cualquier responsabilidad relativa a daños producidos por terceros debido a los medios electrónicos utilizados tales como virus, troyanos, bombas lógicas o cualquier otras rutinas de programación contra la propiedad y que hayan utilizado Aprendizaje Visual como medio para ello.
				</p>
				<p>
					<strong>Cookies</strong><br />
					Aprendizaje Visual no utiliza cookies en ninguna de sus páginas.Puede ver toda la información de nuestras Cookies pulsando <a class="enlac" href="cookies.php">aquí</a>.
				</p>
        	</div>
        </div>
        <!-- /.row -->

        <hr>
		
		 <!--Cargamos el pie-->
         <?php include_once("../cargar/pie.php"); ?>

    </div>
    <!-- /.container -->

    <!-- Cargar de JS -->
    <?php include_once("../cargar/js.php"); ?>

</body>

</html>