<?php

function  deleterow() {
$link = mysqli_connect("localhost", "root", "", "voleyball_team");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$deltb=$_GET[table];
secure($deltb);
$delid=0;
// sql to delete a record
$sql = "DELETE FROM $deltb WHERE id=$delid";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
}