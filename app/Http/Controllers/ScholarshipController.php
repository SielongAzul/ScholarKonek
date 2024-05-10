<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index(){
      
        $this->authorize('viewAny', Scholarship::class);
        $filters = request()->only(
            'search',
            'min_money',
            'max_money',
            'category',
            'grants'
        );

        return view('scholarship.index',['scholarships' => Scholarship::with('scholarprovider')->latest()->filter($filters)->get()]);
    }

    public function show(Scholarship $scholarship){

        return view('scholarship.show',['scholarship'=> $scholarship->load('scholarprovider.scholarships')]);

    }
}
