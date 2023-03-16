<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserExperienceRequest;
use Illuminate\Http\Request;

class UserExperienceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserExperienceRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
