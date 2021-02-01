<?php

namespace App\Http\Controllers;

use App\City;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select_municipality($department_code)
    {
        return City::where('department_code', $department_code)->get();
    }

}
