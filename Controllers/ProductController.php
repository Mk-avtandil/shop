<?php

require_once "Database/DataBaseHandler.php";
require_once "Models/Product.php";
require_once "View.php";

class ProductController
{
    public function product() : void
    {
        $db = new DataBaseHandler();
        $products = Product::getAllProducts($db);

        View::render('Product/product', [
            'products' => $products
        ]);
    }
}