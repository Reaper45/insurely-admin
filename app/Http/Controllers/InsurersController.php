<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\HandlesFile;
use App\Insurer;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class InsurersController extends Controller
{
    use HandlesFile;

    public function __construct()
    {
        $this->middleware('auth')->except(['logo']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insurers = Insurer::all();

        return view('insurers')->with(["insurers" => $insurers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-insurer');
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
            'name'         => 'required|unique:insurers|max:255',
            'email'        => 'required|email',
            'logo'         => 'required|image',
            'phone_number' => 'required|digits_between:9,12',
        ]);

        $logo = $request->file('logo');

        $fileName = Uuid::uuid4(). '.' . $logo->extension();
        $logo->storeAs('public', $fileName);
        
        $insurer = new Insurer();

        $insurer->name      = $data["name"];
        $insurer->email     = $data["email"];
        $insurer->telephone = $data["phone_number"];
        $insurer->logo      = $fileName;

        $insurer->save();

        return redirect()->route("insurers")->with('status', 'Insurer created successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insurer = Insurer::find($id);
        $insurer->delete();

        return redirect()->back();
        
    }
    
    public function logo($id)
    {
        $insurer = Insurer::find($id);
        return response($this->getFile('public', $insurer->logo), 200);
    }
}
