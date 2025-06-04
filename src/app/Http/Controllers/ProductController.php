<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Models\ProductSeason;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('seasons')->paginate(6);
        $seasons = Season::all();

        return view('products/index', compact('products', 'seasons'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $seasons = Season::all();
        $productSeasonIds = $product->seasons->pluck('id')->toArray();

        return view('products.edit', compact('product', 'seasons', 'productSeasonIds'));

    }


    public function create()
    {
        return view('products/create');
    }


    public function store(ProductRequest $request)
    {
        $productData = $request->only(['name', 'price', 'description', 'image']);
        $productData['image'] = $request->file('image')->store('fruits-img', 'public');
        $product = Product::create($productData);
        $seasons = $request->input('seasons', []);
        $product->seasons()->sync($seasons);

        return redirect()->route('products.index');
    }


    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $seasons = Season::all();
        $productSeasonIds = $product->seasons->pluck('id')->toArray();
        // dd($product);
        return view('products.edit', compact('product', 'seasons', 'productSeasonIds'));
    }
}
