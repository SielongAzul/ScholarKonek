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
            //Declared Error by Intellisense but working
            'applications' => auth()->user()->scholarshipApplications()
                ->with('scholarship','scholarship.scholarprovider')
                ->latest()->get()
                
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
