<!-- NAČÍTÁNÍ Z TABULKY PLAYERS; -->
<div class="container">
    <h2>Týmy</h2>
    <table class="table table-condensed">
        <thead><tr><th>Jméno týmu</th><th>Název ligy</th><th>Kategorie</th></tr></thead><tbody>
            <?php
            $result = mysqli_query($link, "SELECT * FROM team");
            while ($row = mysqli_fetch_assoc($result)) {
//        print_r($row);
                echo "<tr onclick=\"window.location = '";
                makeURL($_GET, 'id', $row["id"]);
                echo"'\"><td>" . $row["teamName"] . "</td><td>" . $row["teamLeague"] . "</td><td>" . $row["teamCategory"] . "<td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>