<!doctype>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
</head>
<body>
<button id="btn" onclick="filterMarkers();"> Ajax
    
</button>

    
<script>
function filterMarkers(){
        $.ajax({
            type: 'POST',
            url: 'test1.php',
            data:{
                lat: -38.3120567,
                lng: 144.33621900000003
            },
            success: function(result) {
                
                console.log('result: '+result);
            },
            error: function(){
                console.log('error');
            }
        });
        
        /*
        $.post('', { 
            lat: -38.3120567,
            lng: 144.33621900000003
        
        }, function(data) {
          console.log(data);

        }); */
    }

    </script>
</body>
</html>