<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->has('sort')) {
            if ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            }
        }
        $products = $query->paginate(6);
        return view('products', compact('products'));
    }


    public function register()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function store(ProductRequest $request)
    {
        $fillPath = $request->file('image')->store('images', 'public');
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $fillPath,
            'description' => $request->description
        ]);
        $product->seasons()->sync($request->input('seasons', []));

        return redirect('/products');
    }

    public function search(Request $request)
    {
        $products = Product::query()->NameSearch($request->name)->paginate(6);

        return view('products', compact('products'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $seasons = Season::all();
        $productSeasons = $product->seasons->pluck('id')->toArray();
        return view('update', compact('product', 'seasons', 'productSeasons'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->only(['name', 'price', 'description']));
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('image', 'public');
            $product->image = $filePath;
        }
        $product->save();
        $product->seasons()->sync($request->input('season', []));
        return redirect('/products');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect('/products');
    }
}
