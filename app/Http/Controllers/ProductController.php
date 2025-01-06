<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'specifications' => 'nullable|array'
        ]);

        $product = $this->productService->createProduct($validatedData);
        return redirect()->route('products.show', $product->id)->with('success', 'Ürün başarıyla oluşturuldu.');
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'specifications' => 'nullable|array'
        ]);

        $this->productService->updateProduct($id, $validatedData);
        return redirect()->route('products.show', $id)->with('success', 'Ürün başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index')->with('success', 'Ürün başarıyla silindi.');
    }
} 