<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;


class IndexService
{

    public function getProducts (Request $request) : array
    {

        $query = Product::query();

        if($request->filled('filter'))
        {
            // query products with chosen categories
            if($request->filled('filter.categories'))
            {
                $categories = array_map('intval', $request->filter['categories'] ?? []);
                $query->whereIn('category_id', $categories);
            }

            // query products with price higher or equal to
            if($request->filled(['filter.priceMin']))
            {
                $priceMin = floatval($request->filter['priceMin']);
                $query->where("price", ">=", $priceMin);
            }

            // query products with price lower or equal to
            if($request->filled(['filter.priceMax']))
            {
                $priceMax = floatval($request->filter['priceMax']);
                $query->where("price", "<=", $priceMax);
            }

        }

        $sortOptions = [
            'name' => ['name', 'asc'],
            'category' => ['category_id', 'asc'],
            'price_asc' => ['price', 'asc'],
            'price_desc' => ['price', 'desc'],
            'amount_asc' => ['amount', 'asc'],
            'amount_desc' => ['amount', 'desc'],
        ];

        $orderBy = $request->filled('orderBy') ? $request->orderBy : 'name';

        $sort = $sortOptions[$orderBy] ?? ['name', 'asc'];
        $query->orderBy($sort[0], $sort[1]);


        // Handle pagination - Default to 10 if paginate is not provided
        $perPage = $request->filled('paginate') ? intval($request->paginate) : 10;
        $page = $request->filled('page') ? $request->page : 1;


        $products = $query->paginate($perPage, ['*'], 'page', $page);

        return $products->toArray();

    }

}

?>
