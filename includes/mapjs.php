<script type="text/javascript">
    
    
    
var map;
var currentLocation;
var CLmarker // golabal marker for Current Location
var UAmarker // golabal marker for User Address
var IPmarker // golabal marker for User Address that obtains from User IP address

//var filteredMa = [];
var centersDetails = []; // keeps all centers details
var markers =[];  // keeps all markers
var filteredMarkers = []; // keeps filtered markers based on the user location

var ifShowPosWorks = 0; // If showPosition func works, this var will be set to 1


// Defining Centers' icons ***************
var vet_grey = 'img/keys/vet-icon-grey.png';
var vet_org  = 'img/keys/vet-icon-orange.png';
var vet_pink = 'img/keys/vet-icon-pink.png';
var vet_aqua = 'img/keys/vet-icon-aqua.png';
var vet_red  = 'img/keys/vet-icon-red.png';
var vet_blue = 'img/keys/vet-icon-blue.png';

var rehab_grey = 'img/keys/wildliferehab-grey.png';
var rehab_org  = 'img/keys/wildliferehab-orange.png';
var rehab_pink = 'img/keys/wildliferehab-pink.png';
var rehab_aqua = 'img/keys/wildliferehab-aqua.png';
var rehab_red  = 'img/keys/wildliferehab-red.png';
var rehab_blue = 'img/keys/wildliferehab-blue.png';
// End of defining Centers' icons ********


function initMap() {
      
    map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {lat: -37.5, lng: 143.54},
        zoom: 8,
        draggable: true ,
        mapTypeControl: true,
          mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
              position: google.maps.ControlPosition.TOP_LEFT
          },
          zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.TOP_LEFT
          },
          streetViewControl: true,
          streetViewControlOptions: {
              position: google.maps.ControlPosition.TOP_LEFT
          }
    });
    
        var AustraliaBounds = new google.maps.LatLngBounds(new google.maps.LatLng(-43.867240, 110.577865), new google.maps.LatLng(-10.940201, 153.730149));
    
        var boundOptions ={
            bounds: AustraliaBounds
        };
        // Create the search box and link it to the UI element.
        var input = document.getElementById('Pcode');
    
        //var autocomplete = new google.maps.places.Autocomplete(input, boundOptions);
        var CountryOpt = {
            componentRestrictions: {country: 'au'}
        };    
    
        //var searchBox = new google.maps.places.SearchBox(input);
    
        var searchBox = new google.maps.places.Autocomplete(input, CountryOpt);
        

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            
            //console.log('places changed Ya GHAAEME al MOHAMMAD');
                            
            var places = searchBox.getPlaces();
           
            //searchBox.setBounds(AustraliaBounds);

            if (places.length == 0) {return;}
            
            if(CLmarker){CLmarker.setMap(null); //clears this marker
            }
            if(IPmarker){IPmarker.setMap(null); //clears this marker
            }
            CLmarker = IPmarker = '';
            
            var userAddress = new google.maps.LatLng(places[0].geometry.location.lat(), places[0].geometry.location.lng());
            
            
            UAmarker = new google.maps.Marker({
                position: userAddress,
                id: 'UserAddress',
                map: map
            });            
            
            map.setCenter(userAddress);
            map.setZoom(10);
           
            
            //centersDetails = []; //empty this array
            //console.log('panel should be emptied now');
            //$(".centersContent").append("");
          filterMarkers(places[0].geometry.location.lat(), places[0].geometry.location.lng());
            
            $('#mapModal, #LocationBox').hide();
        });
} 

function resizeMap(){
    google.maps.event.trigger(map,'resize');
}

// This function is used only when the app sits on the DELWP Host which is based on HTTPS protocol
function showPosition(position){
    
    //ifShowPosWorks = 1;
    
    removeMarkers(filteredMarkers);
    removeMarkers(markers);
    currentLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    
    CLmarker = new google.maps.Marker({
        position: currentLocation,
        id: 'currnetLocation',
        map: map
    });
    if(UAmarker){UAmarker.setMap(null);//clears this marker
    }
    if(IPmarker){IPmarker.setMap(null);//clears this marker
    }
    //console.log(CLmarker.id);
    map.setCenter(currentLocation);
    map.setZoom(10);
    
    
    filterMarkers(position.coords.latitude, position.coords.longitude);
    
}

/*function setMarker(location){
    var marker = new google.maps.Marker({
        position: currentLocation,
        map: map
    });
}*/

function getCoordinates(address){
    var coordinates;
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({address:address}, function(results,status){
         
        console.log('lat: '+results[0].geometry.location.lat() +' ' +results[0].geometry.location.lng());
        if (status == google.maps.GeocoderStatus.OK) {
           
            
            var markerPos = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
            
            var marker = new google.maps.Marker({
                position: markerPos,
                map: map
            });
            //setMarker(marker);            
        
        } else console.log('unsuccessful!');
        
    });    
        //return coordinates
        //console.log('coordinates is empty!');
    
}

function iconIdentifier(centerSpec){
    var iconURL;
    switch (centerSpec) { 
        case 'vet_grey': 
            iconURL = vet_grey;
            break;
        case 'vet_org': 
            iconURL = vet_org;
            break;
        case 'vet_pink': 
            iconURL = vet_pink;
            break;		
        case 'vet_aqua': 
            iconURL = vet_aqua;
            break;
        case 'vet_red': 
            iconURL = vet_red;
            break;
        case 'vet_blue': 
            iconURL = vet_blue;
            break;
        case 'rehab_grey': 
            iconURL = rehab_grey;
            break;
        case 'rehab_org': 
            iconURL = rehab_org;
            break;
        case 'rehab_pink': 
            iconURL = rehab_pink;
            break;		
        case 'rehab_aqua': 
            iconURL = rehab_aqua;
            break;
        case 'rehab_red': 
            iconURL = rehab_red;
            break;
        case 'rehab_blue': 
            iconURL = rehab_blue;
            break;
        default:
            console.log('The marker s icon, cannot be found!');
    }
    return iconURL
}

  
    
    
    /* This function plots all available markers */
function plotMarkers(){
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
                    orgName: val.org_name,
                    contactPerson: val.contact_person,
                    address: val.address,
                    phone: val.phone,
                    mobile: val.mobile,
                    website: val.website,
                    icon: icon,
                    map: map
                });
                
                markers.push(marker); // keep all markers here
                
                google.maps.event.addListener(marker, 'click', function() {
                    //console.log('Organisation Name: '+ this.contactPerson +' Contact Person: '+this.orgName);
                    
                    makeShelterPage(this.icon.url,this.orgName);
                    
                    $('.firstAidOrDead, .keys, .centers').hide();
                    $('.shelter').show();
                    $('.panel').show();
                    $( '.panel' ).animate({right: 0}, 700);
                    setFooterHeight($('.shelterFooter').height());

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
            if(markers){ 
                removeMarkers(markers); 
                markers = [];
            };
            if(filteredMarkers){    
                removeMarkers(filteredMarkers); 
                filteredMarkers = [];
            };
            $(".centersContent").empty();
            
            // Above 4 lines can be commented!
            var res = $.parseJSON(data);
            centersDetails = [];
            $(".centersContent").empty();
            
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
                    orgName: val.org_name,
                    contactPerson: val.contact_person,
                    address: val.address,
                    phone: val.phone,
                    mobile: val.mobile,
                    website: val.website,
                    map: map
                });
               // create centers panel 
                appendListOfClosestCentersToPanel(val.user_id, iconUrl,val.org_name, val.mobile)
                
                filteredMarkers.push(marker);
                
                google.maps.event.addListener(marker, 'click', function() {
                    //console.log('Organisation Name: '+ this.contactPerson +' Contact Person: '+this.orgName);
                    
                    makeShelterPage(this.icon.url,this.orgName);
                    
                    $('.firstAidOrDead, .keys, .centers').hide();
                    $('.shelter').show();
                    $('.panel').show();
                    $( '.panel' ).animate({right: 0}, 700);
                    setFooterHeight(56);
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
    
    //gets ip address
    //$.getJSON('http://jsonip.com/?callback=?', function(r){ console.log(r.ip); });
    
    
    //$geoplugin->locate($ip);
    $geoplugin->locate('14.201.3.11');
    
?>
    
    UserLat = "<?php echo $geoplugin->latitude; ?>" ;
    UserLng = "<?php echo $geoplugin->longitude; ?>" ;
    
    //console.log('َUser IP: ' +ip);
    //console.log(UserLat+ ' '+ UserLng);
    
    if(filteredMarkers){
        removeMarkers(filteredMarkers);
        filteredMarkers = [];
    }
    
    if(markers){
        removeMarkers(markers);
         markers = [];
    }
    
    
    
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
    UAmarker = CLmarker = null;
    //console.log(CLmarker.id);
    
    filterMarkers(UserLat, UserLng);
    
    map.setCenter(IPlocation);
    map.setZoom(10);
        

}
     
</script>  
 
  
  
  
  
  
  
  
  
  
  
  
  

    

