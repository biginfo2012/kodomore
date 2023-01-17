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

        .background_procedure_type{
            background-image: url('{{asset('img/procedure_type_background.png')}}');
            background-size: cover;
        }

        .sky-border {
            border: 2px solid #B6EEEC;
        }

        .left_bar{
            position: absolute;
            left: 0;
            width: 0.4rem;
            height: 100%;
        }


    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex pt-0 pb-1">

        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon pb-1" src="{{asset('img/fa-edit.png')}}"> 登録内容確認
        </div>



        <div class="card-body py-1">


            <div class="mt-2 background-light-gray">
                <p class="text-small p-1 ">
                    お名前
                </p>
            </div>
            <p class="text-medium mt-1">{{$first_name.' '.$second_name}}</p>

            <div class="mt-2 background-light-gray">
                <p class="text-small p-1">
                    フリガナ
                </p>
            </div>
            <p class="text-medium mt-1">{{$first_name_huri.' '.$second_name_huri}}</p>

            <div class="mt-2 background-light-gray">
                <p class="text-small p-1">
                    性別
                </p>
            </div>
            <p class="text-medium mt-1">{{$gender}}</p>

            <div class="mt-2 background-light-gray">
                <p class="text-small p-1">
                    年代
                </p>
            </div>
            <p class="text-medium mt-1">{{$old}}</p>

            <div class="mt-2 background-light-gray">
                <p class="text-small p-1">
                    生年月日
                </p>
            </div>
            <p class="text-medium mt-1">{{$date}}</p>
            <div class="mt-2 background-light-gray">
                <p class="text-small p-1">
                    郵便番号(半角数字)
                </p>
            </div>
            <p class="text-medium mt-1">{{$post_code}}</p>
            <div class="mt-2 background-light-gray">
                <p class="text-small p-1">
                    住所
                </p>
            </div>
            <p class="text-medium mt-1">{{$city.' '.$address}}</p>
            <div class="mt-2 background-light-gray">
                <p class="text-small p-1">
                    お電話番号
                </p>
            </div>
            <p class="text-medium mt-1">{{$mobile}}</p>
            <div class="mt-2 background-light-gray">
                <p class="text-small p-1">
                    メールアドレス(半角英数字)
                </p>
            </div>
            <p class="text-medium mt-1">{{$email}}</p>

            <div class="background_procedure_type mt-2 py-1 pl-2" id="heading1">

                <div class="flex">
                    <h6 class="mb-0 text-white w-100 text-title">
                        お子様(お孫様)について
                    </h6>
                </div>
            </div>

            @foreach($childDetails as $childDetail)
                <div class="w-100">
                    <div class="flex mt-2 my-2">
                        <div class="top-menu left_bar">
                        </div>
                        <div class="w-100 py-1 text-title sub-menu pl-3" id="index_child">
                            {{$childDetail -> title}}
                        </div>
                    </div>
                </div>

                <div class="mt-2 background-light-gray">
                    <p class="text-small p-1 ">
                        お子様のお名前
                    </p>
                </div>
                <p class="text-medium mt-1">{{$childDetail -> first_name.' '.$childDetail -> second_name}}</p>

                <div class="mt-2 background-light-gray">
                    <p class="text-small p-1">
                        フリガナ
                    </p>
                </div>
                <p class="text-medium mt-1">{{$childDetail -> first_name_huri.' '.$childDetail -> second_name_huri}}</p>

                <div class="mt-2 background-light-gray">
                    <p class="text-small p-1">
                        お子様の性別
                    </p>
                </div>
                <p class="text-medium mt-1">{{$childDetail -> gender}}</p>

                <div class="mt-2 background-light-gray">
                    <p class="text-small p-1">
                        お子様の生年月日(予定日)
                    </p>
                </div>
                <p class="text-medium mt-1">{{$childDetail -> date}}</p>

                @foreach($childDetail -> old as $oldSchool)
                    <div class="mt-1 background-light-gray">
                        <p class="text-normal p-1">
                            [入園･入学予定][現在通っている][卒園･卒業校]

                        </p>
                    </div>
                    <p class="text-medium mt-1">{{$oldSchool -> info -> garden_public_name}}</p>
                    <p class="text-medium ">{{$oldSchool -> detail}}</p>
                @endforeach

                @foreach($childDetail -> cur as $curSchool)
                    <div class="mt-1 background-light-gray">
                        <p class="text-normal p-1">
                            [入園･入学予定][現在通っている][卒園･卒業校]
                        </p>
                    </div>
                    <p class="text-medium mt-1">{{$curSchool -> info -> garden_public_name}}</p>
                    <p class="text-medium ">{{$curSchool -> detail}}</p>
                @endforeach
            @endforeach
        </div>



        <form id="register_form" action="<?=url('/register/parent/final');?>" method="post">
            {{csrf_field()}}
            <input type="hidden" id="user_id" name="user_id" value="{{$id}}">
            <input type="hidden" id="password" name="password" value="{{$password}}">
            <input type="hidden" id="childDetailStr" name="childDetailStr" value="{{$childDetailStr}}">
            <input type="hidden" id="radio_receive" name="radio_receive" value="{{$radio_receive}}">


            <div class="card-body py-1">
                <div class="flex mt-3">
                    <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" style="border: 1px solid #236888 !important" id="btn_back">内容を修正する </button><i class="text-blue fas fa-angle-left ml-1"></i>
                </div>

                <div class="mt-2 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">
                    <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="menu-icon text-decoration" id="privacy">｢プライバシーポリシー｣</span>に同意します｡</label>
                </div>

                <div class="mt-2 flex justify-content-center mb-3">
                    <button class="gray-btn-gradient background-gray mx-0 btn btn-outline-default btn-rounded waves-effect btn-full btn-title text-white " style="border: none !important;" id="btn_submit">会員登録する </button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>
            </div>
        </form>





    </div>


@endsection

@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 1.5rem;  margin-top: -50px">
        <div class="card-body background-opacity">

            <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>
@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            var is_activity = false;
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            $("#btn_submit").click(function(event) {
                if(is_activity == true) {
                    window.location.href = home_path + '/question/complete';
                }
            });

            $("#privacy").click(function(event) {
                window.location.href = home_path + '/private';
            });
            $("#btn_back").click(function(event) {
                event.preventDefault();
                history.back();
                //window.location.href = 'http://example.com';
            });

            $('input[type=radio][name=radio_accept]').change(function() {
                $("#btn_submit").removeClass("background-gray");
                is_activity = true;
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
