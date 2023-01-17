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

    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">会員ログイン･新規会員登録</span> > <span class="top-title-tag">新規会員登録</span> > 登録内容確認</p>

        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/fa-edit.png')}}"> 登録内容確認
        </div>

        <div class="card-body py-1">
            <div class="background-light-gray">
                <p class="text-small p-1">
                    職業
                </p>
            </div>
            <p class="mt-1 text-medium">{{$job}}</p>

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

            @if($bir !== '')
                <div class="mt-2 background-light-gray">
                    <p class="text-small p-1">
                        生年月日
                    </p>
                </div>
                <p class="text-medium mt-1">{{$bir}}</p>
            @endif

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
        </div>

        <form id="register_form" action="<?=url('/register/complete');?>" method="post">
            {{csrf_field()}}
            <input type="hidden" name="job" value="{{$job}}">
            <input type="hidden" name="first_name" value="{{$first_name}}">
            <input type="hidden" name="second_name" value="{{$second_name}}">
            <input type="hidden" name="first_name_huri" value="{{$first_name_huri}}">
            <input type="hidden" name="second_name_huri" value="{{$second_name_huri}}">
            <input type="hidden" name="gender" value="{{$genderIndex}}">
            <input type="hidden" name="old" value="{{$oldIndex}}">
            <input type="hidden" name="date" value="{{$date}}">
            <input type="hidden" name="post_code" value="{{$post_code}}">
            <input type="hidden" name="city" value="{{$city}}">
            <input type="hidden" name="address" value="{{$address}}">
            <input type="hidden" name="mobile" value="{{$mobile}}">
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="type" value="normal">

            <div class="card-body py-1">
                <div class="flex mt-3">
                    <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" id="btn_back" style="border: 1px solid #216887 !important;">内容を修正する </button><i class="text-blue fas fa-angle-left ml-1"></i>
                </div>
                <div class="mt-2 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">
                    <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="ml-1 menu-icon text-decoration" id="privacy">｢プライバシーポリシー｣</span>に同意します｡</label>
                </div>

{{--                <div class="mt-2 custom-control custom-radio">--}}
{{--                    <input type="radio" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">--}}
{{--                    <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="ml-1 menu-icon text-decoration" id="privacy">｢プライバシーポリシー｣</span>に同意します｡</label>--}}
{{--                </div>--}}

                <div class="mt-2 flex justify-content-center">
                    <button class="gray-btn-gradient background-gray mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white " id="btn_submit">仮登録する </button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>


            </div>
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
            var is_activity = false;
            $("#move_garden").click(function(event) {
                //window.history.back();
                window.location.href = home_path + '';
            });

            $("#btn_submit").click(function(event) {
                if(is_activity == true) {
                    window.location.href = home_path + '/question/complete';
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


            $("#privacy").click(function(event) {
                window.location.href = home_path + '/private';
            });
            $("#btn_back").click(function(event) {
                event.preventDefault();
                history.back();
                //window.location.href = 'http://example.com';
            });

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





        });
    </script>
@endsection
