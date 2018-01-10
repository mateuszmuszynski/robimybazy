<?php
$username = 'system';
$password = 'system';
$connectionString = 'localhost/XE';

$conn = oci_connect($username, $password, $connectionString);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
?>

