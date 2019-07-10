<div class="container">
    <form role="form" method="post" action="php/forms/save.php/<?php makeURL($_GET,'','',false,true);?>">
        <div class="form-group">
            <h2>Týmy</h2>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <tr><th> <label for="teamName">Název týmu: </label></th>
                        <td> <input type="text" class="form-control" id="teamName" name="teamName"></td></tr>
                    <tr><th><label for="teamLeague">Liga: </label></th>
                        <td><select class="form-control" id="teamLeague" name="teamLeague">
                                <option value='ex'>ex</option>
                                <option value='1'>1.</option>
                                <option value='2'>2.</option>
                                <option value='3'>3.</option>
                                <option value='4'>4.</option>
                                <option value='5'>5.</option>
                            </select></td></tr>
                    <tr><th><label for="teamCategory">Kategorie: </label></th>
                        <td><select class="form-control" id="teamCategory" name="teamCategory">
                                <option value='jr'>Junioři</option>
                                <option value='sr'>Senioři</option>
                            </select></td></tr>
                    <tr><th></th><td><input type="submit"</td></tr>
                </table>  
            </div>
        </div>   
    </form>
</div>