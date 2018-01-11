<?php
include_once('phpDatabaseConnection.php');

echo $_GET['id'];
$sql = "DELETE FROM AUTHORS WHERE author_id=:id";

$loan = oci_parse($conn, $sql);
oci_bind_by_name($loan, "id", $_GET['id']);
oci_execute($loan);
oci_free_statement($loan);
header('Location: authors.php', true, 301);

exit();
?>