<?php
 include 'conn.php';

            $sql = "select * from events;";
            $stmt = $myPDO->prepare($sql);
            $stmt->execute();

            $headers = array("title1" => "eventid","title2" => "eventtitle","title3" => "eventdescription","title4" => "eventstart","title5" => "eventend","title6" => "eventvenue","title7" => "eventurl","title8" => "eventcontact","title9" => "eventprivacy","title10" => "eventts","title11" => "eventcoordinates","title12" => "x","title13" => "y" );
            $list = array ();
            array_push($list, array_values($headers));
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($list, array_values($row));
                
            }

            // Output array into CSV file
            $fp = fopen('php://output', 'w');
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="events.csv"');
            foreach ($list as $ferow) {
                fputcsv($fp, $ferow);
            }




?>