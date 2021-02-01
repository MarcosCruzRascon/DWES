<?php 
    $fichero = new DOMDocument();
	$fichero->load( "https://opendata.euskadi.eus/contenidos/ds_recursos_turisticos/empresas_alquiler_deportivo/opendata/empresas.xml");
	$salida = array(); 
	$terremotos = $fichero->getElementsByTagName("item");
    foreach($terremotos as $entry) {
		$nuevo = array();
		$nuevo["title"] = $entry->getElementsByTagName("documentName")[0]->nodeValue;
		$nuevo["lat"] =  $entry->getElementsByTagName("latwgs84")[0]->nodeValue;
		$nuevo["lng"] =  $entry->getElementsByTagName("lonwgs84")[0]->nodeValue;		
		$salida[] = $nuevo;
    }
	echo json_encode($salida);
