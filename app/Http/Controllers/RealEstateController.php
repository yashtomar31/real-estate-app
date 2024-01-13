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
         $realEstates = RealEstate::select('id', 'name', 'real_state_type', 'city', 'country')->get();
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
        try {
    $validatedData = $request->validate([
        'name' => 'required|string|max:128',
        'real_state_type' => 'required|in:house,department,land,commercial_ground',
        'street' => 'required|string|max:128',
        'external_number' => 'required|alpha_dash|max:12',
        'internal_number' => 'required_if:real_state_type,department,commercial_ground|nullable|alpha_dash|max:12',
        'neighborhood' => 'required|string|max:128',
        'city' => 'required|string|max:64',
        'country' => 'required|size:2', // assuming you have a custom validation rule for country_code
        'rooms' => 'required|integer',
        'bathrooms' => ['required', 'numeric', function($attribute, $value, $fail) use ($request) {
            if (in_array($request->real_state_type, ['land', 'commercial_ground']) && $value < 0) {
                $fail("The {$attribute} must be zero or positive for land or commercial ground.");
            }
        }],
        'comments' => 'nullable|string|max:128',
    ]);
    
        $realEstate = RealEstate::create($validatedData);
        return response()->json($realEstate, 201);
    } catch (\Exception $e) {
        // Handle exception (e.g., return error response)
        return response()->json(['error' => 'Failed to create real estate property'], 500);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $realEstate = RealEstate::findOrFail($id);
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
        try {
        $realEstate = RealEstate::findOrFail($id);
    $validatedData = $request->validate([
        'name' => 'sometimes|string|max:128',
        'real_state_type' => 'sometimes|in:house,department,land,commercial_ground',
        'street' => 'sometimes|string|max:128',
        'external_number' => 'sometimes|alpha_dash|max:12',
        'internal_number' => 'sometimes|required_if:real_state_type,department,commercial_ground|nullable|alpha_dash|max:12',
        'neighborhood' => 'sometimes|string|max:128',
        'city' => 'sometimes|string|max:64',
        'country' => 'sometimes|size:2', // assuming you have a custom validation rule for country_code
        'rooms' => 'sometimes|integer',
        'bathrooms' => ['sometimes', 'numeric', function($attribute, $value, $fail) use ($request) {
            if (in_array($request->real_state_type, ['land', 'commercial_ground']) && $value < 0) {
                $fail("The {$attribute} must be zero or positive for land or commercial ground.");
            }
        }],
        'comments' => 'sometimes|nullable|string|max:128',
    ]);
    
        $realEstate->update($validatedData);
        $realEstate = $realEstate->fresh();
        return response()->json($realEstate);
    } catch (\Exception $e) {
        // Handle the exception (e.g., return an error response)
        return response()->json(['error' => 'Failed to update real estate property'], 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $realEstate = RealEstate::findOrFail($id);
        $realEstate->delete(); // This should soft-delete the record

        return response()->json($realEstate, 200);
    }
}
