<?php

namespace App\Http\Controllers;

use App\Country;
use App\Image;
use App\Product;
use App\ProductAttribute;
use App\ProductAttributeValue;
use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        $products = Product::paginate(15);
        $data = [
            'products' => $products
        ];
        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Category::getSubcategoriesAll();
        $manufacturers = Manufacturer::all();
        $productAttributes = ProductAttribute::all();
        $countries = Country::all();
        $data = [
            'subcategories' => $subcategories,
            'manufacturers' => $manufacturers,
            'productAttributes' => $productAttributes,
            'countries' => $countries
        ];
        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Product::$rules);

        $product = new Product($request->all());
        if ($request->hasFile('image_preview')) {
            $product->saveImagePreview($request->file('image_preview'));
        }
        $product->save();

        $attrValue = isset($request->parameters) ? array_combine($request->parameters, $request->values) : null;
        if (empty($attrValue)) {
            if ($request->has('edit')) {
                return redirect()->route('product.edit', ['id' => $product->id]);
            }
            return redirect()->route('product.index', ['message' => 'Товар сохранен!']);
        }
        $product->savePAV($attrValue);

        if ($request->has('edit')) {
            return redirect()->route('product.edit', ['id' => $product->id]);
        }

        return redirect()->route('product.index', ['message' => 'Товар сохранен!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $images = $product->images;
        $params = $this->product->getParams($id);
        $data = [
            'product' => $product,
            'params' => $params,
            'images' => $images
        ];
        return view('product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $manufacturers = Manufacturer::all();
        $subcategories = Category::getSubcategoriesAll();
        $params = Product::getParams($id);
        $productAttributes = ProductAttribute::all();
        $countries = Country::all();
        $imagePreviewInitialPreviewData = $product->getImagePreviewInitialPreviewData();
        $imagesInitialPreviewData = $product->getImagesInitialPreviewData();
        $data = [
            'product' => $product,
            'manufacturers' => $manufacturers,
            'subcategories' => $subcategories,
            'params' => $params,
            'productAttributes' => $productAttributes,
            'countries' => $countries,
            'imagePreviewInitialPreviewData' => $imagePreviewInitialPreviewData,
            'imagesInitialPreviewData' => $imagesInitialPreviewData,
        ];
        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ProductAttributeValue $pavModel)
    {
        $this->validate($request, Product::$rules);

        $product = Product::find($id);
        if ($request->hasFile('image_preview')) {
            $product->saveImagePreview($request->file('image_preview'));
        }
        $product->update($request->all());
        $attrValue = isset($request->parameters) ? array_combine($request->parameters, $request->values) : null;
        $pavModel->deleteAttributes($id);
        if ($attrValue == null)
            return redirect()->route('product.index', ['message' => 'Товар сохранен!']);
        $product->savePAV($attrValue);
        return redirect()->route('product.index', ['message' => 'Товар сохранен!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json();
    }

    public function destroyImage(Request $request)
    {
        if ($request->has('key')) {
            Image::destroy($request->key);
            return response()->json();
        }
        return response()->json(['error' => 'Отсутствует ID изображения']);
    }

    public function uploadImages(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('images')) {
            $product->saveImages($request->file('images'));
        }

        return response()->json();
    }


    public function uploadAmount($id)
    {
        return Product::find($id)->amount;
    }

    public function search(Request $request)
    {
        $products = $this->product->getProductsSearch($request->val);
        $data = [
            'products' => $products
        ];
        return view('product.upload', $data);
    }
}
