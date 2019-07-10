<div class="container">
    <form role="form" method="post" action="php/forms/save.php/<?php makeURL($_GET, '', '', false, true); ?>">
        <div class="form-group">
            <h2>Zaměstnanci</h2>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <tr><th> <label for="stfName">Křestní jméno: </label></th>
                        <td> <input type="text" class="form-control" id="stfName" name="stfName"></td></tr>
                    <tr><th><label for="stfSurname">Příjmení: </label></th>
                        <td><input type="text" class="form-control" id="stfSurname" name="stfSurname"></td></tr>
                    <tr><th><label for="stfEmail">E-Mail: </label></th>
                        <td><input type="email" class="form-control" id="stfEmail" name="stfEmail"></td></tr>
                    <tr><th><label for="stfPhone">Telefonní číslo: </label></th>
                        <td><input type="tel" class="form-control" id="stfPhone" name="stfPhone"></td></tr>
                    <tr><th><label for="stfStreet">Ulice: </label></th>
                        <td><input type="text" class="form-control" id="stfStreet" name="stfStreet"></td></tr>
                    <tr><th><label for="stfHouseNum">Číslo popisné: </label></th>
                        <td><input type="number" class="form-control" id="stfHouseNum" name="stfHouseNum"></td></tr>
                    <tr><th><label for="city_id">Město: </label></th>
                        <td><select type="text" class="form-control" id="city_id" name="city_id">
                                <?php
                                $result = mysqli_query($link, "SELECT * FROM city");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row["id"] . "'>" . $row["cityName"] . "</option> ";
                                }
                                ?>
                            </select></td></tr>
                    <tr><th><label for="stfLicence">Licence: </label></th>
                        <td><input type="text" class="form-control" id="stfLicence" name="stfLicence"></td></tr>
                    <tr><th></th><td><input type="submit"</td></tr>
                </table>  
            </div>
        </div>   
    </form>
</div>