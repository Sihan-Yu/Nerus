<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index() {
        return view('products.index');
    }

}
