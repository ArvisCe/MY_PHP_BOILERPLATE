<?php include 'header.php'?>
<br>
<div class="content"> 
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $uri = $_SERVER['REQUEST_URI'];
    route($uri);

    function route($uri) {
        $uri = explode('/',$uri);
        $path = "";
        for($var = 2; $var < count($uri)-1; $var++){
            $path = "$path$uri[$var]/";
        }
        reroute($path, end($uri));
    }

    function reroute($path, $uri) {
        $full_path = join(['routes/',$path,$uri]); 
        if(substr($full_path,-1) == "/") {
            $full_path = substr($full_path, 0, -1);
        }
        $full_path = join([$full_path,'.php']);
        if(!file_exists($full_path)) {
            include '404.php';
        }
        else {
            include $full_path;
        }
    }
    ?>
</div>
<br>
<?php include 'footer.php' ?>
