<?php

namespace App\Http\Controllers;

use App\Benefit;
use App\Tariff;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class BenefitsController extends Controller
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
        $benefits = Benefit::all();

        return view('benefits')->with(["benefits" => $benefits]);
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
            "name"        => "required|string|unique:charges|max:255",
            "limit"       => "string|nullable|max:255",
            "description" => "string|nullable|max:255",
            "price"       => "sometimes|sometimes|numeric",
        ]);

        $benefit = new Benefit();

        $benefit->name          = $data["name"];
        $benefit->limit         = $data["limit"];
        $benefit->description   = $data["description"];
        $benefit->is_adjustable = $request->has("is_adjustable");
        $benefit->is_optional   = $request->has("is_optional");

        $benefit->save();

        if($request->has("price")) {
            $benefit->tariffs()->attach(
                Tariff::firstOrCreate([
                    "name"          => $data["name"]. '_' .Uuid::uuid4(),
                    "value"         => $data["price"],
                    "is_percentage" => $request->has("is_percentage")
                ])
            );
        }

        return redirect()->back()->with('status', 'Benefit created successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $charge = Benefit::find($id);
        $charge->delete();
    
        return redirect()->back();
    }
}
