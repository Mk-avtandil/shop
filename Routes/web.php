<?php


require_once "Controllers/HomeCotroller.php";
require_once "Vendor/Router.php";


Router::get("/", [HomeController::class, 'main']);
Router::get("/basket", [HomeController::class, 'basket']);

function route($url, $method): void
{
    Router::dispatch($url, $method);
}
