<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Auth\User\User;
use App\Models\Service;
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
        return view('admin.appointments.create', [
            'services' => Service::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AppointmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $appointment = new Appointment();

        $appointment->fill($request->all());

        $appointment->save();

        return redirect()->intended(route('admin.appointments'));
    }

    /**
     * Display the specified resource.
     *
     * @param Appointment $appointment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Appointment $appointment)
    {
        return view('admin.appointments.show', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit', [
            'appointment' => $appointment,
            'services' => Service::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AppointmentRequest $request
     * @param Appointment $appointment
     * @return mixed
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $appointment->fill($request->all());

        $appointment->save();

        return redirect()->intended(route('admin.appointments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Appointment $appointment
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->intended(route('admin.appointments'));
    }
}
