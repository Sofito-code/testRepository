<?php

namespace App\Actions\Products;

use App\Product;
use Illuminate\Http\Request;

class ProductActions
{
    public static function indexAndSearch(Request $request): array
    {
        if ($request) {
            $query = trim($request->get('search'));
            $product = Product::where('title', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'asc')
                ->get();
            return ['products' => $product, 'search' => $query];
        } else {
            return ['products' => Product::latest()->paginate()];
        }
    }
    public static function deleteImage(Product $product): void
    {
        if ($product->image != 'defaultImage.png') {
            unlink('images/products/' . $product->image);
        }
    }
    public static function changeState(Product $product): string
    {
        if ($product->enabled == true) {
            $product->enabled = false;
            $product->save();
            return 'product.blackList';
        } else {
            $product->enabled = true;
            $product->save();
            return 'product.whiteList';
        }
    }
    public static function store(Request $request): void
    {
        $product = Product::create($request->validated());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('images/products', $name);
            $product->image = $name;
        } else {
            $product->image = 'defaultImage.png';
        }
        $product->save();
    }

    public static function update(Product $product, Request $request): void
    {
        $savedImage = $product->image;
        if ($request->hasFile('image')) {
            ProductActions::deleteImage($product);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('images/products', $name);
            $product->update($request->validated());
            $product->image = $name;
        } else {
            $product->update($request->validated());
            $product->image = $savedImage;
        }
        $product->save();
    }
}
