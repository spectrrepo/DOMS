<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;
use Illuminate\Support\Facades\Storage;

class BaseModelForPhoto extends Model
{
    public $timestamps = false;
    /**
     * @return mixed
     */
    protected static function file ()
    {
        static::$file = $_FILES['main_photo']['tmp_name'];
//dd(static::$file);
        $newImage = Image::make(static::$file);

        return $newImage;
    }

    /**
     * @param $image
     * @return mixed
     */
    protected function getFile ($image)
    {
        $newImage = Image::make($image);

        return $newImage;
    }

    /**
     * @param $imageRainbow
     * @param $imageStar
     * @param $image
     * @return array
     */
    protected function changeSizeWatermark ( $imageRainbow, $imageStar, $image)
    {
        $waterRainbow = $this->getFile($imageRainbow);
        $waterStar = $this->getFile($imageStar);

        $waterRainbow->fit($this->file()->width());

        $newSize = round(($this->file()->width()) / 100 * 4 );
        $waterStar->fit($newSize);

        return [
                'waterStar' => $waterStar,
                'waterRainbow' => $waterRainbow,
               ];
    }

    /**
     * @return mixed
     */
    protected function insertWatermark ()
    {
        $watermark = $this->changeSizeWatermark('','', $this->getfile(''));

        $image = $this->getFile('')->insert($watermark['waterStar'], 'top', 0, 0)
                                         ->insert($watermark['waterRainbow'], 'bottom-right', 30, 30);

        return $image;
    }

    /**
     * @param $modelName
     * @param $variant
     * @param $id
     * @return string
     */
    protected static function saveFile ($modelName, $variant, $id)
    {
        $path = $modelName.'/'.$id.'/'.$variant;
//        dd($_FILES);
        $image = static::file()->fit(180)->encode('jpg');
//        dd($image);
        Storage::put($path, $image);

        return $path;
    }

    public static $file;
}