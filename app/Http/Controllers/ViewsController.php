<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\View;

/**
 * Class ViewsController
 * @package App\Http\Controllers
 */
class ViewsController extends Controller
{
    /**
     * @return string
     */
    public function delete()
    {

        $id = $_POST['id'];
        $views = View::find($id);
        $views->delete();

        return 'true';
    }

    /**
     * @return mixed
     */
    public function dwnldViewsForPhoto()
    {
        $id = $_POST['id'];
        $views = View::select('id', 'path_full', 'path_min')
                     ->where('post_id', '=', $id)
                     ->get();

        return $views;
    }

}
