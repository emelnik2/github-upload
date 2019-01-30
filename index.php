<?php
if ($_SERVER['REQUEST_URI']=="/index.php?id&a&pag=8&s=1" || $_SERVER['REQUEST_URI']=="/?id=18"){
	header('HTTP/1.0 404 Not Found', true, 404);
	die(); 
}


$cotizar=false;
$desactivar_cotizador=1;

include_once($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/doctype.php"); 
$url=explode('?', $_SERVER['REQUEST_URI']);
?>

<?php

	if ($_SERVER['REQUEST_URI']=="/"){	
		
	}else if (substr($_SERVER['REQUEST_URI'],0,10)=="/index.php"){	
		echo '<link rel="canonical" href="http://www.borse.com.mx" />';
	}else if (substr($_SERVER['REQUEST_URI'],0,10)=="/index"){	
		echo '<link rel="canonical" href="http://www.borse.com.mx" />';
	}else if ($_SERVER['REQUEST_URI']=="/?id=27"){
		echo '<link rel="canonical" href="http://www.borse.com.mx" />';
	}
?>

<html>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bolsas Impresas Para Usos Comerciales | BÖRSE</title>
        <meta name="description" content="Bolsas impresas para usos comerciales hechas de plastico, papel y de materiales textiles ideales para promover su marca y sus productos." />    
        <meta name="robots" content="noindex, nofollow">
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/head_comun.php");	?>

        <!-- Base MasterSlider style sheet -->
        <link rel="stylesheet" href="/dev/scripts-es/masterslider/style/masterslider.css">

        <!-- Master Slider Skins -->
        <link href="/dev/scripts-es/masterslider/skins/light-6/style.css" rel='stylesheet' type='text/css'>

        <!-- MasterSlider Layers Style -->
        <link href='/dev/styles-es/ms-slider-01.css' rel='stylesheet' type='text/css'>    
        <!-- MasterSlider Hotspots Style -->
        <link href='/dev/styles-es/ms-hotspots-01.css' rel='stylesheet' type='text/css'>

    </head>
    
    <body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/header.php"); ?>    
    
        
<section class="slider is-hidden-touch">
    <div class="container is-fluid is-paddingless is-marginless">
        <!-- Start Masterslider Layers Template -->
        <div class="ms-layers-template">
        <!-- Start Masterslider -->
        <div class="master-slider ms-skin-light-6 round-skin" id="mslider">
            <div class="ms-slide slide-1" style="z-index: 10">
                <img src="./images-es/fotos/el-uso-de-las-bolsas-impresas-en-centros-comerciales.jpg" alt="Gente con bolsas impresas en un centro comercial"/> 
				    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/interface/shadow.png" alt="layer" class="ms-layer"
				    	style="bottom:6em; right:14em"
				    	data-effect="rotate3dright(0,30,0,100,r)"
				    	data-duration="2500"
                        data-delay="900"
				    	data-ease="easeOutQuad"
				    	data-type="image"
				        />
                
				    <div class="ms-layer slider-box-01" 
				    	data-effect="rotatebottom(40,250,c)"
				    	data-duration="3500"
				    	data-delay="900"
				    	data-ease="easeOutExpo"
				    >
                    </div>
                        
				    <p class="ms-layer message-home has-text-centered has-text-white" style="left:28.875em; top:15em" 
				    	data-effect="bottom(40)"
				    	data-duration="3500"
				    	data-delay="3000"
				    	data-ease="easeOutExpo"
                        >En este <span >2018</span> a petición de nuestros clientes, <br/>bajamos los volúmenes mínimos de compra <br/>para bolsas impresas.</p>
				        
				    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/interface/info-volumen-plastico.svg" alt="layer" class="ms-layer info-volume"
				    	style="left:11.875em; top:25em"
				    	data-effect="rotateright(20,120,br)"
				    	data-duration="3500"
				    	data-delay="3600"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
                
                    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/interface/info-volumen-papel.svg" alt="layer" class="ms-layer info-volume"
				    	style="left:30.6875em; top:25em"
				    	data-effect="rotateright(20,120,br)"
				    	data-duration="3500"
				    	data-delay="4600"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
                
                    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/interface/info-volumen-tela.svg" alt="layer" class="ms-layer info-volume"
				    	style="left:49.5em; top:25em"
				    	data-effect="rotateright(20,120,br)"
				    	data-duration="3500"
				    	data-delay="5600"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
				</div>
                    
                <div class="ms-slide slide-2" style="z-index: 11">
				    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/fotos/el-uso-de-las-bolsas-impresas-en-centros-comerciales.jpg" style="-webkit-filter: blur(5px) brightness(50%); /* Safari 6.0 - 9.0 */ filter: blur(5px) brightness (50%);" alt="Gente con bolsas impresas en un centro comercial"/>
                       
				    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/interface/shadow.png" alt="layer" class="ms-layer"
				    	style="bottom:6em; right:14em"
				    	data-effect="rotate3dright(0,30,0,100,r)"
				    	data-duration="2500"
                        data-delay="900"
				    	data-ease="easeOutQuad"
				    	data-type="image"
				    />
                       
				    <div class="ms-layer slider-box-02" 
				    	data-effect="rotatebottom(40,250,c)"
				    	data-duration="3500"
				    	data-delay="900"
				    	data-ease="easeOutExpo"
				        >
                    </div>
                        
				    <p class="ms-layer message-home has-text-white" style="left:16em; top:10em; z-index: 3" 
				    	data-effect="bottom(40)"
				    	data-duration="3500"
				    	data-delay="3000"
				    	data-ease="easeOutExpo"
                        >Conózca más acerca <br/>de <span>BÖRSE</span> descargando<br/> nuestro perfil empresarial.</p> 
                        
                    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/fotos/perfil-de-empresa.png" alt="layer" class="ms-layer perfil"
				    	style="left:436px; top:206px; z-index: 2" 
				    	data-effect="rotateleft(10,100,bl)"
				    	data-duration="4300"
				    	data-delay="4000"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
                        
                    <div class="ms-layer" style="left: 925px; top: 538px; z-index: 4; border: 2px solid #FFF" data-effect="bottom(40)"
				    	data-duration="3500"
				    	data-delay="4500"
				    	data-ease="easeOutExpo"
                        >
						<a href="http://www.borse.com.mx/dev/pdf-es/perfil-bolsas-impresas-borse.pdf"> 
				        <button class="bttn-fill bttn-sm bttn-primary bttn-no-outline"><span>DESCARGAR</span></button>
						</a>
					</div>
				</div>
                
				<div class="ms-slide slide-3" style="z-index: 12">
                    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/fotos/el-uso-de-las-bolsas-impresas-en-centros-comerciales.jpg" style="-webkit-filter: blur(5px) brightness(50%); /* Safari 6.0 - 9.0 */ filter: blur(5px) brightness (50%);" alt="Gente con bolsas impresas en un centro comercial"/>
                       
				    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/interface/shadow.png" alt="layer" class="ms-layer"
				    	style="bottom:6em; right:14em"
				    	data-effect="rotate3dright(0,30,0,100,r)"
				    	data-duration="2500"
                        data-delay="900"
				    	data-ease="easeOutQuad"
				    	data-type="image"
				    />
                       
				    <div class="ms-layer slider-box-02" 
				        data-effect="rotatebottom(40,250,c)"
				    	data-duration="3500"
				    	data-delay="900"
				    	data-ease="easeOutExpo"
				        >
                    </div>
                        
                    <p class="ms-layer message-home has-text-white" style="left:16em; top:10em; z-index: 3" 
				    	data-effect="bottom(40)"
				    	data-duration="3500"
				    	data-delay="3000"
				    	data-ease="easeOutExpo"
                        >Decubra que es lo que distingue <br/>a <span>BÖRSE</span> de la competencia <br/>en la industria de las bolsas impresas.</p> 
                   
                    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/fotos/video-bolsas-impresas-borse.png" alt="layer" class="ms-layer video"
				    	style="left:28.75em; top:10em; z-index: 2" 
				    	data-effect="rotateleft(10,100,bl)"
				    	data-duration="4300"
				    	data-delay="4000"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
				        
				    <div class="ms-layer" style="bottom:8.25em; right:11.88em; width:56.25em; height:32.75em; z-index: 4"
				    	data-type="video"
				        data-effect="front(100)"
                        data-duration="2500"
                        data-delay="5000"
                        data-ease="easeOutExpo"
				        >
                            
				       	<img src="./scripts-es/masterslider/style/blank.gif" />
				       	<iframe src="https://www.youtube.com/embed/mcEz7M693Fw?" frameborder="0" showinfo="0" controls="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				    </div>
				</div>
            </div>
			<!-- End of Masterslider -->
        </div>
        <!-- End Masterslider Template -->
    </div>
</section>    

<section class="slider is-hidden-desktop">
    <div class="container is-fluid is-paddingless is-marginless">
        <!-- Start Masterslider Layers Template -->
        <div class="ms-layers-template">
        <!-- Start Masterslider -->
        <div class="master-slider ms-skin-light-6 round-skin" id="mslider-mobile">
            <div class="ms-slide slide-1" style="z-index: 10">
                <img src="/dev/images-es/fotos/el-uso-de-las-bolsas-impresas-en-centros-comerciales-m.jpg" alt="Gente con bolsas impresas en un centro comercial"/> 
				    <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="/dev/images-es/interface/shadow.png" alt="layer" class="ms-layer"
				    	style="bottom:6em; right:14em"
				    	data-effect="rotate3dright(0,30,0,100,r)"
				    	data-duration="2500"
                        data-delay="900"
				    	data-ease="easeOutQuad"
				    	data-type="image"
				        />
                
				    <div class="ms-layer slider-box-01" 
				    	data-effect="rotatebottom(40,250,c)"
				    	data-duration="3500"
				    	data-delay="900"
				    	data-ease="easeOutExpo"
				    >
                    </div>
                        
				    <p class="ms-layer message-home has-text-centered has-text-white" style="left:0em; top:9em" 
				    	data-effect="bottom(40)"
				    	data-duration="3500"
				    	data-delay="3000"
				    	data-ease="easeOutExpo"
                        >En este <span >2018</span> a petición de nuestros clientes, <br/>bajamos los volúmenes mínimos de compra <br/>para bolsas impresas.</p>
				        
				    <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="/dev/images-es/interface/info-volumen-plastico.svg" alt="layer" class="ms-layer info-volume"
				    	style="left:3em; top:12em"
				    	data-effect="rotateright(20,120,br)"
				    	data-duration="3500"
				    	data-delay="3600"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
                
                    <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="./images-es/interface/info-volumen-papel.svg" alt="layer" class="ms-layer info-volume"
				    	style="left:8em; top:19em"
				    	data-effect="rotateright(20,120,br)"
				    	data-duration="3500"
				    	data-delay="4600"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
                
                    <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="./images-es/interface/info-volumen-tela.svg" alt="layer" class="ms-layer info-volume"
				    	style="left:3em; top:26em"
				    	data-effect="rotateright(20,120,br)"
				    	data-duration="3500"
				    	data-delay="5600"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
				</div>
                    
                <div class="ms-slide slide-2" style="z-index: 11">
				    <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="./images-es/fotos/el-uso-de-las-bolsas-impresas-en-centros-comerciales.jpg" style="-webkit-filter: blur(5px) brightness(50%); /* Safari 6.0 - 9.0 */ filter: blur(5px) brightness (50%);" alt="Gente con bolsas impresas en un centro comercial"/>
                       
				    <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="/dev/images-es/interface/shadow.png" alt="layer" class="ms-layer"
				    	style="bottom:6em; right:14em"
				    	data-effect="rotate3dright(0,30,0,100,r)"
				    	data-duration="2500"
                        data-delay="900"
				    	data-ease="easeOutQuad"
				    	data-type="image"
				    />
                       
				    <div class="ms-layer slider-box-02" 
				    	data-effect="rotatebottom(40,250,c)"
				    	data-duration="3500"
				    	data-delay="900"
				    	data-ease="easeOutExpo"
				        >
                    </div>
                        
				    <p class="ms-layer message-home has-text-centered has-text-white" style="left:0em; top:9em; z-index: 3" 
				    	data-effect="bottom(40)"
				    	data-duration="3500"
				    	data-delay="3000"
				    	data-ease="easeOutExpo"
                        >Conózca más acerca <br/>de <span>BÖRSE</span> descargando<br/> nuestro perfil empresarial.</p> 
                        
                    <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="/dev/images-es/fotos/perfil-de-empresa.png" alt="layer" class="ms-layer perfil"
				    	style="left:1em; top:14em; z-index: 2" 
				    	data-effect="rotateleft(10,100,bl)"
				    	data-duration="4300"
				    	data-delay="4000"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
                        
                    <div class="ms-layer" style="left: 12em; top: 31.5em; z-index: 4; border: 2px solid #FFF" data-effect="bottom(40)"
				    	data-duration="3500"
				    	data-delay="4500"
				    	data-ease="easeOutExpo"
                        >
						<a href="http://www.borse.com.mx/dev/pdf-es/perfil-bolsas-impresas-borse.pdf"> 
				        <button class="bttn-fill bttn-md bttn-primary bttn-no-outline"><span>DESCARGAR</span></button>
						</a>
					</div>
				</div>
                
				<div class="ms-slide slide-3" style="z-index: 12">
                    <img src="./scripts-es/masterslider/style/blank.gif" data-src="./images-es/fotos/el-uso-de-las-bolsas-impresas-en-centros-comerciales.jpg" style="-webkit-filter: blur(5px) brightness(50%); /* Safari 6.0 - 9.0 */ filter: blur(5px) brightness (50%);" alt="Gente con bolsas impresas en un centro comercial"/>
                       
				    <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="./images-es/interface/shadow.png" alt="layer" class="ms-layer"
				    	style="bottom:6em; right:14em"
				    	data-effect="rotate3dright(0,30,0,100,r)"
				    	data-duration="2500"
                        data-delay="900"
				    	data-ease="easeOutQuad"
				    	data-type="image"
				    />
                       
				    <div class="ms-layer slider-box-02" 
				        data-effect="rotatebottom(40,250,c)"
				    	data-duration="3500"
				    	data-delay="900"
				    	data-ease="easeOutExpo"
				        >
                    </div>
                        
                    <p class="ms-layer message-home has-text-centered has-text-white" style="left:0em; top:9em; z-index: 3" 
				    	data-effect="bottom(40)"
				    	data-duration="3500"
				    	data-delay="3000"
				    	data-ease="easeOutExpo"
                        >Decubra que es lo que distingue <br/>a <span>BÖRSE</span> de la competencia <br/>en la industria de las bolsas impresas.</p> 
                   
                    <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="/dev/images-es/fotos/video-bolsas-impresas-borse.png" alt="layer" class="ms-layer video"
				    	style="left:0em; top:12em; z-index: 2" 
				    	data-effect="rotateleft(10,100,bl)"
				    	data-duration="4300"
				    	data-delay="4000"
				    	data-ease="easeOutExpo"
				    	data-type="image"
				    />
				        
				    <div class="ms-layer" style="bottom:8.25em; left:1em; width:21em; height:16em; z-index: 4"
				    	data-type="video"
				        data-effect="front(100)"
                        data-duration="2500"
                        data-delay="5000"
                        data-ease="easeOutExpo"
				        >
                            
				       	<img src="/dev/scripts-es/masterslider/style/blank.gif" />
				       	<iframe src="https://www.youtube.com/embed/mcEz7M693Fw?" frameborder="0" showinfo="0" controls="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				    </div>
				</div>
            </div>
			<!-- End of Masterslider -->
        </div>
        <!-- End Masterslider Template -->
    </div>
</section>
        
<section class="seccion-intro">
    <div class="container" style="margin-top:1rem;margin-bottom:-2rem">
        <div class="tile is-ancestor">
            <div class="tile is-6 is-vertical is-parent">
                <div class="tile is-child box">
                    <h1 class="title is-size-3 with-border">
                    BOLSAS IMPRESAS<br/>
                    <span class="subtitle is-size-5">PARA USOS COMERCIALES</span>
                    </h1>
                    <p class="txt-block is-size-7">
                    En BÖRSE ofrecemos a nuestros clientes bolsas impresas para usos comerciales, las tenemos disponibles en varios tamaños y estilos hechas diversos materiales como: plástico, papel y tela, puede elegir el tipo de bolsas que usted necesita en base a sus requerimientos, desde el material hasta el proceso de impresión, también contamos con una extensa variedad de acabados, diferentes tipos de asas y varias opciones de personalización para hacerlas las más atractivas.
                    </p>
                </div>
                <div class="tile is-child box">
                    <!--  ======== MEDIA BOXES ======== -->
                    <div id="materiales-home">
                        <!-- ------ BOX MARKUP ------ -->       
                        <div class="media-box push">
                            <div class="media-box-image" data-src="/dev/images-es/interface/plastico-cover.svg" data-overlay-effect="push-up-100%">
                                <div data-width="300" data-height="200" data-thumbnail="/dev/images-es/interface/plastico-cover.svg"></div>

                                <div class="thumbnail-overlay">
                                    <div class="media-box-text">
                                        <p class="txt-block is-size-8 is-hidden-touch">El plástico es el material más utilizado para bolsas impresas a nivel mundial debido a su bajo costo, el nivel de resistencia que ofrece y su faciidad para ser reciclado.</p><br/>
                                        <a class="button bttn-fill bttn-sm bttn-primary bttn-no-outline" href="/dev/bolsas-de-plastico/index.php" title="Bolsas de Plástico">                 
                                        <span>ENTRAR</span>
                                        </a>
                                    </div>                           
                                </div>
                            </div>
                        </div>

                        <!-- ------ BOX MARKUP ------ -->      
                        <div class="media-box push">
                            <div class="media-box-image" data-src="/dev/images-es/interface/papel-cover.svg" data-overlay-effect="push-up-100%">
                                <div data-width="300" data-height="200" data-thumbnail="/dev/images-es/interface/papel-cover.svg"></div>

                                <div class="thumbnail-overlay">
                                    <div class="media-box-text">
                                        <p class="txt-block is-size-8 is-hidden-touch">El papel es un noble material que brinda la mejor calidad de impresión en sus bolsas, las bolsas impresas en este material son muy atractivas por la calidad que transmiten.</p><br/>
                                        <a class="button bttn-fill bttn-sm bttn-primary bttn-no-outline" href="/dev/bolsas-de-papel/index.php" title="Bolsas de Papel">                 
                                        <span>ENTRAR</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ------ BOX MARKUP ------ -->  
                        <div class="media-box push">
                            <div class="media-box-image" data-src="/dev/images-es/interface/tela-cover.svg" data-overlay-effect="push-up-100%">
                                <div data-width="300" data-height="200" data-thumbnail="/dev/images-es/interface/tela-cover.svg"></div>

                                <div class="thumbnail-overlay">
                                    <div class="media-box-text">
                                        <p class="txt-block is-size-8 is-hidden-touch">La tela es un material que debido a sus características otorga el mayor nivel de resistencia, estas bolsas son las más durables de la industria.</p><br/>
                                        <a class="button bttn-fill bttn-sm bttn-primary bttn-no-outline" href="/dev/bolsas-de-tela/index.php" title="Bolsas de Tela">                 
                                        <span>ENTRAR</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ------ BOX MARKUP ------ -->       
                        <div class="media-box push">
                            <div class="media-box-image" data-src="/dev/images-es/interface/comercios-cover.svg" data-overlay-effect="push-up-100%">
                                <div data-width="300" data-height="200" data-thumbnail="/dev/images-es/interface/comercios-cover.svg"></div>

                                <div class="thumbnail-overlay">
                                    <div class="media-box-text">
                                        <p class="txt-block is-size-8 is-hidden-touch">Bolsas impresas especificamente creadas para cada tipo de comercio, pensadas para cubrir las necesidades y requerimientos de cada cliente.</p><br/>
                                        <a class="button bttn-fill bttn-sm bttn-primary bttn-no-outline" href="/dev/bolsas-para-comercios/index.php" title="Bolsas para Comercios">                 
                                        <span>ENTRAR</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
                <!--  ======== END MEDIA BOXES ======== -->
            </div>
            <div class="tile is-vertical is-parent box">
                <div class="tile is-child"></div>
                <div class="tile is-child box">
                    <figure class="image is-1by1">
                        <img src="/dev/images-es/fotos/chica-con-bolsas-impresas.png" title="Bolsas impresas BÖRSE" alt="Chica cargando bolsas impresas BÖRSE" >
                    </figure>    
                </div>
            </div>
        </div>
    </div>        
</section>
        
        
<section class="hero is-primary is-medium">
    <div class="hero-body separador-rojo">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h2 class="subtitle is-size-5">EXPORTAMOS BOLSAS IMPRESAS <br/>
                    <span class="is-size-6">A TODA LATINOAMÉRICA, USA Y CANADÁ</span></h2>
                    <p class="txt-block is-size-7">Podemos surtir bolsas impresas a todo el continente americano, Estados Unidos y Canada, nuestras bolsas impresas son elaboradas bajo procesos certificados, contamos con la certificación ISO 9001:2008 para atender a empresas con este requisito, superando sus expectativas de servicio, garantía y calidad.
                    </p>
                </div>
               <div class="column">
                    <h2 class="subtitle is-size-5">ATENDEMOS DESDE EMPRESAS PEQUEÑAS <br/>
                    <span class="is-size-6">HASTA MARCAS DE ROPA DE PRESTIGIO</span></h2>
                    <p class="txt-block is-size-7">Como la empresa lider en bolsas impresas en México, tenemos la capacidad de surtirle a boutiques, cadenas de tiendas departamentales y a reconocidas marcas de ropa y calzado que operan a nivel nacional e internacional, atendiendo a ambos segmentos de mercado de manera personalizada.
                    </p>
                </div>
            </div>    
        </div>
    </div>
</section>
        
<section class="seccion-anatomia">
    <div class="container">
        <div class="tile is-ancestor">
            <div class="tile is-4 is-vertical is-parent">
                <div class="tile is-child box">
                    <h3 class="title is-size-3 with-border">ANATOMÍA DE<br/>
                    <span class="subtitle is-size-5">LAS BOLSAS IMPRESAS</span>
                    </h3>
                    <p class="txt-block is-size-7">A continuación le mostramos algunos ejemplos de bolsas impresas BÖRSE más solicitados por nuestros clientes con el objetivo de ayudarle a identificar las características mas importantes a tener en cuenta al momento cotizar con nosotros, en cada ejemplo se especifica el material, el tipo de asas, los acabados, el número de tintas utilizadas y el proceso de impresión.</p>
                </div>
            </div>
            <div class="tile is-parent">
                <div class="tile is-child ">
                    <!-- template -->
                    <div class="ms-showcase1">
                        <!-- start masterslider -->
                        <div class="master-slider ms-skin-light-6 round-skin" id="masterslider">
                            
                            <div class="ms-slide b-plastico">
                                <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="/dev/images-es/fotos/bolsa-de-plastico-asas-troqueladas.png" alt="Bolsa impresa de plastico con asas troqueladas"/> 

                                 <div class="ms-layer"	style="left:420px; top:140px;"
                                    data-delay="300"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>EL TIPO DE ASA</h4>
                                        <p>El tipo de asa es troquelada con refuerzo (patch) para brindarle rigidez.</p>
                                     </div>
                                 </div>

                                 <div class="ms-layer" style="left:600px; top:380px;"
                                    data-delay="400"
                                    data-type="hotspot"
                                    data-align="right">
                                    <div class="product-tt">
                                        <h4>EL MATERIAL</h4>
                                        <p>El material es plástico de mediana densidad parcialmente reciclado.</p>
                                    </div>
                                </div>

                                 <div class="ms-layer" style="left:460px; top:280px;"
                                    data-delay="500"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>LA IMPRESIÓN</h4>
                                        <p>El proceso de impresión es en prensa especializada para flexografia a 3 tintas directas.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="ms-slide b-plastico-1">
                                <img src="/dev/scripts-es/masterslider/style/blank.gif" data-src="/dev/images-es/fotos/bolsa-impresa-plastico-asas-flexibles.png" alt="Bolsa impresa de plastico con asas flexibles"/> 

                                 <div class="ms-layer"	style="left:460px; top:80px;"
                                    data-delay="300"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>EL TIPO DE ASA</h4>
                                        <p>El tipo de asa es flexible de color negro del mismo material plástico que la bolsa.</p>
                                     </div>
                                 </div>

                                 <div class="ms-layer" style="left:650px; top:380px;"
                                    data-delay="400"
                                    data-type="hotspot"
                                    data-align="right">
                                    <div class="product-tt">
                                        <h4>EL MATERIAL</h4>
                                        <p>El material es plástico de alta densidad parcialmente reciclado.</p>
                                    </div>
                                </div>

                                 <div class="ms-layer" style="left:460px; top:250px;"
                                    data-delay="500"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>LA IMPRESIÓN</h4>
                                        <p>El proceso de impresión es en prensa especializada para flexografia a 3 tintas directas.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="ms-slide b-papel">
                                <img src="/dev/images-es/fotos/bolsa-impresa-papel-asa-trenzada.png" alt="Bolsa impresa de papel con asa trenzada" style="left:1200px; top:80px;"
                                data-delay="300"
                                data-type="image"
                                     data-align="right"> 

                                 <div class="ms-layer"	style="left:480px; top:80px;"
                                    data-delay="300"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>EL TIPO DE ASA</h4>
                                        <p>El tipo de asa en este caso es trenzada en color blanco.</p>
                                     </div>
                                 </div>

                                 <div class="ms-layer" style="left:560px; top:380px;"
                                    data-delay="400"
                                    data-type="hotspot"
                                    data-align="right">
                                    <div class="product-tt">
                                        <h4>EL MATERIAL</h4>
                                        <p>El material es papel tipo Bond de alta calidad en color blanco.</p>
                                    </div>
                                </div>

                                 <div class="ms-layer" style="left:460px; top:280px;"
                                    data-delay="500"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>LA IMPRESIÓN</h4>
                                        <p>La impresión es en prensa plana Offset a 3 tintas directas.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="ms-slide b-papel">
                                <img src="/dev/images-es/fotos/bolsa-impresa-papel-asa-cordon.png" alt="Bolsa impresa de papel con asa coordón" style="left:1200px; top:80px;"
                                    data-delay="300"
                                    data-type="image"
                                    data-align="right"> 
                            
                                <div class="ms-layer" style="left:460px; top:140px;"
                                    data-delay="300"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>EL TIPO DE ASA</h4>
                                        <p>El tipo de asa en este caso es asa de cordón de algodón en color gris.</p>
                                    </div>
                                </div>

                                <div class="ms-layer" style="left:560px; top:280px;"
                                    data-delay="400"
                                    data-type="hotspot"
                                    data-align="right">
                                    <div class="product-tt">
                                        <h4>EL MATERIAL</h4>
                                        <p>El material es papel tipo Couché recubierto en color blanco.</p>
                                    </div>
                                </div>

                                <div class="ms-layer" style="left:360px; top:380px;"
                                    data-delay="500"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>LA IMPRESIÓN</h4>
                                        <p>La impresión es en prensa plana Offset en selección de color.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="ms-slide b-plastico">
                                <img src="/dev/images-es/fotos/bolsa-plastica-impresa-tipo-camiseta.png" alt="Bolsa plástica impresa tipo camiseta"
                                data-delay="300"
                                data-type="image"
                                     data-align="right"> 

                                 <div class="ms-layer"	style="left:580px; top:80px;"
                                    data-delay="300"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>EL TIPO DE ASA</h4>
                                        <p>Las asas de las bolsas camiseta son del mismo material.</p>
                                     </div>
                                 </div>

                                 <div class="ms-layer" style="left:560px; top:440px;"
                                    data-delay="400"
                                    data-type="hotspot"
                                    data-align="right">
                                    <div class="product-tt">
                                        <h4>EL MATERIAL</h4>
                                        <p>El material es plástico de baja densidad en color blanco parcialmente reciclado.</p>
                                    </div>
                                </div>

                                 <div class="ms-layer" style="left:460px; top:330px;"
                                    data-delay="500"
                                    data-type="hotspot"
                                    data-align="left">
                                    <div class="product-tt">
                                        <h4>LA IMPRESIÓN</h4>
                                        <p>La impresión es en prensa especializada para flexografia a 3 tintas directas.</p>
                                    </div>
                                </div>
                            </div>                   
                        </div>
                        <!-- end of masterslider -->
                    </div>
                    <!-- end of template -->
                </div>
            </div>
        </div>
    </div>
</section>        
        <!-- ===INCLUDE FOOTER === -->
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/footer.php"); ?>
        
        <!-- === START OF JAVASCRIPT === -->
        
        <!-- MARKUP -->
        <script type="application/ld+json">
            { 
                "@context": "http://schema.org",
                "@type": "LocalBusiness",
                "name": "BÖRSE",
                "legalName": "WINSNES DE MEXICO S.A. de C.V.",
                "brand": "BÖRSE",
                "url": "http://www.borse.com.mx/",
                "image": "https://lh5.googleusercontent.com/-RJ5Vs6KJd04/U7RxuJdpyoI/AAAAAAAAARA/dillVf7Fs8k/s251-no/borse-logo-google-plus-01.jpg",
                "logo": "http://www.borse.com.mx/images/logos/logotipo_borse.png",
                "email": "contacto@borse.com.mx",
                "telephone": "01 33 3540 2554",
                "foundingDate": "20090629",
                "contactPoint": 
                [
                    { 
                      "@type": "ContactPoint",
                      "telephone": "+52 33 3540 2500",
                      "contactType": "customer service",
                      "hoursAvailable": "Mo,Tu,We,Th,Fr 08:00-18:00,Sa 09:00-14:00"
                    },
                    { 
                      "@type": "ContactPoint",
                      "telephone": "+52 33 3540 2554",
                      "contactType": "sales",
                      "hoursAvailable": "Mo,Tu,We,Th,Fr 08:00-18:00,Sa 09:00-14:00"
                    },
                    {
                      "@type": "ContactPoint",
                      "telephone": "+52 55 5352 7626",
                      "contactType": "sales",
                      "hoursAvailable": "Mo,Tu,We,Th,Fr 08:00-18:00,Sa 09:00-14:00"
                    },
                    {
                      "@type": "ContactPoint",
                      "telephone": "+52  81 8394 7863",
                      "contactType": "sales",
                      "hoursAvailable": "Mo,Tu,We,Th,Fr 08:00-18:00,Sa 09:00-14:00"
                    },
                    {
                      "@type": "ContactPoint",
                      "telephone": "+52 01 800 265 72 79",
                      "contactType": "sales",
                      "hoursAvailable": "Mo,Tu,We,Th,Fr,Sa 08:00-19:00",
                      "contactOption": "TollFree",
                      "areaServed": "MX"
                    }
                ],
                 "address": {
                    "@type": "PostalAddress",
                    "addressCountry": "MX",
                    "addressLocality": "Guadalajara",
                    "addressRegion": "Jalisco",
                    "postalCode":"44940",
                    "streetAddress": "Calle 5 532A, Colón Industrial"		
                },
                "hasMap": "https://www.google.com.mx/maps/place/B%C3%96RSE/@20.6343482,-103.3527013,19z/data=!4m5!1m2!2m1!1sbolsas+impresas!3m1!1s0x8428b27136d3ac05:0x6929b2eeff7a8cf3?hl=es",
                "geo": {
                "@type": "GeoCoordinates",
                "latitude": "20.634291",
                "longitude": "-103.3546328"
                },		
                "sameAs":
                [
                    "https://plus.google.com/+BorseMx1",
                    "http://www.facebook.com/BorseMX",
                    "https://twitter.com/borsemexico"
                ] 
            }
            </script>
        
        
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <script>
                document.addEventListener('DOMContentLoaded', function () {

                // Get all "navbar-burger" elements
                var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

                // Check if there are any nav burgers
                if ($navbarBurgers.length > 0) {

                // Add a click event on each of them
                $navbarBurgers.forEach(function ($el) {
                  $el.addEventListener('click', function () {

                // Get the target from the "data-target" attribute
                var target = $el.dataset.target;
                var $target = document.getElementById(target);

                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

              });
            });
          }

        });
        </script>
        
        <script src="/dev/scripts-es/scripts.js"></script>
        <script src="/dev/scripts-es/jquery.colorbox.min.js"></script>
        <script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				
				$(".forma_contacto").colorbox({iframe:true, width:"60%", height:"90%", scrolling:false,});
				
                
			});
		</script>
        <script>
            (function ($){

                $(function (){

                    /* Disable Colorbox on mobile devices */

                    $mobile_colorbox();

                    $(window).resize(function () {
                        $mobile_colorbox()
                    });

                });

                $mobile_colorbox = function ()
                {
                    if ( $(window).width() <= 767 ) {
                        $('.colorbox').colorbox.remove();
                    } else {
                        $('.colorbox').colorbox({rel:'colorbox'});
                    }            
                }

            })(jQuery);
        </script>
        <!--<script>
            $(window).load(function () {
                setTimeout(function(){
                $.magnificPopup.open({
                items: {
                    src: './fotos/bolsa-de-plastico-jeans-wrangler.jpg' //ID OF INLINE ELEMENT
                        },
                    type: 'image',
                    closeOnContentClick: 'true',
                });
                }, 7000);  // equals 100 seconds
            });
        </script>-->
        <!--<script src="./scripts-es/jquery.imagesLoaded.min.js"></script>
        <script src="./scripts-es/jquery.transit.min.js"></script>
        <script src="./scripts-es/jquery.easing.js"></script>
        <script src="./scripts-es/waypoints.min.js"></script>
        <script src="./scripts-es/modernizr.custom.min.js"></script>
        <script src="https://unpkg.com/tippy.js@2.5.2/dist/tippy.all.min.js"></script>-->
        <!-- Tooltips -->
        <script>
            tippy('[title]', {
                theme: 'borse',
                followCursor: true,
                offset: '0,20'
            })
        </script>
            
        <!-- Media Boxes -->
         <!-- <script src="./scripts-es/jquery.mediaBoxes.js"></script>-->
        <script>

            $('#materiales-home').mediaBoxes({
                
                lazyLoad: false,
                boxesToLoadStart: 4,
                boxesToLoad: 0,
                horizontalSpaceBetweenBoxes: 30,
                verticalSpaceBetweenBoxes: 30,
                deepLinkingOnFilter: false,
                popup: 'none',
                noMoreEntriesWord: '',
                columnWidth: 'auto',
                columns: 2,
                resolutions: [
                    {
                        maxWidth: 960,
                        columnWidth: 'auto',
                        columns: 3,
                    },
                    {
                        maxWidth: 650,
                        columnWidth: 'auto',
                        columns: 2,
                    },
                    {
                        maxWidth: 450,
                        columnWidth: 'auto',
                        columns: 1,
                    },
                ],
            }); 

	    </script>
        
        <!-- Master Slider -->
		<script src="/dev/scripts-es/masterslider/masterslider.min.js"></script>
        <script type="text/javascript">		
	
            var slider = new MasterSlider();
            slider.setup('masterslider' , {
                width:900 ,
                height:600,
                space:0,
                fillMode:'fit',
                speed:25,
                preload:'all',
                view:'fade',
                loop:true
            });
            
            slider.control('arrows' , {autohide:false});	
            slider.control('bullets');
            
	    </script>
        
        <script type="text/javascript">		
	
            var slider = new MasterSlider();
            slider.setup('mslider' , {
                width:1280,
                height:760,
                //space:100,
                layout: 'fillwidth',
                fullwidth:true,
                centerControls:false,
                speed:18,
                view:'fadeBasic'
            });
            //slider.control('arrows');	
            slider.control('bullets' ,{autohide:false});	
	    </script>
        
        <script type="text/javascript">		
	
            var slider = new MasterSlider();
            slider.setup('mslider-mobile' , {
                width:375,
                height:580,
                //space:100,
                layout: 'fillwidth',
                fullwidth:true,
                centerControls:false,
                speed:18,
                view:'fadeBasic'
            });
            //slider.control('arrows');	
            slider.control('false' ,{autohide:false});	
	   </script>
        <!-- === END OF JAVASCRIPT === -->
        
    </body>
</html>



