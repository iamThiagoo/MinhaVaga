<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserEducationRequest;
use App\Models\UserEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEducationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserEducationRequest $request)
    {
        $user_education = array_merge($request->validated(), [
            'user_id' => Auth::user()->id
        ]);

        UserEducation::create($user_education);
        return redirect()->back();
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
        $user_education = UserEducation::find($id);

        if ($user_education->user_id == Auth::user()->id)
            $user_education->delete();

        return redirect()->back();
    }
}
