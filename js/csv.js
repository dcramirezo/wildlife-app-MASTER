//$(document).ready(function() {
  function getFaAdvices(){  
    $.ajax({
        type: "GET",
        url: "firstaid_DB.csv",
        dataType: "text",
        success: function(data) {processData(data);}
        });

     //Let's process the data from the data file
    function processData(data) {
        var lines = data.split('##');

        //Set up the data arrays
        //var time = [];
        //var data1 = [];
        //var data2 = [];
        //var data3 = [];

        //var headings = lines[0].split(','); // Splice up the first row to get the headings

        for (var i=2; i<lines.length; i++) {
        var values = lines[i].split('**'); // Split up the comma seperated values
           // We read the key,1st, 2nd and 3rd rows 
           //time.push(values[0]); // Read in as string
           // Recommended to read in as float, since we'll be doing some operations on this later.
           //data1.push(parseFloat(values[1])); 
           //data2.push(parseFloat(values[2]));
           //data3.push(parseFloat(values[3]));
        
            for (var j=1; j<values.length; j++) {
                
                var SpeciesNames = values[1].split(',');
                //SpeciesNames.replaceAll("\\p{C}", "");
                for(var k=0; k<SpeciesNames.length;k++){
                    //console.log(SpeciesNames[k].replace(/[^ -~]/g, '') );
                    if(SpeciesNames[k].replace(/[^ -~]/g, '') == wildlifeName){
                        console.log('Species found!');
                       } else{
                          console.log('not found!');
                       }                   
                }

                //console.log($.trim(values[2]) );
            } 


       }


    

    }
}