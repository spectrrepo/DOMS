<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Placement;

class RoomsController extends Controller
{

    public function delete ($roomID) {

        $room = Placement::find($roomID)
                    ->delete();

        return redirect()->back();

    }

    public function add()
    {
        $room = new Placement();
        $room->title = $_POST["title"];
        $room->save();

        return redirect()->back();

    }

    public function edit($id)
    {
        $room = Placement::find($id);
        $room->title = $_POST["title-room"];
        $room->save();

        return redirect()->back();
    }

}
