<?php

namespace App\Http\Controllers;

use App\InsuranceClass;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motorPrivate     = InsuranceClass::where("value", env("MOTOR_PRIVATE", "600"))->first();
        $insuranceClasses = InsuranceClass::all();

        return view('motor-private', ['motorPrivate' => $motorPrivate, "insuranceClasses" => $insuranceClasses ]);
    }

    /**
     * Display ipf settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function ipf()
    {
        return view('ipf');
    }
}
