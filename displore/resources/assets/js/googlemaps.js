export class GoogleMaps {

  // Show Map (sets lat en long)
  showMap() {
    var setLatitude = 50.80;
    var setLongitude = 4.20;
    var setLatLong;

    var geocoder = new google.maps.Geocoder();
    var address = document.getElementById("location").innerHTML;
    
    geocoder.geocode( { 'address': address}, function(results, status) {
    
    if (status == google.maps.GeocoderStatus.OK) {
        setLatitude = results[0].geometry.location.lat();
        setLongitude = results[0].geometry.location.lng();

        setLatLong = {lat: setLatitude, lng: setLongitude};

        } 
        
        var mapProp= {
          center:new google.maps.LatLng(setLatLong),
          zoom: 16,
        };
        var map=new google.maps.Map(document.getElementById("showMap"),mapProp);

        var marker = new google.maps.Marker({
          position: setLatLong,
          map: map,
        });
    }); 
  }
  // End Show Map

  // Init Map
   initMap() {
    var setLatitude = 50.80;
    var setLongitude = 4.20;
    
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: setLatitude, lng: setLongitude},
      zoom: 7
    });
    
    var input = document.getElementById('pac-input');
  
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
  
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  
    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);
    var marker = new google.maps.Marker({
      map: map
    });
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });
  
    autocomplete.addListener('place_changed', function() {
      infowindow.close();
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        return;
      }
  
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
      }
  
      // Set the position of the marker using the place ID and location.
      marker.setPlace({
        placeId: place.place_id,
        location: place.geometry.location
      });
      marker.setVisible(true);
  
      infowindowContent.children['place-name'].textContent = place.name;
      infowindowContent.children['place-id'].textContent = place.place_id;
      infowindowContent.children['place-address'].textContent = place.formatted_address;
      infowindow.open(map, marker);
    });
  }
}
// End Init Map


