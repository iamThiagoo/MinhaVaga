<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSkillController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $skills = json_decode($request['skills']);

        foreach ( $skills as $value) {
            if (is_numeric($value)) {
                $user_skill = new UserSkill;
                $user_skill->skill_id = $value;
                $user_skill->user_id  = Auth ::user()->id;
                $user_skill->save();
            }
        }

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_skill = UserSkill::find($id);

        if ($user_skill->user_id == Auth::user()->id)
            $user_skill->delete();

        return redirect()->back();
    }
}
