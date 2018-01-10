<?php
include_once('header.php');
?>
<div class="container">
    <div>
        <h2>Dodanie autora</h2>
    </div>
    <form action="addAuthorSql.php"  method="POST">
        
        <div class="form-group">
            <label for="firstName">Imię</label>
            <input type="text" class="form-control" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Nazwisko</label>
            <input type="text" class="form-control" name="lastName">
        </div>

        <button type="submit" class="btn btn-default pull-right" name='save'>Dodaj</button>
    </form>
</div>
<?php
include_once('footer.php')
?>