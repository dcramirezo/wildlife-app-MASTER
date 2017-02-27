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
  
function IPaddressLocator(){

   
       
<?php 
    
    require_once('includes/geoplugin.class.php');

    $geoplugin = new geoPlugin();
    $ip = $_SERVER["REMOTE_ADDR"];
    
    $geoplugin->locate($ip);
    
?>
    
    UserLat = "<?php echo $geoplugin->latitude; ?>" ;
    UserLng = "<?php echo $geoplugin->longitude; ?>" ;
    
    //console.log('َUser IP: ' +ip);
    //console.log(UserLat+ ' '+ UserLng);
    
    
    removeMarkers(filteredMarkers);
    removeMarkers(markers);
    IPlocation = new google.maps.LatLng(UserLat, UserLng);
    
    IPmarker = new google.maps.Marker({
        position: IPlocation,
        id: 'IPLocation',
        map: map
    });
    if(UAmarker){UAmarker.setMap(null);//clears this marker 
    }
    if(CLmarker){CLmarker.setMap(null);//clears this marker
    }
    //console.log(CLmarker.id);
    map.setCenter(IPlocation);
    map.setZoom(10);
    
    
    filterMarkers(UserLat, UserLng);    
    console.log('IP location is done!');

}
     
</script>  
 
  
  
  
  
  
  
  
  
  
  
  
  

    

