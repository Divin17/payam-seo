<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class UploadService
{
    public static function upload(object $request, string $save_to = "", string $image_name = "image")
    {
        if (!empty($request->file($image_name))) {
            $file_name = Str::random(30) . "." . $request->file($image_name)->getClientOriginalExtension();
            $request->{$image_name}->move(\public_path($save_to), $file_name);
            $data = array_merge($request->validated(), [$image_name => $save_to . "/" . $file_name]);
            return $data;
        }
        return $request->validated();
    }
}
