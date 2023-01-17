@extends('admin.layouts.app')

@section('title')

@endsection



@section('css4page')
    <style>

        body {
            padding: 0;
            background-color: #31BCC7;
        }
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

        /*.custom-checkbox .custom-control-label::before {*/
        /*    left: -1.5rem;*/
        /*}*/

        /*.custom-radio .custom-control-input:checked~.custom-control-label:before {*/
        /*    left: -1.5rem;*/
        /*}*/



        form:invalid button{
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }

        .background-light-gray{
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }

        .login-pane {
            max-width: 60%;
            padding: 4rem;
            background-color: white;
        }

        .background-light-sky {
            background-color: #A7EAE9 !important;
        }

        .custom-control-label::before {
            top: .5rem;
        }

        .custom-control-label::after {
            top: .5rem;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::after {
            background-size: 75%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23FF335A' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e");
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }

        .custom-radio .custom-control-input:checked~.custom-control-label::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='-4 -4 8 8'%3e%3ccircle r='4' fill='%2331BCC7'/%3e%3c/svg%3e");
        }

        .custom-radio .custom-control-input:checked~.custom-control-label:before {
            background-color: white;
            border: #adb5bd solid 1px;
        }

        .login-foot{
            position: absolute;
            bottom: 0;
            font-size: 20px !important;
        }
        main {
            position: relative;
             height: 100vh !important;
        }

    </style>
@endsection

@section('content')

    <div style="padding-top: 12vh" class="d-flex justify-content-center">
        <div class="login-pane">
            <img src="{{asset('img/admin_top.png')}}" class="w-100">
            <div class="text-center mt-3">
                <p class="text-pink text-menu">園･学校･スクール関係者の方はこちらのページを｢お気に入り(ブックマーク)｣に登録してください｡</p>
                <p class="text-pink text-menu">連続してパスワードを間違えるとログイン制限されますのでご注意ください｡</p>
            </div>

            <div class="mt-3 d-flex align-items-center">
                <p class="text-large-xs">ユーザーログイン</p>
                <p class="ml-2 text-small-xs" >User login</p>
            </div>
            <form class="needs-validation" id="login_form" >
                {{csrf_field()}}
                <div class="mt-2">
                    <div class="row">
                        <div class="col-3 text-small-xs d-flex align-items-center">ID(E-mail)</div>
                        <div class="col-9"><input type="text" class="form-control text-small-xs" id="email"></div>
                    </div>

            </div>

            <div class="mt-2">
                <div class="row">
                    <div class="col-3 text-small-xs d-flex align-items-center">password </div>
                    <div class="col-9"><input type="password" class="form-control text-small-xs" id="password"></div>
                </div>

            </div>

            <div class="mt-3 background-light-sky pl-3 py-1">
                <div class="custom-control custom-checkbox ">
                    <input type="checkbox" class="custom-control-input" id="save_password" >
                    <label class="custom-control-label text-small-xs" for="save_password">パスワードを保存　 save password</label>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="button" class="top-menu rounded-1 btn-save px-4 py-2 text-large-xs w-50 text-white" id="btn_login">ログイン</button>
            </div>

            </form>

            <div class="text-center mt-3 text-decoration text-small-xs menu-icon" style="font-size: 20px !important;">パスワードを忘れた方はこちら</div>




        </div>
        <div class="w-100 login-foot text-center p-4 background-white" style="font-size: 20px !important;">
            <p>Copyrightⓒ ad-kit. All Rights Reserved.   No reproduction without permission.</p>
        </div>
    </div>



@endsection



@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#btn_login").click(function() {
                var forms = document.getElementById('login_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var email = $("#email").val();
                    var password = $("#password").val();
                    var url = home_path + '/ajax/admin/login';
                    $.ajax({
                        url:url,
                        type:'post',
                        data: {
                            name: email,
                            password: password
                        },
                        dataType: "json",
                        success: function (response) {
                            if(response.status == false) {
                                alertify.error("ログインに失敗しました");
                            } else {
                                alertify.success("ログイン成功");
                                if(response.redirect_url !== undefined){
                                    console.log(response.redirect_url);
                                    window.location.href = home_path + '/' +response.redirect_url;
                                    return ;
                                }
                                window.location.href = home_path + '/admin/school/detail/';
                            }
                        },
                        error: function () {
                            alertify.error("ログインに失敗しました");
                        }
                    });
                }

            });

        });
    </script>
@endsection
