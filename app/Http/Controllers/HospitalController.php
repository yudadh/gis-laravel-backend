<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
       $hospital = Hospital::all();
        return response()->json($hospital, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hospital = Hospital::create($request->all());
        return response()->json($hospital, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        return response()->json($hospital, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital)
    {
        $hospital->update($request->all());
        return response()->json($hospital, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        
        $hospital->delete();
        return response()->json(null, 204);
    }
}
