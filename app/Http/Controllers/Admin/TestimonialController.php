<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\Auth\Role\Role;
use App\Models\Testimonial;
use App\Models\Auth\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.testimonials.index', ['testimonials' => Testimonial::sortable(['title' => 'asc'])->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TestimonialRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $testimonial = new Testimonial();

        $testimonial->fill($request->all());


        $path = $request->file('image')->store('uploads');
        $testimonial->image_url = Storage::url($path);

        $testimonial->save();

        return redirect()->intended(route('admin.testimonials'));
    }

    /**
     * Display the specified resource.
     *
     * @param Testimonial $testimonial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', ['testimonial' => $testimonial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', ['testimonial' => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TestimonialRequest $request
     * @param Testimonial $testimonial
     * @return mixed
     */
    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        $testimonial->fill($request->all());

        if($request->image) {
            $path = $request->file('image')->store('uploads');
            $testimonial->image_url = Storage::url($path);
        }

        $testimonial->save();

        return redirect()->intended(route('admin.testimonials'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Testimonial $testimonial
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->intended(route('admin.testimonials'));
    }
}
