<?php

namespace App\Http\ Controllers;

use App\Models\ModerateHistory;
use Illuminate\Http\Request;
use Auth;

use App\Models\Placement;
use App\Models\Style;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Color;
use App\Models\View;

class ModerateHistoriesController extends Controller
{
    /**
     * @param $object
     * @param $id
     */
    public static function add ($object, $id)
    {
        $history = new ModerateHistory();

        $history->odject = $object;
        $history->odject_id = $id;
        $history->user_id = Auth::user()->id;
        $history->save();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $history = ModerateHistory::all();

        return view('', [
            'history' => $history
        ]);
    }
}
