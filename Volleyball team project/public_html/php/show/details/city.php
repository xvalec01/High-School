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
    $result = mysqli_query($link, "SELECT * FROM city");
    $row = mysqli_fetch_assoc($result);
    do {
        if ($row["id"] == $_GET['id']) {
            echo "<h2>" . $row["cityName"] . "</h2>";
            echo "<table class = 'table-deail'>";
            echo "<tr><th>Název</th><td>" . $row["cityName"] . "</td></tr>";
            echo "<tr><th>PSČ</th><td>" . $row["id"] . "</td></tr>";
        }
    } while ($row = mysqli_fetch_assoc($result));
    ?>
</tbody>
</table>
</div>