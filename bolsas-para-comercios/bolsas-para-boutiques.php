<?php


include_once($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/doctype.php");
$url=explode('?', $_SERVER['REQUEST_URI']);
?>
<title>Bolsas para Boutiques | BÖRSE</title>
<?php include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/canonical_sin_extension.php"); ?>



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="En BÖRSE somos especialistas en bolsas para boutiques y para tiendas de ropa impresas." />
    <meta name="robots" content="noindex, nofollow">
    <?php include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/head_comun.php");

    require '../scripts-bmix/libs/Cloudinary.php';
    require '../scripts-bmix/libs/Uploader.php';
    require '../scripts-bmix/libs/Api.php';
    require_once '../scripts-bmix/libs/autoload.php';
    require_once '../scripts-bmix/classes/cloudinary.cfg.php';

    ?>

    </head>

    <body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/header.php"); ?> 	

<section class="slider">
    <div class="container is-fluid is-paddingless is-marginless">
        <!-- Start Masterslider Layers Template -->
        <div class="ms-layers-template">
        <!-- Start Masterslider -->
            <div class="master-slider ms-skin-light-6 round-skin" id="mslider">
                <div class="ms-slide">
                    <img src="/dev/scripts-es/masterslider/images/blank.gif" data-src="../bolsas-para-comercios/fotos/boutiques.jpg" alt="Vista del interior de una boutique"/>
                    
                    <div class="ms-layer slider-box-03" 
				    	data-effect="rotatebottom(40,250,c)"
				    	data-duration="3500"
				    	data-delay="900"
				    	data-ease="easeOutExpo"
				    >
                    </div>
                        
				    <p class="ms-layer message-comercio has-text-white" style="left:42em; top:6em" 
				    	data-effect="bottom(40)"
				    	data-duration="3500"
				    	data-delay="3000"
				    	data-ease="easeOutExpo"
                        >En BÖRSE tenemos las mejores<br/> <span>bolsas para boutiques</span><br/> a los mejores precios del mercado.</p>
                </div>
                <!-- End of Masterslider -->
            </div>
            <!-- End Masterslider Template -->
        </div>    
    </div>
</section>

<section class="seccion-intro-categoria">
    <div class="container">
        <div class="tile is-ancestor is-vertical box">
            <div class="tile is-parent">
                <div class="tile is-child is-7">    
                    <h1 class="subtitle is-size-4 with-border">
                    BOLSAS PARA<br/>
                    <span class="title is-size-2">BOUTIQUES</span>
                    </h1>
                    <p class="txt-block is-size-7">
                        En BÖRSE fabricamos bolsas para boutique y para tiendas de ropa, estas bolsas son ideales para que sus clientes lleven la ropa y los accesorios que adquirieron en sus puntos de venta a casa cómodamente con mucha seguridad, distinción y elegancia. Debido a la calidad de las bolsas que ofrecemos, entre nuestros clientes se encuentran algunas de las marcas de mayor prestigio a nivel mundial.<br/><br/>
                        
                        Los materiales que ústed puede elegir en bolsas para su boutique pueden ser: plástico de diferentes calibres y distintos tipos de papel, así mismo, puede elegir los acabados que deseé para hacerlas más atractivas y del agrado de su mercado meta.
                    </p>
                </div>
                <div class="tile is-parent is-vertical">
                    <div class="tile is-child">
                        <figure class="image is-4by3" style="border: 1px solid lightgray;">
                            <img src="/dev/images-es/interface/info-volumen-plastico.svg" title="Pedido Mínimo Plástico" alt="Pedido mínimo para bolsas de plástico">
                        </figure>
                    </div>
                    <div class="tile is-child box"></div>
                </div>
                <div class="tile is-parent is-vertical">
                    <div class="tile is-child">
                        <figure class="image is-4by3" style="border: 1px solid lightgray;">
                            <img src="/dev/images-es/interface/info-volumen-papel.svg" title="Pedido Mínimo Papel" alt="Pedido mínimo para bolsas de Papel">
                        </figure>
                    </div>
                    <div class="tile is-child">
                        <figure class="image is-4by3" style="border: 1px solid lightgray;">
                            <img src="/dev/images-es/interface/info-volumen-tela.svg" title="Pedido Mínimo Tela" alt="Pedido mínimo para bolsas de Tela">
                        </figure>
                    </div>
                </div>
            </div>    
            
            <div class="tile is-parent">
                <div class="tile is-child"></div>
                <div class="tile is-child is-9">
                    <figure class="image is-2by1">
                        <img src="/dev/bolsas-para-comercios/fotos/bolsas-para-boutiques.jpg" title="Bolsas para Boutiques" alt="Bolsas para boutiques impresas">
                    </figure>
                </div>
                <div class="tile is-child"></div>
            </div>
        </div>    
    </div>
</section>  
        
<section class="seccion-categoria">
    <div class="container">
        <div class="tile is-ancestor box">
            <div class="tile is-parent is-vertical">
                <div class="tile is-child is-12">
                    <!--  ======== MEDIA BOXES ======== -->
                    <div id="ejemplos-bolsas">
                        <div class="media-box intro-ejemplos" data-columns="2">
                            <div class="tile is-child is-12">
                                <h2 class="title is-size-3 with-border" >EJEMPLOS DE <br/>
                                <span class="subtitle is-size-5"> BOLSAS PARA BOUTIQUE</span>
                                </h2>
                                <p class="txt-block-ejemplos is-size-7">A continuación encontrará algunos ejemplos de bolsas que hemos hecho para diferentes boutiques de prestigio, no olvide que el pedido minimo para bolsas varía desde las 2,000 hasta las 5,000 unidades dependiendo del material.<br/><br/>
                                En BÖRSE usted contará en todo momento con personal que le brindará asesoría especializada al momento de cotizar bolsas para su boutique.</p> 
                            </div>
                        </div>
                        <!-- Conecto a la carpeta "bolsas-para-boutiques" en cloudinary -->
                        <!-- Cambiar prefix a el nombre del folder en cloudinary del cual se quieren extraer las imágentes -->
                        <?php

                            $api = new \Cloudinary\Api();
                            $result = $api->resources(array("type" => "upload", "prefix" => "bolsas-para-boutiques/", "max_results" => 100, "context" => TRUE));
                            $options = array("width" => 256, "height" => 256, "fetch_format"=>"auto", "crop" => "fill", "secure" => TRUE);

                            foreach($result["resources"] as $photo){
                                $thumbnail = cloudinary_url($photo['public_id'], $options);
                         ?>

                        <!-- ------ BOX MARKUP ------ -->       
                        <div class="media-box push">
                            <div class="media-box-image"  data-overlay-effect="push-up">
                                <div data-title="<?php echo htmlentities($photo['context']['custom']['data-title']);?>" data-alt="<?php echo htmlentities($photo['context']['custom']['data-alt']);?>" data-thumbnail="<?php echo $thumbnail;?>"></div>

                                <div class="thumbnail-overlay">
                                    <footer class="card-footer">
                                        <a class="card-footer-item button bttn-spaced bttn-fill bttn-sm bttn-primary bttn-no-outline forma_comercio" href="/dev/contacto-es/forma-cotizacion-base.php?thumbnail=<?php echo $thumbnail ?>&data_title=<?php echo htmlentities($photo['context']['custom']['data-title']);?>">
                                        <span class="fa fa-shopping-cart"></span>&nbsp; COTIZAR</a>
                                        <a href="#" class="card-footer-item mb-open-popup button bttn-fill bttn-sm bttn-primary bttn-no-outline" data-src="<?php echo $photo['secure_url'] ?>">
                                        <span class="fa fa-search"></span>&nbsp; MÁS GRANDE</a>
                                    </footer>    
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>    
                <!--  ======== END MEDIA BOXES ======== -->
            </div>
        </div>
    </div>
</section>
        <!-- ===INCLUDE FOOTER === -->
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/footer.php"); ?>
    
        
        <!-- === START OF JAVASCRIPT === -->
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
        
        <!-- Tooltips -->
        <script>
            tippy('[title]', {
                theme: 'borse',
                followCursor: true,
                offset: '0,20'

            })
        </script>
        
        <script src="/dev/scripts-es/jquery.colorbox.min.js"></script>
        <script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				
				$(".forma_contacto").colorbox({iframe:true, width:"60%", height:"85%", scrolling:false,});
				
                
			});
		</script>
        <script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				
				$(".forma_comercio").colorbox({iframe:true, width:"60%", height:"90%", scrolling:false,});
				
                
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
        
        <!-- Media Boxes -->
        <script>

            $('#ejemplos-bolsas').mediaBoxes({
                columns: 4,
                lazyLoad: false,
                boxesToLoadStart: 15,
                boxesToLoad: 0,
                horizontalSpaceBetweenBoxes: 16,
                verticalSpaceBetweenBoxes: 16,
                deepLinkingOnFilter: false,
                popup: 'magnificpopup',
                noMoreEntriesWord: ''
            }); 

	    </script>
        
        <!-- Master Slider -->
		<script src="/dev/scripts-es/masterslider/masterslider.min.js"></script>
        <script type="text/javascript">		
	
            var slider = new MasterSlider();
            slider.setup('masterslider' , {
                width:960 ,
                height:595,
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
                height:600,
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



