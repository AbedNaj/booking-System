<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;

class CustomersController extends Controller
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
    public function store(StoreCustomersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomersRequest $request, Customer $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customers)
    {
        //
    }
}
