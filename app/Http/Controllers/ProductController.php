<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;
use App\Product;
use App\Actions\Products\ProductActions;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(Request $request): View
    {
        $result = ProductActions::indexAndSearch($request);
        return view('product.index', $result);
    }

    public function show(Product $product): View
    {
        return view('product.show', ['product' => $product]);
    }

    public function create(): View
    {
        return view('product.create', ['product' => new Product]);
    }

    public function store(SaveProductRequest $request): RedirectResponse
    {
        ProductActions::store($request);
        return redirect()->route('product.index')->with('status', 'El producto fue creado satisfactoriamente');
    }

    public function edit(Product $product): View
    {
        return view('product.edit', ['product' => $product]);
    }

    public function update(Product $product, SaveProductRequest $request): RedirectResponse
    {
        ProductActions::update($product, $request);
        return redirect()->route('product.show', $product)->with('status', 'El producto fue actualizado satisfactoriamente');
    }

    public function destroy(Product $product): RedirectResponse
    {
        ProductActions::deleteImage($product);
        $product->delete();
        return redirect()->route('product.index')->with('status', 'El producto fue eliminado satisfactoriamente');
    }
    public function confirmDestroy(Product $product): View
    {
        return view('product.confirmDestroy', ['product' => $product]);
    }
    /*listado de productos */
    public function productList(): View
    {
        $products = Product::orderBy('id', 'Desc')->paginate(5);
        return view('product.whiteList', compact('products'));
    }
    /*lista de productos deshabilitados */
    public function disable(): View
    {
        $products = Product::orderBy('id', 'Desc')->paginate(5);
        return view('product.blackList', compact('products'))
            ->with('status_success', 'Producto cambiado correctamente');
    }
    /*vista de confirmacion*/
    public function changeState(int $id): View
    {
        return view('product.confirmChangeStatus', ['product' => Product::findOrFail($id)]);
    }
    public function updateState(int $id): RedirectResponse
    {
        $route = ProductActions::changeState(Product::findOrFail($id));
        return redirect()->route($route);
    }
}
