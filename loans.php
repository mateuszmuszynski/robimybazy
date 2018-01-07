<?php

include_once('header.php');

$sql = 'select * from loans';

$loans = oci_parse($conn, $sql);

oci_execute($loans);

echo '
<div class="container">
    <div>
        <h1>Lista wypożyczeń</h1>
    </div>';
echo '<table class="table table-hover">
    <thead>
      <tr>
        <th>Tytuł książki</th>
        <th>Wypożyczony przez</th>
        <th></th>
      </tr>
    </thead>
    <tbody>';

while (($row = oci_fetch_array($loans, OCI_BOTH)) != false) {
    echo '<tr>';
    echo '<td>' . $row['BOOK_ID'] . '</td>';
    echo '<td>' . $row['CLIENT_ID'] . '</td>';
    echo '<td>' . '<a href="endLoan.php?id=' . $row['BOOK_ID'] . '">Zwróć</>' . '</td>';
    echo '</tr>';
}

oci_free_statement($loans);

echo '</tbody></table>';

include_once('footer.php')
?>