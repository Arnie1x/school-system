<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function create() {
        return view('student/register', [
            'courses' => Course::all()
        ]);
    }

    public function store(Request $request) {

        $course = $request['course'];
        $request->except(['course']);
        
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);


        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        $student = Student::create([
            'user_id' => $user->id,
            'course_enrolled' => $course
        ]);

        Application::create([
            'user_id' => $user->id,
            'role' => 'student',
            'status' => 'pending'
        ]);

        return redirect('/registered');
    }
}
