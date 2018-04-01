<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BlogRequest;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Auth\Role\Role;
use App\Models\Blog;
use App\Models\Auth\User\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.settings.edit', ['setting' => Setting::find(1)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @param Setting $setting
     * @return mixed
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->fill($request->all());
        $setting->save();

        return redirect()->intended(route('admin.settings.edit'));
    }
}
