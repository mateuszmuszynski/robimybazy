<?php
include_once('header.php');
$username = 'system';
$password = 'system';
$connectionString = 'localhost/XE';



$conn = oci_pconnect($username, $password, $connectionString);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'SELECT B.ISBN, B.TITLE, A.FIRST_NAME, A.LAST_NAME FROM BOOKS B JOIN AUTHORS A ON B.AUTHOR_ID = A.AUTHOR_ID';

$books = oci_parse($conn, $sql);

oci_execute($books);

echo '
<div class="container">
    <div>
        <h1>Lista książek</h1>
    </div>
    ';
echo '<table class="table table-hover">
    <thead>
      <tr>
        <th>ISBN</th>
        <th>Tytuł</th>
        <th>Autor</th>
      </tr>
    </thead>
    <tbody>';

while (($row = oci_fetch_array($books, OCI_BOTH)) != false) {
    echo '<tr>';
    echo '<td>' . $row['ISBN'] . '</td>';    
    echo '<td>' . $row['TITLE'] . '</td>';    
    echo '<td>' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '</td>';
    echo '</tr>';
}

oci_free_statement($books);
oci_close($conn);

echo '</tbody></table>';

include_once('footer.php')
?>
