<?php

include_once('phpDatabaseConnection.php');

$sql = "DELETE FROM BOOKS WHERE book_id=:id";

$loan = oci_parse($conn, $sql);
oci_bind_by_name($loan, "id", $_GET['id']);
oci_execute($loan);
oci_free_statement($loan);
header('Location: index.php', true, 301);

exit();
?>