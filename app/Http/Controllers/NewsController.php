<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Color;
use App\Style;
use App\Room;

class NewsController extends Controller
{
    public function Index()
    {
        $colors = Color::all();
        $styles = Style::all();
        $rooms = Room::all();

        return view('site.news', ['colors' => $colors,
                                  'styles' => $styles,
                                  'rooms' => $rooms,
                                 ]);
    }
}
