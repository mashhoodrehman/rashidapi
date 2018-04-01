<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BlogRequest;
use App\Models\Appointment;
use App\Models\Auth\Role\Role;
use App\Models\Blog;
use App\Models\Auth\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $appointments = Appointment::with('user')
            ->with('service')
            ->whereDate('scheduled_on', '>=', Carbon::today()->toDateString())
            ->orderBy('scheduled_on', 'asc');
        return view('admin.appointments.index', ['appointments' => $appointments->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $blog = new Blog();

        $blog->fill($request->all());


        $path = $request->file('image')->store('uploads');
        $blog->image_url = Storage::url($path);

        $blog->save();

        return redirect()->intended(route('admin.blogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogRequest $request
     * @param Blog $blog
     * @return mixed
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->fill($request->all());

        if($request->image) {
            $path = $request->file('image')->store('uploads');
            $blog->image_url = Storage::url($path);
        }

        $blog->save();

        return redirect()->intended(route('admin.blogs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->intended(route('admin.blogs'));
    }
}
