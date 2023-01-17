<?php

namespace App\Http\Controllers;

use App\Model\GardenModel;
use App\Model\HomeModel;
use App\Model\NewsModel;
use App\Model\SchoolModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class NewsController extends Controller
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

    public function showNewsList($prefecture_id, $currentPage) {
        $schoolModel = new SchoolModel();
        $homeModel = new HomeModel();
        $newsModel = new NewsModel();
        $prefecture = $homeModel -> getPrefectureInfo($prefecture_id);
        $prefecture = $prefecture[0];
        $newsList = $newsModel -> getNewsListByPrefecture($prefecture_id);
        $total = count($newsList);
        $perShow = 3;
        $perPage = 10;
        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }


        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }
        return view('news/list-info', [
            'prefecture' => $prefecture,
            'total' => $total,
            'newsList' => $newsList,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function showNewsDetail($newsId) {
        $newsModel = new NewsModel();
        $newsInfo = $newsModel -> getNewsById($newsId);
        $prefecture_id = $newsInfo -> prefecture_id;
        $newsList = $newsModel -> getNewsListByPrefecture($prefecture_id);
        $curIndex = 0;
        foreach($newsList as $index => $news) {
            if($news ->news_id == $newsId) {
                $curIndex = $index;
            }
        }
        $next = -1;
        $previous = -1;
        if($curIndex > 0) {
            $previous = $newsList[$curIndex - 1] -> news_id;
        }
        if($curIndex < count($newsList) - 1) {
            $next = $newsList[$curIndex + 1] -> news_id;
        }
        return view('news/detail', [
            'news' => $newsInfo,
            'next' => $next,
            'previous' => $previous,
            'menuComments' => ['コドモア KIDS']
        ]);
    }
}
