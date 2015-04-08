<?php

    if(isset($_GET['page']))
        $page = $_GET['page'];
    if(!isset($page) || $page == "head" || $page == "foot" || $page == "menu" || empty($page))
        $page = "home";
    $file = "views/".$page.".php";
    if(file_exists($file))
        include($file);
    else
        include("views/error404.php");





