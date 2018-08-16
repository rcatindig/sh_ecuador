<?php

namespace App\Helpers;


/**
 *
 */
class Common
{

  public static function voucher_code_string () {
    $chars = "0123456789ABCDEFGHJKLMNPQRSTUVWXYZ";
    $res = "";
    for ($i = 0; $i < 8; $i++) {
        $res .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    return $res;
  }
}
