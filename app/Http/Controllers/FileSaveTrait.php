<?php

/**
 * Class FileSaveTrait
 */
//todo:://
trait FileSaveTrait
{
    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @param $modelName
     * @param $sizeName
     * @return string
     */
    private function pathGenerator ( $modelName, $sizeName )
    {
        $path = __DIR__.$modelName.$sizeName.$id;

        return $path;
    }

    /**
     * @param $file
     * @param array $size
     * @return void
     */
    private function savePhoto( $file, array $size = [])
    {
        Image::make($file)
             ->encode('jpg')
             ->fit()
             ->save($this->pathGenerator($size['name']));
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
}