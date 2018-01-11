<?php

include_once('header.php');

$sql = 'SELECT AUTHOR_ID, FIRST_NAME, LAST_NAME FROM AUTHORS';

$authors = oci_parse($conn, $sql);

oci_execute($authors);

echo '
<div class="container">
    <div class="pull-left">
            <h2>Lista autorów książek</h2>
        </div>
        <div class="pull-right">
        <h2></h2>
            <button type="button" class="btn btn-primary pull-right">
                <a style="color:white;text-decoration:none;" href="addAuthor.php">Dodaj autora</a>
            </button>            
        </div>';
echo '<table class="table table-hover">
    <thead>
      <tr>
        <th>Imie</th>
        <th>Nazwisko</th>
      </tr>
    </thead>
    <tbody>';

while (($row = oci_fetch_array($authors, OCI_BOTH)) != false) {
    echo '<tr>';
    echo '<td>' . $row['FIRST_NAME'] . '</td>';
    echo '<td>' . $row['LAST_NAME'] . '</td>';
    echo '<td>' . '<a href="deleteAuthorSql.php?id=' . $row['AUTHOR_ID'] . '">Usuń</>' . '</td>';
    echo '</tr>';
}

oci_free_statement($authors);

echo '</tbody></table>';

include_once('footer.php')
?>