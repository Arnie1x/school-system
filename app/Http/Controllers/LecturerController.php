<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lecturer;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LecturerController extends Controller
{
    //
    public function create() {
        return view('lecturer/register');
    }
    public function store(Request $request) {

        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);


        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        $lecturer = Lecturer::create([
            'user_id' => $user->id,
        ]);

        Application::create([
            'user_id' => $user->id,
            'role' => 'lecturer',
            'status' => 'pending'
        ]);

        return redirect('/registered');
    }
}
