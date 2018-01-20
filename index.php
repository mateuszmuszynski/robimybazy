<?php

include_once('header.php');

$sql = 'SELECT KA.BOOK_ID, KA.ISBN, KA.TITLE, KA.FIRST_NAME, KA.LAST_NAME, KA.BOOKCOUNT FROM KSIAZKI_AUTORA KA';

$clients = oci_parse($conn, $sql);

oci_execute($clients);

echo '
<div class="container">
    <div>
        <div class="pull-left">
            <h2>Lista książek</h2>
        </div>
        <div class="pull-right">
        <h2></h2>
            <button type="button" class="btn btn-primary pull-right">
                <a style="color:white;text-decoration:none;" href="addBook.php">Dodaj książkę</a>
            </button>            
        </div>
    </div>
    ';
echo '<table class="table table-hover">
    <thead>
      <tr>
        <th>ISBN</th>
        <th>Tytuł</th>
        <th>Autor</th>
        <th>Sztuk do wypożyczenia</th>
      </tr>
    </thead>
    <tbody>';

while (($row = oci_fetch_array($clients, OCI_BOTH)) != false) {
    echo '<tr>';
    echo '<td>' . $row['ISBN'] . '</td>';
    echo '<td>' . $row['TITLE'] . '</td>';
    echo '<td>' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '</td>';
    echo '<td>' . $row['BOOKCOUNT'] . '</td>';
    if ($row['BOOKCOUNT'] != '0')
        echo '<td>' . '<a href="loanBook.php?id=' . $row['BOOK_ID'] . '">Wypożycz</>' . '</td>';
    else
        echo '<td></td>';
    echo '<td>' . '<a href="deleteBookSql.php?id=' . $row['BOOK_ID'] . '">Usuń książkę</>' . '</td>';
    echo '</tr>';
}

oci_free_statement($clients);

echo '</tbody></table>';

include_once('footer.php')
?>
