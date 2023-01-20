<?php

namespace App\Utils;

class Mask
{
  public static function removeMoneyMask(string $maskedValue): float
  {
    $newValue = str_replace('R$ ', '', $maskedValue);
    $newValue = str_replace('.', '', $newValue);
    $newValue = str_replace(',', '.', $newValue);
    return floatval($newValue);
  }
}
