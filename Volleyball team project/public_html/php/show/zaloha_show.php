<!--tu bude jen rozdelění, jaká tabulka se načte, podle filtrů
    ted je načtená jediná hotová, a to players.-->
<?php
if (isset($_GET['id'])) {
    iclude:'detail/detail.php';
} else {
    include '/php/filter.php';
    if (isset($_GET['table']))
        $table = secure($_GET['table']);

    if (isset($_GET['page']))
        $page = secure($_GET['page']);
    switch ($page) {
        case "show":
            echo "<link rel='stylesheet' href='css/show.css' type='text/css'>";
            break;
        case "del":
            echo "<link rel='stylesheet' href='css/del.css' type='text/css'>";
            break;
        case "edit":
            echo "<link rel='stylesheet' href='css/edit.css' type='text/css'>";
            break;
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
            case "details": include 'details/players.php';
                break;
        }
    } else {
        include 'php/show/default.php';
    }
}