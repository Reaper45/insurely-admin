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
        $insuranceClasses = InsuranceClass::where("value", env("MOTOR_PRIVATE", "600"))->first();

        return view('settings', ['insuranceClasses' => $insuranceClasses->children ]);
    }

    public function insuranceClass($class_id)
    {
        $insuranceClasses = InsuranceClass::where("value", env("MOTOR_PRIVATE", "600"))->first();
        $insuranceClass   = InsuranceClass::find($class_id);

        return view('categories', ['insuranceClasses' => $insuranceClasses->children, 'insuranceClass' => $insuranceClass]);
    }
}
