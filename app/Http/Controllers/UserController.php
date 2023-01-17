<?php

namespace App\Http\Controllers;

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

class UserController extends Controller
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



    public function login()
    {
        $redirect = session()->get('redirect_url');
        if($redirect == null) {
            $redirect = '';
        }
        return view('login/login', [
            'redirect' => $redirect,
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function forgetPassword() {
        return view('login/forget-password', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'login' => 'register'
        ]);
    }
    public function forgetDismiss() {
        return view('login/forget-dismiss', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'login' => 'register'
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

    public function forgetModifyMail($id, $email) {
        $mobile = \request('mobile');
        return view('login/forget-modify', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'  => $id,
            'mobile'    => $mobile,
            'email'     => $email
        ]);
    }

    public function getPassword($id, $type, $email) {
//        $id = \request('user_id');
//        $type = \request('type');
//        $email = \request('email');
        if($type != 'parent') {
            return view('login/password', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'type'         => $type,
                'email'        => $email
            ]);
        }
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        return view('login/parent-password', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'           => $id,
            'type'         => $type,
            'email'        => $email,
            'login' => 'register',
            'prefectures' => $prefectureList
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


        session()->forget(SESS_UID);
        session()->put(SESS_GARDEN_ID,        $user->garden_id);
        session()->put(SESS_USER_ID,        $user->id);
        session()->put(SESS_USERNAME,        $user->first_name);
        $url = session()->get('redirect_url');

        if(isset($url) || $url !== null) {
            session()->forget('redirect_url');
            return response()->json([
                'status' => true,
                'redirect_url' => $url,
            ]);
        }
        return response()->json([
            'status' => true,
        ]);


    }

    public function sendMail($id, $email, $token, $type, $name) {
        $comment = '';
        if($type == 'forget'){
            $title = '【KODOMORE】パスワード再設定について';
            $url = 'forget/modify/'. $id . '/' . $email;
        }
        else if($type == 'modify'){
            $title = '【KODOMORE】会員情報変更確認';
            $url = 'parent/my-page';
        }
        else{
            $title = '【KODOMORE】会員登録のお申込み受付済';
            $url = 'register/password/' . $id . '/' . $type . '/' . $email;
        }

        $userModel = new UserModel();
        $userModel->saveMessageHistory($id, $email, $token, $type, $name);

        //$title = '件名／【KODOMORE】パスワード再設定について';

        $data = array('token'=> $token, 'name' => $name, 'url' => $url);
//        $data['token'] = $token;
//        $data['name'] = $name;
//        $data['url'] = $url;
        $mailAddress = config('mail.from.address');
        $mailName = config('mail.from.name');
        try {
            Mail::send('login/mail', $data, function($message) use ($title, $email, $mailAddress, $mailName) {
                $message->from($mailAddress, $mailName);
                $message->to($email, 'Admin');
                $message->subject($title);
            });
//            Mail::send('test/login/mail', $data, function($message) use ($title, $email) {
//                $message->from(env("MAIL_USERNAME"), 'Kodomore Admin');
//                $message->to($email);
//                $message->subject($title);
//            });
        } catch (\Throwable  $exception) {
            Log::info("not:".$exception);
        }
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

        return view('login/forget-complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'name'  => $name,
            'mobile'    => $mobile,
            'email'     => $email,
            'id'        => $id,
            'login' => 'register'
        ]);
    }

    public function forgetModify() {
        $id = \request('id');
        $mobile = \request('mobile');
        $email = \request('email');
        return view('login/forget-modify', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'  => $id,
            'mobile'    => $mobile,
            'email'     => $email,
            'login' => 'register'
        ]);
    }

    public function forgetFinal() {
        return view('login/forget-final', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }

    public function saveGarden() {
        $garden_id = \request('garden_id');
        session()->put(SESS_GARDEN_ID,        $garden_id);
        return response()->json([
            'status' => true,
        ]);
    }

    public function signIn() {
        log::info("Sign In User");
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
        if($user->type === 'super'){
            session()->forget(SESS_UID);
            session()->put(SUPER_USER, 'true');
            session()->put(SESS_USER_ID,        $user->id);
            session()->put(SESS_USERNAME,        $user->first_name);
        }
        else{
            session()->put(SUPER_USER, 'false');
            session()->forget(SESS_GARDEN_ID);
            session()->forget(SESS_USER_ID);
            session()->forget(SESS_USERNAME);
        }




        $url = session()->get('redirect_url');
        if(isset($url) || $url !== null) {
            log::info("Forget session ".$url);
            session()->forget('redirect_url');
            if(str_contains($url, 'articles/post/comment')){

                return response()->json([
                    'status' => 'parent',
                    'redirect_url' => 'article-comment',
                ]);
            }

            if($user->type === 'parent'){
                //return redirect()->intended('/test/parent/my-page');
                return response()->json([
                    'status' => 'parent',
                    'redirect_url' => $url,
                ]);
            }

            if($user->type == 'super' && str_contains($url, 'modify_from')){
                $arr = explode('/', $url);
                $garden_id = $arr[count($arr)-1];

                session()->put(SESS_GARDEN_ID, $garden_id);
                return response()->json([
                    'status' => true,
                    'redirect_url' => 'admin/school/detail',
                ]);
            }
            return response()->json([
                'status' => true,
                'redirect_url' => $url,
            ]);
        }

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
        $messageList = $userModel->getMessageHistory($user_id, 'time');
        //$gardenList = $userModel -> getFavouriteGardenList($user_id, $order);

        $un_cnt = 0;
        foreach ($messageList as $item){
            if($item->read_status === '0'){
                $un_cnt++;
            }
        }
        return view('parent/my-page', [
            'user'  => $user,
            'message_cnt' => $un_cnt,
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
        return view('parent/confirm', [
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
        $old_pw = \request('code');

        $userModel = new UserModel();
        if(!empty($pw)){
            $chkPw = $userModel -> checkUserPw($user_id, $old_pw);
            if($chkPw == false){
                return response()->json([
                    'status' => 'pw',
                ]);
            }
        }
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
        return view('parent/exit', [
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
        return view('parent/exit-complete', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }

    public function cancelPage() {
        return view('parent/cancel', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function cancelCompletePage(Request $request) {
        return view('parent/cancel-complete', [
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
            $garden->tagList = $schoolModel->getTagList($garden->garden_id);
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


        return view('parent/question-list', [
            'gardenList' => $gardenList,
            'login' => 'none',
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }


    public function showFListPage() {
        return view('parent/favourite-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showSearchListPage() {
        return view('parent/search-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showEventListPage() {
        return view('parent/event-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showMailListPage() {
        return view('parent/mail-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showBlogListPage() {
        return view('parent/blog-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showWebListPage() {
        return view('parent/web-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showDataListPage() {
        return view('parent/data-list', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showHotLinePage() {
        return view('parent/hot-line', [
            'login' => 'none',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }
    public function showPersonalChatPage() {
        return view('parent/personal-chat', [
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
            $tagList = $schoolModel -> getTagList($garden->garden_id);
            $garden->tagList = $tagList;
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


        return view('parent/favourite-list-item', [
            'gardenList' => $gardenList,
            'login' => 'none',
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
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
        $visitList = $schoolModel -> getVisitHistory($user_id, $order);
        $gardenIdList = [];
        foreach ($visitList as $garden) {
            $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
            $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
            $typeList = $schoolModel -> getTypeList($garden -> garden_id);
            $garden->tagList = $schoolModel->getTagList($garden->garden_id);
            $garden->created_at = str_replace('-', '.', $garden->created_at);

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

        $total = count($visitList);
        $start = ($currentPage - 1) * $perPage;
        $visitList = array_slice($visitList, $start, $perPage);

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


        return view('parent/search-list-item', [
            'gardenList' => $visitList,
            'login' => 'none',
            'total' => $total,
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
            $garden->tagList = $schoolModel->getTagList($garden->garden_id);

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


        return view('parent/event-list-item', [
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
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $messageList = $userModel->getMessageHistory($user_id, $order);
        //$gardenList = $userModel -> getFavouriteGardenList($user_id, $order);

        $un_cnt = 0;
        foreach ($messageList as $item){
            if($item->read_status === '0'){
                $un_cnt++;
            }
        }

        $total = count($messageList);
        $start = ($currentPage - 1) * $perPage;
        $gardenList = array_slice($messageList, $start, $perPage);

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


        return view('parent/mail-list-item', [
            'messageList' => $messageList,
            'login' => 'none',
            'un_cnt' => $un_cnt,
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


        return view('parent/blog-list-item', [

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
            $garden->tagList = $schoolModel->getTagList($garden->garden_id);
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


        return view('parent/web-list-item', [
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
            $garden->tagList = $schoolModel->getTagList($garden->garden_id);
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


        return view('parent/data-list-item', [
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
                $garden->tagList = $schoolModel->getTagList($garden->garden_id);
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

        return view('parent/children-list', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'login' => 'none',
            'children' => $children,
        ]);
    }


    public function logout()
    {
        session()->forget(SESS_UID);
        session()->forget(SESS_GARDEN_ID);
        session()->forget(SUPER_USER);
        return response()->json([
            'status' => true,
        ]);
    }

    public function adminLogout()
    {
        session()->forget(SESS_UID);
        session()->forget(SESS_GARDEN_ID);
        session()->forget(SESS_USER_ID);
        session()->forget(SUPER_USER);
        return response()->json([
            'status' => true,
        ]);
    }

    public function registerNormal()
    {

        return view('login/register-normal', [
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


        return view('login/register-normal-confirm', [
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
        return view('login/register-garden', [
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
        return view('login/register-garden-confirm', [
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
        return view('login/register-public', [
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


        return view('login/register-public-confirm', [
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
        return view('login/register-parent', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'login' => 'register',
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
        $nickname = \request('nickname');
        $contact_type = \request('contact_type');
        $genderArray = ['', '女性', '男性', '無回答'];
        $oldArray = ['', '10代', '20代', '30代', '40代', '50代', '60代'];
        return view('login/register-parent-confirm', [
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
            'nickname' => $nickname,
            'contact_type' => $contact_type,
            'email' => $email,
            'login' => 'register',
        ]);
    }

    public function password() {
        $id = \request('user_id');
        $type = \request('type');
        $email = \request('email');
        if($type != 'parent') {
            return view('login/password', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'type'         => $type,
                'email'        => $email,
                'login' => 'register'
            ]);
        }
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        return view('login/parent-password', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'           => $id,
            'type'         => $type,
            'email'        => $email,
            'prefectures' => $prefectureList,
            'login' => 'register'
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
        return view('login/confirm', [
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
            return view('login/complete', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'email'        => $email,
                'type'         => 'normal',
                'login' => 'register'
            ]);
        } else if($type == 'garden') {
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
            return view('login/complete', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'email'        => $email,
                'type'         => 'garden',
                'login' => 'register'
            ]);
        } else if($type == 'public') {
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
            return view('login/complete', [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
                'id'           => $id,
                'email'        => $email,
                'type'         => 'public',
                'login' => 'register'
            ]);
        }

        return view('login/complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'id'           => $id,
            'email'        => $email,
            'type'         => 'parent',
            'login' => 'register'
        ]);
    }

    public function modifyPassword() {
        $id = \request('id');
        $password = \request('password');
        $email = \request('email');
        $code = \request('code');
        $userModel = new UserModel();
        $token = $userModel -> getToken($email);
        $correctCode = $token->token;
        $now = Date('Y-m-d H:i:s');
        $ts1 = strtotime($token->created_at);
        $ts2 = strtotime($now);
        $seconds_diff = $ts2 - $ts1;
        $time = ($seconds_diff/3600);
        if($time > 24){
            $userModel->deleteUserByOnlyEmail($email);
            return response()->json([
                'status' => 'over'
            ]);
        }
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
        return view('login/register-child-confirm', [
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
            'childDetails' => $childDetails,
            'login' => 'register',
        ]);
    }

    public function childRegister() {
        return view('login/child');
    }

    public function registerFinal() {
        return view('login/final',
            [
                'menuComments' => ['コドモア', 'KIDS & JUNIOR'],]);
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
        return view('login/final');
    }

    public function registerRepublic() {
        return view('login/register-republic', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],


        ]);
    }

    public function registerRepublicSearch() {
        $name = \request('name');
        return view('login/register-republic-search', [
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

        return view('login/register-republic-modify', [
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
        return view('login/register-republic-modify-user', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'photo_attachment' => $file
        ]);
    }

    public function cmpMedia($a, $b)
    {
        if ($a -> order == $b -> order) {
            return 0;
        }
        return ($a -> order < $b -> order) ? -1 : 1;
    }

    public function registerRepublicConfirm() {
        return view('login/register-republic-confirm', [
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
        try {
            Mail::send('login/mail-complete', $data, function($message) use ($title, $email) {
                $message->from(env("MAIL_USERNAME"), 'Kodomore Admin');
                $message->to($email);
                $message->subject($title);
            });
        } catch (\Throwable  $exception) {
            Log::info($exception);
        }

        return view('login/register-republic-complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }

    public function saveImage(Request $request, $name) {
        $fileName = "";
        Log::info($name);

        //リクエストにファイルが存在しているかの確認
        if ($request->hasFile($name)) {
            Log::info("Receive file");
            //保存先指定
            $image_storage = config("filesystems.disks.garden_storage");
            
            //拡張子取得
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





}
