<?php
 include 'conn.php';

            $sql = "select * from venues;";
            $stmt = $myPDO->prepare($sql);
            $stmt->execute();

            $headers = array("title1" => "venueid","title2" => "id","title3" => "tags","title4" => "x","title5" => "y","title6" => "roomname","title7" => "location","title8" => "capacity","title9" => "deleted","title10" => "floor");
            $list = array ();
            array_push($list, array_values($headers));
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($list, array_values($row));
                
            }

            // Output array into CSV file
            $fp = fopen('php://output', 'w');
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="venues.csv"');
            foreach ($list as $ferow) {
                fputcsv($fp, $ferow);
            }




?>