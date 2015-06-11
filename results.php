<?php

//get device lat/lng passed from Cordova values
$moblat = $_GET['lat'] * 100;
$moblng = $_GET['lng'] * 100;
$thefield = array();

//simulate results returned by a database query

$results[0]['name']="Name Number 1";
$results[0]['lat']= 34.139850;
$results[0]['lng']= -118.379348;
$results[1]['name']="Name Number 2";
$results[1]['lat']=38.898748;
$results[1]['lng']= -77.037684;
$results[2]['name']="Name Number 3";
$results[2]['lat']=40.758224;
$results[2]['lng']= -73.917404;
$results[3]['name']="Name Number 4";
$results[3]['lat']=24.553922;
$results[3]['lng']= -81.803260;

//print_r($results);
$i = 0;
foreach ($results as $row) {
	//compute distance from device for returned row
	$latval = $row['lat'] * 100;
	$lngval = $row['lng'] * 100;
	$diflat = $moblat-$latval;
	$diflng = $moblng-$lngval;
	if($diflat < 0) $diflat = $diflat * -1;
	if($diflng < 0) $diflng = $diflng * -1;
	//convert from kilometers to miles
	$totdst = round(($diflat + $diflng)*.621371);
	//build returned array
	$thefield['values'][$i]['name'] = $row['name'];
	$thefield['values'][$i]['distance'] = $totdst;
	$i++;
}

//return json to be parsed by angular
$tojson = json_encode($thefield);
echo($tojson);
?>
