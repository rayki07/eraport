<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Models\Grade;

class studentController extends Controller
{
    public function index()
    {
        $students = Students::all();
        return view('students.index', [
        'students' => $students
      ]);
    }
}
