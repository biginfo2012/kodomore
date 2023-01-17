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

        footer.page-footer{
            margin-top: 0 !important;
            position: absolute;
            width: 100%;
            top: calc(100vh - 23px);
        }




    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex pb-1 pt-0">
        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/fa-edit.png')}}"> パスワード設定
        </div>

        <div class="card-body py-1">

            <form class="needs-validation" novalidate id="register_form">
                {{csrf_field()}}
                <input type="hidden" id="user_id" value="{{$id}}">
                <input type="hidden" id="type" value="{{$type}}">
                <input type="hidden" id="email" value="{{$email}}">
                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        会員ID(メールアドレス)
                    </p>
                </div>
                <p  class="mt-1 text-small " name="email" >{{$email}}</p>

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        お送りした仮パスワードを入れてください
                    </p>

                </div>
                <div class="d-flex mt-1  justify-content-center">
                    <input  class="form-control text-small require"  placeholder="パスワード" name="code" id="code" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        新しくパスワードを設定してください<br>(半角英数字8〜32文字)
                    </p>

                </div>
                <div class="d-flex mt-1  justify-content-center">
                    <input  class="form-control text-small require" type="password" placeholder="パスワード(半角英数字8〜32文字)" id="password" name="password" required minlength="8" maxlength="32">
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <div class="d-flex mt-1  justify-content-center">
                    <input  class="form-control text-small require" type="password" placeholder="パスワード[確認用]半角英数字8〜32文字" id="confirm_password" name="confirm_password" required minlength="8" maxlength="32">
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <p class="mt-1 text-small">※ログイン時に使用します｡</p>

                <div class="py-1 mt-5">

                    <div class="mt-1 flex justify-content-center">
                        <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_register">会員登録する </button><i class="text-white fas fa-angle-right ml-1"></i>
                    </div>
                </div>
            </form>

        </div>





    </div>


@endsection

@section('footer_top')

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
                event.preventDefault();
                var forms = document.getElementById('register_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    //forms.submit();
                    var id = $('#user_id').val();
                    var code = $("#code").val();
                    var email =$("#email").val();
                    var password = $("#password").val();
                    var confirm_password = $("#confirm_password").val();
                    var url = home_path + "/ajax/register/modify-password";
                    if(password == confirm_password) {
                        $.ajax({
                            url:url,
                            type:'post',
                            data: {
                                id: id,
                                code: code,
                                email: email,
                                password: password,
                            },
                            success: function (response) {
                                if(response['status'] == true) {
                                    window.location.href = home_path + '/register/final';
                                } else {
                                    if(response['status'] == 'over'){
                                        alertify.error("24時間以上経過しされました｡\n" +
                                            "再登録してください｡");
                                    }else{
                                        alertify.error("失敗した登録");
                                    }
                                }
                            },
                            error: function () {
                            }
                        });
                    } else {

                    }

                }
                //window.location.href = 'http://example.com';
            });

        });
    </script>
@endsection
