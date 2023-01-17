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
            border: 2px solid #B3b3B3;
        }

        .border-bottom {
            border-bottom: 1px solid #808080 !important;
        }

        .border-right {
            border-right: 1px solid #808080 !important;
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
            /*top: .25rem;*/
            left: -1.25rem;
        }

        .img-source {
            border: 1px dashed #919191;
            cursor: grab;
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
            /* {{--background-image: url("{{asset('img/top-search.png')}}");--}} */
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
            /*.btn-save:hover {*/
            /*    color: #2BAFFF;*/
            /*    background-color: white;*/
            /*}*/
        }

        input[type=time] {
            width: auto;
        }


        /*.custom-control-label::after {*/
        /*    top: .25rem;*/
        /*}*/

        .empty-image {
            width: 1.8rem;
            height: 1.4rem;
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
            border-radius: 8px;
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


        .cr-slider {
            margin: auto;
            -webkit-appearance: none;
            width: 275px;
            cursor: pointer;
            border-radius: 5px;
            /* position: relative;
            overflow: hidden;
            padding-top: 5px;
            padding-bottom: 5px;
            height: 8px;

            border-radius: 50px;
            outline: none; */
        }

        form:invalid button[type='submit'] {
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }

        .map-overlay {
            background-color: #666666DD;
            top: 8rem;
            left: -5rem;
            width: 200%;
        }

        .map-overlay:after {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: 0;
            height: 0;
            border-bottom: solid 20px #666666DD;
            border-left: solid 20px transparent;
            border-right: solid 20px transparent;
        }
        .require1 {
            font-size: 14px;
            font-family: YugoMedium;
            color: #FF557E !important;
            border: 1px solid #FF557E;
            border-radius: 5px;
            flex: none;
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
        .text-menu-user {
            font-size: 20px !important;
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

        /*.img-content {*/
        /*    cursor: pointer;*/
        /*}*/

        /*.img-content:active {*/
        /*    cursor: move;*/
        /*    cursor: -webkit-grabbing;*/
        /*}*/

        .text-decoration {
            cursor: pointer;
        }

        .image_modify_modal {
            max-width: 650px;
            height: 600px;
            top: calc(50% - 300px);
        }

        .image_youtube_modal {
            max-width: 900px;
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

        .border-shadow {
            box-shadow: 0 0px 15px 20px rgba(0, 0, 0, 0.2), 0 8px 6px 10px rgba(0, 0, 0, 0.19)
        }

        .custom-control-label::before {
            position: absolute;
            top: 0;
            left: -2rem;
            display: block;
            width: 1.5rem;
            height: 1.5rem;
            pointer-events: none;
            content: "";
            background-color: #fff;
            border: #adb5bd solid 1px;
        }

        .custom-control-label::after {
            position: absolute;
            top: 0;
            left: -2rem;
            display: block;
            width: 1.5rem !important;
            height: 1.5rem !important;
            content: "";
            background: no-repeat 50%/50% 50%;
        }

        .img-content {
            border-radius: 0 !important;
        }

        .custom-control {
            padding-left: 2rem;
        }

        .drag-content{
            position: absolute;
            bottom: 105px;
            left: 212px;
            z-index: 10;
            font-size: 14px;
            background: black;
            color: white;
            border-radius: 6px;
            opacity: 0.55;
        }

        .up-line{
            width: 27px;
            height: 10px;
            border-bottom: 2px #333333 dashed !important;
            margin: 5px;
        }

        .rounded{
            border-radius: 4px !important;
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

        .title-kodomore {
            cursor: pointer;
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
                <img class='title-kodomore img-icon height-1-half'  src="<?=asset('img/kodomore.png');?>">
            </div>
        </div>
    </div>

    <div class="w-100 d-flex">
        <div class="w-20" style="border-right: 2px solid white;">
            <div class="under-tab d-flex" style="border-bottom: 6px solid #216887 !important;">
                <a class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto text-3">
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

        <div class="w-20">
            <div class="under-tab d-flex">
                <p class="text-menu-small pt-2 pb-1 d-flex ml-auto mr-auto">
                    <img class="img-icon height-2 p-1" src="{{asset('img/setting-blue.png')}}"><span style="padding-top: 5px;">設定</span>
                </p>
            </div>
        </div>

    </div>

    <div class="card-body">
        <div class="d-flex align-items-center">
            <p class="flex-1 text-menu-user">園トップの登録･編集 > メイン情報 </p>
            <a class="text-menu-small menu-icon text-decoration mb-0" id="detail_page" href="{{url('/school/detail') . '/' . $garden -> garden_id}}" target="_blank">詳細ページ表示</a>
            <img class="ml-2 img-icon height-half" src="{{asset('img/detail.png')}}">
            <img class="ml-3 img-icon height-1" src="{{asset('img/clock.png')}}">
            <p class="ml-1 text-menu-small" id="cur_date"> 0000/00/00　00：00</p>
        </div>
    </div>

    <form class="needs-validation" novalidate id="validation_form">
        <div class="card">
            <div class="tag-title d-flex">
                <p class="card-header top-menu text-menu-user py-1 w-25">
                    基本重要情報
                </p>
                <div class="flex-1"></div>
            </div>
            <div class="card-body " id="garden_basic">
                <div class="border-weight"></div>
                <div class="row text-medium-small">
                    <div class="col-4 border-right py-2"><p class="px-3">設立元(法人･付属名)</p></div>
                    <div class="col-8 py-2">{{$garden -> garden_public_name}}</div>
                </div>
                <div class="border-bottom"></div>
                <div class="row text-medium-small">
                    <div class="col-4 border-right py-2"><p class="px-3">園名</p></div>
                    <div class="col-8 py-2">{{$garden -> garden_name}}</div>
                </div>
                <div class="border-bottom"></div>
                <div class="row text-medium-small">
                    <div class="col-4 border-right py-2"><p class="px-3">住所</p></div>
                    <div class="col-8 py-2">
                        <div class="d-flex">
                            <p class="flex-1">
                                <?=$garden->prefecture_name;?><?=$garden->city_name;?><?=$garden->town_name;?><?=$garden->address;?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="border-bottom"></div>
                <div class="row text-medium-small">
                    <div class="col-4 border-right py-2"><p class="px-3">電話番号</p></div>
                    <div class="col-8 py-2">{{$garden -> mobile}}</div>
                </div>
                <div class="border-bottom"></div>
                <div class="row text-medium-small">
                    <div class="col-4 border-right py-2"><p class="px-3">園の種類</p></div>
                    <div class="col-8 py-2">
                        @foreach($garden -> typeList as $type_index => $type)
                            @if($type_index > 0)
                                /
                            @endif
                            {{$type->type_name}}
                        @endforeach
                    </div>
                </div>
                <div class="border-bottom"></div>
                <div class="row text-medium-small">
                    <div class="col-4 border-right py-2"><p class="px-3">園の分類</p></div>
                    <div class="col-8 py-2">
                        {{$garden->kind_name}}
                    </div>
                </div>
                <div class="border-weight"></div>

                <p class="float-right text-menu py-2">※上記施設基本重要情報に変更がある場合は<a class="menu-icon text-decoration"
                                                                              href="{{url('/admin/school/basic')}}">｢重要情報の変更依頼｣</a>からお手続きください
                </p>

            </div>
        </div>
        <div class="card my-2">
            <div class="tag-title d-flex">
                <p class="card-header top-menu text-menu-user py-1 w-25">
                    園状況
                </p>
                <div class="flex-1"></div>
            </div>
            <div class="card-body text-menu">
                <p class="text-menu p-0">緊急時のお知らせ【休園･天災(疫病を含む)への対応に関する情報】　※公開するしないボタンにどちらもチェックが入っていない場合は公開しません｡</p>
                <div class="row mt-1">
                    <div class="col-2 pr-1 py-2 text-menu-small"></div>
                    <div class="col-8 pl-0 position-relative">
                        <div id="add_notification" class="d-none">
                            <div id="notification_index" class="position-relative mb-3">
                                <textarea class="form-control text-menu-small" name="txt-notification"
                                          id="txt_notification_index" placeholder="例)〇〇〇警報発令中のため休園いたします"></textarea>
                                <span class="position-absolute" name="minus-notification" id="minus_notification_index"
                                      style="top: 20px; right: -30px"><img class="img-icon height-half" id="minus_faq"
                                                                           src="{{asset('img/minus.png')}}"></span>
                                <div class="d-flex mt-2">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index"
                                               value="0" name="radio_public_index">
                                        <label class="custom-control-label" for="radio_public_true_index">公開する</label>
                                    </div>
                                    <div class="ml-5 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index"
                                               value="1" name="radio_public_index">
                                        <label class="custom-control-label" for="radio_public_false_index">公開しない</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" id="notification_count" value="{{count($notificationList)}}">

                        <div id="notification_list">
                            @foreach($notificationList as $index => $notification)
                                <div id="notification_index_{{$index}}" class="position-relative mb-3">
                                    <textarea class="form-control text-menu-small" name="txt-notification"
                                              id="txt_notification_index_{{$index}}"
                                              placeholder="例)〇〇〇警報発令中のため休園いたします">{{$notification -> content}}</textarea>
                                    @if($index > 0)
                                        <span class="position-absolute" name="minus-notification"
                                              id="minus_notification_index_{{$index}}"
                                              style="top: 20px; right: -30px"><img class="img-icon height-half"
                                                                                   id="minus_faq"
                                                                                   src="{{asset('img/minus.png')}}"></span>
                                    @endif

                                    <div class="d-flex mt-2">
                                        <div class="custom-control custom-radio">

                                            @if($notification -> type == 1)
                                                <input type="radio" class="custom-control-input"
                                                       id="radio_public_true_index_{{$index}}" value="1" checked
                                                       name="radio_public_index_{{$index}}">
                                            @else
                                                <input type="radio" class="custom-control-input"
                                                       id="radio_public_true_index_{{$index}}" value="1"
                                                       name="radio_public_index_{{$index}}">
                                            @endif
                                            <label class="custom-control-label"
                                                   for="radio_public_true_index_{{$index}}">公開する</label>
                                        </div>
                                        <div class="ml-5 custom-control custom-radio">
                                            @if($notification -> type == 2)
                                                <input type="radio" class="custom-control-input"
                                                       id="radio_public_false_index_{{$index}}" value="2" checked
                                                       name="radio_public_index_{{$index}}">
                                            @else
                                                <input type="radio" class="custom-control-input"
                                                       id="radio_public_false_index_{{$index}}" value="2"
                                                       name="radio_public_index_{{$index}}">
                                            @endif
                                            <label class="custom-control-label"
                                                   for="radio_public_false_index_{{$index}}">公開しない</label>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>


                        <button class="position-absolute text-small-admin rounded px-3 btn-add"
                                style="bottom: 0; right: 15px; border: 1px solid #999999 !important;" id="btn_add_notification">＋緊急時のお知らせの追加
                        </button>
                    </div>
                    <div class="col-2 position-relative"></div>
                </div>
            </div>
            <div class="border-light-bottom"></div>

            <div class="card-body">
                <div class="row">
                    <div class="col-2 pr-1">
                        <p class="text-menu p-0">
                            募集状況
                        </p>
                    </div>
                    <div class="col-8 pl-0">
                        <p class="text-menu p-0">
                            ※該当必須は簡潔にご記入ください｡詳しい願書受付期間は<span class="menu-icon text-decoration">｢入園について｣</span>にご記入ください｡
                        </p>
                    </div>
                </div>

                <div class="row mt-1 justify-content-center">
                    <div class="col-2 pr-1 text-right">
                        <span class="require">必須</span>
                    </div>
                    <div class="col-8 pl-0">
                        <div class="row justify-content-center">
                            <div class="col-5 pr-0">
                                <input type="hidden" id="original_status" value="{{$garden -> status}}">
                                <select style="width: calc(140% - 80px)"
                                    class="px-2 custom-select form-control form-control-sm text-menu-small"
                                    id="reception_status" required>
                                    <option disabled selected>選択してください</option>
                                    <option value="応募受付中">応募受付中</option>
                                    <option value="応募受付期間">応募受付期間</option>
                                    <option value="応募受付終了">応募受付終了</option>
                                    <option value="休園中">休園中</option>
                                    <option value="無選択">無選択</option>
                                </select>
                            </div>
                            <div class="col-2 position-relative py-0">
                                <p class="require1 mr-2 position-absolute" style="right: 0; top: -10px;">該当必須</p>
                            </div>
                            <div class="col-5 pl-0">
                                <input type="text"
                                       class="px-2 form-control text-menu-small"
                                       placeholder="期間記入例)令和2年7/1(水)〜"
                                       id="reception_date" value="{{$garden -> reception_date}}" {{$garden->status=='応募受付中'||$garden->status=='応募受付期間'?'required':''}}>
                            </div>
                        </div>

                    </div>
                    <div class="col-2"></div>
                </div>

                <div class="row mt-4 mb-3">
                    <div class="col-2 pr-1 pt-4">
                        <div class="row">
                            <div class="col-8">
                                <p class=" text-menu p-0 flex-1">
                                    体験と応募
                                </p>
                            </div>
                            <div class="col-4 text-right pl-0">
                                <span class="require">必須</span>
                            </div>
                        </div>


                    </div>
                    <div class="col-9 pl-0">
                        <div class="row">
                            @foreach($keywordList as $keyword)
                                @if($keyword->keyword_id !== 10)
                                    <div class="col-3  pt-4">
                                        <div class="custom-control custom-checkbox">
                                            @if(empty($keyword -> select_id))
                                                <input type="checkbox"
                                                       class="custom-control-input keyword-detail text-medium-small"
                                                       content="<?=$keyword->keyword_title;?>"
                                                       id="keyword_<?=$keyword->keyword_id;?>">
                                            @else
                                                <input type="checkbox"
                                                       class="custom-control-input keyword-detail text-medium-small"
                                                       content="<?=$keyword->keyword_title;?>"
                                                       id="keyword_<?=$keyword->keyword_id;?>" checked>
                                            @endif
                                            <label class="custom-control-label text-medium-small"
                                                   for="keyword_<?=$keyword->keyword_id;?>"><?=$keyword->keyword_title;?></label>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row mt-5">
                    <div class="col-2 pr-1">
                        <div class="row">
                            <div class="col-8 pr-0">
                                <p class=" text-menu p-0 flex-1">
                                    保育無償化の<br>
                                    有無
                                </p>
                            </div>
                            <div class="col-4 text-right pl-0 mt-0">
                                <span class="require mt-2">必須</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 pl-6">
                        <div class="row">
                            @foreach($keywordList as $keyword)
                                @if($keyword->keyword_id == 10)
                                    <div class="col-3 pl-0">
                                        <div class="custom-control custom-radio">
                                            <input type="radio"
                                                   class="custom-control-input text-medium-small"
                                                   name="free_edu" value="1" {{empty($keyword -> select_id)?'':'checked'}}
                                                   id="keyword_price" required>
                                            <label class="custom-control-label text-medium-small"
                                                   for="keyword_price">幼児教育･保育無償化</label>
                                        </div>
                                    </div>
                                    <div class="col-3 pl-0">
                                        <div class="custom-control custom-radio">
                                            <input type="radio"
                                                   class="custom-control-input text-medium-small"
                                                   name="free_edu" value="0" {{!empty($keyword -> select_id)?'':'checked'}}
                                                   id="keyword_free_none" required>
                                            <label class="custom-control-label text-medium-small"
                                                   for="keyword_free_none">無選択</label>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
{{--                            <div class="col-3 pl-0">--}}
{{--                                <div class="custom-control custom-radio">--}}
{{--                                    <input type="radio"--}}
{{--                                           class="custom-control-input text-medium-small"--}}
{{--                                           name="free_edu" value="1"--}}
{{--                                           id="keyword_price" required>--}}
{{--                                    <label class="custom-control-label text-medium-small"--}}
{{--                                           for="keyword_price">幼児教育･保育無償化</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-3 pl-0">--}}
{{--                                <div class="custom-control custom-radio">--}}
{{--                                    <input type="radio"--}}
{{--                                           class="custom-control-input text-medium-small"--}}
{{--                                           name="free_edu" value="0"--}}
{{--                                           id="keyword_free_none" required>--}}
{{--                                    <label class="custom-control-label text-medium-small"--}}
{{--                                           for="keyword_free_none">無選択</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="card my-2">
            <div class="tag-title d-flex">
                <p class="card-header top-menu text-menu-user py-1 " style="min-width: 25%">
                    幼稚園､保育所紹介文を編集する
                </p>
                <div class="flex-1"></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2 pr-1">
                        <div class="row">
                            <div class="col-8">
                                <p class=" text-menu p-0 flex-1">
                                    タイトル
                                </p>
                            </div>
                            <div class="col-4 text-right pl-0">
                                <span class="require mt-1">必須</span>
                            </div>
                        </div>


                    </div>
                    <div class="col-8 pl-0">
                        <p class="text-menu-small">※タイトルは改行すると読みやすくなります｡3行まで可｡</p>
                        <textarea type="text" class="form-control text-menu-small" name="limit-length"
                                  relate-count-id="comment_title_count" id="comment_title"
                                  value="" maxlength="30" required>{{$garden -> comment_title}}</textarea>
                    </div>
                    <div class="col-2 position-relative"><p class="text-menu-small position-absolute left-bottom"
                                                            id="comment_title_count">{{mb_strlen($garden -> comment_title)}}
                            /30</p></div>
                </div>

                <div class="row py-2">
                    <div class="col-2 pr-1">
                        <div class="row">
                            <div class="col-8">
                                <p class=" text-menu p-0 flex-1">
                                    本文
                                </p>
                            </div>
                            <div class="col-4 text-right pl-0">
                                <span class="require">必須</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 pl-0">
                        <p class="text-menu-small">※読みやすいように改行してください｡</p>
                        <textarea class="form-control text-menu-small" name="limit-length"
                                  relate-count-id="comment_description_count" id="comment_description" maxlength="250"
                                  required>{{$garden -> comment_description}}</textarea>
                        <div class="d-flex">

                        </div>
                    </div>
                    <div class="col-2 position-relative"><p class="text-menu-small position-absolute left-bottom"
                                                            id="comment_description_count">{{mb_strlen($garden -> comment_description)}}
                            /250</p></div>
                </div>
            </div>
        </div>

        <div class="card my-2">
            <div class="tag-title d-flex">
                <p class="card-header top-menu text-menu-user py-1 w-25">
                    地図
                </p>
                <div class="flex-1"></div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-2 pr-1">
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-4 text-right pl-0 mt-1">
                                <span class="require">必須</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-8 pl-0">
                        <div class="d-flex mt-1 mb-2">
                            <div class="custom-control custom-radio  d-flex align-items-center">
                                <input type="radio" class="custom-control-input text-menu-small" id="iframe" value="1" {{$garden->map_setting === 1 ? 'checked' : ''}}
                                       name="map" required>
                                <label class="custom-control-label text-menu-small" for="iframe">iframeで地図を埋め込む</label>
                            </div>

                            <!-- Default inline 2-->
                            <div class="ml-5 custom-control custom-radio d-flex align-items-center">
                                <input type="radio" class="custom-control-input text-menu-small" id="show" value="2" {{$garden->map_setting !== 1 ? 'checked' : ''}}
                                       name="map" required>
                                <label class="custom-control-label text-menu-small" for="show">地図を表示しない</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <textarea class="form-control text-menu-small" name="map_iframe"
                                          placeholder='<iframe src="https://www.google.com/maps/=..."></iframe>'
                                          rows="4" {{$garden->map_setting === 1 ? 'required' : ''}}>{{$garden->map_iframe}}</textarea>
                            </div>
                            <div class="col-4 ">
                                <div class="position-relative" style="height: 100%">
                                    <button type="button" class="rounded px-3 py-1 btn-blue-grey btn-normal"
                                            id="google_map">
                                        Googleマップを確認
                                        <img class="img-icon height-half" style="margin-bottom: 2px !important;"
                                             src="{{asset('img/detail-gray.png')}}">
                                    </button>
                                    <p class="position-absolute text-dark-blue text-menu-small" id="map_tutorial"
                                       style="left: 0; bottom: 0"><img class="img-icon height-half mb-1 mr-1"
                                                                       src="{{asset('img/map-info.png')}}">地図を埋め込むには</p>
                                    <div class="position-absolute p-2 map-overlay d-none" id="map_overlay">
                                        <p class="text-menu-small text-white">
                                            Googleマップで表示したい場所を検索→左上にあるメニュー≡をクリックし､中央にある｢地図を共有または埋め込む｣を選択→ダイアログで｢地図を埋め込む｣を選択→テキスト
                                            ボックスの左にある下矢印アイコン▼をクリックしてサイズ｢中｣を選択→埋め込み用コードを取得(HTMLをコピー)→左記iframeのボックスに貼り付け</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="border-light-bottom"></div>
            <div class="card-body">
                <div class="row">
                    <div class="offset-2 col-4 pl-0">
                        <div class="mb-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input text-medium-small"
                                       id="check_original_map">
                                <label class="custom-control-label text-medium-small" for="check_original_map">オリジナルMAPを埋め込む</label>
                            </div>
                        </div>
                        <div class="img-source ">

                            <div class="d-flex flex-column h-100 p-2">
                                <div class="p-2 flex-1">
                                    <div class=" h-100 position-relative" name="map_img_content_show">
                                        <div class="radio-image radio-75-image ">
                                            @if(empty($garden -> bus_route_img))
                                                <img class="img-responsive full-width img-content d-none"
                                                     id="map_img_body">
                                            @else
                                                <img class="img-responsive full-width img-content" id="map_img_body"
                                                     src="{{asset('/storage/img/route/'.$garden -> bus_route_img)}}">
                                                <input type="hidden" value="{{$garden -> bus_route_img}}"
                                                       id="map_img_source_url">
                                            @endif

                                        </div>
                                        @if(empty($garden -> bus_route_img))
                                            <div id="map_img_empty">
                                                <div
                                                    class="position-absolute img-content d-flex justify-content-center w-100 h-100"
                                                    style="left: 0; top: 0">
                                                    <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                </div>
                                                <div class="position-absolute d-flex justify-content-center w-100"
                                                     style="left: 0; bottom: 0">
                                                    <p class="text-menu-small text-center px-1 text-gray">
                                                        ドラッグ&ドロップ､またはファイルを選択</p>
                                                </div>
                                            </div>
                                        @else
                                            <div id="map_img_empty" class="d-none">
                                                <div
                                                    class="position-absolute img-content d-flex justify-content-center w-100 h-100"
                                                    style="left: 0; top: 0">
                                                    <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                </div>
                                                <div class="position-absolute d-flex justify-content-center w-100"
                                                     style="left: 0; bottom: 0">
                                                    <p class="text-menu-small text-center px-1 text-gray">
                                                        ドラッグ&ドロップ､またはファイルを選択</p>
                                                </div>
                                            </div>
                                        @endif


                                    </div>

                                </div>
                            </div>
                            <input id="map_image_content_add" type="file" accept="image/*" style="display:none;"/>
                            <div class="px-2 pb-2">
                                <div class="row">
                                    <div class="col-5 pr-0">
                                        <button type="button" id="btn_add_map_img"
                                                class="rounded w-100 py-0 text-menu-small btn-add" style="border: 1px solid #999999 !important;">ファイルを選択
                                        </button>
                                        <button type="button" id="btn_remove_map_img"
                                                class="mt-1 rounded w-100 py-0 text-menu-small btn-add" style="border: 1px solid #999999 !important;">キャンセル
                                        </button>
                                    </div>
                                    <div class="col-7 pl-1">
                                        <p class="text-menu-small" style="margin-top: 2px !important;">選択されていません</p>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="border-light-bottom"></div>
        <div class="card-body">
            <p class="text-menu-small">交通アクセス　※徒歩1分＝80ｍ､車1分＝400ｍ(1分未満は切り上げ､最短ルートをグーグル確認)　できるだけ正確にご記入ください</p>
            <div class="row mt-2">
                <div class="col-2 pr-1">
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4 text-right pl-0 mt-1">
{{--                            <span class="require">必須</span>--}}
                        </div>
                    </div>
                </div>
                <div class="col-8 pl-0">
                    <div class="row mb-3">
                        <div class="col-6 pr-2">
                            <input type="text" class="form-control text-menu-small" placeholder="例)JR東日本 新宿駅より" name="road_1" id="" value="{{isset($dirList[0])? $dirList[0]->start_target:''}}">
                        </div>
                        <div class="col-3 pl-0 pr-2">
                            <select
                                class="px-2 custom-select form-control form-control-sm text-menu-small"
                                id="direction" name="dir_1">
                                <option {{isset($dirList[0]) || (isset($dirList[0]) && $dirList[0]->direction) == '' ? 'selected':''}}>選択してください</option>
                                <option value="東" {{isset($dirList[0]) && $dirList[0]->direction == '東' ? 'selected':''}}>東</option>
                                <option value="西" {{isset($dirList[0]) && $dirList[0]->direction == '西' ? 'selected':''}}>西</option>
                                <option value="南" {{isset($dirList[0]) && $dirList[0]->direction == '南' ? 'selected':''}}>南</option>
                                <option value="北" {{isset($dirList[0]) && $dirList[0]->direction == '北' ? 'selected':''}}>北</option>
                            </select>
                        </div>
                        <div class="col-3 pl-0">
                            <input type="text" class="form-control text-menu-small" placeholder="例)へ徒歩3分" id="" name="dur_1" value="{{isset($dirList[0])? $dirList[0]->during_time:''}}">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-6 pr-2">
                            <input type="text" class="form-control text-menu-small" placeholder="例)〇〇〇〇公園" id="" name="road_2" value="{{isset($dirList[1])? $dirList[1]->start_target:''}}">
                        </div>
                        <div class="col-3 pl-0 pr-2">
                            <select
                                class="px-2 custom-select form-control form-control-sm text-menu-small"
                                id="direction" name="dir_2">
                                <option {{isset($dirList[1]) || (isset($dirList[1]) && $dirList[1]->direction) == '' ? 'selected':''}}>選択してください</option>
                                <option value="東" {{isset($dirList[1]) && $dirList[1]->direction == '東' ? 'selected':''}}>東</option>
                                <option value="西" {{isset($dirList[1]) && $dirList[1]->direction == '西' ? 'selected':''}}>西</option>
                                <option value="南" {{isset($dirList[1]) && $dirList[1]->direction == '南' ? 'selected':''}}>南</option>
                                <option value="北" {{isset($dirList[1]) && $dirList[1]->direction == '北' ? 'selected':''}}>北</option>
                            </select>
                        </div>
                        <div class="col-3 pl-0">
                            <input type="text" class="form-control text-menu-small" placeholder="例)向かい" name="dur_2" value="{{isset($dirList[1])? $dirList[1]->during_time:''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="card my-2 text-menu-small">
            <div class="tag-title d-flex">
                <p class="card-header top-menu text-menu-user py-1 w-25">
                    TOP画像(最大5まで)
                </p>
                <div class="flex-1"></div>
            </div>

            <div class="card-body">
                <div class="d-flex">
                    <p class="text-menu-small">園のイメージ</p>
                    <div class="flex-1 ml-3">
                        <p class="text-menu-small">※<span class="text-decoration">画像選択</span>で登録した画像から選択してください｡画像は､｢画像の登録･編集｣にて保存･追加できます｡
                        </p>
                        <p class="text-menu-small d-flex">※<label class="up-line"></label>線枠ごとにドラック&ドロップで画像の並び替えができます｡※必須はインデックスに表示される画像となります｡
                        </p>
                        <p class="text-menu-small">※TOP画像はスライドになりますので<span class="text-decoration">画像･レイアウト調整</span>で位置など調整してください｡
                        </p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-2 pr-1">

                    </div>

                    <div class="col-8 top pl-0" id="image_space">
                        <div id="img_public_list">
                            <span class="require">必須</span>
                            <div class="row ">
                                @foreach($publicImgList as $img_index => $img)
                                    <div class="col-4 mt-1 mb-2">
                                        <div class="p-2 img-source drag_item" id="top_{{$img_index}}" data-draggable="item" name="drag_items"
                                             aria-grabbed="false" tabindex="0" draggable="true" aria-dropeffect="none">
                                            <div class=" h-100 position-relative" name="img_content_show"
                                                 id="img_show_index_{{$img_index}}">
                                                <div class="radio-image radio-75-image ">
                                                    @if(empty($img))
                                                        <img class="img-content img-responsive full-width d-none"
                                                             id="img_body_index_{{$img_index}}">
                                                        <input type="hidden" value=""
                                                               id="img_source_url_index_{{$img_index}}">
                                                    @else
                                                        <img class="img-content img-responsive full-width"
                                                             id="img_body_index_{{$img_index}}"
                                                             src="{{asset('/storage/img/garden/'.$img->img)}}">
                                                        <input type="hidden" value="{{$img->id}}"
                                                               id="img_source_url_index_{{$img_index}}">
                                                    @endif
                                                </div>
                                                @if(empty($img))
                                                    <div
                                                        class="img-content position-absolute d-flex justify-content-center w-100 h-100"
                                                        style="left: 0; top: 0" id="img_body_empty_{{$img_index}}">
                                                        <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                    </div>
                                                @else
                                                    <div
                                                        class="img-content position-absolute d-flex justify-content-center w-100 h-100 d-none"
                                                        style="left: 0; top: 0" id="img_body_empty_{{$img_index}}">
                                                        <img src="{{asset('img/empty.png')}}" class="empty-image d-none">
                                                    </div>
                                                @endif
                                            </div>
                                            <p class="text-center mt-1"><span class="text-decoration"
                                                                         id="image_content_add_index_{{$img_index}}"
                                                                         name="image_content_add_button">画像選択</span><span
                                                    class="px-3">|</span><span class="text-decoration"
                                                                               name="image_content_remove_button"
                                                                               id="image_content_remove_index_{{$img_index}}">画像解除</span>
                                            </p>
                                            <p class="text-center text-decoration mt-2"
                                               id="image_content_layout_index_{{$img_index}}"
                                               name="image_content_layout_button">画像･レイアウト調整</p>
                                            @if(empty($img))
                                                <input type="text" class="form-control text-menu-small mt-2"
                                                       placeholder="提供元表記" id="caption_index_{{$img_index}}">
                                                <p class="text-menu-small"><i class="far fa-heart text-pink"></i> <span>0</span>
                                                </p>
                                            @else
                                                <input type="text" class="form-control text-menu-small mt-2"
                                                       placeholder="提供元表記" id="caption_index_{{$img_index}}"
                                                       value="{{$img->img_source}}">
                                                @if($img -> favourite > 0)
                                                    <p class="text-menu-small"><i class="fas fa-heart text-pink"></i>
                                                        <span>{{$img -> favourite}}</span></p>
                                                @else
                                                    <p class="text-menu-small"><i class="far fa-heart text-pink"></i>
                                                        <span>{{$img -> favourite}}</span></p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

{{--                    <div class="col-2 position-relative">--}}
{{--                        <div class="position-absolute img-toggle d-flex justify-content-center" id="move_img_top"--}}
{{--                             relate-icon="icon_img_move_top">--}}
{{--                            <i class="text-white fas fa-angle-up " id="icon_img_move_top"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

            </div>
            <div class="border-light-bottom"></div>
            <div class="card-body">
                <p class="text-menu-small"><span class="text-pink">♥</span>が多い画像5枚(一般投稿･クチコミ画像含む)</p>
                <p class="text-menu-small d-flex">　※TOP画像はスライドになりますので比率4：3にしてください｡※<label class="up-line"></label>線枠ごとにドラック&ドロップでTOP画像に移動できます｡
                </p>
                <div class="row mt-2">
                    <div class="col-2 pr-1">

                    </div>

                    <div class="col-8 other" id="image_space">
                        <div class="row">
                            @if(!empty($privateImgList))
                                <?php $i = 0; ?>
                                @foreach($privateImgList as $img_index => $img)
                                    <?php $i++;?>
                                    <div class="col-4 mt-1 mb-2">
                                        <div class="p-2 img-source drag_item" id="fav_{{count($publicImgList) + $img_index}}" data-draggable="item" name="drag_items"
                                             aria-grabbed="false" tabindex="0" draggable="true" aria-dropeffect="none">
                                            <div class=" h-100 position-relative" name="img_content_show"
                                                 id="img_show_index_{{count($publicImgList) + $img_index}}">
                                                <div class="radio-image radio-75-image ">

                                                        <img class="img-content img-responsive full-width"
                                                             id="img_body_index_{{count($publicImgList) + $img_index}}"
                                                             src="{{asset('/storage/img/garden/'.$img->img)}}">
                                                        <input type="hidden" value="{{$img->id}}"
                                                               id="img_source_url_index_{{count($publicImgList) + $img_index}}">

                                                </div>

                                                    <div
                                                        class="img-content position-absolute d-flex justify-content-center w-100 h-100 d-none"
                                                        style="left: 0; top: 0"
                                                        id="img_body_empty_{{count($publicImgList) + $img_index}}">
                                                    </div>

                                            </div>

                                            <p class="text-center mt-2" style="background-color: #FFDDE5"><span
                                                    id="image_content_add_index_{{count($publicImgList) + $img_index}}"
                                                    name="image_content_add_button"><i class="fas fa-heart text-pink"></i>が多い画像</span>
                                            </p>
                                            <p class="text-center text-decoration mt-1"
                                               id="image_content_layout_index_{{count($publicImgList) + $img_index}}"
                                               name="image_content_layout_button">画像･レイアウト調整</p>

                                                <input type="text" class="form-control text-menu-small mt-2"
                                                       placeholder="提供元表記"
                                                       id="caption_index_{{count($publicImgList) + $img_index}}"
                                                       value="{{$img->img_source}}">
                                                @if($img -> favourite > 0)
                                                    <p class="text-menu-small"><i class="fas fa-heart text-pink"></i>
                                                        <span>{{$img -> favourite}}</span></p>
                                                @else
                                                    <p class="text-menu-small"><i class="far fa-heart text-pink"></i>
                                                        <span>{{$img -> favourite}}</span></p>
                                                @endif


                                        </div>
                                    </div>

                                    @if($i > 4)
                                        @break
                                    @endif
                                @endforeach
                            @else
                                <p class="text-menu-small p-3" style="border: 1px solid #919191"><span class="text-pink">♥</span>がクリックされた画像や投稿画像はまだありません</p>
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="card my-2 text-menu-small pb-3">
            <div class="tag-title d-flex">
                <p class="card-header top-menu text-menu-user py-1 w-25">
                    ロゴまたは動画
                </p>
                {{--                <div class="flex-1 d-flex align-items-center">--}}
                {{--                    <p class="text-menu px-2">※jpgかpngデーダのみ登録できます｡</p>--}}
                {{--                </div>--}}
            </div>

            <div class="card-body text-menu-small">
                <p>ロゴの形に近い方にドラック&ドロップ､またはファイルを選択で登録してください｡</p>
                <p>　※jpgかpngデーダのみ登録できます｡※プレビュー表示で確認してください｡解像度とサイズが適正でない場合は元の画像を直してください｡</p>

            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="offset-2 col-8 pl-0">
                        <div class="row">
                            <div class="col-7">
                                <div class="img-source ">

                                    <div class="d-flex flex-column h-100 p-2">
                                        <div class="p-2 flex-1">
                                            <div class=" h-100 position-relative" name="logo_img_content_show"
                                                 id="logo_img_content_width">
                                                @if(!empty($garden -> photo) && $garden -> photo_type != 2)
                                                    <div class="radio-image radio-logo-width-img ">

                                                        <img class="img-responsive full-width img-content" id="logo_width_img_body"
                                                             src="{{asset('/storage/img/garden/'.$garden -> photo)}}">
                                                        <input type="hidden" value="{{$garden -> photo}}" id="logo_img_source_url">

                                                    </div>
                                                    <div id="logo_img_empty_width" class=" d-none">
                                                        <div
                                                            class="position-absolute img-content d-flex justify-content-center w-100 h-100"
                                                            style="left: 0; top: 0">
                                                            <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                        </div>
                                                        <div class=" position-absolute d-flex justify-content-center w-100"
                                                             style="left: 0; bottom: 0">
                                                            <p class="text-menu-small text-center px-1 text-gray">
                                                                ドラッグ&ドロップ､またはファイルを選択</p>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="radio-image radio-logo-width-img ">
                                                        <img class="img-responsive full-width img-content d-none"
                                                             id="logo_width_img_body">
                                                    </div>
                                                    <div id="logo_img_empty_width">
                                                        <div
                                                            class="img-content position-absolute d-flex justify-content-center w-100 h-100"
                                                            style="left: 0; top: 0">
                                                            <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                        </div>
                                                        <div class="position-absolute d-flex justify-content-center w-100"
                                                             style="left: 0; bottom: 0">
                                                            <p class="text-menu-small text-center px-1 text-gray">
                                                                ドラッグ&ドロップ､またはファイルを選択</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <input id="logo_image_content_add_width" type="file" accept="image/*"
                                               name="logo_image_content_add_file" style="display:none;"/>
                                        <div class="px-2">
                                            <div class="row">
                                                <div class="col-5 pr-0">
                                                    <button type="button" id="btn_add_logo_width" name="add_logo_image"
                                                            class="rounded w-100 py-0 text-menu-small btn-add" style="border: 1px solid #999999 !important;">ファイルを選択
                                                    </button>
                                                    <button type="button" id="btn_remove_logo_width" name="remove_logo_image"
                                                            class="mt-1 rounded w-100 py-0 text-menu-small btn-add" style="border: 1px solid #999999 !important;">キャンセル
                                                    </button>
                                                </div>
                                                <div class="col-7" style="padding-left: 5px !important;">
                                                    <p class="text-menu-small" style="margin-top: 2px !important;">選択されていません</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <div class="col-5 pl-2">
                                <div class="img-source">

                                    <div class="d-flex flex-column h-100 p-2">
                                        <div class="p-2 flex-1">
                                            <div class=" h-100 position-relative" name="logo_img_content_show"
                                                 id="logo_img_content_height">
                                                @if(!empty($garden -> photo) && $garden -> photo_type == 2)
                                                    <div class="radio-image radio-logo-height-img ">

                                                        <img class="img-responsive full-width img-content" id="logo_height_img_body"
                                                             src="{{asset('/storage/img/garden/'.$garden -> photo)}}">

                                                    </div>
                                                    <div id="logo_img_empty_height" class="d-none">
                                                        <div
                                                            class="position-absolute img-content d-flex justify-content-center w-100 h-100"
                                                            style="left: 0; top: 0">
                                                            <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                        </div>
                                                        <div class="position-absolute d-flex justify-content-center w-100"
                                                             style="left: 0; bottom: 0">
                                                            <p class="text-menu-small text-center px-1 text-gray">
                                                                ドラッグ&ドロップ､<br>またはファイルを選択</p>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="radio-image radio-logo-height-img ">
                                                        <img class="img-responsive full-width img-content d-none"
                                                             id="logo_height_img_body">
                                                    </div>
                                                    <div id="logo_img_empty_height">
                                                        <div class="position-absolute d-flex img-content justify-content-center w-100 h-100"
                                                            style="left: 0; top: 0">
                                                            <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                        </div>
                                                        <div class="position-absolute d-flex justify-content-center w-100"
                                                             style="left: 0; bottom: 0">
                                                            <p class="text-menu-small text-center px-1 text-gray">
                                                                ドラッグ&ドロップ､<br>またはファイルを選択</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <input id="logo_image_content_add_height" type="file" accept="image/*"
                                               name="logo_image_content_add_file" style="display:none;"/>
                                        <div class="px-2">
                                            <div class="row">
                                                <div class="col-5 pr-0">
                                                    <button type="button" id="btn_add_logo_height" name="add_logo_image"
                                                            class="rounded w-100 py-0 text-menu-small btn-add px-0" style="border: 1px solid #999999 !important;">ファイルを選択
                                                    </button>
                                                    <button type="button" id="btn_remove_logo_height" name="remove_logo_image"
                                                            class="mt-1 rounded w-100 py-0 text-menu-small btn-add" style="border: 1px solid #999999 !important;">キャンセル
                                                    </button>
                                                </div>
                                                <div class="col-7" style="padding-left: 5px !important;">
                                                    <p class="text-menu-small" style="margin-top: 2px !important;">選択されていません</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-2 position-relative pl-0">
                        <div class="card-body background-opacity position-absolute py-0 pl-0" style="bottom: 0px; left: 0px">
{{--                            <button class="btn-save px-3 py-2  text-menu-small rounded btn-preview btn-normal"--}}
{{--                                    id="btn_preview"> プレビュー表示--}}
{{--                            </button>--}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body text-menu-small" style="border-top: 1px solid #CCCCCC">
                <p>PR動画を埋め込み可能です｡動画のスタート画面は園名(ロゴマークなど)を入れられる事をオススメします｡</p>
                <p>　YouTube動画の埋め込み <img class="img-icon height-half mb-1" style="height: fit-content"
                                        src="{{asset('img/youtube.png')}}">YouTube URL
                </p>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-6 px-0">
                        <input type="text" class="form-control text-menu-small"
                               name="youtube" value=""
                               placeholder="URLを貼り付けてください" maxlength="250">
                        <button class="mt-3 flex-1 px-4 py-1 rounded text-menu-small btn-normal btn-preview text-white"  style="background-color: #E70000 !important; border: none !important;"
                                id="youtube_price"> <img class="mr-1 img-icon height-half mb-1"
                                                       src="{{asset('img/white-cam.png')}}">YouTube動画作成お見積もり依頼
                        </button>
{{--                        <img class="img-icon height-half mt-3" style="height: fit-content" id="youtube_price"--}}
{{--                             src="{{asset('img/search_btn.png')}}">--}}
                    </div>
                    <div class="col-2 pl-1">
                        <button type="button" id="btn_add_uniform_img" style="margin-top: 1px; border: 1px solid #999999 !important;"
                                class="rounded w-100 py-1 text-menu-small btn-add">
                            埋め込み
                        </button>

                    </div>
                </div>
            </div>

        </div>

        <div class="card" style="bottom: 0; z-index: 50">
            <div class="card-body">
                <div class="row mt-4 mb-4">
                    <div class="offset-4 col-6" style="padding-bottom: 40px;">
                        <div class="d-flex">
                            <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal" style="border: 1px solid #C4C4C4; color: #919191;" id="btn_reload">
                                変更を取り消す
                            </button>
                            <button class="mx-2 flex-1 py-1 rounded text-menu-small btn-normal btn-preview"  style="background-color: #6DDDD9 !important; border: none !important;"
                                    id="btn_preview"> <img class="mr-1 img-icon height-half mb-1"
                                                          src="{{asset('img/preview-icon.png')}}">プレビュー
                            </button>
                            <button type="submit"
                                    class="flex-1 py-1 rounded background-pink text-menu-small text-white btn-normal" style="border: none !important;"
                                    id="btn_save"><img class="mr-1 img-icon height-1 py-1" style="height: 32px;"
                                                       src="{{asset('img/update-icon.png')}}">変更内容を更新
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card background-transparent position-sticky" style="bottom: 12rem !important; margin-top: -140px">
            <div class="card-body background-opacity">
                <img src="{{asset('img/up_arrow.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
            </div>
        </div>
        <div class="card-body px-0 pt-5 mt-4 pb-0">
            <p class="mb-2 text-center w-100 text-menu-small">｜ お問合せ ｜ FAQ(よくあるご質問) ｜ ヘルプ ｜ 利用規約 ｜ プライバシーポリシー ｜ </p>

            <div class="card-body text-menu-small background-white" style="border-top: 1px solid #CCCCCC">
                <p class="text-center">Copyright ©ad-kit.co,.ltd. All Rights Reserved. No reproduction without
                    permission.</p>
            </div>
        </div>
    </form>

    <input type="hidden" id="garden_name_1" value="{{$garden -> garden_name}}">


    <form class=" d-none" novalidate id="modify_garden" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="id_list" id="form_id_list">
        <input name="garden_id" id="form_garden_id">
        <input name="notification_list" id="form_notification_list">
        <input name="direction" id="form_direction">
        <input name="reception_status" id="form_reception_status">
        <input name="reception_date" id="form_reception_date">
        <input name="keyword_list" id="form_keyword_list">
        <input name="comment_title" id="form_comment_title">
        <input name="comment_description" id="form_comment_description">
        <input name="public_list" id="form_public_list">
        <input name="top_list" id="form_top_list">
        <input name="layout_list" id="form_layout_list">
        <input name="map_setting" id="form_map_setting">
        <input name="map_iframe" id="form_map_iframe">
    </form>



@endsection

@section('modal')
    <div class="modal fade" id="modal_preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content background-transparent">
                <div class="modal-body py-0">
                    <input type="hidden" id="garden_name" value="{{$garden -> garden_name}}">
                    <div id="add_img_top" class="d-none">
                        <div class="carousel-item active" style="position: relative" id="modal_top_img_index">

                            <img class="d-block w-100" id="modal_top_img_body_index"
                                 alt="First slide">


                            <div class="text-small-xs text-white d-flex"
                                 style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                    class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                <p class="hit-the-floor" id="modal_top_img_caption_index"></p></div>

                        </div>
                    </div>
                    <div id="add_keyword" class="d-none">
                        <div class=" mr-3 mb-2 px-2 py-1 keyword-background-active text-small rounded rounded-small">

                        </div>
                    </div>
                    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                    <div class="card ">
                        <div class="position-relative">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"
                                 style="margin-top: 40px">
                                <div class="carousel-inner" id="modal_carousel_inner">
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                   data-slide="prev">
                                    <div class="d-flex justify-content-center carousel-icon"><i
                                            class="text-black fa fa-chevron-left"></i></div>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                   data-slide="next">
                                    <div class="d-flex justify-content-center carousel-icon"><i
                                            class="text-black fa fa-chevron-right"></i></div>
                                </a>
                            </div>
                            <div class="position-absolute d-none" style="top: 0; left: -15px; right: -15px">
                                <img src="{{asset('img/preview_top.png')}}">
                            </div>
                        </div>

                        <div class="background-white">
                            <div class="card-header text-center text-small pt-2 pb-0">
                                <?=$garden->prefecture_name;?> ｜ <?=$garden->city_name;?> ｜ <?=$garden->town_name;?>
                                @foreach($garden -> typeList as $type)
                                    ｜ {{$type->type_name}}
                                @endforeach
                                    @foreach($tagList as $index => $tag)
                                         @if($tag->id == 68 || $tag->id == 69)
                                            ｜ {{$tag -> tag_title}}
                                        @endif
                                    @endforeach
                            </div>
                            <div class="top-menu card-header py-2 text-center text-title-large ">
                                <?=$garden->garden_name;?>
                            </div>

                            <div class="card-header text-center text-small mt-1">
                            <span class="p-1" style="background-color: #FFFF00" id="modal_reception">
                                @if($garden -> status == '応募受付中')
                                    願書受付期間 {{$garden -> reception_date}}
                                @else
                                    {{$garden -> status}}
                                @endif
                            </span>
                            </div>
                            @if(!empty($garden->photo))
                                @if($garden -> photo_type == 2)
                                    <div class="card-header text-center text-large">
                                        <img class="logo-big" src="{{asset('/storage/img/garden/'.$garden->photo)}}"
                                             id="modal_logo">
                                    </div>
                                @else
                                    <div class="card-header text-center text-large">
                                        <img class="logo" src="{{asset('/storage/img/garden/'.$garden->photo)}}" id="modal_logo">
                                    </div>
                                @endif
                            @endif

                            <div class="text-small text-gray mr-3 d-flex justify-content-center">
                                <div class="flex-1"></div>
                                <img class="img-icon mr-1 clock-time" src="{{asset('img/clock.png')}}">
                                <p id="modal_cur_date" style="line-height: 1"></p></div>

                            <div class="card-body py-1 text-center">
                                <button class="mx-0 btn show-event py-1 text-medium text-white" id="btn_login">メディアにて紹介,
                                    掲載された内容を見る
                                </button>
                            </div>

                            <div class="card-body pt-0">
                                <div class="row">
                                    <a class="col-4 mt-2 px-1" name="type-detail" href="#gallery">

                                        <div class="rounded text-center category py-1 text-bold-menu" name="type">
                                            Photo Gallery
                                        </div>

                                    </a>
                                    <a class="col-4 mt-2 px-1" name="type-detail" href="#map">

                                        <div class="rounded text-center category py-1 text-bold-menu" name="type">
                                            Access Map
                                        </div>

                                    </a>
                                    <a class="col-4 mt-2 px-1" name="type-detail" href="#setting">

                                        <div class="rounded text-center category py-1 text-bold-menu" name="type">
                                            基本情報
                                        </div>

                                    </a>
                                    <a class="col-4 mt-2 px-1" name="type-detail" href="#teacher_talk">

                                        <div class="rounded text-center category disable py-1 text-bold-menu"
                                             name="type">
                                            先生のお話
                                        </div>

                                    </a>
                                    <a class="col-4 mt-2 px-1" name="type-detail" href="#review">

                                        <div class="rounded text-center category disable py-1 text-bold-menu"
                                             name="type">
                                            レビュー
                                        </div>

                                    </a>
                                    <a class="col-4 mt-2 px-1" name="type-detail" href="#faq">

                                        <div class="rounded text-center category disable py-1 text-bold-menu"
                                             name="type">
                                            FAQ
                                        </div>

                                    </a>

                                </div>
                            </div>
                            <div class="card-body py-1">
                                <div class=" text-center text-medium-xs">
                                    <?=$garden->location;?>
                                </div>
                            </div>
                            <div class="card-body py-0">
                                <div class="d-flex flex-wrap mt-2" id="modal_keyword_list">

                                </div>
                            </div>

                            <div class="card-body py-0">
                                <hr class="dot-border">
                                <div class="text-title-large text-black"><?=$garden->comment_title;?></div>
                                <hr class="dot-border">
                                <div class="text-break text-medium-light "
                                     style="text-align: justify"><?=$garden->comment_description;?></div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modal_top_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         data-backdrop="static"
         aria-hidden="true">
        <div class="modal-dialog m-5"
             style="max-width: 100% !important; border: 1px solid #333333; border-radius: 10px; overflow: hidden">
            <div class="modal-content">
                <div class="modal-body px-0 py-0">
                    <div class="card" style="background: #F2F2F2;">

                        <div class="card-header py-2 text-title-large-modal d-flex" style="background: #86C400">
                            <p class="text-left">画像選択　※公開の画像はギャラリーに反映されます｡</p>
                            <div class="mr-3" style="position: absolute;right: 0;">
                                {{--                                <p class="text-medium px-1" data-dismiss="modal" id="x_icon">x</p>--}}
                                <img src="{{asset('img/close_modal.png')}}" class="img-icon" data-dismiss="modal"
                                     id="x_icon" style="height: 1.5rem;">
                            </div>
                        </div>


                        <div class="card-header text-left text-title-medium"
                             style="background: inherit; box-shadow: inset 0 5px 6px grey;">
                            <span class="p-1" id="modal_reception">
                               反映させる画像を選択してください
                            </span>
                        </div>

                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1">
                                    画像カテゴリー：外観･内観･園庭など
                                </p>
                            </div>
                            <div class="row m-3">
                                <?php $isExist = false;?>
                                @foreach($imageList as $image)
                                    @if($image->type === INFO_IMAGE_TYPE)
                                        <?php $isExist = true;?>
                                        <div class="col-2 p-0">
                                            <div class="m-2 p-3"
                                                 style="background: white; height: fit-content; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class=" h-100 position-relative" name="img_content_show"
                                                     id="img_show_index_">
                                                    <div class="radio-image radio-75-image"
                                                         style="padding-bottom: 90% !important;">
                                                    </div>

                                                    <div
                                                        class="position-absolute text-center d-flex justify-content-center w-100 h-100"
                                                        style="left: 0; top: 0; overflow: hidden" id="img_body_empty_">
                                                        <img style="height: 100% !important; width: auto"
                                                             src="{{asset('/storage/img/garden/'.$image -> img)}}" class="">
                                                    </div>

                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_true_index_{{$image->id}}"
                                                               value="1"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 1 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_true_index_{{$image->id}}">公開</label>
                                                    </div>
                                                    <div class="ml-2 custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_false_index_{{$image->id}}"
                                                               value="0"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 0 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_false_index_{{$image->id}}">非公開</label>
                                                    </div>
                                                </div>

                                                <div
                                                    class="py-2 custom-control custom-checkbox pl-4 mt-1 pr-1 text-center"
                                                    style="background: #DAF6F6;margin-left: -1rem;margin-right: -1rem;">
                                                    <input type="checkbox" name="select_category"
                                                           class="custom-control-input text-medium-small"
                                                           content=""
                                                           id="select_category_{{$image->id}}">
                                                    <label class="custom-control-label text-large-medium"
                                                           for="select_category_{{$image->id}}">各カテゴリーに反映</label>
                                                    <input style="display: none" value="{{$image->top}}"
                                                           name="origin_top">
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @if(!$isExist)
                                    <div class="row m-3">
                                        <p class="text-large-medium">登録画像はありません</p>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1">
                                    画像カテゴリー：制服･オリジナルアイテム
                                </p>
                            </div>
                            <div class="row m-3">
                                <?php $isExist = false;?>
                                @foreach($imageList as $image)
                                    @if($image->type === UNIFORM_IMAGE_TYPE)
                                        <?php $isExist = true;?>
                                        <div class="col-2 p-0">
                                            <div class="m-2 p-3"
                                                 style="background: white; height: fit-content; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class=" h-100 position-relative" name="img_content_show"
                                                     id="img_show_index_">
                                                    <div class="radio-image radio-75-image"
                                                         style="padding-bottom: 90% !important;">
                                                    </div>

                                                    <div
                                                        class="position-absolute text-center d-flex justify-content-center w-100 h-100"
                                                        style="left: 0; top: 0; overflow: hidden" id="img_body_empty_">
                                                        <img style="height: 100% !important; width: auto"
                                                             src="{{asset('/storage/img/garden/'.$image -> img)}}" class="">
                                                    </div>

                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_true_index_{{$image->id}}"
                                                               value="1"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 1 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_true_index_{{$image->id}}">公開</label>
                                                    </div>
                                                    <div class="ml-2 custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_false_index_{{$image->id}}"
                                                               value="0"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 0 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_false_index_{{$image->id}}">非公開</label>
                                                    </div>
                                                </div>

                                                <div
                                                    class="py-2 custom-control custom-checkbox pl-4 mt-1 pr-1 text-center"
                                                    style="background: #DAF6F6;margin-left: -1rem;margin-right: -1rem;">
                                                    <input type="checkbox" name="select_category"
                                                           class="custom-control-input text-medium-small"
                                                           content=""
                                                           id="select_category_{{$image->id}}">
                                                    <label class="custom-control-label text-large-medium"
                                                           for="select_category_{{$image->id}}">各カテゴリーに反映</label>
                                                    <input style="display: none" value="{{$image->top}}"
                                                           name="origin_top">
                                                </div>

                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                                @if(!$isExist)
                                    <div class="row m-3">
                                        <p class="text-large-medium">登録画像はありません</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1 mr-2">
                                    画像カテゴリー：園長･スタッフ
                                </p>
                            </div>
                            <div class="row m-3">
                                <?php $isExist = false;?>
                                @foreach($imageList as $image)
                                    @if($image->type === STAFF_IMAGE_TYPE)
                                        <?php $isExist = true;?>
                                        <div class="col-2 p-0">
                                            <div class="m-2 p-3"
                                                 style="background: white; height: fit-content; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class=" h-100 position-relative" name="img_content_show"
                                                     id="img_show_index_">
                                                    <div class="radio-image radio-75-image"
                                                         style="padding-bottom: 90% !important;">
                                                    </div>

                                                    <div
                                                        class="position-absolute text-center d-flex justify-content-center w-100 h-100"
                                                        style="left: 0; top: 0; overflow: hidden" id="img_body_empty_">
                                                        <img style="height: 100% !important; width: auto"
                                                             src="{{asset('/storage/img/garden/'.$image -> img)}}" class="">
                                                    </div>

                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_true_index_{{$image->id}}"
                                                               value="1"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 1 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_true_index_{{$image->id}}">公開</label>
                                                    </div>
                                                    <div class="ml-2 custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_false_index_{{$image->id}}"
                                                               value="0"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 0 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_false_index_{{$image->id}}">非公開</label>
                                                    </div>
                                                </div>

                                                <div
                                                    class="py-2 custom-control custom-checkbox pl-4 mt-1 pr-1 text-center"
                                                    style="background: #DAF6F6;margin-left: -1rem;margin-right: -1rem;">
                                                    <input type="checkbox" name="select_category"
                                                           class="custom-control-input text-medium-small"
                                                           content=""
                                                           id="select_category_{{$image->id}}">
                                                    <label class="custom-control-label text-large-medium"
                                                           for="select_category_{{$image->id}}">各カテゴリーに反映</label>
                                                    <input style="display: none" value="{{$image->top}}"
                                                           name="origin_top">
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if(!$isExist)
                                    <div class="row m-3">
                                        <p class="text-large-medium">登録画像はありません</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1 mr-2">
                                    画像カテゴリー：その他
                                </p>
                                <p class="mt-2 text-title-medium" style="color: black">
                                    ブログ･イベント･預かりの種類･特徴･年間行事･園での1日･献立･系列園･関連上位校などの画像</p>
                            </div>
                            <div class="row m-3">
                                <?php $isExist = false;?>
                                @foreach($imageList as $image)
                                    @if($image->type === OTHER_IMAGE_TYPE)
                                        <?php $isExist = true;?>
                                        <div class="col-2 p-0">
                                            <div class="m-2 p-3"
                                                 style="background: white; height: fit-content; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <div class=" h-100 position-relative" name="img_content_show"
                                                     id="img_show_index_">
                                                    <div class="radio-image radio-75-image"
                                                         style="padding-bottom: 90% !important;">
                                                    </div>

                                                    <div
                                                        class="position-absolute text-center d-flex justify-content-center w-100 h-100"
                                                        style="left: 0; top: 0; overflow: hidden" id="img_body_empty_">
                                                        <img style="height: 100% !important; width: auto"
                                                             src="{{asset('/storage/img/garden/'.$image -> img)}}" class="">
                                                    </div>

                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_true_index_{{$image->id}}"
                                                               value="1"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 1 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_true_index_{{$image->id}}">公開</label>
                                                    </div>
                                                    <div class="ml-2 custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input public_image"
                                                               id="radio_public_select_false_index_{{$image->id}}"
                                                               value="0"
                                                               name="radio_public_select_{{$image->id}}" {{$image->public_type === 0 ? 'checked' : ''}}>
                                                        <label class="custom-control-label text-large-medium"
                                                               for="radio_public_select_false_index_{{$image->id}}">非公開</label>
                                                    </div>
                                                </div>

                                                <div
                                                    class="py-2 custom-control custom-checkbox pl-4 mt-1 pr-1 text-center"
                                                    style="background: #DAF6F6;margin-left: -1rem;margin-right: -1rem;">
                                                    <input type="checkbox" name="select_category"
                                                           class="custom-control-input text-medium-small"
                                                           content=""
                                                           id="select_category_{{$image->id}}">
                                                    <label class="custom-control-label text-large-medium"
                                                           for="select_category_{{$image->id}}">各カテゴリーに反映</label>
                                                    <input style="display: none" value="{{$image->top}}"
                                                           name="origin_top">
                                                </div>

                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                                @if(!$isExist)
                                    <div class="row m-3">
                                        <p class="text-large-medium">登録画像はありません</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1">
                                    画像カテゴリー：メディアにて
                                </p>
                            </div>
                            <div class="row m-3">
                                <p class="text-large-medium">登録画像はありません</p>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="tag-title d-flex">
                                <p class="card-header top-menu text-menu-user py-1">
                                    画像カテゴリー：一般投稿･クチコミ
                                </p>
                            </div>
                            <div class="row m-3">
                                {{--                                @foreach($imageList as $image)--}}
                                {{--                                    @if($image->type === INFO_IMAGE_TYPE)--}}
                                {{--                                        <div class="col-2 p-0" >--}}
                                {{--                                            <div class="m-2 p-3" style="background: white; height: fit-content; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">--}}
                                {{--                                                <div class=" h-100 position-relative" name="img_content_show"--}}
                                {{--                                                     id="img_show_index_">--}}
                                {{--                                                    <div class="radio-image radio-75-image" style="padding-bottom: 90% !important;">--}}
                                {{--                                                    </div>--}}

                                {{--                                                    <div--}}
                                {{--                                                        class="position-absolute text-center d-flex justify-content-center w-100 h-100"--}}
                                {{--                                                        style="left: 0; top: 0; overflow: hidden" id="img_body_empty_">--}}
                                {{--                                                        <img style="height: 100% !important; width: auto" src="{{asset('/storage/img/garden/'.$image -> img)}}" class="">--}}
                                {{--                                                    </div>--}}

                                {{--                                                </div>--}}
                                {{--                                                <div class="d-flex mt-2">--}}
                                {{--                                                    <div class="custom-control custom-radio">--}}
                                {{--                                                        <input type="radio" class="custom-control-input public_image" id="radio_public_select_true_index_{{$image->id}}"--}}
                                {{--                                                               value="1" name="radio_public_select_{{$image->id}}" {{$image->public_type === 1 ? 'checked' : ''}}>--}}
                                {{--                                                        <label class="custom-control-label text-large-medium" for="radio_public_select_true_index_{{$image->id}}">公開</label>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="ml-2 custom-control custom-radio">--}}
                                {{--                                                        <input type="radio" class="custom-control-input public_image" id="radio_public_select_false_index_{{$image->id}}"--}}
                                {{--                                                               value="0" name="radio_public_select_{{$image->id}}" {{$image->public_type === 0 ? 'checked' : ''}}>--}}
                                {{--                                                        <label class="custom-control-label text-large-medium" for="radio_public_select_false_index_{{$image->id}}">非公開</label>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}

                                {{--                                                <div class="py-2 custom-control custom-checkbox pl-4 mt-1 pr-1 text-center" style="background: #DAF6F6;margin-left: -1rem;margin-right: -1rem;">--}}
                                {{--                                                    <input type="checkbox" name="select_category"--}}
                                {{--                                                           class="custom-control-input text-medium-small"--}}
                                {{--                                                           content="" {{$image->top === 1 ? 'checked': ''}}--}}
                                {{--                                                           id="select_category_{{$image->id}}">--}}
                                {{--                                                    <label class="custom-control-label text-large-medium"--}}
                                {{--                                                           for="select_category_{{$image->id}}">各カテゴリーに反映</label>--}}
                                {{--                                                </div>--}}

                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    @endif--}}
                                {{--                                @endforeach--}}
                            </div>
                        </div>

                        <div class="card-body px-0 py-0 border-shadow" style="border-top: 1px solid #808080;">
                            <div class="row mt-4 mb-4">
                                <div class="offset-4 col-4">
                                    <div class="d-flex">
                                        <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                                data-dismiss="modal" id="btn_select_back">戻る
                                        </button>
                                        <button
                                            class="mx-4 flex-1 py-1 rounded text-white text-menu-small btn-normal btn-preview"
                                            id="btn_select_top">反映する
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="image_modify" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full image_modify_modal"
             style="height: 600px !important; top: calc(50% - 300px) !important;">
            <div class="modal-content">
                <div class="modal-body text-center mt-4 pt-4" style="height: 480px">
                    <div style="position: absolute;right: 0.5rem;top: 2rem; width: 4rem">
                        <img class="vanilla-rotate img-icon height-1 mr-2" data-deg="90" src="{{asset('img/rotate-left.png')}}">左
                        <img class="vanilla-rotate img-icon height-1 mr-2" data-deg="-90" src="{{asset('img/rotata-right.png')}}">右

                    </div>
                    <div id="image_area" class="text-center" style="height: 377px; background: #DAF6F6">
                    </div>
                    <div class="px-4 py-1 drag-content">
                        <img class="vanilla-rotate img-icon height-1 mr-2" src="{{asset('img/move-icon.png')}}">ドラッグして位置を調整
                    </div>
                    <input style="display: none" id="modify_img_id" type="number" value="0">
                </div>
                <div class="modal-footer pt-0" style="border:none;">
                    <div class="text-center w-100" style="height: fit-content">
                        <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                data-dismiss="modal" style="border: 1px solid #C4C4C4; color: #919191; width: 30%; margin-bottom: 10px">
                            <span>キャンセル</span>
                        </button>
                        <button type="button" id="share"
                                class="mx-4 flex-1 py-1 rounded text-menu-small btn-normal btn-preview"
                                style="background-color: #6DDDD9 !important; border: none !important;width: 30%; margin-bottom: 10px;"><span>調整</span>
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

    <div class="modal fade" id="youtube" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full image_youtube_modal">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 pb-0 px-4">
                    <div class="text-center p-4" style="background-color: #B6EEEC;">
                        <div class="w-100">
                            <label class="mb-0" style="font-size: 23px !important; font-family: YugoMedium;"><img class="img-icon height-1 mr-2 mb-1"
                                                     src="{{asset('img/youtube.png')}}">YouTube動画作成の見積もりをとる</label>
                        </div>
                    </div>
                    <p class="mt-2 mx-auto text-menu">ご希望の内容をチェックしてください〔複数選択可〕</p>
                    <div class="row mt-2">
                        <div class="col-2  pt-2 pl-4 pr-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input text-medium-small"
                                       content="入園案内ダウンロード" id="youtube_1">
                                <label class="custom-control-label" for="youtube_1" style="font-size: 16px !important; font-family: YugoMedium;">撮影 + 編集</label>
                            </div>
                        </div>
                        <div class="col-1  pt-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input text-medium-small"
                                       content="入園案内ダウンロード" id="youtube_2">
                                <label class="custom-control-label" for="youtube_2" style="font-size: 16px !important; font-family: YugoMedium;">編集</label>
                            </div>
                        </div>
                        <div class="col-4 pl-4 pt-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input text-medium-small"
                                       content="入園案内ダウンロード" id="youtube_3">
                                <label class="custom-control-label" style="font-size: 16px !important; font-family: YugoMedium;"
                                       for="youtube_3">NA(ナレーション+サウンド)</label>
                            </div>
                        </div>
                        <div class="col-3  pt-2 pl-0" style="margin-left: -10px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input text-medium-small"
                                       content="入園案内ダウンロード" id="youtube_4">
                                <label class="custom-control-label" style="font-size: 16px !important; font-family: YugoMedium;" for="youtube_4">ドローン撮影 +
                                    編集</label>
                            </div>
                        </div>
                        <div class="col-2  pt-2 pl-0" style="margin-left: -0.7rem;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input text-medium-small"
                                       content="入園案内ダウンロード" id="youtube_5">
                                <label class="custom-control-label" style="font-size: 16px !important; font-family: YugoMedium;" for="youtube_5">VR撮影 + 編集</label>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex w-100 mt-4 pl-2">
                        <p class="float-left mt-2" style="font-size: 16px !important; font-family: YugoMedium;">作成されたい画像の内容を詳しくご記入ください｡</p>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <textarea class="w-100 rounded" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer pt-0 pb-0" style="border:none;">
                    <div class="text-center w-100" style="height: fit-content">
                        {{--                        <button id="exit" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"--}}
                        {{--                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">--}}
                        {{--                            <span>キャンセル</span>--}}
                        {{--                        </button>--}}

                        <button data-dismiss="modal"
                                class="flex-1 py-1 rounded text-white background-dark-blue text-menu-small btn-normal"
                                style="width: 20%; margin-bottom: 10px;"><span>キャンセル</span>
                        </button>
                        <button class="mt-3 flex-1 px-5 mx-3 py-1 rounded text-menu-small btn-normal btn-preview text-white"  style="background-color: #E70000 !important; border: none !important;"
                                id=""> <img class="mr-1 img-icon height-half" style="height: 1.5rem"
                                                         src="{{asset('img/calculator.png')}}">お見積りへ
                        </button>
                        {{--                        <button id="no_save" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"--}}
                        {{--                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">--}}
                        {{--                            <span>移動する</span>--}}
                        {{--                        </button>--}}
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
            }, 2000);

        })
        $(document).ready(function () {
            var home_path = $("#home_path").val();
            var count = 10;
            var imgIdArr = [];
            var imgFiles = [];
            var modifyImgs = [];
            var imgUrls = [];
            var imgStatus = [];
            var imgMap = null;
            var imgWidthLogo = null;
            var imgHeightLogo = null;


            $(document).on('input', '.cr-slider', function(){

                var max = $(this).attr('max')
                var min = $(this).attr('min')
                var val = $(this).val();
                console.log(max);
                var per_val = ((val - min) * 100) / (max - min);
                var fillLeft = '#65C2C2'
                var fillRight = '#ddd'
                $(this).css('background', `linear-gradient(to right, ` + fillLeft + ` ` + per_val + `%, `+ fillRight + ' ' + per_val + `%`);
//                 console.log(maz, min, val);
//   const max = slider_cr.max;
//   // Calculate visible width
//   const val = ((slider_cr.value - min) * 100) / (max - min);

//   // Change these variables to the colors you need
//   const fillLeft = "#01c1c6";
//   const fillRight = "#d4f5f6";

//   slider_cr.style.background = `linear-gradient(to right, ${fillLeft} ${val}%, ${fillRight} ${val}%`;


            })


            $("#reception_status").val($("#original_status").val());

            $('#reception_status').change(function () {
                if($(this).val() === '応募受付中' || $(this).val() === '応募受付期間'){
                    $('#reception_date')[0].required = true;
                }
                else{
                    $('#reception_date')[0].required = false;
                }
            })
            //$("#recruitment_status").val($("#original_recruiment").val());
            $('input').on('change', function () {
                change_status = true;
            })
            $('textarea').on('change', function () {
                change_status = true;
            })
            $(document).on('change', 'input', function () {

            })
            $('[name=map]').change(function () {
                console.log($(this).val());
                if($(this).val() == '2'){
                    $('[name=map_iframe]')[0].required = false;
                }
                else{
                    $('[name=map_iframe]')[0].required = true;
                }

            })

            // $('#detail_page').click(function () {
            //     var garden_id = $("#garden_id").val();
            //     var url = home_path + '/school/detail/' + garden_id
            //     window.open(url, 'School Detail', 'height=800,width=1200');
            // })

            $('#google_map').click(function () {
                var garden_name = $("#garden_name_1").val();
                console.log(garden_name);
                var url = 'https://www.google.com/maps/?q=' + garden_name;
                window.open(url, 'Google Map', 'height=900,width=1300');

            })



            var today = new Date();
            var dd = today.getDate();

            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var date = yyyy + "/" + mm + "/" + dd;

            $("#modal_cur_date").text(date);
            if (count > 0) {
                for (var i = 0; i < count; i++) {
                    var url = $("#img_source_url_index_" + i).val();
                    if (url) {
                        imgStatus.push(1);
                    } else {
                        imgStatus.push(0);
                    }
                    imgUrls.push(url);
                    imgFiles.push(null);
                }

            } else {
                imgIdArr.push(0);
                imgUrls.push(null);
                count = count + 1;
            }

            var publicList = [];
            var topImageList = [];
            var topImageUrl = [];

            var newPublicList = [];
            var newTopImageList = [];
            var newTopImageUrl = [];

            $('input.public_image').each(function (index) {
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var value = $(this).val();
                var index = split[1];
                if ($(this).prop('checked')) {
                    var tmp = {};
                    tmp['id'] = index;
                    tmp['value'] = value;
                    publicList.push(tmp);
                }

            })
            $('input[name="origin_top"]').each(function () {

                var id = $(this).prev().prev().attr('id');
                var split = id.split('_category_');
                var index = split[1];
                var url = $(this).parent().parent().find('img')[0].src;
                if ($(this).val() === '1') {
                    topImageList.push(index);
                    topImageUrl.push(url)

                }
            })

            $('input.public_image').on('click', function () {
                var id = $(this).attr('id');
                var split = id.split('_index_');
                var value = $(this).val();
                var index = split[1];
                var is_already = false;
                for (var i = 0; i < publicList.length; i++) {
                    if (publicList[i]['id'] === index) {
                        is_already = true;
                        publicList[i]['value'] = value;
                    }
                }
                if (!is_already) {
                    var tmp = {};
                    tmp['id'] = index;
                    tmp['value'] = value;
                    publicList.push(tmp);
                }

            })

            $('input[name="select_category"]').on('click', function () {
                var id = $(this).attr('id');
                var split = id.split('_category_');
                var value = $(this).val();
                var index = split[1];
                var url = $(this).parent().parent().find('img')[0].src;
                if ($(this).prop('checked')) {

                    if (topImageList.length > 4) {
                        alertify.error("Top画像は5つまで選択可能です｡");
                        $(this).prop('checked', false);
                        return
                    }
                    topImageList.push(index);
                    topImageUrl.push(url)


                } else {
                    topImageList = $.grep(topImageList, function (value) {
                        return value != index;
                    });
                    topImageUrl = $.grep(topImageUrl, function (value) {
                        return value != url;
                    });

                }

            })

            $('#youtube_price').click(function () {
                event.preventDefault();
                $('#youtube').modal('show');
            })


            $('#btn_select_top').on('click', function () {
                for (var i = 0; i < topImageUrl.length; i++) {
                    var id = '#img_body_index_' + i;
                    var empty_id = '#img_body_empty_' + i;
                    $(id).removeClass('d-none');
                    $(empty_id).addClass('d-none');
                    $('#img_source_url_index_' + i).val(topImageList[i])
                    $(empty_id).find('img').addClass('d-none');
                    $(id)[0].src = topImageUrl[i];
                }
                $('#modal_top_image').modal('hide')
            })

            $('#btn_select_back').on('click', function () {
                topImageList = [];
                topImageUrl = [];
                $('input[name="origin_top"]').each(function () {


                    var id = $(this).prev().prev().attr('id');
                    var split = id.split('_category_');
                    var index = split[1];
                    var url = $(this).parent().parent().find('img')[0].src;
                    if ($(this).val() === '1') {
                        topImageList.push(index);
                        topImageUrl.push(url)

                        $(this).prev().prev().prop('checked', true);
                    } else {
                        $(this).prev().prev().prop('checked', false);
                    }
                })
            })

            $('#x_icon').on('click', function () {
                topImageList = [];
                topImageUrl = [];
                $('input[name="origin_top"]').each(function () {

                    var id = $(this).prev().prev().attr('id');
                    var split = id.split('_category_');
                    var index = split[1];
                    var url = $(this).parent().parent().find('img')[0].src;
                    if ($(this).val() === '1') {
                        topImageList.push(index);
                        topImageUrl.push(url)

                        $(this).prev().prev().prop('checked', true);
                    } else {
                        $(this).prev().prev().prop('checked', false);
                    }
                })
            })

            // $("#map_tutorial")
            //     .mouseenter(function () {
            //         $("#map_overlay").removeClass('d-none');
            //     })
            //     .mouseleave(function () {
            //         $("#map_overlay").addClass('d-none');
            //     });

            $("#map_tutorial")
                .click(function () {
                    if ($("#map_overlay").hasClass('d-none')) {
                        $("#map_overlay").removeClass('d-none');
                    } else {
                        $("#map_overlay").addClass('d-none');
                    }
                })


            function changeEvent() {
                $(document).on('click', '[name=minus-notification]', function () {
                    var id = $(this).attr('id');
                    var split = id.split('_index_');
                    var index = split[1];

                    $("#notification_index_" + index).remove();
                });

                $("[name='limit-length']").on('input', function () {
                    var val = $(this).val();
                    var length = val.length;
                    var id = $(this).attr('relate-count-id');
                    var maxLength = $(this).attr('maxlength');
                    $("#" + id).html(length + '/' + maxLength);
                });

                $("[name='icon_img_add']").click(function () {
                    addNew();
                });


                $("[name='image_content_add_button']").click(function () {
                    var id = $(this).attr('id');
                    var split = id.split('_index_');
                    var index = split[1];
                    topImageList = []
                    for(var i = 0; i < 5; i++){
                        var val = $('#img_source_url_index_' + i).val();
                        if(val !== ''){
                            topImageList.push(val);
                        }
                    }
                    console.log(topImageList);


                    for (var i = 0; i < topImageList.length; i++) {
                        var index = '#select_category_' + topImageList[i]
                        $(index).prop('checked', true);
                    }

                    $('#modal_top_image').modal('show')

                    //$("#image_content_url_index_" + index).click();
                });

                $("[name='image_content_remove_button']").click(function () {
                    var id = $(this).attr('id');
                    var split = id.split('_index_');
                    var index = split[1];
                    $("#img_body_index_" + index).addClass('d-none');
                    $("#img_body_empty_" + index).removeClass('d-none');
                    $("#img_body_empty_" + index).addClass('d-flex');
                    $("#img_body_empty_" + index).find('img').removeClass('d-none');
                    var img_id = $('#img_source_url_index_' + index).val();
                    $('#img_source_url_index_' + index).val('');
                    $('#caption_index_' + index).val('');
                    $('#caption_index_' +index).next().find('span').text('0');
                    $('#caption_index_' +index).next().find('i').removeClass('fas');
                    $('#caption_index_' +index).next().find('i').addClass('far');
                    for (var i = 0; i < topImageList.length; i++) {
                        if (img_id === topImageList[i]) {
                            topImageList.splice(i, 1);
                            topImageUrl.splice(i, 1);
                            $('#select_category_' + img_id).next().next().val(0);
                        }
                    }
                    imgStatus[index] = 0;
                    var index = '#select_category_' + img_id
                    $(index).prop('checked', false);
                });

                $("[name='image_content_add_file']").change(function () {
                    var id = $(this).attr('id');
                    var split = id.split('_index_');
                    var index = split[1];

                    readURL(this, index);
                });

                // $("[name='img_content_show']").on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
                //     e.preventDefault();
                //     e.stopPropagation();
                // }).on('drop', function (e) {
                //     var id = $(this).attr('id');
                //     var split = id.split('_index_');
                //     var index = split[1];
                //
                //     droppedFiles = e.originalEvent.dataTransfer.files;
                //     var reader = new FileReader();
                //     reader.onload = function (e) {
                //         $("#img_body_index_" + index).attr('src', e.target.result);
                //         $("#img_body_index_" + index).removeClass('d-none');
                //         $("#img_body_empty_" + index).addClass('d-none');
                //         $("#img_body_empty_" + index).removeClass('d-flex');
                //     }
                //
                //     reader.readAsDataURL(droppedFiles[0]);
                //     imgFiles[index] = droppedFiles[0];
                // });
            }

            changeEvent();


            $("[name='map_img_content_show']").on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
                e.preventDefault();
                e.stopPropagation();
            }).on('drop', function (e) {

                droppedFiles = e.originalEvent.dataTransfer.files;
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#map_img_body").attr('src', e.target.result);
                    $("#map_img_body").removeClass('d-none');
                    $("#map_img_empty").addClass('d-none');
                }

                reader.readAsDataURL(droppedFiles[0]);
                imgMap = droppedFiles[0];
            });

            function addNew() {
                var content = $("#add_image").html();

                content = content.replace(/_index/g, "_index_" + count);
                $("[name='icon_img_add']").each(function (index) {
                    $(this).addClass('d-none');
                });
                imgIdArr.push(count);

                $("#img_content_list").append(content);
                $("#img_add_index_" + count).removeClass('d-none');
                imgFiles.push(null);
                imgUrls.push(null);
                count = count + 1;
                changeEvent();
            }

            $("#btn_add_map_img").click(function () {
                $("#map_image_content_add").click();
            });

            $("#map_image_content_add").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#map_img_body").attr('src', e.target.result);
                        $("#map_img_body").removeClass('d-none');
                        $("#map_img_empty").addClass('d-none');
                    }
                    reader.readAsDataURL(this.files[0]); // convert to base64 string
                    imgMap = this.files[0];
                }
            });

            $("#btn_remove_map_img").click(function () {
                $("#map_img_body").addClass('d-none');
                $("#map_img_empty").removeClass('d-none');
                imgMap = null;
            });

            $("[name=add_logo_image]").click(function () {
                var id = $(this).attr('id');
                if (id == 'btn_add_logo_height') {
                    $("#logo_image_content_add_height").click();
                } else {
                    $("#logo_image_content_add_width").click();
                }
            });

            $("[name=remove_logo_image]").click(function () {
                var id = $(this).attr('id');
                if (id == 'btn_remove_logo_height') {
                    $("#logo_height_img_body").addClass('d-none');
                    $("#logo_img_empty_height").removeClass('d-none');
                    imgHeightLogo = null;
                } else {
                    $("#logo_width_img_body").addClass('d-none');
                    $("#logo_img_empty_width").removeClass('d-none');
                    imgWidthLogo = null;
                }
            });

            $("[name=logo_image_content_add_file]").change(function () {
                var id = $(this).attr('id');
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        if (id == 'logo_image_content_add_width') {
                            $("#logo_width_img_body").attr('src', e.target.result);
                            $("#logo_width_img_body").removeClass('d-none');
                            $("#logo_img_empty_width").addClass('d-none');
                        } else {
                            $("#logo_height_img_body").attr('src', e.target.result);
                            $("#logo_height_img_body").removeClass('d-none');
                            $("#logo_img_empty_height").addClass('d-none');
                        }

                    }
                    reader.readAsDataURL(this.files[0]); // convert to base64 string
                    if (id == 'logo_image_content_add_width') {
                        imgWidthLogo = this.files[0];
                    } else {
                        imgHeightLogo = this.files[0];
                    }

                }
            });

            $("[name='logo_img_content_show']").on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
                e.preventDefault();
                e.stopPropagation();
            }).on('drop', function (e) {
                var id = $(this).attr('id');
                droppedFiles = e.originalEvent.dataTransfer.files;
                var reader = new FileReader();
                reader.onload = function (e) {
                    if (id == 'logo_img_content_width') {
                        $("#logo_width_img_body").attr('src', e.target.result);
                        $("#logo_width_img_body").removeClass('d-none');
                        $("#logo_img_empty_width").addClass('d-none');
                    } else {
                        $("#logo_height_img_body").attr('src', e.target.result);
                        $("#logo_height_img_body").removeClass('d-none');
                        $("#logo_img_empty_height").addClass('d-none');
                    }
                }

                reader.readAsDataURL(droppedFiles[0]);
                if (id == 'logo_img_content_width') {
                    imgWidthLogo = droppedFiles[0];
                } else {
                    imgHeightLogo = droppedFiles[0];
                }
            });

            var notification_count = $("#notification_count").val();
            $("#btn_add_notification").click(function (event) {
                event.preventDefault();
                var content = $("#add_notification").html();
                content = content.replace(/_index/g, "_index_" + notification_count);
                $("#notification_list").append(content);
                notification_count = notification_count + 1;
            });

            function readURL(input, index) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        $("#img_body_index_" + index).attr('src', e.target.result);
                        $("#img_body_index_" + index).removeClass('d-none');
                        $("#img_body_empty_" + index).addClass('d-none');
                        $("#img_body_empty_" + index).removeClass('d-flex');
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                    imgFiles[index] = input.files[0];
                    imgStatus[index] = 1;
                }
            }

            $('#btn_preview').click(function () {
                event.preventDefault();
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                // if (forms.checkValidity() === true) {
                    var garden = {};
                    var notificationList = [];
                    $("[name=txt-notification]").each(function () {
                        var id = $(this).attr('id');
                        var value = $(this).val();

                        if (value.length > 0) {

                            var split = id.split("_index_");
                            var index = split[1];
                            var type = $("[name=radio_public_index_" + index + ']:checked').val();
                            var notification = {};
                            notification['type'] = type;
                            notification['content'] = value;
                            notificationList.push(notification);
                        }
                    });

                    garden['notificationList'] = notificationList;

                    var status = $('#reception_status').val();
                    var status_des = $('#reception_date').val();
                    if(status == '無選択'){
                        garden['status'] = '';
                    }
                    else{
                        garden['status'] =status + status_des;
                    }

                    var keywordList = [];
                    var is_none = false;
                    $(".keyword-detail").each(function () {
                        if ($(this).prop('checked')) {
                            var str = $(this)[0].parentElement.innerText;
                            if(str=='無選択'){
                                is_none = true;
                            }
                            keywordList.push(str);
                        }
                    });

                    if(is_none){
                        garden['keywordList'] =[];
                    }else{
                        garden['keywordList'] = keywordList
                    }

                    $('[name=free_edu]').each(function () {
                        if($(this)[0].checked){
                            garden['free_edu'] = $(this).val();
                        }
                    })
                    garden['comment_title'] = $('#comment_title').val();
                    garden['comment_description'] = $('#comment_description').val();
                    $('[name=map]').each(function () {
                        if($(this)[0].checked){
                            garden['map_setting'] = $(this).val();
                        }
                    })

                    var direction = [];
                    var start_taget_1 = $('[name=road_1]').val()
                    if(start_taget_1 !== ''){
                        var tmp = {};
                        tmp['start_target'] = start_taget_1;
                        tmp['direction'] = $('[name=dir_1]').val();
                        tmp['during_time'] = $('[name=dur_1]').val();
                        direction.push(tmp);
                    }
                    var start_taget_2 = $('[name=road_2]').val()
                    if(start_taget_2 !== ''){
                        var tmp = {};
                        tmp['start_target'] = start_taget_2;
                        tmp['direction'] = $('[name=dir_2]').val();
                        tmp['during_time'] = $('[name=dur_2]').val();
                        direction.push(tmp);
                    }
                    //console.log(direction);
                    garden['direction'] = direction;

                    garden['map_iframe'] = $('[name=map_iframe]').val();

                    if (imgMap != null) {
                        garden['imgMap'] = imgMap
                    }
                    var w_logo = $('#logo_width_img_body')[0].src;
                    var h_logo = $('#logo_height_img_body')[0].src;
                    console.log(w_logo)
                    console.log(h_logo);
                    if (w_logo != '') {
                        garden['imgLogo'] = w_logo
                        garden['logo_type'] = 1;
                    } else if (h_logo != '') {
                        garden['imgLogo'] = h_logo;
                        garden['logo_type'] = 2;
                    }
                    console.log(garden['imgLogo']);
                    console.log(garden['notificationList']);

                    localStorage.setItem('garden_preview', JSON.stringify(garden));

                    // for (var i = 0; i < count; i++) {
                    //     if (imgStatus[i] == 1) {
                    //         idList.push(i);
                    //         if (imgFiles[i] != null) {
                    //             formData.append('file_' + i, imgFiles[i]);
                    //         }
                    //     }
                    // }


                    var garden_id = $("#garden_id").val();
                    var url = home_path + '/admin/school/detail/preview/' + garden_id
                    window.open(url, 'School Detail', 'height=900,width=400');
                // }
                // else{
                //     alertify.error("必須項目をご確認ください｡");
                // }

            })

            $("#btn_save").click(function (event) {
                event.preventDefault();
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var garden_id = $("#garden_id").val();

                    var comment_title = $("#comment_title").val();
                    var comment_description = $("#comment_description").val();
                    var reception_status = $("#reception_status").val();
                    var reception_date = $("#reception_date").val();
                    if($("#reception_status").val() !== '無選択'){
                        var reception_status = $("#reception_status").val();
                    }
                    else{
                        var reception_status = '';
                    }

                    //var recruitment_status = $("#recruitment_status").val();
                    var keywordList = [];
                    var is_none = false;
                    $(".keyword-detail").each(function () {
                        if ($(this).prop('checked')) {
                            var id = $(this).attr('id');
                            var split = id.split("_");
                            var index = split[1];
                            if(index=='9'){
                                is_none = true;
                            }
                            keywordList.push(index);
                        }
                    });
                    if(is_none){
                        keywordList =[];
                    }
                    $('[name=free_edu]').each(function () {
                        if($(this)[0].checked){
                            var free_edu = $(this).val();
                            if(free_edu == '1'){
                                keywordList.push('10');
                            }
                        }
                    })
                    var idList = [];
                    var keywordStr = keywordList.join(",");
                    for (var i = 0; i < count; i++) {
                        if (imgStatus[i] == 1) {
                            idList.push(i);
                            if (imgFiles[i] == null) {
                                var input_url = document.createElement('input');
                                input_url.value = imgUrls[i];
                                input_url.name = "img_url_" + i;
                                $("#modify_garden").append(input_url);
                            }
                            var input_caption = document.createElement('input');
                            input_caption.value = $("#caption_index_" + i).val();
                            input_caption.name = "caption_index_" + i;
                            $("#modify_garden").append(input_caption);
                        }
                    }
                    var notificationList = [];
                    $("[name=txt-notification]").each(function () {
                        var id = $(this).attr('id');
                        var value = $(this).val();

                        if (value.length > 0) {

                            var split = id.split("_index_");
                            var index = split[1];
                            var type = $("[name=radio_public_index_" + index + ']:checked').val();
                            var notification = {};
                            notification['type'] = type;
                            notification['content'] = value;
                            notificationList.push(notification);
                        }
                    });

                    var map;
                    $('[name=map]').each(function () {
                        if($(this)[0].checked){
                            map = $(this).val();
                        }
                    })

                    var direction = [];
                    var start_taget_1 = $('[name=road_1]').val()
                    if(start_taget_1 !== ''){
                        var tmp = {};
                        tmp['start_target'] = start_taget_1;
                        tmp['direction'] = $('[name=dir_1]').val();
                        tmp['during_time'] = $('[name=dur_1]').val();
                        direction.push(tmp);
                    }
                    var start_taget_2 = $('[name=road_2]').val()
                    if(start_taget_2 !== ''){
                        var tmp = {};
                        tmp['start_target'] = start_taget_2;
                        tmp['direction'] = $('[name=dir_2]').val();
                        tmp['during_time'] = $('[name=dur_2]').val();
                        direction.push(tmp);
                    }
                    console.log(direction);
                    var topImageListTmp = []
                    for(var i = 0; i < 5; i++){
                        if($('#img_source_url_index_' + i).val() !== ''){
                            topImageListTmp.push($('#img_source_url_index_' + i).val());
                        }
                    }

                    var notificationStr = JSON.stringify(notificationList);
                    var selectIdStr = idList.join(',');

                    $("#form_id_list").val(selectIdStr);
                    $("#form_keyword_list").val(keywordStr);
                    $("#form_notification_list").val(notificationStr);
                    $("#form_public_list").val(JSON.stringify(publicList));
                    $('#form_top_list').val(JSON.stringify(topImageListTmp));
                    $('#form_layout_list').val(JSON.stringify(layoutIdList));
                    $("#form_reception_status").val(reception_status);
                    $("#form_direction").val(JSON.stringify(direction));
                    $("#form_reception_date").val(reception_date);
                    //$("#form_recruitment_status").val(recruitment_status);
                    $("#form_comment_title").val(comment_title);
                    $("#form_comment_description").val(comment_description);
                    $("#form_garden_id").val(garden_id);
                    $('#form_map_setting').val(map)
                    $('#form_map_iframe').val($('[name="map_iframe"]').val());
                    var form = $('form')[1]; // You need to use standard javascript object here
                    var formData = new FormData(form);
                    for (var i = 0; i < count; i++) {
                        if (imgStatus[i] == 1) {
                            idList.push(i);
                            if (imgFiles[i] != null) {
                                formData.append('file_' + i, imgFiles[i]);
                            }
                        }
                    }
                    if (imgMap != null) {
                        formData.append('file_map', imgMap);
                    }
                    if (imgWidthLogo != null) {
                        formData.append('file_width_logo', imgWidthLogo);
                    } else if (imgHeightLogo != null) {
                        formData.append('file_height_logo', imgHeightLogo);
                    }

                    var url = home_path + '/school/modify/' + garden_id;
                    $.ajax({
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {
                            alertify.success("更新成功");
                        }
                    });
                }

            });

            $("#btn_reload").click(function (event) {
                event.preventDefault();
                window.location.reload();
            });

            // $("#btn_detail").click(function (event) {
            //     event.preventDefault();
            //     window.scrollTo(0, 0);
            // });

            $("#move_img_top").click(function () {

                if ($("#icon_img_move_top").hasClass("fa-angle-up")) {
                    $("#img_public_list").addClass('d-none');
                    $("#icon_img_move_top").removeClass('fa-angle-up');
                    $("#icon_img_move_top").addClass('fa-angle-down');
                } else {
                    $("#img_public_list").removeClass('d-none');
                    $("#icon_img_move_top").removeClass('fa-angle-down');
                    $("#icon_img_move_top").addClass('fa-angle-up');
                }
            });


            $("#btn_preview1").click(function (event) {
                event.preventDefault();
                var reception_status = $("#reception_status").val();
                var reception_date = $("#reception_date").val();
                var reception_text = '';
                if (reception_status == '応募受付中') {
                    reception_text = '願書受付期間 ' + reception_date
                } else {
                    reception_text = reception_status
                }
                $("#modal_reception").val(reception_text);
                if (imgWidthLogo != null) {
                    $("#modal_logo").attr('src', $("#logo_width_img_body").attr('src'));
                } else if (imgHeightLogo != null) {
                    $("#modal_logo").attr('src', $("#logo_height_img_body").attr('src'));
                }
                $("#modal_carousel_inner").html('');
                var isFirst = 0;
                for (var i = 0; i < count; i++) {
                    if (imgStatus[i] == 1) {
                        var content = $("#add_img_top").html();
                        content = content.replace(/_index/g, "_index_" + i);
                        $("#modal_carousel_inner").append(content);
                        if (isFirst > 0) {
                            $("#modal_top_img_index_" + i).removeClass('active');
                        }
                        isFirst = 1;
                        $("#modal_top_img_body_index_" + i).attr('src', $("#img_body_index_" + i).attr('src'));
                        var caption = $("#caption_index_" + i).val();
                        var garden_name = $("#garden_name").val();
                        if (caption == '公式サイトより') {
                            caption = garden_name + ' 公式サイトより';
                        } else if (caption.length == 0) {
                            caption = garden_name;
                        }
                        $("#modal_top_img_caption_index_" + i).attr('src', $("#caption_index_0" + i).attr('src'));
                    }
                }
                $("#modal_keyword_list").html('');
                $(".keyword-detail").each(function () {
                    if ($(this).is(':checked')) {
                        var content = $(this).attr('content');
                        var id = $(this).attr('id');
                        var split = id.split("_");
                        var index = split[1];
                        if (index == 8 || index == 9) {
                            $("#modal_keyword_list").append('<div class=" mr-3 mb-2 px-2 py-1 keyword-background-active text-small rounded rounded-small" >\n' +
                                content +
                                '</div>');
                        } else {
                            $("#modal_keyword_list").append('<div class=" mr-3 mb-2 px-2 py-1 keyword-background text-small rounded rounded-small" >\n' +
                                content +
                                '</div>')
                        }

                    }
                });
                $("#modal_preview").modal('show');
            });

            $("#btn_detail").click(function (event) {
                event.preventDefault();
                var reception_status = $("#reception_status").val();
                var reception_date = $("#reception_date").val();
                var reception_text = '';
                if (reception_status == '応募受付中') {
                    reception_text = '願書受付期間 ' + reception_date
                } else {
                    reception_text = reception_status
                }
                $("#modal_reception").val(reception_text);
                if (imgWidthLogo != null) {
                    $("#modal_logo").attr('src', $("#logo_width_img_body").attr('src'));
                } else if (imgHeightLogo != null) {
                    $("#modal_logo").attr('src', $("#logo_height_img_body").attr('src'));
                }
                $("#modal_carousel_inner").html('');
                var isFirst = 0;
                for (var i = 0; i < count; i++) {
                    if (imgStatus[i] == 1) {
                        var content = $("#add_img_top").html();
                        content = content.replace(/_index/g, "_index_" + i);
                        $("#modal_carousel_inner").append(content);
                        if (isFirst > 0) {
                            $("#modal_top_img_index_" + i).removeClass('active');
                        }
                        isFirst = 1;
                        $("#modal_top_img_body_index_" + i).attr('src', $("#img_body_index_" + i).attr('src'));
                        var caption = $("#caption_index_" + i).val();
                        var garden_name = $("#garden_name").val();
                        if (caption == '公式サイトより') {
                            caption = garden_name + ' 公式サイトより';
                        } else if (caption.length == 0) {
                            caption = garden_name;
                        }
                        $("#modal_top_img_caption_index_" + i).attr('src', $("#caption_index_0" + i).attr('src'));
                    }
                }
                $("#modal_keyword_list").html('');
                $(".keyword-detail").each(function () {
                    if ($(this).is(':checked')) {
                        var content = $(this).attr('content');
                        var id = $(this).attr('id');
                        var split = id.split("_");
                        var index = split[1];
                        if (index == 8 || index == 9) {
                            $("#modal_keyword_list").append('<div class=" mr-3 mb-2 px-2 py-1 keyword-background-active text-small rounded rounded-small" >\n' +
                                content +
                                '</div>');
                        } else {
                            $("#modal_keyword_list").append('<div class=" mr-3 mb-2 px-2 py-1 keyword-background text-small rounded rounded-small" >\n' +
                                content +
                                '</div>')
                        }
                    }
                });
                $("#modal_preview").modal('show');
            });

            $("#image_area").on("mousedown touchstart", function (e) {
                $(this).addClass('grabbing')
            })

            $("#image_area").on("mouseup touchend", function (e) {
                $(this).removeClass('grabbing')
            })

            var el = document.getElementById('image_area');
            var vanilla = new Croppie(el, {
                viewport: {
                    width: 500,
                    height: 375,
                    type: 'square'
                },
                // boundary: {
                //     width: 500,
                //     height: 375,
                // },
                //customClass: 'border-crop',
                // showZoomer: true,
                enableResize: false,
                enableZoom: true,
                mouseWheelZoom: false,
                enforceBoundary: false,
                enableOrientation: true
            });
            vanilla.setZoom(1);
            $('.vanilla-rotate').on('click', function(ev) {
                vanilla.rotate(parseInt($(this).data('deg')));
            });

            var para = document.createElement("font");
            var t = document.createTextNode("＋");
            para.style.marginTop = '8px'
            para.appendChild(t);
            para.className = 'slider_mark';
            document.getElementsByClassName("cr-slider-wrap")[0].appendChild(para);

            //insert '-'
            var newItem = document.createElement("font");
            var textnode = document.createTextNode('ー');
            newItem.className = 'slider_mark';

            newItem.appendChild(textnode);
            var slider = document.getElementsByClassName("cr-slider-wrap");
            slider[0].insertBefore(newItem, slider[0].childNodes[0]);

            var max = $('.cr-slider').attr('max')
                var min = $('.cr-slider').attr('min')
                var val = $('.cr-slider').val();
                console.log(max);
                var per_val = ((val - min) * 100) / (max - min);
                var fillLeft = '#65C2C2'
                var fillRight = '#ddd'
                $('.cr-slider').css('background', `linear-gradient(to right, ` + fillLeft + ` ` + per_val + `%, `+ fillRight + ' ' + per_val + `%`);

            $("[name='image_content_layout_button']").click(function () {
                var img = $(this).parent().find('img.img-responsive')
                var id = img[0].id;
                var split = id.split('_index_');
                var index = split[1];

                $('#modify_img_id').val(index);

                var src = img[0].src;
                if (src) {
                    $('#image_modify').modal('show');
                    vanilla.bind({
                        url: src,
                        points: [77, 469, 280, 739]
                    });
//on button click
                    //insert '+';

                }
            });
            var layoutIdList = []
            $('#share').click(function () {
                vanilla.result('base64').then(function (base64) {
                    var index = $('#modify_img_id').val();
                    modifyImgs[index] = base64;
                    var id = '#img_body_index_' + index;
                    $(id)[0].src = base64;
                    var changeId = $(id).next().val();
                    var is_already = false;
                    for (var i = 0; i < layoutIdList.length; i++) {
                        if (layoutIdList[i]['id'] === changeId) {
                            is_already = true;
                            layoutIdList[i]['file'] = base64;
                        }
                    }
                    if (!is_already) {
                        var tmp = {};
                        tmp['id'] = changeId;
                        tmp['file'] = base64;
                        layoutIdList.push(tmp);
                    }
                    $(id).addClass('active-border');
                    $('input.cr-slider').val(1)
                    $('#image_modify').modal('hide');
                    // do something with cropped blob
                });

            })

            var selections =
                {
                    items: [],
                    owner: null,
                    droptarget: null
                };

            //var targets = document.querySelectorAll('[data-draggable="delete"]')
            //var download = document.querySelectorAll('[data-draggable="download"]')

            //function for selecting an item
            function addSelection(item) {
                //if the owner reference is still null, set it to this item's parent
                //so that further selection is only allowed within the same container
                if (!selections.owner) {
                    selections.owner = item.parentNode;
                }

                    //or if that's already happened then compare it with this item's parent
                //and if they're not the same container, return to prevent selection
                else if (selections.owner != item.parentNode) {
                    return;
                }

                //set this item's grabbed state
                item.setAttribute('aria-grabbed', 'true');

                //add it to the items array
                selections.items.push(item);
            }

            //function for unselecting an item
            function removeSelection(item) {
                //reset this item's grabbed state
                item.setAttribute('aria-grabbed', 'false');

                //then find and remove this item from the existing items array
                for (var len = selections.items.length, i = 0; i < len; i++) {
                    if (selections.items[i] == item) {
                        selections.items.splice(i, 1);
                        break;
                    }
                }
            }

            //function for resetting all selections
            function clearSelections() {
                //if we have any selected items
                if (selections.items.length) {
                    //reset the owner reference
                    selections.owner = null;

                    //reset the grabbed state on every selected item
                    for (var len = selections.items.length, i = 0; i < len; i++) {
                        selections.items[i].setAttribute('aria-grabbed', 'false');
                    }

                    //then reset the items array
                    selections.items = [];
                }
            }


            //function for applying dropeffect to the target containers
            function addDropeffects() {
                //apply aria-dropeffect and tabindex to all targets apart from the owner


                var items = document.querySelectorAll('[data-draggable="item"]');
                //remove aria-grabbed and tabindex from all items inside those containers
                for (var len = items.length, i = 0; i < len; i++) {
                    if
                    (
                        items[i].parentNode != selections.owner
                        &&
                        items[i].getAttribute('aria-grabbed')
                    ) {
                        items[i].removeAttribute('aria-grabbed');
                        items[i].removeAttribute('tabindex');
                    }
                }
            }

            //function for removing dropeffect from the target containers
            function clearDropeffects() {
                //if we have any selected items
                if (selections.items.length) {
                    var items = document.querySelectorAll('[data-draggable="item"]');
                    //restore aria-grabbed and tabindex to all selectable items
                    //without changing the grabbed value of any existing selected items
                    for (var len = items.length, i = 0; i < len; i++) {
                        if (!items[i].getAttribute('aria-grabbed')) {
                            items[i].setAttribute('aria-grabbed', 'false');
                            items[i].setAttribute('tabindex', '0');
                        } else if (items[i].getAttribute('aria-grabbed') == 'true') {
                            items[i].setAttribute('tabindex', '0');
                        }
                    }
                }
            }

            //shortcut function for identifying an event element's target container
            function getContainer(element) {
                do {
                    if (element.nodeType == 1 && element.getAttribute('data-draggable')) {
                        return element;
                    }
                }
                while (element = element.parentNode);

                return null;
            }

            $(document).on("mousedown touchstart", ".drag_item", function (e) {
                $(this).addClass('grabbing');
                //if the element is a draggable item
                if ($(this)[0].getAttribute('draggable')) {
                    //clear dropeffect from the target containers
                    clearDropeffects();

                    //if the multiple selection modifier is not pressed
                    //and the item's grabbed state is currently false
                    if ($(this)[0].getAttribute('aria-grabbed') == 'false') {

                        //clear all existing selections
                        clearSelections();

                        //then add this new selection
                        addSelection($(this)[0]);
                    }
                }
            });


            //mouseup event to implement multiple selection
            //document.addEventListener('mouseup', function (e) {
            $(document).on("mouseup touchend", ".drag_item", function (e) {
                $(this).removeClass('grabbing')
                //if the element is a draggable item
                //and the multipler selection modifier is pressed
                if ($(this)[0].getAttribute('draggable')) {
                    //if the item's grabbed state is currently true
                    if ($(this)[0].getAttribute('aria-grabbed') == 'true') {
                        //unselect this item
                        removeSelection($(this)[0]);

                        //if that was the only selected item
                        //then reset the owner container reference
                        if (!selections.items.length) {
                            selections.owner = null;
                        }
                    }
                    //else [if the item's grabbed state is false]
                    else {
                        //add this additional selection
                        addSelection($(this)[0]);
                    }
                }

                if ($(this)[0].getAttribute('draggable')) {
                    var grabbed = $('[aria-grabbed="true"]');
                    if (grabbed.length > 0) {

                        var start_id = grabbed[0].id;
                        var split = start_id.split('_image_');
                        var start_index = parseInt(split[1]);

                        var end_id = grabbed[grabbed.length - 1].id;
                        var split = end_id.split('_image_');
                        var end_index = parseInt(split[1]);

                        var cur_id = $(this)[0].id;
                        var split = cur_id.split('_image_');
                        var cur_index = parseInt(split[1]);

                        if (cur_index < start_index) {
                            start_index = cur_index;
                        }

                        if (end_index < cur_index) {
                            end_index = cur_index;
                        }
                        if (end_index - start_index > 1) {

                            for (var i = start_index; i <= end_index; i++) {
                                var target_id = '#uniform_image_' + i;
                                if (target_id.length !== 0) {
                                    addSelection($(target_id)[0]);
                                }

                            }

                        }
                    }

                }

            });

            // window.addEventListener('click', function (e) {
            //     if (!document.getElementById('image_space').contains(e.target)) {
            //         //if(!document.getElementById('button_area').contains(e.target)){
            //             // Clicked in box //clear dropeffect from the target containers
            //             clearDropeffects();
            //
            //             //clear all existing selections
            //             clearSelections();
            //         //}
            //
            //
            //     }
            // });
            //dragstart event to initiate mouse dragging

            //document.addEventListener('dragstart', function (e) {
            $(document).on("dragstart", ".img-source", function (e) {
                //if the element's parent is not the owner, then block this event
                if (selections.owner != $(this)[0].parentNode) {
                    e.preventDefault();
                    return;
                }

                //[else] if the multiple selection modifier is pressed
                //and the item's grabbed state is currently false
                if ($(this)[0].getAttribute('aria-grabbed') == 'false') {
                    //add this additional selection
                    addSelection($(this)[0]);
                }

                //we don't need the transfer data, but we have to define something
                //otherwise the drop action won't work at all in firefox
                //most browsers support the proper mime-type syntax, eg. "text/plain"
                //but we have to use this incorrect syntax for the benefit of IE10+
                //e.dataTransfer.setData('text', '');

                //apply dropeffect to the target containers
                addDropeffects();

            });

            //keydown event to implement selection and abort
            //document.addEventListener('keydown', function (e) {
            // $(document).on("keydown", ".drag_item", function (e) {
            //     //if the element is a grabbable item
            //     if ($(this)[0].getAttribute('aria-grabbed')) {
            //     }
            //
            //     //Escape is the abort keystroke (for any target element)
            //     if (e.keyCode == 27) {
            //         //if we have any selected items
            //         if (selections.items.length) {
            //             //clear dropeffect from the target containers
            //             clearDropeffects();
            //
            //             //then set focus back on the last item that was selected, which is
            //             //necessary because we've removed tabindex from the current focus
            //             selections.items[selections.items.length - 1].focus();
            //
            //             //clear all existing selections
            //             clearSelections();
            //
            //             //but don't prevent default so that native actions can still occur
            //         }
            //     }
            //
            // });


            //related variable is needed to maintain a reference to the
            //dragleave's relatedTarget, since it doesn't have e.relatedTarget
            var related = null;
            var droptarget = null;

            //dragenter event to set that variable
            //document.addEventListener('dragenter', function (e) {
            $(document).on("dragenter", ".drag_item", function (e) {
                related = $(this)[0];

            });

            //dragleave event to maintain target highlighting using that variable
            document.addEventListener('dragleave', function (e) {

                //get a drop target reference from the relatedTarget
                droptarget = getContainer(related);

                //if the target is the owner then it's not a valid drop target
                if (droptarget == selections.owner) {
                    droptarget = null;
                }

                //if the drop target is different from the last stored reference
                //(or we have one of those references but not the other one)
                if (droptarget != selections.droptarget) {
                    //if we have a saved reference, clear its existing dragover class
                    if (selections.droptarget) {
                        selections.droptarget.className =
                            selections.droptarget.className.replace(/ dragover/g, '');
                    }

                    //apply the dragover class to the new drop target reference
                    if (droptarget) {
                        droptarget.className += ' dragover';
                    }

                    //then save that reference for next time
                    selections.droptarget = droptarget;
                }

            }, false);

            // var is_del = false;
            // var is_dl = false;
            //dragover event to allow the drag by preventing its default
            document.addEventListener('dragover', function (e) {
                //if we have any selected items, allow them to be dragged

                e.preventDefault();
            }, false);


            //dragend event to implement items being validly dropped into targets,
            //or invalidly dropped elsewhere, and to clean-up the interface either way
            document.addEventListener('dragend', function (e) {
                //if we have a valid drop target reference
                //(which implies that we have some selected items)
                $(e.target).removeClass('grabbing')

                if (selections.items.length == 1) {
                    console.log(e.target.getAttribute('name'))
                    if (e.target.getAttribute('name') === 'drag_items') {
                        console.log(droptarget.id);
                        console.log(e.target.id);
                        var d_index = droptarget.id;
                        var t_index = e.target.id;
                        t_id = t_index.split('_');
                        d_id = d_index.split('_');
                        if(t_id[0] == d_id[0]){
                            droptarget.parentNode.before(e.target.parentNode);
                        }
                        else{
                            if(d_id[0]=='top'){
                                var d_src = $('#' + d_index).find('#img_body_index_' + d_id[1])[0].src;
                                console.log(d_src)
                                if(d_src !== ''){
                                    $('#' + d_index).find('#img_body_index_' + d_id[1])[0].src = $('#' + t_index).find('#img_body_index_' + t_id[1])[0].src;
                                    $('#' + d_index).find('#img_source_url_index_' + d_id[1]).val($('#' + t_index).find('#img_source_url_index_' + t_id[1]).val());
                                    $('#' + d_index).find('#caption_index_' + d_id[1]).val($('#' + t_index).find('#caption_index_' + t_id[1]).val());
                                    $('#' + d_index).find('#caption_index_' + d_id[1]).next().find('span').text($('#' + t_index).find('#caption_index_' + t_id[1]).next().find('span').text());
                                    $('#caption_index_' + d_id[1]).next().find('i').removeClass('far');
                                    $('#caption_index_' + d_id[1]).next().find('i').addClass('fas');
                                }
                                else{
                                    $('#' + d_index).find('#img_body_index_' + d_id[1])[0].src = $('#' + t_index).find('#img_body_index_' + t_id[1])[0].src
                                    $('#' + d_index).find('#img_body_empty_' + d_id[1]).addClass('d-none');
                                    $('#' + d_index).find('#img_body_index_' + d_id[1]).removeClass('d-none');
                                    $('#' + d_index).find('#img_body_empty_' + d_id[1]).find('img').addClass('d-none');
                                    $('#' + d_index).find('#img_source_url_index_' + d_id[1]).val($('#' + t_index).find('#img_source_url_index_' + t_id[1]).val());
                                    $('#' + d_index).find('#caption_index_' + d_id[1]).val($('#' + t_index).find('#caption_index_' + t_id[1]).val());
                                    $('#' + d_index).find('#caption_index_' + d_id[1]).next().find('span').text($('#' + t_index).find('#caption_index_' + t_id[1]).next().find('span').text());
                                    $('#caption_index_' + d_id[1]).next().find('i').removeClass('far');
                                    $('#caption_index_' + d_id[1]).next().find('i').addClass('fas');
                                }

                            }
                        }

                    }


                }

                //if we have any selected items
                // if (selections.items.length) {
                //     //clear dropeffect from the target containers
                //     clearDropeffects();
                //
                //     //if we have a valid drop target reference
                //     if (selections.droptarget) {
                //         //reset the selections array
                //         clearSelections();
                //
                //         //reset the target's dragover class
                //         selections.droptarget.className =
                //             selections.droptarget.className.replace(/ dragover/g, '');
                //
                //         //reset the target reference
                //         selections.droptarget = null;
                //     }
                // }
            }, false);
        });
    </script>
@endsection
