@extends('layouts.app')

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>

        .setting-text{
            position: absolute;
            bottom: 0;
            width: fit-content;
            right: 0;
        }

        .border-line{
            width: 100%;
            height: 1px;
            background: #ABABAB;
        }

        .change_text{
            border: 2px solid #F7931E;
            border-radius: 5px;
        }
        .field-icon {
            float: right;
            margin-left: -26px;
            margin-right: 6px;
            margin-top: 0;
            position: relative;
            z-index: 2;
        }

        .container{
            padding-top:50px;
            margin: auto;
        }

    </style>
@endsection

@section('content')
    <input type="hidden" id="user_id" value="{{$user->id}}">
    <input type="hidden" id="lpw" value="{{$lpw}}">
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> > <span
                id="move_my_page" class="top-title-tag">ログイン</span> > マイページ > 会員情報･設定
        </div>
        <div class="card" id="confirm_form">
            <div class="card-body position-relative">
                <div class="text-center text-change py-2 text-large mb-3 d-none" id="change_text">
                    <span class="change_text py-2 px-4">会員情報を変更しました</span>
                </div>
                <div class="text-center">
                    <p class="text-large">お名前</p>
                    <p class="text-title" id="name_area"><span id="first_name">{{$user->first_name}}</span><span id="second_name">{{$user->second_name}}</span>(<span id="first_name_huri">{{$user->first_name_huri}}</span><span id="second_name_huri">{{$user->second_name_huri}}</span>)</p>
                </div>
                <div class="text-center mt-1">
                    <img src="{{asset('img/modify_btn.png')}}" style="width: 50%; height: auto; cursor: pointer" id="modify_name">
                </div>
            </div>
            <div class="border-line">
            </div>
            <div class="card-body position-relative">
                <div class="text-center">
                    <p class="text-large">Eメールアドレス</p>
                    <p class="text-title" id="email">{{$user->email}}</p>
                </div>
                <div class="text-center mt-1">
                    <img src="{{asset('img/modify_btn.png')}}" style="width: 50%; height: auto; cursor: pointer" id="modify_mail">
                </div>
            </div>
            <div class="border-line">
            </div>
            <div class="card-body position-relative">
                <div class="text-center">
                    <p class="text-large">電話番号</p>
                    <p class="text-title" id="mobile">{{$user->mobile}}</p>
                </div>
                <div class="text-center mt-1">
                    <img src="{{asset('img/modify_btn.png')}}" style="width: 50%; height: auto; cursor: pointer" id="modify_mobile">

                </div>
            </div>
            <div class="border-line">
            </div>
            <div class="card-body position-relative">
                <div class="text-center">
                    <p class="text-large">現在のパスワード</p>
                    <p class="text-title" id="pw" style="line-height: 1.1;">
                       ＊＊＊＊＊＊＊＊＊＊                
                    </p>
                </div>
                <div class="text-center mt-1">
                    <img src="{{asset('img/modify_btn.png')}}" style="width: 50%; height: auto; cursor: pointer" id="modify_pw">

                </div>
            </div>
            <div class="border-line">
            </div>
            <div class="card-body position-relative">
                <div class="text-center">
                    <p class="text-normal" style="color: #333333">住所やお子様の情報など確認･変更はこちらから</p>
                </div>
                <div class="text-center mt-1 mb-5">
                    <img src="{{asset('img/modify_submit.png')}}" style="width: 80%; height: auto; cursor: pointer" id="btn_submit">
                </div>

                <label class="setting-text mr-3 mb-0">
                    <img src="{{asset('img/exit.png')}}" class="height-2 img-icon">
                    <a class="text-medium-xs menu-icon text-decoration" href="{{url('/parent/exit')}}">退会する</a>
                </label>
            </div>
        </div>
        <form class="needs-validation" name="modify" novalidate id="validation_form">
            {{csrf_field()}}
            <div class="card d-none" id="name_form">
                <div class="card-body position-relative">
                    <p class="text-title">名前を変更する</p>
                    <div class="mt-2 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            お名前
                        </p>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6 pr-1"><input class="form-control text-small require"  name="first_name" value="{{$user->first_name}}"></div>
                        <div class="col-6 pl-1"><input class="form-control text-small require"  name="second_name" value="{{$user->second_name}}"></div>
                    </div>

                    <div class="mt-3 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            お名前 フリガナ
                        </p>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6 pr-1"><input class="form-control text-small require"  name="first_name_huri" value="{{$user->first_name_huri}}"></div>
                        <div class="col-6 pl-1"><input class="form-control text-small require"  name="second_name_huri" value="{{$user->second_name_huri}}"></div>
                    </div>
                    <div class="mt-3 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            ニックネーム
                        </p>
                    </div>
                    <div class="row mt-1">
                        <div class="col-11"><input class="form-control text-small require"  name="nickname" value="{{$user->second_name_huri}}" placeholder="ニックネーム(15文字以内)(例： たろう)" maxlength="15"></div>
                    </div>
                    <div class="text-center mt-4">
                        <img src="{{asset('img/modify_btn.png')}}" style="width: 60%; height: auto; cursor: pointer" id="name_modify">
                    </div>
                </div>
            </div>
            <div class="card d-none" id="mail_form">
                <div class="card-body position-relative">
                    <p class="text-title">Eメールアドレスを変更する</p>
                    <p class="text-large-xs-medium text-3 ml-2">現在のEメールアドレス：</p>
                    <p class="text-large-xs-medium text-3 ml-2">
                        {{$user->email}}
                    </p>
                    <div class="mt-4 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            メールアドレス[半角英数字]
                        </p>
                    </div>
                    <input  class="mt-1 form-control text-small require" name="email" value="">
                    <p class="mt-1 text-small">※ログイン時のIDになります｡</p>

                    <div class="text-center mt-4">
                        <img src="{{asset('img/modify_btn.png')}}" style="width: 60%; height: auto; cursor: pointer" id="mail_modify">
                    </div>
                </div>
            </div>
            <div class="card d-none" id="mobile_form">
                <div class="card-body position-relative">
                    <p class="text-title">電話番号を変更する</p>
                    <p class="text-large-medium-xs text-3 ml-2">現在の電話番号：</p>
                    <p class="text-large-medium-xs text-3 ml-2">
                        {{$user->mobile}}
                    </p>
                    <div class="mt-4 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            電話番号(ハイフンなし)
                        </p>
                    </div>
                    <input  class="mt-1 form-control text-small require"  placeholder="" value="" name="mobile" type="number">
                    <p class="mt-1 text-small">※連絡がつきやすい電話番号をご記入ください｡</p>

                    <div class="text-center mt-4">
                        <img src="{{asset('img/modify_btn.png')}}" style="width: 60%; height: auto; cursor: pointer" id="mobile_modify">
                    </div>
                </div>
            </div>
            <div class="card d-none" id="pw_form">
                <div class="card-body position-relative">
                    <p class="text-title">パスワードを変更する</p>
                    <div class="mt-2 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            現在のパスワード
                        </p>

                    </div>
                    <div class="d-flex mt-1  justify-content-center">
                        <input class="form-control text-small require" name="code" id="code" type="password"><img src="{{asset('img/pw_hide.png')}}" toggle="#password-field" class="field-icon toggle-password" style="width:20px; height:16px;">
                    </div>

                    <div class="mt-2 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            新しくパスワードを設定してください
                        </p>

                    </div>
                    <div class="d-flex mt-1  justify-content-center">
                        <input  class="form-control text-small require" type="password" placeholder="パスワード(半角英数字8〜32文字)" id="password" name="password" minlength="8" maxlength="32"><img src="{{asset('img/pw_hide.png')}}" toggle="#password-field" class="field-icon toggle-password" style="width:20px; height:16px;">
                    </div>

                    <div class="d-flex mt-1  justify-content-center">
                        <input  class="form-control text-small require" type="password" placeholder="パスワード[確認用]半角英数字8〜32文字" id="confirm_password" name="confirm_password" minlength="8" maxlength="32"><img src="{{asset('img/pw_hide.png')}}" toggle="#password-field" class="field-icon toggle-password" style="width:20px; height:16px;">
                    </div>
                    <p class="mt-1 text-small">※ログイン時に使用します｡</p>
                    <div class="text-center mt-4">
                        <img src="{{asset('img/modify_btn.png')}}" style="width: 60%; height: auto; cursor: pointer" id="pw_modify">
                    </div>
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
            var img_path = $('#default_image_path').val();
            var name_change = false;
            var mobile_change = false;
            var mail_change = false;
            var pw_change = false;
            var pw = $('#code').val();
            $(".toggle-password").click(function() {

                
                var input = $(this).prev();
                if (input.attr("type") == "password") {
                    console.log(img_path)
                    $(this)[0].src = img_path + 'pw_show.png';
                    input.attr("type", "text");
                } else {
                    console.log(img_path)
                    $(this)[0].src = img_path + 'pw_hide.png';
                    input.attr("type", "password");
                }
            });
            $("#move_my_page").click(function(event) {
                window.location.href = home_path + '/parent/my-page';
                //window.location.href = 'http://example.com';
            });
            $('#modify_name').click(function () {
                $('#confirm_form').addClass('d-none');
                $('#name_form').removeClass('d-none');
            })
            $('#name_modify').click(function () {
                $('#name_form').addClass('d-none');
                $('#confirm_form').removeClass('d-none');
                if(name_change === true){
                    $('#name_area').addClass('text-change');
                    $('#change_text').removeClass('d-none');
                }
            })
            $('#modify_mobile').click(function () {
                $('#confirm_form').addClass('d-none');
                $('#mobile_form').removeClass('d-none');
            })
            $('#mobile_modify').click(function () {
                $('#mobile_form').addClass('d-none');
                $('#confirm_form').removeClass('d-none');
                if(mobile_change === true){
                    $('#mobile').addClass('text-change');
                    $('#change_text').removeClass('d-none');
                }
            })
            $('#modify_mail').click(function () {
                $('#confirm_form').addClass('d-none');
                $('#mail_form').removeClass('d-none');
            })
            $('#mail_modify').click(function () {
                $('#mail_form').addClass('d-none');
                $('#confirm_form').removeClass('d-none');
                if(mail_change === true){
                    $('#email').addClass('text-change');
                    $('#change_text').removeClass('d-none');
                }
            })
            $('#modify_pw').click(function () {
                $('#confirm_form').addClass('d-none');
                $('#pw_form').removeClass('d-none');
            })
            $('#pw_modify').click(function () {
                if(pw_change === true){
                    var old_pw = $('#code').val();
                    var password = $("#password").val();
                    var confirm_password = $("#confirm_password").val();
                    if(old_pw !== '' && password === confirm_password && password.length > 7){
                        $('#pw_form').addClass('d-none');
                        $('#confirm_form').removeClass('d-none');
                        $('#pw').addClass('text-change');
                        $('#change_text').removeClass('d-none');    
                        pw = password
                    }
                }
                else{
                    $('#pw_form').addClass('d-none');
                    $('#confirm_form').removeClass('d-none');
                }

            })

            $('[name="first_name"]').on('change', function () {
                var first_name = $(this).val();
                $('#first_name').text(first_name);
                name_change = true;
            })
            $('[name="second_name"]').on('change', function () {
                var second_name = $(this).val();
                $('#second_name').text(second_name);
                name_change = true;
            })
            $('[name="first_name_huri"]').on('change', function () {
                var first_name_huri = $(this).val();
                $('#first_name_huri').text(first_name_huri);
                name_change = true;
            })
            $('[name="second_name_huri"]').on('change', function () {
                var second_name_huri = $(this).val();
                $('#second_name_huri').text(second_name_huri);
                name_change = true;
            })

            $('[name="email"]').on('change', function () {
                var email = $(this).val();
                $('#email').text(email);
                mail_change = true;
            })

            $('[name="mobile"]').on('change', function () {
                var mobile = $(this).val();
                $('#mobile').text(mobile);
                mobile_change = true;
            })

            $('[name="password"]').on('change', function () {
                pw_change = true;
            })
            $('[name="confirm_password"]').on('change', function () {
                pw_change = true;
            })

            $("#btn_submit").click(function (event) {
                event.preventDefault();
                var forms = document.getElementById('validation_form');
                $('#password').val(pw);
                //forms.classList.add('was-validated');
                var form = $('form')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);
                var url = home_path + '/parent/modify-info';
                $.ajax({
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        console.log(data);
                        if(data.status == true){
                            alertify.success("更新成功");
                        }else if(data.status == 'pw'){
                            alertify.error("現在のパスワードが違います");
                        }
                        
                    }
                });
                //document.modify.submit();

            });



        });
    </script>
@endsection
