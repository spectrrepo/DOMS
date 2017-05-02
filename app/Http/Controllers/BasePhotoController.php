<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;

class BasePhotoController extends Controller
{
    /**
     * @return mixed
     */
    protected function file ()
    {
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
    protected function saveFile ($modelName, $variant, $id)
    {
        $path = $modelName.'/'.$id.'/'.$variant;
        $image = static::file()->fit(180)->encode('jpg');
        Storage::put($path, $image);

        return $path;
    }

    public function photo ()
    {
        $this->image = self::saveFile(__CLASS__, 'path_mini', 1);
//      $this->path_middle = $this->saveFile(__CLASS__, 'path_middle', $this->getIncrementing());
//      $this->path_large = $this->saveFile(__CLASS__, 'path_large', $this->getIncrementing());
//      $this->path_square = $this->saveFile(__CLASS__, 'path_square', $this->getIncrementing());
    }

}