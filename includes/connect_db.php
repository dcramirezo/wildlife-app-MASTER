<?php

    $db_host = "localhost";
    $db_username = "adkaselc_cfa";
    $db_password = "Wildlife123";
    $db_name = "adkaselc_wildlifeapp_delwp";
 
    @mysql_connect("$db_host","$db_username","$db_password") or die("Could not connect to MYSQL");
    @mysql_select_db("$db_name") or die("No database"); 

?>