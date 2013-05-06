<?php

require_once('lib/DBLib.php');
$data=getAllDataFromDB();
//var_dump($data);
$number_of_rows=count($data[1]);
//echo $data[2][1];
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marker animations with <code>setTimeout()</code></title>
    <link href="default.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script>
var berlin = new google.maps.LatLng(52.520816, 13.410186);

var neighborhoods = [
//Here insertion of lat lng by php
<?php
$i=0;
for($i=0;$i<$number_of_rows;$i++)
echo "new google.maps.LatLng(".$data[1][$i].",".$data[2][$i]."),";
?>



  new google.maps.LatLng(52.511467, 13.447179),
  new google.maps.LatLng(52.549061, 13.422975),
  new google.maps.LatLng(52.497622, 13.396110),
  new google.maps.LatLng(52.517683, 13.394393)
];




var markers = new Array();
var iterator = 0;

var map;

function initialize() {
  var mapOptions = {
    zoom: 12,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: berlin
  };

  
  
  
  
  
  map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

		  
////////////////////////////
 var input = /** @type {HTMLInputElement} */(document.getElementById('target'));
  var searchBox = new google.maps.places.SearchBox(input);
  var markers = [];

  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    markers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

      markers.push(marker);
		
      bounds.extend(place.geometry.location);
	 
    }

    map.fitBounds(bounds);
	 map.setZoom(16);
  });

  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
	 
  });
  /////////////////////////////////////////		  
		  
		  
		  
		  
  for (var i = 0; i < neighborhoods.length; i++) {
    markers[iterator]=new google.maps.Marker({
    position: neighborhoods[iterator],
    map: map,
    draggable: false,
    animation: google.maps.Animation.DROP
  });  

  iterator++;  
  
}


	  
    

 


  }


function toggleBounce() {

  if (markers.getAnimation() != null) {
    markers.setAnimation(null);
  } else {
    markers.setAnimation(google.maps.Animation.BOUNCE);
  }
}


google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	
	
	<style>
	#target {
        width: 345px;
		height: 50px;
		font-size:30px;

		}
		
		 #wrapper { position: relative; width:100%; height:100%;}
   #over_map { position: absolute; top: 5%; right: 0%; z-index: 99; width: 25%; height:90%; 
     background: #ffffff; 
	}
	
	#over_map1 { position: absolute; top: 2%; left: 5%; z-index: 99; width: 20%; height:20%; 
       
	}
	
	#over_map2 { position: absolute; bottom: 2%; left: 5%; z-index: 99; width: 20%; height:20%; 
       
	}
	</style>
  </head>
  <body>
   <div id="wrapper">
   <div id="panel">
      <input id="target" type="text" placeholder=" Type your location here!!">
    </div>
   <div id="over_map1">
		<img src="images/joinajam.png" height="200px" widht="200px"/>
		</div>
  
   
    <div id="map-canvas"></div>
	<div id="over_map2">
		
		</div>
   </div>
  </body>
</html>