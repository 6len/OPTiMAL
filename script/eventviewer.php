<?php
include 'theimports.php';
echo source();

$shared = $_GET['id'] ?: 'false';
?>
    </head>

    <body style="padding-top: 110px">

        <!-- Creates a bootstrap navigation bar -->

        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <a class="navbar-brand" href="#page-top">MU Event Viewer</a>
            <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
            <div class="navbar-collapse collapse" id="navbarResponsive" style>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="eventviewer.php?id=">Event Viewer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mapadmin.php">Venue Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eventadmin.php">Event Admin</a>
                    </li>
                </ul>
            </div>
        </nav>

        <button type="button" id="nearby" class="btn btn-warning">Show me</button>
        <select class="selectpicker 1" data-style="btn-warning" id="sel1">
                <option value = 'cafe'>Cafes</option>
                <option value = 'restaurant'>Restaurants</option>
                <option value = 'parking'>Car parks</option>
                <option value = 'bar'>Bars</option>
            </select>

        <div style="float:right">
            <!-- text boxes for inserting the date -->
            <input type="text" id="starting">
            <input type="text" id="ending">
            <button type='button' class='btn btn-primary' id="eventdate">Show events between these dates</button>
        </div>
        <div id="container">
            <!-- Buttons for selecting different means of travel -->
            <center>
                <div>
                    <center>
                        <div>
                            <a href="http://www.facebook.com/sharer.php?u=http://optimal-dev.cs.nuim.ie/script/eventviewer.php?id=" target="_blank">
                                <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" /></a>

                            <a href="https://plus.google.com/share?url=http://optimal-dev.cs.nuim.ie/script/eventviewer.php?id=" target="_blank">
                                <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                            </a>
                            <a href="https://twitter.com/share?url=http://optimal-dev.cs.nuim.ie/script/eventviewer.php?id=&amp;text=Maynooth%20University%20Event%20Viewer&amp;hashtags=MaynoothUniversity" target="_blank">
                                <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                            </a>
                        </div>
                    </center>
                    <br><br><br>
                    <poph>Date(s) shown : </poph>
                    <p id="shown">
                </div>
            </center>
        </div>
        <div class="container">
            <br><br>
            <!-- buttons for cycling through the week -->
            <button type='button' class='btn btn-primary' onclick="prevDay()">Yesterdays Events</button>
            <button type='button' class='btn btn-primary' onclick="setDay()">Todays Events</button>
            <button type='button' class='btn btn-primary' onclick="postDay()">Tomorrows Events</button>

            <div style="float : right">
                <button type='button' class='btn btn-success' onclick="route('foot')">Walk</button>
                <button type='button' class='btn btn-success' onclick="route('car')">Drive</button>
                <button type='button' class='btn btn-success' onclick="route('bike')">Cycle</button>
            </div>
        </div>
        <div class="container-fluid">
            <div id="emap">
            </div>
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <form class="form-horizontal">
                    <fieldset>

                        <!-- Form Name -->

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Username</label>
                            <div class="col-md-4">
                                <input id="textinput" name="textinput" type="text" placeholder="username" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="passwordinput">Password</label>
                            <div class="col-md-4">
                                <input id="passwordinput" name="passwordinput" type="password" placeholder="password" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="loginbutton"></label>
                            <div class="col-md-8">
                                <button id="loginbutton" name="loginbutton" class="btn btn-success">Login</button>
                                <button id="cancelb" name="cancelb" class="btn btn-danger" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>

            <div id="id02" class="modal">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <form class="form-horizontal">
                    <fieldset>

                        <!-- Form Name -->

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Username</label>
                            <div class="col-md-4">
                                <input id="textinput" name="textinput" type="text" placeholder="username" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="passwordinput">Password</label>
                            <div class="col-md-4">
                                <input id="passwordinput" name="passwordinput" type="password" placeholder="password" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="loginbutton"></label>
                            <div class="col-md-8">
                                <button id="regbutton" name="register" class="btn btn-success">Register</button>
                                <button id="cancelb" name="cancelb2" class="btn btn-danger" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>

        </div>




        <script>
            //initialize the usual type
            var type = 'week';

            //initialize the date for paragraph
            var thedate = new Date();
            thedate.setHours(0, 0, 0, 0);

            //initializing the map

            var emap = L.map('emap', {
                zoomSnap: 0.3
            }).setView([53.3823, -6.5966], 16);

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
            }).addTo(emap);



            //The apearrance of the map / what map tiles are used
            //------------------------------------------------------------------
            //Map tile links

            var OpenStreet = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
                maxZoom: 18,
            });

            var Stamen_Toner = L.tileLayer('http://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}.{ext}', {
                attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                subdomains: 'abcd',
                minZoom: 0,
                maxZoom: 18,
                ext: 'png'
            });

            var Esri_WorldImagery = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            });

            var iconLayersControl = new L.Control.IconLayers(
                [{
                        title: 'OpenStreet',
                        layer: OpenStreet,
                        icon: '../mapicons/openstreetmap_mapnik.png'
                    },

                    {
                        title: 'Stamen Toner', // use any string
                        layer: Stamen_Toner, // any ILayer
                        icon: '../mapicons/stamen_toner.png' // 80x80 icon
                    },
                    {
                        title: 'Sat', // use any string
                        layer: Esri_WorldImagery, // any ILayer
                        icon: '../mapicons/here_satelliteday.png' // 80x80 icon
                    }
                ], {
                    position: 'bottomleft',
                    maxLayersInRow: 5
                }
            );
            iconLayersControl.addTo(emap);
            //--------------------------------------------------------------


            // Creates a layer group for the markers
            var markerGroup = L.layerGroup().addTo(emap);

            //routing api window 
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
            }).addTo(emap);

            // easy button to close and open the routing api window
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
            ).addTo(emap);


            //--------------------------------------------------
            //Location on click functions
            function createButton(label, container) {
                var btn = L.DomUtil.create('button', '', container);
                btn.setAttribute('type', 'button');
                btn.innerHTML = label;
                return btn;
            }

            emap.on('click', function(e) {
                var container = L.DomUtil.create('div'),
                    startBtn = createButton('Start from this location', container),
                    destBtn = createButton('Go to this location', container);

                L.popup()
                    .setContent(container)
                    .setLatLng(e.latlng)
                    .openOn(emap);


                L.DomEvent.on(startBtn, 'click', function() {
                    control.spliceWaypoints(0, 1, e.latlng);
                    emap.closePopup();
                });

                L.DomEvent.on(destBtn, 'click', function() {
                    control.spliceWaypoints(control.getWaypoints().length - 1, 1, e.latlng);
                    emap.closePopup();
                });
            });
            //-------------------------------------------------

            //-------------------------------------------------
            //function for getting events on page load
            //this variable is for the day you are looking for events on
            //0 is today 1 is tomorrow -1 is yesterday etc
            var data = 0;

            $(document).ready(function() {
                var linked = "<?php echo $shared;?>";
                var date = new Date();
                date.setDate(thedate.getDate() + 7);
                document.getElementById("shown").innerHTML = "<poph><strong>" + thedate.toDateString() + " to " + date.toDateString() + "</poph></strong>";
                if (linked == 'false') {
                    fillin();
                } else {
                    getshared(linked);
                }
            });


            function pan() {
                emap.panTo([53.3823, -6.5966], 16);
            }

            //function for filling events with the venue coordinates
            function fillin() {
                $.ajax({
                    url: "fillevents.php",
                    type: "GET",
                    complete: function(response) {
                        getdata();
                    }

                });
            }
            //function for getting all events that meet the data criteria
            function getdata() {
                $.ajax({
                    url: "getevents.php",
                    type: "GET",
                    data: {
                        day: Math.abs(data),
                        sign: (data <= 0) ? '-' : '+',
                        type: type
                    },
                    success: function(response) {
                        getco(response);
                    }
                });
            }

            function getshared(linked) {
                $.ajax({
                    url: "getevents.php",
                    type: "GET",
                    data: {
                        eventid: linked,
                        type: "shared"
                    },
                    success: function(response) {
                        getco(response);
                    }
                });
            }


            //function to map the events
            function getco(events) {
                markerGroup.clearLayers();
                for (var j = 0; j < events.length; j++) {
                    //fills thie marker popup, this will look much nicer
                    L.marker([events[j].y, events[j].x], {
                        icon: greenIcon
                    }).addTo(markerGroup).bindPopup("<poph><strong>" + events[j].eventtitle + "</strong><br>" + events[j].eventdescription + "<br><strong>Event start: </strong>" + events[j].eventstart.substring(0, 16) + "<br><strong> Event End: </strong>" + events[j].eventend.substring(0, 16) + "<br> <button type='button' class='btn btn-primary'  onclick = directMe(" + events[j].y + "," + events[j].x + ")>Direct me from my location</button> <br> <button type = 'button' class = 'btn btn-primary' onclick = 'dfromsel(" + events[j].y + "," + events[j].x + ")'> Direct me from a point</button> <br>  <button type='button' class='btn btn-primary' onclick = share(" + events[j].eventid + ")>Share this event</button></poph>");
                }

            }

            //fuction for getting directions from user location after clicking directme
            function directMe(x, y) {
                var thel = new L.LatLng(x, y);
                control.spliceWaypoints(0, 1, lc._circle._latlng);
                control.spliceWaypoints(control.getWaypoints().length - 1, 1, thel);
            }

            //function from getting directions for a selected point
            function dfromsel(x, y) {
                alert("Click on a start location on the map");
                var thel = new L.LatLng(x, y);
                control.spliceWaypoints(control.getWaypoints().length - 1, 1, thel);
            }

            //functions to display events on today, yesterday and tomorrow
            function setDay() {
                data = 0;
                thedate = new Date();
                thedate.setHours(0, 0, 0, 0);
                type = 'day';
                document.getElementById("shown").innerHTML = "<poph><strong>" + thedate.toDateString() + "</poph></strong>";
                getdata();

            }

            function prevDay() {
                data--;
                thedate.setDate(thedate.getDate() - 1)
                type = 'day';
                document.getElementById("shown").innerHTML = "<poph><strong>" + thedate.toDateString() + "</poph></strong>";
                getdata();

            }

            function postDay() {
                data++;
                thedate.setDate(thedate.getDate() + 1)
                type = 'day';
                document.getElementById("shown").innerHTML = "<poph><strong>" + thedate.toDateString() + "</poph></strong>";
                getdata();
            }

            //function for sharing event
            function share(theevent) {
                var temp = "http://optimal-dev.cs.nuim.ie/script/eventviewer.php?id=" + theevent;

                var aux = document.createElement("input");
                aux.setAttribute("value", temp);
                document.body.appendChild(aux);
                aux.select();
                document.execCommand("copy");

                document.body.removeChild(aux);

                alert("The link has been copied to your clipboard :)");
            }

            $(window).on('load', function() {
                setTimeout(function() {
                    emap.setView([53.3823, -6.5966], 16);
                }, 1000);

            });

            //invokes the datepicker
            //sets the min/max date of the datepickers
            //-------------------------------------------------
            $("#starting").datepicker({
                showOn: "both",
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText, inst) {
                    $("#ending").datepicker("option", "minDate",
                        $("#starting").datepicker("getDate"));
                }
            });

            $("#ending").datepicker({
                showOn: "both",
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText, inst) {
                    $("#starting").datepicker("option", "maxDate",
                        $("#ending").datepicker("getDate"));
                }
            });
            //-------------------------------------------------

            function route(x) {
                control.getRouter().options.urlParameters.vehicle = x;
                control.route();
            }

            //function for getting events between selected dates
            $(eventdate).click(function() {
                var st = document.getElementById("starting").value;
                var end = document.getElementById("ending").value;

                $.ajax({
                    url: "bedates.php",
                    type: "GET",
                    data: {
                        start: st,
                        end: end
                    },
                    success: function(response) {
                        document.getElementById("shown").innerHTML = "<poph><strong>" + st + " to " + end + "</strong></poph>";
                        getco(response);
                    }
                });

            });



            $("#nearby").click(function() {
                var thesel = $('select[id=sel1]').val();

                $.ajax({
                    url: "getamen.php",
                    type: "GET",
                    data: {
                        query: thesel
                    },
                    success: function(response) {
                        amenity(response);
                    }
                });
            });

            function amenity(x) {
                markerGroup.clearLayers();
                for (var i = 0; i < x.length; i++) {
                    var points = x[i].theg.substring(6, x[i].theg.length - 1);
                    var ll = points.split(" ");

                    L.marker([ll[1], ll[0]], {
                        icon: purpleIcon
                    }).addTo(markerGroup).bindPopup("<poph>" + x[i].thename + "<br> <button type = 'button' class = 'btn btn-primary' onclick = 'dfromsel(" + ll[1] + "," + ll[0] + ")'>Set as Waypoint</button><poph>");
                }
            }

        </script>
        <!--<div class="footer navbar-fixed-bottom">
            <div id = "footerBar"><p style="color:white"><poph>Maynooth University Events</poph></p></div>
        </div>
        <div id = "footer"></div>-->

    </body>


    </html>
