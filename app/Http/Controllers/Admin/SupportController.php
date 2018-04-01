<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BlogRequest;
use App\Models\Auth\Role\Role;
use App\Models\Blog;
use App\Models\Auth\User\User;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.supports.index', ['supports' => Support::orderBy('created_at')->paginate()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Support $support)
    {
        $support->delete();
        return redirect()->intended(route('admin.supports'));
    }
}
