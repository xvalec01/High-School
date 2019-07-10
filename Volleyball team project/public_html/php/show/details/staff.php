<!-- NAČÍTÁNÍ Z TABULKY Zaměstnanci; -->
<div class="jumbotron">
    <div class="container">
        <ul class="nav nav-pills">
            <li class="active"><a href="<?php makeURL(secure($_GET), 'id', NULL, FALSE, FALSE, TRUE); ?>">Zpět</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <?php
    $result = mysqli_query($link, "SELECT * FROM staff");
    $row = mysqli_fetch_assoc($result);
    do {
        if ($row["id"] == $_GET['id']) {
            echo "<h2>" . $row["stfName"] . " " . $row["stfSurname"] . "</h2>";
            echo "<table class = 'table-deail'>";
            echo "<tr><th>Jméno</th><td>" . $row["stfName"] . "</td></tr>";
            echo "<tr><th>Přijmení</th><td>" . $row["stfSurname"] . "</td></tr>";
            echo "<tr><th>Email</th><td>" . $row["stfEmail"] . "</td></tr>";
            echo "<tr><th>Telefon</th><td>" . $row["stfPhone"] . "</td></tr>";
            echo "<tr><th>Ulice</th><td>" . $row["stfStreet"] . "</td></tr>";
            echo "<tr><th>Číslo popisné</th><td>" . $row["stfHouseNum"] . "</td></tr>";
            echo "<tr><th>Město</th><td>" . $row["city_id"] . "</td></tr>";
            echo "<tr><th>Licence</th><td>" . $row["stfLicence"] . "</td></tr>";
        }
    } while ($row = mysqli_fetch_assoc($result));
    ?>
</tbody>
</table>
<br>
</div>