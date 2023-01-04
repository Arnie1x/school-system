<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SchoolController extends Controller
{
    public function create() {
        return view('schools/create', [
            'schools' => School::all()
        ]);
    }
    public function store(Request $request) {
        $formFields = $request->validate([
            'administrator' => 'required',
            'name' => 'required',
        ]);

        School::create($formFields);
        
        return Redirect::to('/');
    }
}
