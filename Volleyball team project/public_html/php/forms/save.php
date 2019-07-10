<?php

require_once '../func.php';

$link = mysqli_connect("localhost", "root", "", "voleyball_team");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}


switch ($_GET['table']) {
    case "staff":
        $table = "staff";
        $atributes = "stfName, stfSurname, stfPhone, stfEmail, stfStreet, stfHouseNum, stfLicence";
        $data = "'$_POST[stfName]', '$_POST[stfSurname]', '$_POST[stfPhone]', '$_POST[stfEmail]', '$_POST[stfStreet]', '$_POST[stfHouseNum]', '$_POST[stfLicence]'";

        break;

    case "city":
        $table = "city";
        $atributes = "id, cityName";
        $data = "'$_POST[id]', '$_POST[cityName]'";
        break;

    case "players":
        $table = "players";
        $atributes = "plrName, plrSurname, plrEmail, plrPhone, plrStreet, plrHouseNum, city_id, plrDate, plrSizeShoes, plrSizeDress";
        $data = "'$_POST[plrName]', '$_POST[plrSurname]', '$_POST[plrEmail]', '$_POST[plrPhone]', '$_POST[plrStreet]', '$_POST[plrHouseNum]', '$_POST[city_id]', '$_POST[plrDate]', '$_POST[plrSizeShoes]', '$_POST[plrSizeDress]'";
        break;

    case "teams":
        $table = "team";
        $atributes = "teamName, teamLeague, teamCategory";
        $data = "'$_POST[teamName]', '$_POST[teamLeague]', '$_POST[teamCategory]'";
        break;
}
secure($data);
$sql = "INSERT INTO $table ($atributes) VALUES ($data)";

if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
    header("location:javascript://window.history.back();)");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}


