
    <div id="mapDiv">
        
    <!-- This section will be shown when the mapDiv page is loaded -->        
        <div id="mapModal">

        </div>        
        <div id="LocationBox">
            <div style="position:absolute; right: 4%; top:1.5%;">
                <span id="mapModalClose" style="font-size:22px;">X</span>
            </div>

            <div id="mapDGeoQ" >
                <span>Can We use your current location?</span>
            </div>
            <div id="mapDGeoQ">
                <a id="mapYes" class="waves-effect waves-light btn buttons" style="width:40%; font-size:100%;" >Yes</a>
            </div>
            <div id="mapDGeoQ">
                <span>Or enter postcode bellow</span>
            </div>
            <div style="text-align:center;">
                <input type="text" id="Pcode" placeholder="Postcode.." style="text-align:center; color:black;">
            </div>

        </div>
        <?php include('includes/mapMenuModal.php');?>
    
        <div class="row" id="mapFooter">
            <!-- 1st row = Key icons -->
            <!--div class="row">
                <div class="col s4 m4 l4">
                    <img class="MFB" id="mapList" src="img/keys/listicon-alt.png">
                </div>
                <div class="col s4 m4 l4">
                    <img class="MFB" id="mapCenters" src="img/keys/mapicon-alt.png">
                </div>
                <div class="col s4 m4 l4">
                    <img class="MFB" id="mapKeys" src="img/keys/keyicon-alt.png">
                </div>
            </div-->
            <!-- 2nd row = Key icons's text -->
            <!--div class="row">
                <div class="col s4 m4 l4">
                    <span class="fontCol" style="font-size:100%; font-weight:bold;">Home</span>
                </div>
                <div class="col s4 m4 l4">
                    <span class="fontCol" style="font-size:100%; font-weight:bold;">Centers</span>
                </div>
                <div class="col s4 m4 l4">
                    <span class="fontCol" style="font-size:100%; font-weight:bold;">Key</span>
                </div>
            </div-->
            <!-- First Aid Button -->
            <div class="row" style="bottom:4%;">
                <div class="col s12 m12 l12">
                    <div>
                        <img class=" MFB" id="mapFA" src="img/keys/firstaidicon.png">
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
  
                <!--div class="col s6 m6 l6">
                    <a class="waves-effect waves-light btn buttons" id="locBoxSrch" style="; width:100%; font-size:100%;" id="mapFA">Search </a>
                </div>
                <div class="col s6 m6 l6">
                    <a class="waves-effect waves-light btn buttons" style="background-color:red; width:100%; font-size:100%;" id="mapFA">First Aid</a>
                </div-->
                
            </div>

            
            
            
            
            
        </div>
    </div>