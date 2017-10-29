<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{

    protected $table = 'categories';

    protected $guarded = [];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function getCategories()
    {
        $categories = Category::main()->published()->get();
        foreach ($categories as $category) {
            if (!empty($subcategories = $category->subcategories($category->id)->get())) {
                $category->subcategories = $subcategories;
            }
        }
        return $categories;
    }

    public static function getParentCategory($parentId)
    {
        if (!$parentId)
            return 'Главная категория';
        $db = DB::connection()->getPdo();
        $sql = "SELECT name FROM categories WHERE id=:parent_id";
        $result = $db->prepare($sql);
        $result->bindParam(':parent_id', $parentId, \PDO::PARAM_INT);
        $result->execute();
        return $result->fetchColumn();
    }

    public function getParents()
    {
        return $this->parents()->get();
    }

    public static function getVisivilityText($val)
    {
        if ($val)
            return 'Отображается';
        return 'Не отображается';
    }

    public function scopeSubcategories($query, $parentId = 0)
    {
        return $query->where('parent_id', $parentId)->published();
    }

    public function scopeParents($query)
    {
        $query->where('parent_id', 0);
    }

    public function scopePublished($query)
    {
        $query->where('visibility', 1);
    }

    public function scopeMain($query)
    {
        $query->where('parent_id', 0);
    }

}
