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
        if (isset($_COOKIE["user"])) {
            header('Location: index.php', true, 301);
            exit();
        }
        include_once('phpDatabaseConnection.php');
        $error = false;
        if (isset($_POST["login"]) && isset($_POST["password"])) {
            $sql = "SELECT 1 FROM USERS WHERE LOGIN = :userLogin AND PASSWORD = :userPassword";
            $user = oci_parse($conn, $sql);
            oci_bind_by_name($user, "userLogin", $_POST['login']);
            oci_bind_by_name($user, "userPassword", $_POST['password']);

            oci_execute($user);

            while ($row = oci_fetch_assoc($user)) {
                setcookie("user", $_POST["login"], time() + (86400 * 30), "/");
                oci_free_statement($user);
                header('Location: index.php', true, 301);
                exit();
            }

            $error = true;
        }
        ?>
        <div style="width: 40%; margin: 100px auto">
            <h1 class="display-4">Biblioteka</h1>
            <?php
            if ($error) {
                echo '<div class="alert alert-danger" role="alert">Niepoprawny login lub hasło</div>';
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <label>Login</label>
                    <input type="text" class="form-control" name="login">
                </div>
                <div class="form-group">
                    <label>Hasło</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Zaloguj</button>
            </form>
        </div>
    </body>
</html>

