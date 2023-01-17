<?php

namespace App\Http\Controllers;

use App\Model\HomeModel;
use App\Model\MediaModel;
use App\Model\NewsModel;
use App\Model\SchoolModel;
use App\Model\UserModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Cast\Object_;

class SchoolListController extends Controller
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
    public function index($prefecture_id)
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

        return view('school/main', [
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

        return view('school/list-info', [
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
    public function showSchoolListWithType($prefecture_id, $garden_type) {
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
        $type_id = '';
        foreach ($typeCount as $item){
            if($item->type_name == $garden_type){
                $type_id = $item->type_id;
            }
        }
        $newsModel = new NewsModel();
        $newsList = $newsModel -> getNewsListByPrefecture($prefecture_id);
        $articleList = $newsModel -> getArticlesListByPrefecture($prefecture_id);
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

        return view('school/list-info', [
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
            'garden_type' => $type_id,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function createSchool() {
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        return view('school/create', [
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
        return view('school/add-data', [
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
        $prefecture_name = \request('prefecture');
        $city = \request('city');
        $city_name = \request('city');
        $town = \request('town');
        $address = \request('address');
        $mobile = \request('mobile');
        $url = \request('url');
        $schoolModel = new SchoolModel();
        $gardenList = $schoolModel -> getGardenListByAddress($city, $town, $address, $mobile);
        foreach ($gardenList as $garden){
            $typeList = $schoolModel -> getTypeList($garden->garden_id);
            $garden-> typeList = $typeList;
        }

        $homeModel = new HomeModel();

        return view('school/confirm', [
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
        return view('review/post-review', [
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

        return view('review/modify-review', [
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
        return view('review/delete-confirm', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,
            'review_id' => $review_id
        ]);
    }
    public function deleteFinishReview(){

        $review_id = \request('review_id');
        $schoolModel = new SchoolModel();
        $schoolModel->deleteReview($review_id);

        return view('review/finish-delete', [
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

    public function followComment(){
        $comment_id = \request('comment_id');
        $user_id = session()->get(SESS_UID);
        $newsModel = new NewsModel();
        $newsModel->followComment($user_id, $comment_id);
        return response()->json([
            'status' => true,
        ]);
    }
    public function followNewsComment(){
        $comment_id = \request('comment_id');
        $user_id = session()->get(SESS_UID);
        $newsModel = new NewsModel();
        $newsModel->followNewsComment($user_id, $comment_id);
        return response()->json([
            'status' => true,
        ]);
    }
    public function changeStarComment(){
        $review_id = \request('comment_id');
        $type = \request('type');
        $schoolModel = new SchoolModel();
        $review = $schoolModel -> getCommentByCommentId($review_id);

        $attention = $review[0]->attention;
        $help = $review[0]->help;
        if($type == 'attention'){
            $attention += 1;
            $schoolModel -> updateCommentAttention($review_id, $attention);
        }
        else{
            $help += 1;
            $schoolModel -> updateCommentHelp($review_id, $help);
        }

        return response()->json([
            'status' => true,
        ]);
    }
    public function changeStarNewsComment(){
        $review_id = \request('comment_id');
        $type = \request('type');
        $schoolModel = new SchoolModel();
        $review = $schoolModel -> getNewsCommentByCommentId($review_id);

        $attention = $review[0]->attention;
        $help = $review[0]->help;
        if($type == 'attention'){
            $attention += 1;
            $schoolModel -> updateNewsCommentAttention($review_id, $attention);
        }
        else{
            $help += 1;
            $schoolModel -> updateNewsCommentHelp($review_id, $help);
        }

        return response()->json([
            'status' => true,
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

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('review/require-delete', [
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

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('review/require-view', [
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


        return view('review/require-confirm', [
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

        return view('review/require-finish', [
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

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('review/replay-review', [
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

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('review/replay-view', [
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

        return view('review/replay-finish', [
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

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $review->reflect = $schoolModel->getReviewReflect($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('review/school-review', [
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

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $review->reflect = $schoolModel->getReviewReflect($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('review/school-view', [
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

        return view('review/replay-finish', [
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

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $review->reflect = $schoolModel->getReviewReflect($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('review/user-review', [
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

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);
        $review->relation_text = $relation_text;
        $review->image = $schoolModel->getReviewImage($review->id);
        $review->reflect = $schoolModel->getReviewReflect($review->id);
        $user_id = $review->user_id;
        $user = $userModel -> getUserById($user_id);
        return view('review/user-view', [
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

        return view('review/user-finish', [
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

        return view('review/warn-admin', [
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

        return view('review/finish-warn', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
        ]);
    }
    public function postConfirm(){
        $homeModel = new HomeModel();
        $prefectureList = $homeModel -> getAllPrefecture();
        $user_id = session()->get(SESS_UID);
        $userModel = new UserModel();
        $user = $userModel -> getUserById($user_id);
        return view('review/confirm-review', [
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

//        print_r($rate);
//        die();

        $total_rate = floor($sum/8*10) /10;
        $total_text = \request('rate_text');
        $title = \request('title');


        $profile_img_setting = \request('img_public_index');
        $relation_type = \request('garden_rel_index');
        $relation_value = \request('rel_' . $relation_type);

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);



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

        return view('review/confirm-review', [
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

//        print_r($rate);
//        die();

        $total_rate = floor($sum/8*10) /10;
        $total_text = \request('rate_text');
        $title = \request('title');


        $profile_img_setting = \request('img_public_index');
        $relation_type = \request('garden_rel_index');
        $relation_value = \request('rel_' . $relation_type);

        $relation_text = $schoolModel -> checkRelationType($relation_type, $relation_value);



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

        return view('review/modify-confirm', [
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
        return view('review/finish-review', [
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

        return view('review/finish-modify', [
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

        return view('review/finish-review', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'user' => $user,
            'garden_id' => $garden_id,

        ]);
    }

    public function createSchoolComplete() {
        return view('school/complete', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
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

        return view('school/modify', [
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

        return view('school/modify', [
            'tagList' => $tagList,
            'garden' => $garden,
            'from' => 'detail',
            'menuComments' => ['コドモア', 'KIDS & JUNIOR']
        ]);
    }

    public function normalModifyComplete() {
        return view('school/modify-complete', [
            'menuComments' =>  ['コドモア', 'KIDS & JUNIOR'],
        ]);
    }


    public function getPhotoList() {
        $garden_id = \request('garden_id');
        $current = \request('currentPage');
        $schoolModel = new SchoolModel();
        $imageList = $schoolModel -> getGardenImageList($garden_id);
        $garden = $schoolModel -> getGardenInfoById($garden_id);
        $garden = $garden[0];
        $total = count($imageList);
        $start = ($current - 1) * 30;
        $last = floor($total/30);
        $imageList = array_slice($imageList, $start, 30);
        return view('school/photo-list', [
            'imgList' => $imageList,
            'total' => $total,
            'garden' => $garden,
            'current' => $current,
            'start' => $start,
            'last' => $last,
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
            $review = $schoolModel -> getReviewByGardenId($garden->garden_id);
            $garden->review = count($review);

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
            if(in_array($garden->garden_id, $gardenFavouriteList)){
                $garden->favourite = 1;
            }
            else{
                $garden->favourite = 0;
            }
            if(count($imgList) == 0) {
                $imgList = [];
            }
            $garden -> tagList = $tagList;
            $garden -> keywordList = $keywordList;
            $garden -> experienceList = $experienceList;
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

        return view('school/list', [
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
        return view('login/register-school-republic', [
            'gardenList' => $gardenList,
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

    public function getSchoolDetail($gardenId) {
        $schoolModel = new SchoolModel();
        //$gardenId = session()->get(SESS_GARDEN_ID);
        $typeList = $schoolModel -> getTypeListByGardenId($gardenId);
        $relateTypeList = $schoolModel -> getTypeList($gardenId);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $gardenFeatures = $schoolModel -> getSchoolFeature($gardenId);
        $gardenTimes = $schoolModel -> getSchoolGardenTime($gardenId);
        $gardenCloseDays = $schoolModel -> getSchoolCloseDay($gardenId);
        
        if(isset($gardenTimes)) {
            $key = 'time_kind';
            $gardenTimesResults = [];
            $gardenTimesResultsRemark = [];
            foreach($gardenTimes as $gardenTime) {
                //大カテゴリごとに配列にまとめる
                $gardenTimesResults[$gardenTime->$key][] = $gardenTime;
                //備考があれば格納
                if(isset($gardenTime->remark)) {
                    $gardenTimesResultsRemark['remark'] = $gardenTime->remark;
                }
                //displayの値を格納
                //1 => 文言出力
                //NULL => 出力なし
                if(isset($gardenTime->display)) {
                    $gardenTimesResultsRemark['display'] = $gardenTime->display;
                }
            }
        }
        $garden = $garden[0];

        if($garden->start_age == "無選択"){
            $garden->start_age = " ";
        }
        if($garden->start_month == "無選択"){
            $garden->start_month = " ";
        }
        if($garden->end_age == "無選択"){
            $garden->end_age = " ";
        }
        if($garden->end_month == "無選択"){
            $garden->end_month = " ";
        }

        $tagList = $schoolModel -> getTagList($garden -> garden_id);
        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $topImgListTmp = $schoolModel -> getGardenTopImageList($garden -> garden_id);
        $noficationList = $schoolModel -> getNotificationList($garden->garden_id);
        $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
        $goodsList = $schoolModel -> getGoodsList($garden -> garden_id);
        $uniformList = $schoolModel -> getMainUniformImageByGardenId($garden -> garden_id);
        $reviewList = $schoolModel -> getReviewByGardenId($garden -> garden_id);
        $faqList = $schoolModel -> getFaqList($garden -> garden_id);
        $priceList = $schoolModel -> getPriceList($garden-> garden_id);
        $featureList = $schoolModel -> getSchoolFeature($garden-> garden_id); //学園特徴取得
        $timesListTmp = $schoolModel -> getSchoolGardenTime($garden-> garden_id); //預かり時間取得
        $closeDaysList = $schoolModel -> getSchoolCloseDay($garden-> garden_id); //休園日取得
        $timesRemarkList = $schoolModel -> getSchoolGardenRemark($garden-> garden_id); //備考+表示フラグ
        $seriesList = $schoolModel -> getSchoolSeries($garden-> garden_id); //系列園取得
        $detailList = $schoolModel -> getSchoolJoinDetail($garden -> garden_id); //入園について取得

        //預かり時間情報配列操作
        if(isset($timesListTmp)) {
            $key = 'time_kind';
            $timesList = [];
            foreach($timesListTmp as $time) {
                //大カテゴリごとに配列にまとめる
                $timesList[$time->$key][] = $time;
            }
        }
        
        $user_id = session()->get(SESS_UID);
        $topImgList = array();
        foreach($topImgListTmp as $index => $img){
            if($index < 5){
                $topImgList[$index] = $img;
            }
        }

        $cnt = count($imgList);
        if($user_id !== ''){

            $favouriteList = $schoolModel->getUserPhotoFavourite($user_id);

            $schoolModel->saveVisitGarden($user_id, $garden -> garden_id);

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
//        if(count($keywordList) == 0) {
//            $keywordList = [];
//        } else {
//            $isBreak = false;
//            $breakKeyword = null;
//            foreach($keywordList as $keyword) {
//                if($keyword -> keyword_id == 1) {
//                    $breakKeyword = $keyword;
//                    $isBreak = true;
//                }
//            }
//            if($isBreak == true) {
//                $keywordList = [];
//                array_push($keywordList, $breakKeyword);
//            }
//        }
        $garden -> tagList = $tagList;
        $garden -> typeList = $relateTypeList;
        $garden -> keywordList = $keywordList;
        $garden -> goodsList = $goodsList;
        $garden -> priceList = $priceList;
        $garden -> featureList = $featureList; //学園特徴
        $garden -> timesList = $timesList; //預かり時間
        $garden -> closeDaysList = $closeDaysList; //預かり時間
        $garden -> timesRemarkList = $timesRemarkList; //備考＋表示フラグ
        $garden -> seriesList = $seriesList; //系列園
        $garden -> detailList = $detailList; //入園について

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

        
        return view('school/detail', [
            'typeList' => $typeList,
            'imgList' => $imgList,
            'topImgList' => $topImgList,
            'noficationList' => $noficationList,
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
            'gardenFeatures' => $gardenFeatures,
            'gardenTimesResults' => $gardenTimesResults,
            'gardenTimesResultsRemark' => $gardenTimesResultsRemark,
            'gardenCloseDays' => $gardenCloseDays,
            'menuComments' => ['コドモア KIDS']
        ]);
    }
    public function showSchoolDetailPreview($gardenId) {
        $schoolModel = new SchoolModel();
        $typeList = $schoolModel -> getTypeListByGardenId($gardenId);
        $relateTypeList = $schoolModel -> getTypeList($gardenId);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $tagList = $schoolModel -> getTagList($garden -> garden_id);
        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $topImgList = $schoolModel -> getGardenTopImageList($garden -> garden_id);
        $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
        $goodsList = $schoolModel -> getGoodsList($garden -> garden_id);

        $cnt = count($imgList);



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

        return view('admin/school/detail-preview', [
            'typeList' => $typeList,
            'imgList' => $imgList,
            'topImgList' => $topImgList,
            'tagList' => $tagList,
            'garden' => $garden,
            'menuComments' => ['コドモア KIDS']
        ]);
    }
    public function showAdminSchoolTagPreview($gardenId) {
        $schoolModel = new SchoolModel();
        $typeList = $schoolModel -> getTypeListByGardenId($gardenId);
        $relateTypeList = $schoolModel -> getTypeList($gardenId);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $tagList = $schoolModel -> getTagList($garden -> garden_id);
        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $topImgList = $schoolModel -> getGardenTopImageList($garden -> garden_id);
        $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
        $goodsList = $schoolModel -> getGoodsList($garden -> garden_id);
        $noficationList = $schoolModel -> getNotificationList($garden->garden_id);

        $cnt = count($imgList);



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

        return view('admin/school/tag-preview', [
            'typeList' => $typeList,
            'imgList' => $imgList,
            'topImgList' => $topImgList,
            'noficationList' => $noficationList,
            'tagList' => $tagList,
            'garden' => $garden,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function showAdminSchoolMetaPreview($gardenId) {
        $schoolModel = new SchoolModel();
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $topImgList = $schoolModel -> getGardenTopImageList($garden -> garden_id);

        return view('admin/school/meta-preview', [
            'imgList' => $imgList,
            'topImgList' => $topImgList,
            'garden' => $garden,
            'menuComments' => ['コドモア KIDS']
        ]);
    }

    public function showAdminSchoolPricePreview($gardenId) {
        $schoolModel = new SchoolModel();
        $typeList = $schoolModel -> getTypeListByGardenId($gardenId);
        $relateTypeList = $schoolModel -> getTypeList($gardenId);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $tagList = $schoolModel -> getTagList($garden -> garden_id);
        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $topImgList = $schoolModel -> getGardenTopImageList($garden -> garden_id);
        $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
        $goodsList = $schoolModel -> getGoodsList($garden -> garden_id);
        $noficationList = $schoolModel -> getNotificationList($garden->garden_id);

        $cnt = count($imgList);



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

        return view('admin/school/price-preview', [
            'typeList' => $typeList,
            'imgList' => $imgList,
            'topImgList' => $topImgList,
            'noficationList' => $noficationList,
            'tagList' => $tagList,
            'garden' => $garden,
            'menuComments' => ['コドモア KIDS']
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

//    public function getSchoolDetail1($gardenId) {
//        $schoolModel = new SchoolModel();
//        $typeList = $schoolModel -> getTypeListByGardenId($gardenId);
//        $relateTypeList = $schoolModel -> getTypeList($gardenId);
//        $garden = $schoolModel -> getGardenInfoById($gardenId);
//        $garden = $garden[0];
//        $tagList = $schoolModel -> getTagList($garden -> garden_id);
//        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
//        $keywordList = $schoolModel -> getKeywordList($garden -> garden_id);
//        $goodsList = $schoolModel -> getGoodsList($garden -> garden_id);
//        if(count($goodsList) == 0) {
//            $goodsList = [];
//        }
//        if(count($keywordList) == 0) {
//            $keywordList = [];
//        } else {
//            $isBreak = false;
//            $breakKeyword = null;
//            foreach($keywordList as $keyword) {
//                if($keyword -> keyword_id == 1) {
//                    $breakKeyword = $keyword;
//                    $isBreak = true;
//                }
//            }
//            if($isBreak == true) {
//                $keywordList = [];
//                array_push($keywordList, $breakKeyword);
//            }
//        }
//        $garden -> tagList = $tagList;
//        $garden -> typeList = $relateTypeList;
//        $garden -> keywordList = $keywordList;
//        $garden -> goodsList = $goodsList;
//
//        return view('school/detail', [
//            'typeList' => $typeList,
//            'imgList' => $imgList,
//            'tagList' => $tagList,
//            'garden' => $garden,
//            'menuComments' => ['コドモア KIDS']
//        ]);
//    }

    public function showNewsList($prefecture_id, $currentPage) {
        $schoolModel = new SchoolModel();
        $newsModel = new NewsModel();
        $homeModel = new HomeModel();
        $prefecture = $homeModel -> getPrefectureInfo($prefecture_id);
        $prefecture = $prefecture[0];
        $newsList = $newsModel -> getNewsListByPrefecture($prefecture_id);
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

    public function showArticlesProfile(){
        $user_id = session()->get(SESS_UID);
        $newsModel = new NewsModel();
        $user_profile = $newsModel->getProfile($user_id);
        $user = '';
        if(empty($user_profile)){
            $userModel = new UserModel();
            $user = $userModel->getUserById($user_id);
        }
        return view('articles.profile', [
            'user_profile' => $user_profile,
            'user' => $user,
            'menuComments' => ['コドモア KIDS']
        ]);
    }
    public function showNewsProfile(){
        $user_id = session()->get(SESS_UID);
        $newsModel = new NewsModel();
        $user_profile = $newsModel->getNewsProfile($user_id);
        $user = '';
        if(empty($user_profile)){
            $userModel = new UserModel();
            $user = $userModel->getUserById($user_id);
        }
        return view('news.profile', [
            'user_profile' => $user_profile,
            'user' => $user,
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
        foreach ($articlesList as $new){
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
        return view('articles/list-info', [
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

    public function postArticlesComment(){
        $comment_id = \request('comment_id');
        $content = \request('content');
        if(!empty($comment_id)){
            $newsModel = new NewsModel();
            $newsModel->updateArticleComment($comment_id, $content);
            return response()->json([
                'status' => true
            ]);
        }
        $article_id = \request('article_id');
        $user_id = \request('user_id');
        $user_name = \request('user_name');

        $created_at = Date('Y-m-d h:m:s');
        $newsModel = new NewsModel();
        $newsModel->insertArticleComment($article_id, $user_id, $user_name, $content, $created_at);
        return response()->json([
            'status' => true
        ]);
    }
    public function postNewsComment(){
        $comment_id = \request('comment_id');
        $content = \request('content');
        if(!empty($comment_id)){
            $newsModel = new NewsModel();
            $newsModel->updateNewsComment($comment_id, $content);
            return response()->json([
                'status' => true
            ]);
        }
        $article_id = \request('news_id');
        $user_id = \request('user_id');
        $user_name = \request('user_name');

        $created_at = Date('Y-m-d h:m:s');
        $newsModel = new NewsModel();
        $newsModel->insertNewsComment($article_id, $user_id, $user_name, $content, $created_at);
        return response()->json([
            'status' => true
        ]);
    }

    public function deleteArticlesComment(){
        $comment_id = \request('comment_id');
        $newsModel = new NewsModel();
        $newsModel->deleteArticleComment($comment_id);
    }
    public function deleteNewsComment(){
        $comment_id = \request('comment_id');
        $newsModel = new NewsModel();
        $newsModel->deleteNewsComment($comment_id);
    }

    public function getArticlesCommentList(){
        $article_id = \request('article_id');
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $newsModel = new NewsModel();
        $commentList = $newsModel->getArticlesCommentById($article_id, $order);
        foreach ($commentList as $comment){
            $post_user_id = $comment->user_id;
            $profile_user = $newsModel->getProfile($post_user_id);
            $post_date = $comment->updated_at;
            $create_date = strtotime($post_date);
            $cur_date = strtotime(date('Y-m-d H:m:s'));
            $diff = ($cur_date - $create_date)/60;
            if($diff<60){
                $comment->display_time = floor($diff).'分前';
            }else{
                $diff = ($cur_date - $create_date)/60/60;
                if($diff<24){
                    $comment->display_time = floor($diff).'時間前';
                }
                else{
                    $comment->display_time = date('Y-m-d', strtotime($post_date));
                }
            }


            if(empty($profile_user)){
                $userModel = new UserModel();
                $user = $userModel->getUserById($post_user_id);
                $comment->post_name = $user->first_name;
                $comment->second_name = $user->second_name;
                $comment->profile_img ='';
                $comment->second_setting = 1;
            }
            else{
                $comment->post_name = $profile_user->post_name;
                $comment->second_name = $profile_user->second_name;
                $comment->profile_img = $profile_user->profile_img;
                $comment->second_setting = $profile_user->second_name_setting;
            }

        }
        $total = count($commentList);
        $start = ($currentPage - 1) * $perPage;
        $commentList = array_slice($commentList, $start, $perPage);

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
        return view('articles.comment-list', [
            'commentList' => $commentList,
            'login' => 'none',
            'total' => $total,
            'order' => $order,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }
    public function getNewsCommentList(){
        $article_id = \request('news_id');
        $order = \request('order');
        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $newsModel = new NewsModel();
        $commentList = $newsModel->getNewsCommentById($article_id, $order);
        foreach ($commentList as $comment){
            $post_user_id = $comment->user_id;
            $profile_user = $newsModel->getNewsProfile($post_user_id);
            $post_date = $comment->updated_at;
            $create_date = strtotime($post_date);
            $cur_date = strtotime(date('Y-m-d H:m:s'));
            $diff = ($cur_date - $create_date)/60;
            if($diff<60){
                $comment->display_time = floor($diff).'分前';
            }else{
                $diff = ($cur_date - $create_date)/60/60;
                if($diff<24){
                    $comment->display_time = floor($diff).'時間前';
                }
                else{
                    $comment->display_time = date('Y-m-d', strtotime($post_date));
                }
            }


            if(empty($profile_user)){
                $userModel = new UserModel();
                $user = $userModel->getUserById($post_user_id);
                $comment->post_name = $user->first_name;
                $comment->second_name = $user->second_name;
                $comment->profile_img ='';
                $comment->second_setting = 1;
            }
            else{
                $comment->post_name = $profile_user->post_name;
                $comment->second_name = $profile_user->second_name;
                $comment->profile_img = $profile_user->profile_img;
                $comment->second_setting = $profile_user->second_name_setting;
            }

        }
        $total = count($commentList);
        $start = ($currentPage - 1) * $perPage;
        $commentList = array_slice($commentList, $start, $perPage);

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
        return view('news.comment-list', [
            'commentList' => $commentList,
            'login' => 'none',
            'total' => $total,
            'order' => $order,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }

    public function postArticlesProfile(Request $request){
        $user_id = session()->get(SESS_UID);
        $post_name_setting = \request('img_caption_index');
        $second_name_setting = \request('img_name_index');
        $post_nickname = \request('post_nickname');
        $userModel = new  UserModel();
        $user = $userModel->getUserById($user_id);
        if($post_name_setting == '0'){
            $post_name = $user->first_name;
        }
        else{
            $post_name = $post_nickname;
        }
        $second_name = $user->second_name;

        $profile_img = $this->saveBasicImage($request, 'profile_img', 'articles/');
        if(empty($profile_img)){
            $profile_img = \request('profile_img_url');
        }
        $newsModel = new NewsModel();
        $newsModel->saveProfile($user_id, $post_name_setting, $post_name, $second_name_setting, $second_name, $profile_img);
        return response()->json([
            'status' => true
        ]);
    }

    public function postNewsProfile(Request $request){
        $user_id = session()->get(SESS_UID);
        $post_name_setting = \request('img_caption_index');
        $second_name_setting = \request('img_name_index');
        $post_nickname = \request('post_nickname');
        $userModel = new  UserModel();
        $user = $userModel->getUserById($user_id);
        if($post_name_setting == '0'){
            $post_name = $user->first_name;
        }
        else{
            $post_name = $post_nickname;
        }
        $second_name = $user->second_name;

        $profile_img = $this->saveBasicImage($request, 'profile_img', 'articles/');
        if(empty($profile_img)){
            $profile_img = \request('profile_img_url');
        }
        $newsModel = new NewsModel();
        $newsModel->saveNewsProfile($user_id, $post_name_setting, $post_name, $second_name_setting, $second_name, $profile_img);
        return response()->json([
            'status' => true
        ]);
    }

    public function getArticlesUserCommentList()
    {
        $user_id = session()->get(SESS_UID);
        $newsModel = new NewsModel();
        $commentList = $newsModel->getCommentByUserId($user_id);

        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $total = count($commentList);
        $start = ($currentPage - 1) * $perPage;
        $commentList = array_slice($commentList, $start, $perPage);

        if ($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if ($end > $total) {
            $end = $total;
        }
        return view('articles.comment-list-user', [
            'commentList' => $commentList,
            'login' => 'none',
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }

    public function getNewsUserCommentList()
    {
        $user_id = session()->get(SESS_UID);
        $newsModel = new NewsModel();
        $commentList = $newsModel->getNewsCommentByUserId($user_id);

        $currentPage = \request('currentPage');
        $perPage = \request('perPage');
        $total = count($commentList);
        $start = ($currentPage - 1) * $perPage;
        $commentList = array_slice($commentList, $start, $perPage);

        if ($total > 0) {
            $total = $total - 1 - ($total - 1) % $perPage;
            $total = $total / $perPage + 1;
        }
        $perShow = 3;
        $start = $currentPage - ($currentPage - 1) % $perShow;
        $end = $start + $perShow - 1;
        if ($end > $total) {
            $end = $total;
        }
        return view('news.comment-list-user', [
            'commentList' => $commentList,
            'login' => 'none',
            'total' => $total,
            'current' => $currentPage,
            'perShow' => $perShow,
            'start' => $start,
            'end' => $end,
        ]);
    }

    public function showArticlesDetail($articlesId) {
        $newsModel = new NewsModel();
        $articleInfo = $newsModel -> getArticlesById($articlesId);
        $create_date = strtotime($articleInfo->post_date);
        $cur_date = strtotime(date('Y-m-d'));
        $diff = ($cur_date - $create_date)/60/60/24;
        $user_id = session()->get(SESS_UID);
        $newsModel = new NewsModel();
        $commentList = $newsModel->getArticlesCommentById($articlesId, 'new');
        $cnt = count($commentList);

        $user = '';
        if(isset($user_id)){
            $userModel = new UserModel();
            $user = $userModel -> getUserById($user_id);
        }


        if($diff>30){
            $articleInfo->is_new = false;
        }
        else{
            $articleInfo->is_new = true;
        }
        $prefecture_id = 21;
        $articlesList = $newsModel -> getArticlesListByPrefecture($prefecture_id);
        $contentLists = $newsModel -> getArticlesContentListByPrefecture($articlesId);
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
        return view('articles/detail', [
            'article' => $articleInfo,
            'contentLists' => $contentLists,
            'next' => $next,
            'user' => $user,
            'cnt' => $cnt,
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
        return view('media/list-info', [
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
        return view('media/detail', [
            'media' => $mediaInfo,
            'next' => $next,
            'previous' => $previous,
            'menuComments' => ['コドモア KIDS']
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


        return view('admin/school/post-list', [
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

    public function showAdminSchoolUniform(){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $image_type = UNIFORM_IMAGE_TYPE;
        $garden_image = $schoolModel -> getGardenImageByType($gardenId, $image_type);
        $image_sum_cnt = $schoolModel -> getImageCount($gardenId);



        return view('admin/school/uniform', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'image_type' => $image_type,
            'image_sum_cnt' => $image_sum_cnt,
            'garden_image' => $garden_image,
            'tab_name' => 'uniform',
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



        return view('admin/school/uniform', [
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



        return view('admin/school/uniform', [
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



        return view('admin/school/uniform', [
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

        return view('admin/school/media', [
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

        return view('admin/school/review', [
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

        return view('admin/school/post-create', [
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

        return view('admin/school/post-create', [
            'garden' => $garden,
            'media' => $mediaInfo,
            'menuComments' => ['コドモア KIDS']
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

        return view('admin/school/main-uniform', [
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
    public function showAdminMeta(){
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $metaInfo = $schoolModel -> getMetaInfoByGardenId($gardenId);
        $keywordList = $schoolModel->getTagList($gardenId);
        $keyword1 = '';
        $keyword2 = '';
        if(isset($keywordList[0])){
            $keyword1 = $keywordList[0];
        }
        if(isset($keywordList[1])){
            $keyword2 = $keywordList[1];
        }

        if(!empty($metaInfo)){
            $metaInfo = $metaInfo[0];
        }

        return view('admin/school/meta', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'metaInfo' => $metaInfo,
            'tab_name' => 'meta',
            'type' => 1,
            'keyword1' => $keyword1,
            'keyword2' => $keyword2
        ]);
    }

    public function modifyAdminMeta(Request $request){
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $tag_1 = \request('tag_1');
        $tag_2 = \request('tag_2');
        $tag_3 = \request('tag_3');
        $tag_4 = \request('tag_4');
        $tag_5 = \request('tag_5');
        $tag_6 = \request('tag_6');
        $tag_7 = \request('tag_7');
        $meta_title = \request('meta_title');
        $meta_description = \request('meta_description');
        $memo = \request('memo');
        $schoolModel->updateGardenMeta($gardenId, $tag_1, $tag_2, $tag_3, $tag_4, $tag_5, $tag_6, $tag_7, $meta_title, $meta_description, $memo);

        return response()->json([
            'status' => true
        ]);
    }


    public function showAdminSchoolPrice(){
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $priceList = $schoolModel -> getPriceList($gardenId);

        return view('admin/school/price', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'priceList' => $priceList,
            'tab_name' => 'price',
            'type' => 1,
        ]);
    }

    public function modifyAdminSchoolPrice(Request $request){
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $imgList = \request('origin_list');
        $imgLists = json_decode($imgList);
        $schoolModel->updateGardenPrice($gardenId, $imgLists);
        return response()->json([
            'status' => true
        ]);
    }


    public function showNewsDetail($newsId) {
        $newsModel = new NewsModel();
        $newsInfo = $newsModel -> getNewsById($newsId);
        $create_date = strtotime($newsInfo->created_at);
        $cur_date = strtotime(date('Y-m-d'));
        $diff = ($cur_date - $create_date)/60/60/24;
        $user_id = session()->get(SESS_UID);

        if($diff>30){
            $newsInfo->is_new = false;
        }
        else{
            $newsInfo->is_new = true;
        }
        $prefecture_id = 21;
        $newsList = $newsModel -> getNewsListByPrefecture($prefecture_id);
        $newsModel = new NewsModel();
        $commentList = $newsModel->getNewsCommentById($newsId, 'new');
        $cnt = count($commentList);
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
            'cnt' => $cnt,
            'previous' => $previous,
            'menuComments' => ['コドモア KIDS']
        ]);
    }



    public function getSchoolListInfo() {
        $schoolModel = new SchoolModel();
        $cityListStr = \request('cityList');
        $typeListStr = \request('typeList');
        $tagListStr = \request('tagList');
        $kind = \request('kind');
        $review = \request('review');

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
        return view('login/register-school', [
            'gardenList' => $gardenList,
            'review' => $review
        ]);
    }

    public function showAdminSchoolPhoto(){
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];
        $photo_images = $schoolModel -> getGardenPhotoByType($gardenId);
        $image_sum_cnt = $schoolModel -> getImageCount($gardenId);

        return view('admin/school/phpto-gallery', [
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

    public function showAdminSchoolFaqChildCare() {
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $faq_list = $schoolModel ->getGardenFaqByType($gardenId, 1);
        return view('admin/school/faq', [
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
        return view('admin/school/faq', [
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
        return view('admin/school/faq', [
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
        return view('admin/school/faq', [
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
        return view('admin/school/post-list', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'keywordList' => $keywordList,
            'garden' => $garden,
            'publicImgList' => $publicImgList,
            'privateImgList' => $privateImgList,
            'notificationList' => $notificationList
        ]);
    }

    public function createMediaPost(){
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
        $garden = $schoolModel -> getGardenInfoById($gardenId);

        $garden = $garden[0];

        return view('admin/school/post-create', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'garden' => $garden,
            'tab_name' => 'media-list',
        ]);

    }

    public function showAdminLogin() {
        return view('admin/login/login', [
        ]);
    }

    public function cmpMedia($a, $b)
    {
        if ($a -> order == $b -> order) {
            return 0;
        }
        return ($a -> order < $b -> order) ? -1 : 1;
    }

    public function showAdminSchoolDetail() {
        $gardenId = session()->get(SESS_GARDEN_ID);
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $userModal = new User();
        $garden = $schoolModel -> getGardenInfoById($gardenId);
        $garden = $garden[0];

        $imgList = $schoolModel -> getGardenImageList($garden -> garden_id);
        $tagList = $homeModel -> getAllTagByType();
        $keywordList = $schoolModel -> getWholeKeywordList($garden -> garden_id);

        $gardenTagList = $schoolModel -> getTagList($garden -> garden_id);
        $gardenDirList = $schoolModel -> getDirList($garden -> garden_id);

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
            if($img -> top == 1 && count($publicImgList)<5) {
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
        return view('admin/school/detail', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'keywordList' => $keywordList,
            'garden' => $garden,
            'publicImgList' => $publicImgList,
            'privateImgList' => $privateImgList,
            'notificationList' => $notificationList,
            'tagList' => $gardenTagList,
            'dirList' => $gardenDirList,
            'tab_name' => 'detail',
            'imageList' => $imgList,
        ]);
    }

    public function showAdminSchoolTag() {
        $homeModel = new HomeModel();
        $schoolModel = new SchoolModel();
        $gardenId = session()->get(SESS_GARDEN_ID);
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

        return view('admin/school/tag', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'tagList' => $tagList,
            'garden' => $garden,
            'tab_name' => 'tag'
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

        return view('admin/school/basic', [
            'menuComments' => ['コドモア', 'KIDS & JUNIOR'],
            'prefectures' => $prefectureList,
            'garden' => $garden,
            'tab_name' => 'basic',
            'typeList' => $typeList,
            'kindList' => $kindList
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

        $dirStr = \request('direction');
        $dirList = json_decode($dirStr);
        $schoolModel -> updateGardenDirection($garden_id, $dirList);

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
        //$recruitment_status = \request('recruitment_status');

        $schoolModel -> updateGardenDetail($garden_id, $comment_title, $comment_description, $reception_status, $reception_date, $map_setting, $map_iframe);
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
