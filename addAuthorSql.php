<?php

include_once('phpDatabaseConnection.php');

$sql = "INSERT INTO AUTHORS VALUES (AUTHORS_SEQ.NEXTVAL, :firstName, :lastName)";

$loan = oci_parse($conn, $sql);
oci_bind_by_name($loan, "firstName", $_POST['firstName']);
oci_bind_by_name($loan, "lastName", $_POST['lastName']);

oci_execute($loan);
oci_free_statement($loan);
header('Location: authors.php', true, 301);

exit();
?>