<?php

namespace App\Http\Controllers;

use App\InsuranceClass;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motorPrivate = InsuranceClass::where("value", env("MOTOR_PRIVATE", "600"))->first();

        return view('motor-private', ['motorPrivate' => $motorPrivate ]);
    }
}
