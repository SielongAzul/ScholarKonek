<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipApplication;
use Illuminate\Http\Request;

class MyScholarshipApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('my_scholarship_application.index',
        [
            'applications' => auth()->user()->scholarshipApplications()
                ->with([
                    'scholarship' => function ($query) {
                        $query->withCount('scholarshipApplications')
                              ->withTrashed();
                    },
                    'scholarship.scholarprovider'
                ])
                ->latest()
                ->get()
        ]
    );
    }

   

    public function destroy(ScholarshipApplication $myScholarshipApplication)
    {


        $myScholarshipApplication->delete();

        return redirect()->back()->with(
            'success',
            'Scholarship Application Removed.'
        );
    }
}
