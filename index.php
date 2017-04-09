<?php include('includes/header.php'); ?>

<div id="wrapper" class ="container-fluid" >
    <div id="blackLayer"></div> <!--this is a black half-transparent layer which apprears behind the popups -->
    <input type="text" id="srch" placeholder="SEARCH SPECIES" style="text-align:center; font-size:100%; margin-bottom:5px; border_bottom:0px; padding:0px; background-color: #2bbbad; border-radius:5px; color:#FFF; box-shadow: 0 3px 3px 0 rgba(0,0,0,0.14), 0 1px 7px 0 rgba(0,0,0,0.12), 0 3px 1px -1px rgba(0,0,0,0.2);">
    <div class="AutoUL" id="species" ></div>
    <a id="srchClose" class="waves-effect waves-light btn buttons" style=" font-size:80%; width:50%" >Close</a>
    
    <div class="headCont">
        <div class="row">  
            <!-- Utility Bar -->    
            <?php include('includes/utilityBar.php');?> 
        </div>
        <!--div>
            <!--?php include('includes/menuBar.php');?>
        </div-->
        <div class="WS row" id="underUtility">
            <!--br-->
            <div>
                <span style="font-size: 100%;font-weight:bold;color:#00b7bd">
                    This tool is used to find wildlife
                    <br>rehabilitaters in your area.
                </span>
            </div>
            <b><span id="WhatSpe">What is the animal?</span></b>
            
            <div class="row">
                <div class="col s6 m6 l6">
                    <a id="srchBtn" class="waves-effect waves-light btn buttons" style=" font-size:75%; width:100%" ><i class="material-icons right">search</i>Search</a>
                    
                </div>
                <div class="col s6 m6 l6">
                    <a id="filter" class="waves-effect waves-light btn buttons" style=" font-size:75%; width:100%" >Filter</a>
                </div>
            </div>
        
            <div style="padding-top:5px;"><span> Or select a common species bellow</span></div>
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


        <!-- down &#709;  &#708; up-->
        <div class="downF" >
            
            <!--a id="" class="waves-effect waves-light btn buttons" style=" font-size:100%; width:190px;" >More Animals <img class="responsive-img" src="img/arrow-down-white.png" id="arrow-down" style="position:relative; top:-13px;"></a-->
            
            
            <p><b><span id="moreLess">More Animals</span></b></p>
            <img class="responsive-img" src="img/arrow-down.png" id="arrow-down" style="position:relative;">
            <img class="responsive-img" src="img/arrow-up.png" id="arrow-up">
        </div>
        <div class="IdntKnowAndClosestShel" style="margin-top:0px;">
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
        <!--div class="collection">     
            <a id="mapHome" class="collection-item"><h6><b>Home</b></h6></a>
            <a id="mapAbout" class="collection-item"><h6><b>About</b></h6></a>
            <a id="mapFAQ" class="collection-item">
            <h6><b>F.A.Q</b></h6></a>
            <a id="Wgroups" class="collection-item"><h6><b>Partners</b></h6></a>
            <a id="mapHelp" class="collection-item"><h6><b>Help</b></h6></a>
            <!--a id="mapRegister" class="collection-item"><h6><b>Register</b></h6></a-->
            <!--a href="https://www2.delwp.vic.gov.au/" id="mapDELWP" class="collection-item" style="padding-left:20%;"><h6><b>Department of Environment, Water, Land & Planning</b></h6></a>
        </div--> 
        
        
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header" id="mapHome">Home</div>
        </li>
        <li>
          <div class="collapsible-header">About</div>
          <div class="collapsible-body" style="    background-color: #F4F6F6;"><div style="margin-left:25%; text-align:left;"><span>The Department of Environment, Water, Land and Planning in association with Code for Australia are proud to launch the Incident and Emergency Wildlife.<br>
          This Map was built to serve the community in locating wildlife rehabilitaion centers in Victoria, in attempt to reduce the amount of calls regarding injured wildlife going to either the police or an incorrect service.<br>
          Also involved were Zoos Victoria to help with the first aid advice given throughout the prototype, multiple Wildlife Goups from around Victoria and Australia, Parks Victoria and a range of user centerd testing and workshops to build what you see before you.
              </span></div>
              
              </div>
        </li>
        <li>
          <div class="collapsible-header">F.A.Q</div>
          <div class="collapsible-body" style="background-color: #F4F6F6;"><div style="margin-left:25%; text-align:left;"> 
              <span>
                  <b>Where can I find specific species?</b><br>
                  Due to the prototype having to be built in a short time frame, we were only able to gather enough information on around 60 specie groups that the department identified as the  most reported animals in wildlife incidences.<br>
                  <b>What if I have been bitten?</b>
                  If you have been bitten or in any way injured it is best to seek professional medical assistance. If the animal is dangerous, make sure you remove yourself from the situation and always have your health as a priority.<br>
                  <b>How can I register to become a Wildlife Rehabilitator?</b>
                  If you have been bitten or in any way injured it is best to seek professional medical assistance. If the animal is dangerous, make sure you remove yourself from the situation and always have your health as a priority.
              </span></div></div>
        </li>
        <li>
          <div class="collapsible-header">Partners</div>
          <div class="collapsible-body" style="background-color:#F4F6F6; margin-left:25%; text-align:left;"><span>DELWP (Department of Environment, Land, Water and Planning) <br> Zoos Victoria <br> Parks Victoria.</span></div>
        </li>
        <li>
          <div class="collapsible-header">Help</div>
          <div class="collapsible-body" style=" margin-left:25%; text-align:left; background-color: #F4F6F6;"><span>Details.</span></div>
        </li>
        <li>
          <a href="https://www2.delwp.vic.gov.au/"><div class="collapsible-header"><span style="padding-left:20%; color:black;">Department of Environment, Water, Land & Planning</span></div></a>
        </li>  
          
      </ul>        
        
        
        
        
        
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
