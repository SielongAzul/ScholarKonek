<?php

namespace App\Http\Controllers;

use App\Http\Request\ScholarshipRequest;
use App\Models\Scholarship;
use Illuminate\Http\Request;


class MyScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $this->authorize('viewAnyScholarprovider', Scholarship::class);
        return view('my_scholarship.index',
    [

        'scholarships'=>auth()->user()->scholarprovider
        ->scholarships()
        ->with(['scholarprovider','scholarshipApplications','scholarshipApplications.user'])
    
        ->get()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Scholarship::class);
        return view('my_scholarship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(ScholarshipRequest $request)
    {
       
        $this->authorize('create', Scholarship::class);
        auth()->user()->scholarprovider->scholarships()->create($request->validated());
        return redirect()->route('my-scholarships.index')
            ->with('success', 'Scholarship Published');
    }   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scholarship $myScholarship)
    {
        $this->authorize('update', $myScholarship);
        return view('my_scholarship.edit', ['scholarship' => $myScholarship]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScholarshipRequest $request, Scholarship $myScholarship)
    {
       
        $this->authorize('update', $myScholarship);
        $myScholarship->update($request->validated());
        return redirect()->route('my-scholarships.index')
        ->with('success', 'Scholarship Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scholarship $myScholarship)
    {
        $myScholarship->delete();
        return redirect()->route('my-scholarships.index')
        ->with('success', 'Scholarship Deleted');
    }
}
