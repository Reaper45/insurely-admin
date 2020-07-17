<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        return view('settings', ['insuranceClass' => $this->getInsuranceClasses()]);
    }

    public function insuranceClass($class_id)
    {
        switch($class_id) {
            case "1":
                $category = (object)['name' => 'Motor Private', 'id' => 1];
                break;
            default:
                $category = (object)['name' => 'Motor Commercial', 'id' => 2];
                break;
        }

        return view('categories', ['category' => $category, 'insuranceClass' => $this->getInsuranceClasses()]);
    }

    public function benefits()
    {
        return view('benefits', ['insuranceClass' => $this->getInsuranceClasses()]);
    }

    public function getInsuranceClasses()
    {
        return [
            (object)['name' => 'Motor Private', 'id' => 1],
            (object)['name' => 'Motor Commercial', 'id' => 2]
        ];
    }
}
