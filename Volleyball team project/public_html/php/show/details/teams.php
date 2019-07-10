<!-- NAČÍTÁNÍ Z TABULKY týmy; -->
<div class="jumbotron">
    <div class="container">
        <ul class="nav nav-pills">
            <li class="active"><a href="<?php makeURL(secure($_GET), 'id', NULL, FALSE, FALSE, TRUE); ?>">Zpět</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <?php
    $result = mysqli_query($link, "SELECT * FROM team");
    $row = mysqli_fetch_assoc($result);
    do {
        if ($row["id"] == $_GET['id']) {
            echo "<h2>" . $row["teamName"] . "</h2>";
            echo "<table class = 'table-deail'>";
            echo "<tr><th>Název týmu</th><td>" . $row["teamName"] . "</td></tr>";
            echo "<tr><th>Liga</th><td>" . $row["teamLeague"] . "</td></tr>";
            echo "<tr><th>Kategorie</th><td>" . $row["teamCategory"] . "</td></tr>";
        }
    } while ($row = mysqli_fetch_assoc($result));
    ?>
</tbody>
</table>
</div>