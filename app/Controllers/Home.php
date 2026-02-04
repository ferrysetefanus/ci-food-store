<?php

namespace App\Controllers;
use App\Models\Category\Category;

class Home extends BaseController
{
    public function index(): string
    {
        $categories = new Category;

        $allCategories = $categories->findAll();
        return view('home', compact('allCategories'));
    }
}
