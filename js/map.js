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
*/

var map;
require(["esri/map", "dojo/domReady!"], function(Map) {
  map = new Map("mapDiv", {
    basemap: "topo",
    center: [145.45,-37],
    zoom: 7
  
  });
});