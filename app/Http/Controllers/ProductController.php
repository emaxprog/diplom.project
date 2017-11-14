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
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->authorize('create',Product::class);
//        if(Gate::denies('create')){
//            abort(403,'Недостаточно прав');
//        }
        $subcategories = Category::getCategories();
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
        $this->validate($request, Product::rules());

        $product = new Product($request->all());
        if ($request->hasFile('image_preview')) {
            $product->saveImagePreview($request->file('image_preview'));
        }
        $product->save();

        $attrValue = isset($request->parameters) ? array_combine($request->parameters, $request->values) : null;
        if (empty($attrValue)) {
            if ($request->has('edit')) {
                return redirect()->route('product.edit', [$product]);
            }
            return redirect()->route('product.index', ['message' => 'Товар сохранен!']);
        }
        $product->savePAV($attrValue);

        if ($request->has('edit')) {
            return redirect()->route('product.edit', [$product]);
        }

        return redirect()->route('product.index', ['message' => 'Товар сохранен!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $images = $product->images;
        $params = $product->getParams($product->id);
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
    public function edit(Product $product)
    {
        $manufacturers = Manufacturer::all();
        $subcategories = Category::getCategories();
        $params = Product::getParams($product->id);
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
    public function update(Request $request, Product $product, ProductAttributeValue $pavModel)
    {
        $this->validate($request, Product::rules($product->id));

        if ($request->hasFile('image_preview')) {
            $product->saveImagePreview($request->file('image_preview'));
        }
        $product->update($request->all());
        $attrValue = isset($request->parameters) ? array_combine($request->parameters, $request->values) : null;
        $pavModel->deleteAttributes($product->id);
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
    public function destroy(Product $product)
    {
        $product->delete();
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

    public function uploadImages(Request $request, Product $product)
    {
        if ($request->hasFile('images')) {
            $product->saveImages($request->file('images'));
        }

        return response()->json();
    }


    public function uploadAmount($id)
    {
        return Product::find($id)->amount;
    }

    public function search(Request $request, Product $product)
    {
        $products = $product->getProductsSearch($request->val);
        $data = [
            'products' => $products
        ];
        return view('product.upload', $data);
    }
}
