$('#btn').click(function(){

    $.getJSON( "https://vbaspecies.herokuapp.com/species", function( data ) {
      var items = [];
      $.each( data, function( key, val ) {
        
        items.push( "<li>" + val.COMMON_NAME+ "</li>" );
      });

        
      $( "<ul/>", {
        "class": "my-new-list",
        html: items.join( "" )
      }).appendTo( "body" );
    
    });
    
    
});    

$('#btn1').click(function(){
    var taxonID = $('#taxonID').val();
    var url = "https://vbaspecies.herokuapp.com/species/" + taxonID;

    $.getJSON(url , function( data ) {
      var items = [];
      $.each( data, function( key, val ) {
        items.push( "<li>" + val.media.alternativeText + "</li>" );
      });

        
      $( "<ul/>", {
        "class": "my-new-list",
        html: items.join( "" )
      }).appendTo( "body" );
    
    });   
    
});  

$('#rdo-land').click(function(){
    $('.land').show();
    $('.sea').hide();
    $('.sky').hide();
    $('.river').hide();
});
$('#rdo-sea').click(function(){
    $('.sea').show();
    $('.land').hide();
    $('.sky').hide();
    $('.river').hide();
});
$('#rdo-sky').click(function(){
    $('.sky').show();
    $('.land').hide();
    $('.sea').hide();
    $('.river').hide();
});
$('#rdo-river').click(function(){
    $('.river').show();
    $('.sea').hide();
    $('.sky').hide();
    $('.land').hide();
});


$('#arrow-down').click(function(){
    $('.toggleDiv').show();
    $('#arrow-down').hide();
    $('#arrow-up').show(); 
    $('#MoreLess').text('Less');
    $('body, html').animate({ scrollTop: 1000 }, 1500);
});
$('#arrow-up').click(function(){
    $('.toggleDiv').hide(1500);
    $('#arrow-up').hide();
    $('#arrow-down').show(); 
    $('#MoreLess').text('More');
});


 // -------------------------------------

function liveDead(imageID){
    $('#WS').hide();
    $('.rdo').hide();
    $('.land').hide();
    $('.sea').hide();
    $('.sky').hide();
    $('.river').hide();
    $('#ML').hide();
    
    $('#liveDead').show();

    
}




