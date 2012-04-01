<!DOCTYPE html>
<?
	include ('geotag.php');
	
	$filename = 'IMG_0271.JPG';
	
	if ($c = getCoordinates($filename)) {
		$latitude = $c[0];
		$longitude = $c[1];
		$DateTimeOriginal = $c[2];
			
	}
	
//	$date=split(':',str_replace(' ',':',$DateTimeOriginal)); 
//	$date = strtotime("{$date[0]}-{$date[1]}-{$date[2]} {$date[3]}:{$date[4]}:{$date[5]}");


	echo "latitude : $latitude <br>";
	echo "longitude : $longitude <br>";
	echo "DateTimeOriginal : $DateTimeOriginal <br>";

?>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDP16Ad0F2g4aNlu9oqjp-Cshoaod_M5VY&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        
		var myLatlng = new google.maps.LatLng(<? echo $latitude; ?>, <? echo $longitude; ?>);
		var myOptions = {
		  zoom: 15,
		  center: myLatlng,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		
		var marker = new google.maps.Marker({
			position: myLatlng, 
			map: map,
			title:"Hello World!"
		}); 
      }
    </script>
  </head>
  <body onload="initialize()">
    <div id="map_canvas" style="width:50%; height:50%"></div>
  </body>
</html>