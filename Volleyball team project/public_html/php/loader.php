<?php

$link = mysqli_connect("localhost", "root", "", "voleyball_team");
if (!$link) {
    echo "Failed to connect to MySQL: (" . mysqli_connect_errno() . ") " . mysqli_connect_error();
}
mysqli_set_charset($link, "utf8");
//echo mysqli_get_host_info() . "\n";
