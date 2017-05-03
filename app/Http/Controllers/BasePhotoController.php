<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Support\Facades\Storage;

class BasePhotoController extends Controller
{
    const IMAGE_RAINBOW = '/img/watermark-files/rainbow.png';
    const IMAGE_STAR = '/img/watermark-files/rainbow.png';
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
        $waterRainbow = $this->getFile($this::IMAGE_RAINBOW);
        $waterStar = $this->getFile($this::IMAGE_STAR);

        // ширина watermark звезды 4% от ширины изображения
        $newSizeStar = round(($this->getFile($image)->width()) / 100 * 4 );

        $waterRainbow->fit($this->getFile($image)->width());
        $waterStar->fit($newSizeStar);

        return [
            'waterStar' => $waterStar,
            'waterRainbow' => $waterRainbow,
        ];
    }

    /**
     * @param $image
     * @return mixed
     */
    protected function insertWatermark ($image)
    {
        $watermark = $this->changeSizeWatermark($this->getfile($image));

        $image = $this->getFile($image)->insert($watermark['waterStar'], 'top', 0, 0)
                                       ->insert($watermark['waterRainbow'], 'bottom-right', 30, 30);

        return $image;
    }

    /**
     * @param $modelName
     * @param $variant
     * @param $id
     * @param $file
     * @return string
     */
    protected function saveFile ($modelName, $variant, $id, $file)
    {
        $path = '/'.$modelName.'/'.$id.'/'.$variant;
        $image = $this->getFile($file)->fit(180)->encode('jpg');
        Storage::put($path, $image);

        return $path;
    }

    /**
     * @param $modelName
     * @param $variant
     * @param $id
     * @param $file
     * @return string
     */
    protected function saveFileWithWatermark ($modelName, $variant, $id, $file)
    {
        $path = '/'.$modelName.'/'.$id.'/'.$variant;

        $image = $this->getFile($file);
        $imageWithWatermark = $this->insertWatermark($image);
        $imageWithWatermark->fit(180)->encode('jpg');
        Storage::put($path, $imageWithWatermark);

        return $path;
    }


}