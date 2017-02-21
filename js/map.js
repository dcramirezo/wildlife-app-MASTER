var map;
var currentLocation;


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
        center: {lat: -36.8152554, lng: 143.8},
        zoom: 8,
        draggable: true
    });
    console.log('map initialized!');

} 


function resizeMap(){
    google.maps.event.trigger(map,'resize');
}
function showPosition(position){
    currentLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    
    var marker = new google.maps.Marker({
        position: currentLocation,
        map: map
    });
}

function setMarker(location){
    var marker = new google.maps.Marker({
        position: currentLocation,
        map: map
    });
}

function getCoordinates(address){
    var coordinates;
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({address:address}, function(results,status){
         //console.log(results[0].geometry.location.lat(),results[0].geometry.location.lng());
        console.log('lat: '+results[0].geometry.location.lat() +' ' +results[0].geometry.location.lng());
        if (status == google.maps.GeocoderStatus.OK) {
           
            //coordinates = results[0].geometry.location.lat();
            //coordinates.push(results[0].geometry.location.lat() );          //coordinates.push(results[0].geometry.location.lng() );
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





/*<?php    @mysql_connect("$db_host","$db_username","$db_password") or die("Could not connect to MYSQL");
    @mysql_select_db("$db_name") or die("No database");


    $sql = "SELECT * FROM organisations";
    $query = mysql_query($sql);
    //$row = mysql_fetch_object($query);

    while($row = mysql_fetch_object($query)) {
?>
<script>
    console.log("<?php echo $row->org_name . '<br>'; ?> ");
</script>
<?php        
    }
 ?>
 */


/*require([
  "esri/Map",
  "esri/views/MapView",
  "dojo/domReady!"
], function(Map, MapView) {
  var map = new Map({
    basemap: "streets"
  });

  var view = new MapView({
    container: "mapDiv",  // Reference to the DOM node that will contain the view
    map: map               // References the map object created in step 3
  });
});


var map;
require(["esri/map", "dojo/domReady!"], function(Map) {
  map = new Map("mapDiv", {
    basemap: "topo",
    center: [145.45,-37],
    zoom: 8
  
  });
});

*/


/* global flag for setting all layers on/off */
/* allLayersOnOff = 0  means layers off by default */
 
/*
var allLayersOnOff = 0;
 
require([
	"esri/map", 
	
	"esri/dijit/Popup", 
	"esri/dijit/PopupTemplate",
	
	"esri/dijit/BasemapGallery",
	"esri/layers/FeatureLayer",
	"esri/symbols/SimpleFillSymbol", 
	"esri/Color",
	"dojo/dom-class", 
	"dojo/dom-construct", 
	"esri/dijit/HomeButton",
	"esri/renderers/SimpleRenderer",
	"esri/symbols/PictureMarkerSymbol" ,	
	"esri/dijit/Search",

	"dojo/on", 
	"dojo/dom", 
	"dojo/domReady!"
	], 
	function(Map, Popup, PopupTemplate, BasemapGallery, FeatureLayer, SimpleFillSymbol, 
			Color, domClass, domConstruct, HomeButton, SimpleRenderer, 
			PictureMarkerSymbol, Search, on, dom ) {

        //The popup is the default info window so you only need to create the popup and 
        //assign it to the map if you want to change default properties. Here we are 
        //noting that the specified title content should display in the header bar 
        //and providing our own selection symbol for polygons.
        var fill = new SimpleFillSymbol("solid", null, new Color("#A4CE67"));
        var popup = new Popup({
            fillSymbol: fill,
            titleInBody: false
        }, domConstruct.create("div"));
        //Add the dark theme which is customized further in the <style> tag at the top of this page
        domClass.add(popup.domNode, "dark");

        var template = new PopupTemplate({
          title: "Burn Details",
          description: 
		  "Contact Person: {f1}  <br /> Address: {f2} <br /> City: {f3}  <br /> Post Code: {f4} <br /> State: {f5}  <br /> Tel: {f6}"
        }); 
*/		
		/* Set markers for different layers */
		
		/* Safe icon marker*/
		
/*
        var Safemarker = new PictureMarkerSymbol('img/keys/vet-icon-aqua.png', 30, 30);
		var SafeRenderer = new SimpleRenderer(Safemarker);
	
			
		// Create map
		var map = new Map("mapDiv",{ 
		  basemap: "national-geographic",
		  center: [143.3,-38.2],
		  zoom: 9,
		  logo: false,
		  infoWindow: popup
		});

*/		
		/* Search option*/
/*
        var search = new Search({
           map: map
        }, "Pcode");
        search.startup();	
*/
		/* Search option for mobile/tablet */
/*
        var searchM = new Search({
           map: map
        }, "srch-term-m");
        searchM.startup();		
		
*/		
		
		/* Home button */
/*
		var home = new HomeButton({
			map: map
		  }, "defaultMap");
		 home.startup();		
		
		// Create and add the maps from ArcGIS.com 
		var basemapGallery = new BasemapGallery({
		  showArcGISBasemaps: true,
		  map: map
		}, "basemapGallery");
		basemapGallery.startup();
		

		// Listens to the basemap selection and set the title
		on(basemapGallery, "onSelectionChange", function() {
		  dom.byId("userMessage").innerHTML = basemapGallery.getSelected().title;
		});
	
	
		// Safe layer
		var safeLayer = new 
       //FeatureLayer("https://www.arcgis.com/sharing/rest/content/items/9464a543ea4846cfadbe0a561c02b576/data",{ 
        FeatureLayer("http://services6.arcgis.com/GB33F62SbDxJjwEL/ArcGIS/rest/services/KG9la/FeatureServer/0", {
			outFields: ["*"],
			infoTemplate: template,
			visible:true} );
		
       // safeLayer.setDefinitionExpression("STATE_NAME = 'South Carolina'");
    
        safeLayer.setRenderer(SafeRenderer);
		map.addLayer(safeLayer);
	   
        
    
    
		// Turn all layers on/off - Select all button
		$("#selectAll").on("click", function(){
			if (allLayersOnOff == 0){
				// checkboxes on
				
				
				$("#last5yearsFireHistory").trigger("click");
				$( "#past-burns" ).trigger("click");
				$( "#bushfire" ).trigger("click");
				
				$( "#inProgress" ).trigger("click");
				$( "#nxt24" ).trigger("click");
				$( "#w10Days" ).trigger("click");
				$( "#patrol" ).trigger("click");
				$( "#burnBoundary" ).trigger("click");
				$( "#depiFireDes" ).trigger("click");
				$( "#publicSafetyZone" ).trigger("click"); // the red lines on the map
				
				$( "#burns16_17" ).trigger("click");
				$( "#burns17_18" ).trigger("click");
				$( "#burns18_19" ).trigger("click");
				// layers on
				//past-burnsLayer.show();
				//bushfireLayer.show();
				
				last5yearsFireHistoryLayer.show();
				inProgressLayer.show();
				nxt24Layer.show();
				within10DaysLayer.show();
				patrolLayer.show();
				burnBoundaryLayer.show();
				fireDistrictsLayer.show();
				publicSafetyZoneLayer.show();
				
				//burns16_17Layer.show();
				//burns17_18Layer.show();
				//burns18_19Layer.show();
				allLayersOnOff = 1;
			} else if (allLayersOnOff == 1){
				// checkboxes on
				$("#last5yearsFireHistory").trigger("click");
				$("#past-burns").trigger("click");
				$( "#bushfire" ).trigger("click");
				
				$( "#inProgress" ).trigger("click");
				$( "#nxt24" ).trigger("click");
				$( "#w10Days" ).trigger("click");
				$( "#patrol" ).trigger("click");
				$( "#burnBoundary" ).trigger("click");
				$( "#depiFireDes" ).trigger("click");
				$( "#publicSafetyZone" ).trigger("click");
				
				$( "#burns16_17" ).trigger("click");
				$( "#burns17_18" ).trigger("click");
				$( "#burns18_19" ).trigger("click");
				// layers on
				//past-burnsLayer.hide();
				//bushfireLayer.hide();
				
				last5yearsFireHistoryLayer.hide();
				inProgressLayer.hide();
				nxt24Layer.hide();
				within10DaysLayer.hide();
				patrolLayer.hide();
				burnBoundaryLayer.hide();
				fireDistrictsLayer.hide();
				publicSafetyZoneLayer.hide();
				
				//burns16_17Layer.hide();
				//burns17_18Layer.hide();
				//burns18_19Layer.hide();
				allLayersOnOff = 0;
			}

		});

		
		// Show/hide layers when checkboxes are clicked
		$("#last5yearsFireHistory").on("click", function(){
			if(last5yearsFireHistory.checked) {
				last5yearsFireHistoryLayer.show();
			} else {
				 inProgressLayerLayer.hide();
			}
		});
		
		$("#inProgress").on("click", function(){
			if(inProgress.checked) {
				inProgressLayer.show();
			} else {
				 inProgressLayer.hide();
			}
		});

		$("#nxt24").on("click", function(){
			if(nxt24.checked) {
				nxt24Layer.show();
			} else {
				nxt24Layer.hide();
			}
		});
		
		$("#w10Days").on("click", function(){
			if(w10Days.checked) {
				within10DaysLayer.show();
			} else {
				 within10DaysLayer.hide();
			}
		});

		$("#patrol").on("click", function(){
			if(patrol.checked) {
				patrolLayer.show();
			} else {
				 patrolLayer.hide();
			}
		});
		
		// Set the safe layer checkbox ticked by default
		$( "#safe" ).attr( "checked", true );

		$("#safe").on("click", function(){
			if(safe.checked) {
				safeLayer.show();
			} else {
				 safeLayer.hide();
			}
		});

		$("#burnBoundary").on("click", function(){
			if(burnBoundary.checked) {
				burnBoundaryLayer.show();
			} else {
				 burnBoundaryLayer.hide();
			}
		});

		//$( "#depiFireDes" ).attr( "checked", true );
		
		$("#depiFireDes").on("click", function(){
			if(depiFireDes.checked) {
				fireDistrictsLayer.show();
			} else {
				 fireDistrictsLayer.hide();
			}
		});
		
		$("#publicSafetyZone").on("click", function(){
			if(publicSafetyZone.checked) {
				publicSafetyZoneLayer.show();
			} else {
				 publicSafetyZoneLayer.hide();
			}
		});
		
		


		
    });
*/
// national-geographic, hybrid, topo, gray, dark-gray, oceans, osm














