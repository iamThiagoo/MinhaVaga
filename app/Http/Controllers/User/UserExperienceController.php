<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserExperienceRequest;
use App\Models\UserExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserExperienceController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserExperienceRequest $request)
    {
        $user_experience =  array_merge($request->validated(), [
            'user_id' => Auth::user()->id,
            'opportunities_type_id' => $request->validated('opportunity_job_id')
        ]);

        UserExperience::create($user_experience);
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
    public function destroy($id)
    {
        $experience = UserExperience::findOrFail($id);
        
        if ($experience->user_id == Auth::user()->id) {
            $experience->delete();

            return redirect()->back();
        }
    }
}
