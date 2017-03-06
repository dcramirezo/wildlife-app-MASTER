
    <!--div id="mapDiv"-->
    <div id="map-canvas">
    </div>  
    <!-- This section will be shown when the mapDiv page is loaded -->        
        <div id="mapModal">

        </div>        
        <div id="LocationBox">
            <div style="position:absolute; right: 4%; top:1.5%;">
                <span id="mapModalClose" style="font-size:22px;">X</span>
            </div>

            <div id="mapDGeoQ" >
                <span>Can we use your current location?</span>
            </div>
            <div id="mapDGeoQ">
                <a id="mapYes" class="waves-effect waves-light btn buttons" style="width:40%; font-size:100%;" >Yes</a>
            </div>
            <div id="mapDGeoQ">
                <span>Or enter your address bellow</span>
            </div>
            <div style="text-align:center;">
                <input type="text" id="Pcode" placeholder="Postcode.." style="text-align:center; color:black;">
            </div>
            <div>
                 <!--a id="" class="waves-effect waves-light btn buttons" style=" font-size:80%;" >Show all Wildlife Centers</a-->
            </div>
            
        </div>
        <?php include('includes/mapMenuModal.php');?>
    
        <div class="row" id="mapFooter">
            <!-- First Aid Button -->
            <div class="row" style="bottom:4%;">
                <div class="col s12 m12 l12">
                    <div>
                        <img class=" MFB" id="mapFA" src="img/keys/firstaidicon.png">
                    </div>
                    <div>
                        <img class=" MFB" id="mapLoc" src="img/keys/mapicon-alt.png">
                    </div>
                    <div>
                        <img class=" MFB" id="listicon" src="img/keys/listicon.png">
                    </div>
                    <div>
                        <img class=" MFB" id="mapMenu" src="img/keys/menuicon2.png">
                    </div>
                    <div>
                        <img class=" MFB" id="mapKey" src="img/keys/keyicon-alt.png">
                    </div>
                    
                </div>
  

            </div>

 
        </div>
        
        
    <!--/div-->