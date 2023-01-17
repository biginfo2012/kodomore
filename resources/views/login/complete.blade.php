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
        <div class="card-header title-background text-small-xs d-flex pt-1 pb-0">

        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/fa-edit.png')}}"> 登録内容送信
        </div>

        <form class="needs-validation" novalidate id="register_form" action="<?=url('/register/password');?>" method="post">
            {{csrf_field()}}
            <input type="hidden" name="type" value="{{$type}}">
            <input type="hidden" name="user_id" value="{{$id}}">
            <input type="hidden" name="email" value="{{$email}}">
            <div class="card-body py-1 text-center mt-5">
                <p class="text-large-demi text-pink p-1" style="font-size: 20px !important; font-family: YugoBold !important;">登録内容の送信を完了しました！</p>
                <p class="text-medium-light text-black p-1">ご入力いただいたメールアドレスに､<br>
                    本登録用URLと仮PWを送信いたします｡<br>
                    しばらくお待ちください｡</p>
                <div class="row text-center p-1">
                    <p class="text-3 text-medium-xs py-3 w-100" style="background-color: #EAEAEA; border-radius:5px !important">完了メールが届かない場合は､メールの受信設定や<br>
                        迷惑メールフォルダをご確認の上､<br>
                        お問い合わせフォームよりお問い合わせください｡
                    </p>
                </div>

            </div>
            <div class="card-body pb-1 mt-0 pt-3">
                <div class="mt-3 flex justify-content-center">
                    <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_add">{{$type == 'parent' ? '設定＆登録画面へ' : 'パスワード設定する'}}</button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>
            </div>
        </form>
    </div>


@endsection

@section('footer_top')

@endsection


@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            var type = $('[name="type"]').val();
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });
            $('#register').click(function () {
                window.location.href = home_path + '/register/' + type;
            })

            $('#confirm').click(function () {
                window.history.back();
            })

            $("#btn_add").click(function(event) {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const id = urlParams.get('id');

                //window.location.href = 'http://example.com';
            });

            $("#move_high").click(function(event) {
                window.location.href = home_path + '/high';
                //window.location.href = 'http://example.com';
            });
        });
    </script>
@endsection
