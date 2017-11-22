<?php

namespace App\Models\Frontend;

use PDO;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class Product extends \App\Models\Product
{
    public function getSelectedProducts($id, $num, $sort, &$minPrice, &$maxPrice, $manufacturersIds)
    {
        if ($minPrice == null && $maxPrice == null) {
            $minPrice = 0;
            $maxPrice = 499999;
        }
        if ($manufacturersIds == null)
            return $selectedProducts = $this->rangePrice($minPrice, $maxPrice)
                ->byCategory($id)
                ->paginate($num);
        return $selectedProducts = $this->byCategory($id)
            ->manufacturers($manufacturersIds)
            ->rangePrice($minPrice, $maxPrice)
            ->paginate($num);
    }

    public function getLatestProducts()
    {
        return $this->latest('id')->available()->published()->take(16)->get();

    }

    public function getRecommendedProducts()
    {
        return $this->latest('id')->recommended()->available()->published()->take(3)->get();
    }

    public function getPopularProducts()
    {
        return $this->latest('id')->popular()->available()->published()->take(16)->get();
    }

    public function getRecommendedProductsGroupByCategory()
    {
        $result = [];
        $categories = Category::with('products')->get();

        foreach ($categories as $category) {
            $result[$category->id] = $category;
            $result[$category->id]->products = $category->products()->latest('id')->recommended()->available()->published()->take(16)->get();
        }

        return $result;
    }

    public function paginateProducts($num)
    {
        return $this->paginate($num);
    }

    public function paginateProductsOfCategory($id, $num)
    {
        return $this->preview()->category($id)->available()->paginate($num);
    }

    public function getUploadProducts($startFrom = 0)
    {
        return $this->latest('id')->skip($startFrom)->take(5)->get();
    }

    public function getProductsSearch($val)
    {
        return $this->searchCode($val)->get();
    }

    public static function getParams($id)
    {
        $db = DB::connection()->getPdo();
        $result = $db->prepare("CALL get_params(:id)");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $params = self::getArrayObjects($result);
        return $params;
    }

    private static function getArrayObjects($result)
    {
        $params = [];
        while ($row = $result->fetchObject()) {
            $params[] = $row;
        }
        return $params;
    }
}
