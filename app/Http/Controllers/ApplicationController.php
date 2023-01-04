<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function student() {
        return view('applications/application', [
            'applications' => Application::all()->where('role' , 'student')->where('status', 'pending')->sortBy('created_at', SORT_REGULAR, true)
        ]);
    }
    public function lecturer() {
        return view('applications/application', [
            'applications' => Application::all()->where('role', 'lecturer')->where('status', 'pending')->sortBy('created_at', SORT_REGULAR, true)
        ]);
    }
    public function staff() {
        return view('applications/application', [
            'applications' => Application::all()->where('role', 'staff')->where('status', 'pending')->sortBy('created_at', SORT_REGULAR, true)
        ]);
    }
    public function accept($id) {
        $application = Application::find($id);

        $application->status = 'accepted';

        $application->save();

        return back();
    }
    public function reject($id) {
        $application = Application::find($id);

        $application->status = 'rejected';

        $application->save();

        return back();
    }
}
