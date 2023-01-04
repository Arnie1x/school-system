<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\RegisteredUnits;
use App\Models\UnitActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UnitController extends Controller
{
    // Show all Units
    public function student() {
        if (Unit::getRegistered() == null) {
            return view('main_student', [
                'units' => array()
            ]);
        }
        return view('main_student', [
            'units' => Unit::getRegistered()->toQuery()->paginate(9),
        ]);
    }

    public function lecturer() {
        if (Unit::forLecturers() == null) {
            return view('main_lecturer', [
                'units' => array()
            ]);
        }
        return view('main_lecturer', [
            'units' => Unit::forLecturers()->toQuery()->paginate(9),
        ]);
    }

    // Show one Unit
    public function show($id)
    {
        return view('units/unit', [
            'unit' => Unit::find($id),
            'activities' => UnitActivity::findFromUnit($id)
        ]);
    }

    public function create() {
        return view('units/create', [
            'courses' => Course::all(),
        ]);
    }
    public function store(Request $request) {
        $formFields = $request->validate([
            'course' => 'required',
            'administrator' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        Unit::create($formFields);
        
        return Redirect::to('/');
    }
    public function delete($id) {
        Unit::destroy($id);

        return Redirect::to('/');
    }

    public function manage() {
        return view('units/manage', [
            'units' => Unit::latest()->paginate(9),
            'lecturers' => Lecturer::all()
        ]);
    }

    public function update(Request $request, Unit $unit) {
        $formFields = $request->validate([
            'administrator' => 'required',
            'id' => 'required'
        ]);
        // dd($formFields);
        $unit = Unit::find($formFields['id']);
        $unit->update($formFields);
        
        return back();
    }
}
