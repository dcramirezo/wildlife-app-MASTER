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
        height: ($('#warnBox').height() *0.3)
    });
    $('#warnTitle').css({
        marginLeft: ( ($('#warnHead').width() -$('#warnTitle').width() )/2  )
    })

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
        height: ($('#warnBox').height() *0.3)
    });
    $('#warnTitle').css({
        marginLeft: ( ($('#warnHead').width() -$('#warnTitle').width() )/2  )
    });    
    
})