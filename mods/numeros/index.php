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

    //Comprobamos si es un numero y si esta entre el rango del 1 al 9
    if(@is_numeric($_GET['num']))
    {
        if(($_GET['num'] > 0) && ($_GET['num'] < 10))
            $_SESSION['numero'] = $_GET['num'];
    }

    //Paramos un segundo
    //sleep(1);
    $lang = $_SESSION['lang'];

    switch ($lang) 
    {
        case 'es':
            $texto1 = "Números";
            $subtexto1 = "Grafías";
            $texto2 = "Números";
            $subtexto2 = "Concepto de cantidad";
            $numero = $_SESSION['numero'];
            $imgcargar = "carga";
            $botdib = "dibujar";
            $botbor = "borrar";
            $botcant = "cantidad";
            $botant = "anterior";
            $botsig = "siguiente";
            $botgraf = "grafia";
            $exp = "arrastra";
            $contar1 = "contar1";$contar2 = "contar2";$contar3 = "contar3";$contar4 = "contar4";$contar5 = "contar5";
            $contar6 = "contar6";$contar7 = "contar7";$contar8 = "contar8";$contar9 = "contar9";
        break;
        case 'en':
            $texto1 = "Numbers";
            $subtexto1 = "Letter";
            $texto2 = "Numbers";
            $subtexto2 = "Quantity of concept";
            $numero = $_SESSION['numero'].'2';
            $imgcargar = "carga2";
            $botdib = "dibujar2";
            $botbor = "borrar2";
            $botcant = "cantidad2";
            $botant = "anterior2";
            $botsig = "siguiente2";
            $botgraf = "grafia2";
            $exp = "arrastra2";
            $contar1 = "contar12";$contar2 = "contar22";$contar3 = "contar32";$contar4 = "contar42";$contar5 = "contar52";
            $contar6 = "contar62";$contar7 = "contar72";$contar8 = "contar82";$contar9 = "contar92";
        break;
    }

    //Reproducimos el numero cargado
    echo '<audio src="../../html/audio/numeros/num'.$numero.'.wav" autoplay="true" preload="auto"></audio>';

    function numeroPalabra()
    {
         $palabra = array();
            $palabra[1] = "uno";
            $palabra[2] = "dos";
            $palabra[3] = "tres";
            $palabra[4] = "cuatro";
            $palabra[5] = "cinco";
            $palabra[6] = "seis";
            $palabra[7] = "siete";
            $palabra[8] = "ocho";
            $palabra[9] = "nueve";
            $palabra[10] = "diez";

        return $palabra[$_SESSION['numero']];
    }
?>

<!DOCTYPE html>
<html lang="es">

<!--Incluimos los css y atributos-->
<?php include_once("../cargar/head.php"); ?>
<script type="text/javascript">var numero = <?php echo $_SESSION['numero'] ?>;</script>
<?php
    $num = $_SESSION['numero'];
    $elementos = $num + 1;
    $z = 1000;

	//Drap and Drop y Canvas CSS
    $figuras = array("cuadrado","triangulo","circulo","rectangulo");
    $alto = 0;
    $ancho = 0;
    $cargar = $figuras[rand(0,3)];
    $rutaimg = '../../html/images/drapanddrop/'.$cargar.'.png';

    //Pasamos los parametros para optimizar la imagen
    switch($cargar)
    {
        case "cuadrado":
            $alto = 120;$ancho = 119;
        break;
        case "triangulo":
            $alto = 118;$ancho = 115;
        break;
        case "circulo":
            $alto = 117;$ancho = 117;
        break;
        case "rectangulo":
            $alto = 118;$ancho = 178;
        break;
    }

	echo "<style type='text/css'>";
		for($i=1;$i<=$elementos;$i++)
		{
            switch($i)
            {
                case 1: $top = 0;$left = 0; break;
                case 2: $top = 0;$left = 50; break;
                case 3: $top = 35;$left = 0; break;
                case 4: $top = 35;$left = 50; break;
                case 5: $top = 70;$left = 0; break;
                case 6: $top = 70;$left = 50; break;
                case 7: $top = 105;$left = 0; break;
                case 8: $top = 105;$left = 50; break;
                case 9: $top = 140;$left = 0; break;
                case 10: $top = 140;$left = 50; break;
            }
            echo "
                #makeMeDraggable".$i;
            echo "{ 
                    float: left;
                    margin-top:".$top."%;
                    margin-left:".$left."%;
                    position: absolute;
                    width: ".$ancho."px; 
                    height: ".$alto."px; 
                    background-image: url($rutaimg);
                    z-index: ".$z.";
                }";
            //Aumentamos el z-index para que los elementos no esten uno encima del otro
            $z++;
		}
        if($num > 7 && $num < 10)
        {
            echo "#makeMeDroppable 
            { 
                float: left; 
                width: 750px; 
                height: 680px; 
                border: 1px solid #999;
                background: #ffffff url(../../html/images/numeros/numfon".$num.".png) no-repeat center center;
                border:5px solid black;
            }";
        }
        else if($num > 5 && $num < 8)
        {
            echo "#makeMeDroppable 
            { 
                float: left; 
                width: 750px; 
                height: 570px; 
                border: 1px solid #999;
                background: #ffffff url(../../html/images/numeros/numfon".$num.".png) no-repeat center center;
                border:5px solid black;
            }";   
        }
        else
        {
            echo "#makeMeDroppable 
            { 
                float: left; 
                width: 750px; 
                height: 500px; 
                border: 1px solid #999;
                background: #ffffff url(../../html/images/numeros/numfon".$num.".png) no-repeat center center;
                border:5px solid black;
            }";
        }
	echo "</style>";
?>

<body onload="centrar()">

    <!--Cargarmos el nav principal-->
	<?php include_once("cabepie/cabecera.php"); ?>
    <br>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            
            <!-- Page Header -->
            <div class="col-lg-12">
            <?php
                echo '<h1 class="page-header tipografia_contexto" style="font-size:50px;">'.$texto1.'
                    <small>'.$subtexto1.'</small>
                </h1>';
            ?>
            </div>

            <!--Grafia-->
        	<div class="col-lg-5">
                <!--Cambiamos la imagen segun la velocidad seleccionada-->
                <!--<select class="form-control" id="velo" onchange="cambiarVelocidad(this)">
                    <option value="0" selected> (Seleccione) </option>
                    <option value="lento">Lento</option>
                    <option value="normal">Normal</option>
                    <option value="rapido">Rápido</option>
                </select>-->
                <a onclick="cargarGrafiaNumero()"><img class="bordenegro" src="../../html/images/numeros/<?php echo $imgcargar; ?>.png" id="imgnum"></a>
            </div>
            <div class="col-lg-7">
        		<canvas class="bordenegro" id="tools_sketch" width='650' height='600' style="background: #ffffff url(../../html/images/numeros/<?php echo numeroPalabra() ?>.png) no-repeat center center;"></canvas>
        	</div>
            
            <!--Barra de opciones-->
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
                <center>
                    <?php

                        echo '<a href="#tools_sketch" id="dibujar" class="tools" data-tool="marker" data-size="40" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/lapiz.png"></a>
                            <audio id="dib" src="../../html/audio/'.$botdib.'.wav" preload="auto"></audio>';

                        echo '<a href="#tools_sketch" id="borrar" class="tools" data-tool="eraser" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/goma.png"></a>
                            <audio id="bor" src="../../html/audio/'.$botbor.'.wav" preload="auto"></audio>';

                        echo '<a class="tools" id="cantidad" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/abaco.png"></a>
                            <audio id="cant" src="../../html/audio/'.$botcant.'.wav" preload="auto"></audio>';
                    
                    
                        //Deshabilitamos el boton anterior
                        if($num < 2)
                            echo '<a class="tools" id="anterior"><img src="../../html/images/menu/ant.png"></a>&nbsp;';
                        else
                            echo '<a class="tools" id="anterior" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/ant.png"></a>
                                    <audio id="ant" src="../../html/audio/'.$botant.'.wav" preload="auto"></audio>';
                        
                        //Deshabilitamos el boton siguiente
                        if($num > 8)
                            echo '<a class="tools" id="siguiente"><img src="../../html/images/menu/sig.png"></a>';
                        else
                            echo '<a class="tools" id="siguiente" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/sig.png"></a>
                                    <audio id="sig" src="../../html/audio/'.$botsig.'.wav" preload="auto"></audio>';
                    ?>
                </center>
            </div>
        </div>
		
        <br>
        
        <!--Cantidad-->
        <div class="row">
            <!-- Page Header -->
            <audio id="arras" src="../../html/audio/numeros/<?php echo $exp; ?>.wav" preload="auto"></audio>
            <div class="col-lg-12">
            <?php
                echo '<h1 class="page-header tipografia_contexto" style="font-size:50px;">'.$texto2.'
                <small>'.$subtexto2.'</small>
                </h1>';
            ?>
            </div>

        	<div class="col-lg-12"><!--id="cantidad" no sirve pero por si acaso-->
                <div class="col-lg-4">
                    <?php
                        for($i=1;$i<=$elementos;$i++)
                            echo '<div id="makeMeDraggable'.$i.'"></div>';
                    ?>
                </div>
        		<div class="col-lg-8">                
                    <div id="makeMeDroppable"> </div>
                    <!--Contador de numeros-->
                    <?php
                        echo '<audio id="contar1" src="../../html/audio/numeros/'.$contar1.'.wav" preload="auto"></audio>
                        <audio id="contar2" src="../../html/audio/numeros/'.$contar2.'.wav" preload="auto"></audio>
                        <audio id="contar3" src="../../html/audio/numeros/'.$contar3.'.wav" preload="auto"></audio>
                        <audio id="contar4" src="../../html/audio/numeros/'.$contar4.'.wav" preload="auto"></audio>
                        <audio id="contar5" src="../../html/audio/numeros/'.$contar5.'.wav" preload="auto"></audio>
                        <audio id="contar6" src="../../html/audio/numeros/'.$contar6.'.wav" preload="auto"></audio>
                        <audio id="contar7" src="../../html/audio/numeros/'.$contar7.'.wav" preload="auto"></audio>
                        <audio id="contar8" src="../../html/audio/numeros/'.$contar8.'.wav" preload="auto"></audio>
                        <audio id="contar9" src="../../html/audio/numeros/'.$contar9.'.wav" preload="auto"></audio>';
                    ?>
                </div>
                <!--Reproducimos cuando meta el elemento en la caja-->
                <audio id="aubien" src="../../html/audio/terminado.mp3" preload="auto"></audio>
        	</div>
        </div>
        <!-- /.row -->

        <!--Anterior y Siguiente-->
        <div class="row text-center">
            <div class="col-lg-12" style="margin-bottom:5%;margin-top:4%">
                <?php
                    //Deshabilitamos el boton anterior
                    if($num < 2)
                        echo '<a class="tools" id="anterior"><img src="../../html/images/menu/ant.png"></a>&nbsp;';
                    else
                        echo '<a class="tools" id="anterior" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/ant.png"></a>
                                <audio id="ant" src="../../html/audio/'.$botant.'.wav" preload="auto"></audio>';

                    echo '<a class="tools" id="grafia" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/arriba.png"></a>
                            <audio id="gra" src="../../html/audio/'.$botgraf.'.wav" preload="auto"></audio>';
                        
                    //Deshabilitamos el boton siguiente
                    if($num > 8)
                        echo '<a class="tools" id="siguiente"><img src="../../html/images/menu/sig.png"></a>';
                    else
                        echo '<a class="tools" id="siguiente" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/sig.png"></a>
                                <audio id="sig" src="../../html/audio/'.$botsig.'.wav" preload="auto"></audio>';
                ?>
            </div>
        </div>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li><!--Primero-->
                        <a href='?num=1'>&laquo;</a>
                    </li>
                    <?php
                        for($i=1;$i<=9;$i++)
                            echo "<li><a href='?num=$i'>$i</a></li>";
                    ?>
                    <li><!--Ultimo-->
                        <a href='?num=9'>&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
		
		<hr>
        
        <!--Cargamos el pie-->
        <?php include_once("cabepie/pie.php"); ?>

    </div>
    <!-- /.container -->

    <!-- Cargar de JS -->
    <?php include_once("../cargar/js.php"); ?>
    <?php include_once("../cargar/js-canvas-drop.php"); ?>

	<!--Cargamos el drap and drop-->
	<script type="text/javascript">
        var con = 0;var ult = 0;
        var ent1 = 0;var ent2 = 0;var ent3 = 0;var ent4 = 0;
        var ent5 = 0;var ent6 = 0;var ent7 = 0;var ent8 = 0;
        var ent9 = 0;var ent10 = 0;

        function centrar()
        {
            if($(window).width() <= 1024)
                alert('Su resolución de pantalla es menor o igual a 1024px, esto puede provocar que algunos elementos se colapsen');
            else
                $("html, body").animate({scrollTop:"130px"});
        }

        /*Bajar scroll*/
        //obtenemos la altura del documento
        if(numero >= 8)
            var altura = $(document).height() - 1125;
        else if(numero > 5 && numero < 8)
            var altura = $(document).height() - 1030;
        else
            var altura = $(document).height() - 960;

        $("#cantidad").click(function(){
            $("html, body").animate({scrollTop:altura+"px"});
        });

        /*Subir scroll*/
        $("#grafia").click(function(){
            $("html, body").animate({scrollTop:"130px"});
        });

        /*Dibujar en Canvas*/
        $(function() {
            $('#tools_sketch').sketch({defaultColor: "#000"});
        });

		/*Drap and drop*/
		$( init );
		function init() 
        {
			<?php
				for($i=1;$i<=$elementos;$i++)
		  			echo "$('#makeMeDraggable".$i."').draggable({
                            cursor: 'move',
                            containment: 'document',
                            stop: handleDragStop
                        });\n";
		  	?>
		  $('#makeMeDroppable').droppable( {
		    drop: handleDropEvent
		  } );
		}
		
        //Comprobamos si esta dentro del contenedor
		function handleDropEvent( event, ui ) 
        {
		    var draggable = ui.draggable;
            var audio = document.getElementById("aubien");
          
            if(con <= numero)
            {
                //Comprobamos que entra una sola vez
                switch(draggable.attr('id'))
                {
                    case "makeMeDraggable1": if(ent1 == 0){con++;ent1 = 1;};break;
                    case "makeMeDraggable2": if(ent2 == 0){con++;ent2 = 1;};break;
                    case "makeMeDraggable3": if(ent3 == 0){con++;ent3 = 1;};break;
                    case "makeMeDraggable4": if(ent4 == 0){con++;ent4 = 1;};break;
                    case "makeMeDraggable5": if(ent5 == 0){con++;ent5 = 1;};break;
                    case "makeMeDraggable6": if(ent6 == 0){con++;ent6 = 1;};break;
                    case "makeMeDraggable7": if(ent7 == 0){con++;ent7 = 1;};break;
                    case "makeMeDraggable8": if(ent8 == 0){con++;ent8 = 1;};break;
                    case "makeMeDraggable9": if(ent9 == 0){con++;ent9 = 1;};break;
                    case "makeMeDraggable10": if(ent10 == 0){con++;ent10 = 1;};break;
                }

                //Contamos con el niño
                if(con > ult)
                {
                    var audio2 = document.getElementById("contar"+con);
                    audio2.autoplay = true;
                    audio2.load();
                    //Para que cuente bien y no el mismo
                    ult = con;
                }
              
                //Comprobamos si hemos acertado
                if(con == numero)
                {
                    setTimeout(function(){  
                        audio.autoplay = true;
                        audio.load();
                        //Bloqueamos el juego
                        con++;
                    }, 1000);
                }
            }
		  //alert( 'The square with ID "' + draggable.attr('id') + '" was dropped onto me!' );
		}

        //Recogemos las posiciones x e y para saber donde esta el elemento
        function handleDragStop( event, ui ) 
        {
            var offsetXPos = parseInt( ui.offset.left );
            var offsetYPos = parseInt( ui.offset.top );
            //alert( "Drag stopped!\n\nOffset: (" + offsetXPos + ", " + offsetYPos + ")\n");
        }

	</script>

</body>

</html>