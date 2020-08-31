<?php

namespace App\Actions\Products;

use App\Product;
use Illuminate\Http\UploadedFile;

class ProductActions
{
    public static function indexAndSearch(string $query): array
    {
        $product = Product::where('title', 'LIKE', '%' . $query . '%')
            ->orderBy('id', 'asc')
            ->get();
        return ['products' => $product, 'search' => $query];
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
    public static function storeImage(Product $product, ?UploadedFile $file): void
    {
        if ($file != null) {
            $name = $file->getClientOriginalName();
            $file->move('images/products', $name);
            $product->image = $name;
        } else {
            $product->image = 'defaultImage.png';
        }
        $product->save();
    }

    public static function update(Product $product, ?UploadedFile $file, array $newData): void
    {
        $savedImage = $product->image;
        if ($file != null) {
            $name = $file->getClientOriginalName();
            $file->move('images/products', $name);
            $product->update($newData);
            $product->image = $name;
        } else {
            $product->update($newData);
            $product->image = $savedImage;
        }
        $product->save();
    }
}
