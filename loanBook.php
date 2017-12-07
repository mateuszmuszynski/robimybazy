<?php
include_once('header.php');
if (isset($_GET['save'])) {
    $client = $_POST['client'];
    $loan = oci_parse($conn, "INSERT INTO LOANS (LOAN_ID, BOOK_ID, CLIENT_ID) VALUES (LOANS_SEQ.NEXTVAL, :bookId, :clientId)");
    oci_bind_by_name($loan, "bookId", $_GET['bookId']);    
    oci_bind_by_name($loan, "clientId", $_GET['clientId']);

    oci_execute($loan);
    oci_free_statement($loan);
   header('Location: index.php', true, 301);

   exit();
}

$clients = oci_parse($conn, "SELECT C.CLIENT_ID, C.FIRST_NAME || ' ' || C.LAST_NAME AS NAME FROM CLIENTS C");

$book = oci_parse($conn, "SELECT B.BOOK_ID, B.TITLE FROM BOOKS B WHERE B.BOOK_ID =" . $_GET['id']);

oci_execute($clients);
oci_execute($book);

?>
<div class="container">
    <div>
        <h1>Wypożyczanie ksiązki</h1>
    </div>
    <form>
        <div class="form-group">
            <label>Książka: 
            <?php 
                while (($row = oci_fetch_array($book, OCI_BOTH)) != false) {
                 echo $row['TITLE'];  
                }
                ?>
            </label>
        </div>
        <div class="form-group">
            <label>Czytelnik</label>
            <select name="clientId" class="form-control">
                <?php 
                while (($row = oci_fetch_array($clients, OCI_BOTH)) != false) {
                 echo '<option value="' . $row["CLIENT_ID"] . '">' . $row['NAME'] . '</option>';  
                }
                ?>

            </select>
        </div>
        <?php
        echo '<input type="hidden" name="bookId" value="' . $_GET['id'] .'"/>';
        ?>
        <button type="submit" class="btn btn-default" name='save'>Submit</button>
    </form>
</div>
<?php

oci_free_statement($clients);
oci_free_statement($book);
include_once('footer.php')
?>