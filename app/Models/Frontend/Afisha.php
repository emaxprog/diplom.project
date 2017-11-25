<?php

namespace App\Models\Frontend;

use PDO;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class Afisha extends \App\Models\Afisha
{
    public static function getAfishaForHomePage()
    {
        return self::find(1);
    }
}
