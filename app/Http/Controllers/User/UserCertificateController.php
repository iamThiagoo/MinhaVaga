<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserCertificateRequest;
use App\Models\UserCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCertificateController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserCertificateRequest $request)
    {
        $user_certificate = array_merge($request->validated(), [
            'user_id' => Auth::user()->id
        ]);

        UserCertificate::create($user_certificate);
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
        $user_certificate = UserCertificate::find($id);

        if ($user_certificate->user_id == Auth::user()->id)
            $user_certificate->delete();

        return redirect()->back();
    }
}
