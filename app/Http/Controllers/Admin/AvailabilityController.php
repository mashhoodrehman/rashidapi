<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AvailabilityRequest;
use App\Models\Auth\Role\Role;
use App\Models\Availability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.availabilities.index', ['availabilities' => Availability::orderBy('day', 'asc')->orderBy('start', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.availabilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AvailabilityRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AvailabilityRequest $request)
    {
        $availability = new Availability();

        $availability->fill($request->all());

        $availability->save();

        return redirect()->intended(route('admin.availabilities'));
    }

    /**
     * Display the specified resource.
     *
     * @param Availability $availability
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Availability $availability)
    {
        return view('admin.availabilities.show', ['availability' => $availability]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Availability $availability
     * @return \Illuminate\Http\Response
     */
    public function edit(Availability $availability)
    {
        return view('admin.availabilities.edit', ['availability' => $availability]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AvailabilityRequest $request
     * @param Availability $availability
     * @return mixed
     */
    public function update(AvailabilityRequest $request, Availability $availability)
    {
        $availability->fill($request->all());

        $availability->save();

        return redirect()->intended(route('admin.availabilities'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Availability $availability
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Availability $availability)
    {
        $availability->delete();
        return redirect()->intended(route('admin.availabilities'));
    }
}
