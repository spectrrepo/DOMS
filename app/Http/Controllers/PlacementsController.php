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
    public function delete ($id) {

        Placement::find($id)->delete();

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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editRoomsPage()
    {
        $rooms = Placement::paginate(10);

        return view('moderator.edit_rooms', ['rooms' => $rooms]);
    }


}
