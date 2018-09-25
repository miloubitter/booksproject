<?php

namespace App\Controllers\Api;


use App\Controllers\BaseController;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function getCategories() {
        $categoryModel = new Category();
        $categories = $categoryModel->categories();
        $this->renderJson(200, $categories);
    }
}