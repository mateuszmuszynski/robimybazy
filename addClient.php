<?php
include_once('header.php');
?>
<div class="container">
    <div>
        <h2>Dodanie czytelnika</h2>
    </div>
    <form action="addClientSql.php"  method="POST">

        <div class="form-group">
            <label for="firstName">Imię</label>
            <input type="text" class="form-control" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Nazwisko</label>
            <input type="text" class="form-control" name="lastName">
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="gender" class="custom-control-input" value="woman">
            <label class="custom-control-label" for="woman">Kobieta</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="gender" class="custom-control-input" value="man">
            <label class="custom-control-label" for="man">Mężczyzna</label>
        </div>

        <button type="submit" class="btn btn-default pull-right" name='save'>Dodaj</button>
    </form>
</div>
<?php
include_once('footer.php')
?>