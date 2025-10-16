<?php

namespace App\Http\Controllers;
use App\Models\Lessons;

use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function index()
    {
        $lessons = Lessons::all();

        return view ('lessons.index',[
            "lesson"=> $lessons
    ]);

    }
}
