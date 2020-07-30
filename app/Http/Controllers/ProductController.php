<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        return view('product.index', ['products' => Product::latest()->paginate()]);
    }

    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }

    public function create()
    {
        return view('product.create', ['product' => new Product]);
    }

    public function store(SaveProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('images/products', $name);
        }
        $product = Product::create($request->validated());
        $product->image = $name;
        $product->save();
        return redirect()->route('product.index')->with('status', 'El producto fue creado satisfactoriamente');
    }

    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }

    public function update(Product $product, SaveProductRequest $request)
    {
        unlink('images/products/' . $product->image);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('images/products', $name);
        }
        $product->update($request->validated());
        $product->image = $name;
        $product->save();
        return redirect()->route('product.show', $product)->with('status', 'El producto fue actualizado satisfactoriamente');
    }

    public function destroy(Product $product)
    {
        unlink('images/products/' . $product->image);
        $product->delete();
        return redirect()->route('product.index')->with('status', 'El producto fue eliminado satisfactoriamente');
    }
    public function confirmDestroy(Product $product)
    {
        return view('product.confirmDestroy', ['product' => $product]);
    }
    /*listado de productos */
    public function productList()
    {
        $products = Product::orderBy('id', 'Desc')->paginate(5);
        return view('product.whiteList', compact('products'));
    }
    /*lista de productos deshabilitados */
    public function disable()
    {
        $products = Product::orderBy('id', 'Desc')->paginate(5);
        return view('product.blackList', compact('products'))
            ->with('status_success', 'Producto cambiado correctamente');
    } /*vista de cnfirmacion*/
    public function changeState(int $id)
    {
        $product = Product::findOrFail($id);
        return view('product.confirmChangeStatus', ['product' => $product]);
    }
    /*actualizar la DB */
    public function updateState(int $id)
    {
        $product = Product::findOrFail($id);
        if ($product->enabled == true) {
            $product->enabled = false;
            $product->save();
            return redirect()->route('product.blackList');
        } else {
            $product->enabled = true;
            $product->save();
            return redirect()->route('product.whiteList');
        }
    }
}
