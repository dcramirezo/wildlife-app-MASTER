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
    
})

function setFooterHeight(){
    if ( ($('.panelContent').height() + $('.panelHeader').height() ) >= $(window).height() ){
        
        console.log('FA Pressed: '+($('.panelContent').height() + $('.panelHeader').height() )  );
        
        $('#firstAidFooter').css({
            top: ( ( $('.panelContent').height() + $('.panelHeader').height() ))
        });
    }else if(($('.panelContent').height() + $('.panelHeader').height() ) < $(window).height()){
        
        console.log('No Pressed: '+$(window).height());
        $('#firstAidFooter').css({
            top: ($('.panel').height()-$('#firstAidFooter').height()-20 )
        });        
    }    
} 