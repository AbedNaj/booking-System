<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationsRequest;
use App\Http\Requests\UpdateLocationsRequest;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $locations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $locations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationsRequest $request, Location $locations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $locations)
    {
        //
    }
}
