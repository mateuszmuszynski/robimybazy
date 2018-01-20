<?php
include_once('header.php');

$authors = oci_parse($conn, "SELECT A.AUTHOR_ID, A.first_name || ' ' || A.last_name AS NAME FROM AUTHORS A");
oci_execute($authors);

$book = oci_parse($conn, "SELECT ISBN, TITLE, BOOKCOUNT FROM BOOKS WHERE BOOK_ID = :id");
oci_bind_by_name($book, "id", $_GET['id']);
oci_execute($book);

$dbBook = null;
while (($row = oci_fetch_array($book, OCI_BOTH)) != false) {
    $dbBook = $row;
}
?>
<div class="container">
    <div>
        <h2>Aktualizacja książki</h2>
    </div>
    <form action="updateBookSql.php"  method="POST">
        <?php
        echo '<input type="hidden" class="form-control" name="id" value="' . $_GET["id"] . '">';
        ?>
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
            <?php
            echo '<input type="text" class="form-control" name="bookTitle" value="' . $dbBook["TITLE"] . '">';
            ?>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <?php
            echo '<input type="text" class="form-control" name="isbn" value="' . $dbBook["ISBN"] . '">';
            ?>
        </div>
        <div class="form-group">
            <label for="bookCount">Sztuki</label>
            <?php
            echo '<input type="text" class="form-control" name="bookCount" value="' . $dbBook["BOOKCOUNT"] . '">';
            ?>
        </div>

        <button type="submit" class="btn btn-default pull-right" name='save'>Zaktualizuj</button>
    </form>
</div>
<?php
oci_free_statement($authors);
include_once('footer.php')
?>