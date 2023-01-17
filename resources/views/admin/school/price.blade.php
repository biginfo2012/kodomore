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
            <div class="under-tab d-flex">
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
            <p class="flex-1 text-menu-user">基本情報の登録･編集 > 費用について </p>
            <a class="text-menu-small menu-icon text-decoration"
               href="{{url('/school/detail') . '/' . $garden -> garden_id}}" target="_blank">詳細ページ表示</a>
            <img class="ml-2 img-icon height-half" src="{{asset('img/detail.png')}}">
            <img class="ml-3 img-icon height-1" src="{{asset('img/clock.png')}}">
            <p class="ml-1 text-menu-small" id="cur_date"> 0000/00/00　00：00</p>
        </div>
    </div>

    <div id="add_item" class="d-none">
        <div class="row mt-3 price_item">
            <div class="col-2 pt-1">
                <p>項目</p>
            </div>
            <div class="col-3 pr-2">
                <input type="text" class="form-control limit-length" name="enter_price_item" maxlength="20">
            </div>
            <div class="col-1 position-relative">
                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
            </div>
            <div class="col-2 position-relative" style="">
                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
            </div>
            <div class="col-2 position-relative" style="">
                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                <img class="img-icon height-half position-absolute" style="right: -40px; top: 7px; z-index: 1" name="minus-circle_item"
                     src="{{asset('img/minus.png')}}">
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>

    <div id="add_area_item" class="d-none">
        <div class="enter_item mt-5 pt-3 item">
            <div class="row">
                <div class="col-2 pt-1">
                    <p>項目</p>
                </div>
                <div class="col-3 pr-2">
                    <input type="text" class="form-control limit-length" name="enter_price_item" maxlength="20">
                </div>
                <div class="col-1 position-relative">
                    <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                </div>
                <div class="col-2 position-relative" style="">
                    <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                    <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                    <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                </div>
                <div class="col-2 position-relative" style="">
                    <input type="number" class="form-control tax" name="enter_price_amount_contain">
                    <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                    <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                </div>
                <div class="col-2">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <p>無償化･補助対象</p>
                </div>
                <div class="col-10">
                    <div class="d-flex">
                        <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="radio_public_true_index"
                                   value="1" name="radio_public_index">
                            <label class="custom-control-label" for="radio_public_true_index">表示あり</label>
                        </div>
                        <div class="ml-3 custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="radio_public_false_index"
                                   value="0" name="radio_public_index">
                            <label class="custom-control-label" for="radio_public_false_index">表示なし</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2 pt-1">
                    ※補足
                </div>
                <div class="col-8">
                    <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                </div>
                <div class="col-2 position-relative ml-n2">
                    <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                    <img class="img-icon height-half position-absolute" style="left: 0; bottom: 0px" name="minus-circle" id="remove_free_index"
                         src="{{asset('img/minus.png')}}">
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="area_item_count" value="{{count($priceList)}}">

    <form class="needs-validation" novalidate id="validation_form">

        @if(empty($priceList))
            <div class="card" id="enter_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        入園時にかかる費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <div class="enter_item item mt-4">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)入園料" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_0"
                                               value="1" name="radio_public_index_0">
                                        <label class="custom-control-label" for="radio_public_true_index_0">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_0"
                                               value="0" name="radio_public_index_0">
                                        <label class="custom-control-label" for="radio_public_false_index_0">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

            <div class="card mt-3" id="year_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        年間費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <div class="enter_item item mt-4">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)教材費" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_1"
                                               value="1" name="radio_public_index_1">
                                        <label class="custom-control-label" for="radio_public_true_index_1">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_1"
                                               value="0" name="radio_public_index_1">
                                        <label class="custom-control-label" for="radio_public_false_index_1">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

            <div class="card mt-3" id="month_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        月額費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <div class="enter_item mt-4 item">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)保育料" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_2"
                                               value="1" name="radio_public_index_2">
                                        <label class="custom-control-label" for="radio_public_true_index_2">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_2"
                                               value="0" name="radio_public_index_2">
                                        <label class="custom-control-label" for="radio_public_false_index_2">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="enter_item mt-5 pt-3 item">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)給食費" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_3"
                                               value="1" name="radio_public_index_3">
                                        <label class="custom-control-label" for="radio_public_true_index_3">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_3"
                                               value="0" name="radio_public_index_3">
                                        <label class="custom-control-label" for="radio_public_false_index_3">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="enter_item mt-5 pt-3 item">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)施設費" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_4"
                                               value="1" name="radio_public_index_4">
                                        <label class="custom-control-label" for="radio_public_true_index_4">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_4"
                                               value="0" name="radio_public_index_4">
                                        <label class="custom-control-label" for="radio_public_false_index_4">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="enter_item mt-5 pt-3 item">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)バス代" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_5"
                                               value="1" name="radio_public_index_5">
                                        <label class="custom-control-label" for="radio_public_true_index_5">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_5"
                                               value="0" name="radio_public_index_5">
                                        <label class="custom-control-label" for="radio_public_false_index_5">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input" id="add_input_" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

            <div class="card mt-3" id="over_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        時間外預かり費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <div class="enter_item mt-4 item">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)早朝保育30分ごと" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_6"
                                               value="1" name="radio_public_index_6">
                                        <label class="custom-control-label" for="radio_public_true_index_6">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_6"
                                               value="0" name="radio_public_index_6">
                                        <label class="custom-control-label" for="radio_public_false_index_6">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="enter_item mt-5 pt-3 item">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)延長保育30分ごと" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_7"
                                               value="1" name="radio_public_index_7">
                                        <label class="custom-control-label" for="radio_public_true_index_7">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_7"
                                               value="0" name="radio_public_index_7">
                                        <label class="custom-control-label" for="radio_public_false_index_7">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="enter_item mt-5 pt-3 item">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)土曜預かり1日" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_8"
                                               value="1" name="radio_public_index_8">
                                        <label class="custom-control-label" for="radio_public_true_index_8">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_8"
                                               value="0" name="radio_public_index_8">
                                        <label class="custom-control-label" for="radio_public_false_index_8">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="enter_item mt-5 pt-3 item">
                        <div class="row">
                            <div class="col-2 pt-1">
                                <p>項目</p>
                            </div>
                            <div class="col-3 pr-2">
                                <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)長期休暇中預かり1日" maxlength="20">
                            </div>
                            <div class="col-1 position-relative">
                                <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                            </div>
                            <div class="col-2 position-relative" style="">
                                <input type="number" class="form-control tax" name="enter_price_amount_contain">
                                <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <p>無償化･補助対象</p>
                            </div>
                            <div class="col-10">
                                <div class="d-flex">
                                    <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_true_index_9"
                                               value="1" name="radio_public_index_9">
                                        <label class="custom-control-label" for="radio_public_true_index_9">表示あり</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="radio_public_false_index_9"
                                               value="0" name="radio_public_index_9">
                                        <label class="custom-control-label" for="radio_public_false_index_9">表示なし</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 pt-1">
                                ※補足
                            </div>
                            <div class="col-8">
                                <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください"></textarea>
                            </div>
                            <div class="col-2 position-relative ml-n2">
                                <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input" id="add_input_" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

            <div class="card mt-3" id="other_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        その他特別費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex pb-3">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <div class="row mt-2 price_item">
                        <div class="col-2 pt-1">
                            <p>項目</p>
                        </div>
                        <div class="col-3 pr-2">
                            <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)遠足代" maxlength="20">
                        </div>
                        <div class="col-1 position-relative">
                            <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                        </div>
                        <div class="col-2 position-relative" style="">
                            <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                            <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                            <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                        </div>
                        <div class="col-2 position-relative" style="">
                            <input type="number" class="form-control tax" name="enter_price_amount_contain">
                            <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                            <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row mt-3 price_item">
                        <div class="col-2 pt-1">
                            <p>項目</p>
                        </div>
                        <div class="col-3 pr-2">
                            <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)卒業アルバム代" maxlength="20">
                        </div>
                        <div class="col-1 position-relative">
                            <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                        </div>
                        <div class="col-2 position-relative" style="">
                            <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                            <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                        </div>
                        <div class="col-2 position-relative" style="">
                            <input type="number" class="form-control tax" name="enter_price_amount_contain">
                            <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input_item" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-2 pt-1">
                            ※補足
                        </div>
                        <div class="col-8">
                            <textarea rows="2" class="form-control limit-length-text" placeholder="その他特別費用について補足などございましたらご記入ください" maxlength="1000"></textarea>

                        </div>
                        <div class="col-2 position-relative ml-n2">
                            <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                        </div>
                    </div>


                </div>
            </div>

            <div class="card mt-3" id="uniform_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        制服･オリジナルアイテム
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex pb-3">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <div class="row mt-2 price_item">
                        <div class="col-2 pt-1">
                            <p>項目</p>
                        </div>
                        <div class="col-3 pr-2">
                            <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)制服(冬男児)" maxlength="20">
                        </div>
                        <div class="col-1 position-relative">
                            <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                        </div>
                        <div class="col-2 position-relative" style="">
                            <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                            <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                            <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                        </div>
                        <div class="col-2 position-relative" style="">
                            <input type="number" class="form-control tax" name="enter_price_amount_contain">
                            <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                            <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row mt-3 price_item">
                        <div class="col-2 pt-1">
                            <p>項目</p>
                        </div>
                        <div class="col-3 pr-2">
                            <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)制服(冬女児)" maxlength="20">
                        </div>
                        <div class="col-1 position-relative">
                            <p class="position-absolute" style="left: 0; top: 7px">0/20文字</p>
                        </div>
                        <div class="col-2 position-relative">
                            <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;">
                            <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                        </div>
                        <div class="col-2 position-relative">
                            <input type="number" class="form-control tax" name="enter_price_amount_contain">
                            <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input_item" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-2 pt-1">
                            ※補足
                        </div>
                        <div class="col-8">
                            <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="制服･オリジナルアイテムについて補足などございましたらご記入ください"></textarea>

                        </div>
                        <div class="col-2 position-relative ml-n2">
                            <p class="position-absolute" style="left: 0; top: 7px">0/1,000文字</p>
                        </div>
                    </div>


                </div>
            </div>
        @else
            <div class="card" id="enter_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        入園時にかかる費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <?php $is_first=true;?>
                    @foreach($priceList as $index => $price)
                        @if($price->type === 'enter_price')
                            <div class="enter_item item {{$is_first?'mt-4':'mt-5 pt-3'}}">
                                <?php $is_first=false;?>
                                <div class="row">
                                    <div class="col-2 pt-1">
                                        <p>項目</p>
                                    </div>
                                    <div class="col-3 pr-2">
                                        <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)入園料" maxlength="20" value="{{$price->item_title}}">
                                    </div>
                                    <div class="col-1 position-relative">
                                        <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->item_title)}}/20文字</p>
                                    </div>
                                    <div class="col-2 position-relative" style="">
                                        <input type="number" class="form-control origin" name="enter_price_amount" value="{{$price->sale}}" style="color:#335BC1;">
                                        <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                        <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                                    </div>
                                    <div class="col-2 position-relative" style="">
                                        <input type="number" class="form-control tax" name="enter_price_amount_contain" value="{{$price->sale_contain}}">
                                        <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                        <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <p>無償化･補助対象</p>
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex">
                                            <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="radio_public_true_index_{{$index}}"
                                                       value="1" name="radio_public_index_{{$index}}" {{$price->public_status=='1'?'checked':''}}>
                                                <label class="custom-control-label" for="radio_public_true_index_{{$index}}">表示あり</label>
                                            </div>
                                            <div class="ml-3 custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="radio_public_false_index_{{$index}}"
                                                       value="0" name="radio_public_index_{{$index}}" {{$price->public_status!=='1'?'checked':''}}>
                                                <label class="custom-control-label" for="radio_public_false_index_{{$index}}">表示なし</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 pt-1">
                                        ※補足
                                    </div>
                                    <div class="col-8">
                                        <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください">{{$price->add_info}}</textarea>
                                    </div>
                                    <div class="col-2 position-relative ml-n2">
                                        <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->add_info)}}/1,000文字</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

            <div class="card mt-3" id="year_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        年間費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <?php $is_first=true;?>
                    @foreach($priceList as $index => $price)
                        @if($price->type === 'year_price')
                            <div class="enter_item item {{$is_first?'mt-4':'mt-5 pt-3'}}">
                                <?php $is_first=false;?>
                                <div class="row">
                                    <div class="col-2 pt-1">
                                        <p>項目</p>
                                    </div>
                                    <div class="col-3 pr-2">
                                        <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)入園料" maxlength="20" value="{{$price->item_title}}">
                                    </div>
                                    <div class="col-1 position-relative">
                                        <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->item_title)}}/20文字</p>
                                    </div>
                                    <div class="col-2 position-relative" style="">
                                        <input type="number" class="form-control origin" name="enter_price_amount" value="{{$price->sale}}" style="color:#335BC1;">
                                        <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                        <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                                    </div>
                                    <div class="col-2 position-relative" style="">
                                        <input type="number" class="form-control tax" name="enter_price_amount_contain" value="{{$price->sale_contain}}">
                                        <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                        <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <p>無償化･補助対象</p>
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex">
                                            <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="radio_public_true_index_{{$index}}"
                                                       value="1" name="radio_public_index_{{$index}}" {{$price->public_status=='1'?'checked':''}}>
                                                <label class="custom-control-label" for="radio_public_true_index_{{$index}}">表示あり</label>
                                            </div>
                                            <div class="ml-3 custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="radio_public_false_index_{{$index}}"
                                                       value="0" name="radio_public_index_{{$index}}" {{$price->public_status!=='1'?'checked':''}}>
                                                <label class="custom-control-label" for="radio_public_false_index_{{$index}}">表示なし</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 pt-1">
                                        ※補足
                                    </div>
                                    <div class="col-8">
                                        <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください">{{$price->add_info}}</textarea>
                                    </div>
                                    <div class="col-2 position-relative ml-n2">
                                        <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->add_info)}}/1,000文字</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

            <div class="card mt-3" id="month_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        月額費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <?php $is_first=true;?>
                    @foreach($priceList as $index => $price)
                        @if($price->type === 'month_price')
                            <div class="enter_item item {{$is_first?'mt-4':'mt-5 pt-3'}}">
                                <?php $is_first=false;?>
                                <div class="row">
                                    <div class="col-2 pt-1">
                                        <p>項目</p>
                                    </div>
                                    <div class="col-3 pr-2">
                                        <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)入園料" maxlength="20" value="{{$price->item_title}}">
                                    </div>
                                    <div class="col-1 position-relative">
                                        <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->item_title)}}/20文字</p>
                                    </div>
                                    <div class="col-2 position-relative" style="">
                                        <input type="number" class="form-control origin" name="enter_price_amount" value="{{$price->sale}}" style="color:#335BC1;">
                                        <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                        <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                                    </div>
                                    <div class="col-2 position-relative" style="">
                                        <input type="number" class="form-control tax" name="enter_price_amount_contain" value="{{$price->sale_contain}}">
                                        <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                        <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <p>無償化･補助対象</p>
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex">
                                            <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="radio_public_true_index_{{$index}}"
                                                       value="1" name="radio_public_index_{{$index}}" {{$price->public_status=='1'?'checked':''}}>
                                                <label class="custom-control-label" for="radio_public_true_index_{{$index}}">表示あり</label>
                                            </div>
                                            <div class="ml-3 custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="radio_public_false_index_{{$index}}"
                                                       value="0" name="radio_public_index_{{$index}}" {{$price->public_status!=='1'?'checked':''}}>
                                                <label class="custom-control-label" for="radio_public_false_index_{{$index}}">表示なし</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 pt-1">
                                        ※補足
                                    </div>
                                    <div class="col-8">
                                        <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください">{{$price->add_info}}</textarea>
                                    </div>
                                    <div class="col-2 position-relative ml-n2">
                                        <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->add_info)}}/1,000文字</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input" id="add_input_" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

            <div class="card mt-3" id="over_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        時間外預かり費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <?php $is_first=true;?>
                    @foreach($priceList as $index => $price)
                        @if($price->type === 'over_price')
                            <div class="enter_item item {{$is_first?'mt-4':'mt-5 pt-3'}}">
                                <?php $is_first=false;?>
                                <div class="row">
                                    <div class="col-2 pt-1">
                                        <p>項目</p>
                                    </div>
                                    <div class="col-3 pr-2">
                                        <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)入園料" maxlength="20" value="{{$price->item_title}}">
                                    </div>
                                    <div class="col-1 position-relative">
                                        <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->item_title)}}/20文字</p>
                                    </div>
                                    <div class="col-2 position-relative" style="">
                                        <input type="number" class="form-control origin" name="enter_price_amount" value="{{$price->sale}}" style="color:#335BC1;">
                                        <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                        <label class="position-absolute" style="left: 18px; top: -24px">税抜価格</label>
                                    </div>
                                    <div class="col-2 position-relative" style="">
                                        <input type="number" class="form-control tax" name="enter_price_amount_contain" value="{{$price->sale_contain}}">
                                        <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                        <label class="position-absolute" style="left: 18px; top: -24px">税込価格</label>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <p>無償化･補助対象</p>
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex">
                                            <p class="mr-2" style="color: #FF557E">※無償化対象</p>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="radio_public_true_index_{{$index}}"
                                                       value="1" name="radio_public_index_{{$index}}" {{$price->public_status=='1'?'checked':''}}>
                                                <label class="custom-control-label" for="radio_public_true_index_{{$index}}">表示あり</label>
                                            </div>
                                            <div class="ml-3 custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="radio_public_false_index_{{$index}}"
                                                       value="0" name="radio_public_index_{{$index}}" {{$price->public_status!=='1'?'checked':''}}>
                                                <label class="custom-control-label" for="radio_public_false_index_{{$index}}">表示なし</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 pt-1">
                                        ※補足
                                    </div>
                                    <div class="col-8">
                                        <textarea rows="2" class="form-control limit-length-text" maxlength="1000" placeholder="上記費用について補足などございましたらご記入ください">{{$price->add_info}}</textarea>
                                    </div>
                                    <div class="col-2 position-relative ml-n2">
                                        <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->add_info)}}/1,000文字</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input" id="add_input_" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

            <div class="card mt-3" id="other_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        その他特別費用
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex pb-3">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>
                    <?php $is_first=true;?>
                    @foreach($priceList as $index => $price)
                        @if($price->type === 'other_price')
                            <div class="row price_item {{$is_first?'mt-2':'mt-3'}}">
                                <div class="col-2 pt-1">
                                    <p>項目</p>
                                </div>
                                <div class="col-3 pr-2">
                                    <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)遠足代" maxlength="20" value="{{$price->item_title}}">
                                </div>
                                <div class="col-1 position-relative">
                                    <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->item_title)}}/20文字</p>
                                </div>
                                <div class="col-2 position-relative" style="">
                                    <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;" value="{{$price->sale}}">
                                    <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                    <label class="position-absolute {{$is_first?'':'d-none'}}" style="left: 18px; top: -24px">税抜価格</label>
                                </div>
                                <div class="col-2 position-relative" style="">
                                    <input type="number" class="form-control tax" name="enter_price_amount_contain" value="{{$price->sale_contain}}">
                                    <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                    <label class="position-absolute {{$is_first?'':'d-none'}}" style="left: 18px; top: -24px">税込価格</label>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>
                            <?php $is_first=false;?>
                        @endif
                    @endforeach

                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input_item" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-2 pt-1">
                            ※補足
                        </div>
                        <div class="col-8">
                            <?php $already = false; ?>
                            @foreach($priceList as $index => $price)
                                @if($price->type == 'other_price' && !$already)
                                    <?php $already = true; ?>
                                        <textarea rows="2" class="form-control limit-length-text" placeholder="その他特別費用について補足などございましたらご記入ください" maxlength="1000">{{$price->add_info}}</textarea>
                                @endif
                            @endforeach

                        </div>

                        <div class="col-2 position-relative ml-n2">
                            <?php $already = false; ?>
                            @foreach($priceList as $index => $price)
                                @if($price->type == 'other_price' && !$already)
                                    <?php $already = true; ?>
                                    <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->add_info)}}/1,000文字</p>
                                @endif
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>

            <div class="card mt-3" id="uniform_price">
                <div class="tag-title d-flex">
                    <p class="card-header top-menu text-menu-user py-1 px-3">
                        制服･オリジナルアイテム
                    </p>
                    <div class="flex-1"></div>
                </div>
                <div class="card-body text-menu">
                    <div class="d-flex pb-3">
                        <p class="text-menu p-0">価格は半角英数でご記入ください｡</p>
                    </div>

                    <?php $is_first=true;?>
                    @foreach($priceList as $index => $price)
                        @if($price->type === 'uniform_price')
                            <div class="row price_item {{$is_first?'mt-2':'mt-3'}}">
                                <div class="col-2 pt-1">
                                    <p>項目</p>
                                </div>
                                <div class="col-3 pr-2">
                                    <input type="text" class="form-control limit-length" name="enter_price_item" placeholder="例)遠足代" maxlength="20" value="{{$price->item_title}}">
                                </div>
                                <div class="col-1 position-relative">
                                    <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->item_title)}}/20文字</p>
                                </div>
                                <div class="col-2 position-relative" style="">
                                    <input type="number" class="form-control origin" name="enter_price_amount" style="color:#335BC1;" value="{{$price->sale}}">
                                    <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                    <label class="position-absolute {{$is_first?'':'d-none'}}" style="left: 18px; top: -24px">税抜価格</label>
                                </div>
                                <div class="col-2 position-relative" style="">
                                    <input type="number" class="form-control tax" name="enter_price_amount_contain" value="{{$price->sale_contain}}">
                                    <label class="position-absolute" style="right: -7px; top: 7px">円</label>
                                    <label class="position-absolute {{$is_first?'':'d-none'}}" style="left: 18px; top: -24px">税込価格</label>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>
                            <?php $is_first=false;?>
                        @endif
                    @endforeach
                    <div class="row mt-2">
                        <div class="col-10 d-flex">
                            <div class="flex-1"></div>
                            <button class="text-small-admin rounded px-2 btn-add" name="btn_add_input_item" style="border: 1px solid #999999 !important;">＋費用の追加
                            </button>
                        </div>
                        <div class="col-2"></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-2 pt-1">
                            ※補足
                        </div>
                        <div class="col-8">
                            <?php $already = false; ?>
                            @foreach($priceList as $index => $price)
                                @if($price->type == 'uniform_price' && !$already)
                                    <?php $already = true; ?>
                                    <textarea rows="2" class="form-control limit-length-text" placeholder="その他特別費用について補足などございましたらご記入ください" maxlength="1000">{{$price->add_info}}</textarea>
                                @endif
                            @endforeach

                        </div>
                        <div class="col-2 position-relative ml-n2">
                            <?php $already = false; ?>
                            @foreach($priceList as $index => $price)
                                @if($price->type == 'uniform_price' && !$already)
                                    <?php $already = true; ?>
                                        <p class="position-absolute" style="left: 0; top: 7px">{{strlen($price->add_info)}}/1,000文字</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif




        <div class="card position-sticky" style="bottom: 0; ">
            <div class="card-body">
                <div class="row my-4">
                    <div class="offset-4 col-6">
                        <div class="d-flex">
                            {{--                    <button class="flex-1 py-1 rounded text-menu-small" id="btn_back" style="border: 1px solid #C4C4C4; color: #919191;">もどる</button>--}}
                            {{--                    <button class="mx-4 flex-1 py-1 rounded  top-menu text-menu-small text-white" style="border: none">入力内容の確認</button>--}}
                            {{--                    <button class="flex-1 py-1 rounded background-pink text-menu-small text-white" id="btn_save" style="border: none">登録･編集する</button>--}}
                            <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal" style="border: 1px solid #C4C4C4; color: #919191;" id="btn_back">
                                変更を取り消す
                            </button>
                            <button class="mx-2 flex-1 py-1 rounded top-menu text-menu-small btn-normal" style="background-color: #6DDDD9 !important; border: none !important;" id="btn_preview">
                                <img class="mr-1 img-icon height-half mb-1"
                                     src="{{asset('img/preview-icon.png')}}">プレビュー
                            </button>
                            <button class="flex-1 py-1 rounded background-pink text-menu-small text-white btn-normal" style="border: none !important;"
                                    id="btn_save"><img class="mr-1 img-icon height-half" style="padding-bottom: 2px;"
                                                       src="{{asset('img/update-icon.png')}}">変更内容を更新
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="card" style="bottom: 0rem; ">--}}

{{--            <div class="row mt-4 mb-4">--}}
{{--                <div class="offset-2 col-8" style="z-index: 5">--}}
{{--                    <div class="d-flex">--}}
{{--                        <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal" id="btn_reload">--}}
{{--                            変更しないで戻る--}}
{{--                        </button>--}}
{{--                        <button class="mx-4 flex-1 py-1 rounded text-white text-menu-small btn-normal btn-preview"--}}
{{--                                id="btn_detail">入力内容の確認--}}
{{--                        </button>--}}
{{--                        <button type="submit"--}}
{{--                                class="flex-1 py-1 rounded background-pink text-menu-small text-white btn-normal"--}}
{{--                                id="btn_save">登録･編集する--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        </div>--}}
        <div class="card-body px-0">
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
        $('#btn_preview').click(function () {
            event.preventDefault();
            var selectTag = [];
            $(".tag-detail").each(function() {
                if($(this).prop('checked')) {
                    var label = $(this)[0].labels[0].innerText;
                    selectTag.push(label);
                }
            });
            localStorage.setItem('tag_garden', JSON.stringify(selectTag));
            var garden_id = $("#garden_id").val();
            var url = home_path + '/admin/school/tag/preview/' + garden_id
            window.open(url, 'School Detail', 'height=900,width=400');
        })

        $(document).ready(function () {
            $('input').on('change', function () {
                change_status = true;
            })
            $('textarea').on('change', function () {
                change_status = true;
            })
            $(document).on('input', '.limit-length', function () {
                var val = $(this).val();
                var length = val.length;
                $(this).parent().next().find('p').html(length + '/20文字');

            })
            $(document).on('input', '.limit-length-text', function () {
                var val = $(this).val();
                var length = val.length;
                $(this).parent().next().find('p').html(length + '/1000文字');
            })
            $(document).on('input', '.origin', function () {
                var val = $(this).val();
                var length = Math.floor(val * 1.1);
                $(this).parent().next().find('input').val(length);
            })
            $(document).on('input', '.tax', function () {
                var val = $(this).val();
                var length = Math.floor(val / 1.1);
                $(this).parent().prev().find('input').val(length);
            })

            $('[name=btn_add_input]').click(function () {
                event.preventDefault();
                console.log($(this).parent().parent().prev().hasClass('item'));
                if($(this).parent().parent().prev().hasClass('item')){
                    var count = $("#area_item_count").val();
                    var add_content = $("#add_area_item").html();
                    add_content = add_content.replace(/_index/g, "_index_" + count);
                    $(this).parent().parent().before(add_content);

                    count = parseInt(count) + 1;
                    $("#area_item_count").val(count);
                }
            })
            $('[name=btn_add_input_item]').click(function () {
                event.preventDefault();

                    var add_content = $("#add_item").html();
                    $(this).parent().parent().before(add_content);

            })
            $(document).on('click', '[name=minus-circle]', function () {
                $(this).parent().parent().parent().remove();

            })
            $(document).on('click', '[name=minus-circle_item]', function () {
                $(this).parent().parent().remove();

            });
            $('#btn_preview').click(function () {
                event.preventDefault();
                var selectTag = [];
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if(forms.checkValidity() === true){
                    var garden_id = $("#garden_id").val();

                    $("#form_garden_id").val(garden_id);

                    var priceList = [];

                    $('.enter_item').each(function (index) {
                        var tmp = {};

                        var type = $(this).parent().parent().attr('id');
                        if(type){
                            var item_title = $(this).find('[name=enter_price_item]').val();
                            var sale = $(this).find('[name=enter_price_amount]').val();
                            var sale_contain =$(this).find('[name=enter_price_amount_contain]').val();
                            var public_status = $(this).find('.custom-control-input')[0].checked;
                            var public_status_false = $(this).find('.custom-control-input')[1].checked;
                            var add_info = $(this).find('textarea').val();
                            if(public_status){
                                tmp['public_status'] = $(this).find('.custom-control-input')[0].value
                            }
                            else{
                                if(public_status_false){
                                    tmp['public_status'] = $(this).find('.custom-control-input')[1].value
                                }
                                else{
                                    tmp['public_status'] = 'none';
                                }
                            }
                            tmp['item_title'] = item_title;
                            tmp['sale'] = sale;
                            tmp['type'] = type;
                            tmp['sale_contain']= sale_contain;
                            tmp['add_info'] = add_info;
                            console.log(add_info);

                            priceList.push(tmp);
                        }
                    })

                    $('.price_item').each(function () {
                        var tmp = {};

                        var type = $(this).parent().parent().attr('id');

                        if(type){
                            var item_title = $(this).find('[name=enter_price_item]').val();
                            var sale = $(this).find('[name=enter_price_amount]').val();
                            var sale_contain =$(this).find('[name=enter_price_amount_contain]').val();
                            var add_info = $(this).parent().find('textarea').val();
                            tmp['public_status'] = 'none';
                            tmp['item_title'] = item_title;
                            tmp['sale'] = sale;
                            tmp['type'] = type;
                            tmp['sale_contain']= sale_contain;
                            tmp['add_info'] = add_info;
                            priceList.push(tmp);
                        }
                    })

                    localStorage.setItem('price_garden', JSON.stringify(priceList));
                    var url = home_path + '/admin/school/price/preview/' + garden_id
                    window.open(url, 'School Detail', 'height=900,width=400');

                    //$('#form_origin_list').val(JSON.stringify(priceList));
                }

            })
            $("#btn_save").click(function (event) {
                event.preventDefault();
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var garden_id = $("#garden_id").val();

                    $("#form_garden_id").val(garden_id);

                    var priceList = [];

                    $('.enter_item').each(function (index) {
                        var tmp = {};

                        var type = $(this).parent().parent().attr('id');
                        console.log(type);
                        if(type){
                            var item_title = $(this).find('[name=enter_price_item]').val();
                            var sale = $(this).find('[name=enter_price_amount]').val();
                            var sale_contain =$(this).find('[name=enter_price_amount_contain]').val();
                            var public_status = $(this).find('.custom-control-input')[0].checked;
                            var public_status_false = $(this).find('.custom-control-input')[1].checked;
                            var add_info = $(this).find('textarea').val();
                            if(public_status){
                                tmp['public_status'] = $(this).find('.custom-control-input')[0].value
                            }
                            else{
                                if(public_status_false){
                                    tmp['public_status'] = $(this).find('.custom-control-input')[1].value
                                }
                                else{
                                    tmp['public_status'] = 'none';
                                }
                            }
                            tmp['item_title'] = item_title;
                            tmp['sale'] = sale;
                            tmp['type'] = type;
                            tmp['sale_contain']= sale_contain;
                            tmp['add_info'] = add_info;
                            console.log(item_title);
                            console.log(sale);
                            console.log(sale_contain)
                            console.log(tmp['public_status']);
                            console.log(add_info);

                            priceList.push(tmp);
                        }
                    })

                    $('.price_item').each(function () {
                        var tmp = {};

                        var type = $(this).parent().parent().attr('id');
                        console.log(type);
                        if(type){
                            var item_title = $(this).find('[name=enter_price_item]').val();
                            var sale = $(this).find('[name=enter_price_amount]').val();
                            var sale_contain =$(this).find('[name=enter_price_amount_contain]').val();
                            var add_info = $(this).parent().find('textarea').val();
                            tmp['public_status'] = 'none';
                            tmp['item_title'] = item_title;
                            tmp['sale'] = sale;
                            tmp['type'] = type;
                            tmp['sale_contain']= sale_contain;
                            tmp['add_info'] = add_info;
                            priceList.push(tmp);
                        }
                    })

                    $('#form_origin_list').val(JSON.stringify(priceList));

                    var form = $('form')[1]; // You need to use standard javascript object here
                    var formData = new FormData(form);

                    var url = home_path + '/admin/school/modify/price'
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

            $("#btn_detail").click(function (event) {
                event.preventDefault();
                var is_none = true;
                $(".origin_answer").each(function () {
                    var answer = $(this).val();
                    if(answer){
                        is_none = false;
                    }

                });

                if(is_none){
                    $('#none').modal('show');
                }
                window.scrollTo(0, 0);
            });
            var home_path = $("#home_path").val();

            $("#move_top").click(function () {
                window.scrollTo(0, 0);
            });


        });
    </script>
@endsection
