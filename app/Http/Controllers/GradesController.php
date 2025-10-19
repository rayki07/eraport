<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradesStudents;
use App\Models\Grades;
use App\Models\Students;
use App\Models\SchoolYears;
use App\Models\Semesters;

class GradesController extends Controller
{
    public function index()
    {
        //menampilkan semua grade tanpa duplikat
        $grades = Grades::all();

        return view('grades.index', [
            'grades' => $grades
        ]);
    }

}
