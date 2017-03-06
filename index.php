<?php include('includes/header.php'); ?>

<div id="wrapper" class ="container-fluid" >
    <div class="headCont">
        <div class="row">  
            <!-- Utility Bar -->    
            <?php include('includes/utilityBar.php'); ?> 
        </div>
        <div>
            <?php include('includes/menuBar.php'); ?>
        </div>
        <div class="WS row" id="underUtility">
            <br>
            <b> <span id="WhatSpe">What species is the animal?</span></b>

            <input type="text" id="srch" placeholder="Search Species" style="text-align:center; margin-bottom:5px;">
            <div class="AutoUL" id="species" ></div>
            <div><span> Or select a common species bellow</span></div>
        </div>
        <div class="cont">
            <!-- Radio buttons -->
            <!--div class="rdo row">  
                <input type="radio" name="cat" id="rdo-land" value="Land"/>
                <label for="rdo-land">Land</label>

                <input type="radio" name="cat" id="rdo-sea" value="sea"/>
                <label for="rdo-sea">Sea</label>

                <input type="radio" name="cat" id="rdo-sky" value="sky"/>
                <label for="rdo-sky">Sky</label>

                <input type="radio" name="cat" id="rdo-river" value="river"/>
                <label for="rdo-river">River </label>

            </div-->
            <div>
                <a id="filter" class="waves-effect waves-light btn buttons" style=" font-size:100%;" >Filter</a>
            </div>
            <br>    
            <!-- Land Sea Sky River -->
            <div id="lssr">
                
                <!-- CCCCCCC Common Species CCCCCCC--> 
                <?php include('includes/commonSpecies.php'); ?>
                <!-- CCCCC End Common Species CCCCCCC-->  
                
                <!-- LLLLLL Land Wildlifes LLLLLLLL--> 
                <?php include('includes/land.php'); ?>
                <!-- LLLLLLL End of LAND LLLLLLLLLL-->  

                <!-- SSSSSSS Sea WildLife SSSSSSSSS--> 
                <?php include('includes/sea.php'); ?>   
                <!-- SSSSSSSSS End Sea SSSSSSSSSSSS--> 

                <!-- KKKKKKKKK Sky Wildlife KKKKKKKKK -->
                <?php include('includes/sky.php'); ?>    
                <!-- KKKKKKKKk End of Sky KKKKKKkkKKK -->

                <!-- RRRRRRRRR River Wildlife RRRRRRR -->
                <?php include('includes/river.php'); ?>     
                <!-- RRRRRRRR End of River RRRRRRRRRR -->    
            </div>
        </div> 
        <?php include('includes/mapDiv.php'); ?>
        <!-- here the liveDead section is included -->
        <?php include('includes/liveDead.php'); ?>
        <!-- here the whatHapn section is included -->
        <?php include('includes/whatHapn.php'); ?>
        <?php include('includes/panel.php'); ?>
        <?php include('includes/warning.php'); ?>
        <?php include('includes/filter.php'); ?>
        <!--?php include('includes/mapDiv.php'); ?-->


        <div class="downF" >
            <p><b><span id="moreLess">More</span></b></p>
            <img class="responsive-img" src="img/arrow-down.png" id="arrow-down" style="position:relative; top:-13px;">
            <img class="responsive-img" src="img/arrow-up.png" id="arrow-up" >
        </div>
    
    </div> <!-- End of headCont -->
    <!-- footer needs to be down here otherwise jquery stuff will not work as they all include into footer.php -->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/connect_db.php'); ?> 
    <?php include('includes/mapjs.php'); ?> 
    
</div>





    <!--div class="row">
        <button id="btn"> List TAXONs</button>
        <button id="btn1"> List Wildlifes</button>
        <input type="text" id="taxonID" style="text-align:center;">
        <h5><strong>Common Name:</strong></h5><br>
    </div-->
