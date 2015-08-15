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
                <h1 class="page-header">Privacidad
                    <small>Declaración de privacidad de datos</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
		<br>
        <!-- Projects Row -->
        <div class="row">
        	<div class="col-lg-12">
        		<p> 
					La web que está usted consultando es propiedad de Jose Manuel Peralta Galisteo.
				</p>
				<p>
					Jose Manuel Peralta Galisteo, creador de esta web, pretende mediante esta declaración informar a los visitantes de cual es nuestra política de protección de la privacidad y confidencialidad de los datos de carácter personal que los usuarios facilitan de forma libre y voluntaria.
				</p>
				<p>
					El objetivo de nuestra política de privacidad es respetar al máximo la legislación vigente de protección de datos personales. Si usted tiene cualquier duda sobre la confidencialidad o el tratamiento que reciben sus datos, así como si desea ejercer alguno de lo derechos de información, oposición, rectificación y cancelación que legalmente le corresponden, (o cualquier otro derecho que usted crea que le puede asistir) puede ponerse en contacto a través de este e-mail <a href="mailto:aprendizajevisual@gmail.com?Subject=Información%20Privacidad" target="_top">AprendizajeVisual@gmail.com</a>.
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