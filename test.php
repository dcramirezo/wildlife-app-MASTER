<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--link rel="stylesheet" href="/resources/demos/style.css"-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

      
  $(document).ready(function(){
   
      var arr = [];    
      $.getJSON( "species.json" , function(sp){
            $.each( sp, function( key, val ) {
                
                //if(val.COMMON_NAME){
                    $("#apn").append(val+'<br>' );
                    //arr.push(val.COMMON_NAME);
                //}
                //console.log('{' +val.COMMON_NAME+'},');
            });
        }).done(function() {
           // arr = jQuery.unique(arr);
            //$.each( arr, function(key, val) {
            //    $("#apn").append('"'+val + '",<br>' );
            //});          
        })
        .fail(function() {
            console.log( "error" );
        });

   /*   
 $( function() {
     
    $( "#srch" ).keyup(function(){
      Uinput = $( "#srch" ).val();
      if(Uinput){
          console.log(Uinput);
          //$("srch").trigger(40);
          $.getJSON( "https://vbaspecies.herokuapp.com/species/search?q=" + Uinput, function(sp){
                    $.each( sp, function( key, val ) {
                        //console.log( (val.COMMON_NAME) );
                        arr.push(val.COMMON_NAME);
                    });
                }).done(function() {
                    console.log('here is: ' +arr[0]);
                    $("srch").trigger(40);
                });
          
                $( "#srch" ).autocomplete({
                    source: arr 
                }); 
          
      } else console.log('User input is empty!');
    }); 

  }); 
     
   */ 
      
   
      
      
      
/*      
    $( "#srch" ).autocomplete({
      source: function() {
            var arr = [];
            valor = $( "#srch" ).val();
            //console.log(valor);
            $.getJSON( "https://vbaspecies.herokuapp.com/species/search?q=" + valor, function(sp){
                $.each( sp, function( key, val ) {
                    //console.log( (val.COMMON_NAME) );
                    arr.push(val.COMMON_NAME);
                });
            });
          //return arr
          //if(arr){ console.log('has');}else{ console.log('empty');}
          console.log(arr);
          $.each(arr, function(index, val) {
            console.log('item '+index+': ' + val);
            });
      }
                
   
    });
      
      */
  });
      
  </script>
</head>
<body>
 
<div class="ui-widget">
  <label for="srch">Search: </label>
  <input id="srch">
    <div id="apn">
    </div>
</div>
 
 
</body>
</html>