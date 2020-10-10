<?php

namespace App\Http\Controllers;

use App\InsuranceClass;
use Illuminate\Http\Request;

class ExtrasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $extrasClass = InsuranceClass::where("value", env("EXTRA", "000"))->first();

        return view('extras')->with(["extras" => $extrasClass->products]);
    }
}
