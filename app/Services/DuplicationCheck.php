<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class DuplicationCheck
{
   public static function check(Model $model, array $data): bool
   {
      $result = $model::select('*')->where($data)->get();
      if (count($result) > 0)
         return true;
      return false;
   }
}
