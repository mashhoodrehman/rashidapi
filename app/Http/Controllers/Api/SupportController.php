<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\SupportRequest;
use App\Models\Support;
use App\Http\Controllers\Controller;
use Validator;

class SupportController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param SupportRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupportRequest $request)
    {
        $support = new Support();

        $support->fill($request->all());

        $support->save();

        return response()->json($support);
    }
}
