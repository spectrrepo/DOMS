<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

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
    public function delete ()
    {
        $id = Input::get('id');
        View::find($id)->softDelete();

        return 'true';
    }

    /**
     * @return mixed
     */
    public function loadViews ()
    {
        $id = $_POST['id'];
        $views = View::select('id', 'path_full', 'path_min')
                     ->where('post_id', '=', $id)
                     ->get();

        return $views;
    }

    public function add ()
    {

    }

}
