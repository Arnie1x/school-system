<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\Int_;

class UnitActivityController extends Controller
{
    public function show($id)
    {
        return view('unit_activities/activity', [
            'activity' => UnitActivity::find($id)
        ]);
    }
    public function showFromUnit($unit_id)
    {
        return view('unit_activities/activity', [
            'activity' => UnitActivity::findFromUnit($unit_id)
        ]);
    }
    public function create($unit_id) {
        return view('unit_activities/create', [
            'unit' => Unit::find($unit_id)
        ]);
    }
    public function store(Request $request, $id) {
        $formFields = $request->validate([
            'unit' => 'required',
            'author' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $formFields['author'] = auth()->user()->id;

        UnitActivity::create($formFields);
        
        return Redirect::to('/units/'.$id);
    }
    public function delete($id, $activity_id) {
        UnitActivity::destroy($activity_id);

        return redirect()->back();
    }
}
