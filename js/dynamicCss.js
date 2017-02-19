$(document).ready(function(){
    $('#utilityBar').css({
        height:($(window).height()*.10)
    });
    $('.menuBar').css({
        height:($(window).height()*.07)
    }); 
    $('.imgText').css({
        height:($(window).height()*0.18)
    }); 
    $('#underUtility').css({
        height:($(window).height()*0.18)
    });
    $('.imgText').css({
        height:($(window).height()*0.2)
    });
    $('#warnHead').css({
        height: ($('#warnBox').height() *0.25)
    });
    $('#warnTitle').css({
        marginLeft: ( ($('#warnHead').width() -$('#warnTitle').width() )/2  )
    });
    $('#mapMenuModal').css({
        top: ( $(window).height()*.10 )
    });   
    $('#map-canvas').css({
        height: ($(window).height()*0.83),
        //overflow: 'visible'
        
    });
    
    //console.log( $('#warnTitle').width()  );
    
    
})


// Window resize 
$(window).resize(function(){
    
$('#utilityBar').css({
        height:($(window).height()*.10)
    });
    $('.menuBar').css({
        height:($(window).height()*.07)
    }); 
    $('.imgText').css({
        height:($(window).height()*0.18)
    }); 
    $('#underUtility').css({
        height:($(window).height()*0.18)
    });
    $('.imgText').css({
        height:($(window).height()*0.2)
    });
    $('#warnHead').css({
        height: ($('#warnBox').height() *0.25)
    });
    $('#warnTitle').css({
        marginLeft: ( ($('#warnHead').width() -$('#warnTitle').width() )/2  )
    });  
    $('#mapMenuModal').css({
        top: ( $(window).height()*.10 )
    });
    $('#firstAidFooter').css({
        top: ( $('.panelContent').height() + $('.panelHeader').height() )
    });
    $('#map-canvas').css({
        height: ($(window).height()*0.83)
    });
    
})

function setFooterHeight(){
    if ( ($('.panelContent').height() + $('.panelHeader').height() ) >= $(window).height() ){
        
        $('#firstAidFooter').css({
            top: ( ( $('.panelContent').height() + $('.panelHeader').height() ))
        });
    }else if(($('.panelContent').height() + $('.panelHeader').height() ) < $(window).height()){
        
        $('#firstAidFooter').css({
            top: ($('.panel').height()-$('#firstAidFooter').height()-40 )
        });        
    }  
    
    //set keysFooter top property    
    if ($('.keys').height()  >= $(window).height() ){
        
        $('.keysFooter').css({
            top: ( $('.keys').height() )
        });
    }else if( $('.keys').height()  < $(window).height() ){
        
        $('.keysFooter').css({
            top: ($('.keys').height()-$('.keysFooter').height()-40 )
        });        
    } 
} 