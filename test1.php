<?php
    $lat       = $_POST['lat'];
    $lng       = $_POST['lng'];

    $tArrat = array();

    array_push($tArrat, $lat, $lng);

    print_r($tArrat);
    //echo $lat;
?>