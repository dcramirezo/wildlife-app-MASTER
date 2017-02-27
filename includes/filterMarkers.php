<?php
    require('connect_db.php');
    
    $lat       = $_POST['lat'];
    $lng       = $_POST['lng'];
    //$distance  = $_POST['distance'];
   
    $listOfFilterdMarkers =" 
        SELECT organisations.* , ( 6371 * acos( cos( radians(".
        $lat 
        .") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(".
        $lng
        .") ) + sin( radians(".
        $lat
        .") ) * sin( radians( lat ) ) ) ) AS distance FROM organisations HAVING distance < 20 ORDER BY distance ;";
       
        $query = mysql_query($listOfFilterdMarkers);
    
        $tArrat = array();
        while($row1 = mysql_fetch_object($query)) {
            
            array_push($tArrat, $row1);
        }

    echo json_encode($tArrat);


?> 