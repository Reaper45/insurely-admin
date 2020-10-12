<?php

namespace App\Http\Controllers;

use App\Charge;
use App\InsuranceClass;
use Illuminate\Http\Request;

class ChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insuranceClasses = InsuranceClass::where("value", env("MOTOR_PRIVATE", "600"))->first();
        $charges          = Charge::all();

        return view('charges', ['insuranceClasses' => $insuranceClasses->children, "charges" => $charges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name"  => "required|string|unique:charges|max:255",
            "price" => "required|numeric",
        ]);

        $charge        = new Charge();
        $charge->name  =  $data["name"];
        $charge->value =  $data["price"];
        $charge->is_percentage  =  $request->has("is_percentage");

        $charge->save();

        return redirect()->back()->with('status', 'Charge created successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charge = Charge::find($id);
        $charge->delete();
    
        return redirect()->back();
    }
}
