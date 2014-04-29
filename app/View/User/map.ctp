<div class="row content">	
	<div class="col-md-10">
		<div id="map" style="width:100%; height:650px"></div>
	</div>
</div>

<script type="text/javascript">
var path = [];

$(document).ready(function () {
 	var mapOptions = {
 		center: new google.maps.LatLng( 7.601382, -65.467529),
    zoom: 6,
	  scrollwheel: false,
    navigationControl: false,
  };

  var map = new google.maps.Map(document.getElementById('map'),
    mapOptions);

	line = new google.maps.Polyline({
    strokeColor: '#ff0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

	line.setMap(map);

	google.maps.event.addListener(map, 'click', addNewPoint);
});

function addNewPoint(e) {
  var path = line.getPath();
  path.push(e.latLng);
  console.log(e.latLng);
}
</script>