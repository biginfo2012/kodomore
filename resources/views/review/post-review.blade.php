@extends('layouts.app')

@section('title')
    全国の幼稚園･保育所 入園､小学校･中学校･高校 入学と受験情報
@endsection

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>

        p {
            margin-bottom: 0px;
        }

        .search-body > .form-inline {
            background-color: white;
        }

        .img-top {
            position: absolute;
            right: 1rem;
            bottom: -1.5rem;
            width: 3rem;
        }

        .left_bar{
            position: absolute;
            left: 0;
            width: 0.4rem;
            height: 100%;
        }

        .sky-border {
            border: 2px solid #B6EEEC;
        }

        input{
            /*border: 1px solid #666666 !important;*/
        }
        .custom-control-label::before {
            top: 2.5px !important;
            left: -1.2rem !important;
        }
        .custom-control-label::after {
            top: 2.5px !important;
            left: -1.2rem !important;
        }
        .fa-icon-right {
            position: absolute;
            right: 1em;
        }

        .fa-icon-left {
            position: absolute;
            left: 0.2em;
        }

        .background-light-gray1{
            background-color: #E6F7F8 !important;
            margin-left: -8px;
            margin-right: -8px;
            }


</style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">ログイン</span> > クチコミレビュー投稿</p>

        </div>

        <div class="card-body text-title px-2">
            <img class="height-4 img-icon mb-1" src="{{asset('img/black-message.png')}}"> クチコミレビューを投稿しよう
            <p class="text-medium-xs pt-2">保育園･幼稚園･小学校･中学校 選びをしている保護者様のために､園や学校について教えてください｡</p>
            <p class="text-small pt-2">※クチコミレビューを投稿する際には<a class="menu-icon text-decoration" href="{{url('/blog-guide')}}">投稿ガイドライン</a>をご確認ください｡</p>
        </div>


        <div class="card-body py-1 px-2">

            <form class="needs-validation" novalidate id="validation_form" action="<?=url('/post/confirm');?>" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <p class="text-title background-dark-blue text-white p-1">投稿者情報</p>

                <div class="mt-2 background-light-gray">
                    <p class="text-small p-1 ">
                        お名前
                    </p>
                </div>
                <p class="text-medium-light mt-1">{{$user->first_name}}　{{$user->second_name}}</p>

                <div class="mt-2 background-light-gray">
                    <p class="text-small p-1">
                        フリガナ
                    </p>
                </div>
                <p class="text-medium-light mt-1">{{$user->first_name_huri}}　{{$user->second_name_huri}}</p>

                <input type="hidden" name="user_id" value="{{$user->id}}" >
                <input type="hidden" name="garden_id" value="{{$gardenDetail[0]->garden_id}}" >

                <div class="mt-2 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        投稿ネーム
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <p class="text-medium-light mt-2">この投稿ネームは画像の提供表記にも反映されます</p>
                <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                    <input type="radio" class="custom-control-input text-small" id="post_user_name_type0" value="0" name="img_caption_index" required>
                    <label class="custom-control-label text-medium-light" for="post_user_name_type0">上記本名を公開設定する</label>
                </div>

                <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                    <input type="radio" class="custom-control-input text-small" id="post_user_name_type1" value="1" name="img_caption_index" required>
                    <label class="custom-control-label text-medium-light" for="post_user_name_type1">ニックネームを公開設定する</label>
                </div>

                <input type="text" class="form-control text-small mt-2" id="post_nickname" name="post_nickname" placeholder="ニックネーム(15文字以内)(例： たろう)" maxlength="15" disabled style="width: 80% !important;">

                <div class="mt-4 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        プロフィール画像
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                    <input type="radio" class="custom-control-input text-small" id="img_public_index" value="1" name="img_public_index" required>
                    <label class="custom-control-label text-medium-light" for="img_public_index">登録画像を公開表示する</label>
                </div>

                <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                    <input type="radio" class="custom-control-input text-small" id="img_no_public_index" value="0" name="img_public_index" required>
                    <label class="custom-control-label text-medium-light" for="img_no_public_index">非公開表示にする</label>
                </div>

                <div class="mt-4 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        投稿者とスクールの関係［公開表示されます］
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <div class="row pb-1">
                    <div class="col-5 pr-1">
                        <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                            <input type="radio" class="custom-control-input text-small" id="rel_index_1" value="1" name="garden_rel_index" required>
                            <label class="custom-control-label text-medium-light" for="rel_index_1">在園 / 保護者</label>
                        </div>
                    </div>
                    <div class="col-7 pl-0 mt-1 select_contain">
                        <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-light" name="rel_1" disabled>
                            <option value="" selected style="color:#ced4da;">クラスを選んでください</option>
                            <option value="未満児">未満児</option>
                            <option value="年少">年少</option>
                            <option value="年中">年中</option>
                            <option value="年長">年長</option>
                        </select>
                    </div>
                </div>
                <div class="row pb-1">
                    <div class="col-5 pr-1">
                        <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                            <input type="radio" class="custom-control-input text-small" id="rel_index_2" value="2" name="garden_rel_index" required>
                            <label class="custom-control-label text-medium-light" for="rel_index_2">卒園 / 保護者</label>
                        </div>
                    </div>
                    <div class="col-7 pl-0 mt-1 select_contain">
                        <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-light" name="rel_2" disabled>
                            <option value="" selected style="color:#ced4da;">何年卒か選んでください</option>
                            @for($i = 2020; $i >=1900; $i--)
                                <option value="{{$i}}年">{{$i}}年</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row pb-1">
                    <div class="col-5 pr-1">
                        <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                            <input type="radio" class="custom-control-input text-small" id="rel_index_3" value="3" name="garden_rel_index" required>
                            <label class="custom-control-label text-medium-light" for="rel_index_3">卒園 / 本人</label>
                        </div>
                    </div>
                    <div class="col-7 pl-0 mt-1 select_contain">
                        <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-light" name="rel_3" disabled>
                            <option value="" selected style="color:#ced4da;">何年卒か選んでください</option>
                            @for($i = 2020; $i >=1900; $i--)
                                <option value="{{$i}}年">{{$i}}年</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row pb-1">
                    <div class="col-5 pr-1">
                        <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                            <input type="radio" class="custom-control-input text-small" id="rel_index_4" value="4" name="garden_rel_index" required>
                            <label class="custom-control-label text-medium-light" for="rel_index_4">在校 / 保護者</label>
                        </div>
                    </div>
                    <div class="col-7 pl-0 mt-1 select_contain">
                        <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-light" name="rel_4" disabled>
                            <option value="" selected style="color:#ced4da;">クラスを選んでください</option>
                            <option value="小学1年生">小学1年生</option>
                            <option value="小学2年生">小学2年生</option>
                            <option value="小学3年生">小学3年生</option>
                            <option value="小学4年生">小学4年生</option>
                            <option value="小学5年生">小学5年生</option>
                            <option value="小学6年生">小学6年生</option>
                            <option value="中学1年生">中学1年生</option>
                            <option value="中学2年生">中学2年生</option>
                            <option value="中学3年生">中学3年生</option>
                            <option value="高校1年生">高校1年生</option>
                            <option value="高校2年生">高校2年生</option>
                            <option value="高校3年生">高校3年生</option>
                        </select>
                    </div>
                </div>
                <div class="row pb-1">
                    <div class="col-5 pr-1">
                        <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                            <input type="radio" class="custom-control-input text-small" id="rel_index_5" value="5" name="garden_rel_index" required>
                            <label class="custom-control-label text-medium-light" for="rel_index_5">卒業 / 保護者</label>
                        </div>
                    </div>
                    <div class="col-7 pl-0 mt-1 select_contain">
                        <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-light" name="rel_5" disabled>
                            <option value="" selected style="color:#ced4da;">何年卒か選んでください</option>
                            @for($i = 2020; $i >=1900; $i--)
                                <option value="{{$i}}年">{{$i}}年</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row pb-1">
                    <div class="col-5 pr-1">
                        <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                            <input type="radio" class="custom-control-input text-small" id="rel_index_6" value="6" name="garden_rel_index" required>
                            <label class="custom-control-label text-medium-light" for="rel_index_6">卒業 / 本人</label>
                        </div>
                    </div>
                    <div class="col-7 pl-0 mt-1 select_contain">
                        <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-light" name="rel_6" disabled>
                            <option value="" selected style="color:#ced4da;">何年卒か選んでください</option>
                            @for($i = 2020; $i >=1900; $i--)
                                <option value="{{$i}}年">{{$i}}年</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        クチコミレビューを投稿したい園･学校
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <div class="custom-control custom-radio mt-4">
                    <input type="radio" class="custom-control-input" id="radio_school_index_1_{{$gardenDetail[0]->garden_id}}" value="{{$gardenDetail[0]->garden_id}}" checked name="radio_school_index_1" required>
                    <label class="text-normal custom-control-label" for="radio_school_index_1_{{$gardenDetail[0]->garden_id}}">
                        <?=$gardenDetail[0]->prefecture_name;?> <?=$gardenDetail[0]->city_name;?>
                        @foreach($gardenDetail[0] -> typeList as $type)
                            ｜ {{$type->type_name}}
                        @endforeach
                    </label>
                </div>
                <p class="ml-4 mb-4 text-large-xs mt-n1">{{$gardenDetail[0]->garden_name}}</p>

                <p class="text-medium-light">
                    <span class="menu-icon mr-1">◆</span>新しく選び直す
                </p>


                <div id="old_school_list">
                    <div class="" id="old_index_1">

                        <select class="mt-1 px-3 py-1 custom-select form-control form-control-sm text-small " name="old_prefecture" id="search_prefecture_index_1">
                            <option value="0">都道府県 検索</option>
                            @foreach($prefectures as $index => $prefecture)
                                <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                            @endforeach

                        </select>
                        <select class="mt-1 px-3 py-1 custom-select form-control form-control-sm text-small " id="search_city_index_1">
                            <option value="0">市区町村 検索</option>
                        </select>
                        <input  class="mt-1 px-3 form-control text-small require" placeholder="施設名などフリー検索"  id="search_str_index_1" style="color: #495057 !important; border-color: #ced4da !important;" >
                        <div class="mt-1 flex justify-content-center">
                            <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full text-white text-height" name="btn_old_search" id="btn_search_index_1" style="border: none !important;">検索 </button><i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
                        </div>
                        <div id="old_garden_select_index_1">

                        </div>

                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        評価を教えてください
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <p class="text-small mt-2">● ICT導入度</p>
                <div class="row">
                    <div class="col-4 pr-0">
                        <p class="text-small float-right mt-2" id="rate1" >点</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="rateyo"
                             data-rateyo-rating="0"
                             data-rateyo-num-stars="5"
                             data-rateyo-rated-fill="#31BCC7"
                             data-rateyo-normal-fill="#CBF7F6"
                             data-rateyo-score="4"></div>
                        {{--                                            <span class='score'>0</span>--}}
                        {{--                                            <span id="rate1" class='result'>0</span>--}}
                        <textarea class="result d-none" name="rate1"></textarea>
                    </div>


                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントをお願いします(30〜500文字以内)" rows="2" name="rate1_text" maxlength="500" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute notify d-none" style="left: 40px; color: #FF557E">文字数が不足しています。</p>
                    <p class="text-small position-absolute length" style="left: 5px;">
                        0 /500</p>
                </div>
                <div class="mt-4 mb-1 mx-n2" style="border-top: 1px solid #ABABAB !important;"></div>

                <p class="text-small pt-2">● 授業の工夫度</p>
                <div class="row">
                    <div class="col-4 pr-0">
                        <p class="text-small float-right mt-2" id="rate2">点</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="rateyo"
                             data-rateyo-rating="0"
                             data-rateyo-num-stars="5"
                             data-rateyo-rated-fill="#31BCC7"
                             data-rateyo-normal-fill="#CBF7F6"
                             data-rateyo-score="4"></div>
                        {{--                    <span class='score'>0</span>--}}
                        {{--                        <span id="rate2" class='result'>0</span>--}}
                        <textarea  class="result d-none" name="rate2"></textarea>
                    </div>


                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントをお願いします(30〜500文字以内)" rows="2" name="rate2_text" maxlength="500" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute notify d-none" style="left: 40px; color: #FF557E">文字数が不足しています。</p>
                    <p class="text-small position-absolute length" style="left: 5px;">
                        0 /500</p>
                </div>
                <div class="mt-4 mb-1 mx-n2" style="border-top: 1px solid #ABABAB !important;"></div>
                <p class="text-small pt-2">● 全体的な講師の質</p>
                <div class="row">
                    <div class="col-4 pr-0">
                        <p class="text-small float-right mt-2" id="rate3">点</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="rateyo"
                             data-rateyo-rating="0"
                             data-rateyo-num-stars="5"
                             data-rateyo-rated-fill="#31BCC7"
                             data-rateyo-normal-fill="#CBF7F6"
                             data-rateyo-score="4"></div>
                        {{--                    <span class='score'>0</span>--}}
                        {{--                        <span id="rate3" class='result'>0</span>--}}
                        <textarea class="result d-none" name="rate3"></textarea>
                    </div>


                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントをお願いします(30〜500文字以内)" rows="2" name="rate3_text" maxlength="500" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute notify d-none" style="left: 40px; color: #FF557E">文字数が不足しています。</p>
                    <p class="text-small position-absolute length" style="left: 5px;">
                        0 /500</p>
                </div>
                <div class="mt-4 mb-1 mx-n2" style="border-top: 1px solid #ABABAB !important;"></div>
                <p class="text-small pt-2">● 保護者との連携充実度</p>
                <div class="row">
                    <div class="col-4 pr-0">
                        <p class="text-small float-right mt-2" id="rate4">点</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="rateyo"
                             data-rateyo-rating="0"
                             data-rateyo-num-stars="5"
                             data-rateyo-rated-fill="#31BCC7"
                             data-rateyo-normal-fill="#CBF7F6"
                             data-rateyo-score="4"></div>
                        {{--                    <span class='score'>0</span>--}}
                        {{--                        <span id="rate4" class='result'>0</span>--}}
                        <textarea class="result d-none" name="rate4"></textarea>
                    </div>


                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントをお願いします(30〜500文字以内)" rows="2" name="rate4_text" maxlength="500" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute notify d-none" style="left: 40px; color: #FF557E">文字数が不足しています。</p>
                    <p class="text-small position-absolute length" style="left: 5px;">
                        0 /500</p>
                </div>
                <div class="mt-4 mb-1 mx-n2" style="border-top: 1px solid #ABABAB !important;"></div>
                <p class="text-small pt-2">● いじめ対策</p>
                <div class="row">
                    <div class="col-4 pr-0">
                        <p class="text-small float-right mt-2" id="rate5">点</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="rateyo"
                             data-rateyo-rating="0"
                             data-rateyo-num-stars="5"
                             data-rateyo-rated-fill="#31BCC7"
                             data-rateyo-normal-fill="#CBF7F6"
                             data-rateyo-score="4"></div>
                        {{--                    <span class='score'>0</span>--}}
                        {{--                        <span id="rate5" class='result'>0</span>--}}
                        <textarea class="result d-none" name="rate5"></textarea>
                    </div>


                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントをお願いします(30〜500文字以内)" rows="2" name="rate5_text" maxlength="500" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute notify d-none" style="left: 40px; color: #FF557E">文字数が不足しています。</p>
                    <p class="text-small position-absolute length" style="left: 5px;">
                        0 /500</p>
                </div>
                <div class="mt-4 mb-1 mx-n2" style="border-top: 1px solid #ABABAB !important;"></div>
                <p class="text-small pt-2">● 校風の良さ</p>
                <div class="row">
                    <div class="col-4 pr-0">
                        <p class="text-small float-right mt-2" id="rate6">点</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="rateyo"
                             data-rateyo-rating="0"
                             data-rateyo-num-stars="5"
                             data-rateyo-rated-fill="#31BCC7"
                             data-rateyo-normal-fill="#CBF7F6"
                             data-rateyo-score="4"></div>
                        {{--                    <span class='score'>0</span>--}}
                        {{--                        <span id="rate6" class='result'>0</span>--}}
                        <textarea class="result d-none" name="rate6"></textarea>
                    </div>


                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントをお願いします(30〜500文字以内)" rows="2" name="rate6_text" maxlength="500" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute notify d-none" style="left: 40px; color: #FF557E">文字数が不足しています。</p>
                    <p class="text-small position-absolute length" style="left: 5px;">
                        0 /500</p>
                </div>
                <div class="mt-4 mb-1 mx-n2" style="border-top: 1px solid #ABABAB !important;"></div>
                <p class="text-small pt-2">● 生徒の進路満足度</p>
                <div class="row">
                    <div class="col-4 pr-0">
                        <p class="text-small float-right mt-2" id="rate7">点</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="rateyo"
                             data-rateyo-rating="0"
                             data-rateyo-num-stars="5"
                             data-rateyo-rated-fill="#31BCC7"
                             data-rateyo-normal-fill="#CBF7F6"
                             data-rateyo-score="4"></div>
                        {{--                    <span class='score'>0</span>--}}
                        {{--                        <span id="rate7" class='result'>0</span>--}}
                        <textarea class="result d-none" name="rate7"></textarea>
                    </div>


                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントをお願いします(30〜500文字以内)" rows="2" name="rate7_text" maxlength="500" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute notify d-none" style="left: 40px; color: #FF557E">文字数が不足しています。</p>
                    <p class="text-small position-absolute length" style="left: 5px;">
                        0 /500</p>
                </div>
                <div class="mt-4 mb-1 mx-n2" style="border-top: 1px solid #ABABAB !important;"></div>
                <p class="text-small pt-2">● 部活や課外レッスンの充実度</p>
                <div class="row">
                    <div class="col-4 pr-0">
                        <p class="text-small float-right mt-2" id="rate8">点</p>
                    </div>
                    <div class="col-8 pl-1">
                        <div class="rateyo"
                             data-rateyo-rating="0"
                             data-rateyo-num-stars="5"
                             data-rateyo-rated-fill="#31BCC7"
                             data-rateyo-normal-fill="#CBF7F6"
                             data-rateyo-score="4"></div>
                        {{--                    <span class='score'>0</span>--}}
                        <textarea class="result d-none" name="rate8"></textarea>
                    </div>


                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントをお願いします(30〜500文字以内)" rows="2" name="rate8_text" maxlength="500" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute notify d-none" style="left: 40px; color: #FF557E">文字数が不足しています。</p>
                    <p class="text-small position-absolute length" style="left: 5px;">
                        0 /500</p>
                </div>
                <div class="mt-4 mb-1 mx-n2" style="border-top: 1px solid #ABABAB !important;"></div>


                <div class="mt-4 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        クチコミレビューを投稿
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <p class="text-small pt-2">※ 他サイトのURLやリンクを貼る行為は投稿不可となりますので
                    　ご了承ください｡</p>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="コメントをお願いします(1,000文字以内)" rows="4" name="rate_text" maxlength="1000" required></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute length" style="left: 0">
                        0 /1000</p>
                </div>

                <div class="mt-4 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        タイトル
                    </p>
                    <p class="ml-2 float-right background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <input type="text" class="form-control text-medium-xs mt-2" id="title" name="title" placeholder="レビューのまとめタイトルをご記入ください(30文字以内)" maxlength="30" required>
                <div class="position-relative">
                    <p class="text-small position-absolute length" style="left: 0">
                        0 /30</p>
                </div>
                <div class="mt-4 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        画像1
                    </p>
                </div>
                <p class="text-small-xs pl-3 pt-2" style="color: black !important;">※ GIF､JPEG､PNG形式画像を3点まで登録できます｡<br>
                    ※ 容量は1枚あたり10MBまでとなります｡</p>
                <div class="row mt-2">
                    <div class="col-8 py-3 pr-2">
                        <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full text-medium text-dark-blue" name="image-add" id="btn_add_img_index_1" style="color:#216887 !important; border-color: #216887 !important;">ファイル選択</button>
                    </div>
                    <div class="col-4 pl-0">
                        <div class="h-100">
                            <div class="h-100 d-none align-items-center" id="img_body_content_index_1">
                                <img class="img-responsive full-width img-content" id="img_body_index_1">
                            </div>

                            <input id="image_content_add_index_1" class="image-content" name="image-content1" type="file" accept="image/*"  style="display:none;" />
                            <div id="img_empty_index_1" class="d-flex justify-content-center background-gray h-100">
                                <p class="text-menu-small text-center px-1 text-white">Photo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-medium-light">投稿した園･学校のギャラリーに</p>
                <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                    <input type="radio" class="custom-control-input text-small" id="img1_pub" value="1" name="image1_public" checked>
                    <label class="custom-control-label text-medium-light" for="img1_pub">画像を反映する</label>
                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="画像を追加した場合､画像に対しての説明文(キャプション)をお願いいたします｡(50文字以内)" rows="2" name="img1_caption" maxlength="50"></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute length" style="left: 0">
                        0 /50</p>
                </div>
                <div class="custom-control custom-radio  d-flex align-items-center mt-3">
                    <input type="radio" class="custom-control-input text-small" id="img1_nopub" value="0" name="image1_public" >
                    <label class="custom-control-label text-medium-light" for="img1_nopub">画像を反映しない</label>
                </div>

                <div class="mt-4 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        画像2
                    </p>
                </div>
                <div class="row mt-2">
                    <div class="col-8 py-3 pr-2">
                        <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full text-medium text-dark-blue" name="image-add" id="btn_add_img_index_2" style="color:#216887 !important; border-color: #216887 !important;">ファイル選択</button>
                    </div>
                    <div class="col-4 pl-0">
                        <div class="h-100">
                            <div class="h-100 d-none align-items-center" id="img_body_content_index_2">
                                <img class="img-responsive full-width img-content" id="img_body_index_2">
                            </div>

                            <input id="image_content_add_index_2" class="image-content" name="image-content2" type="file" accept="image/*"  style="display:none;" />
                            <div id="img_empty_index_2" class="d-flex justify-content-center background-gray h-100">
                                <p class="text-menu-small text-center px-1 text-white">Photo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-medium-light">投稿した園･学校のギャラリーに</p>
                <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                    <input type="radio" class="custom-control-input text-small" id="img2_pub" value="1" name="image2_public" checked>
                    <label class="custom-control-label text-medium-light" for="img2_pub">画像を反映する</label>
                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="画像を追加した場合､画像に対しての説明文(キャプション)をお願いいたします｡(50文字以内)" rows="2" name="img2_caption" maxlength="50"></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute length" style="left: 0">
                        0 /50</p>
                </div>
                <div class="custom-control custom-radio  d-flex align-items-center mt-3">
                    <input type="radio" class="custom-control-input text-small" id="img2_nopub" value="0" name="image2_public" >
                    <label class="custom-control-label text-medium-light" for="img2_nopub">画像を反映しない</label>
                </div>
                <div class="mt-4 d-flex justify-content-center background-light-gray1 px-2">
                    <p class="text-normal p-1 flex-1" style="color: #666666 !important;">
                        画像3
                    </p>
                </div>

                <div class="row mt-2">
                    <div class="col-8 py-3 pr-2">
                        <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full text-medium text-dark-blue" name="image-add" id="btn_add_img_index_3" style="color:#216887 !important; border-color: #216887 !important;">ファイル選択</button>
                    </div>
                    <div class="col-4 pl-0">
                        <div class="h-100">
                            <div class="h-100 d-none align-items-center" id="img_body_content_index_3">
                                <img class="img-responsive full-width img-content" id="img_body_index_3">
                            </div>

                            <input id="image_content_add_index_3" class="image-content" name="image-content3" type="file" accept="image/*"  style="display:none;" />
                            <div id="img_empty_index_3" class="d-flex justify-content-center background-gray h-100">
                                <p class="text-menu-small text-center px-1 text-white">Photo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-medium-light">投稿した園･学校のギャラリーに</p>
                <div class="custom-control custom-radio  d-flex align-items-center mt-2">
                    <input type="radio" class="custom-control-input text-small" id="img3_pub" value="1" name="image3_public" checked>
                    <label class="custom-control-label text-medium-light" for="img3_pub">画像を反映する</label>
                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-medium-xs" placeholder="画像を追加した場合､画像に対しての説明文(キャプション)をお願いいたします｡(50文字以内)" rows="2" name="img3_caption" maxlength="50"></textarea>
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute length" style="left: 0">
                        0 /50</p>
                </div>
                <div class="custom-control custom-radio  d-flex align-items-center mt-3">
                    <input type="radio" class="custom-control-input text-small" id="img3_nopub" value="0" name="image3_public" >
                    <label class="custom-control-label text-medium-light" for="img3_nopub">画像を反映しない</label>
                </div>
            </form>

        </div>
        <div class="card-body py-1">

            <div class="mt-1 flex justify-content-center">
                <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white background-gray" id="btn_register">入力内容を確認する </button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>

        </div>

    </div>


@endsection

@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 2rem;  margin-top: -140px">
        <div class="card-body background-opacity">

            <img src="{{asset('img/top.png')}}" class="img-top" id="move_garden" style="bottom: -.5rem">
            <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>
@endsection

@section('js4event')
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.rateyo.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" rel="stylesheet"/>
    <script language="javascript" type="text/javascript">
        var count_old = 2;
        var count_cur = 2;
        var imgFiles = [];
        $(function () {
            $(".rateyo").rateYo({
                halfStar: true
            });
        });
        $(function () {
            $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :'+ rating);
                $(this).parent().prev().find('p').text(rating + '点');
            });
        });
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $('[name=rel_2]').on('mouseenter', function(){
                console.log('d')
                $(this)[0].selectedIndex = 11;
            })
            $('[name=rel_3]').on('mouseenter', function(){
                console.log('d')
                $(this)[0].selectedIndex = 21;
            })
            $('[name=rel_5]').on('mouseenter', function(){
                console.log('d')
                $(this)[0].selectedIndex = 11;
            })
            $('[name=rel_6]').on('mouseenter', function(){
                console.log('d')
                $(this)[0].selectedIndex = 21;
            })
            $('input').change(function () {
                var forms = document.getElementById('validation_form');
                if(forms.checkValidity() === true){
                    $('#btn_register').removeClass('background-gray');
                }
                else{
                    $('#btn_register').addClass('background-gray');
                }
            })
            $('textarea').change(function () {
                var forms = document.getElementById('validation_form');
                if(forms.checkValidity() === true){
                    $('#btn_register').removeClass('background-gray');
                }
                else{
                    $('#btn_register').addClass('background-gray');
                }
            })

            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            $('textarea').on('input', function () {
                var val = $(this).val();
                var length = val.length;
                var maxLength = $(this).attr('maxlength');
                $(this).parent().next().find('p.length').html(length + '/' + maxLength);
            })
            $('[name="title"]').on('input', function () {
                var val = $(this).val();
                var length = val.length;
                var maxLength = $(this).attr('maxlength');
                $(this).next().find('p.length').html(length + '/' + maxLength);
            })
            $('textarea').on('mouseleave', function () {
                var val = $(this).val();
                var length = val.length;
                if(length<30){
                    $(this).parent().next().find('p.notify').removeClass('d-none');
                }
                else{
                    $(this).parent().next().find('p.notify').addClass('d-none');
                }
            })


            $('[name="img_caption_index"]').change(function () {

                if($(this).val() === '1'){
                    console.log($(this).val());
                    $('#post_nickname')[0].disabled = false;
                }
                else{
                    $('#post_nickname')[0].disabled = true;
                }
            })

            $('.select_contain').on('click', function () {
                console.log($(this).prev().find('input'));
                $(this).prev().find('input').trigger('click');

            })

            $('[name="garden_rel_index"]').change(function () {
                var id = $(this).val();
                var index = '[name="rel_' + id + '"]';
                console.log( $(index));
                $(index)[0].disabled = false;
                for(var i = 1; i < 8; i++){
                    if(i !== parseInt(id)){
                        var index = '[name="rel_' + i + '"]';
                        console.log(index);
                        $(index)[0].disabled = true;
                    }
                }

            })

            $(document).on('change', '[name="radio_school_index_1"]', function () {
                console.log($(this).val());
                $('#garden_id').val($(this).val());

            })

            $(document).on('click', "[name='image-add']", function() {
                event.preventDefault();
                console.log(this)
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var index = split[1];
                $("#image_content_add_index_" + index).click();
            });

            $(document).on('change', ".image-content", function() {
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var index = split[1];
                readURL(this, index);

            });

            function readURL(input, index) {
                if (input.files && input.files[0]) {
                    var file = input.files[0];
                    var file_type = file.type.split('/');
                    if (file.size > 10000000) {
                        alert('ファイル容量が10Mを超えています｡');
                        return;
                    }
                    console.log(file);
                    if (file_type[0] !== "image") {

                        alert('画像を選択してください｡');

                        return;
                    }

                    var file_ex = file.name.split('.');
                    if(file_type[0] == "image" && file_ex[1].toLowerCase() != 'gif' && file_ex[1].toLowerCase() != 'png' && file_ex[1].toLowerCase() != 'jpeg')
                    {
                        alert('ファイル形式が異なります｡');
                        // $('.find-remove-button').trigger('click');
                        return;
                    }

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        $("#img_body_index_" + index).attr('src', e.target.result);
                        $("#img_body_content_index_" + index).removeClass('d-none');
                        $("#img_body_content_index_" + index).addClass('d-flex');
                        $("#img_empty_index_" + index).addClass('d-none');
                        $("#img_empty_index_" + index).removeClass('d-flex');
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                    imgFiles[index] = input.files[0];
                }
            }

            $('#btn_register').click(function () {
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var formData = new FormData(forms);
                    for(var i = 1; i<=3; i++){
                        if (imgFiles[i] != null) {
                            console.log(imgFiles[i]);
                            formData.append('file_' + i, imgFiles[i]);
                        }
                    }
                    forms.submit();

                    // var token = $("meta[name='_csrf']").attr("content");
                    // $.ajaxSetup({
                    //     headers: {
                    //         'X-CSRF-TOKEN': token
                    //     }
                    // });
                    //
                    // $.ajax({
                    //     url:url,
                    //     type:'post',
                    //     data: formData,
                    //     processData: false,
                    //     contentType: false,
                    //     success: function (response) {
                    //         console.log(response);
                    //     },
                    //     error: function () {
                    //     }
                    // });
                }


            })


            // $("#btn_register1").click(function(event) {
            //     var old_gardens = [];
            //     for(var i = 1; i < count_old; i ++) {
            //         var garden_id = $('input[name=radio_school_index_' + i + ']:checked').val();
            //         if(garden_id > 0) {
            //             var garden_detail = $("#garden_detail_index_" + i).val();
            //             var garden_info = {};
            //             garden_info['id'] = garden_id;
            //             garden_info['detail'] = garden_detail;
            //             old_gardens.push(garden_info);
            //         }
            //     }
            //
            //     var cur_gardens = [];
            //     for(var i = 1; i < count_cur; i ++) {
            //         var garden_id = $('input[name=radio_cur_school_index_' + i + ']:checked').val();
            //         if(garden_id > 0) {
            //             var garden_detail = $("#garden_cur_detail_index_" + i).val();
            //             var garden_info = {};
            //             garden_info['id'] = garden_id;
            //             garden_info['detail'] = garden_detail;
            //             cur_gardens.push(garden_info);
            //         }
            //     }
            //     var garden_detail = {};
            //     garden_detail['old'] = old_gardens;
            //     garden_detail['cur'] = cur_gardens;
            //     var garden_str = JSON.stringify(garden_detail);
            //     $("#garden_info").val(garden_str);
            //     var forms = document.getElementById('register_form');
            //     forms.classList.add('was-validated');
            //     if (forms.checkValidity() === true) {
            //
            //         var url = home_path + "/ajax/check/user";
            //         var email = $("#email").val();
            //         $.ajax({
            //             url:url,
            //             type:'post',
            //             data: {
            //                 email: email
            //             },
            //             success: function (response) {
            //                 if(response['status'] == false) {
            //                     forms.submit();
            //                 } else {
            //                     alertify.error("ユーザーが存在しない");
            //                 }
            //             },
            //             error: function () {
            //             }
            //         });
            //     }
            //     //window.location.href = 'http://example.com';
            // });


            function getCityList(prefecture_id, index, type) {
                var url = home_path + '/ajax/get-city/' + prefecture_id;
                $.ajax({
                    url: url,
                    success: function(response){

                        var cityList = response['city'];
                        if(type == 0) {
                            $(".old_city_" + index).remove();
                            cityList.forEach(city => {
                                var city_id = city['city_id'];
                                var city_name = city['city_name'];
                                $("#search_city_index_" + index).append("<option class='old_city_" + index + "' value='" + city_id + "'>" + city_name + "</option>");
                            });
                        } else {
                            $(".cur_city_" + index).remove();
                            cityList.forEach(city => {
                                var city_id = city['city_id'];
                                var city_name = city['city_name'];
                                $("#search_cur_city_index_" + index).append("<option class='cur_city_" + index + "' value='" + city_id + "'>" + city_name + "</option>");
                            });
                        }

                    }
                });
            }

            function changeEvent() {
                $(document).on('change', "[name=old_prefecture]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var prefecture_id = $(this).val();

                    getCityList(prefecture_id, index, 0);
                });

                $(document).on('change', "[name=cur_prefecture]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var prefecture_id = $(this).val();

                    getCityList(prefecture_id, index, 1);
                });

                $(document).on('click', '#edit_garden', function(){
                    window.location.href = home_path + '/school/create';
                })

                $(document).on('click', "[name=btn_old_search]", function() {
                    event.preventDefault();
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var searchStr = $("#search_str_index_" + index).val();
                    var prefecture_id = $("#search_prefecture_index_" + index).val();
                    var city_id = $("#search_city_index_" + index).val();
                    var url = home_path + '/ajax/school-list-info';



                        $.ajax({
                            url:url,
                            type:'post',
                            data: {
                                review:'review',
                                cityList: city_id,
                                search: searchStr,
                                prefecture_id: prefecture_id,
                                currentPage: 1,
                                perPage: 5
                            },
                            success: function (response) {
                                response = response.replace(/radio_school_index/g, "radio_school_index_" + index);
                                $("#old_garden_select_index_" + index).html(response);
                            },
                            error: function () {
                            }
                        });


                });

                $(document).on('click', "[name=btn_cur_search]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var searchStr = $("#search_cur_str_index_" + index).val();
                    var prefecture_id = $("#search_cur_prefecture_index_" + index).val();
                    var city_id = $("#search_cur_city_index_" + index).val();
                    var url = home_path + '/ajax/school-list-info';

                    if(city_id > 0) {
                        $.ajax({
                            url:url,
                            type:'post',
                            data: {
                                cityList: city_id,
                                search: searchStr,
                                prefecture_id: prefecture_id,
                                currentPage: 1,
                                perPage: 5
                            },
                            success: function (response) {
                                response = response.replace(/radio_school_index/g, "radio_cur_school_index_" + index);
                                $("#cur_garden_select_index_" + index).html(response);
                            },
                            error: function () {
                            }
                        });
                    }

                });
            }

            changeEvent();





            $("#btn_add_old").click(function(event) {
                var content = $("#add_old_school").html();

                content = content.replace(/_index/g, "_index_" + count_old);


                $("#old_school_list").append(content);
                $("#old_index_" + count_old).removeClass('d-none');
                count_old = count_old + 1;
            });



            $("#btn_add_current").click(function(event) {
                var content = $("#add_current_school").html();
                content = content.replace(/_index/g, "_index_" + count_cur);


                $("#cur_school_list").append(content);
                $("#cur_index_" + count_old).removeClass('d-none');
                count_cur = count_cur + 1;
            });

        });
    </script>
@endsection
