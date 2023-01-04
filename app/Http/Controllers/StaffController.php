<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    //
    public function create() {
        return view('staff/register', [
            'departments' => Department::all()
        ]);
    }

    public function store(Request $request) {

        $department = $request['department'];
        $request->except(['department']);
        
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);


        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        $staff = Staff::create([
            'user_id' => $user->id,
            'department' => $department
        ]);

        Application::create([
            'user_id' => $user->id,
            'role' => 'staff',
            'status' => 'pending'
        ]);

        return redirect('/registered');
    }
}
