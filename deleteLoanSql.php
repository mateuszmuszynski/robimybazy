<?php

include_once('phpDatabaseConnection.php');

$sql = "begin DOKONAJ_ZWROTU(:id); end;";

$loan = oci_parse($conn, $sql);
oci_bind_by_name($loan, "id", $_GET['id']);
oci_execute($loan);
oci_free_statement($loan);
header('Location: loans.php', true, 301);

exit();
?>