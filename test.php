<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
        testPM();  
          
          
      }
        
function testPM(){
    //var adds = [];
    
     var adds = [
             [-33.890542, 151.274856],
             [-33.923036, 151.259052],
             [-34.028249, 151.157507],
             [-33.80010128657071, 151.28747820854187],
             [-34.1, 151.2],
             [-34.2, 151.3],
             [-34.3, 151.4],
             [-34.4, 151.5],
             [-34.5, 151.6],
             [-34.6, 151.7],
             [-34.7, 151.8],
             [-34.8, 151.9],
             [-34.9, 152.0],
             [-35.0, 152.1],
             [-35.1, 152.2],
             [-35.2, 152.3],
             [-35.3, 152.4],
             [-35.4, 152.5]

        ];       
        /*adds.push('Pisces Caravan Resort Apollo Bay 3233 Vic');
        adds.push('6150 Great Ocean Rd Apollo Bay 3233 Vic'); 
        adds.push('65 Sunnyside Rd Wongarra 3234');
        adds.push('5 Hawdon Ave Kennett River 3234 Vic'); 
        adds.push('45 Riverside Dr Wye River 3234 Vic');
        adds.push('4-6 Olive St Separation Creek 3234 Vic');
        adds.push('Blanket Bay Rd Cape Otway 3233 Vic'); 
        adds.push('525 Hordern Vale Rd Hordern Vale 3238 Vic');
        adds.push('6 Galbraith Way Marengo 3233 Vic');
        adds.push('15 Newcombe St Marengo 3233 Vic');
        
        adds.push('9 Poplar Street Box Hill Vic 3128');
        adds.push('3 Point Addis Rd Bells Beach 3228 Vic');
        adds.push('192 Mountjoy Parade Lorne 3232 Vic 3131');
        adds.push('78 Bambra Rd Aireys Inlet 3231 Vic');
        adds.push('15 McMahon Ave Anglesea 3230 Vic');
        adds.push('8-10 Durimbil Ave Wye River 3234 Vic');
        adds.push('1-2 Gerard Ave Kennett River 3234 Vic');
        adds.push('14 Joyce St Apollo Bay 3233 Vic');
        adds.push('60 Sunnyside Rd Wongarra 3234 Vic');
        adds.push('19 Ferrier Dr Marengo 3233 Vic'); */       
        for(var i=0; i< adds.length; i++){
            marker = new google.maps.Marker({
            position: new google.maps.LatLng(adds[i][0], adds[i][1]),
            map: map
            });
            console.log('lat: '+adds[i][0]+' lng: '+ adds[i][1])
            //getCoordinates(adds[i]);
            
        }
        
    }
     
function getCoordinates(address){
    var coordinates;
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({address:address}, function(results,status){
        
        console.log('lat: '+results[0].geometry.location.lat() +' lng: '+results[0].geometry.location.lng());
        if (status == google.maps.GeocoderStatus.OK) {

            var markerPos = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
            
            var marker = new google.maps.Marker({
                position: markerPos,
                map: map
            });
        
        } else console.log('unsuccessful!');
        
    });    
      
}        
        
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-z1AKKI962bUQPGTMhaIp9bDfnmZkL-o&callback=initMap"
    async defer></script>
  </body>
</html>