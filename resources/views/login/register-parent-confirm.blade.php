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

        @media (min-width: 768px){
            .custom-control-label::before {
                top: 11.5px !important;
            }
            .custom-control-label::after {
                top: 11.5px !important;
            }
        }



    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex pt-1 pb-0">

        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/fa-edit.png')}}"> 登録内容確認
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
                    職業
                </p>
            </div>
            <p class="text-medium mt-1">{{$contact_type}}</p>

            @if(!empty($nickname))
                <div class="mt-2 background-light-gray">
                    <p class="text-small p-1">
                        ニックネーム
                    </p>
                </div>
                <p class="text-medium mt-1">{{$nickname}}</p>
            @endif

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
            <input type="hidden" name="contact_type" value="{{$contact_type}}">
            <input type="hidden" name="nickname" value="{{$nickname}}">
            <input type="hidden" name="type" value="parent">

            <div class="card-body py-1">
                <div class="flex mt-3">
                    <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" id="btn_back" style="border: 1px solid #216887 !important;">内容を修正する </button><i class="text-blue fas fa-angle-left ml-1"></i>
                </div>

                <div class="mt-2 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">
                    <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="menu-icon text-decoration" id="privacy">｢プライバシーポリシー｣</span>に同意します｡</label>
                </div>

                <div class="mt-2 flex justify-content-center mb-3">
                    <button class="gray-btn-gradient background-gray mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white " id="btn_submit">仮登録する </button><i class="text-white fas fa-angle-right ml-1"></i>
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
                if(is_activity === false) {
                    event.preventDefault();
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

            // function init() {
            //     var selected = $("input[name='radio_accept']:checked").val();
            //     if(selected > 0) {
            //         $("#btn_submit").removeClass("background-gray");
            //         is_activity = true;
            //     }
            // }
            //
            // init();

        });
    </script>
@endsection
