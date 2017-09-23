<?php
// This function returns all of the needed imports for the application.
function source()
{
    return '
    <html>
    <head>
    
    <script src="https://use.fontawesome.com/c33e9e1f88.js"></script>
    
    <meta charset="utf-8">
    <!-- Set the viewport for all devices - allows the page to be responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Jquery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap Library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Mapbox Library -->
    <script src="https://api.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.css" rel="stylesheet" />

    <!-- Leaflet Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>

    <!-- Leaflet Routing Machine -->
    <script src="../src/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" href="../src/leaflet-routing-machine.css" />

    <!-- Leaflet Geocoder -->
    <link rel="stylesheet" href="../src/Control.Geocoder.css" />
    <script src="../src/Control.Geocoder.js"></script>

    <!-- Graphhopper for leaflet -->
    <script src="../src/graphhopper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Bootstrap collapse -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <!-- Leaflet locate plugin -->
    <script src="https://domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>

    <!-- Bootstrap and leaflet styles -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.css" />

    <!-- Bootstrap easy button -->
    <script src="../src/easy-button.js"></script>
    <link rel="stylesheet" href="../src/easy-button.css"/>
    
    <!-- To change the map tile layers -->
    <script src="../src/iconLayers.js"></script>
    <link rel="stylesheet" href="../src/iconLayers.css"/>
    
    <!-- Jquery datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <!-- Jquery Data Table -->
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    
    <!-- Bootstrap overwrites -->
    <link rel="stylesheet" href="../src/freelancer.css"/>
    
    <link href="../src/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    
    
<style>
html, body, #map, .row-fluid {
    height: 100%;
}

        #mapid {
            height: 700px;
        }
        poph {
            font-size: 20px;
        }
        
        #emap {
  position: absolute;
  height: 500px;
  width: 100%;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 100px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    color: #000;
    font-size: 40px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

#share-buttons img{
width: 35px;
padding: 5px;
border: 0;
box-shadow: 0;
display: inline;
}
        
    </style>
    <script>
    var greenIcon = new L.Icon({
  iconUrl: "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png",
  shadowUrl: "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
        });
        
        var purpleIcon = new L.Icon({
  iconUrl: "https://github.com/pointhi/leaflet-color-markers/blob/master/img/marker-icon-2x-violet.png?raw=true",
  shadowUrl: "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});
        
        </script>';
}


?>
