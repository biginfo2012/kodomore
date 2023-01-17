<?php

namespace App\Http\Controllers;

use App\Model\HomeModel;
use App\Model\NewsModel;
use App\Model\SchoolModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class GardenController extends Controller
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
        $schoolModel = new SchoolModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $count = $schoolModel -> getSchoolCount(null);
        $newsModel = new NewsModel();
        $newsList = $newsModel -> getNewsListByPrefecture(21);
        $articleList = $newsModel -> getArticlesListByPrefecture(21);
        foreach ($newsList as $new){
            $create_date = strtotime($new->created_at);
            $cur_date = strtotime(date('Y-m-d'));
            $diff = ($cur_date - $create_date)/60/60/24;
            if($diff>30){
                $new->is_new = false;
            }
            else{
                $new->is_new = true;
            }

        }
        foreach ($articleList as $new){
            $create_date = strtotime($new->post_date);
            $cur_date = strtotime(date('Y-m-d'));
            $diff = ($cur_date - $create_date)/60/60/24;
            if($diff>30){
                $new->is_new = false;
            }
            else{
                $new->is_new = true;
            }

        }

        return view('garden', [
            'prefectureList' => $prefectureList,
            'count' => $count,
            'newsList' => $newsList,
            'articleList' =>$articleList,
            'menuComments' => ['コドモア KIDS']
        ]);
    }
}
