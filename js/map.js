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
		
		/* Set markers for different layers */
		
		/* Safe icon marker*/
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

		
		/* Search option*/
        var search = new Search({
           map: map
        }, "Pcode");
        search.startup();	

		/* Search option for mobile/tablet */
        var searchM = new Search({
           map: map
        }, "srch-term-m");
        searchM.startup();		
		
		
		
		/* Home button */
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

// national-geographic, hybrid, topo, gray, dark-gray, oceans, osm


















