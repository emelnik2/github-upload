<?php
include_once($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/doctype.php");
$url=explode('?', $_SERVER['REQUEST_URI']);
?>
<title>Bolsas para Tiendas Departamentales y de Autoservicio | BORSE</title>
<?php include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/canonical_sin_extension.php"); ?>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bolsas para tiendas departamentales y para cadenas de tiendas de autoservicio que requieren contar con amplios stocks de bolsas impresas." />
    <meta name="robots" content="noindex, nofollow">
    <?php include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/head_comun.php"); ?>


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
                    <img src="/dev/scripts-es/masterslider/images/blank.gif" data-src="../bolsas-para-comercios/fotos/tiendas-departamentales.jpg" alt="Vista del interior de una tienda departamental"/>
                    
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
                        >En bolsas para <span>tiendas<br/> departamentales</span> le <br/>otorgamos el mejor costo beneficio.</p>
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
                    <span class="title is-size-2">TIENDAS DEPARTAMENTALES</span>
                    </h1>
                    <p class="txt-block is-size-7">
                        En BÖRSE sabemos que en la actualidad el uso de la imagen de marca en las bolsas para tiendas departamentales ha cobrado una especial importancia convirtiéndose en uno de sus principales factores de reconocimiento, éxito y permanencia, por ello es que ofrecemos diferentes modelos de bolsas orientadas específicamente a negocios que requieren de grandes cantidades de bolsas impresas para proporcionarle a sus clientes.<br/><br/>
                        
                        El objetivo de las bolsas en las tiendas departamentales es brindar a los clientes un medio práctico para llevar a casa sus compras cómodamente, pero también estas bolsas deben cumplir con la función de diferenciar su marca de manera eficaz.
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
                        <img src="/dev/bolsas-para-comercios/fotos/bolsas-para-tiendas-departamentales.jpg" title="Bolsas para Tiendas Departamentales" alt="Bolsas para tiendas departamentales y autoservicios impresas">
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
                                <h2 class="title is-size-3 with-border" >EJEMPLOS DE BOLSAS<br/>
                                <span class="subtitle is-size-5"> PARA TIENDAS DEPARTAMENTALES</span>
                                </h2>
                                <p class="txt-block-ejemplos is-size-7">Gracias a nuestras capacidades de producción podemos surtir grandes cantidades de bolsas para tiendas departamentales que se encuentran instaladas en México y en el extranjero, con el mejor costo-beneficio de la industria.<br/><br/>
                                Tenemos disponibles bolsas para tiendas departamentales de diferentes estilos, los materiales mas solicitados por este tipo de comercios son plástico y papel.</p> 
                            </div>
                        </div>
                        <!-- Conecto a la base de datos para tomar la informacion sobre las bolsas -->
                        <?php 

                        $link = new mysqli('borse.com.mx', 'borse_oper', 'Y781rkB1n7RC', 'borse_imagenes');

                        /* check connection */
                        if (mysqli_connect_errno()) {
                            printf("Fallo en la conexión: %s\n", mysqli_connect_error());
                            exit();
                        }

                        $query=" SELECT * from bolsas_para_tiendas_departamentales ";

                        //$result = mysql_query($query);
                        if ($result = $link->query($query)) {

                            while ($row = mysqli_fetch_array($result)){

                         ?> 
    <!-- ------ BOX MARKUP ------ -->       
                        <div class="media-box push">
                            <div class="media-box-image"  data-overlay-effect="push-up">
                                <div data-title="<?php echo htmlentities($row['data-title']);?>" data-alt="<?php echo htmlentities($row['data-alt']);?>" data-thumbnail="https://res.cloudinary.com/borsemx/image/upload/c_scale,h_256,w_256/v1530632672/bolsas-para-tiendas-departamentales/<?php echo $row['image'];?>"></div>

                                <div class="thumbnail-overlay">
                                    <footer class="card-footer">
                                        <a class="card-footer-item button bttn-spaced bttn-fill bttn-sm bttn-primary bttn-no-outline forma_comercio" href="/dev/contacto-es/forma-cotizacion-base.php?thumbnail=https://res.cloudinary.com/borsemx/image/upload/bolsas-para-tiendas-departamentales/<?php echo $row['image'];?>">
                                        <span class="fa fa-shopping-cart"></span>&nbsp; COTIZAR</a>
                                        <a href="#" class="card-footer-item mb-open-popup button bttn-fill bttn-sm bttn-primary bttn-no-outline" data-src="https://res.cloudinary.com/borsemx/image/upload/v1530632672/bolsas-para-tiendas-departamentales/<?php echo $row["image"];?>">
                                        <span class="fa fa-search"></span>&nbsp; MÁS GRANDE</a>
                                    </footer>    
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                            $result->close();
                        } ?>
                       
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


