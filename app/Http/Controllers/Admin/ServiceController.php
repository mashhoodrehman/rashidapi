<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Auth\Role\Role;
use App\Models\Service;
use App\Models\Auth\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.services.index', ['services' => Service::sortable(['title' => 'asc'])->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service();
        $service->fill($request->all());
        $service->save();

        return redirect()->intended(route('admin.services'));
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Service $service)
    {
        return view('admin.services.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param Service $service
     * @return mixed
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $service->fill($request->all());
        $service->save();
        return redirect()->intended(route('admin.services'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->intended(route('admin.services'));
    }
}
