<?php

    $cname = $_GET['c'] ?? 'index';

    $path = "mvc/controllers/$cname.php";

    require_once($path);
?>
