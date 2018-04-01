<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\GalleryRequest;
use App\Http\Requests\Admin\GalleryUpdateRequest;
use App\Models\Auth\Role\Role;
use App\Models\Gallery;
use App\Models\Auth\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.galleries.index', ['galleries' => Gallery::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GalleryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $gallery = new Gallery();

        $gallery->is_banner = $request->is_banner == 'on' ? 1 : 0;

        $path = $request->file('image')->store('uploads');
        $gallery->image_url = Storage::url($path);

        $gallery->save();

        return redirect()->intended(route('admin.galleries'));
    }

    /**
     * Display the specified resource.
     *
     * @param Gallery $gallery
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', ['gallery' => $gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', ['gallery' => $gallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GalleryUpdateRequest $request
     * @param Gallery $gallery
     * @return mixed
     */
    public function update(GalleryUpdateRequest $request, Gallery $gallery)
    {
        $gallery->is_banner = $request->is_banner == 'on' ? 1 : 0;

        if($request->image) {
            $path = $request->file('image')->store('uploads');
            $gallery->image_url = Storage::url($path);
        }

        $gallery->save();

        return redirect()->intended(route('admin.galleries'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gallery $gallery
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->intended(route('admin.galleries'));
    }
}
