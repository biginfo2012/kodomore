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

        .custom-checkbox .custom-control-label::before {
            left: -1.5rem;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label:before {
            background-color: #ace4e9;
            border: 0px;
        }
        .custom-radio .custom-control-input:checked~.custom-control-label:before {
            left: -1.5rem;
        }



        form:invalid button[type='submit']{
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }

        .btn-public-register {
            background-color: #216887 !important;
        }


    </style>
@endsection

@section('content')

    <input type="hidden" id="original_prefecture" value="{{$search_prefecture}}">
    <input type="hidden" id="original_city" value="{{$search_city}}">
    <input type="hidden" id="original_type" value="{{$type}}">
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">    > 保護者と生徒､スクールで公開情報を編集する
        </div>

        <div class="card-body pb-0 text-title">
            <div class="d-flex align-items-center">
                <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}"> <p class="ml-2 text-large-xs">編集したい施設名を表示してください｡</p></div>

            @if($type == 2)
                <select class="mt-3 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small "  id="search_prefecture">
                    <option value="0" selected disabled>都道府県 検索</option>
                    @foreach($prefectures as $index => $prefecture)
                        @if($search_prefecture == $prefecture->prefecture_id)
                            <option value="{{$prefecture->prefecture_id}}" selected>{{$prefecture->prefecture_name}}</option>
                        @else
                            <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                        @endif
                    @endforeach
                </select>
                <select class="mt-2 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " id="search_city">
                    <option value="0" selected disabled>市区町村 検索</option>
                </select>

                <input  class="mt-2 form-control text-small require" placeholder="施設名などフリー検索"  id="search" value="{{$search}}">

                <!-- <div class="mt-1 flex justify-content-center">
                    <button class="gray-btn-gradient text-large mx-0 btn rounded waves-effect btn-full btn-search  text-white" id="btn_search">検索 </button><i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
                </div> -->
                <div class="d-flex justify-content-center py-1" style="margin-bottom: 0px" id="btn_search">
                    <img class=text-medium" src="{{asset('img/search-btn-img.png')}}">
                </div>

                <div id="school_list" class="mt-2"></div>

                <div id="modify_body" class="d-none">
                    <div class="mt-2 text-medium-title justify-content-center p-1 section-background mb-2 rounded" style="background-color: #D6F2F4 !important">
                        <p class="text-center">お探しの施設名がない場合､コドモア編集部に</p>
                        <p class="text-center">施設名称の登録申請を依頼してください</p>
                    </div>

                    <div class="flex mt-2">
                        <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_modify">編集する</button><i class="text-white fas fa-angle-right ml-1"></i>
                    </div>
                </div>
            @endif

            <form class="needs-validation" id="add_form" method="post">
                {{csrf_field()}}
                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        設立元(法人･付属名)
                    </p>
                </div>
                <input  class="mt-1 form-control text-small "   name="public_name" >

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        設立元(法人･付属名)カナ
                    </p>
                </div>
                <input  class="mt-1 form-control text-small "   name="public_name_second" >

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        施設名
                    </p>

                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <input  class="mt-1 form-control text-small require"   name="garden_name" required>

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        施設名カナ
                    </p>

                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <input  class="mt-1 form-control text-small require"   name="garden_name_second" required>

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        住所
                    </p>

                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <div class="mt-1 d-flex justify-content-center">

{{--                    <input  class="form-control text-small require "  placeholder="郵便番号" name="post_first" type="number" required>--}}
{{--                    <p class="text-small-xs px-2">-</p>--}}
{{--                    <input  class=" form-control text-small require " placeholder="" name="post_second" type="number" required>--}}
                    <input type="text" class="form-control text-small require relate-modify" name="post_first" onkeyup="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city', 'town');" id="post_code_first" maxlength="3" required/>
                    <p class="text-small-xs px-2">-</p>
                    <input type="text" class="form-control text-small require relate-modify" name="post_second" onkeyup="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city', 'town');" id="post_code_second" maxlength="4" required/>
                    <p class="text-small-xs pl-2">住所自動入力</p>
                </div>

                <div class="mt-1 d-flex">
                    <div class="flex-1 mr-2">
                        <input class="form-control flex-1 mb-0 text-small require" name="prefecture" id="prefecture" required>
{{--                        <select class="custom-select custom-select-sm form-control form-control-sm  flex-1 mb-0 text-small require" name="prefecture" id="prefecture" required>--}}
{{--                            <option value="0" selected disabled >都道府県</option>--}}
{{--                            @foreach($prefectures as $index => $prefecture)--}}
{{--                                <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                    </div>
                    <div class="flex-1">
                        <input class="form-control flex-1 mb-0 text-small require" name="city" id="city" required>
{{--                        <select class="custom-select custom-select-sm form-control form-control-sm  flex-1 mb-0 text-small require" name="city" required id="city">--}}
{{--                            <option value="0" selected disabled>市区町村郡</option>--}}
{{--                        </select>--}}
                    </div>
                </div>

                <input type="hidden" name="prefecture_name">
                <input type="hidden" name="city_name">

                <input  class="mt-1 form-control text-small require " placeholder="町域" name="town" required>
                <input  class="mt-1 form-control text-small require " placeholder="以降の住所(建物名･階数など)をご記入ください" name="address" required>

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        電話番号
                    </p>

                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <div id="mobile_modify" class="">
                    <div class="d-flex justify-content-center">
                        <input  class="mt-1 form-control text-small relate-modify mr-1 require" data-content="mobile_1" name="mobile_1" type="number" required>
                        -
                        <input  class="mt-1 form-control text-small relate-modify mx-1 require" data-content="mobile_2" name="mobile_2" type="number" required>
                        -
                        <input  class="ml-1 mt-1 form-control text-small relate-modify require" data-content="mobile_3" name="mobile_3" type="number" required>
                    </div>

                </div>
                <input  class="mt-1 form-control text-small require d-none" name="mobile">

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        URL
                    </p>
                </div>
                <input  class="mt-1 form-control text-small"   name="url" >

{{--                <div class="mt-2 custom-control custom-radio">--}}
{{--                    <input type="radio" class="custom-control-input require" id="radio_accept" name="radio_accept" value="1" required>--}}
{{--                    <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="ml-1 menu-icon text-decoration" id="privacy">｢プライバシーポリシー｣</span>に同意します｡</label>--}}
{{--                </div>--}}

                <div class="mt-3 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">
                    <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="ml-1 menu-icon text-decoration" id="privacy">｢利用方法およびガイドライン｣</span>に同意します｡</label>
                </div>

                <div class="mt-2 flex justify-content-center">
                    <button class="gray-btn-gradient background-gray mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white " style="border: none !important;" id="btn_submit">入力内容を確認する </button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>

            </form>

        </div>
    </div>


@endsection

@section('footer_top')

@endsection

@section('js4event')
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            var original_city = $("#original_city").val();
            var original_prefecture = $("#original_prefecture").val();
            var original_type = $("#original_type").val();
            var is_activity;
            $('input[type=checkbox][name=radio_accept]').change(function() {
                if($(this)[0].checked){
                    $("#btn_submit").removeClass("background-gray");
                    is_activity = true;
                }
                else{
                    $("#btn_submit").addClass("background-gray");
                    is_activity = false;
                }
            });

            function getCityList(type, prefecture_id) {
                var url = home_path + '/ajax/get-city/' + prefecture_id;
                $.ajax({
                    url: url,
                    success: function(response){

                        var cityList = response['city'];
                        var classname = 'city_detail';
                        var city_content = 'city';
                        if(type == 0) {
                            classname = 'search_city_detail';
                            city_content = 'search_city';
                        }
                        $("." + classname).remove();

                        cityList.forEach(city => {
                            var city_id = city['city_id'];
                            var city_name = city['city_name'];
                            if(city_id == original_city && type == 0) {
                                $("#" + city_content).append("<option class='" + classname + "' value='" + city_id + "' selected>" + city_name + "</option>");
                            } else {
                                $("#" + city_content).append("<option class='" + classname + "' value='" + city_id + "'>" + city_name + "</option>");
                            }
                        });
                        original_city = '';

                    }
                });
            }

            function getSchoolList(prefecture_id, city_id) {
                var search = $("#search").val();
                var url = home_path + '/ajax/school-list-info';
                if(prefecture_id == 0) {
                    prefecture_id = '';
                }

                if(city_id == 0) {
                    city_id = '';
                }
                $.ajax({
                    url:url,
                    type:'post',
                    data: {
                        cityList: city_id,
                        search: search,
                        prefecture_id: prefecture_id,
                        currentPage: 1,
                        perPage: 5
                    },
                    success: function (response) {
                        $("#school_list").html(response);
                        var count = $("[name=garden_count]").val();
                        if(count == 0) {
                            $("[name=select-description]").html('<p class="text-center text-medium-title">お探しの施設名はコドモアに登録されておりません</p>\n' +
                                '            <p class="text-center text-medium-title">コドモア編集部に施設名称の登録申請を</p>\n' +
                                '            <p class="text-center text-medium-title">依頼してください</p>');

                            $("#modify_body").addClass('d-none');
                        } else {
                            $("#modify_body").removeClass('d-none');
                        }
                    },
                    error: function () {
                    }
                });
            }

            if(original_type == 2) {
                getCityList(0, original_prefecture);
                getSchoolList(original_prefecture, original_city);
            }


            $(document).on('change', "#search_prefecture", function() {
                var prefecture_id = $(this).val();
                getCityList(0, prefecture_id);
            });

            $(document).on('change', "#prefecture", function() {
                var prefecture_id = $(this).val();
                getCityList(1, prefecture_id);
            });

            $("#btn_search").click(function(event) {
               event.preventDefault();
               var prefecutre = $("#search_prefecture").val();
               var city = $("#search_city").val();
               getSchoolList(prefecutre, city);
            });

            $("#btn_modify").click(function(event) {
                event.preventDefault();
                var gardenId = $('input[name=radio_school_index]:checked').val();
                if(gardenId > 0) {
                    window.location.href = home_path + '/school/modify/' + gardenId;
                }
            });

            $("#btn_submit").click(function(event) {
               event.preventDefault();
               if(is_activity === true){
                   var forms = document.getElementById('add_form');
                   forms.classList.add('was-validated');
                   forms.action = home_path + '/school/create/confirm';
                   if (forms.checkValidity() === true) {
                       $('[name=mobile]').val($('[name=mobile_1]').val() + '-' + $('[name=mobile_2]').val() + '-' + $('[name=mobile_3]').val());
                       //console.log($('[name=mobile_1]').val() + '-' + $('[name=mobile_2]').val() + '-' + $('[name=mobile_3]').val());
                       forms.submit();


                   }
               }

            });

        });
    </script>
@endsection
