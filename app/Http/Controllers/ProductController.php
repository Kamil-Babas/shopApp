<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminCreateProductRequest;
use App\Http\Requests\AdminUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index() : View
    {
        $products = Product::paginate(10);

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
     * Store a newly created resource in storage.
     * @param AdminCreateProductRequest $request
     * @return RedirectResponse
     */
    public function store(AdminCreateProductRequest $request) : RedirectResponse
    {
        $product = new Product($request->validated());

        if($request->hasFile('product_image')){
            //store method returns path to file
            $product->image_path = $request->file('product_image')->store('products');
        }

        $product->save();

        return redirect('/products')->with('status', "Product created successfully");
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
     * Update the specified resource in storage.
     * @param AdminUpdateProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(AdminUpdateProductRequest $request, Product $product) : RedirectResponse
    {
        try
        {
            $oldImage = $product->image_path;
            $product->fill($request->validated());

            if ($request->hasFile('product_image'))
            {
                // update image path and store new image
                $product->image_path = $request->file('product_image')->store('products');

                // delete old image
                if ($oldImage) {
                    Storage::delete($oldImage);
                }
            }

            $product->save();

            return redirect('/products')->with('status', "Product {$product->id} edited successfully");
        }
        catch (\Exception $e)
        {
            return redirect('/products')->with('error', "Failed to edit product: " . $e->getMessage());
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
