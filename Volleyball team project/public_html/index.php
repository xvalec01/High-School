<?php
session_start();
require_once 'php/loader.php';
require_once 'php/func.php';
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Volejbalový klub</title>
        <meta name="description" content="Databáze volejbalového klubu.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> -->
        <!--    <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css"> -->
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">  
        <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
        <!--    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css"> -->

    <!--    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script> -->
        <script src="js/vendor/bootstrap.js"></script>
     <!--    <script src="js/vendor/bootstrap.min.js"></script> -->
        <script src="js/vendor/jquery-1.11.2.js"></script>
    <!--    <script src="js/vendor/npm.js"></script> -->
        <script src="js/main.js"></script> 
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" id="show" href="<?php makeURL($_GET, 'page', 'show'); ?>">Zobrazit</a>
                    <a class="navbar-brand" id="add" href="<?php makeURL($_GET, 'page', 'add'); ?>">Vložit</a>
                    <a class="navbar-brand" id="edit" href="<?php makeURL($_GET, 'page', 'edit'); ?>">Editovat</a>
                    <a class="navbar-brand" id="del" href="<?php makeURL($_GET, 'page', 'del'); ?>">Mazat</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" role="form">
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>
                </div>
            </div>
        </nav>
        <br>
        <br>   
        <?php
        $page = null;
        if (isset($_GET['page']))
            $page = $_GET['page'];
        switch ($page) {
            case "show": include 'php/show/show.php';
                break;
            case "del": include 'php/del/delete.php';
                break;
            case "edit": include 'php/edit/edit.php';
                break;
            case "add": include 'php/forms/form.php';
                break;
            default: include 'php/default.php';
                break;
        }
        ?>
        <div class="container">
            <footer>
                <p>&copy; Tomáš Ryšavý, David Valecký - SŠTE Brno - 2015</p>
            </footer>      
        </div>
    </body>
</html>
