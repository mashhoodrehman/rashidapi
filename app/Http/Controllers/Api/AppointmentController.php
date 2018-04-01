<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AppointmentRequest;
use App\Http\Requests\Api\SupportRequest;
use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
        $user = Auth::user();
        $appointments = Appointment::where('user_id', $user->id)->orderBy('scheduled_on', 'desc')->get();
        return response()->json($appointments);
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function filterByDate(Request $request)
    {
        $appointments = Appointment::whereDate('scheduled_on', '=' , $request->date)->orderBy('scheduled_on', 'desc')->get();
        return response()->json($appointments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SupportRequest $request
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function store(AppointmentRequest $request)
    {
        if(Appointment::where('scheduled_on', $request->scheduled_on)->exists()) {
            throw ValidationException::withMessages(["scheduled_on" => ["Already Booked"]]);
        }

        $user = Auth::user();

        $appointment = new Appointment();

        $appointment->fill($request->all());
        $appointment->user_id= $user->id;

        $appointment->save();

        return response()->json($appointment);
    }
}
