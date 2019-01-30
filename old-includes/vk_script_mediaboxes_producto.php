<?php


header('Content-type: text/javascript');

$producto=$_REQUEST["producto"];
$svg_color=$_REQUEST["svg_color"];

?>
$(document).ready(function($){
	$('#grid').mediaBoxes({
		filterContainer: '#filter',
		search: '#search',
		columnWidth: 'auto',
		columns: 5,
		boxesToLoad: 5,
		sortContainer: '#sort',	
		lazyLoad: false,
		getSortData: {
		  title: '.media-box-title',
		  year: '.media-box-year',
		  author: '.media-box-author'
		},
		boxesToLoadStart: 10,								
		horizontalSpaceBetweenBoxes: 12,
		verticalSpaceBetweenBoxes: 12,
		LoadingWord: '<span id="cargar_mas" class="<?php echo $svg_color; ?>"><svg class="ico_cargar_mas"><use xlink:href="#svg-arrow-down" class="ic-arrow-down"/></svg> <span class="label_cargar_mas">CARGANDO <?php echo $producto; ?>... </span> <svg class="ico_cargar_mas"><use xlink:href="#svg-arrow-down" class="ic-arrow-down"/></svg></span>',
		loadMoreWord: '<span id="cargar_mas" class="<?php echo $svg_color; ?>"><svg class="ico_cargar_mas"><use xlink:href="#svg-arrow-down" class="ic-arrow-down"/></svg> <span class="label_cargar_mas">CARGAR MÁS <?php echo $producto; ?></span> <svg class="ico_cargar_mas"><use xlink:href="#svg-arrow-down" class="ic-arrow-down"/></svg></span>',
		noMoreEntriesWord: '<span id="cargar_mas" class="<?php echo $svg_color; ?>"><svg class="ico_cargar_mas"><use xlink:href="#svg-arrow-down" class="ic-arrow-down"/></svg> <span class="label_cargar_mas">NO EXISTEN MÁS <?php echo $producto; ?></span> <svg class="ico_cargar_mas"><use xlink:href="#svg-arrow-down" class="ic-arrow-down"/></svg></span>',
		 resolutions: [
			{
				maxWidth: 1151,
				columnWidth: 'auto',
				columns: 3,
			},
			{
				maxWidth: 639,
				columnWidth: 'auto',
				columns: 2,
			},
		],
	});         

	$(document).foundation('equalizer', 'reflow');
	
});	