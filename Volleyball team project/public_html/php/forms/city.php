<div class="container">
    <form role="form" method="post" action="php/forms/save.php/<?php makeURL($_GET,'','',false,true);?>">
        <div class="form-group">
            <h2>Město</h2>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <tr><th> <label for="id">PSČ: </label></th>
                        <td> <input type="text" class="form-control" name="id"></td></tr>
                    <tr><th><label for="cityName">Název města: </label></th>
                        <td><input type="text" class="form-control" name="cityName"></td></tr>
                    <tr><th></th><td><input type="submit"</td></tr>
                </table>  
            </div>
        </div>  
    </form>
</div>