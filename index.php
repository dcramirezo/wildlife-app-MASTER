<?php 

    include('/includes/header.php');
?>

<div id="wrapper" class ="container-fluid" >
    <div class="row">  
        <!-- Utility Bar -->    
        <?php include('/includes/utilityBar.php'); ?> 
    </div>
    <div class="WS row" id="underUtility">
        <br>
        <b> <span id="WhatSpe">What species is the animal?</span></b>

        <input type="text" id="srch" placeholder="Search.." style="text-align:center;">
       
    </div>
    <!-- Radio buttons -->
    <div class="rdo row">  
        <input type="radio" name="cat" id="rdo-land" value="Land" checked/>
        <label for="rdo-land">Land</label>

        <input type="radio" name="cat" id="rdo-sea" value="sea"/>
        <label for="rdo-sea">Sea</label>

        <input type="radio" name="cat" id="rdo-sky" value="sky"/>
        <label for="rdo-sky">Sky</label>
        
        <input type="radio" name="cat" id="rdo-river" value="river"/>
        <label for="rdo-river">River </label>

    </div>
    <br>    
    <!-- Radio Buttons -- Land See Sky River -->

    <!-- LLLLLLLLLLLL Land Wildlifes LLLLLLLLLLLLLLL--> 
    <?php include('/includes/land.php'); ?>
    <!-- LLLLLLLLLLLL End of LAND LLLLLLLLLLLLLLLLLL-->  
    
    <!-- SSSSSSSSSSSSSSS Sea WildLife SSSSSSSSSSSSSS--> 
    <?php include('/includes/sea.php'); ?>   
    <!-- SSSSSSSSSSSSSSS End Sea SSSSSSSSSSSSSSSSSSS--> 
    
    <!-- KKKKKKKKKKKKKK Sky Wildlife KKKKKKKKKKKKKK -->
    <?php include('/includes/sky.php'); ?>    
    <!-- KKKKKKKKKKKkk End of Sky KKKKKKKKKKKKKKKK -->
    
    <!-- RRRRRRRRRRRRR River Wildlife RRRRRRRRRRRRRRR -->
    <?php include('/includes/river.php'); ?>     
    <!-- RRRRRRRRRRRRR End of River RRRRRRRRRRRRRRRRR -->    

    <!-- here the liveDead page is included -->
    <?php include('includes/liveDead.php'); ?>
    
    <?php
        include('/includes/footer.php');
    ?>    
    
</div>
<img class="bckNxt" src="img/left.png" onclick="leftArrow()">




    <!--div class="row">
        <button id="btn"> List TAXONs</button>
        <button id="btn1"> List Wildlifes</button>
        <input type="text" id="taxonID" style="text-align:center;">
        <h5><strong>Common Name:</strong></h5><br>
    </div-->
