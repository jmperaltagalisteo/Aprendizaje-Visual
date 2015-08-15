/*Funciones generales*/

/*function cambiarVelocidad(velo)
{
	if(velo.options[velo.selectedIndex].value != "0")
	{
		var velocidad = new Array();
			velocidad['lento'] = 1;
			velocidad['normal'] = 2;
			velocidad['rapido'] = 3;

		var rutaimg = numeroPalabra(numero)+velocidad[velo.options[velo.selectedIndex].value];
		var imagen = "../../html/images/numeros/"+numero+"/"+rutaimg+".gif";
		
		//Cambiamos la imagen
		document.getElementById("imgnum").src = imagen;
	}
}*/

/*Variables Globales*/
var ruta = "",antsig = "";
var contv1 = 0,contv2 = 0,contv3 = 0,contv4 = 0,contv5 = 0,contv6 = 0;
var cond1 = 0,cond2 = 0,cond3 = 0,cond4 = 0,cond5 = 0,cond6 = 0;confin = 0;

function cargarPanel(id)
{
	switch(id)
	{
		case "num":
			var aud = document.getElementById("audnum");
			ruta = "mods/numeros/"; 
		break;
		case "voc":
			var aud = document.getElementById("audvoc");
			ruta = "mods/vocales/";
		break;
	}

	//Reproducimos
	aud.autoplay = true;
    aud.load();

    //Redireccionamos a la pagina
    setTimeout(redireccionamiento, 2000);
}

function redireccionamiento()
{
	window.location.assign(ruta);
}

function cargarGrafiaNumero()
{
	var imagen = "../../html/images/numeros/"+numeroPalabra()+".gif";
		
	//Cambiamos la imagen
	document.getElementById("imgnum").src = imagen;
}

function cargarGrafiaVocal()
{
	var imagen = "../../html/images/vocales/letra-"+letra+".gif";
		
	//Cambiamos la imagen
	document.getElementById("imgvoc").src = imagen;
}

function numeroPalabra()
{
    var palabra = new Array();
        palabra[1] = "uno";
        palabra[2] = "dos";
        palabra[3] = "tres";
        palabra[4] = "cuatro";
        palabra[5] = "cinco";
        palabra[6] = "seis";
        palabra[7] = "siete";
        palabra[8] = "ocho";
        palabra[9] = "nueve";
        palabra[10] = "diez";

    return palabra[numero];
}

function cargarAudio(idb)
{
	switch(idb)
	{
		case "dibujar":
			var aud = document.getElementById("dib");
		break;
		case "borrar":
			var aud = document.getElementById("bor");
		break;
		case "bajar":
			var aud = document.getElementById("baj");
		break;
		case "anterior":
			var aud = document.getElementById("ant");
		break;
		case "siguiente":
			var aud = document.getElementById("sig");
		break;
		case "anterior2":
			var aud = document.getElementById("ant2");
		break;
		case "siguiente2":
			var aud = document.getElementById("sig2");
		break;
		case "cantidad":
			var aud = document.getElementById("cant");
		break;
		case "grafia":
			var aud = document.getElementById("gra");
		break;
		case "palabras":
			var aud = document.getElementById("pal");
		break;
	}

	//Reproducimos
	aud.autoplay = true;
    aud.load();

    //Explicacion de cantidad
    if(idb == "cantidad")
    {	
    	//Explicacion de cantidad
 		setTimeout(explicacionCantidad, 1500);   	
    }
    //Explicacion de palabras
    if(idb == "palabras")
    {	
    	//Explicacion de cantidad
 		setTimeout(explicacionPalabras, 1500);   	
    }

    //Avance Numeros
    if(idb == "siguiente")
    {
    	antsig = '+';
		setTimeout(avancePagina, 1500);
    }
    if(idb == "anterior")
    {
    	antsig = '-';
		setTimeout(avancePagina, 1500);
    }

    //Avance Vocales
    if(idb == "siguiente2")
    {
    	antsig = '+';
		setTimeout(avancePagina2, 1500);
    }
    if(idb == "anterior2")
    {
    	antsig = '-';
		setTimeout(avancePagina2, 1500);
    }
}

function explicacionCantidad()
{
	var aud2 = document.getElementById("arras");

	//Reproducimos
	aud2.autoplay = true;
    aud2.load();	
}

function explicacionPalabras()
{
	var aud2 = document.getElementById("pala");

	//Reproducimos
	aud2.autoplay = true;
    aud2.load();	
}

function avancePagina()
{
	var rutanum = "";

	switch(antsig)
	{
		case '+':
			if(numero < 9)
				rutanum = "?num="+(numero+1);
		break;
		case '-':
			if(numero > 1)
				rutanum = "?num="+(numero-1);
		break;
	}

	//Redireccionamos
	window.location.assign(rutanum);
}

function avancePagina2()
{
	var rutavoc = "";

	switch(antsig)
	{
		case '+':
			switch(letra)
			{
				case 'a': rutavoc = "?voc=e"; break;
				case 'e': rutavoc = "?voc=i"; break;
				case 'i': rutavoc = "?voc=o"; break;
				case 'o': rutavoc = "?voc=u"; break;
			}
		break;
		case '-':
			switch(letra)
			{
				case 'e': rutavoc = "?voc=a"; break;
				case 'i': rutavoc = "?voc=e"; break;
				case 'o': rutavoc = "?voc=i"; break;
				case 'u': rutavoc = "?voc=o"; break;
			}
		break;
	}

	//Redireccionamos
	window.location.assign(rutavoc);
}

function comprobarLetra(let,id_palabra,contlet,contvoc)
{
	var numvoc = [];
	numvoc = let.split("_");
	var aud3 = document.getElementById("bien");

	//Segun la palabra entramos y vemos cuantas vocales tiene
	switch(id_palabra)
	{
		case 0:
			if(cond1 == 0)
			{
				//comprobamos que es la vocal y sumamos uno
				if(numvoc[2] == letra)
				{
					contv1++;
					//cambiamos el color de la letra
					//alert(let);
					document.getElementById(let).style.color="#FF0000";
				}

				//comprobamos que ya se ha resuelto la palabra
				if(contv1 == contvoc)
				{
					cond1 = 1;
					confin++;
					//Reproducimos
					aud3.autoplay = true;
    				aud3.load();
    				//fin
    				finPalabras();
				}
			}
		break;
		case 1:
			if(cond2 == 0)
			{
				//comprobamos que es la vocal y sumamos uno
				if(numvoc[2] == letra)
				{
					contv2++;
					//cambiamos el color de la letra
					//alert(let);
					document.getElementById(let).style.color="#FF0000";
				}

				//comprobamos que ya se ha resuelto la palabra
				if(contv2 == contvoc)
				{
					cond2 = 1;
					confin++;
					//Reproducimos
					aud3.autoplay = true;
    				aud3.load();
    				//fin
    				finPalabras();
				}
			}
		break;
		case 2:
			if(cond3 == 0)
			{
				//comprobamos que es la vocal y sumamos uno
				if(numvoc[2] == letra)
				{
					contv3++;
					//cambiamos el color de la letra
					//alert(let);
					document.getElementById(let).style.color="#FF0000";
				}

				//comprobamos que ya se ha resuelto la palabra
				if(contv3 == contvoc)
				{
					cond3 = 1;
					confin++;
					//Reproducimos
					aud3.autoplay = true;
    				aud3.load();
    				//fin
    				finPalabras();
				}
			}
		break;
		case 3:
			if(cond4 == 0)
			{
				//comprobamos que es la vocal y sumamos uno
				if(numvoc[2] == letra)
				{
					contv4++;
					//cambiamos el color de la letra
					//alert(let);
					document.getElementById(let).style.color="#FF0000";
				}

				//comprobamos que ya se ha resuelto la palabra
				if(contv4 == contvoc)
				{
					cond4 = 1;
					confin++;
					//Reproducimos
					aud3.autoplay = true;
    				aud3.load();
    				//fin
    				finPalabras();
				}
			}
		break;
		case 4:
			if(cond5 == 0)
			{
				//comprobamos que es la vocal y sumamos uno
				if(numvoc[2] == letra)
				{
					contv5++;
					//cambiamos el color de la letra
					//alert(let);
					document.getElementById(let).style.color="#FF0000";
				}

				//comprobamos que ya se ha resuelto la palabra
				if(contv5 == contvoc)
				{
					cond5 = 1;
					confin++;
					//Reproducimos
					aud3.autoplay = true;
    				aud3.load();
    				//fin
    				finPalabras();
				}
			}
		break;
		case 5:
			if(cond6 == 0)
			{
				//comprobamos que es la vocal y sumamos uno
				if(numvoc[2] == letra)
				{
					contv6++;
					//cambiamos el color de la letra
					//alert(let);
					document.getElementById(let).style.color="#FF0000";
				}

				//comprobamos que ya se ha resuelto la palabra
				if(contv6 == contvoc)
				{
					cond6 = 1;
					confin++;
					//Reproducimos
					aud3.autoplay = true;
    				aud3.load();
    				//fin
    				finPalabras();
				}
			}
		break;
	}
}

function finPalabras()
{
	var aud4 = document.getElementById("fin");

	setTimeout(function(){
		//Comprobamos que ha completado todas las palabras
		if(confin == 6)
		{
			//Reproducimos
			aud4.autoplay = true;
    		aud4.load();
		}
	}, 900);
}

function sonidoPalabra(palabra)
{
	var pal = document.getElementById(palabra+'2');
	//Reproducimos
	pal.autoplay = true;
    pal.load();
}