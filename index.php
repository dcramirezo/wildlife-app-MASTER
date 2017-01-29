<?php include('/includes/header.php'); ?>

<div id="wrapper" class ="container-fluid" >
    <div class="headCont">
        <div class="row">  
            <!-- Utility Bar -->    
            <?php include('/includes/utilityBar.php'); ?> 
        </div>
        <div class="WS row" id="underUtility">
            <br>
            <b> <span id="WhatSpe">What species is the animal?</span></b>

            <input type="text" id="srch" placeholder="Search.." style="text-align:center;">

        </div>
        <div class="cont">
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
            <div id="lssr">
                <!-- LLLLLLLLLLLL Land Wildlifes LLLLLLLLLLLL--> 
                <?php include('/includes/land.php'); ?>
                <!-- LLLLLLLLLLLL End of LAND LLLLLLLLLLLLLLL-->  

                <!-- SSSSSSSSSSSSS Sea WildLife SSSSSSSSSSSSS--> 
                <?php include('/includes/sea.php'); ?>   
                <!-- SSSSSSSSSSSSSSS End Sea SSSSSSSSSSSSSSSS--> 

                <!-- KKKKKKKKKKKKKK Sky Wildlife KKKKKKKKKKK -->
                <?php include('/includes/sky.php'); ?>    
                <!-- KKKKKKKKKKKkk End of Sky KKKKKKKKKkkKKK -->

                <!-- RRRRRRRRRRRRR River Wildlife RRRRRRRRRR -->
                <?php include('/includes/river.php'); ?>     
                <!-- RRRRRRRRRRRRR End of River RRRRRRRRRRRR -->    
            </div>
        </div> 
        <?php include('includes/mapDiv.php'); ?>
        <!-- here the liveDead section is included -->
        <?php include('includes/liveDead.php'); ?>
        <!-- here the whatHapn section is included -->
        <?php include('includes/whatHapn.php'); ?>
        <?php include('/includes/panel.php'); ?>
        <!--?php include('/includes/mapDiv.php'); ?-->

        <img class="bckNxt" src="img/left.png" id="leftArrow">
        <img class="bckNxt" src="img/left.png" id="leftArrow2">
    
    </div> <!-- End of headCont -->
    <!-- footer needs to be down here otherwise jquery stuff will not work as they all include into footer.php -->
    <?php include('/includes/footer.php'); ?>   
    
</div>





    <!--div class="row">
        <button id="btn"> List TAXONs</button>
        <button id="btn1"> List Wildlifes</button>
        <input type="text" id="taxonID" style="text-align:center;">
        <h5><strong>Common Name:</strong></h5><br>
    </div-->
