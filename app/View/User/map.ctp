<div class="container">
  <h1 class="titulo">Familia Linguisticas</h1>
  <hr>  
  <div class="row">
    <div class="col-md-12">
      <div id="map" style="width:100%; height:500px"></div>
    </div>  
  </div>
  <p></p>
  <h2 class="titulo">Clasificación Etnias Indigenas Venezolanas</h2>
  <hr>
  <div class="row">

    <!--Karibe-->
    <?php if(count($karibe)):?>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="subtitulo" style="color:black;">
                  Karibe
              </h3>
          </div>
          <ul class="list-group">
            <?php foreach ($karibe as $etnia):?>
              <?php echo $this->Html->link(
                $etnia['Ethnicity']['name'],
                array('controller' => 'ethnicities', 'action' => 'user_preview', $etnia['Ethnicity']['ethnicity_id']),
                array('class' => 'list-group-item etnia', 'id' => 'etnia_'.$etnia['Ethnicity']['ethnicity_id'])
              );?>
            <?php endforeach;?>
          </ul>
        </div>  
      </div>
    <?php endif;?>

    <!--Arawak-->
    <?php if(count($arawak)):?>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="subtitulo" style="color:black;">
                  Arawak
              </h3>
          </div>
          <ul class="list-group">
            <?php foreach ($arawak as $etnia):?>
              <?php echo $this->Html->link(
                $etnia['Ethnicity']['name'],
                array('controller' => 'ethnicities', 'action' => 'user_preview', $etnia['Ethnicity']['ethnicity_id']),
                array('class' => 'list-group-item etnia', 'id' => 'etnia_'.$etnia['Ethnicity']['ethnicity_id'])
              );?>
            <?php endforeach;?>
          </ul>
        </div> 
      </div>
    <?php endif;?>

    <!-- Independientes-->
    <?php if(count($independientes)):?>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="subtitulo" style="color:black;">
                  Independientes
              </h3>
          </div>
          <ul class="list-group">
              <?php foreach ($independientes as $etnia):?>
                <?php echo $this->Html->link(
                  $etnia['Ethnicity']['name'],
                  array('controller' => 'ethnicities', 'action' => 'user_preview', $etnia['Ethnicity']['ethnicity_id']),
                  array('class' => 'list-group-item etnia', 'id' => 'etnia_'.$etnia['Ethnicity']['ethnicity_id'])
                );?>
              <?php endforeach;?>
          </ul>
        </div>
      </div>
    <?php endif;?>
  </div>

  <!---Segunda Fila-->

  <div class="row">
    <!--Chibcha-->
    <?php if(count($chibcha)):?>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="subtitulo" style="color:black;">
                  Chibcha
              </h3>
          </div>
          <ul class="list-group">
              <?php foreach ($chibcha as $etnia):?>
                <?php echo $this->Html->link(
                  $etnia['Ethnicity']['name'],
                  array('controller' => 'ethnicities', 'action' => 'user_preview', $etnia['Ethnicity']['ethnicity_id']),
                  array('class' => 'list-group-item etnia', 'id' => 'etnia_'.$etnia['Ethnicity']['ethnicity_id'])
                );?>
              <?php endforeach;?>
          </ul>
        </div>  
      </div>
    <?php endif;?>

    <!-- Tupi Guarani-->
    <?php if(count($tupi)):?>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="subtitulo" style="color:black;">
                Tupí Guaraní
              </h3>
          </div>
          <ul class="list-group">
              <?php foreach ($tupi as $etnia):?>
                <?php echo $this->Html->link(
                  $etnia['Ethnicity']['name'],
                  array('controller' => 'ethnicities', 'action' => 'user_preview', $etnia['Ethnicity']['ethnicity_id']),
                  array('class' => 'list-group-item etnia', 'id' => 'etnia_'.$etnia['Ethnicity']['ethnicity_id'])
                );?>
              <?php endforeach;?>
          </ul>
        </div> 
      </div>
    <?php endif;?>

    <!-- Guajibo-->
    <?php if(count($guajibo)):?>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="subtitulo" style="color:black;">
                  Guajibo
              </h3>
          </div>
          <ul class="list-group">
              <?php foreach ($guajibo as $etnia):?>
                <?php echo $this->Html->link(
                  $etnia['Ethnicity']['name'],
                  array('controller' => 'ethnicities', 'action' => 'user_preview', $etnia['Ethnicity']['ethnicity_id']),
                  array('class' => 'list-group-item etnia', 'id' => 'etnia_'.$etnia['Ethnicity']['ethnicity_id'])
                );?>
              <?php endforeach;?>
          </ul>
        </div>
      </div>
    <?php endif;?>
  </div>
</div>

<script type="text/javascript">
  var map;
  var polygonsInfo;

  $(document).ready(function () {

    polygonsInfo = new Object ();  

    var mapOptions = {
      center: new google.maps.LatLng( 7.601382, -65.467529),
      zoom: 5,
      scrollwheel: true,
      navigationControl: true,
    };

    map = new google.maps.Map(document.getElementById('map'),
      mapOptions);
    
    $.ajax({
      url: '/AbyaYala/users/draw',
      type: 'POST',
      dataType: 'json',
    })
    .done(function(data) {
      dibujarEtnia(data);
    })
    .fail(function() {
      alert('Error! No se pudo cargar las Etnias Indigenas en el Mapa. Intente mas tarde.');
    })
    
    //Interaccion con la lista del Mapa
    $('.etnia').hover(function() {
      var tmpId = $(this).attr('id');
      idArray = tmpId.split('_');
      var id = parseInt(idArray[idArray.length-1]);

      _.each(polygonsInfo[id], function(index) {
        var center = index.center;
        var marker = index.marker;
        marker.setPosition(center);
        marker.setVisible(true);
      });

      $(this).addClass('active'); 
    }, function() {
      $(this).removeClass('active');
      var tmpId = $(this).attr('id');
      idArray = tmpId.split('_');
      var id = parseInt(idArray[idArray.length-1]);

       _.each(polygonsInfo[id], function(index) {
          var marker = index.marker;
          marker.setVisible(false);
      });
      
    });
  });

/**
 * Funcion que dibuja la Etnia
 * @param  {[type]} data [description]
 */
function dibujarEtnia(data)
{
  _.each(data, function(etnia) {
    if(etnia.Map.latitude && etnia.Map.longitude){
      var regionsLat = etnia.Map.latitude.split('|');
      var regionsLong = etnia.Map.longitude.split('|');
      for (var j = regionsLat.length - 1; j >= 0; j--) {
        var lat = regionsLat[j].split(',');
        var log = regionsLong[j].split(',');
        var url = etnia.Ethnicity.url;
        var bounds = new google.maps.LatLngBounds();

        var coord = [];
        for (var i = 0; i < lat.length ; i++) {
          var x = parseFloat(lat[i]);
          var y = parseFloat(log[i]);
          coord.push(new google.maps.LatLng(x, y));
          bounds.extend(coord[i]);
        };

        polygon = new google.maps.Polygon({
          paths: coord,
          strokeColor: etnia.Map.color,
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: etnia.Map.color,
          fillOpacity: 0.35,
        });

        
        var marker = new MarkerWithLabel({
          position: new google.maps.LatLng(0,0),
          draggable: false,
          raiseOnDrag: false,
          map: map,
          labelContent: etnia.Ethnicity.name,
          labelAnchor: new google.maps.Point(30, 30),
          labelClass: "labels",
          labelStyle: {opacity: 1.0},
          icon: "http://placehold.it/1x1",
          visible: false
        });
        
        polygon.setMap(map);

        if(polygonsInfo[etnia.Ethnicity.ethnicity_id]){
          polygonsInfo[etnia.Ethnicity.ethnicity_id].push(
            {
              center: bounds.getCenter(),
              marker: marker
            }
          );
        }else{
          polygonsInfo[etnia.Ethnicity.ethnicity_id] = [];
          polygonsInfo[etnia.Ethnicity.ethnicity_id].push(
            {
            center: bounds.getCenter(),
            marker: marker
            }
          );
        }
        

        var info = new google.maps.InfoWindow({
          content: "<a href ="+url+">"+etnia.Ethnicity.name+'</a>',
        });

        google.maps.event.addListener(polygon, "mousemove", function(event) {
          marker.setPosition(event.latLng);
          marker.setVisible(true);
          $('#etnia_'+etnia.Ethnicity.ethnicity_id).addClass('active');

        });

        google.maps.event.addListener(polygon, "mouseout", function(event) {
          marker.setVisible(false);
          $('#etnia_'+etnia.Ethnicity.ethnicity_id).removeClass('active');
        });

        google.maps.event.addListener(polygon, "click", function (e) { 
          window.location.href = url;
        });
      }
    }
  });
}

</script>

<style>
 .labels {
     color: red;
     background-color: white;
     font-family: "Lucida Grande", "Arial", sans-serif;
     font-size: 12px;
     font-weight: bold;
     text-align: center;
     width: 65px;     
     border: 2px solid black;
     white-space: nowrap;
}</style>