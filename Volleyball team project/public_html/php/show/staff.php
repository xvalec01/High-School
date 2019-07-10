<!-- NAČÍTÁNÍ Z TABULKY PLAYERS; -->
<div class="container">
    <h2>Zaměstnanci</h2>
    <table class="table table-condensed">
        <thead><tr><th>Jméno</th><th>Přijmení</th><th>Email</th><th>Tel. číslo</th><th>Ulice</th><th>č. p.</th><th>PSČ</th><th>Licence</th></tr></thead><tbody>
            <?php
            $result = mysqli_query($link, "SELECT * FROM staff");
            while ($row = mysqli_fetch_assoc($result)) {
//        print_r($row);
                echo "<tr onclick=\"window.location = '";
                makeURL($_GET, 'id', $row["id"]);
                echo"'\"><td>" . $row["stfName"] . "</td><td>" . $row["stfSurname"] . "</td><td>" . $row["stfEmail"] . "</td><td>" . $row["stfPhone"] . "</td><td>" . $row["stfStreet"] . "</td><td>" . $row["stfHouseNum"] . "</td><td>" . $row["city_id"] . "</td><td>" . $row["stfLicence"] . "<td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>