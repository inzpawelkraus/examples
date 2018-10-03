<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl"  class="page">
    <head>
        <title>Zaprzestanie odstrzału żubrów w puszczy Białowieskiej - Petycje</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="PKDEVELOP"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700&amp;subset=latin-ext" rel="stylesheet"/> 
        <link href="https://fonts.googleapis.com/css?family=Anton&amp;subset=latin-ext" rel="stylesheet"/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/templates/default/css/font-awesome.css"/>
        <link rel="stylesheet" href="/templates/default/css/owl.carousel.min.css"/>
        <link rel="stylesheet" href="/templates/default/css/owl.theme.default.min.css"/>
        <link rel="stylesheet" type="text/css" media="screen,projection" href="/templates/default/css/pl-mapa-500px.css"/>
        <link rel="stylesheet" type="text/css" href="/templates/default/css/main.css" />
        <link rel="shortcut icon" href="/templates/default/img/send-button-bg.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/templates/default/js/jquery.min.js"></script>
        <script src="/templates/default/js/owl.carousel.js"></script>
        <script type="text/javascript" src="/templates/default/js/main.js"></script>
    </head>
    <body>
        <?php

        function dump($varible, $name = null) {
            if ((boolean) $name) {
                $name = '<b>' . $name . '</b> = ';
            }
            echo '<pre style="color: #494949; border: 1px dashed red">' . $name . print_r($varible, true) . '</pre>';
        }

        $email = base64_decode($_GET['email']);

        $email = substr($email, strpos($email, "=") + 1);


        $servername = "localhost";
        $username = "pkraus_petycje";
        $password = "Pilchow183";
        $dbname = "pkraus_petycje";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("SET CHARSET utf8");
        $conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE `comments` SET `verified` = '1' WHERE `email` = '" . $email . "'";
        $result = $conn->query($sql);

        if ($result > 0) {
            echo '<div class="confirmDialogBox">
    <div class="head">
        Potwierdzenie aktywacji email
    </div>
    <div class="body">
        Dziękujemy za Twoje potwierdzenie swojego adresu email!.<br>
        Teraz twój głos jest w pełni ważny.<br>
        Dziękujemy !
        <a class="close" href="http://www.petycje.hekko24.pl">OK</a>
    </div>
    <div class="icon"></div>
</div>';
        } else {
            echo "nie git";
        }
        $conn->close();
        ?>
    </body>
</html>