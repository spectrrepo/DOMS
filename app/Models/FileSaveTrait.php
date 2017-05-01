<?php
use Image;

/**
 * Class FileSaveTrait
 */
trait FileSaveTrait
{
    /**
     * @var array
     */
    protected $class = __CLASS__;
    protected $attributes = [];

    /**
     * @param $modelName
     * @param $sizeName
     * @return string
     */
    protected function pathGenerator ( $modelName, $sizeName )
    {
        $path = __DIR__.$modelName.$sizeName.$id;

        return $path;
    }

    protected function watermark ($file, $verticalPosition, $horizontalPosition)
    {
        $rainbowWatermark = Image::make('public/watermark.png');
        $starWatermark = Image::make('public/watermark.png');

        $img->insert('public/watermark.png', 'bottom-right', 10, 10);
    }


    /**
     * @param $file
     * @param array $size
     * @return mixed
     */
    protected function savePhoto( $file, array $size = [])
    {
        $newImage = Image::make($file)
                         ->encode('jpg')
                         ->fit()
                         ->save($this->pathGenerator($size['name']));

        return $newImage;
    }

    /**
     * @param $file
     */
    public function saveAll ($file)
    {
        foreach ($this->attributes as $item){
            $this->savePhoto($file, $item);
        }
    }

    public function ORM ($className)
    {
       $className->path_full = path('middle');
       $className->path_full = path('big');
       $className->path_full = path('mini');
       $className->path_full = path('quadro');

    }

    /**
     * @param $file
     * @param $watermark
     */
    public function resizeWatermark ($file, $watermark)
    {
        $nameClass::saved = '';
//        static::saved() = '';
    }

//    переопределить метод saved


}