<?php

namespace App\Http\Controllers;

use App\Category;
use App\InsuranceClass;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
            "name"     => "required|string|unique:categories|max:255",
            "code"     => "required|string|unique:categories|max:255",
            "class_id" => "required|exists:App\InsuranceClass,id",
        ]);

        $category       = new Category();
        $category->name = $data["name"];
        $category->code = $data["code"];

        $insuranceClass = InsuranceClass::find($data["class_id"]);

        $category->insuranceClass()->associate($insuranceClass );
        $category->save();

        return redirect()->back()->with('status', 'Category created successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charge = Category::find($id);
        $charge->delete();
    
        return redirect()->back();
    }
}
