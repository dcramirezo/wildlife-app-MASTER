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
    $('.sea, .sky, .river').hide();
});
$('#rdo-sea').click(function(){
    $('.sea').show();
    $('.land, .sky, .river').hide();
});
$('#rdo-sky').click(function(){
    $('.sky').show();
    $('.land, .sea, .river').hide();
});
$('#rdo-river').click(function(){
    $('.river').show();
    $('.sea, .sky, .land').hide();
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

function liveDead(src,txt){
    $('#WS, .rdo, .land, .sea, .sky, .river, #arrow-down , #arrow-up, #MoreLess, #WhatSpe, #srch, #underUtility').hide();

    $('#liveDead, .bckNxt').show();
    
    var srcArr = src.split('/');
    var source = 
        srcArr[(srcArr.length-4)] +'/'+
        srcArr[(srcArr.length-3)] +'/'+
        srcArr[(srcArr.length-2)] +'/'+ srcArr[(srcArr.length-1)];
    $("#insIMG").append("<img class='theImg' src='" + source + "'>");
    $(".imgQuestion").append(txt);
    
}

function leftArrow(){
    $('#WS, .rdo, .land,  #arrow-down , #MoreLess, #WhatSpe, #srch, #underUtility').show();
    $('#liveDead, .bckNxt, .toggleDiv, .sea, .sky, .river').hide();
    $('.theImg').remove();
    $(".imgQuestion").empty();
    
}



