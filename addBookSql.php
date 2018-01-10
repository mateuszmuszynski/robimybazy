<?php

include_once('phpDatabaseConnection.php');

$sql = "INSERT INTO BOOKS (book_id, author_id, isbn, title) VALUES (BOOKS_SEQ.NEXTVAL, :authorId, :isbn, :title)";

$loan = oci_parse($conn, $sql);
oci_bind_by_name($loan, "authorId", $_POST['authorId']);
oci_bind_by_name($loan, "isbn", $_POST['isbn']);
oci_bind_by_name($loan, "title", $_POST['bookTitle']);

oci_execute($loan);
oci_free_statement($loan);
header('Location: index.php', true, 301);

exit();
?>