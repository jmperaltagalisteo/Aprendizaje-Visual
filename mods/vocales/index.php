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

    //Comprobamos si nos ha pasado una vocal
    if (@$_GET['voc'] != null || @$_GET['voc'] != "")
    {
        if($_GET['voc'] == 'a' || $_GET['voc'] == 'e' || $_GET['voc'] == 'i' || $_GET['voc'] == 'o' || $_GET['voc'] == 'u')
            $_SESSION['vocal'] = $_GET['voc'];
    }

    //Paramos un segundo
    //sleep(1);
    $lang = $_SESSION['lang'];

    switch ($lang) 
    {
        case 'es':
            $texto1 = "Vocales";
            $subtexto1 = "Grafías";
            $texto2 = "Vocales";
            $subtexto2 = "Distinción de vocales";
            $letr = $_SESSION['vocal'];
            $imgcargar = "carga";
            $botdib = "dibujar";
            $botbor = "borrar";
            $botpal = "palabras";
            $botant = "anterior";
            $botsig = "siguiente";
            $botgraf = "grafia";
            $exp = $_SESSION['vocal'];
            $pallang = 1;
            $bien = "bien";
        break;
        case 'en':
            $texto1 = "Vowels";
            $subtexto1 = "Letter";
            $texto2 = "Vowels";
            $subtexto2 = "Vowels of distinction";
            $letr = $_SESSION['vocal'].'2';
            $imgcargar = "carga2";
            $botdib = "dibujar2";
            $botbor = "borrar2";
            $botpal = "palabras2";
            $botant = "anterior2";
            $botsig = "siguiente2";
            $botgraf = "grafia2";
            $exp = $_SESSION['vocal'].'2';
            $pallang = 2;
            $bien = "bien2";
        break;
    }

    //Asignamos
    $letra = $_SESSION['vocal'];

    //Reproducimos la vocal cargada
    echo '<audio src="../../html/audio/vocales/let'.$letr.'.wav" autoplay="true" preload="auto"></audio>';
?>

<!DOCTYPE html>
<html lang="es">

<!--Incluimos los css y atributos-->
<?php include_once("../cargar/head.php"); ?>
<script type="text/javascript">var letra = "<?php echo $letra ?>";</script>

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
                <a onclick="cargarGrafiaVocal()"><img id="imgvoc" class="bordenegro" src="../../html/images/vocales/<?php echo $imgcargar ?>.png"></a>
            </div>
            <div class="col-lg-7">
        		<canvas class="bordenegro" id="tools_sketch" width='650' height='600' style="background: #ffffff url(../../html/images/vocales/letra-<?php echo $letra ?>.png) no-repeat center center;"></canvas>
        	</div>
            
            <!--Barra de opciones-->
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
                <center>
                    <?php

                        echo '<a href="#tools_sketch" id="dibujar" class="tools" data-tool="marker" data-size="25" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/lapiz.png"></a>
                            <audio id="dib" src="../../html/audio/'.$botdib.'.wav" preload="auto"></audio>';

                        echo '<a href="#tools_sketch" id="borrar" class="tools" data-tool="eraser" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/goma.png"></a>
                            <audio id="bor" src="../../html/audio/'.$botbor.'.wav" preload="auto"></audio>';

                        echo '<a class="tools" id="palabras" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/palabras.png"></a>
                            <audio id="pal" src="../../html/audio/'.$botpal.'.wav" preload="auto"></audio>';
                    
                        //Deshabilitamos el boton anterior
                        if($letra == 'a')
                            echo '<a class="tools" id="anterior2"><img src="../../html/images/menu/ant.png"></a>&nbsp;';
                        else
                            echo '<a class="tools" id="anterior2" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/ant.png"></a>
                                    <audio id="ant2" src="../../html/audio/'.$botant.'.wav" preload="auto"></audio>';
                        
                        //Deshabilitamos el boton siguiente
                        if($letra == 'u')
                            echo '<a class="tools" id="siguiente2"><img src="../../html/images/menu/sig.png"></a>';
                        else
                            echo '<a class="tools" id="siguiente2" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/sig.png"></a>
                                    <audio id="sig2" src="../../html/audio/'.$botsig.'.wav" preload="auto"></audio>';
                    ?>
                </center>
            </div>
        </div>
		
        <br>
        
        <!--Distinción-->
        <div class="row">
            <!-- Page Header -->
            <audio id="pala" src="../../html/audio/vocales/exp-<?php echo $exp?>.wav" preload="auto"></audio>
            <div class="col-lg-12">
                <?php
                    echo '<h1 class="page-header tipografia_contexto" style="font-size:50px;">'.$texto2.'
                            <small>'.$subtexto2.'</small>
                        </h1>';
                ?>
            </div>

        	<div class="col-lg-12">
               <?php
                    $k = 0;
                    if($pallang == 1)
                    {
                        $palabras = array('luna','muela','pelota','mama','tijeras','seta',
                                          'erizo','elefante','escalera','estrella','enano','espejo',
                                          'pijama','pilas','silla','hilo','indio','lima',
                                          'oso','burro','uno','sol','paloma','loro',
                                          'uvas','lupa','hucha','fuego','huevo','pintura');
                    }
                    else if ($pallang == 2)
                    {
                        $palabras = array('garden','car','ball','lamp','table','bear',
                                          'sea','sheep','jeans','puzzle','blue','shoes',
                                          'pig','bicycle','bird','rabbit','earings','pink',
                                          'spoon','sponge','boat','flowers','coconut','door',
                                          'muffler','unicorn','yogurt','turtle','sun','mouse');   
                    }

                    $palabras_vocal = array();
                    $palabras_seis = array();

                    //Contador de palabras con la letra cargada
                    for($i=0;$i<count($palabras);$i++)
                    {
                        for($j=0;$j<strlen($palabras[$i]);$j++)
                        {
                            if($palabras[$i][$j] == $letra)
                            {
                                $palabras_vocal[$k] = $palabras[$i];
                                $k++;
                                break;
                            }

                        }
                    }
                    //print_r($palabras_vocal);
                    //Numeros de palabras
                    $num_pal = count($palabras_vocal);

                    //Cargamos las 6 palabras
                    $i=0;
                    while(count($palabras_seis) <= 5)
                    {
                        $random = rand(0,$num_pal);
                        if($random > 0 && $random < $num_pal)//Evitamos que se salga de los limites
                        {
                            if(!in_array($palabras_vocal[$random], $palabras_seis))//Comprobamos que no esta en el array de las seis palabras
                            {
                                $palabras_seis[$i] = $palabras_vocal[$random];
                                $i++;
                            }
                        }
                    }
                    //print_r($palabras_seis);

                    //PALABRAS
                    echo "<div class='row'>";
                        for($i=0;$i<count($palabras_seis);$i++)
                        {
                            echo "<div id='caja$i' class='col-lg-6 bordenegro2 tipografia_contexto' style='margin-bottom:0%;padding:1%;font-weight:bold;background-color:#ffffff'>";
                                echo "<a id='".$palabras_seis[$i]."' onclick='sonidoPalabra(this.id)'><img style='margin-right:1%' src='../../html/images/vocales/palabras/".$palabras_seis[$i].".png'></a>";
                                echo '<audio id="'.$palabras_seis[$i].'2" src="../../html/audio/vocales/palabras/'.$palabras_seis[$i].'.wav" preload="auto"></audio>';
                                for($j=0;$j<strlen($palabras_seis[$i]);$j++)
                                {
                                    echo "<input id='".$i."_".$j."_".$palabras_seis[$i][$j]."' type='button' value='".$palabras_seis[$i][$j]."' onclick='comprobarLetra(this.id,".$i.",".strlen($palabras_seis[$i]).",".substr_count($palabras_seis[$i], $letra).")' style='width:50px'>";
                                }
                            echo "</div>";
                        }
                    echo "</div>";
               ?>
                <audio id="bien" src="../../html/audio/vocales/<?php echo $bien ?>.wav" preload="auto"></audio>
                <audio id="fin" src="../../html/audio/terminado.mp3" preload="auto"></audio>
        	</div>
        </div>
        <!-- /.row -->
        
        <!--Anterior y Siguiente-->
        <div class="row text-center">
            <div class="col-lg-12" style="margin-bottom:5%;margin-top:4%">
                <?php
                    //Deshabilitamos el boton anterior
                    if($letra == 'a')
                        echo '<a class="tools" id="anterior2"><img src="../../html/images/menu/ant.png"></a>&nbsp;';
                    else
                        echo '<a class="tools" id="anterior2" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/ant.png"></a>
                                <audio id="ant2" src="../../html/audio/'.$botant.'.wav" preload="auto"></audio>';

                    echo '<a class="tools" id="grafia" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/arriba.png"></a>
                            <audio id="gra" src="../../html/audio/'.$botgraf.'.wav" preload="auto"></audio>';
                        
                    //Deshabilitamos el boton siguiente
                    if($letra == 'u')
                        echo '<a class="tools" id="siguiente2"><img src="../../html/images/menu/sig.png"></a>';
                    else
                        echo '<a class="tools" id="siguiente2" onclick="cargarAudio(this.id)"><img src="../../html/images/menu/sig.png"></a>
                                <audio id="sig2" src="../../html/audio/'.$botsig.'.wav" preload="auto"></audio>';
                ?>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li><!--Primero-->
                        <a href='?voc=a'>&laquo;</a>
                    </li>
                    <li>
                        <a href='?voc=a'>a</a>
                    </li>
                    <li>
                        <a href='?voc=e'>e</a>
                    </li>
                    <li>
                        <a href='?voc=i'>i</a>
                    </li>
                    <li>
                        <a href='?voc=o'>o</a>
                    </li>
                    <li>
                        <a href='?voc=u'>u</a>
                    </li>
                    <li><!--Ultimo-->
                        <a href='?voc=u'>&raquo;</a>
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

	<script type="text/javascript">

        function centrar()
        {
            if($(window).width() <= 1024)
                alert('Su resolución de pantalla es menor o igual a 1024px, esto puede provocar que algunos elementos se colapsen');
            else
                $("html, body").animate({scrollTop:"130px"});
        }

        /*Bajar scroll*/
        $("#palabras").click(function(){
            $("html, body").animate({scrollTop:"950px"});
        });
        
        /*Subir scroll*/
        $("#grafia").click(function(){
            $("html, body").animate({scrollTop:"130px"});
        });

        /*Dibujar en Canvas*/
        $(function() {
            $('#tools_sketch').sketch({defaultColor: "#000"});
        });

	</script>

</body>

</html>