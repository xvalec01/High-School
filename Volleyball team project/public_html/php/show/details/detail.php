<?php
if (isset($_GET['table'])) {
    $table = secure($_GET['table']);
}
if (isset($_GET['table'])) {
    switch ($table) {
        case "players": include 'players.php';
            break;
        case "staff": include 'staff.php';
            break;
        case "city": include 'city.php';
            break;
        case "teams": include 'teams.php';
            break;
    }
} else {
    include 'php/show/default.php';
}
?>
<br>