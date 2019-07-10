<!-- NAČÍTÁNÍ Z TABULKY CITY; -->
<div class="container">
    <h2>Města</h2>
    <table class="table table-condensed">
        <thead><tr><th>Název města</th><th>PSČ</th></tr></thead><tbody>
            <?php
            $result = mysqli_query($link, "SELECT * FROM city");
            while ($row = mysqli_fetch_assoc($result)) {
//        print_r($row);
                echo "<tr onclick=\"window.location = '";
                makeURL($_GET, 'id', $row["id"]);
                echo"'\"><td>" . $row["cityName"] . "</td><td>" . $row["id"] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>