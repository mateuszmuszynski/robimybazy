<?php
include_once('header.php');

$sql = 'SELECT B.BOOK_ID, B.ISBN, B.TITLE, A.FIRST_NAME, A.LAST_NAME FROM BOOKS B JOIN AUTHORS A ON B.AUTHOR_ID = A.AUTHOR_ID';

$clients = oci_parse($conn, $sql);

oci_execute($clients);

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
        <th><th>
      </tr>
    </thead>
    <tbody>';

while (($row = oci_fetch_array($clients, OCI_BOTH)) != false) {
    echo '<tr>';
    echo '<td>' . $row['ISBN'] . '</td>';    
    echo '<td>' . $row['TITLE'] . '</td>';    
    echo '<td>' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '</td>';    
    echo '<td>' . '<a href="loanBook.php?id=' . $row['BOOK_ID'] . '">Wypożycz</>' . '</td>';
    echo '</tr>';
}

oci_free_statement($clients);

echo '</tbody></table>';

include_once('footer.php')
?>
