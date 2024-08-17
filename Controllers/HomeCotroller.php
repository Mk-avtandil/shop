<?php

require_once "View.php";
require_once "Models/Product.php";
require_once "DataBaseHandler.php";

class HomeController
{
    public function main() : void
    {
        $db = new DataBaseHandler();
        $products = Product::getAllProducts($db);

        View::render('index', [
            'products' => $products
        ]);
    }

    public function basket() : void
    {
        View::render('basket');
    }
}