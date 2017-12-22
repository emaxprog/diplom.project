<?php

namespace App\Repositories\Frontend;

use PDO;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Afisha extends \App\Models\Afisha
{
    public static function getAfishaForHomePage()
    {
        return self::find(1);
    }

    public static function getAfishaForTestimonials()
    {
        return isset(self::find(2)->images[0]) ? self::find(2)->images[0] : null;
    }

    public static function getAfishaForAuthPage()
    {
        return isset(self::find(6)->images[0]) ? self::find(6)->images[0] : null;
    }

    public static function getAfishaForCatalogPage()
    {
        return isset(self::find(3)->images[0]) ? self::find(3)->images[0] : null;
    }

    public static function getAfishaForProductPage()
    {
        return isset(self::find(4)->images[0]) ? self::find(4)->images[0] : null;
    }

    public static function getAfishaForCartPage()
    {
        return isset(self::find(5)->images[0]) ? self::find(5)->images[0] : null;
    }

    public static function getAfishaForSidebar()
    {
        return isset(self::find(7)->images[0]) ? self::find(7)->images[0] : null;
    }
}
