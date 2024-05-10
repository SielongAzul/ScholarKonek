<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScholarproviderController extends Controller
{


    public function __construct(){
        $this-> authorizeResource(Scholarprovider::class);
    }

    public function create()
    {
        return view('scholarprovider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        auth()->user()->scholarprovider()->create(
            $request->validate([
                'provider_name' => 'required|min:3|unique:scholarproviders,provider_name'
            ])
        );

        return redirect()->route('scholarships.index')
        ->with('success', 'Your Provider Account has been made.');
    }

   
}
