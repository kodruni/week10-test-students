<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function show($student_slug)
    {
        $student = \App\Student::where('slug', $student_slug)->first();

        if (!$student) {
            abort(404, 'Student not found');
        }

        $view = view('student/show');
        $view->student = $student;
        return $view;
    }

    public function index ($student_name)
    {
        $student = \App\Student::where('name', $student_name)
            ->all();
            ->orderBy($student_name,'asc');
            
        $view = view('student/index');
        $view->student = $student;
        return $view;
    }
}
