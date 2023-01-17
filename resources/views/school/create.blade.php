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

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">    > 保護者と生徒､スクールで公開情報を編集する
        </div>

        <div class="card-body pb-0 text-title">
            <div class="d-flex align-items-center">
                <img class="height-1 img-icon" src="{{asset('img/pencil-icon.png')}}"> <p class="ml-2 text-large-xs">編集したい施設名を表示してください｡</p></div>

            <select class="mt-3 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="prefecture" id="search_prefecture">
                <option value="0" selected disabled>都道府県 検索</option>
                @foreach($prefectures as $index => $prefecture)
                    <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                @endforeach

            </select>
            <select class="mt-2 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " id="search_city">
                <option value="0" selected disabled>市区町村 検索</option>

            </select>

            <input  class="mt-2 form-control text-small require" placeholder="施設名などフリー検索"  id="search" >

            <!-- <div class="mt-1 flex justify-content-center">
                <button class="text-large mx-0 gray-btn-gradient btn rounded waves-effect btn-full btn-search  text-white" id="btn_search">検索 </button>
                <i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
            </div> -->

            <div class="d-flex justify-content-center py-1" style="margin-bottom: 0px" id="btn_search">
                    <img class=text-medium" src="{{asset('img/search-btn-img.png')}}">
            </div>


            <div class="mt-1 flex justify-content-center">
                <button class="mt-2 gray-btn-gradient text-large mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title  text-white"  id="btn_create">未登録園(校)を登録申請する  </button><i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
            </div>

            <div class="mt-4 text-medium text-center">
                <p>以下をご確認のうえ登録を行ってください</p>
                <p class="text-small mt-1">※コドモアの利用方法およびガイドラインには<br>
                    コドモアのご利用に関する規定が定められています。</p>
                <p class="menu-icon text-decoration mt-2 text-large" id="guide">利用方法およびガイドラインはこちら｡</p>
            </div>
        </div>

        <form class="needs-validation" id="create_form" method="post">
            {{csrf_field()}}
            <input type="hidden" name="prefecture">
            <input type="hidden" name="city">
            <input type="hidden" name="search">
            <input type="hidden" name="type">
        </form>




    </div>


@endsection

@section('footer_top')

@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $('#guide').click(function () {
                window.location.href = home_path + '/guide';
            })
            function getCityList(prefecture_id) {
                var url = home_path + '/ajax/get-city/' + prefecture_id;
                $.ajax({
                    url: url,
                    success: function(response){

                        var cityList = response['city'];
                        $(".city_detail").remove();
                        cityList.forEach(city => {
                            var city_id = city['city_id'];
                            var city_name = city['city_name'];
                            $("#search_city").append("<option class='city_detail' value='" + city_id + "'>" + city_name + "</option>");
                        });

                    }
                });
            }

            $(document).on('change', "#search_prefecture", function() {
                var prefecture_id = $(this).val();

                getCityList(prefecture_id);
            });

            var forms = document.getElementById('create_form');
            forms.action = home_path + '/school/add-data';

            $("#btn_create").click(function(event) {
               $("[name=type]").val(1);
               forms.submit();
            });

            $("#btn_search").click(function(event) {
                $("[name=type]").val(2);
                $("[name=prefecture]").val($("#search_prefecture").val());
                $("[name=city]").val($("#search_city").val());
                $("[name=search]").val($("#search").val());
                forms.submit();
            });
        });
    </script>
@endsection
