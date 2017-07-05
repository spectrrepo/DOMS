<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Support\Facades\Storage;

class BasePhotoController extends Controller
{
    const IMAGE_RAINBOW = '/img/watermark-files/rainbow.png';
    const IMAGE_STAR = '/img/watermark-files/logo.png';
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
     * @param $image
     * @return array
     */
    protected function changeSizeWatermark ($image)
    {
        $waterRainbow = $this->getFile(public_path($this::IMAGE_RAINBOW));
        $waterStar = $this->getFile(public_path($this::IMAGE_STAR));
        // ширина watermark звезды 4% от ширины изображения
        $newSizeStar = round((($this->getFile($image)->width()) / 100) * 4 );

        $waterRainbow->fit($this->getFile($image)->width(), 6);
        $waterStar->fit($newSizeStar);

        return [
            'waterStar' => $waterStar,
            'waterRainbow' => $waterRainbow,
        ];
    }

    /**
     * @param $modelName
     * @param $variant
     * @return string
     */
    protected function createPath ($modelName, $variant)
    {
        $path = 'public/'.$modelName;
        $fileName = md5(microtime() . rand(0, 9999));

        $path .= '/'.$variant.'/'.substr($fileName, 0,2);
        $path .= '/'.substr($fileName, 2,2);
        $path .= '/'.$fileName.'.jpg';

        return $path;
    }

    /**
     * @param $image
     * @return mixed
     */
    protected function insertWatermark ($image)
    {
        $watermark = $this->changeSizeWatermark($this->getfile($image));

        $image = $this->getFile($image)->insert($watermark['waterStar'], 'bottom-right', 30, 30)
                                       ->insert($watermark['waterRainbow'], 'top', 0, 0);

        return $image;
    }

    /**
     * @param $modelName
     * @param $variant
     * @param $file
     * @param $height
     * @param bool $width
     * @return string
     */
    protected function saveFile ($modelName, $variant, $file, $height, $width = false)
    {
        $path = $this->createPath($modelName, $variant);

        if ($width === false) {
            $image = $this->getFile($file)
                          ->fit($height)
                          ->encode('jpg');
        } else {
            $image = $this->getFile($file)
                          ->fit($height, $width)
                          ->encode('jpg');
        }

        Storage::put($path, $image);

        return $path;
    }

    /**
     * @param $modelName
     * @param $variant
     * @param $file
     * @param $width
     * @param bool $square
     * @return string
     */
    protected function saveFileWithWatermark ($modelName, $variant, $file, $width, $square = false)
    {
        $path = $this->createPath($modelName, $variant);
        $image = $this->getFile($file);
        $imageWithWatermark = $this->insertWatermark($image);

        if ($square === false) {
            $imageWithWatermark->widen($width)
                               ->encode('jpg');
        } else {
            $imageWithWatermark->fit($width)
                               ->encode('jpg');
        }

        Storage::put($path, $imageWithWatermark);

        return $path;
    }


}