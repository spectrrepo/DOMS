<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\View;

/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class ViewController extends Controller
{
  public function delete()
    {
        $id = $_POST['id'];
        $views = View::find($id);
        $views->delete();
        dd($views);
        return 'true';
    }
}
