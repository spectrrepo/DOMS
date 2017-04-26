<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Placement;

class PlacementsController extends Controller
{
    /**
     * @param $roomID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($roomID) {

        Placement::find($roomID)->delete();

        return redirect()->back();

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add()
    {
        $room = new Placement();
        $room->title = $_POST["title"];
        $room->save();

        return redirect()->back();

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $room = Placement::find($id);
        $room->title = $_POST["title-room"];
        $room->save();

        return redirect()->back();
    }

}
