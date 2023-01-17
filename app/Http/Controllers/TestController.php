<?php

namespace App\Http\Controllers;

use App\Model\GardenModel;
use App\Model\HomeModel;
use App\Model\MediaModel;
use App\Model\NewsModel;
use App\Model\SchoolModel;
use App\Model\UserModel;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
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
    public function ealer()
    {
        $homeModel = new HomeModel();
        $areaList = $homeModel -> getAllCityGroupByArea();
        return view('test/ealer-school', [
            'areaList' => $areaList
        ]);
    }

    public function garden()
    {

        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $count = $schoolModel -> getSchoolCount(null);

        return view('test/garden', [
            'prefectureList' => $prefectureList,
            'count' => $count,
            'menuComments' => ['コドモア KIDS']
        ]);
    }
    public function procedure()
    {
        return view('test/procedure', [
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function choose()
    {
        return view('test/choose', [
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function high()
    {
        $homeModel = new HomeModel();
        $areaList = $homeModel -> getAllCityGroupByArea();
        return view('test/high-school', [
            'areaList' => $areaList
        ]);
    }
    public function index()
    {
        //return redirect('/test/garden');
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        //$gardenList = $gardenModel -> getAllGarden();
        return view('test/welcome', [
            'prefectureList' => $prefectureList,
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function login()
    {

        return view('test/login/login', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }




    public function forgetPassword() {
        return view('test/login/forget-password', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function checkUserExist() {
        $email = \request('email');
        Log::info($email);
        $userModel = new UserModel();
        $user = $userModel -> getUserByOnlyEmail($email);
        if($user != null) {
            return response()->json([
                'status' => true
            ]);
        }
        return response()->json([
            'status' => false
        ]);
    }



    public function sendMail($id, $email, $token, $type, $name) {
        $comment = '';
        if($type == 'forget'){
            $title = '【KODOMORE】パスワード再設定について';
            $url = 'test/forget/modify/'. $id . '/' . $email;
        }
        else if($type == 'modify'){
            $title = '【KODOMORE】会員情報変更確認';
            $url = 'test/parent/my-page';
        }
        else{
            $title = '【KODOMORE】会員登録のお申込み受付済';
            $url = 'test/register/password/' . $id . '/' . $type . '/' . $email;
        }

        //$title = '件名／【KODOMORE】パスワード再設定について';

        $data = array('token'=> $token, 'name' => $name, 'url' => $url);
//        $data['token'] = $token;
//        $data['name'] = $name;
//        $data['url'] = $url;
//        try {
//            Mail::send('test/login/mail', $data, function($message) use ($title, $email) {
//                $message->to($email, 'Admin')->subject
//                ($title);
//                $message->from(env("MAIL_USERNAME"),'Admin');
//            });
//            Mail::send('test/login/mail', $data, function($message) use ($title, $email) {
//                $message->from(env("MAIL_USERNAME"), 'Kodomore Admin');
//                $message->to($email);
//                $message->subject($title);
//            });
//        } catch (\Throwable  $exception) {
//            Log::info("not:".$exception);
//        }
    }

    public function checkValidEmail($email) {
        Log::info($email);
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email',
        ]);
        if ($validator->fails())
        {
            return false;
        } else {
            return true;
        }
    }

    public function sendToken($id, $email, $type, $name) {
        $userModel = new UserModel();
        $token = rand(1000, 9999);
        $userModel -> addToken($email, $token);
        if($this->checkValidEmail($email) == true) {
            Log::info("Valid Email".$email);
            $this->sendMail($id, $email, $token, $type, $name);
        } else {
            Log::info("Invalid Email");
        }
    }

    public function forgetComplete() {
        $name = \request('name');
        $mobile = \request('mobile');
        $email = \request('email');
        $userModel = new UserModel();
        $user = $userModel -> getUserByOnlyEmail($email);
        $id = $user -> id;
        $this -> sendToken($id, $email, 'forget', $name);

        return view('test/login/forget-complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'name'  => $name,
            'mobile'    => $mobile,
            'email'     => $email,
            'id'        => $id
        ]);
    }

    public function forgetModify() {
        $id = \request('id');
        $mobile = \request('mobile');
        $email = \request('email');
        return view('test/login/forget-modify', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'  => $id,
            'mobile'    => $mobile,
            'email'     => $email
        ]);
    }
    public function forgetModifyMail($id, $email) {
        $mobile = \request('mobile');
        return view('test/login/forget-modify', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'  => $id,
            'mobile'    => $mobile,
            'email'     => $email
        ]);
    }

    public function forgetFinal() {
        return view('test/login/forget-final', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }

    public function signIn() {
        $name = \request('name');
        $password = \request('password');
        $userModel = new UserModel();
        $user = $userModel -> getUserByEmail($name, $password);

        if($user == null) {
            return response()->json([
                'status' => false
            ]);
        }

        session()->put(SESS_UID,        $user->id);
        if($user->type === 'parent'){
            //return redirect()->intended('/test/parent/my-page');
            return response()->json([
                'status' => 'parent'
            ]);
        }
        return response()->json([
            'status' => true,
        ]);

    }

    public function parentPage() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);
        return view('test/parent/my-page', [
            'user'  => $user,
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function settingInfoPage() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);
        $pw = $user->password;
        $lpw = strlen($pw);
        return view('test/parent/confirm', [
            'user'  => $user,
            'lpw' => $lpw,
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function modifyInfo() {
        $user_id = session()->get(SESS_UID);
        $first_name = \request('first_name');
        $second_name = \request('second_name');
        $first_name_huri = \request('first_name_huri');
        $second_name_huri = \request('second_name_huri');
        $email = \request('email');
        $mobile = \request('mobile');
        $pw = \request('password');
        $userModel = new UserModel();
        $userModel -> updateUser($user_id, $first_name, $second_name, $first_name_huri, $second_name_huri, $email, $mobile, $pw);
        $this->sendMail($user_id, $email, '', 'modify', $first_name);
        return response()->json([
            'status' => true,
        ]);
    }
    public function exitPage() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);
        $pw = $user->password;
        $lpw = strlen($pw);
        return view('test/parent/exit', [
            'user'  => $user,
            'lpw' => $lpw,
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function exitCompletePage(Request $request) {
        $rate = \request('radio_reason');
        $reason = \request('limit-length');
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $userModel -> addExit($user_id, $reason, $rate);
        $userModel -> updateExit($user_id);
        session()->forget(SESS_UID);
        return view('test/parent/exit-complete', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function cancelPage() {
        return view('test/parent/cancel', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function cancelCompletePage(Request $request) {
        return view('test/parent/cancel-complete', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }

    public function showQListPage() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();
        $cityListStr = \request('cityList');
        $typeListStr = \request('typeList');
        $tagListStr = \request('tagList');
        $kind = \request('kind');
        $currentPage = 1;
        $prefecture_id = 21;
        $perPage = 10;
        $search = \request('search');
        $gardenList = $schoolModel -> getGardenList($cityListStr, $typeListStr, $tagListStr, $search, $kind, $prefecture_id);
        $total = count($gardenList);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);
        $gardenIdList = [];


        foreach ($gardenList as $garden) {
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);

            $garden -> typeList = $typeList;

            array_push($gardenIdList, $garden -> garden_id);
        }

        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }


        return view('test/parent/question-list', [
            'gardenList' => $gardenList,
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }


    public function showFListPage() {
        return view('test/parent/favourite-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showSearchListPage() {
        return view('test/parent/search-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showEventListPage() {
        return view('test/parent/event-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showMailListPage() {
        return view('test/parent/mail-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showBlogListPage() {
        return view('test/parent/blog-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showWebListPage() {
        return view('test/parent/web-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showDataListPage() {
        return view('test/parent/data-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showHotLinePage() {
        return view('test/parent/hot-line', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showPersonalChatPage() {
        return view('test/parent/personal-chat', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function getFListItem() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $gardenList = $schoolModel -> getFavouriteGardenList($user_id, $order);

        $total = count($gardenList);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);
        $gardenIdList = [];

        foreach ($gardenList as $garden) {
            $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
            $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);
            $garden->favourite_date = str_replace('-', '.', $garden->favourite_date);
            if(count($keywordList) == 0) {
                $keywordList = [];
            } else {
                $isBreak = false;
                $breakKeyword = null;
                foreach($keywordList as $keyword) {
                    if($keyword -> keyword_id == 1) {
                        $breakKeyword = $keyword;
                        $isBreak = true;
                    }
                }
                if($isBreak == true) {
                    $keywordList = [];
                    array_push($keywordList, $breakKeyword);
                }
            }
            if(count($imgList) == 0) {
                $imgList = [];
            }
            $garden -> keywordList = $keywordList;
            $imgList = json_decode(json_encode($imgList), true);
            $garden -> typeList = $typeList;
            if(count($imgList) > 0) {
                $garden -> imgInfo = $imgList[0];
            } else {
                $garden -> imgInfo = [];
            }

            array_push($gardenIdList, $garden -> garden_id);
        }

        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }


        return view('test/parent/favourite-list-item', [
            'gardenList' => $gardenList,
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'login' => 'none',
            'end' => $end,
        ]);
    }
    public function getSListItem() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $gardenList = $schoolModel -> getFavouriteGardenList($user_id, $order);

        $total = count($gardenList);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);
        $gardenIdList = [];

        foreach ($gardenList as $garden) {
            $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
            $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);
            $garden->favourite_date = str_replace('-', '.', $garden->favourite_date);

            if(count($keywordList) == 0) {
                $keywordList = [];
            } else {
                $isBreak = false;
                $breakKeyword = null;
                foreach($keywordList as $keyword) {
                    if($keyword -> keyword_id == 1) {
                        $breakKeyword = $keyword;
                        $isBreak = true;
                    }
                }
                if($isBreak == true) {
                    $keywordList = [];
                    array_push($keywordList, $breakKeyword);
                }
            }
            if(count($imgList) == 0) {
                $imgList = [];
            }
            $garden -> keywordList = $keywordList;
            $imgList = json_decode(json_encode($imgList), true);
            $garden -> typeList = $typeList;
            if(count($imgList) > 0) {
                $garden -> imgInfo = $imgList[0];
            } else {
                $garden -> imgInfo = [];
            }

            array_push($gardenIdList, $garden -> garden_id);
        }

        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }


        return view('test/parent/search-list-item', [
            'gardenList' => $gardenList,
            'total' => $total,
            'login' => 'none',
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }
    public function getEventListItem() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $gardenList = $schoolModel -> getFavouriteGardenList($user_id, $order);

        $total = count($gardenList);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);
        $gardenIdList = [];

        foreach ($gardenList as $garden) {
            $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
            $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);

            if(count($keywordList) == 0) {
                $keywordList = [];
            } else {
                $isBreak = false;
                $breakKeyword = null;
                foreach($keywordList as $keyword) {
                    if($keyword -> keyword_id == 1) {
                        $breakKeyword = $keyword;
                        $isBreak = true;
                    }
                }
                if($isBreak == true) {
                    $keywordList = [];
                    array_push($keywordList, $breakKeyword);
                }
            }
            if(count($imgList) == 0) {
                $imgList = [];
            }
            $garden -> keywordList = $keywordList;
            $imgList = json_decode(json_encode($imgList), true);
            $garden -> typeList = $typeList;
            if(count($imgList) > 0) {
                $garden -> imgInfo = $imgList[0];
            } else {
                $garden -> imgInfo = [];
            }

            array_push($gardenIdList, $garden -> garden_id);
        }

        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }


        return view('test/parent/event-list-item', [
            'gardenList' => $gardenList,
            'login' => 'none',
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }
    public function getMailListItem() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $gardenList = $schoolModel -> getFavouriteGardenList($user_id, $order);

        $total = count($gardenList);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);
        $gardenIdList = [];

        foreach ($gardenList as $garden) {
            $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
            $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);

            if(count($keywordList) == 0) {
                $keywordList = [];
            } else {
                $isBreak = false;
                $breakKeyword = null;
                foreach($keywordList as $keyword) {
                    if($keyword -> keyword_id == 1) {
                        $breakKeyword = $keyword;
                        $isBreak = true;
                    }
                }
                if($isBreak == true) {
                    $keywordList = [];
                    array_push($keywordList, $breakKeyword);
                }
            }
            if(count($imgList) == 0) {
                $imgList = [];
            }
            $garden -> keywordList = $keywordList;
            $imgList = json_decode(json_encode($imgList), true);
            $garden -> typeList = $typeList;
            if(count($imgList) > 0) {
                $garden -> imgInfo = $imgList[0];
            } else {
                $garden -> imgInfo = [];
            }

            array_push($gardenIdList, $garden -> garden_id);
        }

        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }


        return view('test/parent/mail-list-item', [
            'gardenList' => $gardenList,
            'login' => 'none',
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }
    public function getBlogListItem() {
        $user_id = session()->get(SESS_UID);
        $schoolModel = new SchoolModel();
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $gardenList = $schoolModel -> getFavouriteGardenList($user_id, $order);
        $reviewList = $schoolModel -> getReviewByUserId($user_id);
        foreach ($reviewList as $review){
            $relation_type = $review->relation_type;
            $relation_value = $review->relation_value;

            if($relation_type == '1'){
                $relation_text = $relation_value . ' / 保護者';
            }
            elseif ($relation_type == '2'){
                $relation_text = $relation_value . '卒園 / 保護者';
            }
            elseif ($relation_type == '3') {
                $relation_text = $relation_value . '卒園 / 本人';
            }
            elseif($relation_type == '4'){
                $relation_text = $relation_value . '在校 / 保護者';
            }
            elseif($relation_type == '5'){
                $relation_text = $relation_value . '卒業 / 保護者';
            }
            elseif ($relation_type == '6'){
                $relation_text = $relation_value . '卒業 / 本人';
            }
            elseif($relation_type == '7'){
                $relation_text = $relation_value;
            }
            $review->relation_text = $relation_text;
            $review->image = $schoolModel->getReviewImage($review->id);
            $review->reflect = $schoolModel->getReviewReflect($review->id);
            $garden = $schoolModel->getGardenInfoById($review->garden_id);
            $review->garden = $garden[0];
        }

        $total = count($reviewList);
        $start = ($currentPage - 1) * $perPage;
        $reviewList = array_slice($reviewList, $start, $perPage);
        $gardenIdList = [];

        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }


        return view('test/parent/blog-list-item', [

            'reviewList' => $reviewList,
            'login' => 'none',
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }
    public function getWebListItem() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $gardenList = $schoolModel -> getFavouriteGardenList($user_id, $order);

        $total = count($gardenList);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);
        $gardenIdList = [];

        foreach ($gardenList as $garden) {
            $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
            $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);
            $garden->favourite_date = str_replace('-', '.', $garden->favourite_date);
            if(count($keywordList) == 0) {
                $keywordList = [];
            } else {
                $isBreak = false;
                $breakKeyword = null;
                foreach($keywordList as $keyword) {
                    if($keyword -> keyword_id == 1) {
                        $breakKeyword = $keyword;
                        $isBreak = true;
                    }
                }
                if($isBreak == true) {
                    $keywordList = [];
                    array_push($keywordList, $breakKeyword);
                }
            }
            if(count($imgList) == 0) {
                $imgList = [];
            }
            $garden -> keywordList = $keywordList;
            $imgList = json_decode(json_encode($imgList), true);
            $garden -> typeList = $typeList;
            if(count($imgList) > 0) {
                $garden -> imgInfo = $imgList[0];
            } else {
                $garden -> imgInfo = [];
            }

            array_push($gardenIdList, $garden -> garden_id);
        }

        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }


        return view('test/parent/web-list-item', [
            'gardenList' => $gardenList,
            'login' => 'none',
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }
    public function getDataListItem() {
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $gardenList = $schoolModel -> getFavouriteGardenList($user_id, $order);

        $total = count($gardenList);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);
        $gardenIdList = [];

        foreach ($gardenList as $garden) {
            $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
            $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);
            $garden->favourite_date = str_replace('-', '.', $garden->favourite_date);
            if(count($keywordList) == 0) {
                $keywordList = [];
            } else {
                $isBreak = false;
                $breakKeyword = null;
                foreach($keywordList as $keyword) {
                    if($keyword -> keyword_id == 1) {
                        $breakKeyword = $keyword;
                        $isBreak = true;
                    }
                }
                if($isBreak == true) {
                    $keywordList = [];
                    array_push($keywordList, $breakKeyword);
                }
            }
            if(count($imgList) == 0) {
                $imgList = [];
            }
            $garden -> keywordList = $keywordList;
            $imgList = json_decode(json_encode($imgList), true);
            $garden -> typeList = $typeList;
            if(count($imgList) > 0) {
                $garden -> imgInfo = $imgList[0];
            } else {
                $garden -> imgInfo = [];
            }

            array_push($gardenIdList, $garden -> garden_id);
        }

        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }


        return view('test/parent/data-list-item', [
            'gardenList' => $gardenList,
            'login' => 'none',
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }

    public function showChildListPage() {
        $user_id = session()->get(SESS_UID);
        $schoolModel = new SchoolModel();
        $userModel = new UserModel();
        $children = $userModel->getChildByUserId($user_id);
        $constChildArr = ['第一子', '第二子', '第三子', '第四子', '第五子', '第六子', '第七子', '第八子', '第九子', '第十子', '第十一子', '第十二子'];
        foreach($children as $index => $child) {
            $child -> title = $constChildArr[$index];
            $child_id = $child->id;
            $gardenList = $schoolModel -> getChildGardenList($child_id);
            $child->gardenList = $gardenList;
            $gardenIdList = [];

            $gardenFavouriteList = array();
            $user_id = session()->get(SESS_UID);
            if(isset($user_id)){
                $gardenFavouriteListTmp = $schoolModel->getGardenFavourite($user_id);
                foreach($gardenFavouriteListTmp as $garden){
                    array_push($gardenFavouriteList, $garden->garden_id);
                }
            }

            foreach ($gardenList as $garden) {
                $tagList = $schoolModel -> getTagList($garden -> garden_id);
                $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);

                $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
                $typeList = $schoolModel -> getTypeList($garden -> garden_id);

                if(count($tagList) == 0) {
                    $tagList = [];
                }
                if(count($keywordList) == 0) {
                    $keywordList = [];
                } else {
                    $isBreak = false;
                    $breakKeyword = null;
                    foreach($keywordList as $keyword) {
                        if($keyword -> keyword_id == 1) {
                            $breakKeyword = $keyword;
                            $isBreak = true;
                        }
                    }
                    if($isBreak == true) {
                        $keywordList = [];
                        array_push($keywordList, $breakKeyword);
                    }
                }
                if(count($imgList) == 0) {
                    $imgList = [];
                }
                $garden -> tagList = $tagList;
                $garden -> keywordList = $keywordList;

                $imgList = json_decode(json_encode($imgList), true);
                $garden -> typeList = $typeList;

                if(in_array($garden->garden_id, $gardenFavouriteList)){
                    $garden->favourite = 1;
                }
                else{
                    $garden->favourite = 0;
                }
                if(count($imgList) > 0) {
                    $garden -> imgInfo = $imgList[0];
                } else {
                    $garden -> imgInfo = [];
                }

                array_push($gardenIdList, $garden -> garden_id);
            }
        }

        return view('test/parent/children-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'children' => $children,
        ]);
    }


    public function adminSignIn() {
        $name = \request('name');
        $password = \request('password');
        $userModel = new UserModel();

        $user = $userModel -> getAdminUserByEmail($name, $password);
        if($user == null) {
            return response()->json([
                'status' => false
            ]);
        }


        session()->put(SESS_UID,        $user->id);
        session()->put(SESS_GARDEN_ID,        $user->garden_id);
        session()->put(SESS_USER_ID,        $user->user_id);
        session()->put(SESS_USERNAME,        $user->first_name);
        return response()->json([
            'status' => true,
        ]);


    }

    public function logout()
    {
        session()->forget(SESS_UID);
        return response()->json([
            'status' => true,
        ]);
    }
    public function adminLogout()
    {
        session()->forget(SESS_UID);
        session()->forget(SESS_GARDEN_ID);
        session()->forget(SESS_USER_ID);
        return response()->json([
            'status' => true,
        ]);
    }

    public function registerNormal()
    {

        return view('test/login/register-normal', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function registerNormalConfirm() {
        $job = \request('job');
        $first_name = \request('first_name');
        $second_name = \request('second_name');
        $first_name_huri = \request('first_name_huri');
        $second_name_huri = \request('second_name_huri');
        $gender = \request('gender');
        $old = \request('old');
        $date_year =  \request('date_year');
        $date_month =  \request('date_month');
        $date_day =  \request('date_day');
        if(!empty($date_day) && !empty($date_month) && !empty($date_year)){
            $date = $date_year . '-' . $date_month . '-' . $date_day;
            $bir = $date_year . '年' . $date_month . '月' . $date_day . '日';
        }
        else{
            $date = '0000-00-00';
            $bir = '';
        }

        $post_code = \request('post_code');
        $city = \request('city');
        $address = \request('address');
        $mobile = \request('mobile');
        $email = \request('email');

        $genderArray = ['', '女性', '男性', '無回答'];
        $oldArray = ['', '10代', '20代', '30代', '40代', '50代', '60代'];


        return view('test/login/register-normal-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'job' => $job,
            'first_name' => $first_name,
            'second_name' => $second_name,
            'first_name_huri' => $first_name_huri,
            'second_name_huri' => $second_name_huri,
            'gender' => $genderArray[$gender],
            'genderIndex' => $gender,
            'old' => $oldArray[$old],
            'oldIndex' => $old,
            'date' => $date,
            'bir' => $bir,
            'post_code' => $post_code,
            'city' => $city,
            'address' => $address,
            'mobile' => $mobile,
            'email' => $email,

        ]);
    }

    public function registerGarden() {
        $type = \request('type');
        $typeArr = ['保育士の方', '幼稚園教員の方', '園長先生', 'オーナーの方', '学校教員の方', '学校運営者の方', '学校広報の方', '塾･スクール講師の方', '塾･スクール運営者の方'];
        $typeStr = $typeArr[$type - 1];
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        return view('test/login/register-garden', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'type' => $typeStr,
            'typeIndex' => $type,
            'prefectures' => $prefectureList
        ]);
    }

    public function registerGardenConfirm() {
        $type = \request('type');
        $facility_name = \request('facility_name');
        $facility_name_second = \request('facility_name_second');
        $facility_post = \request('facility_post');
        //$facility_address = \request('facility_address');
        $facility_prefecture = \request('facility_prefecture');
        $facility_city = \request('facility_city');
        $facility_address = \request('facility_address');
        $facility_mobile = \request('facility_mobile');
        $facility_url = \request('facility_url');

        $first_name = \request('first_name');
        $second_name = \request('second_name');
        $first_name_huri = \request('first_name_huri');
        $second_name_huri = \request('second_name_huri');
        $gender = \request('gender');
        $old = \request('old');
        $date_year =  \request('date_year');
        $date_month =  \request('date_month');
        $date_day =  \request('date_day');
        if(!empty($date_day) && !empty($date_month) && !empty($date_year)){
            $date = $date_year . '-' . $date_month . '-' . $date_day;
            $bir = $date_year . '年' . $date_month . '月' . $date_day . '日';
        }
        else{
            $date = '0000-00-00';
            $bir = '';
        }
        $post_code = \request('post_code');
        $city = \request('city');
        $address = \request('address');
        $mobile = \request('mobile');
        $email = \request('email');

        $genderArray = ['', '女性', '男性', '無回答'];
        $oldArray = ['', '10代', '20代', '30代', '40代', '50代', '60代'];
        $typeArr = ['', '保育士の方', '幼稚園教員の方', '園長先生', 'オーナーの方', '学校教員の方', '学校運営者の方', '学校広報の方', '塾･スクール講師の方', '塾･スクール運営者の方'];
        $typeStr = $typeArr[$type];
        return view('test/login/register-garden-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'typeIndex'  => $type,
            'type'  => $typeStr,
            'facility_name' => $facility_name,
            'facility_name_second' => $facility_name_second,
            'facility_post' => $facility_post,
            'facility_address' => $facility_address,
            'facility_prefecture' => $facility_prefecture,
            'facility_city' => $facility_city,
            'facility_mobile' => $facility_mobile,
            'facility_url' => $facility_url,
            'first_name' => $first_name,
            'second_name' => $second_name,
            'first_name_huri' => $first_name_huri,
            'second_name_huri' => $second_name_huri,
            'gender' => $genderArray[$gender],
            'genderIndex' => $gender,
            'old' => $oldArray[$old],
            'oldIndex' => $old,
            'date' => $date,
            'bir' => $bir,
            'post_code' => $post_code,
            'city' => $city,
            'address' => $address,
            'mobile' => $mobile,
            'email' => $email,
        ]);
    }

    public function registerPublic()
    {
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        return view('test/login/register-public', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList
        ]);
    }

    public function registerPublicConfirm() {

        $garden_info = \request('garden_info');

        $first_name = \request('first_name');
        $second_name = \request('second_name');
        $first_name_huri = \request('first_name_huri');
        $second_name_huri = \request('second_name_huri');
        $gender = \request('gender');

        $date_year =  \request('date_year');
        $date_month =  \request('date_month');
        $date_day =  \request('date_day');
        if(!empty($date_day) && !empty($date_month) && !empty($date_year)){
            $date = $date_year . '-' . $date_month . '-' . $date_day;
            $bir = $date_year . '年' . $date_month . '月' . $date_day . '日';
        }
        else{
            $date = '0000-00-00';
            $bir = '';
        }
        $post_code = \request('post_code');
        $city = \request('city');
        $address = \request('address');
        $mobile = \request('mobile');
        $email = \request('email');


        $genderArray = ['', '女性', '男性', '無回答'];

        $gardenDetails = json_decode($garden_info);

        $schoolModel = new SchoolModel();


            $oldInfo = $gardenDetails -> old;
            $curInfo = $gardenDetails -> cur;
            foreach($oldInfo as $oldSchool) {
                $garden_id = $oldSchool -> id;
                $gardenDetail = $schoolModel -> getGardenInfoById($garden_id);
                $oldSchool -> info = $gardenDetail[0];
                $typeList = $schoolModel -> getTypeList($garden_id);
                $oldSchool -> info -> typeList = $typeList;
            }

            foreach($curInfo as $curSchool) {
                $garden_id = $curSchool -> id;
                $gardenDetail = $schoolModel -> getGardenInfoById($garden_id);
                $curSchool -> info = $gardenDetail[0];
                $typeList = $schoolModel -> getTypeList($garden_id);
                $curSchool -> info -> typeList = $typeList;
            }


        return view('test/login/register-public-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden_info'  => $garden_info,
            'garden_details' => $gardenDetails,
            'first_name' => $first_name,
            'second_name' => $second_name,
            'first_name_huri' => $first_name_huri,
            'second_name_huri' => $second_name_huri,
            'gender' => $genderArray[$gender],
            'genderIndex' => $gender,
            'date' => $date,
            'bir' => $bir,
            'post_code' => $post_code,
            'city' => $city,
            'address' => $address,
            'mobile' => $mobile,
            'email' => $email,
        ]);
    }

    public function registerParent()
    {

        return view('test/login/register-parent', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],


        ]);
    }


    public function registerParentConfirm() {
        $first_name = \request('first_name');
        $second_name = \request('second_name');
        $first_name_huri = \request('first_name_huri');
        $second_name_huri = \request('second_name_huri');
        $gender = \request('gender');
        $old = \request('old');
        $date_year =  \request('date_year');
        $date_month =  \request('date_month');
        $date_day =  \request('date_day');
        if(!empty($date_day) && !empty($date_month) && !empty($date_year)){
            $date = $date_year . '-' . $date_month . '-' . $date_day;
            $bir = $date_year . '年' . $date_month . '月' . $date_day . '日';
        }
        else{
            $date = '0000-00-00';
            $bir = '';
        }
        $post_code = \request('post_code');
        $city = \request('city');
        $address = \request('address');
        $mobile = \request('mobile');
        $email = \request('email');
        $genderArray = ['', '女性', '男性', '無回答'];
        $oldArray = ['', '10代', '20代', '30代', '40代', '50代', '60代'];
        return view('test/login/register-parent-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'first_name' => $first_name,
            'second_name' => $second_name,
            'first_name_huri' => $first_name_huri,
            'second_name_huri' => $second_name_huri,
            'gender' => $genderArray[$gender],
            'genderIndex' => $gender,
            'old' => $oldArray[$old],
            'oldIndex' => $old,
            'date' => $date,
            'bir' => $bir,
            'post_code' => $post_code,
            'city' => $city,
            'address' => $address,
            'mobile' => $mobile,
            'email' => $email,
        ]);
    }

    public function registerRepublic() {
        return view('test/login/register-republic', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],


        ]);
    }

    public function postReview($garden_id){
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);

        $schoolModel = new SchoolModel();
        $gardenDetail = $schoolModel -> getGardenInfoById($garden_id);
        $typeList = $schoolModel -> getTypeList($garden_id);
        $gardenDetail[0] -> typeList = $typeList;
        return view('test/review/post-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,
            'gardenDetail' => $gardenDetail
        ]);
    }
    public function modifyReview($review_id){
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();

        $user = $userModel -> getUserById($user_id);
        $review = $schoolModel -> getReviewByReviewId($review_id);
        $garden_id = $review[0]->garden_id;
        $gardenDetail = $schoolModel->getGardenInfoById($garden_id);
        $image = $schoolModel->getReviewImage($review_id);

        return view('test/review/modify-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,
            'review' => $review,
            'garden_id' => $garden_id,
            'review_id' => $review_id,
            'gardenDetail' => $gardenDetail,
            'image' => $image,
        ]);
    }
    public function deleteReview($review_id){
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $garden_id = \request('garden_id');
        if($garden_id == null){
            $garden_id = 1;
        }
        $user = $userModel -> getUserById($user_id);
        return view('test/review/delete-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,
            'review_id' => $review_id
        ]);
    }
    public function requireDelete($review_id){
        $post_user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();


        $review = $schoolModel -> getReviewByReviewId($review_id);
        $review = $review[0];
        $relation_type = $review->relation_type;
        $relation_value = $review->relation_value;

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('test/review/require-delete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'user' => $user,
            'review' => $review,
            'post_user_id' => $post_user_id,
        ]);
    }
    public function requireView(){
        $post_user_id = \request('post_user_id');
        $review_id = \request('review_id');
        $reason =\request('limit-length');
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();


        $review = $schoolModel -> getReviewByReviewId($review_id);
        $review = $review[0];
        $relation_type = $review->relation_type;
        $relation_value = $review->relation_value;

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('test/review/require-view', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'user' => $user,
            'review' => $review,
            'reason' => $reason,
            'post_user_id' => $post_user_id,
        ]);
    }
    public function requireConfirm(){
        $post_user_id = \request('post_user_id');
        $review_id = \request('review_id');
        $reason =\request('reason');


        return view('test/review/require-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'review_id' => $review_id,
            'post_user_id' => $post_user_id,
            'reason' => $reason,

        ]);
    }
    public function requireFinish(){
        $post_user_id = \request('post_user_id');
        $review_id = \request('review_id');
        $reason =\request('reason');

        return view('test/review/require-finish', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'post_user_id' => $post_user_id,
        ]);
    }

    public function replayReview($review_id){
        $post_user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();


        $review = $schoolModel -> getReviewByReviewId($review_id);
        $review = $review[0];
        $relation_type = $review->relation_type;
        $relation_value = $review->relation_value;

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('test/review/replay-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'user' => $user,
            'review' => $review,
            'post_user_id' => $post_user_id,
        ]);
    }
    public function replayView(){
        $post_user_id = \request('post_user_id');
        $review_id = \request('review_id');
        $replay =\request('limit-length');
        $profile = \request('radio_accept');
        $post_order = \request('post_order');
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();


        $review = $schoolModel -> getReviewByReviewId($review_id);
        $review = $review[0];
        $relation_type = $review->relation_type;
        $relation_value = $review->relation_value;

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('test/review/replay-view', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'user' => $user,
            'review' => $review,
            'replay' => $replay,
            'post_user_id' => $post_user_id,
            'profile' => $profile,
            'post_order' => $post_order,
        ]);
    }
    public function replayFinish(){
        $post_user_id = \request('post_user_id');
        $review_id = \request('review_id');
        $replay =\request('replay');
        $profile = \request('profile');
        $post_order = \request('post_order');

        $schoolModel = new SchoolModel();
        $schoolModel-> addReviewReflect($review_id, $post_user_id, $post_order, $replay, $profile);

        return view('test/review/replay-finish', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'post_user_id' => $post_user_id,
        ]);
    }

    public function schoolReview($review_id){
        $post_user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();

        $review = $schoolModel -> getReviewByReviewId($review_id);
        $review = $review[0];
        $garden_id = $review->garden_id;
        $garden = $schoolModel->getGardenInfoById($garden_id);
        $garden = $garden[0];
        $relation_type = $review->relation_type;
        $relation_value = $review->relation_value;

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $review->reflect = $schoolModel->getReviewReflect($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('test/review/school-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'user' => $user,
            'review' => $review,
            'post_user_id' => $post_user_id,
            'garden' => $garden
        ]);
    }
    public function schoolView(){
        $post_user_id = \request('post_user_id');
        $review_id = \request('review_id');
        $replay =\request('limit-length');
        $profile = \request('radio_accept');
        $post_order = \request('post_order');
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();

        $review = $schoolModel -> getReviewByReviewId($review_id);
        $review = $review[0];
        $garden_id = $review->garden_id;
        $garden = $schoolModel->getGardenInfoById($garden_id);
        $garden = $garden[0];
        $relation_type = $review->relation_type;
        $relation_value = $review->relation_value;

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $review->reflect = $schoolModel->getReviewReflect($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('test/review/school-view', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'user' => $user,
            'review' => $review,
            'replay' => $replay,
            'post_user_id' => $post_user_id,
            'profile' => $profile,
            'post_order' => $post_order,
            'garden' => $garden,
        ]);
    }
    public function schoolFinish(){
        $post_user_id = \request('post_user_id');
        $review_id = \request('review_id');
        $replay =\request('replay');
        $profile = \request('profile');
        $post_order = \request('post_order');

        $schoolModel = new SchoolModel();
        $schoolModel-> addReviewReflect($review_id, $post_user_id, $post_order, $replay, $profile);
        $schoolModel->updateReviewReflectProfile($review_id, $profile);

        return view('test/review/replay-finish', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'post_user_id' => $post_user_id,
        ]);
    }

    public function userReview($review_id){
        $post_user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();

        $review = $schoolModel -> getReviewByReviewId($review_id);
        $review = $review[0];
        $garden_id = $review->garden_id;
        $garden = $schoolModel->getGardenInfoById($garden_id);
        $garden = $garden[0];

        $relation_type = $review->relation_type;
        $relation_value = $review->relation_value;

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $review->reflect = $schoolModel->getReviewReflect($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('test/review/user-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'user' => $user,
            'review' => $review,
            'post_user_id' => $post_user_id,
            'garden' => $garden
        ]);
    }
    public function userView(){
        $post_user_id = \request('post_user_id');
        $review_id = \request('review_id');
        $replay =\request('limit-length');
        $post_order = \request('post_order');
        $userModel = new UserModel();
        $schoolModel = new SchoolModel();

        $review = $schoolModel -> getReviewByReviewId($review_id);
        $review = $review[0];
        $garden_id = $review->garden_id;
        $garden = $schoolModel->getGardenInfoById($garden_id);
        $garden = $garden[0];
        $relation_type = $review->relation_type;
        $relation_value = $review->relation_value;

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $review->reflect = $schoolModel->getReviewReflect($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('test/review/user-view', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'user' => $user,
            'review' => $review,
            'replay' => $replay,
            'post_user_id' => $post_user_id,
            'post_order' => $post_order,
            'garden' => $garden,
        ]);
    }
    public function userFinish(){
        $post_user_id = \request('post_user_id');
        $review_id = \request('review_id');
        $replay =\request('replay');
        $post_order = \request('post_order');

        $schoolModel = new SchoolModel();
        $schoolModel-> addReviewReflect($review_id, $post_user_id, $post_order, $replay, '0');

        return view('test/review/user-finish', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'post_user_id' => $post_user_id,
        ]);
    }

    public function warnToAdmin($garden_id, $review_id){

        $schoolModel = new SchoolModel();
        $relateTypeList = $schoolModel -> getTypeList($garden_id);
        $garden = $schoolModel -> getGardenInfoById($garden_id);
        $garden = $garden[0];
        $garden->typeList = $relateTypeList;

        return view('test/review/warn-admin', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'review_id' => $review_id,
            'garden' => $garden,
        ]);
    }
    public function warnFinish(){

        $garden_id = \request('garden_id');
        $schoolModel = new SchoolModel();
        $review_id = \request('review_id');
        $relateTypeList = $schoolModel -> getTypeList($garden_id);
        $garden = $schoolModel -> getGardenInfoById($garden_id);
        $garden = $garden[0];
        $garden->typeList = $relateTypeList;

        return view('test/review/finish-warn', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
        ]);
    }
    public function deleteFinishReview(){

        $review_id = \request('review_id');
        $schoolModel = new SchoolModel();
        $schoolModel->deleteReview($review_id);

        return view('test/review/finish-delete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'review_id' => $review_id
        ]);
    }
    public function changeStarReview(){
        $review_id = \request('review_id');
        $type = \request('type');
        $schoolModel = new SchoolModel();
        $review = $schoolModel -> getReviewByReviewId($review_id);

        $attention = $review[0]->attention;
        $help = $review[0]->help;
        if($type == 'attention'){
            $attention += 1;
            $schoolModel -> updateReviewAttention($review_id, $attention);
        }
        else{
            $help += 1;
            $schoolModel -> updateReviewHelp($review_id, $help);
        }

        return response()->json([
            'status' => true,
        ]);
    }
    public function postConfirm(){
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);
        return view('test/review/confirm-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,

        ]);
    }

    public function postToConfirm(Request $request){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $user_id = \request('user_id');
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);
        $garden_id_tmp = \request('garden_id');
        $gardenDetail = $schoolModel -> getGardenInfoById($garden_id_tmp);
        $img_caption_index = \request('img_caption_index');
        $post_nickname = \request('post_nickname');
        $nick_name = '';
        $post_name = '';
        $post_user_name = '';
        if($img_caption_index === '1'){
            $nick_name = $post_nickname;
            $post_user_name = $nick_name;
        }
        else{
            $post_name = $user->first_name . $user->second_name;
            $post_user_name = $post_name;
        }

        $rate = array();
        $sum = 0;
        for($i = 0; $i < 8; $i++){
            $tmp = array();
            $rate_value = \request('rate' . ($i+1));
            $rate_value = str_replace('rating :', '', $rate_value);

            $tmp['rate'] = (float)$rate_value;
            $tmp['rate_text'] = \request('rate' . ($i+1).'_text');
            $sum += $tmp['rate'];
            array_push($rate, $tmp);
        }

        $total_rate = floor($sum/8*10) /10;
        $total_text = \request('rate_text');
        $title = \request('title');


        $profile_img_setting = \request('img_public_index');
        $relation_type = \request('garden_rel_index');
        $relation_value = \request('rel_' . $relation_type);

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }

        $image = array();
        for($i = 1; $i <= 3; $i++){


            $file = $this->saveBasicImage($request, 'image-content'.$i, 'garden/');
            Log::info("File name is ".$file.".");
            if(!empty($file)) {

                $tmp = array();
                $tmp['url'] = $file;

                $img_public = \request('image' . $i . '_public');
                $img_caption = \request('img' . $i . '_caption');
                $tmp['img_public'] = $img_public;
                $tmp['caption'] = $img_caption;
                array_push($image, $tmp);
                //$imgId = $schoolModel -> addGardenImgDetail($garden_id_tmp, $file, $img_caption, '', 14);
            }
        }

        $time = Date('Y/m/d');

        $prefectureList = $homeModel -> getAllPrefecture();

        return view('test/review/confirm-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,
            'garden_id' => $garden_id_tmp,
            'user_id' => $user_id,
            'post_name' => $post_name,
            'nick_name' => $nick_name,
            'profile_img_setting' => $profile_img_setting,
            'relation_type' => $relation_type,
            'relation_value' => $relation_value,
            'rate' => $rate,
            'total_rate' => $total_rate,
            'total_text' => $total_text,
            'title' => $title,
            'image' => $image,
            'post_user_name' => $post_user_name,
            'relation_text' => $relation_text,
            'time' => $time,
            'gardenDetail' => $gardenDetail,


        ]);
    }
    public function modifyReviewConfirm(Request $request){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $user_id = \request('user_id');
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);
        $garden_id_tmp = \request('garden_id');
        $review_id = \request('review_id');
        $gardenDetail = $schoolModel -> getGardenInfoById($garden_id_tmp);
        $img_caption_index = \request('img_caption_index');
        $post_nickname = \request('post_nickname');
        $nick_name = '';
        $post_name = '';
        $post_user_name = '';
        if($img_caption_index === '1'){
            $nick_name = $post_nickname;
            $post_user_name = $nick_name;
        }
        else{
            $post_name = $user->first_name . $user->second_name;
            $post_user_name = $post_name;
        }

        $rate = array();
        $sum = 0;
        for($i = 0; $i < 8; $i++){
            $tmp = array();
            $rate_value = \request('rate' . ($i+1));
            $rate_value = str_replace('rating :', '', $rate_value);

            $tmp['rate'] = (float)$rate_value;
            $tmp['rate_text'] = \request('rate' . ($i+1).'_text');
            $sum += $tmp['rate'];
            array_push($rate, $tmp);
        }

        $total_rate = floor($sum/8*10) /10;
        $total_text = \request('rate_text');
        $title = \request('title');


        $profile_img_setting = \request('img_public_index');
        $relation_type = \request('garden_rel_index');
        $relation_value = \request('rel_' . $relation_type);

        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
        }

        $image = array();
        for($i = 1; $i <= 3; $i++){


            $file = $this->saveBasicImage($request, 'image-content'.$i, 'garden/');
            Log::info("File name is ".$file.".");
            if(!empty($file)) {

                $tmp = array();
                $tmp['url'] = $file;

                $img_public = \request('image' . $i . '_public');
                $img_caption = \request('img' . $i . '_caption');
                $tmp['img_public'] = $img_public;
                $tmp['caption'] = $img_caption;
                array_push($image, $tmp);
                //$imgId = $schoolModel -> addGardenImgDetail($garden_id_tmp, $file, $img_caption, '', 14);
            }
            else{
                $img_src = \request('img_src_' . $i);
                if($img_src){
                    $tmp = array();
                    $tmp['url'] = $img_src;

                    $img_public = \request('image' . $i . '_public');
                    $img_caption = \request('img' . $i . '_caption');
                    $tmp['img_public'] = $img_public;
                    $tmp['caption'] = $img_caption;
                    array_push($image, $tmp);
                }
            }
        }

        $time = Date('Y/m/d');

        $prefectureList = $homeModel -> getAllPrefecture();

        return view('test/review/modify-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,
            'garden_id' => $garden_id_tmp,
            'user_id' => $user_id,
            'post_name' => $post_name,
            'nick_name' => $nick_name,
            'profile_img_setting' => $profile_img_setting,
            'relation_type' => $relation_type,
            'relation_value' => $relation_value,
            'rate' => $rate,
            'total_rate' => $total_rate,
            'total_text' => $total_text,
            'title' => $title,
            'image' => $image,
            'post_user_name' => $post_user_name,
            'relation_text' => $relation_text,
            'time' => $time,
            'review_id' => $review_id,
            'gardenDetail' => $gardenDetail,


        ]);
    }

    public function postFinish(){
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $garden_id = \request('garden_id');
        $user = $userModel -> getUserById($user_id);
        return view('test/review/finish-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,

        ]);
    }
    public function modifyFinish(){
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);

        $garden_id = \request('garden_id');
        $review_id = \request('review_id');
        $user_id = \request('user_id');
        $post_name = \request('post_name');
        $nick_name = \request('nick_name');
        $profile_img_setting = \request('profile_img_setting');
        $relation_type = \request('relation_type');
        $relation_value = \request('relation_value');
        $rate = \request('rate');
        $rate = json_decode($rate);
        $image = \request('image');
        $image = json_decode($image);
        $garden_model = new SchoolModel();

        $img = array();
        $total_rate = \request('total_rate');
        $total_text = \request('total_text');
        $title = \request('title');
        $up_date =  Date('Y/m/d');;


        $garden_model->updateGardenReviewDetail($review_id, $garden_id, $user_id, $post_name, $nick_name, $profile_img_setting, $relation_type, $relation_value,
            $rate, $total_rate, $total_text, $title, $up_date, $img);
        $garden_model->deleteReviewImage($review_id);
        $garden_model->deleteGardenReviewImgDetail($garden_id);
        foreach ($image as $item){
            $imgId = $garden_model->addGardenImgDetail($garden_id, $item->url, $item->caption, '', 14);
            $garden_model -> addReviewImage($imgId, $review_id, $item->img_public);
        }


        return view('test/review/finish-modify', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,
            'garden_id' => $garden_id,

        ]);
    }
    public function postToFinish(Request $request){
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);

        $garden_id = \request('garden_id');
        $user_id = \request('user_id');
        $post_name = \request('post_name');
        $nick_name = \request('nick_name');
        $profile_img_setting = \request('profile_img_setting');
        $relation_type = \request('relation_type');
        $relation_value = \request('relation_value');
        $rate = \request('rate');
        $rate = json_decode($rate);
        $image = \request('image');
        $image = json_decode($image);
        $garden_model = new SchoolModel();

        $img = array();
        $total_rate = \request('total_rate');
        $total_text = \request('total_text');
        $title = \request('title');
        $up_date =  Date('Y/m/d');;


        $reviewId = $garden_model->insertGardenReviewDetail($garden_id, $user_id, $post_name, $nick_name, $profile_img_setting, $relation_type, $relation_value,
            $rate, $total_rate, $total_text, $title, $up_date, $img);
        foreach ($image as $item){
            $imgId = $garden_model->addGardenImgDetail($garden_id, $item->url, $item->caption, '', 14);
            $garden_model -> addReviewImage($imgId, $reviewId, $item->img_public);
        }


        return view('test/review/finish-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,
            'garden_id' => $garden_id,

        ]);
    }
    public function registerRepublicSearch() {
        $name = \request('name');
        return view('test/login/register-republic-search', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'name' => $name
        ]);
    }

    public function registerRepublicModify() {
        $gardenId = \request('gardenId');
        $schoolModel = new SchoolModel();
        $gardenInfo = null;
        if($gardenId != null) {
            $gardenInfo = $schoolModel -> getGardenInfoById($gardenId);
            $gardenInfo = $gardenInfo[0];
            $typeList = $schoolModel -> getTypeList($gardenId);
            $gardenInfo -> type = $typeList[0];
        }
        $typeList = $schoolModel -> getAllType();
        $kindList = $schoolModel -> getAllKind();
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();

        return view('test/login/register-republic-modify', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id' => $gardenId,
            'garden' => $gardenInfo,
            'typeList' => $typeList,
            'kindList' => $kindList,
            'prefectureList' => $prefectureList
        ]);
    }

    public function registerRepublicModifyUser(Request $request) {
        //Log::info(dd($request->all()));
        $file = $this->saveImage($request, 'file');
        Log::info("File is ".$file);
        if($file == '') {
            $file = \request('photo_attachment');
        }
        Log::info($file);
        return view('test/login/register-republic-modify-user', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'photo_attachment' => $file
        ]);
    }

    public function registerRepublicConfirm() {
        return view('test/login/register-republic-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }

    public function registerRepublicComplete() {
        $garden_str = \request('garden');
        $photo_attachment = \request('photo_attachment');
        $user_str = \request('user');
        $garden = json_decode($garden_str);
        //Log::info(dd($garden));
        $garden -> photo_attachment = $photo_attachment;
        $id = $garden -> garden_id;
        $schoolModel = new SchoolModel();
        Log::info("Garden id ".$id);
        if($id > 0) {
            $schoolModel -> updateGardenUserDetail($id, $garden -> public_name, $garden -> public_name_second, $garden -> garden_name, $garden -> garden_name_second,
                $garden -> kind_index, $garden -> post_code, $garden -> prefecture_index,
                $garden -> city_index, $garden -> town, $garden -> address, $garden -> mobile, $garden -> url, $garden -> founding, $garden -> photo_attachment);
        } else {
            $id = $schoolModel -> insertGardenUserDetail($garden -> public_name, $garden -> public_name_second, $garden -> garden_name, $garden -> garden_name_second,
                $garden -> kind_index, $garden -> post_code, $garden -> prefecture_index,
                $garden -> city_index, $garden -> town, $garden -> address, $garden -> mobile, $garden -> url, $garden -> founding, $garden -> photo_attachment);
        }

        $user = json_decode($user_str);
        //Log::info(dd($user));
        $schoolModel -> insertRepublicUserDetail($id, $user -> first_name, $user -> second_name, $user -> first_name_huri, $user -> second_name_huri, $user -> mobile,
            $user -> contact_first_name, $user -> contact_second_name, $user -> contact_first_name_huri, $user -> contact_second_name_huri, $user -> contact_type_index, $user -> contact_mobile, $user -> email);

        $comment = '';
        $title = 'Kodomore';
        $email = $user -> email;
        $data = array();
        Log::info($email);
//        try {
//            Mail::send('test/login/mail-complete', $data, function($message) use ($title, $email) {
//                $message->from(env("MAIL_USERNAME"), 'Kodomore Admin');
//                $message->to($email);
//                $message->subject($title);
//            });
//        } catch (\Throwable  $exception) {
//            Log::info($exception);
//        }

        return view('test/login/register-republic-complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }



    public function password() {
        $id = \request('user_id');
        $type = \request('type');
        $email = \request('email');
        if($type != 'parent') {
            return view('test/login/password', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'type'         => $type,
                'email'        => $email
            ]);
        }
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        return view('test/login/parent-password', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'           => $id,
            'type'         => $type,
            'email'        => $email,
            'prefectures' => $prefectureList
        ]);
    }
    public function getPassword($id, $type, $email) {
//        $id = \request('user_id');
//        $type = \request('type');
//        $email = \request('email');
        if($type != 'parent') {
            return view('test/login/password', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'type'         => $type,
                'email'        => $email
            ]);
        }
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        return view('test/login/parent-password', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'           => $id,
            'type'         => $type,
            'email'        => $email,
            'prefectures' => $prefectureList
        ]);
    }





    public function confirm()
    {
        $name = \request('name');
        $second_name = \request('second_name');
        $account = \request('account');
        $gender = \request('gender');
        $post_code = \request('post_code');
        $city = \request('city');
        $address = \request('address');
        $mobile = \request('mobile');
        $email = \request('email');
        $password = \request('password');
        return view('test/login/confirm', [
            'name' => $name,
            'second_name' => $second_name,
            'account' => $account,
            'gender' => $gender,
            'post_code' => $post_code,
            'city' => $city,
            'address' => $address,
            'mobile' => $mobile,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function registerUser() {
        $name = \request('name');
        $second_name = \request('second_name');
        $account = \request('account');
        $gender = \request('gender');
        $post_code = \request('post_code');
        $city = \request('city');
        $address = \request('address');
        $mobile = \request('mobile');
        $email = \request('email');
        $password = \request('password');
        $userModel = new UserModel();
        $userId = $userModel -> registerUser($name, $second_name, $account, $gender, $post_code, $city.$address, $mobile, $email, $password);
        return response()->json([
            'status' => true,
            'id'     => $userId
        ]);
    }

    public function completeRegister() {
        $type = \request('type');
        $id = 0;
        $email = '';
        Log::info($type);
        $first_name = \request('first_name');
        $second_name = \request('second_name');
        $first_name_huri = \request('first_name_huri');
        $second_name_huri = \request('second_name_huri');
        $gender = \request('gender');
        $old = \request('old');
        $birthday = \request('date');
        $post_code = \request('post_code');
        $city = \request('city');
        $address = \request('address');
        $mobile = \request('mobile');
        $email = \request('email');
        $userModel = new UserModel();
        $id = $userModel -> registerNormalUser($first_name, $second_name, $first_name_huri, $second_name_huri, $old, $gender, $birthday, $post_code,
            $city, $address, $mobile, $email, $type);
        $this -> sendToken($id, $email, $type, $first_name);
        if($type == 'normal') {
            $job = \request('job');

            Log::info($id);
            return view('test/login/complete', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'email'        => $email,
                'type'         => 'normal'
            ]);
        }
        else if($type == 'garden') {
            $type_index = \request('type_index');
            $facility_name = \request('facility_name');
            $facility_name_second = \request('facility_name_second');
            $facility_post = \request('facility_post');
            //$facility_address = \request('facility_address');
            $facility_prefecture = \request('facility_prefecture');
            $facility_city = \request('facility_city');
            $facility_address = \request('facility_address');
            $facility_mobile = \request('facility_mobile');
            $facility_url = \request('facility_url');


            $userModel = new UserModel();
            $userModel -> registerGardenUser($type_index, $facility_name, $facility_name_second, $facility_post, $facility_prefecture, $facility_city,
                $facility_address, $facility_mobile, $facility_url, $id);
            return view('test/login/complete', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'email'        => $email,
                'type'         => 'garden'
            ]);
        }
        else if($type == 'public') {
            $userModel = new UserModel();
            $gardenInfoStr = \request('garden_info');
            $gardenInfo = json_decode($gardenInfoStr);

            foreach($gardenInfo -> old as $oldSchool) {
                $garden_id = $oldSchool -> id;
                $userModel -> addStudentGarden($id, $oldSchool, '1');
            }

            foreach($gardenInfo -> cur as $curSchool) {
                $garden_id = $curSchool -> id;
                $userModel -> addStudentGarden($id, $curSchool, '2');
            }
            return view('test/login/complete', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'email'        => $email,
                'type'         => 'public'
            ]);
        }

        return view('test/login/complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'           => $id,
            'email'        => $email,
            'type'         => 'parent'
        ]);
    }

    public function modifyPassword() {
        $id = \request('id');
        $password = \request('password');
        $email = \request('email');
        $code = \request('code');
        $userModel = new UserModel();
        $correctCode = $userModel -> getToken($email);
        Log::info($correctCode);
        if($code != $correctCode) {
            return response()->json([
                'status' => false
            ]);
        }

        $userModel -> registerPassword($id,  $password);

        return response()->json([
            'status' => true
        ]);
    }

    public function registerChildConfirm() {
        $id = \request('user_id');
        $password = \request('password');
        $userModel = new UserModel();
        $radio_receive = \request('radio_receive');
        $childDetailStr = \request('child_detail');
        $childDetails = json_decode($childDetailStr);
        $genderArray = ['', '女性', '男性', '無回答'];

        $schoolModel = new SchoolModel();
        $constChildArr = ['第一子', '第二子', '第三子', '第四子'];
        foreach($childDetails as $index => $childDetail) {
            $childDetail -> title = $constChildArr[$index];
            $gender = $childDetail -> gender;
            $childDetail -> gender = $genderArray[$gender];
            $old = $childDetail -> old;
            $cur = $childDetail -> cur;
            foreach($old as $oldSchool) {
                $garden_id = $oldSchool -> id;
                $gardenDetail = $schoolModel -> getGardenInfoById($garden_id);
                $oldSchool -> info = $gardenDetail[0];
            }

            foreach($cur as $curSchool) {
                $garden_id = $curSchool -> id;
                $gardenDetail = $schoolModel -> getGardenInfoById($garden_id);
                $curSchool -> info = $gardenDetail[0];
            }
        }

        $user = $userModel -> getUserById($id);
        $oldArray = ['', '10代', '20代', '30代', '40代', '50代', '60代'];
        return view('test/login/register-child-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id' => $id,
            'password' => $password,
            'radio_receive' => $radio_receive,
            'first_name' => $user-> first_name,
            'second_name' => $user-> second_name,
            'first_name_huri' => $user-> first_name_huri,
            'second_name_huri' => $user-> second_name_huri,
            'gender' => $genderArray[$user-> gender],
            'old' => $oldArray[$user-> old],
            'date' => $user-> birthday,
            'post_code' => $user-> post_code,
            'city' => $user-> city,
            'address' => $user-> address,
            'mobile' => $user-> mobile,
            'email' => $user-> email,
            'childDetailStr'   => $childDetailStr,
            'childDetails' => $childDetails
        ]);
    }

    public function childRegister() {
        return view('test/login/child');
    }

    public function registerFinal() {
        return view('test/login/final');
    }

    public function registerParentFinal() {
        $id = \request('user_id');
        $password = \request('password');
        $userModel = new UserModel();
        $radio_receive = \request('radio_receive');
        $childDetailStr = \request('childDetailStr');
        $childDetails = json_decode($childDetailStr);
        $userModel -> registerPassword($id,  $password);
        foreach($childDetails as $childDetail) {
            $old = $childDetail -> old;
            $cur = $childDetail -> cur;
            $childId = $userModel -> addChild($id, $childDetail -> first_name, $childDetail -> second_name, $childDetail -> first_name_huri, $childDetail -> second_name_huri,
                $childDetail -> gender, $childDetail -> date);
            foreach ($old as $oldSchool) {
                $userModel -> addChildGarden($childId, $oldSchool, '1');
            }
            foreach ($cur as $curSchool) {
                $userModel -> addChildGarden($childId, $curSchool, '2');
            }
        }
        return view('test/login/final');
    }


    public function school($prefecture_id)
    {
        $schoolModel = new SchoolModel();

        $name = \request('name');
        $homeModel = new HomeModel();
        $prefecture = $homeModel -> getPrefectureInfo($prefecture_id);
        $prefecture = $prefecture[0];


        $gardenList = $schoolModel -> getGardenList(null, null, null, null, null, $prefecture_id);
        $totalCount = count($gardenList);

        $areaList = $homeModel -> getAllCityGroupByArea($prefecture_id, '');
        $keywordList = $schoolModel -> getAllKeywordByType();
        $areaList = $homeModel -> divideArea($areaList);
        $tagList = $homeModel -> getAllTag();
        $typeCount = $schoolModel -> getTypeCountDetailByPrefecture($prefecture_id, '', '');
        $newsModel = new NewsModel();
        $newsList = $newsModel -> getNewsListByPrefecture($prefecture_id);

        return view('test/school/main', [

            'name' => $name,
            'prefecture' => $prefecture,
            'total' => $totalCount,
            'areaList' => $areaList,
            'keywordTypeList' => $keywordList,
            'tagList' => $tagList,
            'typeList' => $typeCount,
            'newsList' => $newsList,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function getPrefectureDetail() {
        $schoolModel = new SchoolModel();
        $cityListStr = \request('cityList');
        $typeListStr = \request('typeList');
        $prefecture_id = \request('prefecture_id');
        $search = \request('search');

        $homeModel = new HomeModel();
        $areaList = $homeModel -> getAllCityGroupByArea($prefecture_id, $search);

        $typeCount = $schoolModel -> getTypeCountDetailByPrefecture($prefecture_id, $search, $cityListStr);

        $response_city = [];
        foreach($areaList as $area) {
            foreach($area->city_list as $city) {
                array_push($response_city, $city);
            }
        }

        $response_type = [];
        foreach($typeCount as $type) {
            array_push($response_type, $type);
        }

        $response = [];
        $response['city'] = $response_city;
        $response['type'] = $response_type;

        return $response;
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

    public function showSchoolList($prefecture_id) {
        $schoolModel = new SchoolModel();
        $homeModel = new HomeModel();
        $search = \request('search');
        $type = \request('type');
        $prefecture = $homeModel -> getPrefectureInfo($prefecture_id);
        $prefecture = $prefecture[0];

        $gardenList = $schoolModel -> getGardenList('', '', '', '', '', $prefecture_id);
        $totalCount = count($gardenList);

        $areaList = $homeModel -> getAllCityGroupByArea($prefecture_id, '');
        $tagList = $homeModel -> getAllTagByType();
        $areaList = $homeModel -> divideArea($areaList);
        $kindList = $homeModel -> getAllKind();
        $typeCount = $schoolModel -> getTypeCountDetailByPrefecture($prefecture_id, '', '');
        $newsModel = new NewsModel();
        $newsList = $newsModel -> getNewsListByPrefecture($prefecture_id);
        $articleList = $newsModel -> getArticlesListByPrefecture($prefecture_id);

        return view('test/school/list-info', [
            'totalCount' => $totalCount,
            'areaList' => $areaList,
            'tagList' => $tagList,
            'kindList' => $kindList,
            'typeCountList' => $typeCount,
            'newsList' => $newsList,
            'articleList' =>$articleList,
            'prefecture' => $prefecture,
            'search' => $search,
            'type' => $type,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function normalModify($gardenId) {
        $schoolModel = new SchoolModel();
        $homeModel = new HomeModel();
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $tagList = $homeModel -> getAllTagByType();
        $gardenTagList = $schoolModel -> getTagList($garden -> garden_id);
        foreach($tagList as $tagType) {
            foreach($tagType -> tagList as $tag) {
                $tag -> isSelect = false;
                foreach($gardenTagList as $gardenTag) {
                    if($tag -> id == $gardenTag -> id) {
                        $tag -> isSelect = true;
                    }
                }
            }
        }

        return view('test/school/modify', [
            'tagList' => $tagList,
            'garden' => $garden,
            'menuComments' => ['コドモア KIDS']
        ]);
    }
    public function normalFromModify($gardenId) {
        $schoolModel = new SchoolModel();
        $homeModel = new HomeModel();
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $tagList = $homeModel -> getAllTagByType();
        $gardenTagList = $schoolModel -> getTagList($garden -> garden_id);
        foreach($tagList as $tagType) {
            foreach($tagType -> tagList as $tag) {
                $tag -> isSelect = false;
                foreach($gardenTagList as $gardenTag) {
                    if($tag -> id == $gardenTag -> id) {
                        $tag -> isSelect = true;
                    }
                }
            }
        }

        return view('test/school/modify', [
            'tagList' => $tagList,
            'garden' => $garden,
            'from' => 'detail',
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function normalModifyComplete() {
        return view('test/school/modify-complete', [
            'menuComments' =>  ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }



    public function getSchoolList() {
        $schoolModel = new SchoolModel();
        $cityListStr = \request('cityList');
        $typeListStr = \request('typeList');
        $tagListStr = \request('tagList');
        $kind = \request('kind');
        $currentPage = \request('currentPage');
        $prefecture_id = \request('prefecture_id');
        $perPage = \request('perPage');
        $search = \request('search');
        $gardenList = $schoolModel -> getGardenList($cityListStr, $typeListStr, $tagListStr, $search, $kind, $prefecture_id);
        $total = count($gardenList);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);
        $gardenIdList = [];

        $gardenFavouriteList = array();
        $user_id = session()->get(SESS_UID);

        if(isset($user_id)){
            $gardenFavouriteListTmp = $schoolModel->getGardenFavourite($user_id);
            foreach($gardenFavouriteListTmp as $garden){
                array_push($gardenFavouriteList, $garden->garden_id);
            }
        }

        foreach ($gardenList as $garden) {
            $tagList = $schoolModel -> getTagList($garden -> garden_id);
            $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
            $experienceList = $schoolModel -> getExperienceListByGardenId($garden -> garden_id);
            $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);
            if(count($experienceList) == 0) {
                $experienceList = [];
            }
            if(count($tagList) == 0) {
                $tagList = [];
            }
            if(count($keywordList) == 0) {
                $keywordList = [];
            } else {
                $isBreak = false;
                $breakKeyword = null;
                foreach($keywordList as $keyword) {
                    if($keyword -> keyword_id == 1) {
                        $breakKeyword = $keyword;
                        $isBreak = true;
                    }
                }
                if($isBreak == true) {
                    $keywordList = [];
                    array_push($keywordList, $breakKeyword);
                }
            }
            if(count($imgList) == 0) {
                $imgList = [];
            }
            $garden -> tagList = $tagList;
            $garden -> keywordList = $keywordList;
            $garden -> experienceList = $experienceList;
            $imgList = json_decode(json_encode($imgList), true);
            $garden -> typeList = $typeList;

            if(in_array($garden->garden_id, $gardenFavouriteList)){
                $garden->favourite = 1;
            }
            else{
                $garden->favourite = 0;
            }
            if(count($imgList) > 0) {
                $garden -> imgInfo = $imgList[0];
            } else {
                $garden -> imgInfo = [];
            }


            array_push($gardenIdList, $garden -> garden_id);
        }

        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }


        return view('test/school/list', [
            'gardenList' => $gardenList,
            'cityList' => $cityListStr,
            'typeList' => $typeListStr,
            'search' => $search,
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }

    public function getSchoolListInfo() {
        $schoolModel = new SchoolModel();
        $cityListStr = \request('cityList');
        $typeListStr = \request('typeList');
        $tagListStr = \request('tagList');
        $kind = \request('kind');
        $currentPage = \request('currentPage');
        $prefecture_id = \request('prefecture_id');
        $perPage = \request('perPage');
        $search = \request('search');
        $gardenList = $schoolModel -> getGardenList($cityListStr, $typeListStr, $tagListStr, $search, $kind, $prefecture_id);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);

        foreach ($gardenList as $garden) {
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);
            $garden -> typeList = $typeList;
        }
        return view('test/login/register-school', [
            'gardenList' => $gardenList,
        ]);
    }

    public function getRepublicSchoolList() {
        $schoolModel = new SchoolModel();

        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $search = \request('search');
        $gardenList = $schoolModel -> getGardenListByName($search);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($gardenList, $start, $perPage);

        $userModel = new UserModel();
        foreach ($gardenList as $garden) {
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);
            $garden -> typeList = $typeList;
            $adminUser = $userModel -> getAdminUserByGarden($garden -> garden_id);
            if($adminUser != null) {
                $garden -> hasUser = true;
            } else {
                $garden -> hasUser = false;
            }
        }
        return view('test/login/register-school-republic', [
            'gardenList' => $gardenList,
        ]);
    }

    public function imgFavourite(Request $request) {
        $favourite = \request('favourite');
        $image_id = \request('image_id');
        $user_id = session()->get(SESS_UID);
        if($user_id == ''){
            return response()->json([
                'status' => 'login'
            ]);
        }
        $mediaModel = new MediaModel();
        $image = $mediaModel->getImageById($image_id);

        if($favourite === '1'){
            $favourite_cnt = $image[0]->favourite + 1;
            $mediaModel->addFavourite($user_id, $image_id);
        }
        else{
            $favourite_cnt = $image[0]->favourite - 1;
            if($favourite_cnt < 0){
                $favourite_cnt = 0;
            }
            $mediaModel->delFavourite($user_id, $image_id);
        }
        $mediaModel->updateImageFavouriteById($image_id, $favourite_cnt);

        return response()->json([
            'status' => true
        ]);
    }

    public function gardenFavourite(Request $request) {
        $favourite = \request('favourite');
        $garden_id = \request('garden_id');
        $user_id = session()->get(SESS_UID);
        if($user_id == ''){
            return response()->json([
                'status' => 'login'
            ]);
        }
        $date = date('Y-m-d');
        $mediaModel = new MediaModel();
        if($favourite === '1'){
            $mediaModel->addGardenFavourite($user_id, $garden_id, $date);
        }
        else{
            $mediaModel->delGardenFavourite($user_id, $garden_id);
        }

        return response()->json([
            'status' => true
        ]);
    }

    public function getSchoolDetail($gardenId) {
        $schoolModel = new SchoolModel();
        //$gardenId = session()->get(SESS_GARDEN_ID);
        $typeList = $schoolModel -> getTypeListByGardenId($gardenId);
        $relateTypeList = $schoolModel -> getTypeList($gardenId);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $tagList = $schoolModel -> getTagList($garden -> garden_id);
        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $topImgList = $schoolModel -> getGardenTopImageList($garden -> garden_id);
        $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
        $goodsList = $schoolModel -> getGoodsList($garden -> garden_id);
        $uniformList = $schoolModel -> getMainUniformImageByGardenId($garden -> garden_id);
        $reviewList = $schoolModel -> getReviewByGardenId($garden -> garden_id);
        $faqList = $schoolModel -> getFaqList($garden -> garden_id);
        $user_id = session()->get(SESS_UID);
        if($user_id !== ''){

            $favouriteList = $schoolModel->getUserPhotoFavourite($user_id);

            $imgFavourite = array();
            for($i = 0; $i < count($favouriteList); $i++){
                $imgFavourite[$i] = $favouriteList[$i]->image_id;
            }

            foreach ($imgList as $img){

                if(in_array($img->id, $imgFavourite)){
                    $img->status = 1;
                }
                else{
                    $img->status = 0;
                }
            }
        }
        else{
            foreach ($imgList as $img){
                $img->status = 0;
            }
        }


        if(count($goodsList) == 0) {
            $goodsList = [];
        }
        if(count($keywordList) == 0) {
            $keywordList = [];
        } else {
            $isBreak = false;
            $breakKeyword = null;
            foreach($keywordList as $keyword) {
                if($keyword -> keyword_id == 1) {
                    $breakKeyword = $keyword;
                    $isBreak = true;
                }
            }
            if($isBreak == true) {
                $keywordList = [];
                array_push($keywordList, $breakKeyword);
            }
        }
        $garden -> tagList = $tagList;
        $garden -> typeList = $relateTypeList;
        $garden -> keywordList = $keywordList;
        $garden -> goodsList = $goodsList;
        $review_cnt = count($reviewList);
        $total = 0;
        $rate1 = 0;$rate2 = 0;$rate3 = 0;$rate4 = 0;$rate5 = 0;$rate6 = 0;$rate7 = 0;$rate8 = 0;
        foreach ($reviewList as $review){
            $rate1 += $review->eval1_rate;
            $rate2 += $review->eval2_rate;
            $rate3 += $review->eval3_rate;
            $rate4 += $review->eval4_rate;
            $rate5 += $review->eval5_rate;
            $rate6 += $review->eval6_rate;
            $rate7 += $review->eval7_rate;
            $rate8 += $review->eval8_rate;
            $total += $review->total_rate;
            $relation_type = $review->relation_type;
            $relation_value = $review->relation_value;

            if($relation_type == '1'){
                $relation_text = $relation_value . ' / 保護者';
            }
            elseif ($relation_type == '2'){
                $relation_text = $relation_value . '卒園 / 保護者';
            }
            elseif ($relation_type == '3') {
                $relation_text = $relation_value . '卒園 / 本人';
            }
            elseif($relation_type == '4'){
                $relation_text = $relation_value . '在校 / 保護者';
            }
            elseif($relation_type == '5'){
                $relation_text = $relation_value . '卒業 / 保護者';
            }
            elseif ($relation_type == '6'){
                $relation_text = $relation_value . '卒業 / 本人';
            }
            elseif($relation_type == '7'){
                $relation_text = $relation_value;
            }
            $review->relation_text = $relation_text;
            $review->image = $schoolModel->getReviewImage($review->id);
            $review->reflect = $schoolModel->getReviewReflect($review->id);

        }
        if($review_cnt !== 0) {
            $rate1 = floor($rate1/$review_cnt*10)/10;
            $rate2 = floor($rate2/$review_cnt*10)/10;
            $rate3 = floor($rate3/$review_cnt*10)/10;
            $rate4 = floor($rate4/$review_cnt*10)/10;
            $rate5 = floor($rate5/$review_cnt*10)/10;
            $rate6 = floor($rate6/$review_cnt*10)/10;
            $rate7 = floor($rate7/$review_cnt*10)/10;
            $rate8 = floor($rate8/$review_cnt*10)/10;
            $total = floor($total/$review_cnt*10)/10;

        }


        return view('test/school/detail', [
            'typeList' => $typeList,
            'imgList' => $imgList,
            'topImgList' => $topImgList,
            'tagList' => $tagList,
            'uniformList' => $uniformList,
            'faqList' => $faqList,
            'reviewList' => $reviewList,
            'review_cnt' => $review_cnt,
            'garden' => $garden,
            'rate1' => $rate1,
            'rate2' => $rate2,
            'rate3' => $rate3,
            'rate4' => $rate4,
            'rate5' => $rate5,
            'rate6' => $rate6,
            'rate7' => $rate7,
            'rate8' => $rate8,
            'total_rate' => $total,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function createSchool() {
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        return view('test/school/create', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList
        ]);
    }

    public function addDataSchool() {
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $type = \request('type');
        $search = \request('search');
        $prefecture = \request('prefecture');
        $city = \request('city');
        return view('test/school/add-data', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'search_prefecture' => $prefecture,
            'search_city' => $city,
            'search' => $search,
            'type' => $type,
        ]);
    }

    public function createSchoolConfirm() {
        $public_name = \request('public_name');
        $public_name_second = \request('public_name_second');
        $garden_name = \request('garden_name');
        $garden_name_second = \request('garden_name_second');
        $post_first = \request('post_first');
        $post_second = \request('post_second');
        $post_code = $post_first.'-'.$post_second;
        $prefecture = \request('prefecture');
        $prefecture_name = \request('prefecture_name');
        $city = \request('city');
        $city_name = \request('city_name');
        $town = \request('town');
        $address = \request('address');
        $mobile = \request('mobile');
        $url = \request('url');
        $schoolModel = new SchoolModel();
        $gardenList = $schoolModel -> getGardenListByAddress($city, $town, $address, $mobile);

        $homeModel = new HomeModel();

        return view('test/school/confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'gardenList' => $gardenList,
            'public_name' => $public_name,
            'public_name_second' => $public_name_second,
            'garden_name' => $garden_name,
            'garden_name_second' => $garden_name_second,
            'post_code' => $post_code,
            'prefecture' => $prefecture,
            'prefecture_name' => $prefecture_name,
            'city' => $city,
            'city_name' => $city_name,
            'town' => $town,
            'address' => $address,
            'mobile' => $mobile,
            'url' => $url,
        ]);

    }

    public function createSchoolComplete() {
        return view('test/school/complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            ]);
    }



    public function showNewsList($prefecture_id, $currentPage) {
        $schoolModel = new SchoolModel();
        $newsModel = new NewsModel();
        $homeModel = new HomeModel();
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
        return view('test/news/list-info', [
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
        $prefecture_id = 21;
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
        return view('test/news/detail', [
            'news' => $newsInfo,
            'next' => $next,
            'previous' => $previous,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function showArticlesList($prefecture_id, $currentPage) {
        $schoolModel = new SchoolModel();
        $newsModel = new NewsModel();
        $homeModel = new HomeModel();
        $prefecture = $homeModel -> getPrefectureInfo($prefecture_id);
        $prefecture = $prefecture[0];
        $articlesList = $newsModel -> getArticlesListByPrefecture($prefecture_id);
        $total = count($articlesList);
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
        return view('test/articles/list-info', [
            'prefecture' => $prefecture,
            'total' => $total,
            'articlesList' => $articlesList,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function showArticlesDetail($articlesId) {
        $newsModel = new NewsModel();
        $articleInfo = $newsModel -> getArticlesById($articlesId);
        $prefecture_id = 21;
        $articlesList = $newsModel -> getArticlesListByPrefecture($prefecture_id);
        $contentLists = $newsModel -> getArticlesContentListByPrefecture($articlesId);
        $commentLists = $newsModel -> getArticlesCommentListByPrefecture($articlesId);
        $curIndex = 0;
        foreach($articlesList as $index => $news) {
            if($news ->id == $articlesId) {
                $curIndex = $index;
            }
        }
        $next = -1;
        $previous = -1;
        if($curIndex > 0) {
            $previous = $articlesList[$curIndex - 1] -> id;
        }
        if($curIndex < count($articlesList) - 1) {
            $next = $articlesList[$curIndex + 1] -> id;
        }
        return view('test/articles/detail', [
            'article' => $articleInfo,
            'contentLists' => $contentLists,
            'commentLists' => $commentLists,
            'next' => $next,
            'previous' => $previous,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function showMediaList($gardenId, $currentPage) {
        $schoolModel = new SchoolModel();
        $mediaModel = new MediaModel();
        $homeModel = new HomeModel();
        $gardenInfo = $schoolModel -> getGardenInfoById($gardenId);
        $gardenInfo = $gardenInfo[0];
        $mediaList = $mediaModel -> getMediaListByGarden($gardenId);
        $total = count($mediaList);

        $perShow = 3;
        $perPage = 10;
        $mediaList = array_slice($mediaList, $perPage * ($currentPage - 1), $perPage);
        foreach($mediaList as $media) {
            $mediaId = $media -> media_id;
            $imgList = $mediaModel -> getImageListById($mediaId);
            Log::info("Size".count($imgList));
            if(count($imgList) > 0) {
                $media -> img = $imgList[0] -> img;
            } else {
                $media -> img = '';
            }
        }
        if($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }


        $start = $currentPage - ($currentPage - 1) % $perShow;

        $end = $start + $perShow - 1;
        if($end > $total) {
            $end = $total;
        }
        return view('test/media/list-info', [
            'garden' => $gardenInfo,
            'total' => $total,
            'mediaList' => $mediaList,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function cmpMedia($a, $b)
    {
        if ($a -> order == $b -> order) {
            return 0;
        }
        return ($a -> order < $b -> order) ? -1 : 1;
    }

    public function showMediaDetail($mediaId) {
        $mediaModel = new MediaModel();
        $mediaInfo = $mediaModel -> getMediaById($mediaId);
        $subtitleList = $mediaModel -> getSubtitleList($mediaId);
        $contentList = $mediaModel -> getContentList($mediaId);
        $youtubeList = $mediaModel -> getYoutubeList($mediaId);
        $imgList = $mediaModel -> getImageListById($mediaId);
        $childList = [];
        foreach($subtitleList as $subtitle) {
            $subtitle -> type = 'subtitle';
            array_push($childList, $subtitle);
        }
        foreach($contentList as $content) {
            $content -> type = 'content';
            array_push($childList, $content);
        }
        foreach($youtubeList as $youtube) {
            $youtube -> type = 'youtube';
            array_push($childList, $youtube);
        }
        foreach($imgList as $img) {
            $img -> type = 'image';
            array_push($childList, $img);
        }
        usort($childList, array($this, 'cmpMedia'));
        $isFirst = true;
        foreach($childList as $child) {
            if($child -> type == 'subtitle') {
                $child -> isFirst = $isFirst;
                $isFirst = false;
            }
        }
        $mediaInfo -> childList = $childList;
        $gardenId = $mediaInfo -> garden_id;
        $mediaList = $mediaModel -> getMediaListByGarden($gardenId);
        $curIndex = 0;
        foreach($mediaList as $index => $media) {
            if($media ->media_id == $mediaId) {
                $curIndex = $index;
            }
        }
        $next = -1;
        $previous = -1;
        if($curIndex > 0) {
            $previous = $mediaList[$curIndex - 1] -> media_id;
        }
        if($curIndex < count($mediaList) - 1) {
            $next = $mediaList[$curIndex + 1] -> media_id;
        }
        return view('test/media/detail', [
            'media' => $mediaInfo,
            'next' => $next,
            'previous' => $previous,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function adminModifyMedia(Request $request) {
        Log::info("Come in");
        $media_id = \request('media_id');
        $garden_id = \request('garden_id');
        $media_type = \request('media_type');
        $media_name = \request('media_name');
        $media_title = \request('media_title');
        $public_type = \request('public_type');
        $public_date = \request('public_date');
        $public_time = \request('public_time');
        $mediaModel = new MediaModel();
        Log::info($public_date);
        if($media_id > 0) {
            $mediaModel -> updateMediaDetail($media_id, $garden_id, $media_type, $media_name, $media_title, $public_type, $public_date, $public_time);
        } else {
            $media_id = $mediaModel -> insertMediaDetail($garden_id, $media_type, $media_name, $media_title, $public_type, $public_date, $public_time);
        }

        $subtitleStr = \request('subtitle');

        Log::info($subtitleStr);
        $subtitleList = json_decode($subtitleStr);
        Log::info($subtitleList);
        $mediaModel -> removeAllSubtitle($media_id);
        foreach($subtitleList as $subtitle) {
            $mediaModel -> addSubtitle($media_id, $subtitle -> subtitle, $subtitle -> order);
        }

        $contentStr = \request('content');
        $contentList = json_decode($contentStr);
        $mediaModel -> removeAllContent($media_id);
        foreach($contentList as $content) {
            $mediaModel -> addContent($media_id, $content -> content, $content -> order);
        }

        $youtubeStr = \request('youtube');
        $youtubeList = json_decode($youtubeStr);
        $mediaModel -> removeAllYoutube($media_id);
        foreach($youtubeList as $youtube) {
            if(!empty($youtube -> url)){
                $mediaModel -> addYoutube($media_id, $youtube -> url, $youtube -> order);
            }

        }

        $schoolModel = new SchoolModel();
        $schoolModel -> deleteMediaImgByType($media_id, MEDIA_IMAGE_TYPE);
        $schoolModel -> deleteMediaImgByType($media_id, MEDIA_VIDEO_TYPE);
        $mediaModel -> removeAllImage($media_id);

        $imageStr = \request('image');
        $imageList = json_decode($imageStr);

        foreach($imageList as $image) {
            $index = $image -> id;
            $caption = $image -> caption;
            $img_source = $image -> img_source;
            $type = $image -> type;
            $order = $image -> order;
            if($type == 'image') {
                $type = MEDIA_IMAGE_TYPE;
            } else {
                $type = MEDIA_VIDEO_TYPE;
            }
            $file = $this->saveBasicImage($request, 'file_'.$index, 'media/');

            Log::info("File name is ".$file.".");
            if(empty($file)) {
                $file = $image -> img;
            }
            $imgId = $schoolModel -> addGardenImgDetail($garden_id, $file, $caption, $img_source, $type);
            $mediaModel -> addImage($media_id, $imgId, $order);

        }
        return response()->json([
            'status' => true
        ]);

    }

    public function adminAddMedia(Request $request) {
        Log::info("Come in");
        $garden_id = \request('garden_id');
        $prev_type = \request('prev_type');
        $image_type = \request('image_type');


        $schoolModel = new SchoolModel();
        $schoolModel -> deleteGardenImgById($garden_id, $prev_type);

        $imageStr = \request('image');
        $imageList = json_decode($imageStr);

        foreach($imageList as $image) {
            $index = $image -> id;
            $caption = $image -> caption;
            $img_source = $image -> img_source;
            if($image->select === 1){
                $type = $image_type;
            }
            else{
                $type = $prev_type;
            }
            $order = $image -> order;
            $file = $this->saveBasicImage($request, 'file_'.$index, 'garden/');
            Log::info("File name is ".$file.".");
            if(empty($file)) {
                $file = $image -> img;
            }
            $imgId = $schoolModel -> addGardenImgDetail($garden_id, $file, $caption, $img_source, $type);

        }
        return response()->json([
            'status' => true
        ]);

    }

    public function adminRemoveMedia() {
        $media_id = \request('media_id');
        $mediaModel = new MediaModel();
        $mediaModel -> removeAllSubtitle($media_id);
        $mediaModel -> removeAllContent($media_id);
        $mediaModel -> removeAllYoutube($media_id);
        $schoolModel = new SchoolModel();
        $schoolModel -> deleteMediaImgByType($media_id, MEDIA_IMAGE_TYPE);
        $schoolModel -> deleteMediaImgByType($media_id, MEDIA_VIDEO_TYPE);
        $mediaModel -> removeAllImage($media_id);
        $mediaModel -> removeMedia($media_id);
        return response()->json([
            'status' => true
        ]);
    }

    public function contact() {
        return view('test/contact', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function private() {
        return view('test/private', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function question() {
        return view('test/question', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function guide() {
        return view('test/guide', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }
    public function blogGuide() {
        return view('test/blog-guide', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function frequentlyQuestion() {
        return view('test/frequently', [
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
        return view('test/question-confirm', [
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
        return view('test/question-complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function showAdminLogin() {
        return view('test/admin/login/login', [
        ]);
    }

    public function showAdminSchoolDetail() {
        $gardenId = session()->get(SESS_GARDEN_ID);
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $tagList = $homeModel -> getAllTagByType();
        $keywordList = $schoolModel -> getWholeKeywordList($garden -> garden_id);

        $gardenTagList = $schoolModel -> getTagList($garden -> garden_id);
        $typeList = $schoolModel -> getTypeList($gardenId);
        foreach($tagList as $tagType) {
            foreach($tagType -> tagList as $tag) {
                $tag -> isSelect = false;
                foreach($gardenTagList as $gardenTag) {
                    if($tag -> id == $gardenTag -> id) {
                        $tag -> isSelect = true;
                    }
                }
            }
        }
        $publicImgList = [];
        $privateImgList = [];
        foreach($imgList as $img) {
            if($img -> top == 1) {
                array_push($publicImgList, $img);
            } else {
                array_push($privateImgList, $img);
            }
        }

        for($i = count($publicImgList); $i < 5; $i ++) {
            array_push($publicImgList, null);
        }

//        for($i = count($privateImgList); $i < 5; $i ++) {
//            array_push($privateImgList, null);
//        }

        usort($privateImgList, function ($a, $b) {
            return $a->favourite < $b->favourite;
        });

        $garden -> typeList = $typeList;

        $notificationList = $schoolModel -> getNotificationList($gardenId);
        if(count($notificationList) == 0) {
            $contentEmpty = new \stdClass();
            $contentEmpty -> content = '';
            $contentEmpty -> type = '';
            $notificationList = [$contentEmpty];
        }
        return view('test/admin/school/detail', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'keywordList' => $keywordList,
            'garden' => $garden,
            'publicImgList' => $publicImgList,
            'privateImgList' => $privateImgList,
            'notificationList' => $notificationList,
            'tab_name' => 'detail',
            'imageList' => $imgList,
        ]);
    }

    public function showAdminSchoolBasic() {
        $gardenId = session()->get(SESS_GARDEN_ID);
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $prefectureList = $homeModel -> getAllPrefecture();
        $gardenTypeList = $schoolModel -> getTypeList($gardenId);
        $garden -> type = $gardenTypeList[0];

        $typeList = $schoolModel -> getAllType();
        $kindList = $schoolModel -> getAllKind();
        $postList = explode('-', $garden -> post_code);
        $mobileList = explode('-', $garden -> mobile);
        if($garden -> mobile_second != null) {
            $mobileSecondList = explode('-', $garden -> mobile_second);
        } else {
            $mobileSecondList = [];
        }

        if($garden -> fax != null) {
            $faxList = explode('-', $garden -> fax);
        } else {
            $faxList = [];
        }


        while(count($postList) < 2) {
            array_push($postList, '');
        }

        while(count($mobileList) < 3) {
            array_push($mobileList, '');
        }
        while(count($mobileSecondList) < 3) {
            array_push($mobileSecondList, '');
        }
        while(count($faxList) < 3) {
            array_push($faxList, '');
        }
        $garden -> postList = $postList;
        $garden -> mobileList = $mobileList;
        $garden -> mobileSecondList = $mobileSecondList;
        $garden -> faxList = $faxList;

        Log::info($garden -> post_code);

        return view('test/admin/school/basic', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'garden' => $garden,
            'tab_name' => 'basic',
            'typeList' => $typeList,
            'kindList' => $kindList
        ]);
    }

    public function showAdminSchoolTag() {
        $gardenId = session()->get(SESS_GARDEN_ID);
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $tagList = $homeModel -> getAllTagByType();
        $gardenTagList = $schoolModel -> getTagList($garden -> garden_id);

        foreach($tagList as $tagType) {
            $tagContentList = $schoolModel -> getTagContentList($gardenId, $tagType -> id);
            if(count($tagContentList) == 0) {
                $contentEmpty = new \stdClass();
                $contentEmpty -> content = '';
                $tagContentList = [$contentEmpty];
            }
            $tagType -> contents = $tagContentList;
            foreach($tagType -> tagList as $tag) {
                $tag -> isSelect = false;
                foreach($gardenTagList as $gardenTag) {
                    if($tag -> id == $gardenTag -> id) {
                        $tag -> isSelect = true;
                    }
                }
            }
        }

        return view('test/admin/school/tag', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'tagList' => $tagList,
            'garden' => $garden,
            'tab_name' => 'tag'
        ]);
    }

    public function showAdminMediaList(Request $request) {
        $schoolModel = new SchoolModel();
        $mediaModel = new MediaModel();
        $homeModel = new HomeModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $gardenInfo = $schoolModel -> getGardenInfoById($gardenId);
        $gardenInfo = $gardenInfo[0];
        $mediaList = $mediaModel -> getMediaListByGarden($gardenId);
        $total = count($mediaList);
        $public_cnt = $mediaModel -> getMediaTypeCount(0, $gardenId);
        $private_cnt = $mediaModel -> getMediaTypeCount(1, $gardenId);
        $reserve_cnt = $mediaModel -> getMediaTypeCount(3, $gardenId);

        $perPage = 10;
        if (!empty($request->input('per_page'))) {
            $perPage = $request->input('per_page');
        }

        $currentPage = 1;

        if (!empty($request->input('cur_page'))) {
            $currentPage = $request->input('cur_page');
        }

        $last_page = (int)($total / $perPage);
        if ($last_page * $perPage < $total) {
            $last_page = $last_page + 1;
        }
            //$perPage = 10;
        $mediaList = array_slice($mediaList, $perPage * ($currentPage - 1), $perPage);
        foreach($mediaList as $media) {
            $mediaId = $media -> media_id;
            $imgList = $mediaModel -> getImageListById($mediaId);
            Log::info("Size".count($imgList));
            if(count($imgList) > 0) {
                $media -> img = $imgList[0] -> img;
            } else {
                $media -> img = '';
            }
        }
//        if($total > 0) {
//            $total = $total - 1 - ($total - 1) % $perPage;
//            $total = $total / $perPage + 1;
//        }


        return view('test/admin/school/post-list', [
            'garden' => $gardenInfo,
            'total' => $total,
            'mediaList' => $mediaList,
            'cur_page' => $currentPage,
            'per_page' => $perPage,
            'last_page' => $last_page,
            'tab_name' => 'media-list',
            'public_cnt' => $public_cnt,
            'private_cnt' => $private_cnt,
            'reserve_cnt' => $reserve_cnt,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function createMediaPost(){
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);

        $garden = $garden[0];

        return view('test/admin/school/post-create', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'tab_name' => 'media-list',
        ]);

    }

    public function adminMediaDetail($mediaId) {
        $mediaModel = new MediaModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);

        $garden = $garden[0];
        $mediaInfo = $mediaModel -> getMediaById($mediaId);
        $subtitleList = $mediaModel -> getSubtitleList($mediaId);
        $contentList = $mediaModel -> getContentList($mediaId);
        $youtubeList = $mediaModel -> getYoutubeList($mediaId);
        $imgList = $mediaModel -> getImageListById($mediaId);
        $childList = [];
        foreach($subtitleList as $subtitle) {
            $subtitle -> type = 'subtitle';
            array_push($childList, $subtitle);
        }
        foreach($contentList as $content) {
            $content -> type = 'content';
            array_push($childList, $content);
        }
        foreach($youtubeList as $youtube) {
            $youtube -> type = 'youtube';
            array_push($childList, $youtube);
        }
        foreach($imgList as $img) {
            $img -> type = 'image';
            array_push($childList, $img);
        }

        usort($childList, array($this, 'cmpMedia'));
        $isFirst = true;
        foreach($childList as $child) {
            if($child -> type == 'subtitle') {
                $child -> isFirst = $isFirst;
                $isFirst = false;
            }
        }
        $mediaInfo -> childList = $childList;

        return view('test/admin/school/post-create', [
            'garden' => $garden,
            'media' => $mediaInfo,
            'media_id' => $mediaId,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function adminMediaCopy($mediaId) {
        $mediaModel = new MediaModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);

        $garden = $garden[0];
        $mediaInfo = $mediaModel -> getMediaById($mediaId);
        $subtitleList = $mediaModel -> getSubtitleList($mediaId);
        $contentList = $mediaModel -> getContentList($mediaId);
        $youtubeList = $mediaModel -> getYoutubeList($mediaId);
        $imgList = $mediaModel -> getImageListById($mediaId);
        $childList = [];
        foreach($subtitleList as $subtitle) {
            $subtitle -> type = 'subtitle';
            array_push($childList, $subtitle);
        }
        foreach($contentList as $content) {
            $content -> type = 'content';
            array_push($childList, $content);
        }
        foreach($youtubeList as $youtube) {
            $youtube -> type = 'youtube';
            array_push($childList, $youtube);
        }
        foreach($imgList as $img) {
            $img -> type = 'image';
            array_push($childList, $img);
        }
        usort($childList, array($this, 'cmpMedia'));
        $isFirst = true;
        foreach($childList as $child) {
            if($child -> type == 'subtitle') {
                $child -> isFirst = $isFirst;
                $isFirst = false;
            }
        }
        $mediaInfo -> childList = $childList;

        return view('test/admin/school/post-create', [
            'garden' => $garden,
            'media' => $mediaInfo,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function showListMediaPost($gardenId){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $tagList = $homeModel -> getAllTagByType();
        $keywordList = $schoolModel -> getWholeKeywordList($garden -> garden_id);

        $gardenTagList = $schoolModel -> getTagList($garden -> garden_id);
        $typeList = $schoolModel -> getTypeList($gardenId);
        foreach($tagList as $tagType) {
            foreach($tagType -> tagList as $tag) {
                $tag -> isSelect = false;
                foreach($gardenTagList as $gardenTag) {
                    if($tag -> id == $gardenTag -> id) {
                        $tag -> isSelect = true;
                    }
                }
            }
        }
        $publicImgList = [];
        $privateImgList = [];
        foreach($imgList as $img) {
            if($img -> type == 1) {
                array_push($publicImgList, $img);
            } else {
                array_push($privateImgList, $img);
            }
        }
        for($i = count($publicImgList); $i < 5; $i ++) {
            array_push($publicImgList, null);
        }

        for($i = count($privateImgList); $i < 5; $i ++) {
            array_push($privateImgList, null);
        }

        $garden -> typeList = $typeList;

        $notificationList = $schoolModel -> getNotificationList($gardenId);
        if(count($notificationList) == 0) {
            $contentEmpty = new \stdClass();
            $contentEmpty -> content = '';
            $contentEmpty -> type = '';
            $notificationList = [$contentEmpty];
        }
        return view('test/admin/school/post-list', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'keywordList' => $keywordList,
            'garden' => $garden,
            'publicImgList' => $publicImgList,
            'privateImgList' => $privateImgList,
            'notificationList' => $notificationList
        ]);
    }

    public function showAdminSchoolUniform(){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $image_type = UNIFORM_IMAGE_TYPE;
        $garden_image = $schoolModel -> getGardenImageByType($gardenId, $image_type);
        $image_sum_cnt = $schoolModel -> getImageCount($gardenId);



        return view('test/admin/school/uniform', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'image_type' => $image_type,
            'image_sum_cnt' => $image_sum_cnt,
            'garden_image' => $garden_image,
            'tab_name' => 'uniform',
        ]);
    }

    public function showAdminSchoolMainUniform(){
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $image_type = UNIFORM_IMAGE_TYPE;
        $garden_image = $schoolModel -> getMainUniformImageByGardenId($gardenId);

        return view('test/admin/school/main-uniform', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'garden_image' => $garden_image,
            'imageList' => $imgList,
            'tab_name' => 'main-uniform',
        ]);
    }

    public function modifyAdminSchoolMainUniform(Request $request){
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $imgList = \request('imageList');
        $imgLists = json_decode($imgList);
        $schoolModel->updateGardenMainUniformImage($gardenId, $imgLists);
        return response()->json([
            'status' => true
        ]);
    }

    public function showAdminSchoolInfo(){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $image_type = INFO_IMAGE_TYPE;
        $garden_image = $schoolModel -> getGardenImageByType($gardenId, $image_type);
        $image_sum_cnt = $schoolModel -> getImageCount($gardenId);



        return view('test/admin/school/uniform', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'image_type' => $image_type,
            'image_sum_cnt' => $image_sum_cnt,
            'garden_image' => $garden_image,
            'tab_name' => 'info'
        ]);
    }

    public function showAdminSchoolStaff(){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $image_type = STAFF_IMAGE_TYPE;
        $garden_image = $schoolModel -> getGardenImageByType($gardenId, $image_type);
        $image_sum_cnt = $schoolModel -> getImageCount($gardenId);



        return view('test/admin/school/uniform', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'image_type' => $image_type,
            'image_sum_cnt' => $image_sum_cnt,
            'garden_image' => $garden_image,
            'tab_name' => 'staff'
        ]);
    }
    public function showAdminSchoolOther(){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $image_type = OTHER_IMAGE_TYPE;
        $garden_image = $schoolModel -> getGardenImageByType($gardenId, $image_type);
        $image_sum_cnt = $schoolModel -> getImageCount($gardenId);



        return view('test/admin/school/uniform', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'image_type' => $image_type,
            'image_sum_cnt' => $image_sum_cnt,
            'garden_image' => $garden_image,
            'tab_name' => 'other'
        ]);
    }
    public function showAdminSchoolMedia(){
        $schoolModel = new SchoolModel();
        $mediaModel = new MediaModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $image_sum_cnt = $schoolModel -> getImageCount($gardenId);
        $mediaList = $mediaModel -> getMediaListByGarden($gardenId);

        $childList = [];
        foreach($mediaList as $media) {
            $mediaId = $media -> media_id;
            $imgLists = $mediaModel -> getImageListById($mediaId);
            Log::info("Size".count($imgLists));
            if(count($imgLists) > 0) {
                foreach ($imgLists as $img){
                    $tmp = array();
                    $image = $mediaModel ->getImageById($img->img_id);
                    $tmp['img'] = $image;
                    $tmp['media_id'] = $mediaId;
                    $tmp['public_type'] = $media->public_type;
                    array_push($childList, $tmp);
                }
            }
        }

        return view('test/admin/school/media', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'image_sum_cnt' => $image_sum_cnt,
            'image_list' => $childList,
            'tab_name' => 'media'
        ]);
    }
    public function showAdminSchoolMediaPost(Request $request){
        $del_list = \request('del_list');
        $cap_list = \request('cap_list');
        $source_list = \request('source_list');
        $mediaModel = new MediaModel();

        $del_lists = json_decode($del_list);
        $cap_lists = json_decode($cap_list);
        $source_lists = json_decode($source_list);

        foreach ($del_lists as $del){
            if(isset($del->image_id)){
                $mediaModel->deleteImageByMedia($del->media_id, $del->image_id);
            }
        }

        foreach ($cap_lists as $cap) {
            if(isset($cap->image_id)){
                $mediaModel->updateImageCapById($cap->image_id, $cap->val);
            }
        }

        foreach ($source_lists as $sour) {
            if(isset($sour->image_id)){
                $mediaModel->updateImageSourceById($sour->image_id, $sour->val);
            }
        }

        return response()->json([
            'status' => true
        ]);


    }

    public function showAdminSchoolReview(){
        $schoolModel = new SchoolModel();
        $mediaModel = new MediaModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $image_sum_cnt = $schoolModel -> getImageCount($gardenId);
        $mediaList = $mediaModel -> getMediaListByGarden($gardenId);

        $childList = [];
        foreach($mediaList as $media) {
            $mediaId = $media -> media_id;
            $imgLists = $mediaModel -> getImageListById($mediaId);
            Log::info("Size".count($imgLists));
            if(count($imgLists) > 0) {
                foreach ($imgLists as $img){
                    $tmp = array();
                    $image = $mediaModel ->getImageById($img->img_id);
                    $tmp['img'] = $image;
                    $tmp['media_id'] = $mediaId;
                    $tmp['public_type'] = $media->public_type;
                    array_push($childList, $tmp);
                }
            }
        }

        return view('test/admin/school/review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'image_sum_cnt' => $image_sum_cnt,
            'image_list' => $childList,
            'tab_name' => 'review'
        ]);
    }
    public function showAdminSchoolReviewPost(Request $request){
        $del_list = \request('del_list');
        $cap_list = \request('cap_list');
        $source_list = \request('source_list');
        $mediaModel = new MediaModel();

        $del_lists = json_decode($del_list);
        $cap_lists = json_decode($cap_list);
        $source_lists = json_decode($source_list);

        foreach ($del_lists as $del){
            if(isset($del->image_id)){
                $mediaModel->deleteImageByMedia($del->media_id, $del->image_id);
            }
        }

        foreach ($cap_lists as $cap) {
            if(isset($cap->image_id)){
                $mediaModel->updateImageCapById($cap->image_id, $cap->val);
            }
        }

        foreach ($source_lists as $sour) {
            if(isset($sour->image_id)){
                $mediaModel->updateImageSourceById($sour->image_id, $sour->val);
            }
        }

        return response()->json([
            'status' => true
        ]);


    }

    public function showAdminSchoolFaqChildCare() {
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $faq_list = $schoolModel ->getGardenFaqByType($gardenId, 1);
        return view('test/admin/school/faq', [
            'type' => 1,
            'garden' => $garden,
            'faq_list' => $faq_list,
            'tab_name' => 'faq-childcare',
            'menuComments' => ['コドモア KIDS']
        ]);
    }
    public function showAdminSchoolFaqFood() {
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $faq_list = $schoolModel ->getGardenFaqByType($gardenId, 2);
        return view('test/admin/school/faq', [
            'type' => 2,
            'garden' => $garden,
            'faq_list' => $faq_list,
            'tab_name' => 'faq-food',
            'menuComments' => ['コドモア KIDS']
        ]);
    }
    public function showAdminSchoolFaqGood() {
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $faq_list = $schoolModel ->getGardenFaqByType($gardenId, 3);
        return view('test/admin/school/faq', [
            'type' => 3,
            'garden' => $garden,
            'faq_list' => $faq_list,
            'tab_name' => 'faq-good',
            'menuComments' => ['コドモア KIDS']
        ]);
    }
    public function showAdminSchoolFaqEnter() {
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $faq_list = $schoolModel ->getGardenFaqByType($gardenId, 4);
        return view('test/admin/school/faq', [
            'type' => 4,
            'garden' => $garden,
            'faq_list' => $faq_list,
            'tab_name' => 'faq-enter',
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function showAdminSchoolFaqModify(Request $request) {
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $origin_list = \request('origin_list');
        $add_list = \request('add_list');

        $origin_lists = json_decode($origin_list);
        $add_lists = json_decode($add_list);

        $type = \request('faq_type');

        foreach ($origin_lists as $origin_list) {
            if(!empty($origin_list->answer)) {
                $schoolModel->updateGardenFaqById($origin_list->id, $origin_list->answer);
            }
        }

        foreach ($add_lists as $add_list) {
            if(!empty($add_list->question)){
                $schoolModel->createGardenFaq($gardenId, $add_list->question, $add_list->answer, $type);
            }

        }
    }

    public function showAdminSchoolPhoto(){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $photo_images = $schoolModel -> getGardenPhotoByType($gardenId);
        $image_sum_cnt = $schoolModel -> getImageCount($gardenId);

        return view('test/admin/school/phpto-gallery', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'image_sum_cnt' => $image_sum_cnt,
            'photo_images' => $photo_images,
            'tab_name' => 'photo-gallery',

        ]);
    }

    public function showAdminSchoolPhotoPost(){
        $del_list = \request('del_list');
        $cap_list = \request('cap_list');
        $source_list = \request('source_list');
        $mediaModel = new MediaModel();

        $del_lists = json_decode($del_list);
        $cap_lists = json_decode($cap_list);
        $source_lists = json_decode($source_list);

        foreach ($del_lists as $del){
            if(isset($del->image_id)){
                $mediaModel->deleteImageById($del->image_id);
            }
        }

        foreach ($cap_lists as $cap) {
            if(isset($cap->image_id)){
                $mediaModel->updateImageCapById($cap->image_id, $cap->val);
            }
        }

        foreach ($source_lists as $sour) {
            if(isset($sour->image_id)){
                $mediaModel->updateImageSourceById($sour->image_id, $sour->val);
            }
        }

        return response()->json([
            'status' => true
        ]);
    }
    public function modify(Request $request, $garden_id) {
        $schoolModel = new SchoolModel();
        $notificationListStr = \request('notification_list');
        $notificationList = json_decode($notificationListStr);
        $schoolModel -> updateGardenNotification($garden_id, $notificationList);
        $publicListStr = \request('public_list');
        $publicList = json_decode($publicListStr);
        $schoolModel -> updateGardenPublicImage($garden_id, $publicList);
        $topListStr = \request('top_list');
        $topList = json_decode($topListStr);
        $schoolModel -> updateGardenTopImage($garden_id, $topList);

        $layoutListStr = \request('layout_list');
        $layoutList = json_decode($layoutListStr);

        Log::info($layoutList);

        foreach ($layoutList as $layout){
            $imgString = $layout->file;
            $fileName = $this->saveBase64Image($imgString, 'garden/');
            $imgId = $layout->id;
            $schoolModel->updateGardenLayoutImage($imgId, $fileName);
        }

        $comment_title = \request('comment_title');
        $comment_description = \request('comment_description');
        $map_setting = \request('map_setting');
        $map_iframe = \request('map_iframe');

        $reception_status = \request('reception_status');
        $reception_date = \request('reception_date');
        $recruitment_status = \request('recruitment_status');

        $schoolModel -> updateGardenDetail($garden_id, $comment_title, $comment_description, $reception_status, $reception_date, $recruitment_status, $map_setting, $map_iframe);
        if ($request->hasFile('file_map')) {
            $imgRoute = $this->saveRouteImage($request);
            $schoolModel -> updateGardenMapDetail($garden_id, $imgRoute);
        }
        if ($request->hasFile('file_width_logo')) {
            Log::info("Width contain");
            $imgLogo = $this->saveImage($request, 'file_width_logo');
            $schoolModel -> updateGardenLogo($garden_id, $imgLogo, 1);
        } else if ($request->hasFile('file_height_logo')) {
            Log::info("Height contain");
            $imgLogo = $this->saveImage($request, 'file_height_logo');
            $schoolModel -> updateGardenLogo($garden_id, $imgLogo, 2);
        }






        $idListStr = \request('id_list');
        $idList = explode(',', $idListStr);
        $keywordListStr = \request('keyword_list');
        $keywordList = explode(',', $keywordListStr);
        $schoolModel -> updateGardenKeyword($garden_id, $keywordList);
//        $imgUrlList = [];
//        $imgCaptionList = [];
//        Log::info($idList);
//        foreach($idList as $id) {
//            $imgUrl = \request("img_url_" . $id);
//            if(!empty($imgUrl)) {
//                array_push($imgUrlList, $imgUrl);
//            }
//        }
        //$imgUrlListStr = implode(",", $imgUrlList);
//        $schoolModel -> deleteGardenImg($garden_id, $imgUrlListStr);

//        foreach($idList as $id) {
//            $imgUrl = \request("img_url_".$id);
//
//
//            $imgCaption = \request("caption_index_".$id);
//
//            if(empty($imgCaption)) {
//                $imgCaption = '';
//            }
//
//            $type = 1;
//            if($id >= 5) {
//                $type = 2;
//            }
//
//            if(empty($imgUrl)) {
//                $imgUrl = $this->saveImage($request, 'file_'.$id);
//                $schoolModel -> addGardenImg($garden_id, $imgUrl, $imgCaption, $type);
//            } else {
//                Log::info($imgUrl);
//                $schoolModel -> updateGardenImg($imgUrl, $imgCaption);
//
//            }
//        }


    }
    public function modifyTag(Request $request, $garden_id) {
        $schoolModel = new SchoolModel();
        $tagListStr = \request('tags');
        $tagList = explode(',', $tagListStr);
        $schoolModel -> updateGardenTag($garden_id, $tagList);
        $contentsStr = \request('contents');
        Log::info($contentsStr);
        $contentList = json_decode($contentsStr);
        $schoolModel -> updateGardenTagContent($garden_id, $contentList);
        return response()->json([
            'status' => true
        ]);

    }

    public function modifyBasic(Request $request) {
        $garden_id = \request('garden_id');
        $public_name = \request('public_name');
        $public_name_second = \request('public_name_second');
        $garden_name = \request('garden_name');
        $garden_name_second = \request('garden_name_second');
        $type = \request('type');
        $kind = \request('kind');
        $post_first = \request('post_first');
        $post_second = \request('post_second');
        $post_code = $post_first.'-'.$post_second;
        $prefecture = \request('prefecture');
        $city = \request('city');
        $town = \request('town');
        $address = \request('address');
        $mobile1_1 = \request('mobile1_1');
        $mobile1_2 = \request('mobile1_2');
        $mobile1_3 = \request('mobile1_3');
        $mobile = $mobile1_1.'-'.$mobile1_2.'-'.$mobile1_3;
        $mobile2_1 = \request('mobile2_1');
        $mobile2_2 = \request('mobile2_2');
        $mobile2_3 = \request('mobile2_3');
        $mobile_second = $mobile2_1;
        if(!empty($mobile2_2)) {
            $mobile_second = $mobile_second.'-'.$mobile2_2;
        }
        if(!empty($mobile2_3)) {
            $mobile_second = $mobile_second.'-'.$mobile2_3;
        }
        $fax_1 = \request('fax_1');
        $fax_2 = \request('fax_2');
        $fax_3 = \request('fax_3');
        $fax = $fax_1;
        if(!empty($fax_2)) {
            $fax = $fax.'-'.$fax_2;
        }
        if(!empty($fax_3)) {
            $fax = $fax.'-'.$fax_3;
        }
        $url = \request('url');
        $founding = \request('founding');
        $review = \request('review');

        $photo_attachment = $this->saveImage($request, 'photo_attachment');
        if(empty($photo_attachment)) {
            $photo_attachment = \request('img_source');
        }
        return response()->json([
            'status' => true
        ]);

    }



    public function saveImage(Request $request, $name) {
        $fileName = "";
        Log::info($name);
        if ($request->hasFile($name)) {
            Log::info("Receive file");
            $image_storage = config("filesystems.disks.garden_storage");
            $ext = $request->file($name)->getClientOriginalExtension();
            $fileName =  "1_" . uniqid() . "." . $ext;
            $request->file($name)->move($image_storage, $fileName);
        }
        return $fileName;
    }

    public function saveRouteImage(Request $request) {
        $fileName = "";
        $name = 'file_map';
        if ($request->hasFile($name)) {
            Log::info("Receive file");
            $image_storage = config("filesystems.disks.route_storage");
            $ext = $request->file($name)->getClientOriginalExtension();
            $fileName =  "1_" . uniqid() . "." . $ext;
            $request->file($name)->move($image_storage, $fileName);
        }
        return $fileName;
    }

    public function saveBasicImage(Request $request, $name, $folder) {
        $fileName = "";
        if ($request->hasFile($name)) {

            Log::info("Receive file");
            $image_storage = config("filesystems.disks.img_storage").$folder;
            $ext = $request->file($name)->getClientOriginalExtension();
            $fileName =  "1_" . uniqid() . "." . $ext;
            $request->file($name)->move($image_storage, $fileName);
        }
        return $fileName;
    }

    public function saveBase64Image($base64, $folder) {
        $image_parts = explode(";base64,", $base64);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $data = base64_decode($image_parts[1]);
        $image_storage = config("filesystems.disks.img_storage").$folder;
        $fileName =  "1_" . uniqid(). ".png";
        Log::info($image_storage.$fileName);

        file_put_contents($image_storage. $fileName, $data);

        return $fileName;
    }

}
