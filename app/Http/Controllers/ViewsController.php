<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

use App\Models\View;

/**
 * Class ViewsController
 * @package App\Http\Controllers
 */
class ViewsController extends BasePhotoController
{
    /**
     * @param $id
     * @return string
     */
    public function delete ()
    {
        View::where('id', '=', Input::get('id'))->delete();

        return 'true';
    }

    /**
     * @param $file
     * @param $post_id
     */
    public function add ($file, $post_id)
    {
        $view = new View();
        $view->post_id = $post_id;
        $view->img_mini = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $view->img_middle = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $view->img_large = $this->saveFileWithWatermark('claims', 'default', $file,'1024');
        $view->img_square = $this->saveFileWithWatermark('claims', 'default', $file,'600');
        $view->alt = 'изображение';
        $view->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function loadForPost ($id)
    {
        $views = View::where('post_id', '=', $id)
                     ->get();

        return $views;
    }


}
