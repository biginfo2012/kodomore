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
        .border-title {
            border-top: 1px solid #808080;
            border-bottom: 1px solid #808080;
            border-right: 1px solid #808080;
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
        .border-light-bottom {
            margin: 1.5rem 0rem 0.5rem 0;

            border-bottom: 2px solid #CCCCCC;
        }

        form:invalid button[type='submit']{
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }

        .text-dark-blue {
            color: #0098A2 !important;
        }

        @media (min-width: 768px){
            .custom-control-label::before {
                top: 11.5px !important;
            }
            .ccustom-control-label::after {
                top: 11.5px !important;
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

        <div class="card-body text-large-xs">
            <img id="icon_move_home" class="sand-timer img-icon pb-2" src="{{asset('img/sand-clock-icon.png')}}"><span class="border-title">3分でできる</span>  スクール会員無料登録
        </div>

        <div class="card-body pt-0 pb-1">
            <div class="text-medium-title">
                <ul class="progressbar d-flex p-0">
                    <li class="active">検索</li>
                    <li class="active">入力①</li>
                    <li class="active">入力②</li>
                    <li class="active">確認</li>
                    <li>完了</li>
                </ul>
            </div>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-center background-light-pink p-2 rounded" style="background-color: #FFEBEF !important;">
                <img class="mt-1 img-icon height-1-half" style="min-width: unset" src="<?php echo e(asset('img/warning_pink.png')); ?>">
                <p class="ml-2 text-large-xs text-pink " style="color: #E5005A !important;">まだ登録申請は確定されておりません<br>
                    以下をご確認ください</p>
            </div>

        </div>

        <p class="px-3 text-large-xs text-dark-blue">◆掲載施設情報</p>

        <div id="public_name_area">
            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        設立元(法人･付属名)
                    </p>

                </div>
            </div>
            <p class="px-4 py-2 text-medium-xs" id="public_name"></p>
            <p class="px-4 py-2 text-medium-xs" id="public_name_huri"></p>
        </div>


        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    施設名
                </p>

            </div>
        </div>
        <p class="px-4 py-2 text-medium-xs" id="garden_name"></p>
        <p class="px-4 py-2 text-medium-xs" id="garden_name_huri"></p>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    園の種類
                </p>

            </div>
        </div>
        <p class="px-4 py-2 text-medium-xs" id="type"></p>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    園の分類
                </p>

            </div>
        </div>
        <p class="px-4 py-2 text-medium-xs" id="kind"></p>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    住所
                </p>

            </div>
        </div>
        <p class="px-4 pt-2 text-medium-xs " id="post_code"></p>
        <p class="px-4 py-0 text-medium-xs " id="town"></p>
        <p class="px-4 py-0 text-medium-xs" id="address"></p>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    電話番号
                </p>
            </div>
        </div>
        <p class="px-4 py-2 text-medium-xs" id="mobile"></p>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    確認用URL
                </p>

            </div>
        </div>
        <p class="px-4 py-2 text-medium-xs" id="url"></p>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    確認のための書類添付
                </p>
            </div>
        </div>
        <img class="img-responsive full-width img-content px-2 pt-2" id="img_default_body" >

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    創立日
                </p>

            </div>
        </div>
        <p class="px-4 py-2 text-medium-xs" id="founding"></p>


        <div class="border-light-bottom mt-2"></div>
        <p class="px-3 text-large-xs text-dark-blue">◆代表者情報</p>
        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    代表者名
                </p>
            </div>
        </div>

        <div class="user-detail">
            <p class="px-4 py-2 text-medium-xs" id="user_name"></p>
            <p class="px-4 py-2 text-medium-xs" id="user_name_huri"></p>
        </div>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    代表者携帯電話番号
                </p>

            </div>


        </div>

        <div class="user-detail">
            <p class="px-4 py-2 text-medium-xs" id="user_mobile"></p>
        </div>

        <div class="border-light-bottom mt-2"></div>

        <p class="px-3 text-large-xs text-dark-blue">◆担当者情報</p>
        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    代表者名
                </p>

            </div>
        </div>

        <div class="user-detail">
            <p class="px-4 py-2 text-medium-xs" id="contact_name"></p>
            <p class="px-4 py-2 text-medium-xs" id="contact_name_hui"></p>
        </div>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    担当職務
                </p>
            </div>
        </div>

        <div class="user-detail">
            <p class="px-4 py-2 text-medium-xs" id="contact_type"></p>
        </div>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    担当者携帯電話番号
                </p>

            </div>


        </div>

        <div class="user-detail">
            <p class="px-4 py-2 text-medium-xs" id="contact_mobile"></p>
        </div>

        <div class="mt-2 background-light-gray px-3 py-1">
            <div class="d-flex justify-content-center">
                <p class="p-1 text-small flex-1">
                    メールアドレス
                </p>
            </div>
        </div>

        <div class="user-detail">
            <p class="px-4 py-2 text-medium-xs" id="user_email"></p>
        </div>
        <div class="card-body text-center">
            <button  class=" mx-0 btn rounded waves-effect btn-full text-medium gray-btn-gradient px-1" id="btn_back" style="width: 70%; border: 1px solid #969696 !important;">代表者･担当者情報を修正する</button>

            <button  class=" mt-2 mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white gray-btn-gradient px-1" id="btn_next" style="width: 70%">無料登録の申請をする  </button>

        </div>
        <form class="needs-validation" novalidate id="complete_form" action="<?=url('/register/republic/complete');?>" method="post">
            {{csrf_field()}}
            <input type="hidden" name="garden" id="garden">
            <input type="hidden" name="user" id="user">
            <input type="hidden" name="photo_attachment" id="photo_attachment">
        </form>

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
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                //window.history.back();
                window.location.href = home_path + '';
            });


            var garden_info = JSON.parse(localStorage.getItem("garden"));
            var user_info = JSON.parse(localStorage.getItem("user"));


            if(garden_info['public_name'] == ''){
                $('#public_name_area').addClass('d-none');
            }
            $("#public_name").text(garden_info["public_name"]);
            if(garden_info['public_name_second']== ''){
                $('#public_name_huir').addClass('d-none');
            }
            $("#public_name_huri").text(garden_info["public_name_second"]);
            $("#garden_name").text(garden_info["garden_name"]);
            $("#garden_name_huri").text(garden_info["garden_name_second"]);
            $("#type").text(garden_info["type"]);
            $("#kind").text(garden_info["kind"]);
            $("#post_code").text(garden_info["post_code"]);
            $("#town").text(garden_info["prefecture_index"] + garden_info["city_index"] + garden_info["town"]);
            $("#address").text(garden_info["address"]);
            $("#mobile").text(garden_info["mobile"]);
            $("#url").text(garden_info["url"]);
            $("#founding").text(garden_info["founding"]);

            $("#user_name").text(user_info["first_name"] + ' ' + user_info["second_name"]);
            $("#user_name_huri").text(user_info["first_name_huri"] + ' ' + user_info["second_name_huri"]);
            $("#user_mobile").text(user_info["mobile"]);
            $("#contact_name").text(user_info["contact_first_name"] + ' ' + user_info["contact_second_name"]);
            $("#contact_name_hui").text(user_info["contact_first_name_huri"] + ' ' + user_info["contact_second_name_huri"]);
            $("#contact_type").text(user_info["contact_type"]);
            $("#contact_mobile").text(user_info["contact_mobile"]);
            $("#user_email").text(user_info["email"]);

            var url = "{{asset('/storage/img/garden/')}}" + '/' + localStorage.getItem('photo_attachment');

            $("#img_default_body").attr('src', url);


            $("#btn_back").click(function (event) {
                event.preventDefault();
                history.back();
            });

            $("#garden").val(localStorage.getItem('garden'));
            $("#photo_attachment").val(localStorage.getItem('photo_attachment'));
            $("#user").val(localStorage.getItem('user'));

            $("#btn_next").click(function(event) {
                var forms = document.getElementById('complete_form');
                forms.submit();
                //window.location.href = 'http://example.com';
            });

        });
    </script>
@endsection
