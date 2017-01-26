// global variables
var noOrFAid; // this variable says what to do when DONE (in panel.php) is pressed.
var Wname;
var imgSource;
var firstAidAdvice = "<p><b>Caution!</b> This animal may be dangerous.<br>Stay calm, speak softly and move slowly to avoid distress to the animal.<br>Do not approach the animal or attempt to catch it - chasing it may result in a worse injury and unnecessary stress for the animal. Secure the area and try to prevent pets or other people from approaching the injured animal.<br>Call a licenced wildlife shelter to capture the animal or call DELWP on 136 185 to be put in touch with a Wildlife Officer.<br>In the event of a traffic collision or an animal on the road, the police can also be contacted on 000 for assistance. Check the area to make sure a pouch young has not been thrown out during the collision. dddd dddddddddddddddd ddddddddddddddddd dddddddd d  ddddddddddd dddddddddd ddddd d ddddddd ddddd dddddddd dddddd ddddddd dddd dddddddd ddddddd ddddddd ddddddddd ddddddd dddd dddddddddddddddd ddddddddddddddddd dddddddd d  ddddddddddd dddddddddd ddddd d ddddddd ddddd dddddddd dddddd ddddddd dddd dddddddd ddddddd ddddddd ddddddddd ddddddddddd dddddddddddddddd ddddddddddddddddd dddddddd d  ddddddddddd dddddddddd ddddd d ddddddd ddddd dddddddd dddddd ddddddd dddd dddddddd ddddddd ddddddd ddddddddd ddddddddddd dddddddddddddddd ddddddddddddddddd dddddddd d  ddddddddddd dddddddddd ddddd d ddddddd ddddd dddddddd dddddd ddddddd dddd dddddddd ddddddd ddddddd ddddddddd ddddddddddd dddddddddddddddd ddddddddddddddddd dddddddd d  ddddddddddd dddddddddd ddddd d ddddddd ddddd dddddddd dddddd ddddddd dddd dddddddd ddddddd ddddddd ddddddddd ddddddddddd dddddddddddddddd ddddddddddddddddd dddddddd d  ddddddddddd dddddddddd ddddd d ddddddd ddddd dddddddd dddddd ddddddd dddd dddddddd ddddddd ddddddd ddddddddd ddddddddddd dddddddddddddddd ddddddddddddddddd dddddddd d  ddddddddddd dddddddddd ddddd d ddddddd ddddd dddddddd dddddd ddddddd dddd dddddddd ddddddd ddddddd ddddddddd ddddddddddd dddddddddddddddd ddddddddddddddddd dddddddd d  ddddddddddd dddddddddd ddddd d ddddddd ddddd dddddddd dddddd ddddddd dddd dddddddd ddddddd ddddddd ddddddddd ddddddd</p>";

var deadTxt ="Unfortunately, at this stage, if the animal is not alive, not much can be done, other that removing the animal from dangerous locations such as the road. <br> Please remain calm, do not call the police. Make sure the scene is safe for others and move on.<br> If you would like to inform DELWP, please call this number and someone will note the location of the animal. <br> <a href='136 186'><u>136 186</u> </a>";

//____________________
var winWidth; 
var winHeight; 
var panelPos; 

$(document).ready(function(){
    winWidth = $(document).width();
    winHeight = $(document).height();
    panelPos = winWidth*.96;
    //defaul position of the panel
    $( ".panel, .panel_keys" ).animate({
        width: panelPos,
        //height: (winHeight),
        left: -panelPos
    });
});
/*
$(window).resize(function(){
    console.log($('#wrapper').height());
    $('.footer').animate({
        bottom: (0)
    })
});
*/
//____________________
/*
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
*/

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
    $('.toggleDiv, #arrow-up').show();
    $('#arrow-down').hide(); 
    $('#moreLess').text('Less');
    $('body, html').animate({ scrollTop: 1000 }, 1500);
    
});
$('#arrow-up').click(function(){
    $('.toggleDiv').hide(1500);
    $('#arrow-up').hide();
    $('#arrow-down').show(); 
    $('#moreLess').text('More');
});
$('#moreLess').click(function(){
    if($('#moreLess').text() === 'More'){
       $('#arrow-down').click(); 
    }else if($('#moreLess').text() === 'Less'){
        $('#arrow-up').click();
    }
});

 // -------------------------------------

function liveDead(src,txt){
    $('#WS, .cont, .land, .sea, .sky, .river, #arrow-down , #arrow-up, #moreLess, #WhatSpe, #srch, #underUtility').hide();

    $('#liveDead, .bckNxt').show();
    
    var srcArr = src.split('/');
    var source = 
        srcArr[(srcArr.length-4)] +'/'+
        srcArr[(srcArr.length-3)] +'/'+
        srcArr[(srcArr.length-2)] +'/'+ srcArr[(srcArr.length-1)];
    $("#insIMG").append("<img class='theImg' src='" + source + "'>");
    $(".imgQuestion").append(txt);
    
}

$('#leftArrow').click(function(){
    $('#WS, .cont, .land,  #arrow-down , #moreLess, #WhatSpe, #srch, #underUtility').show();
    $('#liveDead, .bckNxt, .toggleDiv, .sea, .sky, .river').hide();
    $('.theImg').remove();
    $(".imgQuestion").empty();
    
});
$('#leftArrow2').click(function(){
    $('#btns, #leftArrow, #liveDead, .bckNxt, .footer').show();
    $('#leftArrow2, #whatHapn').hide();
    $(".imgQuestion").empty();
    $(".imgQuestion").append('Is animal alive?');
});

$('#yes, #donKnow').click(function(){
 
    $('#btns, .footer').hide();
    $('#leftArrow2').show();
    var src = $('.theImg').attr('src');
    $('.theImg').remove(); $(".imgQuestion").empty();
    liveDead(src, 'What has happend?');
    $('#whatHapn').show();    
});

$('#no').click(function(){
    noOrFAid ='no';
    var src = $('.theImg').attr('src');
    Wname = getWildlifeName(src);
    imgSource = "<img src='img/wildlife/land/" + Wname + ".jpg' class='theImg' >";
    $("#panelIMG").html(imgSource);
    $("#panelTxt").html(Wname);
    $('#firstAidAdvice').html(deadTxt); 

    $('#firstAidOrDead').hide();
    $('#keys').show();
    $( ".panel" ).animate({left: 0}, 700);
        
});
/*
$('#FAid').click(function(){
    var src = $('.theImg').attr('src');
    Wname = getWildlifeName(src);
    //$('.theImg').remove(); 
    //$(".imgQuestion").empty();    
    //liveDead(src, Wname + ' First Aid Advice.');
    imgSource = "<img src='img/wildlife/land/" + Wname + ".jpg' class='theImg' >";
    $("#panelIMG").html(imgSource);
    var txt = " First Aid Advice.";
    $("#panelTxt").html(Wname + txt);
    $('#firstAidAdvice').html(firstAidAdvice);
    //$('#modalFA').modal('open');
});
*/
function getWildlifeName(src){
// this func returns the name of the species from it's image url
    var srcArr = src.split('/');
    var Wn = srcArr[3].slice(0, -4); 
    return  Wn   
}


$('.close').click(function(){
    $( ".panel" ).animate({left: (-panelPos)}, 700);
});

$( "#FAid" ).click(function(){
    noOrFAid ='FAid';
    var src = $('.theImg').attr('src');
    Wname = getWildlifeName(src);
    imgSource = "<img src='img/wildlife/land/" + Wname + ".jpg' class='theImg' >";
    $("#panelIMG").html(imgSource);
    var txt = " First Aid Advice.";
    $("#panelTxt").html(Wname + txt);
    $('#firstAidAdvice').html(firstAidAdvice); 

    $('#firstAidOrDead').show();
    $('#keys').hide();
    $( ".panel" ).animate({left: 0}, 700);
});
$(document).keyup(function(e) {
     if (e.keyCode == 27) { 
         $( ".panel" ).animate({left: (-panelPos)}, 700);
    }
});

$('#done').click(function(){
    $( ".panel" ).animate({left: (-panelPos)}, 700);
    if(noOrFAid == 'FAid'){
        alert('Hide exteral elements and show the Map!');
        //('#map-div').show();
    }
});










