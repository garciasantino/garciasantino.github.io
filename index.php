<html>
 <head>
  <title>IC3k1ng Servers</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="wickedcss.min.css" type="text/css">
  <meta charset="utf-8">
 </head>
 <body>
  <center>
  <div class="pulse"><img src="logo.png" width="300"></div>
  <br>
<?php
    $server_ip = "45.235.99.2";
    $server_port = "27036"; // Default port for CS 1.6

    $socket = @fsockopen("udp://" . $server_ip, $server_port , $errno, $errstr, 1);

    if (!$socket) {
        echo "Server is offline";
    } else {
        $data = "\xFF\xFF\xFF\xFFTSource Engine Query\x00";
        fwrite($socket, $data);
        $response = fread($socket, 4096);
        fclose($socket);

        if (substr($response, 0, 4) == "\xFF\xFF\xFF\xFF") {
            $response = substr($response, 6);
            $parts = explode("\x00", $response);
            $server_name = $parts[1];
            $map_name = $parts[2];
            $current_players = ord($parts[5]);
            $max_players = 10;
            $server_type = $parts[3];
            $player_count = $current_players . "/" . $max_players;

            echo "<div class='servercontainer'>";
            echo "<img src='maps/" .$map_name . ".jpg'>";
            echo "<img src='cs16.png' style='width: 40px; height: 40px; filter: drop-shadow(0 0 0);'>";
            echo "<h3>" . $server_name . "</h3>";
            echo "<p>IP Address: <a href='steam://connect/" . $server_ip . ":" . $server_port . "'>" . $server_ip . ":" . $server_port . "</a></p>";
            echo "<p>" . $player_count . " players connected</p>";
            echo "<p>Now playing " . $map_name . "</p>";
            echo "</div>";

        } else {
            echo "Invalid response from server";
        }
    }
?>
<br>
<?php
    $server_ip = "45.235.99.2";
    $server_port = "27036"; // Default port for CS 1.6

    $socket = @fsockopen("udp://" . $server_ip, $server_port , $errno, $errstr, 1);

    if (!$socket) {
        echo "Server is offline";
    } else {
        $data = "\xFF\xFF\xFF\xFFTSource Engine Query\x00";
        fwrite($socket, $data);
        $response = fread($socket, 4096);
        fclose($socket);

        if (substr($response, 0, 4) == "\xFF\xFF\xFF\xFF") {
            $response = substr($response, 6);
            $parts = explode("\x00", $response);
            $server_name = $parts[1];
            $map_name = $parts[2];
            $current_players = ord($parts[5]);
            $max_players = 10;
            $server_type = $parts[3];
            $player_count = $current_players . "/" . $max_players;

            echo "<div class='servercontainer'>";
            echo "<img src='maps/" .$map_name . ".jpg'>";
            echo "<img src='cs16.png' style='width: 40px; height: 40px; filter: drop-shadow(0 0 0);'>";
            echo "<h3>" . $server_name . "</h3>";
            echo "<p>IP Address: <a href='steam://connect/" . $server_ip . ":" . $server_port . "'>" . $server_ip . ":" . $server_port . "</a></p>";
            echo "<p>" . $player_count . " players connected</p>";
            echo "<p>Now playing " . $map_name . "</p>";
            echo "</div>";

        } else {
            echo "Invalid response from server";
        }
    }
?>
<br>
  <a href="https://tsarvar.com/es/servers/counter-strike-1.6/45.235.99.2:27036"><img src="tsarvar.png" width="100px" title="VOTENOS EN TSARVAR (dando una opinion)"></a>
  </center>
 </body>
</html>