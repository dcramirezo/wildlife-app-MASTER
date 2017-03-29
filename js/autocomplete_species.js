var speciesList = [
      "Possum",
      "Koala",
      "Kangaroo",
      "Wallaby",
      "Wombat",
      "Bandicoot",
      "Quoll",
      "Glider",
      "Flying Fox",
      "Microbat",
      "Echidna",
      "Platypus",
      "Duck",
      "Owl",
      "Emu",
      "Penguin",
      "Seal",
      "Sea Turtle",
      "Whale",
      "Dolphin",
      "Lizard",
      "Dragon",
      "Goanna",
      "Snake",
      "Turtle",
      "Frog",
      "Dog",
      "Dingo",
      "Deer",
      "Fox",
      "Feral Pig",
      "Goat",
      "Horse",
      "Cat",
      "Bat",
      "Antechinus",
      "Macropod",
      "Sea Lion",
      "Shark",
      "Stingray",
      "Octopus",
      "Gecko",
      "Toad",
      "Water Dragon",
      "Crocodile",
      "Magpie",
      "Galah",
      "Lorikeet",
      "Kookaburra",
      "Eagle",
      "Hawk",
      "Buzzard",
      "Falcon",
      "Ibis",
      "Wedge Tailed Eagle",
      "Cow",
      "Sheep",
      "Rabbit",
      "Camel",
      "Buffalo"      
    ];


$( "#srch" ).autocomplete({
    
    source: speciesList
});


// this is connecting to Victoria Biodiversity Atlas (VBA) to get the species list
$( "#srch" ).keyup(function(e){
    //srchVal = $( "#srch" ).val();
    /*
    if(srchVal!=null && srchVal!=undefined && srchVal!=''){
        $( "#species" ).html('');
       /* $.getJSON("https://vbaspecies.herokuapp.com/species/search?q=" + srchVal, function(data){
            $.each(data, function(index, val) {
                if(val.COMMON_NAME!=null && val.COMMON_NAME !=undefined && val.COMMON_NAME !='' && val.PRIMARY_DISCIPLINE!='Flora'){

                    $('#species').append('<div class="AutoLi">'+val.COMMON_NAME+ " - " + val.SCIENTIFIC_NAME+'</div>');
                    //console.log('PD: '+ val.PRIMARY_DISCIPLINE);
                }
            });

        }); 
        if (e.keyCode == 13) {
            autoCompFunc($( "#srch" ).val() )
          }
    } else{$( "#species" ).html('');}
    */
});
/*
$( "#srchSubmit" ).submit(function( event ) {
  if( $.trim($( "#srch" ).val())  && $( "#srch" ).val() !=null){
      $('.AutoUL').click();
  }
    event.preventDefault();
});
*/
/*
$(document).ready(function() {
    var species = [];  

    $.getJSON( "species.json", function( data ) {
      $.each( data, function( key, val ) {
        
        species.push(val);
          
      }); 
      
    });
    
    
    $( "#srch" ).autocomplete({
        source: species 
    });    
    
}); // End of document.ready func
*/

/*
  //var src = $( "#srch" ).val(); 
    
$( "#srch" ).autocomplete({
    
    source: function(request, response) {
        $.ajax({
        url: "species.json" ,
        //url: "http://vbaspecies.herokuapp.com/species/search?q=" + src,
            
        contentType: "application/json; charset=utf-8",
        dataType: "json",
            
        success: function( data ) {
            console.log('working');
            response(data);
        } 
        }).done(function(data) {

            console.log('Done');
            /*
             // filter the array for the starting char
            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( data.term ), "i" );
            response( $.grep( data, function( data ){
          return matcher.test( data);            
            }).splice(15) ); */
/*
            //response(data);
        })
        .fail(function(err) {
            console.log('fail: ' +err );
        });
    }
});
*/

/*

$( "#Species" ).autocomplete({
      source: function( request, response ) {
      	valor = $( "#Species" ).val();
        $.ajax( {
          url: "http://vbaspecies.herokuapp.com/species/search?q=" + valor,
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function( data ) {
            response($.map(data, function(v,i){
             return {
                label: v.COMMON_NAME + " - " + v.SCIENTIFIC_NAME,
                value: v.SCIENTIFIC_NAME ,
                //extend values
                taxon_id: v.TAXON_ID
             };
            }));
          },
          error : function(jqXHR, textStatus, errorThrown) {
          	console.log("Error getting Species Information");
          }
        });
      },
      minLength: 1,
      select: function( event, ui ) {
          var specieWord = ui.item.value.replace(/ /g,"+");
          var promise = speciesExtraInfo(specieWord);
          //execution and access to the succes event
          promise.success(function(JsonRes){
            console.log('first query pages and second jsonres');
            $.each( JsonRes, function( key, value ) {
              $.each( value.media, function( keyx, valuex ) {
                if (typeof valuex.medium.uri != "undefined") {
                  ValidLinkSpecies = " <a target='_blank' href="+valuex.medium.uri+"> Museum Victoria Photo Reference </a>";
                  $("#log").prepend( "<p>" + "<b>Scientific Name: </b>" + ui.item.value.italics()  + "<br/><b>Common Name: </b>" + ui.item.label 
                    + "<br/><b>Taxon ID:</b> " + ui.item.taxon_id.fontcolor("green") + "<br/>" + ValidLinkSpecies+ "<br/>" + valuex.rightsStatement + "</p>");
                  console.log(ValidLinkSpecies);
                  } else {
                  ValidLinkSpecies = "";
                  $("#log").prepend( "<p>" + "<b>Scientific Name: </b>" + ui.item.value.italics()  + "<br/><b>Common Name: </b>" + ui.item.label 
                    + "<br/><b>Taxon ID:</b> " + ui.item.taxon_id.fontcolor("green") + "<br/>" + "There is no Museum Victoria Photo Reference Reference"+"</p>");
                  console.log(valuex.medium.uri);
                  } 
              });
            });
         });
      }
    });
    
    */