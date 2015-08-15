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
                <h1 class="page-header">Cookies
                    <small>Política de Cookies</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
		<br>
        <!-- Projects Row -->
        <div class="row">
        	<div class="col-lg-12">
        		<p>
        			<strong>Definición y función de las cookies</strong><br />
					¿Qué son las cookies? Una cookie es un fichero que se descarga en su ordenador al acceder a determinadas páginas web. Las cookies permiten a una página web, entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación de un usuario o de su equipo y, dependiendo de la información que contengan y de la forma en que utilice su equipo, pueden utilizarse para reconocer al usuario. 
				</p>
				<p>
                    <strong>¿Cómo bloquear las cookies?</strong><br/>
					Puede usted permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de las opciones del navegador instalado en su ordenador. Por favor consulte la guía correspondiente a su navegador:
					Bookingfax utiliza cookies en algunas páginas (Cookies de análisis y publicidad). La finalidad de dichas cookies es mejorar el servicio que ofrecen a sus clientes y a nuestros visitantes, por ejemplo para dar acceso personalizado al web. Estas cookies no recogen ningún dato personal. Puede ver toda la información de nuestras Cookies pulsando <a class="enlac" href="cookies.php">aquí</a>.
					<br />
					<ul>
						<li>Internet Explorer: <a href="http://www.windows.microsoft.com/es-xl/internet-explorer/delete-manage-cookies#ie="ie-10"">windows.microsoft.com/es-xl/internet-explorer/delete-manage-cookies#ie="ie-10"</a></li>
						<li>FireFox: <a href="http://www.support.mozilla.org/es/kb/Borrar%20cookies">support.mozilla.org/es/kb/Borrar%20cookies</a></li>
						<li>Chrome: <a href="http://www.support.google.com/chrome/answer/95647?hl="es"">support.google.com/chrome/answer/95647?hl="es"</a></li>
						<li>Safari: <a href="http://www.apple.com/es/privacy/use-of-cookies/">www.apple.com/es/privacy/use-of-cookies/</a></li>
					</ul>
					<br />
					Adicionalmente Google ha publicado un plugin para el navegador Google Chrome que le permite bloquear las cookies creadas por este servicio en cualquier página de Internet. 
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