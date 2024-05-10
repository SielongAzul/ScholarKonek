<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipApplicationController extends Controller
{
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(Scholarship $scholarship)

    {
        $this->authorize('apply', $scholarship);
        return view('scholarship_application.create',['scholarship'=>$scholarship]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Scholarship $scholarship, Request $request)
    {
        $this->authorize('apply', $scholarship);

        $validatedData = $request->validate([
            'graduated_at' => 'required',
            'schoolyear_start' => 'required',
            'schoolyear_finish' => 'required',
            'grade' => 'required',
            'age' => 'required',
            'address' => 'required',
            'contactnumber' => 'required',
             'emailadd' => 'required|email',
             'grades_doc' => 'required|file|mimes:pdf|max:2024',
             'itr_doc'  => 'file|mimes:pdf|max:2024',
             'letter_doc' => 'file|mimes:pdf|max:2024',
             'birthcert_doc' => 'file|mimes:pdf|max:2024',
             'others_doc' => 'file|mimes:pdf|max:2024',
             'photo_img' => 'file|mimes:jpg,png|max:2024'
               
        ]);
            $file1 = $request->file('grades_doc');
            $path1 = $file1->store('grades_docs', 'private');
            $file2 = $request->file('itr_doc');
            $path2 = $file2->store('itr_docs', 'private');
            $file3 = $request->file('letter_doc');
            $path3 = $file3->store('letter_docs', 'private');
            $file4 = $request->file('birthcert_doc');
            $path4 = $file4->store('birthcert_docs', 'private');
            $file5 = $request->file('others_doc');
            $path5 = $file5->store('others_docs', 'private');
            $file6 = $request->file('photo_img');
            $path6 = $file6->store('photo_imgs', 'private');
            
        $scholarship->scholarshipApplications()->create([
            'user_id' => $request->user()->id,
            'graduated_at' => $validatedData['graduated_at'],
            'schoolyear_start' => $validatedData['schoolyear_start'],
            'schoolyear_finish' => $validatedData['schoolyear_finish'],
            'grade' => $validatedData['grade'],
            'age' => $validatedData['age'],
            'address' => $validatedData['address'],
            'contactnumber' => $validatedData['contactnumber'],
             'emailadd' => $validatedData['emailadd'],
             'grades_doc' => $path1,
             'itr_doc'  => $path2,
             'letter_doc' =>$path3,
             'birthcert_doc' => $path4,
             'others_doc' =>$path5,
             'photo_img' => $path6
         
             

        ]);

        return redirect()->route('scholarships.show', $scholarship)
            ->with('success', 'Scholarship application submitted.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
