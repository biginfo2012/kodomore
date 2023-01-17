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

        .background-gray{
            background-color: #C4C4C4 !important;
        }
        .background-gray1{
            background-color: #EAEAEA !important;
        }

        .custom-control-label::before{
            top: 2.5px;
        }
        .custom-control-label::after{
            top: 2.5px;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label:before{
            background-color: #ABDBE1;
            border-color: #ABDBE1;
        }



    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">   > お問合わせ
        </div>



        <div class="card-header  align-items-center d-flex">
            <img class="img-icon height-1-half" src="{{asset('img/question-icon.png')}}">
            <div class="ml-2 text-title" >
                お問合わせ
            </div>
        </div>



        <div class="card-body py-1">
            <div class="background-gray1">
                <p class="text-medium-xs p-1">
                    お問合わせ種類
                </p>
            </div>
            <p class="mt-1 text-medium">{{$type}}</p>

            <div class="mt-2 background-gray1">
                <p class="text-medium-xs p-1 ">
                    お問合わせ内容
                </p>
            </div>
            <p class="text-medium mt-1">{{$content}}</p>

            <div class="mt-2 background-gray1">
                <p class="text-medium-xs p-1">
                    お名前
                </p>
            </div>
            <p class="text-medium mt-1">{{$parent_first.' '.$parent_second}}</p>

            <div class="mt-2 background-gray1">
                <p class="text-medium-xs p-1">
                    フリガナ
                </p>
            </div>
            <p class="text-medium mt-1">{{$first_name.' '.$second_name}}</p>

            <div class="mt-2 background-gray1">
                <p class="text-medium-xs p-1">
                    メールアドレス(半角英数字)
                </p>
            </div>
            <p class="text-medium mt-1">{{$email}}</p>

            <div class="mt-2 background-gray1">
                <p class="text-medium-xs p-1">
                    お電話番号
                </p>
            </div>
            <p class="text-medium mt-1">{{$mobile}}</p>
        </div>

        <div class="card-body py-1">
            <div class="flex mt-3">
                <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" style="border: 2px solid #236888 !important;" id="btn_back">内容を修正する </button><i class="text-blue fas fa-angle-left ml-1"></i>
            </div>

            <div class="mt-2 custom-control custom-checkbox text-medium-light">
                <input type="checkbox" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">
                <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="menu-icon text-decoration" id="contact">利用規約</span>と<span class="menu-icon text-decoration" id="privacy">プライバシーポリシー</span>に同意して送信</label>
            </div>

            <div class="mt-2 flex justify-content-center">
                <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white background-gray" id="btn_submit">送信する </button><i class="text-white fas fa-angle-right ml-1"></i>
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
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            var is_activity = false;
            $("#btn_garden").click(function(event) {
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });

            $("#btn_submit").click(function(event) {
                if(is_activity == true) {
                    window.location.href = home_path + '/question/complete';
                }
            });

            $("#contact").click(function(event) {
                window.location.href = home_path + '/contact#terms';
            });

            $("#privacy").click(function(event) {
                window.location.href = home_path + '/private';
            });
            $("#btn_back").click(function(event) {
                event.preventDefault();
                history.back();
                //window.location.href = 'http://example.com';
            });

            $('input[type=checkbox][name=radio_accept]').change(function() {
                if($('#btn_submit').hasClass('background-gray')){
                    $("#btn_submit").removeClass("background-gray");
                    is_activity = true;
                }
                else{
                    $("#btn_submit").addClass("background-gray");
                    is_activity = false;
                }

            });

            function init() {
                var selected = $("input[name='radio_accept']:checked").val();
                if(selected > 0) {
                    $("#btn_submit").removeClass("background-gray");
                    is_activity = true;
                }
            }

            init();

        });
    </script>
@endsection
