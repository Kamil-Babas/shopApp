<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminCreateProductRequest;
use App\Http\Requests\AdminUpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class ProductController extends Controller
{

    public ProductService $productService;


    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index() : View
    {
        $products = Product::orderBy('id', "DESC")->paginate(10);

        return view("products.index", compact("products"));
    }


    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create() : view
    {
        return view('products.create');
    }


    /**
     * @param adminCreateProductRequest $request
     * @return RedirectResponse
     */
    public function store(AdminCreateProductRequest $request): RedirectResponse
    {
        try
        {
            $data = $request->validated();
            $product = $this->productService->createProduct($data);

            return redirect('/products')->with('status', "Product {$product->id} created successfully");
        }

        catch (\Exception $e) {
            // Catch any exceptions and return an error message
            return redirect('/products')->with('error', "Failed to create product: " . $e->getMessage());
        }

    }


    /**
     * Display the specified resource.
     * @param Product $product
     * @return View
     */
    public function show(Product $product) : View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Product $product
     * @return View
     */
    public function edit(Product $product) : View
    {
        return view('products.edit', compact('product'));
    }



    /**
     * Update the specified product
     *
     * @param AdminUpdateProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(AdminUpdateProductRequest $request, Product $product): RedirectResponse
    {
        try
        {
            $data = $request->validated();
            $product = $this->productService->updateProduct($product, $data);

            return redirect('/products')->with('status', "Product {$product->id} updated successfully");
        }

        catch (\Exception $e)
        {
            return redirect('/products')->with('error', "Failed to update product: " . $e->getMessage());
        }

    }


    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product) : JsonResponse
    {
        $productId = $product->id;

        // delete image from storage
        if(!is_null($product->image_path)) {
            Storage::delete($product->image_path);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'product deleted successfully',
            'deletedResourceId' => $productId
        ], 200);

    }
}
