<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Biblioteka</title>
    </head>
    <body>
        <?php
        $fileName = $_SERVER["REQUEST_URI"];
        ?>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Biblioteka</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        <li <?php
                        if (stripos($fileName, 'authors.php') !== false) {
                            echo 'class="active"';
                        }
                        ?>
                            ><a href="authors.php">Autorzy</a>
                        </li>

                        <li <?php
                        if (stripos($fileName, 'index.php') !== false) {
                            echo 'class="active"';
                        }
                        ?>
                            ><a href="index.php">Książki</a>
                        </li>

                        <li <?php
                        if (stripos($fileName, 'clients.php') !== false) {
                            echo 'class="active"';
                        }
                        ?>
                            ><a href="clients.php">Czytelnicy</a>
                        </li>

                        <li <?php
                        if (stripos($fileName, 'loans.php') !== false) {
                            echo 'class="active"';
                        }
                        ?>
                            ><a href="loans.php">Wypożyczenia</a></li>

                    </ul>
                </div>
            </div>
        </nav>

        <?php
        include_once('phpDatabaseConnection.php');
        ?>