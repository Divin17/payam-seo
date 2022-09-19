<?php

namespace App\Services;

class StringifyDataService
{
   public static function stringifyData($array_keys = [], $data)
   {
      foreach ($array_keys as $key) {
         if (array_key_exists($key, $data))
            $data[$key] = \json_encode($data[$key]);
      }
      return $data;
   }
}
