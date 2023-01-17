@extends('admin.layouts.app')

@section('nav')
    @include('admin.layouts.navbar')
@endsection

@section('css4page')
    <style>


        .tag-title {
            border-top: 1px solid #808080;
            background-color: #DAF6F6;
            padding-top: 0;
            padding-bottom: 0;
            color: white;
        }

        .border-bottom {
            border-bottom: 1px solid #CCCCCC !important;
        }


        .border-light-bottom {
            border-bottom: 2px solid #CCCCCC;
        }

        .border-weight {
            background-color: #4786A0;
            border: 2px solid #B3b3B3;
        }
        .garden_basic {
            width: 100%;
        }

        .card {
            background-color: transparent;
        }

        .card > .border-light-bottom:last-child {
            border-bottom: 0px !important;
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

        @media (min-width:768px) {
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


        [name=minus-notification] {
            z-index: 10;
        }

        .image_modify_modal{
            max-width: 650px;
            height: 600px;
            top: calc(50% - 300px);
        }
        .modify_modal{
            max-width: 850px;
            height: 600px;
            top: calc(50% - 300px);
        }


        form:invalid button[type='submit']{
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }




        .text-small-xs {
            font-size: 11px !important;
            font-family: YugoMedium;
        }
        .text-small {
            font-size: 14px !important;
            font-family: YugoMedium;
        }


        .text-title {
            font-size: 24px !important;
            font-family: YugoBold;
        }

        .height-1-half {
            height: 2rem;
            min-width: .1rem;
        }


        button {
            border-width: 1px;
            border-color: #999999;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::after {
            background-size: 75%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23FF335A' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e");
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }

        .custom-radio .custom-control-input:checked~.custom-control-label::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='-4 -4 8 8'%3e%3ccircle r='4' fill='%2331BCC7'/%3e%3c/svg%3e");
        }

        .custom-radio .custom-control-input:checked~.custom-control-label:before {
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


        .img-content {
            cursor: pointer;
        }

        .img-content:active {
            cursor: move;
            cursor: -webkit-grabbing;
        }

        .text-menu-user {
            font-size: 20px !important;
            font-family: YugoBold;
        }
        .height-1 {
            height: 1rem;
            min-width: .1rem;
        }

        .date-input{
            background-image:url('{{asset('img/date-input.png')}}') !important;
            background-repeat:no-repeat;
            background-position: right calc(.375em + .1875rem) center;
            background-size: calc(.75em + .375rem) calc(.75em + .375rem);
        }





    </style>
@endsection

@section('content')

    <div class="position-sticky card-header z-depth-1">
        <div class="d-flex align-items-center py-1">
            <p class="flex-1 text-title">{{$garden -> garden_name}}</p>
            <div class="d-flex align-items-baseline">
                <p class="mr-2  text-menu-small">ID：000000(自動生成)</p>
                <img class='title-kodomore img-icon height-1-half' src="<?=asset('img/kodomore.png');?>">
            </div>

        </div>
    </div>


    <div class="card-body">
        <div class="d-flex align-items-center">
            <p class="flex-1 text-menu-user">重要情報の変更依頼</p>

            <img class="ml-3 img-icon height-1" src="{{asset('img/clock.png')}}">
            <p class="ml-1 text-menu-small" id="cur_date"> 0000/00/00　00：00</p>
        </div>
    </div>

    <form class="needs-validation" novalidate id="validation_form" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" id="garden_id" name="garden_id" value="{{$garden -> garden_id}}">
        <input type="hidden" id="original_city" value="{{$garden -> city_id}}">
        <input type="hidden" id="original_prefecture" value="{{$garden -> prefecture_id}}">
        <div class="card">
            <div class="tag-title d-flex">
                <p class="card-header top-menu text-menu-user py-1 w-25">
                    基本重要情報
                </p>
                <div class="flex-1"></div>
            </div>
            <div class="card-body garden_basic" >
                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0"><p class="pr-3 text-menu-small">設立元(法人･付属名)</p></div>
                    <div class="col-6 py-1 pl-0">
                        <input type="text" class="form-control text-menu-small" id="public_name" name="public_name" value="{{$garden -> garden_public_name}}" >
                    </div>
                    <div class="text-small pt-2">
                        <p style="position: absolute; left: 66%; white-space: pre;">※付属名について正式名称が<br>  ｢〇〇〇大学付属〇〇〇幼稚園｣の場合､<br>   〇〇〇大学付属はこちらにご記入いだだき､<br>   〇〇〇幼稚園は下記園名欄にご記入ください｡</p>

                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">設立元(法人･付属名)
                            <br>フリガナ</p>
{{--                        <div class="flex-1 d-flex align-items-center text-right">--}}

{{--                        </div>--}}

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <input type="text" class="form-control text-menu-small text-menu-small" id="public_name_second" name="public_name_second" value="{{$garden -> garden_public_name_second}}" >
                    </div>
                </div>
                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">旧園名
                        </p>
                    </div>
                    <div class="col-6 py-1 pl-0">
                        <input type="text" class="form-control text-menu-small text-menu-small" id="old_garden_name" value="" >
                    </div>
                </div>
                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">旧園名
                            <br>フリガナ</p>

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <input type="text" class="form-control text-menu-small text-menu-small" id="old_garden_name_second" value="" >
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">園名</p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <input type="text" class="form-control text-menu-small text-menu-small" id="garden_name1" name="garden_name" value="{{$garden -> garden_name}}">
                    </div>
                    <div class="text-small pt-2">
                        <p style="position: absolute; left: 66%; white-space: pre">※付属名について正式名称が<br>  ｢〇〇〇〇大学付属幼稚園｣の場合､<br>   〇〇〇〇大学付属幼稚園とこちらにご記入ください｡<br>   その場合､上記の法人名学園名または付属名は空欄となります｡</p>

                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">園名フリガナ</p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <input type="text" class="form-control text-menu-small text-menu-small" id="garden_name_second" name="garden_name_second" value="{{$garden -> garden_name_second}}">
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">園の種類</p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>

                    <div class="col-6 py-1 pl-0">
                        <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-menu-small require " name="type" id="type" required>
                            <option value="0" selected disabled>選択してください</option>
                            @foreach($typeList as $index => $type)
                                @if($garden -> type -> type_id == $type -> type_id)
                                    <option value="{{$type->type_id}}" selected>{{$type->type_name}}</option>
                                @else
                                    <option value="{{$type->type_id}}" >{{$type->type_name}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">園の分類</p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>

                    <div class="col-6 py-1 pl-0">
                        <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-menu-small require" id="kind" name="kind" required>
                            <option value="0" selected disabled>選択してください</option>
                            @foreach($kindList as $index => $kind)
                                @if($garden -> kind_id == $kind -> kind_id)
                                    <option value="{{$kind->kind_id}}" selected>{{$kind->kind_name}}</option>
                                @else
                                    <option value="{{$kind->kind_id}}" >{{$kind->kind_name}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="mt-3 border-bottom" style="margin-right: -1.25rem; margin-left: -1.25rem;"></div>

                <div class="row text-menu-small mt-4">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">住所</p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <div class="d-flex justify-content-center">
                            <input type="text" class="form-control text-menu-small require relate-modify" onchange="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city');" placeholder="郵便番号" name="post_first" onkeyup="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city');" id="post_code_first" maxlength="3" value="{{$garden -> postList[0]}}" required/>
                            <p class="text-small-xs px-2">-</p>
                            <input type="text" class="form-control text-menu-small require relate-modify" onchange="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city');" name="post_second" onkeyup="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city');" id="post_code_second" value="{{$garden -> postList[1]}}" maxlength="4" required/>

{{--                            <input class="form-control text-menu-small require relate-modify"  placeholder="郵便番号"--}}
{{--                                   name="post_first" value="{{$garden -> postList[0]}}" required>--}}
{{--                            <p class="text-small-xs px-2">-</p>--}}
{{--                            <input  class=" form-control  require relate-modify" placeholder="" name="post_second" value="{{$garden -> postList[1]}}" required>--}}
                            <p class=" pl-2">住所自動入力</p>
                        </div>
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1"></p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <div class="d-flex">
                            <div class="flex-1 mr-2">
                                <input class="form-control flex-1 mb-0 text-menu-small require" name="prefecture" id="prefecture" required>
{{--                                <select class="custom-select text-menu-small custom-select-sm form-control form-control-sm  flex-1 mb-0 require" name="prefecture" id="prefecture" required>--}}
{{--                                    <option value="0" selected disabled >都道府県</option>--}}
{{--                                    @foreach($prefectures as $index => $prefecture)--}}
{{--                                        @if($garden -> prefecture_id == $prefecture -> prefecture_id)--}}
{{--                                            <option value="{{$prefecture->prefecture_id}}" selected>{{$prefecture->prefecture_name}}</option>--}}
{{--                                        @else--}}
{{--                                            <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </div>
                            <div class="flex-1">
                                <input class="form-control flex-1 mb-0 text-menu-small require" name="city" id="city" required>
{{--                                <select class="custom-select text-menu-small custom-select-sm form-control form-control-sm  flex-1 mb-0 require"  name="city" required id="city">--}}
{{--                                    <option value="0" selected disabled>市区町村郡</option>--}}
{{--                                </select>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1"></p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <input  class="mt-1 form-control require "  placeholder="町域" name="town" value="{{$garden -> town_name}}" required>
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1"></p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <input  class="mt-1 form-control require " placeholder="以降の住所(建物名･階数など)をご記入ください" name="address" value="{{$garden -> address}}" required>
                    </div>
                </div>
            </div>
            <div class="mt-2 border-bottom" style="margin-right: -1.25rem; margin-left: -1.25rem;"></div>
            <div class="card-body garden_basic pt-2">

                <div class="row text-menu-small mt-2">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">TEL</p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <div class="d-flex justify-content-center">

                            <input class="form-control text-menu-small require " placeholder="" name="mobile1_1"
                                   value="{{$garden -> mobileList[0]}}" required>
                            <p class="text-small-xs px-2">-</p>
                            <input  class=" form-control  require " placeholder="" name="mobile1_2" value="{{$garden -> mobileList[1]}}" required>
                            <p class="text-small-xs px-2">-</p>
                            <input  class=" form-control  require " placeholder="" name="mobil1_3" value="{{$garden -> mobileList[2]}}" required>
                        </div>
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">TEL2</p>


                    </div>
                    <div class="col-6 py-1 pl-0">
                        <div class="d-flex justify-content-center">

                            <input class="form-control text-menu-small  " placeholder="" name="mobile2_1" value="{{$garden -> mobileSecondList[0]}}">
                            <p class="text-small-xs px-2">-</p>
                            <input  class=" form-control   " placeholder="" name="mobile2_2" value="{{$garden -> mobileSecondList[1]}}">
                            <p class="text-small-xs px-2">-</p>
                            <input  class=" form-control   " placeholder="" name="mobil2_3" value="{{$garden -> mobileSecondList[2]}}">
                        </div>
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">FAX</p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>

                        </div>

                    </div>
                    <div class="col-6 py-1 pl-0">
                        <div class="d-flex justify-content-center">

                            <input class="form-control text-menu-small " placeholder="" name="fax_1" value="{{$garden -> faxList[0]}}">
                            <p class="text-small-xs px-2">-</p>
                            <input  class=" form-control  " placeholder="" name="fax_2" value="{{$garden -> faxList[1]}}">
                            <p class="text-small-xs px-2">-</p>
                            <input  class=" form-control  " placeholder="" name="fax_3" value="{{$garden -> faxList[2]}}">
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <div class="card my-2">
            <div class="tag-title d-flex">
                <p class="card-header top-menu text-menu-user py-1 w-25">
                    確認用情報
                </p>
                <div class="flex-1"></div>
            </div>

            <div class="card-body pt-0">
                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">確認用URL</p>


                    </div>
                    <div class="col-6 py-1 pl-0">
                        <input  class="mt-1 form-control "  placeholder="自社HP､市区町村のHPなどご記入ください" name="url" value="{{$garden -> url}}" >
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">園確認用の<br>
                            書類添付</p>
                        {{--                    <div class="flex-1 d-flex align-items-center text-right">--}}

                        {{--                    </div>--}}

                    </div>
                    <div class="col-10 py-1 pl-0">
                        園住所に届いた公共料金のお知らせや公的機関からの郵便物の他､消印のある郵便物など､<br>園を確認できる書類を添付してください
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-start pr-0">
                        <p class="pr-3 text-menu-small flex-1"></p>
                        <div class="flex-1 d-flex text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>
                    <div class="col-4 py-1 pl-0">
                        <div class="img-source ">

                            <div class="d-flex flex-column h-100 p-2" >
                                <div class="p-2 flex-1">
                                    <div class=" h-100 position-relative" name="img_content_show">
                                        <div class="radio-image radio-75-image ">
                                            @if(empty($garden -> photo_attachment))
                                                <img class="img-responsive full-width img-content d-none" id="img_body">
                                            @else
                                                <img class="img-responsive full-width img-content" id="img_body" src="{{asset('/storage/img/garden/'.$garden -> photo_attachment)}}">
                                                <input type="hidden" value="{{$garden -> photo_attachment}}" id="img_source_url" name="img_source">
                                            @endif

                                        </div>
                                        @if(empty($garden -> bus_route_img))
                                            <div id="img_empty">
                                                <div class="position-absolute img-content d-flex justify-content-center w-100 h-100" style="left: 0; top: 0">
                                                    <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                </div>
                                                <div class="position-absolute d-flex justify-content-center w-100" style="left: 0; bottom: 0">
                                                    <p class="text-menu-small text-center px-1 text-gray">ドラッグ&ドロップ､またはファイルを選択</p>
                                                </div>
                                            </div>
                                        @else
                                            <div id="img_empty" class="d-none">
                                                <div class="position-absolute img-content d-flex justify-content-center w-100 h-100" style="left: 0; top: 0">
                                                    <img src="{{asset('img/empty.png')}}" class="empty-image">
                                                </div>
                                                <div class="position-absolute d-flex justify-content-center w-100" style="left: 0; bottom: 0">
                                                    <p class="text-menu-small text-center px-1 text-gray">ドラッグ&ドロップ､またはファイルを選択</p>
                                                </div>
                                            </div>
                                        @endif


                                    </div>

                                </div>
                            </div>
                            <input id="image_content_add" type="file" accept="image/*" name="photo_attachment" style="display:none;" />
                            <div class="px-2 pb-2">
                                <div class="row">
                                    <div class="col-5 pr-1">
                                        <button type="button" id="btn_add_img" class="rounded w-100 py-0 text-menu-small btn-add" >ファイルを選択</button>

                                    </div>
                                    <div class="col-7 pl-0" style="margin-top: 2px;">
                                        <p class="text-menu-small">ファイル未選択</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row text-menu-small">
                    <div class="col-2 py-1 d-flex align-items-center pr-0">
                        <p class="pr-3 text-menu-small flex-1">創立日</p>
                        <div class="flex-1 d-flex align-items-center text-right">
                            <div class="flex-1"></div>
                            <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2 rounded-1">必須</p>
                        </div>

                    </div>
                    <div class="col-3 py-1 pl-0">
                        <input type="text" class="mt-1 form-control require date-input" name="founding" value="{{$garden -> founding}}" placeholder="YYYY/MM" required>
                    </div>
                </div>
            </div>


        </div>

        <div class="mt-2 border-bottom" style="margin-right: -1.25rem; margin-left: -1.25rem;"></div>

        <div class="card-body ">
            <div class="row text-menu-small">
                <div class="col-2 py-1 d-flex align-items-center">
                    <p class="px-3 text-menu-small flex-1"></p>


                </div>
                <div class="col-8 py-1 pl-0">
                    <textarea class="form-control text-menu-small" name="txt-notification" id="review" name="review" placeholder="上記､申請内容の補足事項がありましたら､ご記入ください" rows="10" maxlength="1000"></textarea>
                </div>
                <div class="col-2 position-relative">
                    <p class="position-absolute" style="left: 0; bottom: 0"><span id="review_count">0</span>/1,000文字</p>
                </div>
            </div>

            <div class="row text-menu-small">
                <div class="col-2 py-1 d-flex align-items-center">
                    <p class="px-3 text-menu-small flex-1"></p>


                </div>
                <div class="col-8 py-1 pl-0">
                    <p class="text-pink text-menu-small">重要情報に関してはコドモア側で審査の上で設定を行います｡ご希望の変更時期､内容にならない､また対応に時間を要す場合がございますので､あらかじめご了承ください｡</p>
                </div>
            </div>
        </div>



        <div class="card " >

            <div class="row mt-4 mb-4">
                <div class="offset-2 col-8">
                    <div class="d-flex">
                        <button  class="flex-1 py-1 rounded background-pink text-menu-small text-white btn-normal " style="visibility: hidden">登録･編集する</button>
                        <button class="flex-1 py-1 rounded text-menu-small background-white btn-normal" id="btn_reload">変更を取り消す</button>
                        <button type="submit" class="mx-4 flex-1 py-1 rounded text-white text-menu-small btn-normal background-pink " id="btn_save">入力内容の確認</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="mb-2 text-center w-100 text-menu-small">｜  お問合せ  ｜  FAQ(よくあるご質問)  ｜  ヘルプ  ｜  利用規約  ｜  プライバシーポリシー  ｜ </p>

            <div class="card-body text-menu-small background-white">
                <p class="text-center">Copyright ©ad-kit.co,.ltd.  All Rights Reserved.   No reproduction without permission.</p>
            </div>
        </div>
    </form>




@endsection

@section('modal')
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
    <div class="modal fade" id="confirm_save" role="dialog" aria-hidden="true" style="z-index: 1050;"
         data-backdrop="static">
        <div class="modal-dialog modal-full modify_modal">
            <div class="modal-content">
                <div class="modal-body text-center pt-4 pb-0 px-4">
                    <div id="confirm_content">
                        <div class="tag-title d-flex">
                            <p class="card-header top-menu text-menu-user py-1">
                                基本重要情報変更依頼(確認画面)
                            </p>
                            <div class="flex-1"></div>
                        </div>
                        <div class="card-body pt-4" id="garden_basic">
                            <div class="border-weight"></div>
                            <div class="row text-medium-small" id="modal_public_name_area">
                                <div class="col-4 border-right py-2"><p class="px-3">設立元(法人･付属名)</p></div>
                                <div class="col-8 py-2" id="modal_public_name"></div>
                            </div>
                            <div class="border-bottom" id="public_name_bottom"></div>
                            <div class="row text-medium-small" id="modal_old_garden_name_area">
                                <div class="col-4 border-right py-2"><p class="px-3">旧園名</p></div>
                                <div class="col-8 py-2" id="modal_old_garden_name"></div>
                            </div>
                            <div class="border-bottom" id="old_garden_name_bottom"></div>
                            <div class="row text-medium-small">
                                <div class="col-4 border-right py-2"><p class="px-3">園名</p></div>
                                <div class="col-8 py-2" id="modal_garden_name"></div>
                            </div>
                            <div class="border-bottom"></div>
                            <div class="row text-medium-small">
                                <div class="col-4 border-right py-2"><p class="px-3">園の種類</p></div>
                                <div class="col-8 py-2" id="modal_garden_type">

                                </div>
                            </div>
                            <div class="border-bottom"></div>
                            <div class="row text-medium-small">
                                <div class="col-4 border-right py-2"><p class="px-3">園の分類</p></div>
                                <div class="col-8 py-2" id="modal_garden_kind">

                                </div>
                            </div>
                            <div class="border-bottom"></div>
                            <div class="row text-medium-small">
                                <div class="col-4 border-right py-2"><p class="px-3">電話番号</p></div>
                                <div class="col-8 py-2" id="modal_mobile"></div>
                            </div>
                            <div class="border-bottom"></div>
                            <div class="row text-medium-small">
                                <div class="col-4 border-right py-2"><p class="px-3">住所</p></div>
                                <div class="col-8 py-2">
                                    <div class="d-flex">
                                        <p class="flex-1" id="modal_address">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom"></div>
                            <div class="row text-medium-small">
                                <div class="col-4 border-right py-2"><p class="px-3">創立日</p></div>
                                <div class="col-8 py-2" id="modal_date"></div>
                            </div>

                            <div class="border-weight"></div>

                            <p class="text-menu pt-4 float-left pl-3">以上の内容で変更を依頼します｡よろしいですか？
                            </p>
                            <p class="text-menu pt-3 float-left pl-3">依頼後のご連絡はご登録いただいている以下のメールアドレスにお送りします｡
                            </p>

                        </div>
                    </div>
                    <div id="finish" class="d-none">
                        <div class="tag-title d-flex">
                            <p class="card-header top-menu text-menu-user py-1">
                                基本重要情報変更依頼(受付完了)
                            </p>
                            <div class="flex-1"></div>
                        </div>
                        <div class="card-body py-4 text-center">
                            <p style="font-size: 16px; !important;" class="text-title">基本重要情報変更依頼を受付ました｡</p>
                            <p style="font-size: 16px; !important;" class="text-small">ご依頼内容によっては審査があり､回答にお時間をいただく場合がございます｡</p>
                        </div>
                    </div>


                </div>
                <div class="modal-footer pt-3 pb-0" style="border:none;">
                    <div id="btn_finish_area" class="text-center w-100 d-none" style="height: fit-content">
                        <button id="no_save" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">
                            <span>もどる</span>
                        </button>
                    </div>

                    <div id="btn_confirm_area" class="text-center w-100 " style="height: fit-content">
                        {{--                        <button id="exit" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"--}}
                        {{--                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">--}}
                        {{--                            <span>キャンセル</span>--}}
                        {{--                        </button>--}}
                        <button id="no_save" class="flex-1 py-1 rounded text-menu-small background-white btn-normal"
                                data-dismiss="modal" style="width: 30%; margin-bottom: 10px">
                            <span>もどる</span>
                        </button>
                        <button id="btn_submit"
                                class="flex-1 py-1 rounded text-white text-menu-small btn-normal background-pink "
                                style="width: 30%; margin-bottom: 10px;"><span>依頼する</span>
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
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script language="javascript" type="text/javascript">
        var tab_name = $('#tab_name').val();

        var next_name;
        var change_status = false;

        var is_Exit = function(name){
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
        $(document).ready(function() {
            var home_path = $("#home_path").val();

            var today = new Date();
            var dd = today.getDate();

            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            var date = yyyy + "/" + mm + "/" + dd;
            $("#post_code_first").trigger('keyup');
            $("#post_code_second").trigger('keyup');
            $("#modal_cur_date").text(date);
            $('input').on('change', function () {
                change_status = true;
            })
            $('textarea').on('change', function () {
                change_status = true;
            })


            var original_city_id = $("#original_city").val();
            var original_prefecture = $("#original_prefecture").val();
            //getCityList(original_prefecture);

            // function getCityList(prefecture_id) {
            //     var url = home_path + '/ajax/get-city/' + prefecture_id;
            //     $.ajax({
            //         url: url,
            //         success: function(response){
            //
            //             var cityList = response['city'];
            //             $(".city_detail").remove();
            //             cityList.forEach(city => {
            //                 var city_id = city['city_id'];
            //                 var city_name = city['city_name'];
            //                 if(original_city_id > 0) {
            //                     $("#city").append("<option class='city_detail' value='" + city_id + "' selected>" + city_name + "</option>");
            //                 } else {
            //                     $("#city").append("<option class='city_detail' value='" + city_id + "'>" + city_name + "</option>");
            //                 }
            //                 original_city_id = 0;
            //             });
            //         }
            //     });
            // }

            // $(document).on('change', "[name=prefecture]", function() {
            //
            //     // var prefecture_id = $(this).val();
            //     // //getCityList(prefecture_id);
            //     // $("#city").val(0);
            // });

            $("#btn_add_img").click(function() {
                $("#image_content_add").click();
            });

            $("#image_content_add").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#img_body").attr('src', e.target.result);
                        $("#img_body").removeClass('d-none');
                        $("#img_empty").addClass('d-none');
                    }
                    reader.readAsDataURL(this.files[0]); // convert to base64 string
                }
            });


            $("#btn_reload").click(function(event) {
                event.preventDefault();
                window.location.reload();
            });

            $('#btn_save').click(function (event) {
                event.preventDefault();
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {

                    $('#confirm_content').removeClass('d-none');
                    $('#btn_confirm_area').removeClass('d-none');
                    $('#finish').addClass('d-none');
                    $('#btn_finish_area').addClass('d-none');
                    var public_name = $('#public_name').val();
                    if($('#public_name_second').val()){
                        public_name = public_name + '(' + $('#public_name_second').val() + ')';
                    }
                    if(public_name){
                        $('#modal_public_name').text(public_name);
                        $('#modal_public_name_area').removeClass('d-none');
                        $('#public_name_bottom').removeClass('d-none');
                    }
                    else{
                        $('#modal_public_name_area').addClass('d-none');
                        $('#public_name_bottom').addClass('d-none');
                    }
                    var old_garden_name = $('#old_garden_name').val();
                    if($('#old_garden_name_second').val()){
                        old_garden_name = old_garden_name + '(' + $('#old_garden_name_second').val() + ')';
                    }
                    if(old_garden_name){
                        $('#modal_old_garden_name').text(old_garden_name);
                        $('#modal_old_garden_name_area').removeClass('d-none');
                        $('#old_garden_name_bottom').removeClass('d-none');
                    }
                    else{
                        $('#modal_old_garden_name_area').addClass('d-none');
                        $('#old_garden_name_bottom').addClass('d-none');
                    }
                    var garden_name = $('#garden_name1').val();
                    if($('#garden_name_second').val()){
                        garden_name = garden_name + '(' + $('#garden_name_second').val() + ')';
                    }
                    $('#modal_garden_name').text(garden_name);

                    var type = $('#type').val();
                    var type_str = $('#type').find('option[value="' + type + '"]').text();
                    $('#modal_garden_type').text(type_str);

                    var kind = $('#kind').val();
                    var kind_str = $('#kind').find('option[value="' + kind + '"]').text();
                    $('#modal_garden_kind').text(kind_str);

                    var mobile = $('[name="mobile1_1"]').val() + '-' + $('[name="mobile1_2"]').val() + '-' + $('[name="mobil1_3"]').val();
                    $('#modal_mobile').text(mobile);

                    var address = $('#prefecture').val() + $('#city').val() + $('[name="town"]').val() + $('[name="address"]').val();
                    $('#modal_address').text(address);

                    var fonding = $('[name="founding"]').val()
                    $('#modal_date').text(fonding);
                    $('#confirm_save').modal('show');

                }


            })

            $("#btn_submit").click(function(event) {
                event.preventDefault();
                    // var city_id = $("#city").val();
                    // if(city_id > 0 && !$("#img_body").hasClass('d-none')) {
                    //     var form = $('form')[0]; // You need to use standard javascript object here
                    //     var formData = new FormData(form);
                    //     var url = home_path + '/school/basic/modify';
                    //     $.ajax({
                    //         url: url,
                    //         data: formData,
                    //         processData: false,
                    //         contentType: false,
                    //         type: 'POST',
                    //         success: function(data){
                    //             alertify.success("更新成功");
                    //         }
                    //     });
                    // }

                $('#confirm_content').addClass('d-none');
                $('#btn_confirm_area').addClass('d-none');
                $('#finish').removeClass('d-none');
                $('#btn_finish_area').removeClass('d-none');

            });

            $("#review").on('input', function() {
                var val = $(this).val();
                var length = val.length;

                $("#review_count").html(length);
            });




        });
    </script>
@endsection
