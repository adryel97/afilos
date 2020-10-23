<?php 

namespace App\Controller;

use Cocur\Slugify\Slugify;

class ConfigFormatos
{
    static function formataMoeda(string $str): String
    {
        $str = str_replace('.', '', $str);
        $str = str_replace(',', '.', $str);

        return $str;
    }

    static function formataMoedaRetorno($str): String
    {
        $str = number_format($str, 2, ",", ".");
        return $str;
    }

    static function slugi($str)
    {
        $slugify = new Slugify();
        $slugify->slugify($str);

        return $str;
    }
}
