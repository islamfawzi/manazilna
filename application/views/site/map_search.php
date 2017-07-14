<style type="text/css">
	html, body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}
#map {
    position: relative;
    margin: auto;
    width: 1000px;
    height: 500px;
}
</style>

<!-- Start Content Section -->
         <section id="content-section">

              <div class="container">

                
                      <h4 class="Property-name"> Map Search </h4>                                                                      
                      <div id="map"></div>
				

              </div>
         </section>
      <!-- end Content Section -->

      <!--/left Side -->
		    <script>
		        initMap();
		        function initMap() {

		        	var locations = <?= $properties_json ?>;
		        	
		            /*var locations = [
				      ['Egypt', 26.7644663,29.3008481, 4],
				      ['USA', 25.7644663,30.4448481, 5],
				      ['Canda', 24.7644663,31.5288481, 3],
				      ['UAE', 23.7644663,32.6328481, 2],
				      ['UK', 22.7644663,33.74168481, 1]
				    ];*/

		            

		            var map = new google.maps.Map(document.getElementById('map'), {
				      zoom: 5,
				      center: new google.maps.LatLng(26.7644663,29.3008481),
				      mapTypeId: google.maps.MapTypeId.ROADMAP
				    });

		            var infowindow = new google.maps.InfoWindow();

				    var marker, i;

				    for (i = 0; i < locations.length; i++) {  
				      marker = new google.maps.Marker({
				        position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
				        map: map
				      });

				      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
				        return function() {
				        	var url = "<a target='_blank' href='<?= base_url('properties') ?>/"+locations[i].id+"/"+locations[i].title+"' >" + locations[i].title + "</a>";
				        	
				          infowindow.setContent(url);
				          infowindow.open(map, marker);
				        }
				      })(marker, i));
				    }

		            
		            
		        }
		    </script>

		    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDot9ATzfds0wMb7mrzNxmJ15-tDqX6-30&callback=initMap"></script>