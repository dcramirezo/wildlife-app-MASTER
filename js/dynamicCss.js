$(document).ready(function(){
    $('#utilityBar').css({
        height:($(window).height()*.10)
    });
    //$('.menuBar').css({
        //height:($(window).height()*.07)
    //}); 
    $('#underUtility').css({
        height:($(window).height()*0.18)
    });
    $('.logo').css({
        height:($(window).height()*0.10)
    });
    $('#menuHead').css({
        height:($(window).height()*0.10)
    });
    $('.imgText').css({
        height:($(window).height()*0.2)
    }); 
    $('.warnHead').css({
        height: ($('#warnBox').height() *0.25)
    });
    $('.warnTitle').css({
        marginLeft: ( ($('.warnHead').width() -$('.warnTitle').width() )/2  )
    });
    $('.filterBox').css({
        top: ( ($(window).height()-$('.filterBox').height() )/2 ),
        left: ( ($(window).width()-$('.filterBox').width() )/2 )
    });
    $('#filterHead').css({
        height: ($('.filterBox').height() *0.16),
        textAlign: 'center' 
    });
    $('#warnBox, #IdonKnowBox').css({
        top: ( ($(window).height()-$('#IdonKnowBox').height() )/2 ),
        left: ( ($(window).width()-$('#IdonKnowBox').width() )/2 )
    });
    
    $('#mapMenuModal').css({
        top: ( $(window).height()*.10 )
    }); 
    //$('#firstAidFooter').css({
        //top: ( $('.panelContent').height() + $('.panelHeader').height() )
    //});
    $('#map-canvas').css({
        height: ($(window).height()*0.9),  
    });  
    
    
    //console.log('win height: '+ $(window).width()  );

    
});


// Window resize 
$(window).resize(function(){
    
    $('#utilityBar').css({
        height:($(window).height()*.10)
    });
    //$('.menuBar').css({
       //height:($(window).height()*.07)
    //}); 
    $('#underUtility').css({
        height:($(window).height()*0.18)
    });
    $('.logo').css({
        height:($(window).height()*0.10)
    });
    $('#menuHead').css({
        height:($(window).height()*0.10)
    });
    
    $('.imgText').css({
        height:($(window).height()*0.2)
    });    
    $('.warnHead').css({
        height: ($('#warnBox').height() *0.25)
    });
    $('.warnTitle').css({
        marginLeft: ( ($('.warnHead').width() -$('.warnTitle').width() )/2  )
    });     
    $('.filterBox').css({
        top: ( ($(window).height()-$('.filterBox').height() )/2 ),
        left: ( ($(window).width()-$('.filterBox').width() )/2 )
    });    
    $('#filterHead').css({
        height: ($('.filterBox').height() *0.16),
        textAlign: 'center'
    });
    $('#warnBox, #IdonKnowBox').css({
        top: ( ($(window).height()-$('#IdonKnowBox').height() )/2 ),
        left: ( ($(window).width()-$('#IdonKnowBox').width() )/2 )
    });
    $('#filterTitle').css({
        marginLeft: ( ($('#filterHead').width() -$('#filterTitle').width() )/2  )
    });
    $('#mapMenuModal').css({
        top: ( $(window).height()*.10 )
    });
    //$('#firstAidFooter').css({
        //top: ( $('.panelContent').height() + $('.panelHeader').height() )
    //});
    $('#map-canvas').css({
        height: ($(window).height()*0.9)
    });
    
});

function setFooterHeight(footerHeight){
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
            top: ($(window).height()-footerHeight -20 )
        });        
    }
    
    //set shelterFooter top property    
    if ($('.shelter').height()  >= $(window).height() ){
        
        $('.shelterFooter').css({
            top: ( $('.shelter').height() )
        });
    }else if( $('.shelterContent').height()  < $(window).height() ){
        
        $('.shelterFooter').css({
            top: ($(window).height()-footerHeight - 20 )
        });        
    }
    
} 


















