<?php
include 'theimports.php';
echo source();

?>
    </head>

    <body style = "padding-top: 110px">

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

        <p id="p"></p>
        <!-- Buttons and fields for CRUD interaction here -->
        <div class="container">
            <div class="span12">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button id="cbutton" type="button" class="btn btn-primary">Create Event</button>
                    <button id="ubutton" type="button" class="btn btn-primary">Update Event</button>
                    <button id="dbutton" type="button" class="btn btn-primary">Delete Event</button>
                    <button id="tablebutton" type="button" class="btn btn-primary">Show Event Table</button>
                </div>
                <button id= "dlbutton" type = "button" class = "btn btn-success" style="float:right">Download Events as CSV</button>
                <div class="container">
                    <div id="creating">


                        <!-- Create interaction, If OSMID is blank, it will try to locate the OSMID of the building based off of the building name-->
                        <h3>Create a new event</h3>
                        <p id="selcreate"></p>
                        <form>
                            <div class="form-group">
                                <label for="etitle">Event Title:</label>
                                <input type="text" class="form-control" id="Ceventtitle">
                            </div>
                            <div class="form-group">
                                <label for="eventdesc">Event Description:</label>
                                <input type="text" class="form-control" id="Ceventdescription">
                            </div>
                            <div class="form-group">
                                <label for="estart">Event Start:</label>
                                <input type="datetime-local" class="form-control" id="Ceventstart">
                            </div>
                            <div class="form-group">
                                <label for="eend">Event End:</label>
                                <input type="datetime-local" class="form-control" id="Ceventend">
                            </div>
                            <div class="form-group">
                                <label for="cvenue">Event Venue:</label>
                                <br>
                                <select id="Ceventvenue" class="selectpicker" data-style="btn-warning">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Eurl">Event URL:</label>
                                <input type="text" class="form-control" id="Ceventurl">
                            </div>
                            <div class="form-group">
                                <label for="Econtact">Event Contact:</label>
                                <input type="text" class="form-control" id="Ceventcontact">
                            </div>
                            <div class="form-group">
                                <label for="eprivacy">Event Privacy:</label>
                                <br>
                                <select id="Ceventprivacy" class="selectpicker" data-style="btn-warning">
                                <option value="false">False</option>
                                    <option value="true">True</option>
                                </select>
                            </div>
                        </form>
                        <button id="subcreate" class="btn btn-primary">Create</button>
                    </div>

                    <!-- Update interaction here, selected row from list will be updated, blank fields will not be updated unless specified with null -->
                    <div id="updating">
                        <h3>Update an Existing Event</h3>
                        <a href="https://www.maynoothuniversity.ie/sites/default/files/assets/document/Timetable%20Venues%20October%202016_0.pdf">Room information can be found here</a>
                        <!-- Select picker for updating -->
                        <div id="updateopt">
                            <select id="selectup" class="selectpicker" data-style="btn-warning">
                    </select>
                        </div>
                        <h4>Row Selected:</h4>
                        <p id="selup"></p>
                        <form>
                            <div class="form-group">
                                <label for="utitle">Event Title:</label>
                                <input type="text" class="form-control" id="Ueventtitle">
                            </div>
                            <div class="form-group">
                                <label for="ueventdesc">Event Description:</label>
                                <input type="text" class="form-control" id="Ueventdescription">
                            </div>
                            <div class="form-group">
                                <label for="ustart">Event Start:</label>
                                <input type="datetime-local" class="form-control" id="Ueventstart">
                            </div>
                            <div class="form-group">
                                <label for="uend">Event End:</label>
                                <input type="datetime-local" class="form-control" id="Ueventend">
                            </div>
                            <div class="form-group">
                                <label for="uvenue">Event Venue:</label>
                                <br>
                                <select id="Ueventvenue" class="selectpicker" data-style="btn-warning">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Eurl">Event URL:</label>
                                <input type="text" class="form-control" id="Ueventurl">
                            </div>
                            <div class="form-group">
                                <label for="ucontact">Event Contact:</label>
                                <input type="text" class="form-control" id="Ueventcontact">
                            </div>
                            <div class="form-group">
                                <label for="uprivacy">Event Privacy:</label>
                                <br>
                                <select id="Ueventprivacy" class="selectpicker" data-style="btn-warning">
                                <option value="false">False</option>
                                    <option value="true">True</option>
                                </select>
                            </div>
                        </form>
                        <button id="subup" class="btn btn-primary">Update selected row</button>

                    </div>
                    <!-- Delete interaction here -->
                    <div id="deleting">
                        <h3>Delete an Existing Event</h3>
                        <div id="deleteopt">
                            <button type="button" id="deleteit" class="btn btn-warning">Delete this venue </button>
                            <select id="selectdel" class="selectpicker" data-style="btn-warning">
                    </select>
                        </div>
                        <h4>Row Selected:</h4>
                        <p id="seldel"></p>
                        <br>
                        <p id="delres"></p>
                    </div>
                    <div id="dtable">

                    </div>
                </div>


            </div>
        </div>
    </body>
    <script>
        // global variables
        var sel = $('select[id=selectdel]').val();

        var upsel = $('select[id = selectup]').val();

        //on load function
        $(document).ready(function() {
            //Hides crud options on load
            $("#creating").hide();
            $("#updating").hide();
            $("#deleting").hide();
            $("#dtable").hide();

            var x = "";
            getinfo();
            filltable();
        });


        // fills the table with events
        function filltable() {
            $.ajax({
                url: "tablefill.php",
                type: "GET",
                data: {
                    type: 'events'
                },
                success: function(response) {
                    var string = '<br><table id="example" class="display" cellspacing="0" width="100%"><thead><tr><th>Event ID</th><th>Event Title</th><th>Event Description</th><th>Event Start</th><th>Event End</th><th>Event Venue</th><th>Event Url</th><th>Contact</th><th>Privacy</th><th>Create Time</th><th>X</th><th>Y</th><th>Deleted</th></tr></thead><tfoot><tr><th>Event ID</th><th>Event Title</th><th>Event Description</th><th>Event Start</th><th>Event End</th><th>Event Venue</th><th>Event Url</th><th>Contact</th><th>Privacy</th><th>Create Time</th><th>X</th><th>Y</th><th>Deleted</th></tr></tfoot><tbody>';

                    for (var i = 0; i < response.length; i++) {
                        string = string + "<tr><td>" + response[i].eventid + "</td><td>" + response[i].eventtitle + "</td><td>" + response[i].eventdescription + "</td><td>" + response[i].eventstart + "</td><td>" + response[i].eventend + "</td><td>" + response[i].eventvenue + "</td><td>" + response[i].eventurl + "</td><td>" + response[i].eventcontact + "</td><td>" + response[i].eventprivacy + "</td><td>" + response[i].eventts + "</td><td>" + response[i].x + "</td><td>" + response[i].y + "</td><td>" + response[i].edelete + "</td></tr>";


                    }
                    string = string + "</tbody></table>";
                    document.getElementById("dtable").innerHTML = string;
                }
            });
            setTimeout(
                function() {
                    $('#example').DataTable();
                }, 1000);
        }
        //Gets all information needed for the update and delete select tables
        function getinfo() {
            $.ajax({
                url: "getevents.php",
                type: "GET",
                data: {
                    type: 'all'
                },
                success: function(response) {
                    var information = new Array(response.length);

                    //Empties the selectpicker
                    //delete
                    $("#selectup").html("")
                        .selectpicker('refresh');
                    //update
                    $("#selectdel").html("")
                        .selectpicker('refresh');

                    //Gives the selectpicker a null option
                    //update
                    $("#selectup").append('<option value = "None">None</option>')
                        .selectpicker('refresh');
                    //delete
                    $("#selectdel").append('<option value = "None">None</option>')
                        .selectpicker('refresh');

                    //inserts the information into a list to be chosen from to update/delete setting it so people can only delete or update 1 row at a time
                    //this is meant to be used for people unfamiliar with postgreSQL
                    for (var i = 0; i < response.length; i++) {
                        information[i] = "Event ID :" + response[i].eventid + " <strong>Event Title :</strong> " + response[i].eventtitle + " Event Description : " + response[i].eventdescription + " Start Date : " + response[i].eventstart + " End Date : : " + response[i].eventend + " X: " + response[i].x + " Y:" + response[i].y;

                        //update append
                        $("#selectup").append('<option value = ' + response[i].eventid + '>' + information[i] + '</option>')
                            .selectpicker('refresh');

                        //delete append
                        $("#selectdel").append('<option value = ' + response[i].eventid + '>' + information[i] + '</option>')
                            .selectpicker('refresh');
                    }
                }
            });
            $.ajax({
                url: "allvenues.php",
                type: "GET",
                data: {
                    type: 'alpha'
                },
                success: function(res) {
                    $("#Ceventvenue").html("").selectpicker('refresh');
                    $("#Ceventvenue").append('<option value = "None">None</option>')
                        .selectpicker('refresh');
                    $("#Ueventvenue").html("").selectpicker('refresh');
                    $("#Ueventvenue").append('<option value = "None">None</option>')
                        .selectpicker('refresh');

                    for (var j = 0; j < res.length; j++) {
                        var string = res[j].roomname;
                        $("#Ceventvenue").append('<option value =' + string + '>' + string + '</option>').selectpicker('refresh');
                        $("#ueventvenue").append('<option value =' + string + '>' + string + '</option>').selectpicker('refresh');
                    }

                }
            });

        }


        //Button activities to show the different CRUD divs - makes page appear less cluttered
        $("#cbutton").click(function() {
            $("#updating").fadeOut(400);
            $("#deleting").fadeOut(400);
            $("#dtable").fadeOut(400);

            $("#deleting").promise().done(function() {
                $("#updating").promise().done(function() {
                    $("#dtable").promise().done(function() {
                        $("#creating").fadeIn(500);
                    });
                });
            });
        });
        $("#ubutton").click(function() {
            $("#creating").fadeOut(400);
            $("#deleting").fadeOut(400);
            $("#dtable").fadeOut(400);

            $("#creating").promise().done(function() {
                $("#deleting").promise().done(function() {
                    $("#dtable").promise().done(function() {
                        $("#updating").fadeIn(500);
                    });

                });
            });
        });
        $("#dbutton").click(function() {
            $("#creating").fadeOut(400);
            $("#updating").fadeOut(400);
            $("#dtable").fadeOut(400);

            $("#creating").promise().done(function() {
                $("#updating").promise().done(function() {
                    $("#dtable").promise().done(function() {
                        $("#deleting").fadeIn(500);
                    });
                });
            });
        });
        $("#tablebutton").click(function() {
            $("#creating").fadeOut(400);
            $("#updating").fadeOut(400);
            $("#deleting").fadeOut(400);

            $("#creating").promise().done(function() {
                $("#updating").promise().done(function() {
                    $("#deleting").promise().done(function() {
                        $("#dtable").fadeIn(500);
                    });
                });
            });
        });

        //For selectpicker changes
        //delete
        $("#selectdel").change(function() {
            sel = $('select[id=selectdel]').val();
            document.getElementById("seldel").innerHTML = $('#selectdel option:selected').text();
        });
        //update
        $("#selectup").change(function() {
            upsel = $('select[id=selectup]').val();
            document.getElementById("selup").innerHTML = $('#selectup option:selected').text();
        });

        //delete ajax
        $("#deleteit").click(function() {
            $.ajax({
                url: "operationstwo.php?id=" + sel,
                type: "DELETE",
                success: function(response) {
                    if (response == 'true') {
                        document.getElementById("delres").innerHTML = "Row was deleted";
                    } else {
                        document.getElementById("delres").innerHTML = "Row doesn't exist";
                    }
                    //refreshes the selectpicker after query
                    getinfo();
                    filltable();
                }
            });
        });




        //update ajax
        //this function is for building update and create queries
        $("#subup").click(function() {
            // an array that stores the information that will be used
            var query = "UPDATE events SET"
            var opt = ['eventtitle', 'eventdescription', 'eventstart', 'eventend', 'eventvenue', 'eventurl', 'eventcontact', 'eventprivacy'];
            for (var i = 0; i < opt.length; i++) {
                if (document.getElementById("U" + opt[i]).value != "") {
                    if (opt[i] == 'eventvenue' && document.getElementById("Ceventvenue").value == 'None') {

                    } else {
                        if (opt[i] == 'eventprivacy') {
                            query = query + " " + opt[i] + "=" + document.getElementById("U" + opt[i]).value + ",";
                        } else {
                            query = query + " " + opt[i] + "= '" + document.getElementById("U" + opt[i]).value + "' ,";
                        }
                    }

                }
            }
            query = query.substring(0, query.length - 1);
            query = query + " WHERE eventid =" + upsel + ";";
            alert(query);

            //this uses the built query and sends it to the php operations page
            $.ajax({
                url: "operations.php?query=" + query,
                type: "PUT",
                success: function(response) {
                    document.getElementById("selup").innerHTML = "row has been updated";
                    getinfo();
                    filltable();
                }
            });
            getinfo();
            filltable();
        });

        //dlbutton function
        $("#dlbutton").click(function(){
           window.location = 'csvsave.php';
        });
        //create ajax
        $("#subcreate").click(function() {
            var start = document.getElementById("Ceventstart").value;
            start = start.replace('T', ' ');
            var end = document.getElementById("Ceventend").value;
            end = end.replace('T', ' ');
            if (document.getElementById("Ceventvenue").value == 'None') {
                alert("Please select a valid venue");
            } else {
                if (end == "" || start == "") {
                    alert("Start date or End date is null, please enter both a Start and End date.");
                } else {
                    var query = "INSERT INTO EVENTS (eventtitle,eventdescription,eventstart,eventend,eventvenue,eventurl,eventcontact,eventprivacy) VALUES (";
                    var opt = ['eventtitle', 'eventdescription', 'eventstart', 'eventend', 'eventvenue', 'eventurl', 'eventcontact', 'eventprivacy'];
                    for (var i = 0; i < opt.length; i++) {
                        if (document.getElementById("C" + opt[i]).value != "") {
                            if (opt[i] == "eventtitle" ||
                                opt[i] == 'eventdescription' ||
                                opt[i] == 'eventvenue' ||
                                opt[i] == 'eventurl' ||
                                opt[i] == 'eventcontact') {

                                query = query + "'" + document.getElementById("C" + opt[i]).value + "',";
                            } else if (opt[i] == 'eventstart') {
                                query = query + "'" + start + "',";
                            } else if (opt[i] == 'eventend') {
                                query = query + "'" + end + "',";
                            } else {
                                query = query + document.getElementById("C" + opt[i]).value + ",";
                            }
                        } else {
                            query = query + "null,";
                        }
                    }
                    query = query.substring(0, query.length - 1);
                    query = query + ");";
                    alert(query);
                    $.ajax({
                        url: "operations.php",
                        type: "POST",
                        data: {
                            query: query
                        },
                        success: function(response) { document.getElementById("selcreate").innerHTML = "Row has been created";
                            getinfo();
                            filltable();
                        }
                    });
                    getinfo();
                    filltable();
                }
            }
        });

    </script>

    </html>
