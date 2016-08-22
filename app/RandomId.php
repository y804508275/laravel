<?php
/**
 * Created by PhpStorm.
 * User: furui
 * Date: 16/7/11
 * Time: 上午8:01
 */

namespace App;


class RandomId {

    static function create($length)
    {
        $str = null;
        $strPol = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $max = strlen($strPol) - 1;
        for ($i=0;$i<$length;$i++)
        {
            $str.=$strPol[rand(0,$max)];
        }
        return $str;
    }
}