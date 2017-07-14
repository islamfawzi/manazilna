  <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

  <div id="map" style="width: 500px; height: 400px;"></div>

  <script type="text/javascript">
    var locations = [
      [, 26.7644663,29.3008481, 4],
      
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: new google.maps.LatLng(26.7644663,29.3008481),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(26.7644663, 29.3008481),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('Egypt');
          infowindow.open(map, marker);
        }
      })(marker, i));
    
  </script>
