<?php

//$address = array("3523 Main St, Vancouver", "Suite 250, 828 West 8th Avenue, Vancouver", 
//                 "801-1200 Burrard Street, Vancouver", "112-3195 Granville Street"); // Google HQ
$i = 0;
foreach($address as $addr)
{

    $prepAddr = str_replace(' ','+',$addr);

    $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');

    $output= json_decode($geocode);

    $lat[$i] = $output->results[0]->geometry->location->lat;
    $long[$i] = $output->results[0]->geometry->location->lng;

//    echo $addr.'<br>Lat: '.$lat.'<br>Long: '.$long;
    $i++;
}

$lat_avg = array_sum($lat) / count($address);
$long_avg = array_sum($long) / count($address);

?>

        <?php
            echo "<script type=\"text/javascript\">\n
                  var map;";

            echo "$(document).ready(function(){\n
                  map = new GMaps({\n
                    el: '#map-canvas',\n
                    lat: " . $lat_avg .",\n
                    lng: " . $long_avg . "\n
                  });\n";
       
 
            for($i = 0; $i < count($address); $i++)
            {
                echo "map.setZoom(4);";

                echo "map.addMarker({ \n";
                echo "lat: " . $lat[$i] . ",\n";
                echo "lng: " . $long[$i] . ",\n";
                echo "title: '" . $address[$i] . "',\n";
                echo "infoWindow: {\n
                      content: '".$address[$i]."'\n
                      }\n";
                echo "});\n";
 
            }

            echo "}); \n  
                 </script>";


        ?>
