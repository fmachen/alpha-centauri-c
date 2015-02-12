<?php

namespace View;

class AdminBasic {

    public static function displayHeader($title = 'undefined title') {
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="../assets/css/main.css">
    </head>
    <body>
<?php
    }

    public static function displayFooter() {
?>
    </body>
</html>
<?php
    }

}
