<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\InsuranceClass;

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
        $insuranceClasses = InsuranceClass::where("value", env("MOTOR_PRIVATE", "600"))->first();
        $extrasCategories = InsuranceClass::where("value", env("EXTRA", "000"))->first();

        return view('extras')->with(["extrasCategories" => $extrasCategories, 'insuranceClasses' => $insuranceClasses->children]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteExtrasCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    
        return redirect()->back();
    }
}
