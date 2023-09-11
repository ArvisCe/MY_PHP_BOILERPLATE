    <?php ob_start(); ?>
    <?php include 'database.php'?>
    <?php  include 'functions.php' ?>
    <?php
        $env = parse_ini_file('.env');
        foreach ($env as $key => $value) {
            putenv("$key=$value");
        }
    ?>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    