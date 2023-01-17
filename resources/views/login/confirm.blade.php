@extends('layouts.app')

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



    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header top-menu text-small-xs">
            <i class="fas fa-home menu-icon"></i> >  新規会員登録 > 登録内容確認
        </div>
        <div class="card-body text-title">
            <img class="height-4 img-icon pb-1" src="{{asset('img/fa-edit.png')}}"> 登録内容確認
        </div>

        <div class="card-body py-1">

            <p class="text-title background-pink text-white p-1">保護者の方について</p>
            <form id="register_form">
                <div class="mt-2 ">
                    <label for="username" class="disabled background-gray w-100 p-1 text-small-xs">お名前</label>
                    <p class="text-small">{{$name}}</p>
                    <input type="hidden" name="name" value="{{$name}}">
                </div>

                <div class="mt-2 ">
                    <label for="username" class="disabled background-gray w-100 p-1 text-small-xs">ふりがな</label>
                    <p class="text-small">{{$second_name}}</p>
                    <input type="hidden" name="second_name" value="{{$second_name}}">
                </div>

                <div class="mt-2 ">
                    <label for="username" class="disabled background-gray w-100 p-1 text-small-xs">ニックネーム</label>
                    <p class="text-small">{{$account}}</p>
                    <input type="hidden" name="account" value="{{$account}}">
                </div>

                <div class="mt-2 ">
                    <label for="username" class="disabled background-gray w-100 p-1 text-small-xs">性別</label>
                    <input type="hidden" name="gender" value="{{$gender}}">
                    @if($gender == 'male')
                        <p class="text-small">男性</p>
                    @else
                        <p class="text-small">女性</p>
                    @endif
                </div>

                <div class="mt-2 ">
                    <label for="username" class="disabled background-gray w-100 p-1 text-small-xs">郵便番号(半角数字)</label>
                    <p class="text-small">{{$post_code}}</p>
                    <input type="hidden" name="post_code" value="{{$post_code}}">
                </div>

                <div class="mt-2 ">
                    <label for="username" class="disabled background-gray w-100 p-1 text-small-xs">住所</label>
                    <p class="text-small">{{$city.$address}}</p>
                    <input type="hidden" name="city" value="{{$city}}">
                    <input type="hidden" name="address" value="{{$address}}">
                </div>

                <div class="mt-2 ">
                    <label for="username" class="disabled background-gray w-100 p-1 text-small-xs">お電話番号</label>
                    <p class="text-small">{{$mobile}}</p>
                    <input type="hidden" name="mobile" value="{{$mobile}}">

                </div>

                <div class="mt-2 ">
                    <label for="username" class="disabled background-gray w-100 p-1 text-small-xs">メールアドレス(半角英数字)</label>
                    <p class="text-small">{{$email}}</p>
                    <input type="hidden" name="email" value="{{$email}}">
                </div>

                <div class="mt-2 ">
                    <label for="username" class="disabled background-gray w-100 p-1 text-small-xs">パスワード(半角英数字)</label>
                    <p class="text-small">{{$password}}</p>
                    <input type="hidden" name="password" value="{{$password}}">
                </div>
            </form>

        </div>
        <div class="card-body py-1">
            <div class="flex mt-3">
                <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" id="btn_back">内容を修正する </button><i class="text-blue fas fa-angle-left ml-1"></i>
            </div>
            <form class="needs-validation" novalidate id="agree_form" >
                <div class="mt-3 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input text-small" id="defaultUnchecked" required>
                    <label class="custom-control-label text-small" for="defaultUnchecked"><span class="menu-icon text-decoration">｢プライバシーポリシー｣</span>に同意します｡
                    </label>
                </div>
            </form>

            <div class="mt-3 flex justify-content-center">
                <button class=" mx-0 btn btn-outline-default btn-rounded waves-effect btn-full btn-title text-white" id="btn_register">会員登録する </button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>
            <div class="flex mt-3">
                <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" id="btn_garden">TOPにもどる </button><i class="text-blue fas fa-angle-left ml-1"></i>
                <img src="<?php echo e(asset('img/top.png')); ?>" class="img-top" id="move_top" style="bottom: -1.5rem">
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
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            $("#btn_register").click(function(event) {
                var forms = document.getElementById('agree_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var formData = $("#register_form").serialize();
                    var url = home_path + '/ajax/register';

                    $.ajax({
                        url:url,
                        type:'post',
                        data: formData,
                        dataType: "json",
                        success: function (response) {
                            if(response.status == false) {
                                alertify.error("登録に失敗しました");
                            } else {
                                alertify.success("登録成功");
                                var userId = response.id;
                                window.location.href = home_path + '/register-complete?id=' + userId;
                            }
                        },
                        error: function () {
                            alertify.error("登録に失敗しました");

                        }
                    });
                }
                //window.location.href = 'http://example.com';
            });

            $("#btn_back").click(function(event) {
                event.preventDefault();
                history.back();
                //window.location.href = 'http://example.com';
            });

            $("#move_high").click(function(event) {
                window.location.href = home_path + '/high';
                //window.location.href = 'http://example.com';
            });
        });
    </script>
@endsection
