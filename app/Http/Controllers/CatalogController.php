<?php

namespace App\Http\Controllers;

use App\Category;
use App\Manufacturer;
use App\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request, Category $category, Product $productModel)
    {
        $minPrice = $maxPrice = $selectedManufacturersIds = null;
        $manufacturers = Manufacturer::all();
        if ($request->has('minPrice') || $request->has('maxPrice')) {
            $minPrice = $request->minPrice;
            $maxPrice = $request->maxPrice;
        }
        if ($request->has('manufacturers')) {
            $selectedManufacturersIds = $request->manufacturers;
        }
        $products = $productModel->getSelectedProducts($category->id, 6, $minPrice, $maxPrice, $selectedManufacturersIds);
        $data = [
            'id' => $category->id,
            'products' => $products,
            'manufacturers' => $manufacturers,
            'selectedManufacturersIds' => $selectedManufacturersIds,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
        ];
        return view('catalog.index', $data);
    }
}
