<div class="container">
    <form role="form" method="post" action="php/forms/save.php/<?php makeURL($_GET, '', '', false, true); ?>">
        <div class="form-group">
            <h2>Hráči</h2>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <tr><th> <label for="plrName">Křestní jméno: </label></th>
                        <td> <input type="text" class="form-control" id="plrName" name="plrName"></td></tr>
                    <tr><th><label for="plrSurname">Příjmení: </label></th>
                        <td><input type="text" class="form-control" id="plrSurname" name="plrSurname"></td></tr>
                    <tr><th><label for="plrEmail">E-Mail: </label></th>
                        <td><input type="email" class="form-control" id="plrEmail" name="plrEmail"></td></tr>
                    <tr><th><label for="plrPhone">Telefonní číslo: </label></th>
                        <td><input type="tel" class="form-control" id="plrPhone" name="plrPhone"></td></tr>
                    <tr><th><label for="plrStreet">Ulice: </label></th>
                        <td><input type="text" class="form-control" id="plrStreet" name="plrStreet"></td></tr>
                    <tr><th><label for="plrHouseNum">Číslo popisné: </label></th>
                        <td><input type="number" class="form-control" id="plrHouseNum" name="plrHouseNum"></td></tr>
                    <tr><th><label for="city_id">Město: </label></th>
                        <td><select type="text" class="form-control" id="city_id" name="city_id">
                                <?php
                                $result = mysqli_query($link, "SELECT * FROM city");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row["id"] . "'>" . $row["cityName"] . "</option> ";
                                }
                                ?>
                            </select></td></tr>
                    <tr><th><label for="plrDate">Datum narození: </label></th>
                        <td><input type="date" class="form-control" id="plrDate" name="plrDate"></td></tr>
                    <tr><th><label for="plrSizeShoes">Velikost bot: </label></th>
                        <td><input type="number" class="form-control" id="plrSizeShoes" name="plrSizeShoes"></td></tr>
                    <tr><th><label for="plrSizeDress">Velikost oblečení: </label></th>
                        <td class=""><select class="form-control" id="plrSizeDress" name="plrSizeDress">
                                <option value='xs'>xs</option>
                                <option value='s'>s</option>
                                <option value='m'>m</option>
                                <option value='l'>l</option>
                                <option value='xl'>xl</option>
                                <option value='xxl'>xxl</option>
                                <option value='xxxl'>xxxl</option>
                            </select></td></tr>
                    <tr><th></th><td><input type="submit"</td></tr>
                </table>  
            </div>
        </div>   
    </form>
</div>