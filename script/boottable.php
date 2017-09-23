<?php
include 'theimports.php';
echo source();

?>
    </head>

    <body>

        <!-- Navigation bar - including functions like home possibly view academic/exam timetable etc -->
        <nav class="navbar navbar-default" style="height:100px">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
      </button>
                    <a class="navbar-brand" href="https://www.maynoothuniversity.ie/"><img src="https://www.maynoothuniversity.ie/sites/all/themes/nuim_themes/nuim/logo.png" width=200px height=100px></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="boottable.php">
                                <h3>Home</h3>
                            </a>
                        </li>
                        <li>
                            <a href="mapadmin.php">
                                <h3>Timetable Admin</h3>
                            </a>
                        </li>
                        <li>
                            <a href="eventviewer.php?id=">
                                <h3>Event Viewer</h3>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h3>Contact Us</h3>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Bootstrap container -->
        <div class="container">
            <div class="table-responsive">
                <!-- The example table containing the timetable information-->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>TIME</th>
                            <th>MONDAY</th>
                            <th>TUESDAY</th>
                            <th>WEDNESDAY</th>
                            <th>THURSDAY</th>
                            <th>FRIDAY</th>
                        </tr>
                    </thead>
                    <tbdoy>
                        <tr>
                            <td><strong>9:00</strong></td>
                            <td class='cells'>MT201 [JHL1]</td>
                            <td class='cells'></td>
                            <td class='cells'></td>
                            <td class='cells'>MT201 [CH]</td>
                            <td class='cells'></td>
                        </tr>
                        <tr>
                            <td><strong>10:00</strong></td>
                            <td class='cells'></td>
                            <td class='cells'>CS130 [LGH]</td>
                            <td class='cells'></td>
                            <td class='cells'></td>
                            <td class='cells'></td>
                        </tr>
                        <tr>
                            <td><strong>11:00</strong></td>
                            <td class='cells'></td>
                            <td class='cells'>CS265 [JHL2]</td>
                            <td class='cells'></td>
                            <td class='cells'></td>
                            <td class='cells'>MT212 [IONTH]</td>
                        </tr>
                        <tr>
                            <td><strong>12:00</strong></td>
                            <td class='cells'></td>
                            <td class='cells'></td>
                            <td class='cells'></td>
                            <td class='cells'>MT212A [Aula]</td>
                            <td class='cells'></td>
                        </tr>
                        <tr>
                            <td><strong>13:00</strong></td>
                            <td class='cells'>CS253 [JHL3]</td>
                            <td class='cells'></td>
                            <td class='cells'></td>
                            <td class='cells'></td>
                            <td class='cells'></td>
                        </tr>
                    </tbdoy>
                </table>
            </div>
        </div>
        <div class="container">
            <!-- Buttons for showing and hiding the map -->
            <center>
                <p id='para'></p>
            </center>
            <div style="float:right">
                <button type="button" id="nearby" class="btn btn-warning">Find : </button>
                <select class="selectpicker 1" data-style="btn-warning" id="sel1">
                <option value = 'cafe'>Cafes in Maynooth</option>
                <option value = 'restaurant'>Restaurants in Maynooth</option>
                <option value = 'parking'>Car parks in maynooth</option>
                <option value = 'bar'>Bars in maynooth</option>
            </select>
            </div>
            <br><br><br>

            <div class="btn-group" style="float:right">
                <button type="button" id="show" class="btn btn-primary">Show map</button>
                <button type="button" id="hide" class="btn btn-primary">Hide Map</button>
            </div>






            <!-- Selection of traveling by foot, bike, car etc. -->
            <div style="float:left">
                <label for="sel1"><h4>Travel By:</h4></label>
                <select class="selectpicker" data-style="btn-success" id="sel">
                <option value = 'foot'>Foot</option>option>
                <option value = 'car'>Car</option>
                <option value = 'bike'>Bicycle</option>
            </select>
            </div>
        </div>



        <div class="container">
            <!-- The div for the map placement -->
            <div id="mapid"></div>
        </div>



    </body>

    <script>
        var roomloc = new Array(2);

        // Sets the default view of the map
        var mymap = L.map('mapid').setView([53.38405, -6.60068], 20);

        // Creates a layer group for the markers
        var markerGroup = L.layerGroup().addTo(mymap);




        var control = L.control({
            position: 'topright'
        });


        var lc = L.control.locate({
            position: 'topleft',
            locateOptions: {
                enableHighAccuracy: true
            },
            strings: {
                title: "Get my location!"
            }
        }).addTo(mymap);
        lc.start();



        //The apearrance of the map / what map tiles are used
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            maxZoom: 18,
        }).addTo(mymap);

        //Map controls and how it reacts to button clicks, panning etc.

        control = L.Routing.control({
            waypoints: [
                L.latLng(),
                L.latLng()
            ],
            routeWhileDragging: true,
            geocoder: L.Control.Geocoder.nominatim(),
            //Initialized the routing api and what vehicle/method of transport is used.
            router: L.Routing.graphHopper('798f4aac-7306-41e7-8060-fde368ad1419', {
                urlParameters: {
                    vehicle: 'foot'
                }
            })
        }).addTo(mymap);

        var hidden = false;
        L.easyButton('fa-compass',
            function() {
                if (hidden) {
                    control.show();
                    hidden = false;
                } else {
                    control.hide();
                    hidden = true;
                }
            }
        ).addTo(mymap);


        $(document).ready(function() {
            $("#mapid").hide();
            document.getElementById("hide").disabled = true;

            //Function to split the room code when a table cell is clicked.
            $(".cells").click(function() {
                //alert(lc._circle._latlng.lat);
                var x = "" + $(this).html();
                var xr = x.split(" ");
                x = xr[1].substring(1, xr[1].length - 1);
                
                query = "select * from venues where roomname = '" +x+ "' and vdelete = false;";


                //Ajax to send query to php, which in turn connects to the DB. Displays the queries in a paragraph beneath the timetable.
                $.ajax({
                    url: "phpconnection.php",
                    type: "POST",
                    data: {
                        type: 'map',
                        query: query
                    },
                    success: function(response) {
                        console.log(response);
                        var para = document.getElementById('para');
                        para.innerHTML = "Room name : " + x + " | Room location : " + response[0].location + " | Capacity : " + response[0].capacity + " | Floor : " + response[0].floor

                        roomloc = [response[0].y, response[0].x];
                        //Points where the selected building is on the map.
                        markerGroup.clearLayers();
                        L.marker([response[0].y, response[0].x]).addTo(markerGroup).bindPopup("<b>This is " + x + "</b><br><button onClick='getDir()'>Give me directions</button>").openPopup();

                        mymap.dragging.disable();
                        mymap.setZoom(20);
                        mymap.panTo([response[0].y, response[0].x]);
                        mymap.dragging.enable();
                    }
                });


            });

            //Functions to open and close the map. 
            $("#show").click(function() {
                $("#mapid").fadeIn(1500);
                document.getElementById("show").disabled = true;
                document.getElementById("hide").disabled = false;
            });
            $("#hide").click(function() {
                $("#mapid").fadeOut(1500);
                document.getElementById("show").disabled = false;
                document.getElementById("hide").disabled = true;
            });



        });
        //Functions for the event on map click (Start from this location , Go to this location)
        function createButton(label, container) {
            var btn = L.DomUtil.create('button', '', container);
            btn.setAttribute('type', 'button');
            btn.innerHTML = label;
            return btn;
        }

        mymap.on('click', function(e) {
            var container = L.DomUtil.create('div'),
                startBtn = createButton('Start from this location', container),
                destBtn = createButton('Go to this location', container);

            L.popup()
                .setContent(container)
                .setLatLng(e.latlng)
                .openOn(mymap);


            L.DomEvent.on(startBtn, 'click', function() {
                control.spliceWaypoints(0, 1, e.latlng);
                mymap.closePopup();
            });

            L.DomEvent.on(destBtn, 'click', function() {
                control.spliceWaypoints(control.getWaypoints().length - 1, 1, e.latlng);
                mymap.closePopup();
            });
        });


        $(".selectpicker").change(function() {
            var sel = $('select[id=sel]').val();
            control.getRouter().options.urlParameters.vehicle = sel;
            control.route();
        });


        function getDir() {
            control.spliceWaypoints(0, 1, lc._circle._latlng);

            control.spliceWaypoints(control.getWaypoints().length - 1, 1, markerGroup._map._popup._latlng);
            markerGroup.clearLayers();

        }



        $("#nearby").click(function() {
            var userlocation = [lc._circle._latlng.lat, lc._circle._latlng.lng];
            var thesel = $('select[id=sel1]').val();
            query = "SELECT a.id ,a.tags , ST_GeomFromText('POINT(-6.60170 53.38536)'), ST_Distance(ST_Transform(ST_GeomFromText('POINT(" + userlocation[1] + " " + userlocation[0] + ")',4326),32629),ST_Transform(a.geom,32629)) as thedist, (tags->'name') as thename, ST_AsText(geom) as theg from nodes a where (((a.tags->'amenity') = '" + thesel + "' and (tags->'name') is not null) or ((a.tags->'amenity') = '" + thesel + "'))  order by thedist asc;"

            $.ajax({
                url: "phpconnection.php",
                type: "POST",
                data: {
                    type: 'near',
                    query: query
                },
                success: function(response) {
                    var para = document.getElementById("para");
                    para.innerHTML = response;

                }
            });

        });

        function getDir2(x) {
            x = x.substring(6, x.length - 1);
            var ll = x.split(" ");
            var thel = new L.LatLng(ll[1], ll[0]);
            control.spliceWaypoints(0, 1, lc._circle._latlng);

            control.spliceWaypoints(control.getWaypoints().length - 1, 1, thel);
            markerGroup.clearLayers();
        }

    </script>

    </html>
