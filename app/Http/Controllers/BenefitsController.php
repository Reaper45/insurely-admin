<?php

namespace App\Http\Controllers;

use App\Benefit;
use Illuminate\Http\Request;

class BenefitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $benefits = Benefit::all();

        return view('benefits')->with(["benefits" => $benefits]);
    }
}
