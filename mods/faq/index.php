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
	<?php include_once("cabepie/cabecera.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">FAQ
                    <small>Sugerencias</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../../">Principal</a>
                    </li>
                    <li class="active">FAQ</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">¿Que es aprendizaje visual?</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                Aprendizaje visual es una página web destinada a niños de 3 a 6 años con discapacidad, que ayudara a entender que son los números y vocales a como se representan y se usan en nuestra vida cotidiana
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">¿Cómo empiezo?</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                La página principal esta dividida en dos módulos (Números y Vocales), en el que usuario debe clickear en uno de ellos para poner en marcha la aplicación y cargar el módulo deseado
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">¿Cómo cambio el idioma de la página web?</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                Para cambiar el idioma de la web, nos dirigimos a la página principal y nos vamos al pie de la página, en la parte derecha inferior veremos dos iconos con los siguientes idiomas:Español e inglés, pulse sobre uno de ellos y la página web cambiara automaticamente con el idioma seleccionado.
                                Si mientras estamos usando la página, queremos cambiar el idioma, deberemos hacer el mismo procedimiento ya que el cambio de idioma esta en la página principal.
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.panel-group -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <hr>

        <!--Cargamos el pie-->
        <?php include_once("cabepie/pie.php"); ?>

    </div>
    <!-- /.container -->

    <!-- Cargar de JS -->
    <?php include_once("../cargar/js.php"); ?>

</body>

</html>