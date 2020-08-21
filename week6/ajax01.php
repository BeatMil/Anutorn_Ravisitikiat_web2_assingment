<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head> 
<body>
<h2>Beat tried to...</h2>
<h2>create a weather web app</h2>

<button type="button" onclick="loadCountry(api_bangkok)">Bangkok</button>
<button type="button" onclick="loadCountry(api_london)">London</button>
<p>Country: <span id="country"></span></p>
<p>Weather: <span id="weather"></span></span></p>
<p>Temp: <span id="temp"></span></p>
<p>Feels like: <span id="feel"></span></p>

<script>
var api_bangkok = "https://api.openweathermap.org/data/2.5/weather?q=Bangkok&units=metric&appid=138594935892ba5ad2ff082829159f45";
var api_london = "https://api.openweathermap.org/data/2.5/weather?q=London&units=metric&appid=138594935892ba5ad2ff082829159f45";
//function loadDoc() {
    //var xhttp = new XMLHttpRequest();
    //xhttp.onreadystatechange = function() {
        //if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("demo").innerHTML = this.responseText;
        //}
    //};
    //xhttp.open("GET", api_bangkok , true); // doesn't work on picture
    //xhttp.send();
//}
function loadCountry(api) {
    $.getJSON(api, function(data) {
        $("#country").text(data.sys.country);
        $("#weather").text(data.weather[0].description);
        $("#temp").text(data.main.temp);
        $("#feel").text(data.main.feels_like);
    });
}
//$.getJSON(api_bangkok, function(data) {
    //console.log(data.main.temp);
    //console.log(data.sys.country);
    //console.log(data.weather[0].main);
    //console.log(data.weather[0].description);
    //$.each( data, function( key, val  ) {
        //console.log(key + val);
    //});
//});
</script>
<body>
</html>
