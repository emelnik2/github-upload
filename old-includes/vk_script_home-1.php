<?php

header('Content-type: text/javascript');

include_once($_SERVER['DOCUMENT_ROOT']."/vk_includes/vk_mobile_detect.php"); 
$detect = new Mobile_Detect;

?>
$(".menubolsaa").hover(function(){$('.menu_pop_image_container').css('background-position', '0px 0px'); });

$(".triger_bolsa1").hover(function(){$('.menu_pop_image_container').css('background-position', '0px 0px'); });
$(".triger_bolsa2").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -181px'); });
$(".triger_bolsa3").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -361px'); });
$(".triger_bolsa4").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -541px'); });
$(".triger_bolsa5").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -721px'); });
$(".triger_bolsa6").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -901px'); });
$(".triger_bolsa7").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1081px'); });
$(".triger_bolsa8").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1261px'); });
$(".triger_bolsa9").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1441px'); });
$(".triger_bolsa10").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1621px'); });
$(".triger_bolsa11").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1801px'); });
$(".triger_bolsa12").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1981px'); });
$(".triger_bolsa13").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -2161px'); });

$(".triger_bolsa1a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px 0px'); });
$(".triger_bolsa2a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -211px'); });
$(".triger_bolsa3a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -421px'); });
$(".triger_bolsa4a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -631px'); });
$(".triger_bolsa5a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -841px'); });
$(".triger_bolsa6a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1051px'); });
$(".triger_bolsa7a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1261px'); });
$(".triger_bolsa8a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1471px'); });
$(".triger_bolsa9a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1681px'); });
$(".triger_bolsa10a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -1891px'); });
$(".triger_bolsa11a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -2101px'); });
$(".triger_bolsa12a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -2311px'); });
$(".triger_bolsa13a").hover(function(){$('.menu_pop_image_container').css('background-position', '0px -2521px'); });

$(".button_paypal").click(function(){								
	$('#paypal_container').css('visibility', 'visible');
	$('#paypal_container').css('height', 'auto');
	$('#paypal_container').css('overflow', 'inherent');
});	

$(function(){
	$('#mgmenu1').universalMegaMenu({
       menu_effect: 'hover_slide',
        menu_speed_show: 300,
        menu_speed_hide: 200,
        menu_speed_delay: 200,
        menu_click_outside: true,
        menubar_trigger : true,
        menubar_hide : false,
        menu_responsive: true
    });

		
	<?php if (!$detect->isMobile()){ ?>
	$(".forma_contacto").colorbox({iframe:true, width:820, height:810, scrolling:false, reposition:false, onOpen:function(){f_remove_class_pos();}});

	$("#mainvid").colorbox({iframe:true, width:560, height:315, scrolling:false, reposition:false});

	if ( $( ".forma_cotizar" ).length ) { $(".forma_cotizar").colorbox({iframe:true, width:1080, height:510, scrolling:false, reposition:false, onOpen:function(){f_remove_class_pos();}});};

	if ( $( ".sliderbutton" ).length ) { $(".sliderbutton").colorbox({iframe:true, width:500, height:454, scrolling:false, reposition:false, onOpen:function(){f_remove_class_pos();}});};

	$("#btn_paypal").colorbox({iframe:true, width:768, height:630, scrolling:false, reposition:false, onOpen:function(){f_remove_class_pos();}});
	function f_remove_class_pos(){$('#colorbox').removeClass('box_overlay_help_cotizacion_pos');}	
	<?php } ?>
	
	if ( $( ".zoom_image" ).length ) { $(".zoom_image").colorbox({scalePhotos:true,maxWidth:"100%"}); };
	
	if ( $( "#masterslider" ).length ) {
console.log("starting ms");
		 var slider = new MasterSlider();
		 slider.setup('masterslider' , {
			 width:1280,    
			 height:580,   
			 space:160,
			 swipe:true,											 
			 view:"flow"
		});
//		slider.control('bullets' , {autohide:false, align:'bottom', margin:-20});							
		slider.control('arrows' , {autohide:true});     
	}
	
	
});

    $( document ).ready(function() {
		var slopen = new MasterSlider();
		slopen.setup("mslider" , {
			loop:true,
			width:360,
			height:360,
			speed:20,
			view:'flow',
			preload:0,
			space:50,
			wheel:false
		});
		slopen.control('arrows');
});

     $( document ).ready(function() {
     if ( $( "#homeslider" ).length ) {
		var homeslider = new MasterSlider();
		homeslider.setup("homeslider" , {
			width:1600,
        	height:580,
        	view:"fade",
       		//space:100,
        	fullwidth:true,
        	centerControls:false,
			wheel:false
		});
		// add scroll parallax effect
MSScrollParallax.setup(homeslider,50,80,true);
	    homeslider.control('bullets' , {autohide:false , align:"bottom" , margin:-30});              
		homeslider.control('arrows');
		}
 });



