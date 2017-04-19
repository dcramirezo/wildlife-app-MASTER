// global variables
comeFromMap = 0; //if this variable is equal to 1, #btns should be shown otherwise it's hidden
var noOrFAid; // this variable says what to do when DONE (in panel.php) is pressed.
var leftArrowVisibility = 0; //this var determines where this icon should be shown and what should be done based on that

//var addresses = []; // Keeps the addresses of the wildlife centers
//var LatLngs = [] // Keeps lat and lng of markers
//var centersInDb = [] // keeps all details of centers which retrived from DB

var icons = []; // Keeps the wildlife speciallities to set the icons based on that
var tmp = 'home'; // possible values for this var are: home/isLive/WhatHapn/
var LandRiverSeaSky = 'commonSpecies';
var moreLessText = 'more';
var Wname; //it's value is like this: land/emu.jpg
var wildlifeName; // it's value is like this: emu
var QbtnsValue; //in whatHappn page, the value of the clicked button is saved in this variable to retrieve the proper First Aid adivce based on that
var imgSource;
var imgQuestionOrText = 'Is animal alive?';

var firstAidAdvice = "<p><b>Caution!</b> This animal may be dangerous.<br>Stay calm, speak softly and move slowly to avoid distress to the animal.<br>Do not approach the animal or attempt to catch it - chasing it may result in a worse injury and unnecessary stress for the animal. Secure the area and try to prevent pets or other people from approaching the injured animal.<br>Call a licenced wildlife shelter to capture the animal or call DELWP on 136 185 to be put in touch with a Wildlife Officer.<br>In the event of a traffic collision or an animal on the road, the police can also be contacted on 000 for assistance. Check the area to make sure a pouch young has not been thrown out during the collision. test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test  test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test testtest test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test testtest test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test testtest test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test testtest test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test testtest test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test testtest test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test </p>";

var deadTxt ="Unfortunately, at this stage, if the animal is not alive, not much can be done, other that removing the animal from dangerous locations such as the road. <br> Please remain calm, do not call the police. Make sure the scene is safe for others and move on.<br> If you would like to inform DELWP, please call this number and someone will note the location of the animal. <br> <a href='136 186'><u>136 186</u> </a>";

//____________________
var winWidth; 
var winHeight; 
var panelPos; 

$(document).ready(function(){
    initMap();
    winWidth = $(document).width();
    winHeight = $(document).height();
    panelPos = winWidth*0.96;
    //defaul position of the panel
    $('.panel').animate({
        width: panelPos,
        right: -panelPos
    });    
    
});
$(window).resize(function(){
    winWidth = $(document).width();
    winHeight = $(document).height();
    panelPos = winWidth*.96;
    //defaul position of the panel
    $('.panel').animate({
        width: panelPos,
        right: -panelPos
    });  
  
});

$('#filterMammLand').click(function(){
    $('.commonSpecies,.waterMammals,.birds,.reptilesAmphibians, .introduced, #filterBlackBg , .filterBox').hide();
    $('.land').show();
    LandRiverSeaSky = 'land';
});
$('#filterWaterLand').click(function(){
    $('.commonSpecies,.land,.birds,.reptilesAmphibians, .introduced, #filterBlackBg , .filterBox').hide();
    $('.waterMammals').show();
    LandRiverSeaSky = 'waterMammals';
});

$('#filterReptilesAmphibians').click(function(){
    $('.commonSpecies,.land,.birds,.waterMammals, .introduced, #filterBlackBg , .filterBox').hide();
    $('.reptilesAmphibians').show();
    LandRiverSeaSky = 'reptilesAmphibians';
});

$('#filterBirds').click(function(){
    $('.commonSpecies,.land,.birds,.waterMammals, .introduced, .reptilesAmphibians, #filterBlackBg , .filterBox').hide();
    $('.birds').show();
    LandRiverSeaSky = 'birds';
});
$('#filterIntroSpec').click(function(){
    $('.commonSpecies,.land,.birds,.waterMammals, .reptilesAmphibians, #filterBlackBg , .filterBox').hide();
    $('.introduced').show();
    LandRiverSeaSky = 'introduced';
});
$('#filterIdonKnow' ).click(function(){
    //$('#warnBox').hide();
    $('.warning, #blackBg, #IdonKnowBox').show();
        $('#blackBg').css({
            height: ($(document).height() )
        });
    $('#filterBlackBg , .filterBox').hide();
});

$('#arrow-down').click(function(){
    
    $('.toggleDiv, #arrow-up').show(1200);
    $('#arrow-down').hide(); 
    //moreLessText = 'less';
    $('#moreLess').text('Less Animals');
    $('body, html').animate({ scrollTop: 1000 }, 1500);
    
});
$('#arrow-up').click(function(){
    $('.toggleDiv').hide(1200);
    $('#arrow-up').hide();
    $('#arrow-down').show();
    //moreLessText = 'more';
    $('#moreLess').text('More Animals');
});
$('#moreLess').click(function(){
    if($('#moreLess').text() === 'More Animals'){
       $('#arrow-down').click(); 
    }else if($('#moreLess').text() === 'Less Animals'){
        $('#arrow-up').click();
    }
});

 // -------------------------------------

function liveDead(src, txt){
    $('#WS, .cont, .land, .waterMammals, .birds, .introduced, .reptilesAmphibians, #arrow-down, #arrow-up, #moreLess, #underUtility, .IdntKnowAndClosestShel').hide();
    $('#liveDead').show();
    
    tmp = 'isLive';
    
    if(tmp == 'isLive'){
        leftArrowVisibility = 1;
        imgQuestionOrText = 'Is the animal alive?';
    } else if(leftArrowVisibility == 'whatHapn'){
        leftArrowVisibility = 2;
        imgQuestionOrText = 'What has happened?';
    } else if( leftArrowVisibility == 'map'){
        leftArrowVisibility = 3;
        imgQuestionOrText= 'First Aid Advice';
    }
    
    if(comeFromMap==1){$('#btns').show(); comeFromMap =0; }
    
    imgSource = src;
    var srcArr = imgSource.split('/');
    var source = 
        srcArr[(srcArr.length-4)] +'/'+
        srcArr[(srcArr.length-3)] +'/'+
        srcArr[(srcArr.length-2)] +'/'+ srcArr[(srcArr.length-1)];
    
    Wn = (srcArr[(srcArr.length-1)].slice(0, -4)).replace(/\%20/g, ' ');
    
    wildlifeName = Wn; //put the wildlife Name in the global variable
    
    $(".imgQuestion, #specieName").empty();
    //console.log('wildlife name: '+wildlifeName);
    
    //$(".imgQuestion").append( Wn+ '<br> '+ txt);
    $(".imgQuestion").append(txt);
    $("#specieName").append(Wn);
    
    $('#leftArrow').show();
}

$('#leftArrow').click(function(){
    if(leftArrowVisibility ==1){ 
        
        $('.cont, #arrow-down , #moreLess, #WhatSpe, #underUtility, .IdntKnowAndClosestShel').show();
        $('#liveDead, .toggleDiv, #leftArrow').hide();
        
        if( LandRiverSeaSky== 'commonSpecies' ){        
            $('.commonSpeices').show();
            $('.land,.waterMammals,.reptilesAmphibians,.introduced, .birds').hide();
        }else if( LandRiverSeaSky== 'land' ){        
            $('.land').show();
            $('.commonSpecies,.waterMammals,.birds,.reptilesAmphibians, .introduced').hide();
        }else if( LandRiverSeaSky== 'waterMammals' ){        
            $('.waterMammals').show();
            $('.commonSpecies,.land,.birds,.reptilesAmphibians, .introduced').hide();
        }else if( LandRiverSeaSky== 'birds' ){        
            $('.birds').show();
            $('.commonSpecies,.waterMammals,.land,.reptilesAmphibians, .introduced').hide();
        }else if( LandRiverSeaSky== 'reptilesAmphibians' ){        
            $('.reptilesAmphibians').show();
            $('.commonSpecies,.waterMammals,.birds,.land, .introduced').hide();
        }else if( LandRiverSeaSky== 'introduced' ){        
            $('.introduced').show();            $('.commonSpecies,.waterMammals,.birds,.land, .reptilesAmphibians,').hide();
        }
        
        $('#moreLess').text('More Animals');
        $('.theImg').remove();
        $(".imgQuestion").empty();
        $('#srch').val('');
        
       // liveDead(imgSource,imgQuestionOrText);
        
        //checkRadioBtn();
        leftArrowVisibility =0;
        tmp ='home';
    } else if(leftArrowVisibility ==2){
        //console.log('leftArrow2: ' +leftArrowVisibility);
        
        $('#btns, #leftArrow, #liveDead, .bckNxt, .footer').show();
        $('#whatHapn').hide();
        $(".imgQuestion").empty();
        liveDead(imgSource,imgQuestionOrText);
        leftArrowVisibility =1;
        tmp ='isLive';
    }else if(leftArrowVisibility ==3){
        //console.log('leftArrow3: ' +leftArrowVisibility);
        
        $(' #map-canvas, #mapFooter').hide();
        $('#liveDead, #whatHapn, .footer').show();
        //$('body').css('overflow', 'auto');

        leftArrowVisibility =2;
        tmp ='whatHapn';
    }
});


$('#yes, #donKnow').click(function(){
    $('#btns, .footer, #leftArrow').hide();
    var src = $('.theImg').attr('src');
    $('.theImg').remove(); $(".imgQuestion").empty();
    liveDead(imgSource, 'What has happend?');
    $('#whatHapn').show(); 
    leftArrowVisibility =2;
    tmp ='whatHapn';
});

$('#no').click(function(){
    //noOrFAid ='no';
    //getCoordinates('3 Point Addis Rd');
    var src = $('.theImg').attr('src');
    var src = imgSource;
    Wname = getWildlifeName(src);
    
    $("#panelIMG >img").remove();
    //$("#panelIMG").html(imgSource);
    $("#panelTxt").empty();
    wnArr= Wname.split('/');
    $("#panelTxt").html(wnArr[1].slice(0, -4));
    $('#firstAidAdvice').html(deadTxt); 

    $('.shelter, .keys, .centers').hide();
    $('.firstAidOrDead').show();
    $('.panel').show();
        // This sets panels' header to center
        $('#panelTxtContainer').css({
            paddingLeft: ( ($('.panelHeader').width()*0.95-$('#panelTxtContainer').width() )/2 )
        });
    $('#blackLayer').show();
    $( ".panel" ).animate({right: 0}, 700);
    
    setFooterHeight(100);
});

function getWildlifeName(src){
// this func returns the name of the species from it's image url
    var srcArr = src.split('/');    
    var Wn = srcArr[(srcArr.length-2)] +'/'+srcArr[(srcArr.length-1)].replace(/\%20/g, ' '); 

    return  Wn   
}


$('.close').click(function(){
    $( ".panel" ).animate({right: (-panelPos)}, 700, function(){
        $( ".panel" ).hide();
    });
    $('#blackLayer').hide();
});
$('#closeMapMenu').click(function(){
    $('#mapModal').toggle(500);
    $('#mapMenuModal').toggle(500);
});
$( "#FAid, #mapFA" ).click(function(){
    //noOrFAid ='FAid';
    var src = imgSource;
    Wname = getWildlifeName(src);
    wnArr = Wname.split('/');
    
    $("#panelIMG >img").remove();
    $("#panelIMG").html(imgSource);
    var txt = "<br> First Aid Advice.";
    $("#panelTxt").empty();
    $("#panelTxt").html(wnArr[1].slice(0, -4) + txt);
    $('#firstAidAdvice').html(firstAidAdvice); 

    $('.firstAidOrDead').show();
    $('.keys, .centers, .shelter').hide();
    
    $('.panel').show();
        // This sets panels' header to center
        $('#panelTxtContainer').css({
            paddingLeft: ( ($('.panelHeader').width()*0.95-$('#panelTxtContainer').width() )/2 )
        });
    $('#blackLayer').show();
    $( ".panel" ).animate({right: 0}, 700);
    setFooterHeight(56);
});

$(document).keyup(function(e) {
     if (e.keyCode == 27) { 
         $( ".panel" ).animate({right: (-panelPos)}, 700, function(){ $( ".panel" ).hide();});
         $('#srch, #srchClose').hide();
         $('#blackLayer').hide(500);
    }
});

$('#done').click(function(){
    $( ".panel" ).animate({right: (-panelPos)}, 700, function(){ $( ".panel" ).hide(); });
    $('#blackLayer').hide();
    if(noOrFAid == 'FAid'){
        alert('Hide exteral elements and show the Map!');
    }
});
$('#Kdone, #Cdone, #sdone').click(function(){
    $( ".panel" ).animate({right: (-panelPos)}, 700, function(){ $( ".panel" ).hide();});
    $('#blackLayer').hide();
});

$('#DesOrOpen').click(function(){
    if($('#divTxt').text() =='Opening Hours'){
        $('#divTxt').text('Description');
        
        $('#DesArrow').hide();
        $('#OpenHArrow').show();
        
        $('#shelterDes').hide(1000);
        $('#openingHours').show(1000);
        $('#hr').show();
        
    }else if($('#divTxt').text() =='Description'){
        $('#divTxt').text('Opening Hours');
        
        $('#OpenHArrow').hide();
        $('#DesArrow').show();
        $('#hr').hide();
        
        $('#shelterDes').show(1000);
        $('#openingHours').hide(1000);
    }
    
});

$('.Qbtns').click(function(){
    $('#liveDead, #whatHapn, .footer').hide();
    $('#map-canvas, #mapFooter, #mapModal, #LocationBox, #listicon, #mapLoc, #mapFA').show();
    // Align it to the center 
    $('#LocationBox').css({
        top: ( ($(window).height()-$('#LocationBox').height() )/2 ),
        left: ( ($(window).width()-$('#LocationBox').width() )/2 )
    });
    QbtnsValue = $(this).attr('value');    
    //giveProperAdvice();
    
    resizeMap();
    
    plotMarkers(); 
    
    // set the width of the search field dynamically
    $('.searchInput').animate({
        width: ($(window).width()*0.50)
    });
    /*$('#Pcode').animate({
        paddingLeft: ( ($(window).width()*0.83-($('.searchBtn').width()+$('.searchInput').width()) )/4 )
    });*/ 
    $('.titlePane').animate({height: '25px'});

    leftArrowVisibility =3;
    tmp ='map';
});

//$('#listicon-alt').click(function(){
    //$('#mapMenu').toggle(250);
    //$('#mapLoc').toggle(300);
    //$('#listicon').toggle(500);
    //$('#mapKey').toggle(700);
    //$('#mapFA').toggle(700);

//});
/*
$('#mapKey').click(function(){
    $('.firstAidOrDead, .shelter, .centers').hide();
    $('.keys').show();
    $('.panel').show();
    $('#blackLayer').show();
    $( ".panel" ).animate({right: 0}, 700); 
    
    setFooterHeight($('.keysFooter').height());
}); */
$('#mapMenu').click(function(){
    $('#mapModal').toggle(500);
    $('#mapMenuModal').toggle(500);   
});

$('#mapCenters').click(function(){
    $('.firstAidOrDead, .shelter, .keys').hide();
    $('.centers').show();
    $('.panel').show();
    $( ".panel" ).animate({right: 0}, 700);    
});

$('#mapHome').click(function(){
    $('.firstAidOrDead, #leftArrow, .shelter, .keys, #map-canvas, .centers, .toggleDiv, #mapMenu, #mapMenuModal, #mapKey, #listicon, #mapModal, #mapLoc, #mapFA, #mapFooter, #liveDead, #whatHapn, #arrow-up').hide();
    $('.theImg').remove(); $(".imgQuestion").empty();
    $('.cont, #arrow-down, #underUtility, #moreLess, .IdntKnowAndClosestShel').show(); 
    $('#closeMenu').click(); // triger this button
    
    if( LandRiverSeaSky== 'commonSpeices' ){        
        $('.commonSpeices').show();
        $('.reptilesAmphibians,.waterMammals,.birds,.land, .introduced').hide();
    }else if( LandRiverSeaSky== 'land' ){        
        $('.land').show();
        $('.commonSpecies,.waterMammals,.birds,.reptilesAmphibians, .introduced').hide();
    }else if( LandRiverSeaSky== 'waterMammals' ){        
        $('.waterMammals').show();
        $('.commonSpecies,.reptilesAmphibians,.birds,.land, .introduced').hide();
    }else if( LandRiverSeaSky== 'birds' ){        
        $('.birds').show();
        $('.commonSpecies,.waterMammals,.reptilesAmphibians,.land, .introduced').hide();
    }else if( LandRiverSeaSky== 'reptilesAmphibians' ){        
        $('.reptilesAmphibians').show();
        $('.commonSpecies,.waterMammals,.birds,.land, .introduced').hide();
    }else if( LandRiverSeaSky== 'introduced' ){        
            $('.introduced').show();            $('.commonSpecies,.waterMammals,.birds,.land, .reptilesAmphibians').hide();
        }
    
    //$('body').css('overflow', 'auto');
    comeFromMap = 1;
    //checkRadioBtn();
    
    leftArrowVisibility =0;
    tmp ='home';
    $('#srch').val('');
    
});
 $('#mapModalClose').click(function(){
     $('#mapModal, #LocationBox').hide(500);
 });
$('#mapYes').click(function(){
    centersDetails = []; //empty this array
    $('#mapModal, #LocationBox').hide(500);
    $('.firstAidOrDead, .keys, .shelter').hide();
    //show the centers in the panel by default
    $('.panel, #blackLayer, .centers').show();
    $( '.panel' ).animate({right: 0}, 700);
    setFooterHeight($('.shelterFooter').height());
   
    // To use navigator.geolocation.... SSL certificate is need for Https protocol
    //navigator.geolocation.getCurrentPosition(showPosition);
    
    //if(ifShowPosWorks == 0){
       IPaddressLocator(); 
    //}
    
});

$('#listicon').click(function(){
    //$('#mapModal, #LocationBox').show();
    $('#mapModal, #LocationBox').hide();
    $('.firstAidOrDead, .keys, .shelter').hide();
    $('.centers, .panel').show();
            // This sets panels' header to center
        $('.CHText').css({
            paddingLeft: ( ($('.centersHeader').width()*0.95-$('.CHText').width() )/2 )
        });
    $('#blackLayer').show();
    $( ".panel" ).animate({right: 0}, 700);
});

$('#mapLoc').click(function(){
    $('#mapModal, #LocationBox').show(500);
});

$('.centersRow').click(function(){
    var imgTag = $(this).find('img').attr('src');
    var spanTag = $(this).find('span').text();
    var spTag = spanTag.replace(/\d+([)]\d+)?/g, '');
    
    var srcArr = imgTag.split('/');
    
    makeShelterPage(srcArr[(srcArr.length-1)], spTag)

    $('.firstAidOrDead, .keys, .centers').hide();
    $('.shelter, .panel').show();
    $( ".panel" ).animate({right: 0}, 700);
    
});

/*
function checkRadioBtn(){
    if(LandRiverSeaSky == 'land'){
        $('#rdo-land').prop("checked", true);
        $('.land').show();
        $('.sea, .river, .sky').hide();
    }else if(LandRiverSeaSky =='sea'){
        $('#rdo-sea').prop("checked", true);
        $('.sea').show();
        $('.land, .river, .sky').hide();
    }else if(LandRiverSeaSky=='river'){
        $('#rdo-river').prop("checked", true);
        $('.river').show();
        $('.sea, .land, .sky').hide();
    } else if(LandRiverSeaSky =='sky'){
        $('#rdo-sky').prop("checked", true);
        $('.sky').show();
        $('.sea, .river, .land').hide();
    }else{
        $('#rdo-land,#rdo-sea,#rdo-sky,#rdo-river').prop("checked", false);
    }
}
*/

$( '#srch' ).focus(function() {
    $(this).data('placeholder', $(this).prop('placeholder')).removeAttr('placeholder')
    //$('.cont').css({position:'fixed'});
    //$('.cont, .IdntKnowAndClosestShel, .downF').css({display:'none'});
    
});
$( '#srch' ).blur(function() {
    $(this).prop('placeholder', $(this).data('placeholder'));
    //$('.cont, .IdntKnowAndClosestShel, .downF').css({display:'block'});   
});
$('#srchBtn').click(function(){
    $('#blackLayer').show(500, function(){
       $('#srch, #srchClose').show();
       $('#srch').css({
            left:(($(window).width()-$('#srch').width() )/2)
       }); 
       $('#srchClose').css({
            left:(($(window).width()-$(window).width()/2 )/2)
       });    
    });
    
});

$('#locBoxSrch').click(function(){
    $('#LocationBox').show();
});

$('.AutoUL').on('mouseover', '.AutoLi' ,function(){
    $(this).css({'backgroundColor':'#cfcfcf'})
});
$('.AutoUL').on('mouseout', '.AutoLi' ,function(){
    $(this).css({'backgroundColor':'#FFF'})
});
$('.AutoUL').on('click', '.AutoLi', function(){
    autoCompFunc($(this).text())
});
function autoCompFunc(text){
    $('#srch').val( text);
    $('#species').html('');
    CName = (text.split(' - ') );
    Wname = CName[0];
    
    liveDead('img/wildlife/any/'+CName[0]+'.png', 'Is animal alive?');   
}
$('#warnFooter').click(function(){ $('.warning').hide(); });
$('#XIdonKnow').click(function(){ 
        $('#blackBg').css({
            height: ($(window).height() )
        });
    $('.warning').hide();
});

$(document).keydown(function (e) {
  if (e.keyCode == 13) {
      $('.warning').hide();
  }
});

$('#filter').click(function(){
    $('#filterBlackBg, .filterBox').show();
    $('#filterTitle').css({
        marginLeft: ( ($('#filterHead').width() -$('#filterTitle').width() )/2  )
    });
});
$('#filterDone').click(function(){
    $('#filterBlackBg , .filterBox').hide();
});

$('#mylist img').bind('click', function(){
    alert( $('#mylist img').index(this) );
});


$(document).on('click', '.centerRowInPanel', function(e){
    //console.log($(this).attr('id') ); 
    var id = $(this).attr('id');
    $.each(centersDetails, function( i, val ) {
      if(val.user_id == id ){
          
          var iconUrl = iconIdentifier(val.spec);
          makeShelterPage(iconUrl,val.org_name, val.suburb);
      }

    });
    
    $( ".panel" ).animate({right: -($(window).width()*0.95) }, 700, function(){
        $('.centers').hide();
        $('.firstAidOrDead, .keys').hide();
        $('.shelter').show();
        $( ".panel" ).animate({right: 0}, 700);
    });

    //console.log($(e.currentTarget).attr('id') );
});
$('#bdone').click(function(){
    $( ".panel" ).animate({right:-($(window).width()*0.95) }, 700, function(){
        $('.shelter, .firstAidOrDead, .keys').hide();
        $('.centers').show();
        $( ".panel" ).animate({right: 0}, 700);
    });
});

function appendListOfClosestCentersToPanel(user_id, iconURL,orgName, contactNo, suburb){
    
    $(".centersContent").append(
        "<div class='centerRowInPanel row' id='"+user_id+"'>" +
            "<div class='col s4 m4 l4'>" +
                "<div>" +
                    "<img class='CCIMG' src=' " + iconURL + "'>" +
                "</div>" +
            "</div>" +
            "<div class='col s6 m6 l6'>" +
                "<div class='fontCol' style='font-size:16px; font-weight:bold; padding:5% 12% 0% 0%'>"+
                    "<div>"+
                        "<span >"+orgName +"</span>"+
                    "</div>" +
                    "<div><a href=' " +contactNo +">"+
                        "<span class='fontCol;'>"+contactNo +
                        "</span></a>"+
                    "</div>" +
                "</div>"+
            "</div>" +    
            "<div class='col s2 m2 l2'>"+
                "<div style='padding-top:40%;'>"+
                    "<span style='font-weight:bold; color: black'>"+ suburb +
        
                    "</span>"+
                "</div>"+
            "</div>"+          
            
        "</div> <hr>");
}
/* + Math.round(distance*100 )/100 + */


function makeShelterPage(src, cntrNme, suburb){
    if($("#Cimage").find('img')){
        $("#Cimage > img").remove();
    }
    $("#Cimage").append("<img style='width:100%;' src='" + src + "'>");
    $('#Cname').text(cntrNme);
    
    $("#suburb").empty();
    $("#suburb").append(suburb);
    
    /*
    if(openOrClose == 'rehab_aqua'){
        $('#currentlyOpenOrClose').text('Currently Open');
        $('#currentlyOpenOrClose').css({color:'#00b7bd'});
    } else if(openOrClose == 'rehab_grey'){
        $('#currentlyOpenOrClose').text('Currently Close'); $('#currentlyOpenOrClose').css({color:'grey'});
    }*/
    
}


$('#IdonKnow').click(function(){
    $('#warnBox').hide();
    $('.warning, #blackBg, #IdonKnowBox').show();
        $('#blackBg').css({
            height: ($(document).height() )
        });
});

$('#trapezoidMenu').click(function(){
    $('#wrapper').animate({left:- ($(window).width()*.80 ), right:( $(window).width()*.80 )}, 700); 
    $('#blackLayer').show();
    $('#menuDiv').css({display: 'block'});
});

$('#closeMenu').click(function(){
    $('#wrapper').animate({left:0, right:0}, 700, function(){$('#menuDiv').css({display: 'none'});});
    $('#blackLayer').hide();
});

$('#myClosestShelters').click(function(){

    liveDead('img/wildlife_icons/Land_Mammals/Possum.png',imgQuestionOrText)
    $('#WS, .cont, .land, .waterMammals, .birds, .introduced, .reptilesAmphibians, #arrow-down, #arrow-up, #moreLess, #underUtility, .IdntKnowAndClosestShel').hide();
    
    $('#liveDead, #whatHapn, .footer').hide();
    $('#map-canvas, #mapFooter, #mapModal, #LocationBox, #mapFA, #mapLoc, #listicon').show();
    // Align it to the center 
    $('#LocationBox').css({
        top: ( ($(window).height()-$('#LocationBox').height() )/2 ),
        left: ( ($(window).width()-$('#LocationBox').width() )/2 )
    });
    resizeMap();
    
    plotMarkers(); 
    
    // set the width of the search field dynamically
    $('.searchInput').animate({
        width: ($(window).width()*0.50)
    });
    $('.titlePane').animate({height: '25px'});

    leftArrowVisibility =3;
    tmp ='map';
});

function giveProperAdvice(){
    
    // proper advice should be retrievd from here
    // then should be injected to this variable to be visible in first aid panel
    
    //read data from csv and show them here
    getFaAdvices();
    //firstAidAdvice = '';
}
$('#srchClose').click(function(){
    $('#srch, #srchClose,#blackLayer').hide();  
});

























