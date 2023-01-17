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

        .border-title {
            border-top: 1px solid #808080;
            border-bottom: 1px solid #808080;
            border-right: 1px solid #808080;
            padding: 0.25rem !important;
        }

        .background-light-pink {
            background-color: #FFEBEF;
        }

        .background-light-sky {
            background-color: #ADE4E9;
        }



        .border-light-bottom {
            border-bottom: 2px solid #CCCCCC;
        }
    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">会員ログイン･新規会員登録</span> > 新規会員登録</p>

        </div>

        <div class="card-body text-large-xs">
            <img id="icon_move_home" class="sand-timer img-icon pb-2" src="{{asset('img/sand-clock-icon.png')}}"><span class="border-title pb-1">3分でできる</span>  スクール会員無料登録
        </div>

        <div class="card-body pt-0 pb-1">
            <div class="text-medium-title">
                <ul class="progressbar d-flex p-0">
                    <li class="active">検索</li>
                    <li class="active">入力①</li>
                    <li class="active">入力②</li>
                    <li class="active">確認</li>
                    <li class="active">完了</li>
                </ul>
            </div>
        </div>


        <div class="card-body">
            <p class="p-3 text-title-large text-pink background-light-pink text-center rounded mb-3" style="font-size: 20px !important; background-color: #FFEBEF !important;">無料登録申請を送信しました</p>

            <p class="mt-2 text-medium-xs">無料登録申請送信後5分以内に､ご登録メールアドレス宛に【送信完了メール】が自動送信されます｡<br>
                完了メールが届かない場合は､メールの受信設定や迷惑メールフォルダをご確認の上､お問い合わせフォームよりお問い合わせください｡</p>

            <p class="mt-3 text-pink text-medium-title">申請後の流れ</p>

            <p class="mt-2 text-medium-xs">▶2〜3日以内に､<span class="text-pink text-medium-title">園･学校詳細ページ管理画面ログイン用のID･パスワードを､ご登録メールアドレス宛に送信</span>いたします｡</p>
            <p class="mt-2 text-medium-xs">▶ログインID･パスワードが届きましたら､園･学校情報の編集が可能となります｡園･学校会員会員画面よりログインし､ご利用ください</p>
            <p class="mt-2 text-medium-xs">※できるだけ迅速･円滑にご掲載いただけるよう努めさせていただきます｡また､詳細確認のため､ご連絡させていただくことがございます｡予めご了承ください｡</p>
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
                //window.history.back();
                window.location.href = home_path + '';
            });



        });
    </script>
@endsection
