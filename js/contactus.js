var myCenter = new google.maps.LatLng(28.535545, 77.207110);
function initialize() {
  var mapCanvas = document.getElementById('map-canvas');
  var mapOptions = {
    center:myCenter,
    zoom: 17,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker=new google.maps.Marker({
    position:myCenter,
  });
  marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
