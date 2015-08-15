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

    //Comprobamos si nos ha pasado un idioma
    if (@$_GET['lang'] != null || @$_GET['lang'] != "")
    {
        if($_GET['lang'] == 'es' || $_GET['lang'] == 'en')
            $_SESSION['lang'] = $_GET['lang'];
    }

    //Idioma
    $lang = $_SESSION['lang'];

?>

<!DOCTYPE html>
<html lang="es">

<!--Incluimos los css y atributos-->
<?php include_once("html/cargar/head.php"); ?>

<body>
	
	<!--Cargarmos el nav principal-->
	<?php include_once("html/cargar/cabecera.php"); ?>

    <!-- Page Content -->
    <div class="container">
		<br>
        <!-- Projects Row -->
        <?php
            $texto1 = "";$texto2 = "";
            $audio = "";$audio2 = "";
            $img1 = "";$img2 = "";

            switch ($lang) 
            {
                case 'es':
                    $texto1 = "Números";
                    $audio = "numeros";
                    $img1 = "numeros";
                    $texto2 = "Vocales";
                    $audio2 = "vocales";
                    $img2 = "vocales";
                break;
                case 'en':
                    $texto1 = "Numbers";
                    $audio = "numeros2";
                    $img1 = "numeros2";
                    $texto2 = "Vowels";
                    $audio2 = "vocales2";
                    $img2 = "vocales";
                break;
            }

            echo '<div class="row">
                <div class="col-md-6 portfolio-itemo">
                	<h3 class="tipografia_contexto" align="center">
                        <strong>'.$texto1.'</strong>
                    </h3>
                    <a id="num" onclick="cargarPanel(this.id)">
                        <img class="img-responsive bordenegro" src="html/images/principal/'.$img1.'.jpg" alt="numeros" title="numeros">
                        <!--Reproducimos cuando pulsemos en la caja numeros-->
                        <audio id="audnum" src="html/audio/numeros/'.$audio.'.wav" preload="auto"></audio>
                    </a>
                </div>
                <div class="col-md-6 portfolio-item">
                	<h3 class="tipografia_contexto" align="center">
                        <strong>'.$texto2.'</strong>
                    </h3>
                    <a id="voc" onclick="cargarPanel(this.id)">
                        <img class="img-responsive bordenegro" src="html/images/principal/'.$img2.'.jpg" alt="vocales" title="vocales">
                        <!--Reproducimos cuando pulsemos en la caja vocales-->
                        <audio id="audvoc" src="html/audio/vocales/'.$audio2.'.wav" preload="auto"></audio>
                    </a>
                </div>
            </div>';
        ?>

        <hr>
		
		<!--Cargamos el pie-->
        <?php include_once("html/cargar/pie.php"); ?>

    </div>
    <!-- /.container -->
	
	<!-- Cargar de JS -->
    <?php include_once("html/cargar/js.php"); ?>

</body>

</html>