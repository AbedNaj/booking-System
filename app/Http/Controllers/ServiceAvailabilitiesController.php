<?php

namespace App\Http\Controllers;

use App\Models\service_availabilities;
use App\Http\Requests\Storeservice_availabilitiesRequest;
use App\Http\Requests\Updateservice_availabilitiesRequest;

class ServiceAvailabilitiesController extends Controller
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
    public function store(Storeservice_availabilitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(service_availabilities $service_availabilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service_availabilities $service_availabilities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateservice_availabilitiesRequest $request, service_availabilities $service_availabilities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service_availabilities $service_availabilities)
    {
        //
    }
}
