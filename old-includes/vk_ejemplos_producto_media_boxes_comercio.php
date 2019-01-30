<?php
	
$file='http://picasaweb.google.com/data/feed/api/user/117486420293124602001/album/' . $album;

$xml = simplexml_load_file($file);


$xml->registerXPathNamespace('gphoto', 'http://schemas.google.com/photos/2007');
$xml->registerXPathNamespace('media', 'http://search.yahoo.com/mrss/');

foreach($xml->entry as $feed){

$keywords_ = $feed->xpath('./media:group/media:keywords'); // and album id for our thumbnail
$keywords=$keywords_[0];

$group = $feed->xpath('./media:group/media:thumbnail');
$a = $group[0]->attributes(); // we need thumbnail path
$id = $feed->xpath('./gphoto:id'); // and album id for our thumbnail
	
$description = $feed->xpath('./media:group/media:description');


if(str_word_count($description[0]) > 0){	
		//$description = $feed->title. ": ". $description[0];
		$description = $description[0];
	}else{
		$description =$feed->title;
		while (strpos($description,'-')>0){
			$description=str_replace("-"," ",$description);
		}		
		$description=str_replace(".jpg"," ",$description);
}

$img=str_replace("s72/","s160/",$a[0]);	
 
if (strpos($array_bolsas[$i][9],"+")>0) $medidas=$medidas_2;
else $medidas=$medidas_1;
	
$link="/contacto/forma-cotizacion-comercio-responsiva?bolsastipo=" . $bolsastipo . "&amp;modelo_referencia=" .  $array_bolsas[$i][6] . "&amp;thumbnail=" . $img. "&amp;bolsastipo=" . $bolsastipo . "&amp;cantidad_minima=" . $cantidad_min_pzas . "&amp;medidas=" . $medidas;
	
$link=f_spaces_to_percent20($link);
	
$onclick='onclick="ga(\'send\', \'event\', {eventCategory: \'BOLSAS PARA ' . $comercio . '\', eventAction: \'button\', eventLabel: \'cotize_' . $bolsastipo . '\', eventValue: 1});"';	

$img_large=str_replace("/s160/","/w900/",$img);

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

				$bolsa=str_replace("EcÓlogicas","Ecólogicas",$bolsa);				

			}else{

				$tamano_=" tamaño " . $array_bolsas[$i][8];

				$bolsa=str_replace("Bolsas","Bolsa",$bolsa);


				$bolsa=str_replace("EcÓlogicas","Ecólogica",$bolsa);				

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
<div class="media-box <?php echo $filtro; ?>">
	<div class="media-box-image">
		<div data-width="217" data-height="217" data-thumbnail="<?php echo str_replace("/s160/","/w217/",$img); ?>" alt="<?php echo $alt_v2; ?>" title="<?php echo $title_v2; ?>" ></div>
		<div data-popup="<?php echo str_replace("/s160/","/w900/",$img); ?>" title="<?php echo $title_v2; ?>"  alt="<?php echo $alt_v2; ?>"></div>				
				<div class="thumbnail-overlay">						
					<div style="margin-top:1em;font-size:.9em;padding:.5em;background-color:white;position:absolute;bottom:.8em;width:90%">
					<div class="icon-ico-zoom-in ico_btn <?php echo $class_color;?> mb-open-popup" style="margin-left:auto;margin-right:auto;float:none;" data-grunticon-embed></div>
					<?php
						if (strlen($cliente_ . $color_)>0){
							echo "<h4>" . $cliente_ . "</h4>"; 
							echo '<dl class="dl_bolsa" data-equalizer="contentdl"  data-options="equalize_on_stack: true">';
							echo '<dt data-equalizer-watch="contentdl" style="display: block; position: relative;">Color:</dt><dd data-equalizer-watch="contentdl" style="display: block; position: relative;">' . $array_bolsas[$i][7] . '</dd>' ;
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
	<div class="media-box-more <?php echo $class_color;?>">
		<a class="cotizacion_comercio btn_bottom nolinktext" href="<?php echo $link; ?>" <?php echo $onclick; ?> rel="nofollow">
		<span>
			<div class="icon-ico-cotizar ico_btn <?php echo $class_color;?>" data-grunticon-embed></div>
					SOLICITAR  <br/><span class="span_button">COTIZACIÓN</span></span>
	</a>
	</div>
</div>
	<?php
	$i=$i+1;

}	

function f_spaces_to_percent20($string){
	while (strpos($string,' ')>0){
		$string=str_replace(" ","%20",$string);
	}
	return($string);
}
?>
