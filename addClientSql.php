<?php

include_once('phpDatabaseConnection.php');

$gender = $_POST['gender'] == 'man' ? 0 : 1;

$sql = "INSERT INTO CLIENTS VALUES (AUTHORS_SEQ.NEXTVAL, :firstName, :lastName, :gender, sysdate)";

$loan = oci_parse($conn, $sql);
oci_bind_by_name($loan, "firstName", $_POST['firstName']);
oci_bind_by_name($loan, "lastName", $_POST['lastName']);
oci_bind_by_name($loan, "gender", $gender);

oci_execute($loan);
oci_free_statement($loan);
header('Location: clients.php', true, 301);

exit();
?>