<?php    

    $sql = "SELECT * FROM organisations";
    $query = mysql_query($sql);
    //$row = mysql_fetch_object($query);
    while($row = mysql_fetch_object($query)) { 
  ?>  
    <script type="text/javascript">
        /*addresses.push("<?php echo $row->address . ' '. $row->suburb . ' '. $row->state . ' ' . $row->postcode; ?>"); */
        /*icons.push("<?php echo $row->spec ?>");*/
        /*LatLngs.push("<?php echo $row->lat . ','. $row->lng; ?>" ); */
        
        centersInDb.push("<?php echo $row->org_name . ',' . $row->spec . ','. $row->lat . ','. $row->lng . ','. $row->contact_person . ','. $row->phone ; ?>" );
        
        
    </script>
<?php        
    }
?>
<script type="text/javascript">
    function plotMarkers(){
        
        //for(var i=0; aa.length; i++){
            //getCoordinates(aa[i]);
        //}
        
        
        $.each(addresses, function(index, val) {
            //var icon = iconIdentifier(icons[index])
            
            var iconURL;
            //var iconSize = new google.maps.Size(50, 50)
                        
            console.log(index +' ' +iconURL.scaledSize);
            
            getCoordinates(val,iconURL);
 
            //coords = getCoordinates(val);
            //console.log('coords '+index + ': '+ coords);
        });
    
    }
    
    
    
    
    function testPM(){
        //var adds = [];
        
        //adds.push('Pisces Caravan Resort Apollo Bay 3233 Vic');
        //adds.push('9 Poplar Street Box Hill Vic 3128');
        //adds.push('3 Point Addis Rd Bells Beach 3228 Vic');
        //adds.push('192 Mountjoy Parade Lorne 3232 Vic 3131');
        //adds.push('78 Bambra Rd Aireys Inlet 3231 Vic');
        //adds.push('15 McMahon Ave Anglesea 3230 Vic');
        //adds.push('8-10 Durimbil Ave Wye River 3234 Vic');
        //adds.push('1-2 Gerard Ave Kennett River 3234 Vic');
        //adds.push('14 Joyce St Apollo Bay 3233 Vic');
        //adds.push('60 Sunnyside Rd Wongarra 3234 Vic');
        //adds.push('19 Ferrier Dr Marengo 3233 Vic');
        
        
        //adds.push('6150 Great Ocean Rd Apollo Bay 3233 Vic'); 
        //adds.push('65 Sunnyside Rd Wongarra 3234');
        //adds.push('5 Hawdon Ave Kennett River 3234 Vic'); 
        //adds.push('45 Riverside Dr Wye River 3234 Vic');
        //adds.push('4-6 Olive St Separation Creek 3234 Vic');
        //adds.push('Blanket Bay Rd Cape Otway 3233 Vic');
        //adds.push('525 Hordern Vale Rd Hordern Vale 3238 Vic');
        //adds.push('6 Galbraith Way Marengo 3233 Vic');
        //adds.push('15 Newcombe St Marengo 3233 Vic');
        //adds.push('67 Pennyroyal Station Rd Pennyroyal 3235 Vic');
        //adds.push('7-9 Waverley Ave Lorne 3232 Vic');
        //adds.push('83 Dorman St Lorne 3232 Vic');
        
        //adds.push('35 Boyd Ave Moggs Creek 3231 Vic');
        //adds.push('1 Boundary Rd Aireys Inlet 3231 Vic');
        //adds.push('9 Hyland Ct Anglesea 3230 Vic');
        //adds.push('1 Wilkins St Anglesea 3230 Vic');
        //adds.push('81 Bones Rd Bells Beach 3228 Vic');
        //adds.push('2A Headland Dr Torquay 3228 Vic');
        //adds.push('720 Sunnyside Road Wongarra 3234 Vic');
        //adds.push('575 Forrest-Apollo Bay Rd Barramunga 3249 Vic');
        //adds.push('135 Sand Rd Glenaire 3238 Vic');
        //adds.push('Melbourne Zoo Elliott Ave Parkville 3052 Vic');
        
        
        
        
        
        
        for(var i=0; i< centersInDb.length; i++){
            //getCoordinates(LatLngs[i]);
            centersInDbArr = centersInDb[i].split(",");
            
            iconUrl = iconIdentifier(centersInDbArr[1]);
            console.log(iconUrl);
            var icon = {
                url: iconUrl,
                scaledSize: new google.maps.Size(30, 30), // scaled size
            }
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(centersInDbArr[2],centersInDbArr[3]),
                icon: icon,
                map: map
            });
        }
        
    }
    
    
</script>



    

