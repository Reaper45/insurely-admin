<?php

namespace App\Http\Controllers;

use App\InsuranceClass;
use Illuminate\Http\Request;

class InsuranceClassesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name"      => "required|string|unique:categories|max:255",
            "code"      => "required|string|unique:categories|max:255",
            "parent_id" => "sometimes|required|exists:App\InsuranceClass,id",
        ]);

        $insuranceClass        = new InsuranceClass();
        $insuranceClass->name  = $data["name"];
        $insuranceClass->value = $data["code"];

        $parent = InsuranceClass::find($data["parent_id"]);

        if($request->has("parent_id")) {
            $insuranceClass->parent()->associate($parent);
        }

        $insuranceClass->save();

        return redirect()->back()->with('status', 'Class created successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charge = InsuranceClass::find($id);
        $charge->delete();
    
        return redirect()->back();
    }
}
