<?php

namespace App\Http\Controllers;

use App\Enums\ProductSortParams;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\IndexService;


class IndexController extends Controller
{

    private IndexService $indexService;

    public function __construct(IndexService $indexService)
    {
        $this->indexService = $indexService;
    }


    /**
     * @param Request $request
     * @return JsonResponse|View
     */
    public function index (Request $request) : JsonResponse | View
    {
        if($request->expectsJson())
        {
            return response()->json([
                'status' => 'success',
                'products' => $this->indexService->getProducts($request)
            ], 200);
        }
        else
        {
            $products = Product::orderBy('id', 'desc')->paginate(10);
            $categories = ProductCategory::orderBy('name', 'ASC')->get();
            $sortingCategories = ProductSortParams::PARAMS;

            return view("index", [
                'products' => $products,
                'categories' => $categories,
                'defaultImage' => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/495px-No-Image-Placeholder.svg.png?20200912122019",
                'sortingCategories' => $sortingCategories
            ]);
        }

    }

}
