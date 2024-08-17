<?php

require_once "Routes/web.php";


$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

route($url, $method);

