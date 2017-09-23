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
                    <button id="cbutton" type="button" class="btn btn-primary">Create Venue</button>
                    <button id="ubutton" type="button" class="btn btn-primary">Update Venue</button>
                    <button id="dbutton" type="button" class="btn btn-primary">Delete Venue</button>
                    <button id="tablebutton" type="button" class="btn btn-primary">Show Venue Table</button>
                </div>
                <button id= "dlbutton" type = "button" class = "btn btn-success" style="float:right">Download Venues as CSV</button>
                <div class="container">
                    <div id="creating">


                        <!-- Create interaction, If OSMID is blank, it will try to locate the OSMID of the building based off of the building name-->
                        <h3>Create a new venue</h3>
                        <a href="https://www.maynoothuniversity.ie/sites/default/files/assets/document/Timetable%20Venues%20October%202016_0.pdf">Room information can be found here</a>
                        <p id="selcreate"></p>
                        <form>
                            <div class="form-group">
                                <label for="OSMID">OSM Room ID:</label>
                                <input type="text" class="form-control" id="Cid">
                            </div>
                            <div class="form-group">
                                <label for="Rname">Room Name:</label>
                                <input type="text" class="form-control" id="Croomname">
                            </div>
                            <div class="form-group">
                                <label for="Bname">Building:</label>
                                <input type="text" class="form-control" id="Clocation">
                            </div>
                            <div class="form-group">
                                <label for="Cap">Capacity:</label>
                                <input type="text" class="form-control" id="Ccapacity">
                            </div>
                            <div class="form-group">
                                <label for="Xco">X Coordinates:</label>
                                <input type="text" class="form-control" id="Cx">
                            </div>
                            <div class="form-group">
                                <label for="Yco">Y Coordinates:</label>
                                <input type="text" class="form-control" id="Cy">
                            </div>
                        </form>
                        <button id="subcreate" class="btn btn-primary">Create</button>
                    </div>

                    <!-- Update interaction here, selected row from list will be updated, blank fields will not be updated unless specified with null -->
                    <div id="updating">
                        <h3>Update an Existing Venue</h3>
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
                                <label for="OSMID">OSM Room ID:</label>
                                <input type="number" class="form-control" id="Uid">
                            </div>
                            <div class="form-group">
                                <label for="Rname">Room Name:</label>
                                <input type="text" class="form-control" id="Uroomname">
                            </div>
                            <div class="form-group">
                                <label for="Bname">Building:</label>
                                <input type="text" class="form-control" id="Ulocation">
                            </div>
                            <div class="form-group">
                                <label for="Cap">Capacity:</label>
                                <input type="number" class="form-control" id="Ucapacity">
                            </div>
                            <div class="form-group">
                                <label for="Xco">X Coordinates:</label>
                                <input type="number" class="form-control" id="Ux">
                            </div>
                            <div class="form-group">
                                <label for="Yco">Y Coordinates:</label>
                                <input type="number" class="form-control" id="Uy">
                            </div>
                        </form>
                        <button id="subup" class="btn btn-primary">Update selected row</button>

                    </div>
                    <!-- Delete interaction here -->
                    <div id="deleting">
                        <h3>Delete an existing Venue</h3>
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

        function filltable() {
            $.ajax({
                url: "tablefill.php",
                type: "GET",
                data:{
                    type: 'venues'
                },
                success: function(response) {
                    var string = '<br><table id="example" class="display" cellspacing="0" width="100%"><thead><tr><th>Venue ID</th><th>OSM ID</th><th>Room Name</th><th>Location</th><th>Capacity</th><th>X</th><th>Y</th><th>Deleted</th></tr></thead><tfoot><tr><th>Venue ID</th><th>OSM ID</th><th>Room Name</th><th>Location</th><th>Capacity</th><th>X</th><th>Y</th><th>Deleted</th></tr></tfoot><tbody>';

                    for (var i = 0; i < response.length; i++) {
                        string = string + "<tr><td>" + response[i].venueid + "</td><td>" + response[i].id + "</td><td>" + response[i].roomname + "</td><td>" + response[i].location + "</td><td>" + response[i].capacity + "</td><td>" + response[i].x + "</td><td>" + response[i].y + "</td><td>" + response[i].vdelete + "</td></tr>";


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
                url: "allvenues.php",
                type: "GET",
                data: {
                    type : 'id'
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
                        information[i] = "Venue ID : " + response[i].venueid + " Venue: " + response[i].roomname + " Location : " + response[i].location + " Capacity : " + response[i].capacity + " X: " + response[i].x + " Y:" + response[i].y;

                        //update append
                        $("#selectup").append('<option value = ' + response[i].venueid + '>' + information[i] + '</option>')
                            .selectpicker('refresh');

                        //delete append
                        $("#selectdel").append('<option value = ' + response[i].venueid + '>' + information[i] + '</option>')
                            .selectpicker('refresh');
                    }
                }
            });
        }


        //Button activities to show the different CRUD divs - makes page appear less cluttered
        $("#cbutton").click(function() {
            $("#updating").fadeOut(500);
            $("#deleting").fadeOut(500);
            $("#dtable").fadeOut(500);

            $("#deleting").promise().done(function() {
                $("#updating").promise().done(function() {
                    $("#dtable").promise().done(function() {
                        $("#creating").fadeIn(1000);
                    });
                });
            });
        });
        $("#ubutton").click(function() {
            $("#creating").fadeOut(500);
            $("#deleting").fadeOut(500);
            $("#dtable").fadeOut(500);

            $("#creating").promise().done(function() {
                $("#deleting").promise().done(function() {
                    $("#dtable").promise().done(function() {
                        $("#updating").fadeIn(1000);
                    });

                });
            });
        });
        $("#dbutton").click(function() {
            $("#creating").fadeOut(500);
            $("#updating").fadeOut(500);
            $("#dtable").fadeOut(500);

            $("#creating").promise().done(function() {
                $("#updating").promise().done(function() {
                    $("#dtable").promise().done(function() {
                        $("#deleting").fadeIn(1000);
                    });
                });
            });
        });
        $("#tablebutton").click(function() {
            $("#creating").fadeOut(500);
            $("#updating").fadeOut(500);
            $("#deleting").fadeOut(500);

            $("#creating").promise().done(function() {
                $("#updating").promise().done(function() {
                    $("#deleting").promise().done(function() {
                        $("#dtable").fadeIn(1000);
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
                url: "operations.php?id=" + sel,
                type: "DELETE",
                success: function(response) {
                    if (response == 'true') {
                        document.getElementById("delres").innerHTML = "Row was deleted";
                    } else {
                        document.getElementById("delres").innerHTML = "Row doesn't exist";
                    }
                    //refreshes the selectpicker after query
                    getinfo();
                    setTimeout(
                        function() {
                            filltable();
                        }, 500);
                }
            });
        });




        //update ajax
        //this function is for building update and create queries
        $("#subup").click(function() {
            // an array that stores the information that will be used
            var query = "UPDATE venues SET"
            var opt = ['id', 'roomname', 'location', 'capacity', 'x', 'y'];
            for (var i = 0; i < opt.length; i++) {
                if (document.getElementById("U" + opt[i]).value != "") {
                    if (opt[i] == "id" ||
                        opt[i] == 'capacity' ||
                        opt[i] == 'x' ||
                        opt[i] == 'y') {
                        query = query + " " + opt[i] + "=" + document.getElementById("U" + opt[i]).value + ",";
                    } else {
                        query = query + " " + opt[i] + "= '" + document.getElementById("U" + opt[i]).value + "' ,";
                    }
                }
            }
            query = query.substring(0, query.length - 1);
            query = query + " WHERE venueid =" + upsel + ";";

            //this uses the built query and sends it to the php operations page
            $.ajax({
                url: "operations.php?query=" + query,
                type: "PUT",
                success: function(response) {
                    document.getElementById("selup").innerHTML = "row has been updated";
                    getinfo();
                }
            });
            getinfo();
            setTimeout(
                function() {
                    filltable();
                }, 500);
        });


        //create ajax
        $("#subcreate").click(function() {
            var query = "INSERT INTO VENUES (id,x,y,roomname,location,capacity) VALUES (";
            var opt = ['id', 'roomname', 'location', 'capacity', 'x', 'y'];
            for (var i = 0; i < opt.length; i++) {
                if (document.getElementById("C" + opt[i]).value != "") {
                    if (opt[i] == "id" ||
                        opt[i] == 'capacity' ||
                        opt[i] == 'x' ||
                        opt[i] == 'y') {
                        query = query + document.getElementById("C" + opt[i]).value + ",";
                    } else {
                        query = query + "'" + document.getElementById("C" + opt[i]).value + "',";
                    }
                } else {
                    query = query + "null,";
                }
            }
            query = query.substring(0, query.length - 1);
            query = query + ");";
            $.ajax({
                url: "operations.php",
                type: "POST",
                data: {
                    query: query
                },
                success: function(response) {
                    document.getElementById("selcreate").innerHTML = "Row has been created";
                    getinfo();
                }
            });
            getinfo();
            setTimeout(
                function() {
                    filltable();
                }, 500);
        });
        
        
        //dlbutton function
        $("#dlbutton").click(function(){
           window.location = 'csvsave2.php';
        });
    </script>

    </html>
