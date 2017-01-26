
<!DOCTYPE html>
<html>
    <head>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <style>
            .div2{ background-color: red;}
            .div3{ background-color: blue;}
            .div4{ background-color: green;}
        </style>
        <script>
            $(document).ready(function(){
                
                $('.div2').animate({ 
                    width:  ($(window).width()), 
                    height: ( ($(window).height()*0.1) )     
                });
                $('.div3').animate({ 
                    width:  ($(window).width()), 
                    height: ( ($(window).height()*0.7) )     
                });
                $('.div4').animate({ 
                    width:  ($(window).width()), 
                    height: ( ($(window).height()*0.2) )     
                });                
            });   
        </script>
    </head>
    <body>
        <div class="div1">
            <div class="div2">
               RED 
            </div>
            <div class="div3">
            hhhjj
            </div>
            <div class="div4">
            jjjj
            </div>
        </div>
    </body>
</html>