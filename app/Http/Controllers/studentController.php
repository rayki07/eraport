<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradesStudents;

class studentController extends Controller
{
    public function index()
    {
        $students = GradesStudents::with('students', 'grades')->get();

        return view('students.index', [
        'students' => $students
      ]);
    }

    
}
