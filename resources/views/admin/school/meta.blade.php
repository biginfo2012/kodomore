@extends('admin.layouts.app')

@section('nav')
    @include('admin.layouts.navbar')
@endsection

@section('css4page')
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
    <style>
        .main-content {
            background-color: #F2F2F2;
        }

        .tag-title {
            border-top: 1px solid #808080;
            background-color: #DAF6F6;
            padding-top: 0;
            padding-bottom: 0;
            color: white;
        }

        .border-weight {
            background-color: #4786A0;
            border: 3px solid #B3b3B3;
        }

        .border-bottom {
            border-bottom: 2px solid #808080 !important;
        }

        .border-right {
            border-right: 2px solid #808080 !important;
        }

        .border-light-bottom {
            border-bottom: 2px solid #CCCCCC;
        }

        #garden_basic {
            width: 88%;
        }

        .card {
            background-color: transparent;
        }

        .card > .border-light-bottom:last-child {
            border-bottom: 0px !important;
        }

        .left-bottom {
            left: 0;
            bottom: 0;
        }

        .custom-control-label::before {
            top: .25rem;
            left: -1.25rem;
        }

        .img-source {
            border: 1px dashed #919191;
        }

        .h-100 {
            height: 100%;
        }

        .img-content {
            border-radius: .5rem;
            border: 1px solid #919191;
        }

        .icon-add {
            width: auto;
            height: 24px;
        }


        .custom-control-label {
            white-space: nowrap;
        }

        .nowrap {
            white-space: nowrap;
        }

        .border-crop {
            border: 1px solid;
        }

        .btn-save {
            font-weight: 800;
            background-color: #2BAFFF;
            {{--background-image: url("{{asset('img/top-search.png')}}");--}}
               border: 0px;
            background-repeat: round;
            color: white;
            border-radius: 5px;
        }

        .btn-save:focus {
            outline: 0px !important;
        }

        .btn-save:active {
            color: #2BAFFF;
            background-color: white;
        }

        @media (min-width: 768px) {
            .btn-save:hover {
                color: #2BAFFF;
                background-color: white;
            }
        }

        input[type=time] {
            width: auto;
        }

        .custom-checkbox .custom-control-label::before {
            left: -1.5rem;
        }

        .custom-radio .custom-control-label::before {
            left: -1.5rem;
        }


        .custom-control-label::after {
            top: .25rem;
        }

        .empty-image {
            width: 2.8rem;
            height: 2rem;
        }

        [name='image_content_add_button']:hover {
            cursor: default;
        }

        [name='image_content_remove_button']:hover {
            cursor: default;
        }

        .text-small-admin {
            font-size: 14px;
            font-family: YugoMedium;
        }

        .active-border {
            border-color: red;
        }

        .require {
            font-size: 14px;
            font-family: YugoMedium;
            background-color: #FF557E !important;
            color: white !important;
            border: 1px solid #FF557E;
            border-radius: 5px;
            padding: 4px;
        }

        .text-dark-blue {
            color: #216887 !important;
        }

        .radio-logo-width-img {
            padding-bottom: 40% !important;
        }

        .radio-logo-height-img {
            padding-bottom: 125% !important;
        }

        [name=minus-notification] {
            z-index: 10;
        }


        .btn-sky {

        }

        form:invalid button[type='submit'] {
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }

        .map-overlay {
            background-color: #666666DD;
            left: -4rem;
            right: -4rem;
            bottom: 40px;
        }

        .map-overlay:after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: 0;
            height: 0;
            border-top: solid 20px #666666DD;
            border-left: solid 20px transparent;
            border-right: solid 20px transparent;
        }


        .text-small-xs {
            font-size: 11px !important;
            font-family: YugoMedium;
        }

        .text-small {
            font-size: 12px !important;
            font-family: YugoMedium;
        }

        .text-normal {
            font-size: 13px !important;
            font-family: YugoMedium;
        }

        .text-normal-title {
            font-size: 13px !important;
            font-family: YugoBold;
        }

        .text-medium-xs {
            font-size: 14px !important;
            font-family: YugoMedium;
        }


        .text-medium-title {
            font-size: 14px !important;
            font-family: YugoBold;
        }


        .text-large-xs {
            font-size: 16px !important;
            font-family: YugoBold;
        }

        .text-medium {
            font-size: 15px !important;
            font-family: YugoBold;
        }

        .text-medium-light {
            font-size: 15px !important;
            font-family: YugoMedium;
        }

        .text-large {
            font-size: 17px !important;
            font-family: YugoBold;
        }

        .text-large-medium {
            font-size: 17px !important;
            font-family: YugoMedium;
        }

        .text-title-large {
            font-size: 19px !important;
            color: white;
            font-family: YugoBold;
        }

        .text-title-large-modal {
            font-size: 22px !important;
            color: white;
            font-family: YugoBold;
        }

        .text-title {
            font-size: 24px !important;
            font-family: YugoBold;
        }

        .text-title-medium {
            font-size: 18px !important;
            font-family: YugoMedium;
        }

        .text-large-demi {
            font-size: 23px !important;
            font-family: "Franklin Gothic Demi";
        }

        .text-medium-demi {
            font-size: 15px !important;
            font-family: "Franklin Gothic Demi";
        }

        .footer-company {
            font-size: 9px !important;
            font-family: YugoMedium;
            color: white;
        }

        .height-1 {
            height: 1rem;
            min-width: .1rem;
        }

        .height-2 {
            height: 2rem;
            min-width: .1rem;
        }

        .height-1-half {
            height: 2rem;
            min-width: .1rem;
        }

        .height-3 {
            height: 3rem;
            min-width: .1rem;
        }

        .width-1 {
            width: 1rem;
        }

        .text-bold-menu {
            font-size: 12px;
            font-family: YugoBold;
        }

        .img-up {
            position: absolute;
            right: 1rem;
            bottom: 1.25rem;
            width: 2.4rem;
        }

        .img-top {
            position: absolute;
            left: 1rem;
            bottom: 1.25rem;
            width: 3rem;
        }

        .carousel-icon {
            height: 30px;
            width: 30px;
            /* padding: .5rem; */
            border-radius: 50%;
            background-color: white;
            /* width: 20px; */
            /* height: 20px; */
        }

        .category.active {

            background-color: #EFFAFB;
        }

        .category {
            background-color: white;
            border: 1px solid #31BCC7;
            color: #1C3F54;
            font-size: 13px;
            font-family: YugoMedium;
        }

        .category.disable {
            background-color: #dedede;
            border: 1px solid #ABABAB;
            color: #ABABAB;
        }

        .logo {
            width: unset;
            height: 5rem;
        }

        .logo-big {
            width: unset;
            height: 10rem;
        }

        .show-event {
            /* background-color: #59B6E8; */
            background-color: #dedede;
        }

        .clock-time {
            width: 0.75rem
        }

        .btn-preview {
            background-color: #31BCC7;

        }

        .btn-blue-grey {
            background-color: #C4C4C4 !important;
            border: 0px !important;
            outline: none !important;
        }

        button {
            border-width: 1px;
            border-color: #999999;
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
            background-size: 75%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23FF335A' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e");
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }

        .custom-radio .custom-control-input:checked ~ .custom-control-label::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='-4 -4 8 8'%3e%3ccircle r='4' fill='%2331BCC7'/%3e%3c/svg%3e");
        }

        .custom-radio .custom-control-input:checked ~ .custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }

        .btn-add {
            background-image: linear-gradient(0deg, #CCCCCC, #F2F2F2);
        }

        .btn-normal {
            position: relative;
        }

        .btn-normal::before {
            content: "";
            width: 100%;
            height: 50%;
            background: black;
            opacity: .1;
            position: absolute;
            top: 50%;
            left: 0%;

        }

        .img-toggle {
            background-color: #DCDCDC;
            border-radius: 50%;
            bottom: 0px;
            right: 20%;
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .img-content {
            cursor: pointer;
        }

        .img-content:active {
            cursor: move;
            cursor: -webkit-grabbing;
        }

        .text-decoration {
            cursor: pointer;
        }

        .image_modify_modal {
            max-width: 650px;
            height: 600px;
            top: calc(50% - 300px);
        }

        #image_area {
            width: 502px;
            height: fit-content;
            margin: auto;
            cursor: grab;
        }

        .slider_mark {
            font-size: 30px;
            margin: 10px;
        }

        .grabbing {
            cursor: grabbing !important;
        }

        .text-menu-user {
            font-size: 20px !important;
            font-family: YugoBold;
        }
        .height-1 {
            height: 1rem;
            min-width: .1rem;
        }
        .w-20{
            width: 20% !important;
        }

        .under-tab{

            border-bottom: 6px solid #EAEAEA;
            background-color: #A7EBE8
        }
        .under-tab:active{
            border-bottom: 6px solid #216887 !important;
        }


    </style>
@endsection

@section('content')
    <input type="hidden" id="garden_id" value="{{$garden -> garden_id}}">
    <div class="position-sticky card-header z-depth-1">
        <div class="d-flex align-items-center py-2">
            <p class="flex-1 text-title">{{$garden -> garden_name}}</p>
            <div class="d-flex align-items-baseline">
                <p class="mr-2  text-menu-small">ID：000000(自動生成)</p>
                <img class='title-kodomore img-icon height-1-half' src="<?=asset('img/kodomore.png');?>">
            </div>
        </div>
    </div>
    <div class="w-100 d-flex">
        <div class="w-20" style="border-right: 2px solid white;">
            <div class="under-tab d-flex" style="border-bottom: 6px solid #216887 !important;">
                <a class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto text-3" href="{{url('/admin/school/detail')}}">
                    <img class="img-icon height-2 p-1" src="{{asset('img/detail-edit-blue.png')}}"><span style="padding-top: 5px;">詳細ページ編集</span>
                </a>
            </div>

        </div>
        <div class="w-20" style="border-right: 2px solid white;">
            <div class="under-tab d-flex">
                <p class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto">
                    <img class="img-icon height-2 p-1" src="{{asset('img/event-blue.png')}}"><span style="padding-top: 5px;">イベント情報</span>
                </p>
            </div>
        </div>
        <div class="w-20" style="border-right: 2px solid white;">
            <div class="under-tab d-flex">
                <p class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto">
                    <img class="img-icon height-2 p-1" src="{{asset('img/blog-blue.png')}}"><span style="padding-top: 5px;">ブログ</span>
                </p>
            </div>
        </div>
        <div class="w-20" style="border-right: 2px solid white;">
            <div class="under-tab d-flex">
                <p class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto">
                    <img class="img-icon height-2 p-1" src="{{asset('img/com-blue.png')}}"><span style="padding-top: 5px;">コミュニケーション</span>
                </p>
            </div>
        </div>

        <div class="w-20" style="">
            <div class="under-tab d-flex">
                <p class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto">
                    <img class="img-icon height-2 p-1" src="{{asset('img/setting-blue.png')}}"><span style="padding-top: 5px;">設定</span>
                </p>
            </div>
        </div>

    </div>

    <div class="card-body">
        <div class="d-flex align-items-center">
            <p class="flex-1 text-menu-user">園トップの登録･編集 > 検索表示設定</p>
            <img class="ml-3 img-icon height-1" src="{{asset('img/clock.png')}}">
            <p class="ml-1 text-menu-small" id="cur_date"> 0000/00/00　00：00</p>
        </div>
    </div>

    <form class="needs-validation" novalidate id="validation_form" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card" id="enter_price">
            <div class="tag-title d-flex" style="background-color: #D3E1E7">
                <p class="card-header top-menu text-menu-user py-1 px-3" style="background-color: #216887 !important;">
                    メタタグ設定
                </p>
                <div class="flex-1"></div>
            </div>
            <div class="card-body text-menu">
                <div class="d-flex">
                    <p class="text-menu p-0">※現在表示されているメタタグは自動生成したものです｡変更されたい場合は枠内の文字を変更して変更内容を更新してください｡</p>
                </div>

                @if(!empty($metaInfo))
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-2 pt-1 pr-0">
                                <p>検索エンジン表示<br>
                                    SEO対策メタタグ作成</p>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-4 pr-1">
                                        <input type="text" class="form-control" name="tag_1" value="{{$metaInfo->tag_1 == '' ? $garden->city_name: $metaInfo->tag_1}}">
                                    </div>
                                    <div class="col-4 px-1">
                                        <input type="text" class="form-control" name="tag_2" value="{{$metaInfo->tag_2 == '' ? $garden->town_name: $metaInfo->tag_2}}">
                                    </div>
                                    <div class="col-4 pl-1">
                                        <input type="text" class="form-control" name="tag_3" value="{{$metaInfo->tag_3 == '' ? $garden->garden_name: $metaInfo->tag_3}}">
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-4 pr-1">
                                        <input type="text" class="form-control" name="tag_4" value="{{$metaInfo->tag_4 == '' ? $keyword1->tag_title: $metaInfo->tag_4}}">
                                    </div>
                                    <div class="col-4 px-1">
                                        <input type="text" class="form-control" name="tag_5" value="{{$metaInfo->tag_5 == '' ? $keyword2->tag_title: $metaInfo->tag_5}}">
                                    </div>
                                    <div class="col-4 pl-1 mt-2">
                                        <pre class="mb-0" style="overflow: visible;">※検索させたい関連ワードを表記</pre>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-4 pr-1">
                                        <input type="text" class="form-control" name="tag_6" value="{{$metaInfo->tag_6}}">
                                    </div>
                                    <div class="col-4 px-1">
                                        <input type="text" class="form-control" name="tag_7" value="{{$metaInfo->tag_7}}">
                                    </div>
                                    <div class="col-4 pl-1 mt-2">
                                        <pre class="mb-0" style="overflow: visible;">※2つの関連ワードは自由にご記入ください</pre>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                メタタイトル
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control" name="meta_title" maxlength="35">{{$metaInfo->meta_title == '' ? $garden->city_name.$garden->town_name.$garden->garden_name.'の教育方針や費用､口コミ評判をみんなで編集': $metaInfo->meta_title}}</textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; bottom: 0">{{mb_strlen($metaInfo->meta_title, 'utf8')}}/35</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1 pr-0">
                                メタディスクリプション
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-8">
                                        <textarea rows="6" class="form-control" maxlength="120" name="meta_description">{{$metaInfo->meta_description}}</textarea>
                                    </div>
                                    <div class="col-4 position-relative ml-n2">
                                        <p class="position-absolute" style="left: 0; bottom: 0">スマホ用文章<br>
                                            {{mb_strlen($metaInfo->meta_description, 'utf8')}}/70<br>
                                            PC用文章<br>
                                            {{mb_strlen($metaInfo->meta_description, 'utf8')}}/120</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1 pr-0">
                                メモ<br>
                                ※公開表示されません
                            </div>
                            <div class="col-8">
                                <textarea rows="10" class="form-control" maxlength="3000" name="memo" placeholder="※覚書を保存できます｡">{{$metaInfo->memo}}</textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; bottom: 0">{{strlen($metaInfo->memo)}}/3,000文字</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-2 pt-1 pr-0">
                                <p>検索エンジン表示<br>
                                    SEO対策メタタグ作成</p>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-4 pr-1">
                                        <input type="text" class="form-control" name="tag_1" value="{{$garden->city_name}}">
                                    </div>
                                    <div class="col-4 px-1">
                                        <input type="text" class="form-control" name="tag_2" value="{{$garden->town_name}}">
                                    </div>
                                    <div class="col-4 pl-1">
                                        <input type="text" class="form-control" name="tag_3" value="{{ $garden->kind_name }}{{$garden->garden_name}}">
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-4 pr-1">
                                        <input type="text" class="form-control" name="tag_4" value="{{isset($keyword1->tag_title)?$keyword1->tag_title:''}}">
                                    </div>
                                    <div class="col-4 px-1">
                                        <input type="text" class="form-control" name="tag_5" value="{{isset($keyword2->tag_title)?$keyword2->tag_title:''}}">
                                    </div>
                                    <div class="col-4 pl-1 mt-2">
                                        <pre class="mb-0" style="overflow: visible;">※検索させたい関連ワードを表記</pre>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-4 pr-1">
                                        <input type="text" class="form-control" name="tag_6" >
                                    </div>
                                    <div class="col-4 px-1">
                                        <input type="text" class="form-control" name="tag_7" >
                                    </div>
                                    <div class="col-4 pl-1 mt-2">
                                        <pre class="mb-0" style="overflow: visible;">※2つの関連ワードは自由にご記入ください</pre>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                メタタイトル
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control" name="meta_title" maxlength="35">{{$garden->city_name}}{{$garden->garden_name}}の教育方針や費用、口コミ評判をみんなで編集</textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; bottom: 0">{{ mb_strlen($garden->city_name.$garden->garden_name, 'utf8') +  21}}/35</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1 pr-0">
                                メタディスクリプション
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-8">
                                        <textarea rows="6" class="form-control" maxlength="120" name="meta_description">{{ $garden->prefecture_name }}{{$garden->city_name}}{{$garden->town_name}}{{ $garden->kind_name }}{{$garden->garden_name}}情報｜保育や教育内容、見学や体験イベント、出願方法など{{$garden->garden_name}}を詳しく紹介。生徒、先輩ママの口コミや評判投稿、教育者のコメントも。みんなで編集する{{$garden->garden_name}}の最新情報。一般投稿掲載中。</textarea>
                                    </div>
                                    <div class="col-4 position-relative ml-n2">
                                        <p class="position-absolute" style="left: 0; bottom: 0">スマホ用文章<br>
                                            {{ mb_strlen($garden->prefecture_name.$garden->city_name.$garden->town_name.$garden->kind_name.$garden->garden_name.$garden->garden_name.$garden->garden_name, 'utf8') +  82}}/70<br>
                                            PC用文章<br>
                                            {{ mb_strlen($garden->prefecture_name.$garden->city_name.$garden->town_name.$garden->kind_name.$garden->garden_name.$garden->garden_name.$garden->garden_name, 'utf8') +  82}}/120</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1 pr-0">
                                メモ<br>
                                ※公開表示されません
                            </div>
                            <div class="col-8">
                                <textarea rows="10" class="form-control" maxlength="3000" name="memo" placeholder="※覚書を保存できます｡"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; bottom: 0">0/3,000文字</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>


        <div class="card position-sticky" style="bottom: 0; ">
            <div class="card-body">
                <div class="row my-4">
                    <div class="offset-4 col-6">
                        <div class="d-flex">
                            <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal" style="border: 1px solid #C4C4C4; color: #919191;" id="btn_back">
                                変更を取り消す
                            </button>
                            <button class="mx-2 flex-1 py-1 rounded top-menu text-menu-small btn-normal" style="background-color: #6DDDD9 !important; border: none !important;" id="btn_preview">
                                <img class="mr-1 img-icon height-half mb-1"
                                     src="{{asset('img/preview-icon.png')}}">プレビュー
                            </button>
                            <button class="flex-1 py-1 rounded background-pink text-menu-small text-white btn-normal" style="border: none !important;"
                                    id="btn_save"><img class="mr-1 img-icon height-half py-1" style="padding-bottom: 2px !important;"
                                                       src="{{asset('img/update-icon.png')}}">変更内容を更新
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <p class="mb-2 text-center w-100 text-menu-small">｜ お問合せ ｜ FAQ(よくあるご質問) ｜ ヘルプ ｜ 利用規約 ｜ プライバシーポリシー ｜ </p>

            <div class="card-body text-menu-small background-white">
                <p class="text-center">Copyright ©ad-kit.co,.ltd. All Rights Reserved. No reproduction without
                    permission.</p>
            </div>
        </div>
    </form>


    <form class=" d-none" novalidate id="modify_garden" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="garden_id" id="form_garden_id">
        <input name="origin_list" id="form_origin_list">
        <input name="add_list" id="form_add_list">
    </form>

    <div class="card background-transparent position-sticky" style="bottom: 2rem; margin-top: -140px; z-index: 1">
        <div class="card-body background-opacity">
            <img src="{{asset('img/up_arrow.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>



@endsection

@section('modal')

    <div class="modal fade" id="none" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full image_modify_modal">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 pb-2 px-4">
                    <div class="text-center">
                        <div class="w-100">
                            <label class="text-menu-user">未記入です</label><br>
                            <label class="text-menu-user">記入してから確認してください</label>
                        </div>
                    </div>
                    <div class="m-3" style="position: absolute;right: 0; top: 0;">
                        <img data-dismiss="modal" class="" src="{{asset('img/close_icon.png')}}">
                    </div>
                </div>
                <div class="modal-footer pt-0 pb-0" style="border:none;">
                    <div class="text-center w-100" style="height: fit-content">
                        <button id="exit" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">
                            <span>もどる</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="confirm_exit" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full image_modify_modal">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 pb-0 px-4">
                    <div class="text-center">
                        <div class="w-100">
                            <p style="font-size: 16px !important;">編集中のデータがあります｡ページを移動すると編集中のデータが失くなります｡</p>
                            <p style="font-size: 18px !important;">それでもよろしいですか？</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0 pb-0" style="border:none;">
                    <div class="text-center w-100" style="height: fit-content">
                        {{--                        <button id="exit" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"--}}
                        {{--                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">--}}
                        {{--                            <span>キャンセル</span>--}}
                        {{--                        </button>--}}
                        <button id="no_save" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">
                            <span>移動する</span>
                        </button>
                        <button data-dismiss="modal" id="exit"
                                class="flex-1 py-1 rounded text-white background-dark-blue text-menu-small btn-normal"
                                style="width: 30%; margin-bottom: 10px;"><span>キャンセル</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



@endsection

@section('js4event')
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script type="text/javascript">
        var next_name;


        var change_status = false;

        var is_Exit = function (name) {
            next_name = name;
            if(change_status){
                $('#confirm_exit').modal('show');
            }
            else{
                exitPage(next_name);
            }

        }



        $('#no_save').click(function () {
            exitPage(next_name);
        })
        $('#button_save').click(function () {
            $("#btn_save").trigger('click');
            setTimeout(() => {
                // script to download the picture here
                exitPage(next_name);
            }, 1000);

        })

        $(document).ready(function () {

            $('#btn_preview').click(function(){
                event.preventDefault();
                var selectMeta = {};
                selectMeta['meta_description'] = $('[name=meta_description]').val()
                selectMeta['meta_title'] = $('[name=meta_title]').val();

                localStorage.setItem('meta_garden', JSON.stringify(selectMeta));
                var garden_id = $("#garden_id").val();
                var url = home_path + '/admin/school/meta/preview/' + garden_id;
                console.log(selectMeta);
                window.open(url, 'School Detail', 'height=300,width=375');
            })
            $('input').on('change', function () {
                change_status = true;
            })
            $('textarea').on('change', function () {
                change_status = true;
            })
            $('[name=meta_title]').on('input', function () {
                var val = $(this).val();
                var length = val.length;
                $(this).parent().next().find('p').html(length + '/35');
            })
            $('[name=meta_description]').on('input', function () {
                var val = $(this).val();
                var length = val.length;
                $(this).parent().next().find('p').html('スマホ用文章' + '<br>' +
                length + '/70' + '<br>' +
                'PC用文章' + '<br>' +
                length + '/120');
            })
            $('[name=memo]').on('input', function () {
                var val = $(this).val();
                var length = val.length;
                $(this).parent().next().find('p').html(length + '/3,000文字');
            })
            $("#btn_save").click(function (event) {
                event.preventDefault();
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {

                    var form = $('form')[0]; // You need to use standard javascript object here
                    var formData = new FormData(form);

                    var url = home_path + '/admin/school/modify/meta'
                    $.ajax({
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {
                            alertify.success("更新成功");
                            //window.location.reload();
                        }
                    });
                }

            });

            $("#btn_back").click(function (event) {
                event.preventDefault();
                window.location.reload();
            });


            $("#move_top").click(function () {
                window.scrollTo(0, 0);
            });


        });
    </script>
@endsection
