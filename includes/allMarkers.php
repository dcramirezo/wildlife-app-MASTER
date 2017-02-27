<?php
    require('connect_db.php');
  
    $sql = "SELECT * FROM organisations";
    $query = mysql_query($sql);
    
    $centersDetails = array();

    while($row = mysql_fetch_object($query)) { 
        array_push($centersDetails, $row);
    }

    echo json_encode($centersDetails);


?> 