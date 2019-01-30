<?php 			
	
if ($tintasfte==" , 0, 1, 2, 3, 4, 5, 6, En selección"){
	$tintasfte="";
}else{
	$tintasfte='<input class="item_tintasfte" type="text" value="' . $tintasfte . '">';
}

if ($tintasvta==" , 0, 1, 2, 3, 4, 5, 6, En selección"){
	$tintasvta="";
}else{
	$tintasvta='<input class="item_tintasvta" type="text" value="' . $tintasvta . '">';
}

if ($material=="plástico") $tipo_combo="";

$sizes=str_replace(" , ","Seleccione, ",$sizes);
										
		for ($i=$bolsas-1;$i>-1;$i--){			
		
		$img=str_replace("/s414/","/w960/",$array_bolsas[$i][2]);			
		
		$alt=$array_bolsas[$i][4];
		
		$alt=str_replace("&"," ",$alt);	
		
		$alt=trim($alt);
		
		if(strlen($array_bolsas[$i][6])>0){
			$cliente_="CLIENTE: " . $array_bolsas[$i][6];
		}else{
			$cliente_="";
		}
		
		if(strlen($array_bolsas[$i][7])>0){
			$color_="COLOR: " . $array_bolsas[$i][7];
		}else{
			$color_="";
		}
		
		$alt_v2="";
		$sit_img_title="";
		if (strlen($cliente_ . $color_)>0){
			


			//$alt_v2=$cliente_ . " - " . $color_;		
			$bolsa=ucwords(strtolower($h1));

			if ($array_bolsas[$i][8]=="Varios Tamaños"){

				$tamano_=" " . $array_bolsas[$i][8];

			}else{

				$tamano_=" tamaño " . $array_bolsas[$i][8];

				$bolsa=str_replace("Bolsas","Bolsa",$bolsa);

			}



			$alt_v2=$bolsa . " color " . $array_bolsas[$i][7] . " impresa a " . $array_bolsas[$i][10]  . $tamano_ . " medidas " .  $array_bolsas[$i][9] . " con asa " . $array_bolsas[$i][11] . " | BÖRSE" ;			

			$title_v2=$bolsa . " " . $array_bolsas[$i][8] . " impresa a " . $array_bolsas[$i][10] ;

			$sit_img_title="<image:title>$title_v2</image:title>";		  
			
		}else{
			$alt_v2=$alt ;			
		}
		
if ($sitemap==1){			

		$url=explode('?', $_SERVER['REQUEST_URI']);
		$title=basename($url[0]);
		
		while (strpos($title,'-')>0){
				$title=str_replace("-"," ",$title);
			}		
		
		$title=str_replace("bolsas","Bolsa",$title);
		$title=str_replace("cajas","Caja",$title);
		$title=str_replace("sobres","Sobre",$title);
		$title=str_replace("fundas","Funda",$title);
		$title=str_replace("morrales","Morral",$title);


		$image_xml.=    
'		<image:image>
		  <image:loc>'. $array_bolsas[$i][0] . '</image:loc>
		  '. $sit_img_title . '		  
		  <image:caption>' . $alt_v2 . '</image:caption>
		</image:image>
';
	}
		
?>
		<div id="<?php echo $array_bolsas[$i][1]; ?>" class="media-box center_image_owl simpleCart_shelfItem">
			<div class="media-box-image">
				<div data-width="217" data-height="217" data-thumbnail="<?php echo str_replace("/s414/","/w217/",$array_bolsas[$i][2]); ?>" alt="<?php echo $alt_v2; ?>" title="<?php echo @$title_v2; ?>"></div>	
				<div data-popup="<?php echo $img; ?>" title="<?php echo @$title_v2; ?>"  alt="<?php echo $alt_v2; ?>"></div>				
				<div class="thumbnail-overlay">						
					<div style="margin-top:1em;font-size:.9em;padding:.5em;background-color:white;position:absolute;bottom:.8em;width:90%">
					<div class="icon-ico-zoom-in ico_btn <?php echo @$class_color;?> mb-open-popup" style="margin-left:auto;margin-right:auto;float:none;" data-grunticon-embed></div>
					<?php
						if (strlen($cliente_ . $color_)>0){
							echo "<h4>" . $cliente_ . "</h4>"; 
							echo '<dl class="dl_bolsa" data-equalizer="contentdl"  data-options="equalize_on_stack: true">';
							echo '<dt data-equalizer-watch="contentdl">Color:</dt><dd data-equalizer-watch="contentdl">' . $array_bolsas[$i][7] . "</dd>" ;
							echo "<dt>Tamaño:</dt><dd>" . $array_bolsas[$i][8] . "</dd>" ;
							echo "<dt>Medidas:</dt><dd>" . $array_bolsas[$i][9] . "</dd>" ;
							echo "<dt>Impresión:</dt><dd>" . $array_bolsas[$i][10] . "</dd>" ;
							echo "<dt>Color base:</dt><dd>" . $array_bolsas[$i][12] . "</dd>" ;
							echo "<dt>Asa:</dt><dd>" . $array_bolsas[$i][11] . "</dd>" ;
							echo "</dl>"; 
						}else{
							echo "<br/>";
							echo $alt; 
						}
					?>					
					</div>
				</div>
			</div>	
			<div class="media-box-more <?php echo @$class_color;?>">
				<a class="item_add btn_bottom nolinktext" href="javascript:;" rel="nofollow">
				<span>
					<div class="icon-ico-cotizar ico_btn <?php echo @$class_color; ?>" data-grunticon-embed></div>
					SOLICITAR  <br/><span class="span_button">COTIZACIÓN</span></span>
				<div class="variables_bolsa">
					<input class="item_name" type="text" value="<?php echo $h1; ?>">
					<input class="item_Quantity" type="text" value="<?php echo $cantidad_minima; ?>">
					<input class="item_material" type="text" value="<?php echo $material; ?>">
					<input class="item_cantmin" type="text" value="<?php echo $cantidad_minima; ?>">
					<input class="item_thumb" type="text" value="<?php echo str_replace("/s90/","/s172/",$array_bolsas[$i][5]); ?>">
					<input class="item_tipo" type="text" value="<?php echo $tipo_combo; ?>">
					<input class="item_sizes" type="text" value="<?php echo $sizes; ?>">
					<?php echo $tintasfte .  $tintasvta; ?>
					<input class="item_unidades" type="text" value="<?php echo $unidades; ?>">
				</div>
			</a>
			</div>
		</div>		
<?php						
		}
?>