<?php

    include("init.php");

    $prefix = "";
    if(isset($_GET['page']))
        $pg = $_GET['page'];
    if(!isset($pg) || $pg == "head" || $pg == "foot" || empty($pg))
        $pg = "home";
    if(isset($_GET['prefix']))
        $prefix = $_GET['prefix'];

    $file = "views/".$prefix."/".$pg.".php";
    if(file_exists($file)) {
        include($file);
    } else
        include("views/errors/error404.php");






