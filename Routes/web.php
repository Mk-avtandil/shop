<?php

require_once "Controllers/ProductController.php";
require_once "Controllers/CategoryController.php";
require_once "Vendor/Router.php";

Router::get("/", [ProductController::class, 'product']);
Router::get("/category", [CategoryController::class, 'category']);

function route($url, $method): void
{
    Router::dispatch($url, $method);
}
