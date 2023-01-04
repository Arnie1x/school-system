<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class AdministratorController extends Controller
{
    public function index() {
        return view('admin/admin');
    }

    public function create() {
        return view('admin/create');
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

        $administrator = Administrator::create([
            'user_id' => $user->id,
        ]);

        return back();
    }
}
