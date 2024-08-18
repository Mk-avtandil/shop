<?php

require_once "Database/DataBaseHandler.php";
require_once "Models/Category.php";
require_once "View.php";

class CategoryController
{
    public function category() : void
    {
        $db = new DataBaseHandler();
        $categories = Category::getAll($db);

        View::render('Category/category', [
            'categories' => $categories
        ]);
    }
}