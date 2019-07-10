<!-- NAČÍTÁNÍ Z TABULKY PLAYERS; -->
<div class="container">
    <h2>Hráči</h2>
    <table class="table table-condensed">
        <thead><tr><th>Jméno</th><th>Přijmení</th><th>Email</th><th>Tel. číslo</th><th>Ulice</th><th>č. p.</th><th>PSČ</th><th>Datum narození</th><th>Velikost bot</th><th>Velikost dresu</th></tr></thead><tbody>
            <?php
            $result = mysqli_query($link, "SELECT * FROM players");
            while ($row = mysqli_fetch_assoc($result)) {
//        print_r($row);
                echo "<tr onclick=\"window.location = '";
                makeURL($_GET, 'id', $row["id"]);
                echo"'\"><td>" . $row["plrName"] . "</td><td>" . $row["plrSurname"] . "</td><td>" . $row["plrEmail"] . "</td><td>" . $row["plrPhone"] . "</td><td>" . $row["plrStreet"] . "</td><td>" . $row["plrHouseNum"] . "</td><td>" . $row["city_id"] . "</td><td>";
                dateFormat($row["plrDate"]);
                echo "</td><td>" . $row["plrSizeShoes"] . "</td><td>" . $row["plrSizeDress"] . "<td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>