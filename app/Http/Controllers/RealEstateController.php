<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use Illuminate\Http\Request;



class RealEstateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $realEstates = RealEstate::all();
         return response()->json($realEstates);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $realEstate = RealEstate::create($request->all());
        return response()->json($realEstate, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $realEstate = RealEstate::find($id);
        return response()->json($realEstate);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $realEstate = RealEstate::findOrFail($id);
        $realEstate->update($request->all());
        return response()->json($realEstate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RealEstate::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
