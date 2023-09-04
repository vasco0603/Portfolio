
function init() {
    var w = 600;
    var h = 400;

    var statew = 500;
    var stateh = 300;
    //var w and h and const barpadding is variables representing width, height

    var svg = d3.select("#chart") // creates the the SVg for the choropleth and implements the zoom function
        .append("svg")
        .attr("width", w)
        .attr("height", h)
        .attr("fill", "grey")
        .attr("class", "canvas")
        .call(d3.zoom().on("zoom", zoomed));

    var legend = d3.select("#chart") // creates the SVg for the legend to be added too
        .append("svg")
        .attr("width", w/2)
        .attr("height", h)
        .attr("fill", "grey")
        .attr("class", "canvas");

    function zoomed(event) {
        svg.selectAll("path").attr("transform", event.transform); //setting up the zoom function
        }
        var zoom = d3.zoom()
            .scaleExtent([1, 50])
                .on("zoom", zoomed);

    svg.call(zoom);

    var svg1clicked = false;
    var svg2;
    var svg2clicked = false;


    //initializing a border to clear things up
    var bordercolor = "black";
    var border = 1;

    var fixedGroup = svg.append("g");

    var borderPath = fixedGroup.append("rect")//makes the border fixed so that the border is not zoomed into
        .attr("x", 0)
        .attr("y", 0)
        .attr("height", h)
        .attr("width", w)
        .style("stroke", bordercolor)
        .style("fill", "none")
        .style("stroke-width", border);

    var borderPath2;
    var oldclickedstate;
    var oldclickedlga;
    var dataset;
    var StateNum;
    var clickedLGA;
    var clickedSvg;
    var oldclickedSvg = "";



    var clickedState = "";

    var projection = d3.geoMercator() // creates the projection for the scg of the choropleth
                        .center([129,-24.5])
                        .translate([500/2, 300/2])
                        .scale(490);

    var path = d3.geoPath()
                        .projection(projection);// adds the projection to the path


    var color = d3.scaleQuantize()
        .range(['#f7fcb9', '#d9f0a3', '#addd8e', '#78c679', '#41ab5d', '#238443', '#006837', '#004529']); //sets 8 colors to be used for the choropleth



    var func_mouseinput1 = function(){
        svg.selectAll("path")
            .on("mouseover", function (event, d) { // sets the color for the lga as blue when the mouse hovers over it
            d3.select(this)
                .transition()
                .duration(200)
                .style("fill", "#0570b0");
            })
            .on("mouseout", function (event, d) {
            d3.select(this)                         // returns the lga colour back to the choroplleth colour
                .transition()
                .duration(200)
                .style("fill", function(d){
                    return color(d.properties.value)
                });
            })
            .on("click", function(event, d){
                clickedLGA = d.properties.LGA_NAME11;  // stores the lganame from the geojson
                StateNum = d.properties.STATE_CODE;    // stores the stade code from the geojson

                if (StateNum === "2") {
                    clickedState = "Victoria"; // sets the state number as the state name in a different variable
                }
                if (StateNum === "1") {
                    clickedState = "New_South_Wales";
                }
                if (StateNum === "3"){
                    clickedState = "Queensland";
                }
                if (StateNum === "8") {
                    clickedState = "Australian_Capital_Territory";
                }
                if (StateNum === "6") {
                    clickedState = "Tasmania";
                }
                if (StateNum === "4"){
                    clickedState = "South_Australia";
                }
                if (StateNum === "5") {
                    clickedState = "Western_Australia";
                }
                if (StateNum === "7") {
                    clickedState = "Northern_Territory";
                }

            lgachart = (clickedLGA).replace(/ /g, "");// removes spacing
            lgachart = (lgachart).replace(/\([^\]]*\)/g, ""); //removes brackets and anything inside the brackets
            //lgachart is used for table and barchart
            clickedLGA = (clickedLGA).replace(/\([^\]]*\)/g, "");//removes brackets and anything inside the brackets
            statechart =  (clickedState).replace(/_/g, " ");


            if (clickedLGA !== oldclickedlga) { // changes the text of the choropleth to show the selected LGA
                d3.select("#lgatext").remove();
                svg.append("text")
                    .attr("id", "lgatext")
                    .transition()
                    .duration(150)
                    .attr("x",  w/2)
                    .attr("y", h -20)
                    .text(statechart + " : " + clickedLGA);
            }



                    if (!svg2clicked) // creates the barchart svg once clicked
                    {
                        svg2clicked = true;
                        svg2 = d3.select("#chart2")
                            .append("svg")
                            .attr("width", statew)
                            .attr("height", stateh)
                            .attr("class", "canvas");


                        borderPath2 = svg2.append("rect") //creates the border for the barchart
                            .attr("x", 0)
                            .attr("y", 0)
                            .attr("height", stateh)
                            .attr("width", statew)
                            .style("stroke", bordercolor)
                            .style("fill", "none")
                            .style("stroke-width", border);
                    }



                d3.csv("CSV/"+clickedState+"/"+lgachart+".csv").then(function(data){ // gets the relative data from the csv for the barchart
                    dataset = data;
                    barchart(dataset);
                })


                d3.csv("CSV/StateCSV/merge"+clickedState+".csv").then(function(data){  // gets the relative data for the choropleth
                    var mapResult = [];
                    var tableResult = [];
                    tableDataset = data;

                    tableDataset.forEach(function(row) {

                        if (row["ethnicGroup"] === "Total") {// only gets total data

                            var fileName = row["FileName"];

                            fileName = fileName.replace(".csv", "");
                            var  population =  parseFloat(row.ethnicPopulation);
                            var  percent = parseFloat(row.ethnicPercentage)
                            var rowData = [fileName , population.toFixed()];
                            tableResult.push(rowData);// stores population and lga name data to an array
                             rowData = [fileName , percent.toFixed()];
                            mapResult.push(rowData);// stores percenage and lga name data to an array
                        }
                      });

                    createStateScrollableTable(tableResult,lgachart); // function to create table

                    d3.json("json/State/" + clickedState + ".json").then(function (json) {

                        for( var i=0; i < mapResult.length; i++){
                            var dataLGA = mapResult[i][0];
                            var dataPer = mapResult[i][1];//assigns values for the the lga and number in the csv


                           for(var j = 0; j < json.features.length; j++) {
                                var jsonLGA = json.features[j].properties.LGA_NAME11; // searchs through lga names of the geojson file


                               jsonLGA = jsonLGA.split('').filter(function(char) {
                                return isNaN(parseInt(char));
                              }).join(''); // gets rid of any special  characters in the lga name



                                if(json.features[j].properties.LGA_NAME11 === dataLGA ){ // finds a match between csv lganame and geojson lganame

                                    json.features[j].properties.value = dataPer; //once the match is found the value is assigned
                                    break;
                            }
                        }
                    }
                });

            });
            });

    }

    var barchart = function(dataset){

        var xScale = d3.scaleBand() // creates scale sizeing for the x-axis
            .domain(d3.range((dataset.length)))
            .rangeRound([50, statew-200])
            .paddingInner(0.2);


        var max = d3.max(dataset, function (d) { return +d.ethnicPopulation; }); // gets highest population value( data is from a file that does not contain total so it is not included)

        var yScale = d3.scaleLinear() //creates the scale for the y-axis
            .domain([0,max+100])
            .range([stateh - 100,0])

        var yAxis = d3.axisLeft() //creates the y-axis
                    .ticks(10)
                    .scale(yScale);

        var xAxis  = d3.axisBottom()// creates the x-axis
                    .ticks(0)
                    .tickSize(5)
                    .tickValues([])
                    /*.tickSize(5)
                    .tickFormat("")*/
                    .scale(xScale);


        svg2.selectAll("rect")// removes any pre-exisiting bars from the bar chart
            .remove();
        svg2.selectAll("g")
            .remove()



        svg2.selectAll("rect") //creates bars for the bar chart
            .data(dataset)
            .enter()
            .append("rect")
            .attr("fill", function (d,i) {
                //return "rgb(0,0," + (1 - (d.ethnicPopulation / max)) * 255;
                if (d.ethnicGroup == "Born in Oceania and Antarctica (excluding Australia) (%)") { // assigns colours that represnt thier ethnic group for each bar
                    return "#e60049";
                }
                else if (d.ethnicGroup == "Born in North-West Europe (%)") {
                    return "#0bb4ff";
                }
                else if (d.ethnicGroup == "Born in Southern and Eastern Europe (%)") {
                    return "#50e991";
                }
                else if (d.ethnicGroup == "Born in North Africa and the Middle East (%)") {
                    return "#e6d800";
                }
                else if (d.ethnicGroup == "Born in South-East Asia (%)") {
                    return "#9b19f5";
                }
                else if (d.ethnicGroup == "Born in North-East Asia (%)") {
                    return "#ffa300";
                }
                else if (d.ethnicGroup == "Born in Southern and Central Asia (%)") {
                    return "#dc0ab4";
                }
                else if (d.ethnicGroup == "Born in Americas (%)") {
                    return "#b3d4ff";
                }
                else if (d.ethnicGroup == "Born in Sub-Saharan Africa (%)") {
                    return "#00bfa0";
                }
            })
            .transition()
            .duration(500)
            .ease(d3.easeCircleOut)
            .attr("x", function (d, i) {
                return (xScale(i)); //postions the the bars along the the x-axis
            })
            .attr("height", function (d) {
                return (stateh - yScale(d.ethnicPopulation) - 100)// assigns the height of the bars
            })
            .attr("width", xScale.bandwidth()) //assigns the width of the bars
            .attr("y", function (d) {
                return (yScale(d.ethnicPopulation)+50); //postions on the bars so that they are aligned with x-axis
            });

        svg2.append("g")
            .attr("transform", "translate(0, " + (stateh - 50) + ")")
            .call(xAxis);//calling the xAxis towards the barchart svg

        svg2.append("g")
            .attr("transform", "translate(" + 50 + ",50)")
            .call(yAxis);

        svg2.append('image')// inserts the image to the right of the bar chart
            .attr('href', 'barchartcolorlegend.png')
            .attr("x", 300)
            .attr("y", 50)
            .attr('width', 200)
            .attr('height', 200);




        borderPath2 = svg2.append("rect") // creates are border around the bar chart
            .attr("x", 0)
            .attr("y", 0)
            .attr("height", stateh)
            .attr("width", statew)
            .style("stroke", bordercolor)
            .style("fill", "none")
            .style("stroke-width", border);
    }

    function createStateScrollableTable(tableResult,lgachart) { // function to create the table


        tableResult.sort(function(a, b) { // sorts the table in decending order according the the population number
            var populationA = parseFloat(a[1]);
            var populationB = parseFloat(b[1]);
            if (populationA < populationB) {
                return 1;
              } else if (populationA > populationB) {
                return -1;
              } else {
                return 0;
              }
          });


        var container = document.createElement("div"); // creates a html div for the table
        container.style.overflow = "auto";
        container.style.height = "300px"; // Adjust the height as needed



        var previousTable = document.getElementById("table"); // gets the tableID element in the html code
    if (previousTable) {
        previousTable.innerHTML = "";
    }
        var table = document.createElement("table"); // creates the table element in the html

        var titrow = table.insertRow();
        var titcell1 = titrow.insertCell();
        var titcell2 = titrow.insertCell();
        var col1Tit = ["LGA:" , "Imigrant Population:" ]; // creates the titles for the table

          titcell1.textContent = col1Tit[0];
          titcell2.textContent = col1Tit[1];

   // Create table rows
        for (var i = 0; i < tableResult.length; i++){
          var row = table.insertRow();

          // Create cells in each row
          for (var j = 0; j < tableResult[i].length; j++) {
            var cell = row.insertCell();
            cell.textContent = tableResult[i][j]; // inserts the content into the table

          }

            if (tableResult[i][0] === lgachart) {
                row.style.backgroundColor = "green"; // makes the selected LGA row green with white writing
                row.style.color = "white";
                var autoScroll = row;
            }

        }
        // Append the table to the container
        container.appendChild(table); //appends the table

        // Append the container to the specified target element
        var targetElement = document.getElementById("table");
        if (targetElement) {
          targetElement.appendChild(container);
        } else {
          console.log("Target element not found.");
        }
        autoScroll.scrollIntoView({  block: "center" }); // makes the table scroll down to the the selected LGA
      }
      let listname = [];
      let listnum = [];


    var draw_choropleth = function(){

        d3.json("json/mergeLGAs.json").then(function (json) {

            d3.csv("CSV/StateCSV/mergeNew_South_Wales.csv").then(function(d1){// adds the lga name and ethnic total percentage to an array for each state csv file
                //each csv file has to be called indivduall like this or the array will not correctly fill
                for (var z = 0; z < d1.length; z++)
                {
                    if (d1[z].ethnicGroup === "Total")
                    {
                        let filename = d1[z].FileName;
                        let perc = d1[z].ethnicPercentage;

                        listname.push(filename);
                        listnum.push(perc);
                    }
                }
                d3.csv("CSV/StateCSV/mergeNorthern_Territory.csv").then(function (d2) {
                    for (var z = 0; z < d2.length; z++) {
                        if (d2[z].ethnicGroup === "Total") {
                            let filename = d2[z].FileName;
                            let perc = d2[z].ethnicPercentage;

                            listname.push(filename);
                            listnum.push(perc);
                        }
                    }

                    d3.csv("CSV/StateCSV/mergeQueensland.csv").then(function (d4) {
                        for (var z = 0; z < d4.length; z++) {
                            if (d4[z].ethnicGroup === "Total") {
                                let filename = d4[z].FileName;
                                let perc = d4[z].ethnicPercentage;

                                listname.push(filename);
                                listnum.push(perc);
                            }
                        }

                        d3.csv("CSV/StateCSV/mergeSouth_Australia.csv").then(function (d5) {
                            for (var z = 0; z < d5.length; z++) {
                                if (d5[z].ethnicGroup === "Total") {
                                    let filename = d5[z].FileName;
                                    let perc = d5[z].ethnicPercentage;

                                    listname.push(filename);
                                    listnum.push(perc);
                                }
                            }

                            d3.csv("CSV/StateCSV/mergeTasmania.csv").then(function (d6) {
                                for (var z = 0; z < d6.length; z++) {
                                    if (d6[z].ethnicGroup === "Total") {
                                        let filename = d6[z].FileName;
                                        let perc = d6[z].ethnicPercentage;

                                        listname.push(filename);
                                        listnum.push(perc);
                                    }
                                }

                                d3.csv("CSV/StateCSV/mergeVictoria.csv").then(function (d7) {
                                    for (var z = 0; z < d7.length; z++) {
                                        if (d7[z].ethnicGroup === "Total") {
                                            let filename = d7[z].FileName;
                                            let perc = d7[z].ethnicPercentage;

                                            listname.push(filename);
                                            listnum.push(perc);
                                        }
                                    }
                                    d3.csv("CSV/StateCSV/mergeWestern_Australia.csv").then(function (d8) {
                                        for (var z = 0; z < d8.length; z++) {
                                            if (d8[z].ethnicGroup === "Total") {
                                                let filename = d8[z].FileName;
                                                let perc = d8[z].ethnicPercentage;

                                                listname.push(filename);
                                                listnum.push(perc);
                                            }
                                        }
                                        d3.csv("CSV/StateCSV/mergeAustralian_Capital_Territory.csv").then(function (d9) {
                                            for (var z = 0; z < d9.length; z++) {
                                                if (d9[z].ethnicGroup === "Total") {
                                                    let filename = d9[z].FileName;
                                                    let perc = d9[z].ethnicPercentage;

                                                    listname.push(filename);
                                                    listnum.push(perc);
                                                }
                                            }


                                        for (var i = 0; i < json.features.length; i++)// cycles through the paths/ lgas
                                        {
                                            var jsonLGA = json.features[i].properties.LGA_NAME11;

                                            jsonLGA = (jsonLGA).replace(/ /g, "");
                                            jsonLGA = (jsonLGA).replace(/\([^\]]*\)/g, "");
                                            jsonLGA = jsonLGA+".csv"; //prepares the name to be match to csv lga name

                                            for (var o = 0; o < listname.length; o++)
                                            {
                                                if (jsonLGA === listname[o])// finds the match
                                                {
                                                    json.features[i].properties.value = listnum[o];// asigns the json feature its percentage value
                                                    break;
                                                }
                                            }
                                        }


                                        var max = d3.max(listnum, function (d) { return +d; });//gets maxed(not used)
                                        var min = d3.min(listnum, function (d) { return +d; });// gets min percentage from the list

                                        color.domain(
                                            [
                                                min,
                                                60 // 60 is used as the max for the colour domain as it it can easily be divided by the 8 colours used in the range
                                            ]
                                        );

                                        svg.selectAll("path") // creates the LGAs using the Geojson file
                                            .data(json.features)
                                            .enter()
                                            .append("path")
                                            .attr("cursor", "pointer")
                                            .style('stroke', '#5b5b5b')
                                            .attr("stroke-width", 0.05)
                                            .attr("d", path)
                                            .style("fill", function (d) {
                                                return color(d.properties.value); // the clour is detemind by the pertange value
                                            })
                                            .attr("class", "STATEsvgmap");
                                            func_mouseinput1();

                                        legend.append("image")
                                            .attr('href', 'choroplethlegend.png') // appends the seperate svg with the an image of the legend
                                            .attr("x", 0)
                                            .attr("y", 0)
                                            .attr('width', 350)
                                            .attr('height', 350);

                                        var legendborder = legend.append("rect") // creates a border for the legend
                                            .attr("x", 0)
                                            .attr("y", 0)
                                            .attr("height", h)
                                            .attr("width", w/2)
                                            .style("stroke", bordercolor)
                                            .style("fill", "none")
                                            .style("stroke-width", border);




                                        });
                                    });
                                });
                            });
                        });
                    });
                });
            });


        });
    }

    draw_choropleth(); // calls the function that draws choropleth

}


window.onload = init;// loads it, in it
