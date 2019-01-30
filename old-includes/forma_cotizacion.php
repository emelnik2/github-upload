<?php

header('Content-type: text/javascript');

ini_set("session.gc_maxlifetime", "18000");  session_start(); include ($_SERVER['DOCUMENT_ROOT']."/includes-es/consulta_usuario_carrito_v2.php");

?>


	
	
	simpleCart({
	checkout: {
	type: "SendForm",
	url: "/includes-es/bolsas_a_cotizar.php",
	method: "POST" , 
	cartColumns: [
			{ attr: "name" , label: "Producto" } ,
			{ view: "decrement" , label: false , text: "-" } ,
			{ attr: "quantity" , label: "Qty" } ,
			{ view: "increment" , label: false , text: "+" } ,		
			{ view: "image" , attr:" thumb" , label: false} ,
			{ view: "remove" , text: "Remove" , label: false }
		]
	}
	});
	
	simpleCart.load();
	

	$('#data_form').parsley({
    listeners: {
        onFieldValidate: function(elem, ParsleyField) {
            console.log("validate", elem);
            return false;
        },
        onFieldError: function(elem, constraints, ParsleyField) {
            console.log("error", elem);
        }
    }
});

$('#data_form').on('submit', function (e) {

  e.preventDefault();

	console.log("hello world 0");

  $.ajax({
	type: 'post',
	url: '/includes-es/consulta_usuario_carrito_v2.php',
	data: $('form').serialize(),
	success: function (data2) {
		if (data2=="datos_ok"){
			 $('#btn_solicitar_cotizacion').addClass('simpleCart_checkout');
			 $('#btn_solicitar_cotizacion').removeClass('btn_hidden');
			 $('.bt_login').addClass('datos_ok');
		}
	}
  });

});


			
	

function navScroll(navId)
{
	$(navId).scrollTop($(navId).height()*20);
	$('html, body').animate({			
		scrollTop: $(navId).offset().top -228}, 2000);			
};

function navScroll2(navId)
{		
	$('html, body').animate({			
		scrollTop: $(navId).offset().top -228}, 2000);			
};


function navScroll3(navId)
{		
	$('html, body').animate({			
		scrollTop: $(navId).offset().top -468}, 2000);			
};




		
		$('.href_th').colorbox({opacity:0, width:"880px", height:"900px", scrolling:false});	
				
		$("#btn_img_zoom").colorbox({opacity:0, width:"880px", height:"900px", scrolling:false,onOpen:function(){$("#btn_img_zoom").trigger('click');$('#colorbox').addClass('box_overlay_zoom');}});
		
		$("#overlay_help_cotizacion").colorbox({iframe:true, opacity:0, width:1109, height:515, scrolling:false,onOpen:function(){$(".btn_cotizador_trigger").trigger('click');$('#colorbox').addClass('box_overlay_help_cotizacion_pos');}});				
		
		var items = localStorage.getItem("simpleCart_items");
		if (items=="{}") {
			$(".simpleCart_items").addClass("carrito_vacio");						
		}
		



<?php if (strlen($carrito_pais)>0){ ?>	
	$("select[name='carrito_pais']").find("option[value='<?php echo $carrito_pais; ?>']").attr("selected",true);												
<?php } ?>

<?php if (strlen($carrito_tipo_de_establecimiento)>0){ ?>	
	$("select[name='carrito_tipo_de_establecimiento']").find("option[value='<?php echo $carrito_tipo_de_establecimiento; ?>']").attr("selected",true);									
<?php } ?>	

<?php if (strlen($carrito_como_se_entero)>0){ ?>	
	$("select[name='carrito_como_se_entero']").find("option[value='<?php echo $carrito_como_se_entero; ?>']").attr("selected",true);									
<?php } ?>


$('.button_acceso_cotizar').click(function(e) {		
	e.preventDefault();				
	$("#form_data_cotizacion").addClass("forma_cotizar_show");
	navScroll2("#container_footer");			
});	

$('.button_regresar_cotizar').click(function(e) {		
	e.preventDefault();				
	navScroll2("#ejemplos");
});	

$('.button_arriba').click(function(e) {		
	e.preventDefault();				
	navScroll2(".container_header");
});	
		
$("#carrito_pais").change(function(){
	var cve_=$("#carrito_pais").val();
	$("#carrito_cve").val(cve_);
	//var pais_=$("#carrito_pais option:selected").text();
	//$("#vk_pais_texto").val(pais_);					
});	

$("#carrito_lada").change(function (){
	if ($("#carrito_pais").val()=="52"){
		var lada_=$("#carrito_lada").val().trim();
		if (lada_.substring(0, 2)=="81" && lada_.length==3){
			alert ("Advertencia, la lada de Monterrey es 81, solo es de 2 digítos.");
			$("#lada").val("81");
		}else if (lada_=="333"){
			alert ("Advertencia, la lada de Guadalajara es 33, solo es de 2 digítos.");
			$("#carrito_lada").val("33");
		}else if (lada_=="555"){
			alert ("Advertencia, la lada de la Ciudad de México es 55, solo es de 2 digítos.");
			$("#carrito_lada").val("55");
		}else if (lada_=="044"){
			alert ("Advertencia, por favor no utilice 044, en su lugar ponga los (2 o 3) dígitos iníciales de su número de celular de 10 dígitos");
			$("#lada").val("");
		}else if (lada_=="045"){
			alert ("Advertencia, por favor no utilice 045, en su lugar ponga los (2 o 3) dígitos iníciales de su número de celular de 10 dígitos");
			$("#lada").val("");
		}else if (lada_=="01"){
			alert ("Advertencia, por favor no utilice 01, en su lugar ponga los (2 o 3) dígitos iníciales de su número telefónico de 10 dígitos");
			$("#lada").val("");
		}
	}
});

$("#carrito_telefono").change(function (){
	if ($("#carrito_pais").val()=="52"){
		var telefono_=$("#carrito_telefono").val();
		var lada_=$("#carrito_lada").val().trim();
		if (lada_=="33" || lada_=="55" || lada_=="81"){
		
		}else if(lada_.length==2){
			$("#carrito_lada").val(lada_+telefono_.substring(0, 1));
			$("#carrito_telefono").val(telefono_.substring(1, telefono_.length));
		}
	}
});						



			
