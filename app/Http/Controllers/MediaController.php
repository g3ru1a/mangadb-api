<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    public static function mediaTest(Request $request){
        if($request->file('image')){
            $media = MediaController::upload($request->file('image'),
                'TestImage',
                'test_images', 1);
            $media->save();
        }
    }

    public static function upload(UploadedFile $raw_image, string $meta, string $folder, int $item_id): false|Media
    {
        $image = Image::make($raw_image)->encode('jpg', 75);
        $s3 = Storage::disk('s3');
        $filename = MediaController::generateRandomString(20) . '.jpg';
        $path = $folder. '/' . $item_id . '/' . $filename;
        $s3->put($path, $image);
        if ($path) {
            $url = env('IMAGE_CDN_URL') . $path;
            $media = new Media(['url' => $url, 'meta' => $meta]);
        }
        return $media ?? false;
    }

    public static function generateRandomString($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
