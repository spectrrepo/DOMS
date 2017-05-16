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
    public function delete ($id)
    {
        View::find($id)->softDelete();

        return 'true';
    }

    /**
     * @param $file
     * @param $post_id
     */
    public static function add ($file, $post_id)
    {
        $view = new View();
        $view->post_id = $post_id;
        $view->img_mini = self::saveFileWithWatermark('claims', 'default', $file,'600');
        $view->img_middle = self::saveFileWithWatermark('claims', 'default', $file,'600');
        $view->img_large = self::saveFileWithWatermark('claims', 'default', $file,'600');
        $view->img_square = self::saveFileWithWatermark('claims', 'default', $file,'600');
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
