<?php 

namespace App\Controller;


use Cocur\Slugify\Slugify;
use DateTime;

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

    static function dataFormato($str)
    {
        return date("d/m/Y", strtotime($str));
    }

    static function horaFormato($str)
    {
        return date("H:i", strtotime($str));
    }
}
