<!-- NAČÍTÁNÍ Z TABULKY PLAYERS; -->
<div class="jumbotron">
    <div class="container">
        <ul class="nav nav-pills">
            <li class="active"><a href="<?php makeURL(secure($_GET), 'id', NULL, FALSE, FALSE, TRUE); ?>">Zpět</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <?php
    $result = mysqli_query($link, "SELECT * FROM players");
    $row = mysqli_fetch_assoc($result);
    do {
        if ($row["id"] == $_GET['id']) {
            echo "<h2>" . $row["plrName"] . " " . $row["plrSurname"] . "</h2>";
            echo "<table class = 'table-deail'>";
            echo "<tr><th>Jméno</th><td>" . $row["plrName"] . "</td></tr>";
            echo "<tr><th>Přijmení</th><td>" . $row["plrSurname"] . "</td></tr>";
            echo "<tr><th>Email</th><td>" . $row["plrEmail"] . "</td></tr>";
            echo "<tr><th>Telefon</th><td>" . $row["plrPhone"] . "</td></tr>";
            echo "<tr><th>Ulice</th><td>" . $row["plrStreet"] . "</td></tr>";
            echo "<tr><th>Číslo popisné</th><td>" . $row["plrHouseNum"] . "</td></tr>";
            echo "<tr><th>Město</th><td>" . $row["city_id"] . "</td></tr>";
            echo "<tr><th>Velikost boty</th><td>" . $row["plrSizeShoes"] . "</td></tr>";
            echo "<tr><th>Velikost dresu</th><td>" . $row["plrSizeDress"] . "</td></tr>";
        }
    } while ($row = mysqli_fetch_assoc($result));
    ?>
</tbody>
</table>
</div>