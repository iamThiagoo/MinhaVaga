<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserIdiomRequest;
use App\Models\UserIdiom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIdiomController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserIdiomRequest $request)
    {
        $user_idiom = array_merge($request->validated(), ['user_id' => Auth::user()->id]);
        UserIdiom::create($user_idiom);

        return redirect()->back();
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
        $idiom = UserIdiom::find($id);

        if ($idiom->user_id == Auth::user()->id) {
            $idiom->delete();
        }

        return redirect()->back();
    }
}
