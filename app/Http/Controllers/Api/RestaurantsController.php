<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::with('types')->get(['id', 'name', 'address', 'p_iva', 'phone', 'delivery_cost', 'min_order', 'slug']);

        return response()->json(['restaurants' => $restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
