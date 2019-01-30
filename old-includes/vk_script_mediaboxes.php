<?php

header('Content-type: text/javascript');

?>
$(document).ready(function($){
	$('#grid').mediaBoxes({
		overlayEffect: 'direction-aware',
		columns:2,
		boxesToLoadStart: 16,
		horizontalSpaceBetweenBoxes: 4,
		verticalSpaceBetweenBoxes: 4,
		LoadingWord: 'CARGANDO FOTOS...',
		noMoreEntriesWord: 'NO EXISTEN MÁS FOTOS',
		 resolutions: [            
		{
			maxWidth: 640,
			columnWidth: 'auto',
			columns: 1,
		}
	]
	});         
});	