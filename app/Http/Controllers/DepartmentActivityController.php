<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentActivity;
use Illuminate\Support\Facades\Redirect;

class DepartmentActivityController extends Controller
{
    // public function show($id)
    // {
    //     return view('activity', [
    //         'activity' => DepartmentActivity::find($id)
    //     ]);
    // }
    // public function showFromDepartment($department_id)
    // {
    //     return view('activity', [
    //         'activity' => DepartmentActivity::findFromDepartment($department_id)
    //     ]);
    // }

    public function create($department_id) {
        return view('department_activities/create', [
            'department' => Department::find($department_id)
        ]);
    }
    public function store(Request $request, $department_id) {
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'department_id' => 'required',
        ]);

        DepartmentActivity::create($formFields);
        
        return Redirect::to('/staff');
    }
    public function delete($id, $activity_id) {
        DepartmentActivity::destroy($activity_id);

        return redirect()->back();
    }
}
