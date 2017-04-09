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
var org_group       = 'img/keys/wildlife-organisations.png';
var rehab_center_1  = 'img/keys/pin-1.png';
var rehab_center_2  = 'img/keys/pin-2.png';
var rehab_center_3  = 'img/keys/pin-3.png';
var rehab_center_4  = 'img/keys/pin-4.png';
var rehab_center_5  = 'img/keys/pin-5+.png';

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
    
        
        var input = document.getElementById('Pcode');
    
        //var autocomplete = new google.maps.places.Autocomplete(input, boundOptions);
        var CountryOpt = {
            componentRestrictions: {country: 'au'}
        };    
    
        //var searchBox = new google.maps.places.SearchBox(input);
    
        var searchBox = new google.maps.places.Autocomplete(input, CountryOpt);
        

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('place_changed', function() {
            
            //console.log('places changed Ya GHAAEME al MOHAMMAD');
                            
            var places = searchBox.getPlace();
            
            //searchBox.setBounds(AustraliaBounds);
            //console.log(places.geometry.location.lat());

            if (places.length == 0) { return;}
            
            if(CLmarker){CLmarker.setMap(null); //clears this marker
            }
            if(IPmarker){IPmarker.setMap(null); //clears this marker
            }
            if(UAmarker){UAmarker.setMap(null); //clears this marker
            }
            CLmarker = IPmarker = UAmarker = '';
            
            //var userAddress = new google.maps.LatLng(places[0].geometry.location.lat(), places[0].geometry.location.lng());
            var userAddress = new google.maps.LatLng(places.geometry.location.lat(), places.geometry.location.lng());
            
            
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
           //filterMarkers(places[0].geometry.location.lat(), places[0].geometry.location.lng());
           filterMarkers(places.geometry.location.lat(), places.geometry.location.lng());
            
            $('#mapModal, #LocationBox, .firstAidOrDead, .keys, .shelter').hide();
            //show the centers in the panel by default
            $('.panel, #blackLayer, .centers').show();
            $( '.panel' ).animate({right: 0}, 700);
            setFooterHeight($('.shelterFooter').height());
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

//It returns Latitude and longitude of the address that passed to it.
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
        case 'org_group': 
            iconURL = org_group;
            break;
        case 'rehab_center': 
            iconURL = rehab_center_1;
            break;
        default:
            console.log('The marker`s icon, cannot be found!');
    }
    return iconURL
}

  
    
    
    /* This function plots markers of all Shelters when user navigates to the Map page*/
function plotMarkers(){
     
    $.ajax({
        type: 'POST',
        url: 'includes/allMarkers.php',
        success: function(data) {
            if(filteredMarkers){ removeMarkers(filteredMarkers); };
            filteredMarkers = [];
            
            // counter for number of Centers
            var CentersCounter = 0;
            // emthy the sliding panel from previousely added Wildlife Centers list to add a new list
            $(".centersContent").empty();
            
            var results = $.parseJSON(data);
            centersDetails = [];
            
            var listOfSuburbsArray =[];
            var suburbCounter =0;
            
            $.each(results, function(key, val){
                centersDetails.push(val);
                
                
                listOfSuburbsArray.push(val.suburb);

                //count the number of occurrence for the suburb name and then plot the proper marker based on that
                $.each(listOfSuburbsArray, function(key,value) {
                    if(value == val.suburb){
                        suburbCounter++ ;
                    }
                });  
                
                if(suburbCounter == 1){
                    
                    iconUrl = iconIdentifier(val.spec);
                    var icon = {url: iconUrl, scaledSize: new google.maps.Size(35, 45)  }  
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                    
                }else if(suburbCounter == 2){
                    //remove previous marker
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-2.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }else if(suburbCounter == 3){
                    //remove previous marker                    
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-3.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }else if(suburbCounter == 4){
                    //remove previous marker
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-4.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }else if(suburbCounter == 5){
                    //remove previous marker
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-5.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }else if(suburbCounter > 5){
                    //remove previous marker
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-5+.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }
                 
                suburbCounter = 0;                
                
                /*
                iconUrl = iconIdentifier(val.spec);
                var icon = {
                    url: iconUrl,
                    scaledSize: new google.maps.Size(30, 30), // scaled size
                }
                
                //console.log('suburb: '+val.suburb);
                
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(val.lat, val.lng),
                    orgName: val.org_name,
                    contactPerson: val.contact_person,
                    address: val.address,
                    postcode:val.postcode,
                    suburb:val.suburb,
                    phone: val.phone,
                    mobile: val.mobile,
                    website: val.website,
                    icon: icon,
                    map: map,
                    spec: val.spec,
                    distance: val.distance,
                    id: val.suburb
                });
                */
                
                
                
                markers.push(marker); // keep all markers here
                
                google.maps.event.addListener(marker, 'click', function() {
                    //console.log('Organisation Name: '+ this.contactPerson +' Contact Person: '+this.orgName);
                    
                    makeShelterPage(this.icon.url,this.orgName, this.suburb);
                    
                    $('.firstAidOrDead, .keys, .centers').hide();
                    $('.shelter, .panel, #blackLayer').show();
                    $( '.panel' ).animate({right: 0}, 700);
                    setFooterHeight($('.shelterFooter').height());

                });
                
                // append a list of 20 Wildlife Centers to the sliding panel by defualt
                if(CentersCounter<21){
                    CentersCounter++;
                     appendListOfClosestCentersToPanel(val.user_id, iconUrl,val.org_name, val.mobile,val.suburb);
                };
                
                
            });
            // here I need to plot markers for each suburb
            
            
        },
        error: function(){
            console.log('Wildlife Centers Addresses cannot be found.');
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
            // emthy the sliding panel from previousely added Wildlife Centers list to add a new list 
            $(".centersContent").empty();
            
            // Above 4 lines can be commented!
            var res = $.parseJSON(data);
            centersDetails = [];
            
            var listOfSuburbsArray =[];
            var suburbCounter =0;
            $.each(res, function(key, val){
                centersDetails.push(val);
                //console.log(val.distance); 

               
                listOfSuburbsArray.push(val.suburb);

                //count the number of occurrence for the suburb name and then plot the proper marker based on that
                $.each(listOfSuburbsArray, function(key,value) {
                    if(value == val.suburb){
                        suburbCounter++ ;
                    }
                });  
                
                if(suburbCounter == 1){
                    
                    iconUrl = iconIdentifier(val.spec);
                    var icon = {url: iconUrl, scaledSize: new google.maps.Size(35, 45)  }  
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                    
                }else if(suburbCounter == 2){
                    //remove previous marker
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-2.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }else if(suburbCounter == 3){
                    //remove previous marker                    
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-3.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }else if(suburbCounter == 4){
                    //remove previous marker
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-4.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }else if(suburbCounter == 5){
                    //remove previous marker
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-5.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }else if(suburbCounter > 5){
                    //remove previous marker
                    var temp_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng)
                    });
                    temp_marker.setMap(null);
                    
                    var icon = {url: 'img/keys/pin-5+.png',
                        scaledSize: new google.maps.Size(35, 45)   }
                    //plot Marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                        icon: icon,
                        orgName: val.org_name,
                        contactPerson: val.contact_person,
                        address: val.address,
                        postcode:val.postcode,
                        suburb:val.suburb,
                        phone: val.phone,
                        mobile: val.mobile,
                        website: val.website,
                        map: map,
                        spec: val.spec,
                        distance: val.distance,
                        id: val.suburb
                    });
                }
                 
                suburbCounter = 0;
                
                
                
                /*
                iconUrl = iconIdentifier(val.spec);
                var icon = {
                    url: iconUrl,
                    scaledSize: new google.maps.Size(30, 30)
                }

                
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(val.suburb_lat, val.suburb_lng),
                    icon: icon,
                    orgName: val.org_name,
                    contactPerson: val.contact_person,
                    address: val.address,
                    postcode:val.postcode,
                    suburb:val.suburb,
                    phone: val.phone,
                    mobile: val.mobile,
                    website: val.website,
                    map: map,
                    spec: val.spec,
                    distance: val.distance,
                    id: val.suburb
                });
                
                */
               // create centers panel 

               //console.log('distance: '+Math.round( val.distance * 100 )/100  );
                appendListOfClosestCentersToPanel(val.user_id, iconUrl,val.org_name, val.mobile,val.suburb);
                
                filteredMarkers.push(marker);
                
                google.maps.event.addListener(marker, 'click', function() {
                    makeShelterPage(this.icon.url,this.orgName,this.suburb);
                    
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
 
  
  
  
  
  
  
  
  
  
  
  
  

    

