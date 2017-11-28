<?php

namespace App\Http\Controllers\Frontend;


use App\Repositories\Frontend\Product;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CatalogController extends Controller
{
    public function index(Request $request, Category $category, Product $productModel)
    {
        $firstPrice = $lastPrice = $selectedManufacturersIds = $sortBy = null;
        $showBy = 6;
        $manufacturers = Manufacturer::all();
        if ($request->has('first_price') || $request->has('last_price')) {
            $firstPrice = trim($request->first_price);
            $lastPrice = trim($request->last_price);
        }
        if ($request->has('manufacturers')) {
            $selectedManufacturersIds = $request->manufacturers;
        }
        if ($request->has('show_by')) {
            $showBy = $request->show_by;
        }
        if ($request->has('sort_by')) {
            $sortBy = $request->sort_by;
        }
        $products = $productModel->getSelectedProducts($category->id, $showBy, $sortBy, $firstPrice, $lastPrice, $selectedManufacturersIds);
        $popularProducts = $productModel->getPopularProducts();
        $data = [
            'category' => $category,
            'products' => $products,
            'manufacturers' => $manufacturers,
            'selectedManufacturersIds' => $selectedManufacturersIds,
            'firstPrice' => $firstPrice,
            'lastPrice' => $lastPrice,
            'popularProducts' => $popularProducts
        ];
        return view('catalog.index', $data);
    }
}
