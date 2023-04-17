<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = array_merge($request->validated(), [
            'slug' => strtolower(str_replace(' ', '', $request->validated('name'))) . rand(100, 9999)
        ]);

        $user_created = User::create($user);
        Auth::login($user_created);

        return redirect()->route('profile.edit');
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
        $user = User::findOrFail($id);

        if(!empty($request['photo'])) {
            $imageName = $this->storageImage($request['photo']);
            $request->merge(['photo' => $imageName]);
        }
        
        $user->update($request->except(['_token', '_method']));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    /**
     * Include image in storage folder and return $imageName
     */
    public function storageImage (UploadedFile $image) : string
    {
        $imageName = uniqid() . "." . $image->extension();
        $image->move(public_path('images/user_photos'), $imageName);

        return $imageName;
    }
}
