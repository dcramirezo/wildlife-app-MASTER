<?php include('includes/header.php'); ?>

<div id="wrapper" class ="container-fluid" >
    <div id="blackLayer"></div>
    <div class="headCont">
        <div class="row">  
            <!-- Utility Bar -->    
            <?php include('includes/utilityBar.php');?> 
        </div>
        <!--div>
            <!--?php include('includes/menuBar.php');?>
        </div-->
        <div class="WS row" id="underUtility">
            <!--br>
            <b--><span id="WhatSpe">What is the animal?</span></b>
            
            <div class="row">
                <div class="col s6 m6 l6">
                    <input type="text" id="srch" placeholder="SEARCH SPECIES" style="text-align:center; font-size:70%; margin-bottom:5px; border_bottom:0px; padding:0px; background-color: #2bbbad; border-radius:5px; color:#FFF; box-shadow: 0 3px 3px 0 rgba(0,0,0,0.14), 0 1px 7px 0 rgba(0,0,0,0.12), 0 3px 1px -1px rgba(0,0,0,0.2);">
                    
                    
                    
                    <div class="AutoUL" id="species" ></div>
                </div>
                <div class="col s6 m6 l6">
                    <a id="filter" class="waves-effect waves-light btn buttons" style=" font-size:100%; width:100%" >Filter</a>
                </div>
            </div>
        
            <div><span> Or select a common species bellow</span></div>
        </div>
        <div class="cont">

            <!--br-->    
            <!-- Land waterMammals birds reptilesAmphibians -->
            <div id="lssr">
                
                <!-- CCCCCCC Common Species CCCCCCC--> 
                <?php include('includes/commonSpecies.php'); ?>
                <!-- CCCCC End Common Species CCCCC-->  
                
                <!-- LLLLLL Land Mammals LLLLLLLL--> 
                <?php include('includes/land.php');?>
                <!-- LLLLLLL End of Mammals LLLLLL-->  

                <!--  waterMammals WildLife --> 
                <?php include('includes/waterMammals.php');?>   
                <!--  End waterMammals --> 

                <!-- BBBBBB Birds  BBBBBB -->
                <?php include('includes/birds.php'); ?>    
                <!-- BBBBBB End of birds BBBBBB -->

                <!-- RR reptilesAmphibians  RRR -->
                <?php include('includes/reptilesAmphibians.php'); ?>     
                <!--  End of reptilesAmphibians -->
                
                <!-- IIII Introduced  IIII -->
                <?php include('includes/introduced.php'); ?>     
                <!--  End of Introduced -->
                
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
        <div class="IdntKnowAndClosestShel" style="margin-top:-35px;">
            <span style="font-size:23px; font-weight:bold;"> Or</span>
        </div>
        
        <div class="row IdntKnowAndClosestShel">
            <div class="col s6 m6 l6">
                <a id="myClosestShelters" class="waves-effect waves-light btn buttons" style="font-size:11px; width:100%; line-height:16px;" >My Closest Shelters</a>
                
            </div>
            <div class="col s6 m6 l6">
                <a id="IdonKnow" class="waves-effect waves-light btn buttons" style="font-size:70%; width:100%;" >I Don't Know?</a>
            </div>
            
        </div>
    
    </div> <!-- End of headCont -->
    <!-- footer needs to be down here otherwise jquery stuff will not work as they all include into footer.php -->

</div>

<div id="menuDiv">
    <div id="menuHead" class="">
        <span style="">Menu</span>
        <div style="position:absolute; right: 4%; top:1.5%;">
            <span id="closeMenu" style="font-size:22px;">X</span>
        </div>
  
    </div>
    <div id="menuContent">
        <div class="collection">     
            <a id="mapHome" class="collection-item"><h6>Home</h6></a>
            <a id="mapAbout" class="collection-item"><h6>About</h6></a>
            <a id="mapFAQ" class="collection-item">
            <h6>F.A.Q</h6></a>
            <a id="mapHelp" class="collection-item"><h6>Help</h6></a>
            <a id="Wgroups" class="collection-item"><h6>Wildlife Groups</h6></a>
            <a id="mapRegister" class="collection-item"><h6>Register</h6></a>
            <a href="https://www2.delwp.vic.gov.au/" id="mapDELWP" class="collection-item" style="padding-left:20%;"><h6>Department of Environment, Water, Land & Planning</h6></a>
        </div> 
        
    </div>
</div>


<?php include('includes/footer.php'); ?>
<?php include('includes/connect_db.php'); ?> 
<?php include('includes/mapjs.php'); ?> 
    



    <!--div class="row">
        <button id="btn"> List TAXONs</button>
        <button id="btn1"> List Wildlifes</button>
        <input type="text" id="taxonID" style="text-align:center;">
        <h5><strong>Common Name:</strong></h5><br>
    </div-->
