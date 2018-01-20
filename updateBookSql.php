<?php

include_once('phpDatabaseConnection.php');

$sql = "UPDATE BOOKS SET AUTHOR_ID=:authorid, ISBN=:isbn, TITLE=:title, BOOKCOUNT=:bookCount WHERE BOOK_ID=:bookId";



$loan = oci_parse($conn, $sql);
oci_bind_by_name($loan, "authorId", $_POST['authorId']);
oci_bind_by_name($loan, "isbn", $_POST['isbn']);
oci_bind_by_name($loan, "title", $_POST['bookTitle']);
oci_bind_by_name($loan, "bookCount", $_POST['bookCount']);
oci_bind_by_name($loan, "bookId", $_POST['id']);

oci_execute($loan);
oci_free_statement($loan);
header('Location: index.php', true, 301);

exit();
?>