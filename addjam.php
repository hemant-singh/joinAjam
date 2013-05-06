
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>JAJ: Be a HOST</title>
    <link href="default.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	
    <script>
function initialize() {
  var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
  var mapOptions = {
    zoom: 4,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

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
  

  
  
	
  var marker;

function placeMarker(location) {
  if ( marker ) {
    marker.setPosition(location);
  } else {
    marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }
}

google.maps.event.addListener(map, 'click', function(event) {
  placeMarker(event.latLng);
   document.getElementById("latitude").value = event.latLng.lat();
   document.getElementById("longitude").value = event.latLng.lng();
});
 
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	
	
	
	


<style>
   #wrapper { position: relative; width:100%; height:100%;}
   #over_map { position: absolute; top: 5%; right: 0%; z-index: 99; width: 25%; height:90%; 
     background: #ffffff; 
	}
	
	#over_map1 { position: absolute; top: 2%; left: 5%; z-index: 99; width: 20%; height:20%; 
       
	}
	
	#over_map2 { position: absolute; bottom: 2%; left: 5%; z-index: 99; width: 20%; height:20%; 
       
	}
	
	#login
{
    box-shadow:
          0 0 2px rgba(0, 0, 0, 0.2), 
          0 1px 1px rgba(0, 0, 0, .2),
          0 3px 0 #fff,
          0 4px 0 rgba(0, 0, 0, .2),
          0 6px 0 #fff, 
          0 7px 0 rgba(0, 0, 0, .2);
}
#login
{
    position: absolute;
    z-index: 0;
	color: #666;
	width:100%;
	height:100%;
}

input {align: center;
text-size: 30px;

}
 
#login:before
{
    content: '';
    position: absolute;
    z-index: -1;
    border: 1px dashed #ccc;
    top: 5px;
    bottom: 5px;
    left: 5px;
    right: 5px;
    -moz-box-shadow: 0 0 0 1px #fff;
    -webkit-box-shadow: 0 0 0 1px #fff;
    box-shadow: 0 0 0 1px #fff;
}
h1
{
    text-shadow: 0 1px 0 rgba(255, 255, 255, .7), 0px 2px 0 rgba(0, 0, 0, .5);
    text-transform: uppercase;
    text-align: center;
    color: #666;
    margin: 0 0 30px 0;
    letter-spacing: 4px;
    font: normal 44px/1 Verdana, Helvetica;
    position: relative;
}

#steps
{
   
    margin: 10px 10px 30px 10px;
    letter-spacing: 1px;
    font: normal 14px/1 Verdana, Helvetica;
    position: relative;
}
 
h1:after, h1:before
{
    background-color: #777;
    content: "";
    height: 1px;
    position: absolute;
    top: 15px;
    width: 120px;  
}
 
h1:after
{
    background-image: -webkit-gradient(linear, left top, right top, from(#777), to(#fff));
    background-image: -webkit-linear-gradient(left, #777, #fff);
    background-image: -moz-linear-gradient(left, #777, #fff);
    background-image: -ms-linear-gradient(left, #777, #fff);
    background-image: -o-linear-gradient(left, #777, #fff);
    background-image: linear-gradient(left, #777, #fff);     
    right: 0;
}
 
h1:before
{
    background-image: -webkit-gradient(linear, right top, left top, from(#777), to(#fff));
    background-image: -webkit-linear-gradient(right, #777, #fff);
    background-image: -moz-linear-gradient(right, #777, #fff);
    background-image: -ms-linear-gradient(right, #777, #fff);
    background-image: -o-linear-gradient(right, #777, #fff);
    background-image: linear-gradient(right, #777, #fff);
    left: 0;
}

 #target {
        width: 345px;
		height: 50px;

		}

		 #form_fields {
        margin-left: 15px;
		
      }
		</style>
	
	
	
  </head>
  <body>
   
  <div id="wrapper">
	 <div id="panel">
      <input id="target" type="text" placeholder="Where do you wanna host? Find it on map">
    </div>
	
   <div id="map-canvas"></div>
	
	
	   <div id="over_map1">
		<img src="images/joinajam.png" height="200px" widht="200px"/>
		</div>
		
		
		<div id="over_map">
		<form id="login" action="addlocation.php" method="get">
		<h1>Host a Jam</h1>
		<div id="steps">
		1. Use the search box on the top to find your locality
		<br/><br/>
		2. Left click on the exact location where you gonna jam
		<br/><br/>
		3. Fill the form below (do not fill latitude longitude, they will fill when you click on the map)
		</div>
		<div id="form_fields">
        <input name="name" type="text"  placeholder="Give Your Jam a Name" size="30" autofocus required>  <br/><br/>
        <input name="date" type="date" placeholder="Date?" required><br/><br/>
		What time? <input name="time" type="time" placeholder="time?" required><br/><br/>
		<textarea name="desc" rows="5" column="40" placeholder="Details" ></textarea><br/><br/>
		
		<input name="instruments" type="text" placeholder="What all instruments you have" required><br/><br/>
		<input name="mobile" type="text" placeholder="Your mobile number" required><br/><br/>
		Don't fill these below, these are latitude and longitude of your location. If they are empty it means
		you havn't marked your place on map.<br/>
		<input id="latitude" name="latitude" type="text" placeholder="Latitude" required>
		<input id="longitude" name="longitude" type="text" placeholder="Longitude" required><br/><br/>
		
		
		
        <input type="submit" id="submit" value="Submit">
      </div>
		
		</form>
		
		
		</div>
		
		<div id="over_map2">
		
		</div>
   </div>
	
	
  </body>
</html>
