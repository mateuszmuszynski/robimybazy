<?php

include_once('header.php');

$sql = "SELECT L.LOAN_ID AS LOAN_ID, b.TITLE AS TITLE, c.FIRST_NAME || ' ' || c.LAST_NAME as NAME
FROM Books b, Clients c, Loans l
WHERE b.BOOK_ID = l.BOOK_ID AND c.CLIENT_ID = l.CLIENT_ID";

$loans = oci_parse($conn, $sql);

oci_execute($loans);

echo '
<div class="container">
    <div class="pull-left">
            <h2>Lista wypożyczeń</h2>
        </div>
        <div class="pull-right">
        <h2></h2>
            <button type="button" class="btn btn-primary pull-right">
                <a style="color:white;text-decoration:none;" href="index.php">Aby wypożyczyć przejdź do książek</a>
            </button>            
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
    echo '<td>' . $row['TITLE'] . '</td>';
    echo '<td>' . $row['NAME'] . '</td>';
    echo '<td>' . '<a href="deleteLoanSql.php?id=' . $row['LOAN_ID'] . '">Zwróć</>' . '</td>';
    echo '</tr>';
}

oci_free_statement($loans);

echo '</tbody></table>';

include_once('footer.php')
?>