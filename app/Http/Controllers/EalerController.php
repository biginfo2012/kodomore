<?php

namespace App\Http\Controllers;

use App\Model\HomeModel;
use App\Model\SchoolModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EalerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $homeModel = new HomeModel();
        $areaList = $homeModel -> getAllCityGroupByArea();
        return view('ealer-school', [
            'areaList' => $areaList
        ]);
    }
}
