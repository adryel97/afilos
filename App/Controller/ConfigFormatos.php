<?php 

namespace App\Controller;

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
}
