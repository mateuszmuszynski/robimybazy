<?php

include_once('header.php');

$sql = 'SELECT FIRST_NAME, LAST_NAME, GENDER, DATE_OF_BIRTH FROM CLIENTS';

$clients = oci_parse($conn, $sql);

oci_execute($clients);

echo '
<div class="container">
    <div>
        <h1>Lista czytelników</h1>
    </div>';
echo '<table class="table table-hover">
    <thead>
      <tr>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Płeć</th>
        <th>Data urodzenia<th>
      </tr>
    </thead>
    <tbody>';

while (($row = oci_fetch_array($clients, OCI_BOTH)) != false) {
    echo '<tr>';
    echo '<td>' . $row['FIRST_NAME'] . '</td>';
    echo '<td>' . $row['LAST_NAME'] . '</td>';
    echo '<td>' . ($row['GENDER'] == '0' ? 'Mężczyzna' : 'Kobieta') . '</td>';
    echo '<td>' . $row['DATE_OF_BIRTH'] . '</td>';
    echo '</tr>';
}

oci_free_statement($clients);

echo '</tbody></table>';

include_once('footer.php')
?>