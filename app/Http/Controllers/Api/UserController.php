<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PasswordResetRequest;
use App\Http\Requests\Api\UserUpdateRequest;
use App\Http\Requests\ApiStoreUpdateRequest;
use App\Models\Auth\User\User;
use App\Models\Store;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display the store of current logged in user
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response()->json(Auth::user());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request)
    {
        $user = Auth::user();

        if($request->mobile && User::where('mobile', $request->mobile)->where('id', '<>',$user->id)->exists()) {
            return response()->json(['message'=> 'Mobile Number in use'], 422);
        }

        if($request->email && User::where('email', $request->email)->where('id', '<>' ,$user->id)->exists()) {
            return response()->json(['message'=> 'Email in use'], 422);
        }

        $user->fill($request->only(['fcm_registration_id', 'mobile', 'name', 'email']));
        $user->save();

        return response()->json($user);
    }

    public function resetPassword(PasswordResetRequest $request)  {
        $user = Auth::user();

        if(!Hash::check($request->password, $user->password)){
            return response()->json(['message'=> 'Incorrect Password'], 422);
        }

        $user->password = Hash::make($request->new_password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        return response()->json($user);
    }
}
