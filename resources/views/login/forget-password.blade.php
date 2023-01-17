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
            <img class="height-4 img-icon mb-1" src="{{asset('img/forget-icon.png')}}">パスワードを忘れた場合
        </div>

        <div class="card-body py-1">

            <p class="text-medium-xs">ご登録いただいております､お名前､登録電話番号､お客様ID(ご登録メールアドレス)を入力して送信してください｡登録メールアドレスにパスワード再設定用URLをお送りいたします｡</p>
            <p class="text-medium-xs">※パスワード再設定画面URLの有効期限は､メール配信後24時間になります｡</p>
            <form class="needs-validation" novalidate id="register_form" action="<?=url('/forget/complete');?>" method="post">
                {{csrf_field()}}


                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        お名前
                    </p>

                </div>
                <div class="d-flex mt-1  justify-content-center">
                    <input  class="form-control text-small require"  placeholder="例) 山田　太郎" name="name"  id="name" required>
                </div>

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        登録お電話番号
                    </p>

                </div>
                <div class="d-flex mt-1  justify-content-center">
                    <input  class="form-control text-small require"  placeholder="例) 09012345678" name="mobile" id="mobile"  required>
                </div>

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        お客様ID(ご登録メールアドレス)
                    </p>

                </div>
                <div class="d-flex mt-1  justify-content-center">
                    <input  class="form-control text-small require"  placeholder="" name="email" id="email" required>
                </div>



                <div class="py-1 mt-4">

                    <div class="mt-1 flex justify-content-center">
                        <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_register">送信する </button><i class="text-white fas fa-angle-right ml-1"></i>
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
                    var email = $('#email').val();
                    var url = home_path + "/ajax/check/user";
                    $.ajax({
                        url:url,
                        type:'post',
                        data: {
                            email: email
                        },
                        success: function (response) {
                            if(response['status'] == true) {
                                forms.submit();
                            } else {
                                window.location.href = home_path + '/forget-dismiss';
                                //alertify.error("ユーザーが存在します");
                            }
                        },
                        error: function () {
                        }
                    });

                }
                //window.location.href = 'http://example.com';
            });

        });
    </script>
@endsection
