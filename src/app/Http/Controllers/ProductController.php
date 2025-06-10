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


    public function create()
    {
        return view('products/create');
    }


    public function store(ProductRequest $request)
    {
        $imagePath = $request->file('image')->store('fruits-img', 'public');
        $imagePath = str_replace('public/', '', $imagePath);

        $productData = $request->only(['name', 'price', 'description']);
        $productData['image'] = $imagePath;


        $product = Product::create($productData);

        $seasons = $request->input('seasons', []);
        $product->seasons()->sync($seasons);

        return redirect()->route('products.index');
    }


    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        $seasons = Season::all();
        $productSeasonIds = $product->seasons->pluck('id')->toArray();

        return view('products.edit', compact('product', 'seasons', 'productSeasonIds'));

    }


    public function update(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $productData = $request->only(['name', 'price', 'description']);

        if ($request->hasfile('image')) {
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
            $productData['image'] = $request->file('image')->store('fruits-img', 'public');
        } else {
            $productData['image'] = $request->input('current_image');
        }

        $product->update($productData);

        $product->seasons()->sync($request->input('season_id', []));

        return redirect()->route('products.index');
    }

    public function destroy($productId)
    {
        Product::find($productId)->delete();
        return redirect()->route('products.index');
    }

}

