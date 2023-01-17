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

        .border-title {
            border-top: 1px solid #808080;
            border-bottom: 1px solid #808080;
            border-right: 1px solid #808080;
        }

        .background-light-pink {
            background-color: #FFEBEF;
        }

        .background-light-sky {
            background-color: #ADE4E9;
        }



        .border-light-bottom {
            border-bottom: 2px solid #CCCCCC;
        }

        .text-dark-pink {
            color: #FF557E !important;
        }
        .custom-radio .custom-control-input:checked~.custom-control-label::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='-4 -4 8 8'%3e%3ccircle r='4' fill='%2331BCC7'/%3e%3c/svg%3e");
        }

        .custom-radio .custom-control-input:checked~.custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }

        @media (min-width: 768px){
            .custom-control-label::before {
                top: 11px;
            }
            .custom-control-label::before {
                top: 11px;
            }
        }
    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">会員ログイン･新規会員登録</span> > 新規会員登録</p>

        </div>

        <div class="card-body text-large-xs pb-0">
            <img id="icon_move_home" class="sand-timer img-icon pb-2" src="{{asset('img/sand-clock-icon.png')}}">
           <span class="border-title ml-n1">3分でできる</span>  スクール会員無料登録
        </div>

        <div class="card-body pb-1">
            <div class="text-medium-title pb-2">
                <ul class="progressbar d-flex p-0">
                    <li class="active">検索</li>
                    <li>入力①</li>
                    <li>入力②</li>
                    <li>確認</li>
                    <li>完了</li>
                </ul>
            </div>

            <div class="mt-2 form-inline d-flex justify-content-center md-form form-sm mt-0 pl-3 rounded rounded-1 border " >

                <input class="form-control form-control-sm ml-2 flex-1 text-small border-0 mb-0 py-2" type="text" placeholder="施設名 サイト内検索"
                       aria-label="Search" id="txt_search" value="{{$name}}">

{{--                <div class="py-2 px-3 background-light-sky" id="btn_search">--}}
{{--                    <i class="fas fa-search text-white" aria-hidden="true"></i>--}}
{{--                </div>--}}


                <div class="py-2 background-light-sky rounded" id="btn_search" style="padding-right: 12px !important; padding-left: 12px !important;">
                    <img class="img-icon1 img-icon" src="{{asset('img/search-icon.png')}}">
                    {{--                    <i class="fas fa-search text-white" aria-hidden="true"></i>--}}
                </div>

            </div>

            <p class="mt-2 text-medium-xs">サイト内検索結果</p>

        </div>

        <div class="border-light-bottom"></div>

        <div class="card-body">
            <div id="search_list">

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

@section('modal')
    <div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="margin: 1rem;">


            <div class="modal-content background-transparent" >
                <div class="modal-body py-0 background-white" style="border-radius: 1rem;">

                    <div class="card-body px-2">
                        <div class="d-flex justify-content-center">
                            <img class="mt-1 img-icon height-1-half" style="min-width: unset" src="{{asset('img/warning.png')}}">
                        </div>
                        <p class="text-center text-title-large text-black mt-1">この施設は園･学校会員にて</p>
                        <p class="text-center text-title-large text-black"> 登録済みです</p>

                        <p class="text-center text-large-xs-medium mt-2">お伝え済みの園･学校 ID､パスワードで</p>
                        <p class="text-center text-large-xs-medium ">管理画面より編集してください</p>
                        <p class="text-center text-large-xs-medium ">PCからの作業をオススメします</p>

                        <div class="d-flex mt-3 justify-content-center">
                            <button class="gray-btn-gradient px-5 py-2 mx-0 btn btn-outline-default rounded waves-effect btn-title text-white " id="btn_login">ログイン</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                //window.history.back();
                window.location.href = home_path + '';
            });

            function getSchoolList() {
                var url = home_path + '/ajax/republic/school-list-info';
                var search = $("#txt_search").val();
                $.ajax({
                    url:url,
                    type:'post',
                    data: {
                        search: search,
                        currentPage: 1,
                        perPage: 5
                    },
                    success: function (response) {
                        $("#search_list").html(response);
                    },
                    error: function () {
                    }
                });
            }

            getSchoolList();


            $("#btn_search").click(function(event) {
                getSchoolList();

                //window.location.href = 'http://example.com';
            });
            $("#btn_login").click(function(event) {

                window.location.href = home_path + "/admin/login";
            });

            $(document).on('click', '#btn_modify', function() {
                var id = $('input[name=radio_school_index]:checked').val();

                if(id) {
                    var hasUser = $("#radio_school_index_" + id).data('user');
                    if(hasUser == true) {
                        $("#modal_alert").modal('show');
                    } else {
                        window.location.href = home_path + "/register/republic/modify?gardenId=" + id;
                    }

                }
            });

            $(document).on('click', '#btn_create', function() {
                window.location.href = home_path + "/register/republic/modify";
            });

        });
    </script>
@endsection
