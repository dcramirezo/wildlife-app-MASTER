<script type="text/javascript">
    /* This function plots all available markers */
function plotMarkers(listOfMarkers){
     // delete current markers
    $.ajax({
        type: 'POST',
        url: 'includes/allMarkers.php',
        success: function(data) {
            if(filteredMarkers){ removeMarkers(filteredMarkers); };
            filteredMarkers = [];
            
            var results = $.parseJSON(data);
            centersDetails = [];
            $.each(results, function(key, val){
                centersDetails.push(val);

                iconUrl = iconIdentifier(val.spec);
                var icon = {
                    url: iconUrl,
                    scaledSize: new google.maps.Size(30, 30), // scaled size
                }

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(val.lat, val.lng),
                    icon: icon,
                    map: map
                });
                
                markers.push(marker); // keep all markers here
                
                google.maps.event.addListener(marker, 'click', function() {
                    console.log(this.position.lat()+' '+this.position.lng());

                });

            });
        },
        error: function(){
            console.log('Addresses of Wildlife Centers cannot be found.');
        }
    });


}

/* This function shows markers around user address/location */
function filterMarkers(lat, lng){

    $.ajax({
        type: 'POST',
        url: 'includes/filterMarkers.php',
        data:{
            lat: lat,   
            lng: lng    
        },
        success: function(data) {
            if(markers){ removeMarkers(markers); };
            if(filteredMarkers){ removeMarkers(filteredMarkers); };
            markers = [];
            filteredMarkers = [];
            var res = $.parseJSON(data);
            centersDetails = [];
            $.each(res, function(key, val){
                centersDetails.push(val);
                //console.log(val.distance); 
                            
                iconUrl = iconIdentifier(val.spec);
                var icon = {
                    url: iconUrl,
                    scaledSize: new google.maps.Size(30, 30), // scaled size
                }

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(val.lat, val.lng),
                    icon: icon,
                    map: map
                });
                
                filteredMarkers.push(marker);
                
                google.maps.event.addListener(marker, 'click', function() {
                    console.log(this.position.lat()+' '+this.position.lng());

                });                
                
                
            });
            

        },
        error: function(){
            console.log('Cannot retrieve wildlife centers around the provided location.');
        }
    });


}
    
function removeMarkers(m){
    for(i=0; i< m.length; i++){
        m[i].setMap(null);
    }
}
     
</script>  
 
  
  
  
  
  
  
  
  
  
  
  
  

    

