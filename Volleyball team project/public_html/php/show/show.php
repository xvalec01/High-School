<?php

if (isset($_GET['id'])) {
    include 'details/detail.php';
} else {
echo "<link rel='stylesheet' href='css/show.css' type='text/css'>";
include '/php/filter.php';
include 'php/show/table.php';
}