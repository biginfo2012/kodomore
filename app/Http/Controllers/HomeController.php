<?php

namespace App\Http\Controllers;

use App\Model\GardenModel;
use App\Model\HomeModel;
use App\Model\SchoolModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
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
        $prefectureList = $homeModel -> getAllPrefecture();
        //$gardenList = $gardenModel -> getAllGarden();
        return view('welcome', [
            'prefectureList' => $prefectureList,
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
//        $gardenModel = new GardenModel();
//        $schoolModel = new SchoolModel();
//        $prefectureList = $schoolModel -> getAllPrefecture();
//        //$gardenList = $gardenModel -> getAllGarden();
//        return view('welcome', [
//            'prefectureList' => $prefectureList
//        ]);
    }

    public function procedure()
    {
        return view('procedure', [
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function choose()
    {
        return view('choose', [
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function private() {
        return view('private', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function question() {
        return view('question', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }



    public function questionConfirm() {
        $type = \request('type');
        $content = \request('content');
        $parent_first = \request('parent_first');
        $parent_second = \request('parent_second');
        $first_name = \request('first_name');
        $second_name = \request('second_name');
        $email = \request('email');
        $mobile = \request('mobile');
        $arr = ["選択してください", "コドモアについて", "会員情報について", "ご利用方法について", "その他"];
        $type = $arr[$type];
        return view('question-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'type' => $type,
            'content' => $content,
            'parent_first' => $parent_first,
            'parent_second' => $parent_second,
            'first_name' => $first_name,
            'second_name' => $second_name,
            'email' => $email,
            'mobile' => $mobile,
        ]);
    }

    public function questionComplete() {
        return view('question-complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function guide() {
        return view('guide', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function blogGuide() {
        return view('blog-guide', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function frequentlyQuestion() {
        return view('frequently', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function getCityList($prefecture_id) {
        $homeModel = new HomeModel();
        $areaList = $homeModel -> getAllCityGroupByArea($prefecture_id, '');
        $response_city = [];
        foreach($areaList as $area) {
            foreach($area->city_list as $city) {
                array_push($response_city, $city);
            }
        }
        $response = [];
        $response['city'] = $response_city;
        return $response;
    }
}
