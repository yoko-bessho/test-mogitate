<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
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


    public function search(Request $request)
    {
        $query = Product::with('seasons')
            ->keywordSearch($request->keyword);

        if ($request->has('reset_search')) {
            return redirect()->route('products.index');
        }

        if ($request->price === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->price === 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(6)->appends($request->all());

        // dd($request->all());
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
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


    public function update(ProductRequest $request, $productId)
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

        $product->seasons()->sync($request->input('season_id', []));

        $product->update($productData);

        return redirect()->route('products.index');
    }


    public function destroy($productId)
    {
        Product::find($productId)->delete();
        return redirect()->route('products.index');
    }




}

