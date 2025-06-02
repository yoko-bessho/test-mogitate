<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Models\ProductSeason;


class ProductController extends Controller
{
    public function index()
    {
        {
            $products = Product::with('seasons')->paginate(6);
            $seasons = Season::all();

            return view('products/index', compact('products', 'seasons'));
        }
    }

    public function create()
    {
        return view('products/create');
    }

    public function edit($id)
    {
        // dd($id);
        $product = Product::find($id);
        $seasons = Season::all();
        $productSeason = $product->seasons;
        return view('products.edit', compact('product', 'seasons', 'productSeason'));
    }
}
