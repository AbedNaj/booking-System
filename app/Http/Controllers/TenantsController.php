<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Http\Requests\StoreTenantsRequest;
use App\Http\Requests\UpdateTenantsRequest;

class TenantsController extends Controller
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
    public function store(StoreTenantsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTenantsRequest $request, Tenant $tenants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenants)
    {
        //
    }
}
