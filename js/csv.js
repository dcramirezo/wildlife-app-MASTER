$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "species.csv",
        dataType: "text",
        success: function(data) {processData(data);}
        });

    // Let's process the data from the data file
    function processData(data) {
        var lines = data.split('##');

        //Set up the data arrays
        //var time = [];
        //var data1 = [];
        //var data2 = [];
        //var data3 = [];

        //var headings = lines[0].split(','); // Splice up the first row to get the headings

        //for (var j=1; j<lines.length; j++) {
        //var values = lines[j].split(','); // Split up the comma seperated values
           // We read the key,1st, 2nd and 3rd rows 
           //time.push(values[0]); // Read in as string
           // Recommended to read in as float, since we'll be doing some operations on this later.
           //data1.push(parseFloat(values[1])); 
           //data2.push(parseFloat(values[2]));
           //data3.push(parseFloat(values[3]));
        console.log(lines[0]);

       //}

    // For display
    //var x= 0;
    //console.log(headings[0]+" : "+time[x]+headings[1]+" : "+data1[x]+headings[2]+" : "+data2[x]+headings[4]+" : "+data2[x]);
    }
})