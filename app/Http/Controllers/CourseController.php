<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function create() {
        return view('courses/create', [
            'schools' => School::all()
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'school' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);
        
        // dd($request->all());

        Course::create($formFields);
        
        return Redirect::to('/');
    }
}
