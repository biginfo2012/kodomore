@extends('layouts.app')

@section('title')
    全国の幼稚園･保育所 入園､小学校･中学校･高校 入学と受験情報
@endsection

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>
        .txt-area {
            color: #0099d9;
        }





        .fa-circle {
            color: white;
            font-size: .5rem;
        }

        .school-list {
            background-color: #FAFAD7;
            padding: .8rem;
        }

        .school-item {
            background-color: white;
            position: relative;
            margin-bottom: 1rem;
        }




        @media (max-width: 767px) and (min-width: 576px) {
            .favourite {
                position: absolute;
                top: 0;
                right: 0;
                width: 4.5rem;
            }
        }

        @media (min-width: 768px)  {
            .favourite {
                position: absolute;
                top: 0;
                right: 0;
                width: 6rem;
            }
        }

        @media  (max-width: 575px) {
            .favourite {
                position: absolute;
                top: 0;
                right: 0;
                width: 3rem;
            }
        }




        #move_news {
            text-align: right;
            margin-right: 1.25rem;
            margin-top: -1rem;
            text-decoration: underline;
        }

        .fa-angle-left {
            position: absolute;
            left: 2em;
            color: #2bbbad;
        }

        .keyword-list > .col-6:nth-child(odd) {
            padding-left: 1rem !important;
        }

        .keyword-list > .col-6:nth-child(even) {
            padding-right: 1rem !important;
        }
        .keyword-list > .col-6:last-child {
            border-bottom: 0px !important;
        }

        .keyword-list > .col-6:nth-last-child(2):nth-child(odd) {
            border-bottom: 0px !important;
        }

        .keyword-list > .col-6:last-child {
            border-bottom: 0px !important;
        }

        .kind-detail {
            background-color: white;
        }

        .kind-detail > div {
            border-bottom: 4px solid transparent;
        }
        .kind-detail.active > div{
            border-bottom: 4px solid #31BCC7;
        }


        hr.border-top {
            border-top: 2px dashed #ABABAB !important;
            border-bottom: 0px !important;
        }

        .background-light-sky {
            background-color: #F5F9FA;
        }

        .card-img-top {
            cursor: pointer;
        }

        .left_bar{
            position: absolute;
            left: 0;
            width: 0.4rem;
            height: 100%;
            background-color: #0099D9 !important;
        }

        .background-light-gray {
            background-color: #EEEEEE !important;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::after {
            background-size: 75%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e");
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label:before {
            background-color: #ace4e9;
            border: 0px;
        }

        .custom-checkbox .custom-control-input:checked~.modify-label:before {
            background-color: #ff99b2 !important;
        }

        .text-blue {
            color: #0099d9 !important;
        }

        .text-dark-blue {
            color: #216887 !important;
        }

        .fa-plus-circle {
            position: absolute;
            left: 2em;
        }

        .page-footer{
            margin-bottom: 10px;
        }

        .sub-menu {
            background-color: #CCEBF7;
        }

    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            @if(!isset($from))
                <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >  <span class="top-title-tag">保護者と生徒､スクールで公開情報を編集する</span> > 施設名
            @else
                <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >  <span class="top-title-tag">{{$garden->garden_name}}</span> > みんなで学校(園)情報を編集する
            @endif


        </div>

        <div id="school_list_info">
            <div class="card-header d-flex align-items-center" >

                @if(isset($from))
                    <p class="txt-detail text-large-xs-medium height-1 " name="school-detail">みんなで学校(園)情報を<span class="text-pink" style="color: #D50000 !important;">編集</span>する
                @else
                    <p class="txt-detail text-medium-light" >保護者と生徒､スクールで公開情報を<span class="text-red" style="color: #D50000 !important;">編集</span>する</p>
                @endif
{{--                <p class="txt-detail text-large-xs " >保護者と生徒､スクールで公開情報を<span class="text-red">編集</span>する</p>--}}
                <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}">
            </div>



            <div class="mt-1 text-medium-xs  px-4 d-none">
                岐阜県の幼稚園､保育所の待機児童についてや園の数や広さ､指導内容､伝統の行事など､岐阜県子育てについての特徴を入れる
            </div>

            <div class="card-body pt-2 px-3">
                <div class="background-light-gray">
                    <p class="text-small p-1">
                        編集する施設名称
                    </p>
                </div>
                <p class="text-large-xs mt-1">{{$garden -> garden_public_name}}</p>

                <div class="w-100">
                    <div class="flex mt-1 my-2">
                        <div class="left_bar">
                        </div>
                        <div class="w-100 text-medium-title sub-menu pl-3 py-1">
                            キーワードから“ざっくり” OR検索
                        </div>
                    </div>
                    <p class="pl-3 mt-1 text-medium-xs">追加･登録したい項目などにチェックを入れてください</p>
                    <div class="background-white mt-2">
                        @foreach($tagList as $index_tag_type => $tagType)
                            <div class="mt-2 mb-2 background-white ">
                                <div class="">
                                    <p class="card-header background-light-gray text-small pl-3 py-1 text-break" style="color: #666666"><?=$tagType->type_title;?></p>
                                </div>

                                <div class="px-0 py-0">
                                    <div class="row mx-0 border-top border-bottom keyword-list">
                                        @foreach($tagType->tagList as $index_tag => $tag)
                                            <div class="col-6 border-bottom pt-3 pb-1 px-1">
                                                <div class="custom-control custom-checkbox">
                                                    @if($tag -> isSelect == true)
                                                        <input type="checkbox" class="custom-control-input tag-detail "  id="tag_<?=$tag->id;?>" checked>
                                                        <label class="custom-control-label text-normal-title" for="tag_<?=$tag->id;?>"><?=$tag->tag_title;?></label>
                                                    @else
                                                        <input type="checkbox" class="custom-control-input tag-detail text-normal-title" id="tag_<?=$tag->id;?>">
                                                        <label class="modify-label custom-control-label text-normal-title" for="tag_<?=$tag->id;?>"><?=$tag->tag_title;?></label>
                                                    @endif


                                                </div>
                                            </div>

                                        @endforeach


                                    </div>
                                </div>



                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="w-100">
                    <div class="flex mt-1 my-2">
                        <div class="left_bar">
                        </div>
                        <div class="w-100 text-medium-title sub-menu pl-3 py-1">
                            施設の紹介文
                        </div>
                    </div>

                    <div class="background-light-gray">
                        <p class="text-medium-light py-1 pl-2">
                            タイトル
                        </p>
                    </div>
                    <p class="mt-1 text-medium-light">施設の紹介文のタイトルをご入力ください</p><p class="text-normal">
                        ※改行箇所があれば改行してください</p>

                    <textarea class="mt-2 form-control text-large search-school text-blue"  id="title" name="limit-length" relate-count-id="title_count" placeholder="" rows="2" maxlength="30"></textarea>
                    <div class="d-flex">
                        <div class="flex-1"></div>
                        <span id="title_count" class="text-small">0/30</span>
                    </div>

                    <div class="background-light-gray mt-3">
                        <p class="text-medium-light py-1 pl-2">
                            本文
                        </p>
                    </div>
                    <p class="mt-1 text-medium-light">施設の紹介分のコメントをお願いします</p><p class="text-normal">
                        ※改行箇所があれば改行してください</p>

                    <textarea class="mt-2 form-control text-medium-light search-school text-blue"  id="description" name="limit-length" relate-count-id="description_count" placeholder="" rows="6" maxlength="250"></textarea>
                    <div class="d-flex">
                        <div class="flex-1"></div>
                        <span id="description_count" class="text-small">0/250</span>
                    </div>
                </div>

                <div class="w-100 mt-5">
                    <div class="flex mt-1 my-2">
                        <div class="left_bar">
                        </div>
                        <div class="w-100 text-medium-title sub-menu pl-3 py-1">
                            Photo Gallery
                        </div>
                    </div>

                    <p class="text-medium-light mt-1">外観･内観･制服やオリジナルアイテム･イメージ､
                        キャプションなどをご登録ください(最大10枚まで)</p>
                    <p class="text-small">※著作権･肖像権にご配慮ください</p>


                    <div class="background-light-gray mt-2">
                        <p class="text-medium-light py-1 pl-2">
                            画像の提供表記
                        </p>
                    </div>
                    <p class="text-small mt-1">※チェックのない場合､本名が表示名に設定されます</p>

                    <div id="add_photo" class="d-none">
                        <div class="py-1" id="img_index">
                            <div class="custom-control custom-radio  d-flex align-items-center">
                                <input type="radio" class="custom-control-input text-small" id="img_caption_original_index" value="0" name="img_caption_index" >
                                <label class="custom-control-label text-medium-light" for="img_caption_original_index">本名を表示名に設定する</label>
                            </div>

                            <div class="custom-control custom-radio  d-flex align-items-center">
                                <input type="radio" class="custom-control-input text-small" id="img_caption_nick_index" value="1" name="img_caption_index" >
                                <label class="custom-control-label text-medium-light" for="img_caption_nick_index">ニックネームを表示名に設定する</label>
                            </div>

                            <input type="text"class="form-control text-medium-xs mt-1" id="img_caption_index" placeholder="ニックネーム(15文字以内)(例： たろう)" >

                            <div class="row mt-3">
                                <div class="col-8 pr-0">
                                    <button class="mx-0 py-1 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-dark-blue " style="border: 1px solid #216887 !important;" name="image-add" id="btn_add_img_index">ファイル選択</button>
                                    <button class="mt-1 py-1 mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-dark-blue" style="border: 1px solid #216887 !important;" name="image-cancel" id="btn_cancel_img_index">キャンセル</button>
                                </div>
                                <div class="col-4 py-2 pl-1">
                                    <div class="h-100">
                                        <div class="h-100 d-none align-items-center" id="img_body_content_index">
                                            <img class="img-responsive full-width img-content" id="img_body_index">
                                        </div>

                                        <input id="image_content_add_index" name="image-content" type="file" accept="image/*"  style="display:none;" />
                                        <div id="img_empty_index" class="d-flex justify-content-center background-gray h-100">
                                            <p class="text-menu-small text-center px-1 text-white">Photo</p>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <textarea class="mt-2 form-control text-medium-xs "  id="img_source_index" name="limit-length" relate-count-id="img_source_index_count" placeholder="画像を追加した場合､画像に対しての説明文
(キャプション)をお願いいたします｡(50文字以内)" rows="3" maxlength="50"></textarea>
                            <div class="d-flex">
                                <div class="flex-1"></div>
                                <span id="img_source_index_count" class="text-small">0/50</span>
                            </div>
                        </div>

                    </div>

                    <div id="photo_list">

                    </div>

                    <div class="flex mt-2">
                            <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-dark-blue" style="border: 1px solid #216887 !important;" id="btn_add">Photo Gallery を追加する </button><i class="text-dark-blue fas fa-plus-circle ml-1"></i>
                    </div>
                </div>

                <div class="w-100">
                    <div class="flex mt-1 my-3">
                        <div class="left_bar">
                        </div>
                        <div class="w-100 text-medium-title sub-menu pl-3 py-1">
                            基本情報と施設概要
                        </div>
                    </div>

                    <div class="background-light-gray">
                        <p class="text-medium-light py-1 pl-2">
                            卒園児の主な進路
                        </p>
                    </div>

                    <p class="mt-2 text-medium-xs">小学校</p>
                    <input type="text"class="form-control text-medium-xs " id="early_school"  >
                    <p class="mt-2 text-medium-xs">中学校</p>
                    <input type="text"class="form-control text-medium-xs " id="middle_school"  >
                    <p class="mt-2 text-medium-xs">高校</p>
                    <input type="text"class="form-control text-medium-xs " id="high_school"  >

                    <div class="background-light-gray mt-4">
                        <p class="text-medium-light py-1 pl-2">
                            保育対象年齢
                        </p>
                    </div>
                    <div class="row position-relative">
                        <div class="position-absolute" style="left: 49%; top: 8px">~</div>
                        <div class="col-3 pr-1">
                            <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-xs require "  name="type_1" required>
                                <option value="" {{ empty($garden->start_age) ? "selected" : "" }} disabled>歳</option>
                                <option value="0歳" {{ $garden->start_age == "0歳" ? 'selected' : ''}}>0歳</option>
                                <option value="1歳" {{ $garden->start_age == "1歳" ? 'selected' : ''}}>1歳</option>
                                <option value="満1歳" {{ $garden->start_age == "満1歳" ? 'selected' : ''}}>満1歳</option>
                                <option value="2歳" {{ $garden->start_age == "2歳" ? 'selected' : ''}}>2歳</option>
                                <option value="満2歳" {{ $garden->start_age == "満2歳" ? 'selected' : ''}}>満2歳</option>
                                <option value="3歳" {{ $garden->start_age == "3歳" ? 'selected' : ''}}>3歳</option>
                                <option value="満3歳" {{ $garden->start_age == "満3歳" ? 'selected' : ''}}>満3歳</option>
                                <option value="4歳" {{ $garden->start_age == "4歳" ? 'selected' : ''}}>4歳</option>
                                <option value="満4歳" {{ $garden->start_age == "満4歳" ? 'selected' : ''}}>満4歳</option>
                                <option value="5歳" {{ $garden->start_age == "5歳" ? 'selected' : ''}}>5歳</option>
                                <option value="満5歳" {{ $garden->start_age == "満5歳" ? 'selected' : ''}}>満5歳</option>
                                <option value="3歳児(年少)" {{ $garden->start_age == "満3歳児(年少)" ? 'selected' : ''}}>3歳児(年少)</option>
                                <option value="4歳児(年中)" {{ $garden->start_age == "満4歳児(年中)" ? 'selected' : ''}}>4歳児(年中)</option>
                                <option value="5歳児(年長)" {{ $garden->start_age == "満5歳児(年長)" ? 'selected' : ''}}>5歳児(年長)</option>
                                <option value="無選択" {{ $garden->start_age == "無選択" ? 'selected' : ''}}>無選択</option>
                            </select>
                        </div>
                        <div class="col-3 pl-1">
                            <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-xs require "  name="type_2" required>
                                <option value="" {{ empty($garden->start_month) ? "selected" : "" }} disabled>日orヶ月</option>
                                <option value="生後43日" {{ $garden->start_month == "生後43日" ? 'selected' : ''}}>生後43日</option>
                                <option value="生後57日" {{ $garden->start_month == "生後57日" ? 'selected' : ''}}>生後46日</option>
                                <option value="生後57日" {{ $garden->start_month == "生後57日" ? 'selected' : ''}}>生後57日</option>
                                <option value="0ヶ月" {{ $garden->start_month == "0ヶ月" ? 'selected' : ''}}>0ヶ月</option>
                                <option value="1ヶ月" {{ $garden->start_month == "1ヶ月" ? 'selected' : ''}}>1ヶ月</option>
                                <option value="2ヶ月" {{ $garden->start_month == "2ヶ月" ? 'selected' : ''}}>2ヶ月</option>
                                <option value="3ヶ月" {{ $garden->start_month == "3ヶ月" ? 'selected' : ''}}>3ヶ月</option>
                                <option value="4ヶ月" {{ $garden->start_month == "4ヶ月" ? 'selected' : ''}}>4ヶ月</option>
                                <option value="5ヶ月" {{ $garden->start_month == "5ヶ月" ? 'selected' : ''}}>5ヶ月</option>
                                <option value="6ヶ月" {{ $garden->start_month == "6ヶ月" ? 'selected' : ''}}>6ヶ月</option>
                                <option value="7ヶ月" {{ $garden->start_month == "7ヶ月" ? 'selected' : ''}}>7ヶ月</option>
                                <option value="8ヶ月" {{ $garden->start_month == "8ヶ月" ? 'selected' : ''}}>8ヶ月</option>
                                <option value="9ヶ月" {{ $garden->start_month == "9ヶ月" ? 'selected' : ''}}>9ヶ月</option>
                                <option value="10ヶ月" {{ $garden->start_month == "10ヶ月" ? 'selected' : ''}}>10ヶ月</option>
                                <option value="11ヶ月" {{ $garden->start_month == "11ヶ月" ? 'selected' : ''}}>11ヶ月</option>
                                <option value="無選択" {{ $garden->start_month == "無選択" ? 'selected' : ''}}>無選択</option>
                            </select>
                        </div>
                        <div class="col-3 pr-1">
                            <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-xs require "  name="type_3" required>
                                <option value="" {{ empty($garden->end_age) ? "selected" : "" }} disabled>歳</option>
                                <option value="0歳" {{ $garden->start_age == "0歳" ? 'selected' : ''}}>0歳</option>
                                <option value="1歳" {{ $garden->start_age == "1歳" ? 'selected' : ''}}>1歳</option>
                                <option value="満1歳" {{ $garden->start_age == "満1歳" ? 'selected' : ''}}>満1歳</option>
                                <option value="2歳" {{ $garden->start_age == "2歳" ? 'selected' : ''}}>2歳</option>
                                <option value="満2歳" {{ $garden->start_age == "満2歳" ? 'selected' : ''}}>満2歳</option>
                                <option value="3歳" {{ $garden->start_age == "3歳" ? 'selected' : ''}}>3歳</option>
                                <option value="満3歳" {{ $garden->start_age == "満3歳" ? 'selected' : ''}}>満3歳</option>
                                <option value="4歳" {{ $garden->start_age == "4歳" ? 'selected' : ''}}>4歳</option>
                                <option value="満4歳" {{ $garden->start_age == "満4歳" ? 'selected' : ''}}>満4歳</option>
                                <option value="5歳" {{ $garden->start_age == "5歳" ? 'selected' : ''}}>5歳</option>
                                <option value="満5歳" {{ $garden->start_age == "満5歳" ? 'selected' : ''}}>満5歳</option>
                                <option value="3歳児(年少)" {{ $garden->end_age == "満3歳児(年少)" ? 'selected' : ''}}>3歳児(年少)</option>
                                <option value="4歳児(年中)" {{ $garden->end_age == "満4歳児(年中)" ? 'selected' : ''}}>4歳児(年中)</option>
                                <option value="5歳児(年長)" {{ $garden->end_age == "満5歳児(年長)" ? 'selected' : ''}}>5歳児(年長)</option>
                                <option value="小学1年生" {{ $garden->end_age == "小学1年生" ? 'selected' : ''}}>小学1年生</option>
                                <option value="小学2年生" {{ $garden->end_age == "小学2年生" ? 'selected' : ''}}>小学2年生</option>
                                <option value="小学3年生" {{ $garden->end_age == "小学3年生" ? 'selected' : ''}}>小学3年生</option>
                                <option value="小学4年生" {{ $garden->end_age == "小学4年生" ? 'selected' : ''}}>小学4年生</option>
                                <option value="小学5年生" {{ $garden->end_age == "小学5年生" ? 'selected' : ''}}>小学5年生</option>
                                <option value="小学6年生" {{ $garden->end_age == "小学6年生" ? 'selected' : ''}}>小学6年生</option>
                                <option value="無選択" {{ $garden->end_age == "無選択" ? 'selected' : ''}}>無選択</option>
                            </select>
                        </div>
                        <div class="col-3 pl-1">
                            <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-xs require "  name="type_4" required>
                                <option value="" {{ empty($garden->end_month) ? "selected" : "" }} disabled>日orヶ月</option>
                                <option value="0ヶ月" {{ $garden->end_month == "0ヶ月" ? 'selected' : ''}}>0ヶ月</option>
                                <option value="1ヶ月" {{ $garden->end_month == "1ヶ月" ? 'selected' : ''}}>1ヶ月</option>
                                <option value="2ヶ月" {{ $garden->end_month == "2ヶ月" ? 'selected' : ''}}>2ヶ月</option>
                                <option value="3ヶ月" {{ $garden->end_month == "3ヶ月" ? 'selected' : ''}}>3ヶ月</option>
                                <option value="4ヶ月" {{ $garden->end_month == "4ヶ月" ? 'selected' : ''}}>4ヶ月</option>
                                <option value="5ヶ月" {{ $garden->end_month == "5ヶ月" ? 'selected' : ''}}>5ヶ月</option>
                                <option value="6ヶ月" {{ $garden->end_month == "6ヶ月" ? 'selected' : ''}}>6ヶ月</option>
                                <option value="7ヶ月" {{ $garden->end_month == "7ヶ月" ? 'selected' : ''}}>7ヶ月</option>
                                <option value="8ヶ月" {{ $garden->end_month == "8ヶ月" ? 'selected' : ''}}>8ヶ月</option>
                                <option value="9ヶ月" {{ $garden->end_month == "9ヶ月" ? 'selected' : ''}}>9ヶ月</option>
                                <option value="10ヶ月" {{ $garden->end_month == "10ヶ月" ? 'selected' : ''}}>10ヶ月</option>
                                <option value="11ヶ月" {{ $garden->end_month == "11ヶ月" ? 'selected' : ''}}>11ヶ月</option>
                                <option value="無選択" {{ $garden->end_month == "無選択" ? 'selected' : ''}}>無選択</option>
                            </select>
                        </div>
                    </div>

{{--                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-medium-xs require "  name="type" required>--}}
{{--                        <option value="0" selected disabled>選択してください</option>--}}
{{--                        <option value="1">３歳～小学校就学前</option>--}}
{{--                        <option value="2">生後57日～小学校就学前</option>--}}
{{--                        <option value="3">６ヶ月～小学校就学前</option>--}}
{{--                        <option value="4">１歳～小学校就学前</option>--}}
{{--                        <option value="5">生後５７日～満３歳</option>--}}
{{--                        <option value="6">４ヶ月～満３歳</option>--}}
{{--                        <option value="7">６ヶ月～満3歳</option>--}}
{{--                        <option value="8">１歳～満３歳</option>--}}
{{--                        <option value="9">産休明け～満３歳</option>--}}
{{--                        <option value="10">産休明け～小学校就学前</option>--}}
{{--                        <option value="11">8ヶ月～小学校就学前</option>--}}
{{--                        <option value="12">産休明け～3歳</option>--}}
{{--                        <option value="13">10ヶ月～小学校就学前</option>--}}
{{--                        <option value="14">2歳のみ</option>--}}
{{--                        <option value="15">3ヶ月～小学校就学前</option>--}}
{{--                        <option value="16">2ヶ月～小学校就学前</option>--}}
{{--                        <option value="17">0歳～小学校就学前</option>--}}
{{--                        <option value="18">1歳6ヶ月～小学校就学前</option>--}}
{{--                        <option value="19">1歳～3歳</option>--}}
{{--                        <option value="20">1歳4ヶ月～小学校就学前</option>--}}
{{--                        <option value="21">2歳4ヶ月～小学校就学前</option>--}}
{{--                        <option value="22">2歳～小学校就学前</option>--}}
{{--                        <option value="23">７ヶ月～小学校就学前</option>--}}
{{--                        <option value="24">産休明け～２歳</option>--}}
{{--                        <option value="25">５ヶ月～小学校就学前</option>--}}
{{--                        <option value="26">４ヶ月～２歳</option>--}}
{{--                        <option value="27">3ヶ月～2歳</option>--}}
{{--                        <option value="28">産休明け～満4歳</option>--}}
{{--                        <option value="29">４ヶ月～小学校就学前</option>--}}
{{--                        <option value="30">1歳～２歳</option>--}}
{{--                        <option value="31">２歳～５歳</option>--}}
{{--                        <option value="32">満１歳～小学校就学前</option>--}}
{{--                        <option value="33">生後46日～小学校就学前</option>--}}
{{--                        <option value="34">生後43日～小学校就学前</option>--}}
{{--                        <option value="35">満2歳～小学校就学前</option>--}}
{{--                        <option value="36">4ヶ月～3歳</option>--}}
{{--                        <option value="37">8ヶ月～2歳</option>--}}
{{--                        <option value="38">満3歳～小学校就学前</option>--}}
{{--                        <option value="39">0歳～2歳</option>--}}
{{--                        <option value="40">6ヶ月～2歳</option>--}}
{{--                        <option value="41">0歳～3歳</option>--}}
{{--                        <option value="42">生後57日～2歳児</option>--}}
{{--                        <option value="43">2ヶ月～1歳</option>--}}
{{--                        <option value="44">2ヶ月～2歳11ヶ月</option>--}}
{{--                        <option value="45">4ヶ月～3歳11ヶ月</option>--}}
{{--                        <option value="46">10ヶ月～２歳</option>--}}
{{--                        <option value="47">3ヶ月～小学校就学前</option>--}}
{{--                    </select>--}}

                    <div class="background-light-gray mt-4">
                        <p class="text-medium-light py-1 pl-2">
                            特徴
                        </p>
                    </div>
                    <p class="text-medium-xs mt-1">預かり内容､施設環境や指導内容､子ども達の様子
                        ､独自のカリキュラムの有無など</p>

                    <textarea class="mt-2 form-control text-medium-xs search-school"  id="property" rows="6"></textarea>
                    <div class="background-light-gray mt-4">
                        <p class="text-medium-light py-1 pl-2">
                            その他情報の誤りを報告する
                        </p>
                    </div>

                    <textarea class="mt-2 form-control text-medium-xs search-school"  id="warn" rows="6"></textarea>
                </div>

                <div class="mt-4 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input require" id="radio_accept" name="radio_accept" value="1" required>
                    <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="ml-0 menu-icon text-decoration" id="privacy">｢利用方法およびガイドライン｣</span>に同意します｡</label>
                </div>
            </div>



        </div>
    </div>





@endsection

@section('footer_image')
    <img src="{{ asset('img/footer_2.png') }}" style="width: 100%">
@endsection


@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 0rem; ">
        <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: 3.5rem">

        <div class="background-pink card-body" id="btn_upload">
            <p class="text-center text-large text-white">編集･修正を申請する</p>
            <p class="text-center text-medium-xs text-white">正確な情報記載へのご協力ありがとうございます</p>
        </div>
    </div>


@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">





        $(document).ready(function() {
            var index = 1;
            var home_path = $("#home_path").val();
            function addPhoto() {
                var content = $("#add_photo").html();
                content = content.replace(/_index/g, "_index_" + index);
                $("#photo_list").append(content);
                index = index + 1;
            }

            $('.top-title-tag').click(function () {
                window.history.back();
            })

            addPhoto();

            $("#btn_add").click(function(event) {
                event.preventDefault();
                addPhoto();
            });

            $(document).on('input', "[name='limit-length']", function() {
                var val = $(this).val();
                var length = val.length;
                var id = $(this).attr('relate-count-id');
                var maxLength = $(this).attr('maxlength');
                $("#" + id).html(length + '/' + maxLength);
            });

            $(document).on('click', "[name='image-add']", function() {
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var index = split[1];
                $("#image_content_add_index_" + index).click();
            });

            $(document).on('click', "[name='image-cancel']", function() {
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var index = split[1];
                $("#img_body_content_index_" + index).addClass('d-none');
                $("#img_body_content_index_" + index).removeClass('d-flex');
                $("#img_empty_index_" + index).removeClass('d-none');
                $("#img_empty_index_" + index).addClass('d-flex');
            });

            function readURL(input, index) {
                if (input.files && input.files[0]) {
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
                }
            }

            $(document).on('change', "[name='image-content']", function() {
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var index = split[1];
                readURL(this, index);
            });

            $("#btn_upload").click(function() {
                window.location.href = home_path + '/school/complete/modify'
            })

        });




    </script>
@endsection
