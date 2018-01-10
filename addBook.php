<?php
include_once('header.php');

$authors = oci_parse($conn, "SELECT A.AUTHOR_ID, A.first_name || ' ' || A.last_name AS NAME FROM AUTHORS A");
oci_execute($authors);

?>
<div class="container">
    <div>
        <h2>Dodanie książki</h2>
    </div>
    <form action="addBookSql.php"  method="POST">
        <div class="form-group">
            <label for="authors">Autor</label>
            <select class="form-control" name="authorId">
                <?php
                while (($row = oci_fetch_array($authors, OCI_BOTH)) != false) {
                    echo '<option value="' . $row["AUTHOR_ID"] . '">' . $row['NAME'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="bookTitle">Tytuł</label>
            <input type="text" class="form-control" name="bookTitle">
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" name="isbn">
        </div>


        <button type="submit" class="btn btn-default pull-right" name='save'>Dodaj</button>
    </form>
</div>
<?php
oci_free_statement($authors);
include_once('footer.php')
?>