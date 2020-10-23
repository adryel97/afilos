<?php 

namespace App\Controller;


use Cocur\Slugify\Slugify;


class ConfigFormatos
{
    /**
     * @param string $str
     * @return string
     */
    static function formataMoeda(string $str): String
    {
        $str = str_replace('.', '', $str);
        $str = str_replace(',', '.', $str);

        return $str;
    }

    /**
     * @param string $str
     * @return string
     */
    static function formataMoedaRetorno($str): String
    {
        $str = number_format($str, 2, ",", ".");
        return $str;
    }

    /**
     * @param mixed $str
     * @return mixed
     */
    static function slugi($str)
    {
        $slugify = new Slugify();
        $slugify->slugify($str);

        return $str;
    }
}
