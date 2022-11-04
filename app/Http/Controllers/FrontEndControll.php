<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\product;

class FrontEndControll extends Controller
{
    public function index(){

    
        $categories = Category::all();
        $recentProducts = Product::orderBy('created_at', 'desc')->take(8)->get();
        return view('welcome',[
        'categories' => $categories,
        'recentProducts' => $recentProducts
        ]);
    }
}
