<?php
// checked
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Room;

class RoomsController extends Controller
{

    public function delete ($roomID) {

        $room = Room::find($roomID)->delete();
        return redirect()->back();

    }

    public function add()
    {
        $room = new Room();

        $room->title = $_POST["title"];
        $room->save();

        return redirect()->back();

    }
    public function edit($id)
    {
        $room = Room::find($id);

        $room->title = $_POST["title-room"];
        $room->save();

        return redirect()->back();
    }
}
