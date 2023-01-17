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
        }

        .background-light-pink {
            background-color: #FFEBEF;
        }

        .background-light-sky {
            background-color: #ADE4E9;
        }
        @media (min-width: 768px){
            .custom-control-label::before {
                top: 11px;
            }
            .custom-control-label::before {
                top: 11px;
            }
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
            <img id="icon_move_home" class="sand-timer pb-2" src="{{asset('img/sand-clock-icon.png')}}"><span class="border-title">3分でできる</span>  スクール会員無料登録
        </div>

        <div class="background-dark-pink card-body pt-2" >
            <p class="text-pink text-medium">無料編集ページをご用意しております｡</p>
            <p class="text-medium-xs">以下､フォームへのご記入で､当サイト『コドモア』への情報の無料編集と無料掲載の申請ができます｡お気軽にお申込みください｡</p>

            <div class="my-1 background-white p-3">

                <p class="text-pink text-medium-title">申請後の流れ</p>

                <p class="mt-2 text-medium-xs">▶申請後2〜3日以内に､<span class="text-pink text-medium-title">園･学校詳細ページ管理画面ログイン用のID･パスワードを､ご登録メールアドレス宛に送信</span>いたします｡</p>
                <p class="mt-2 text-medium-xs">▶お送りしたログインID･パスワードを使用し､会員管理画面より､園･学校情報を簡単に編集､登録いただけます｡</p>
                <p class="mt-2 text-medium-xs">※できるだけ迅速･円滑にご掲載いただけるよう努めさせていただきます｡また､詳細確認のため､ご連絡させていただくことがございます｡予めご了承ください｡</p>
                <p class="mt-2 text-medium-xs">◎有料会員プランについて</p>
                <p class="text-medium-xs">検索アルゴリズム､上位表示やより豊富で細やかな情報を編集できるページもご用意しております｡<span class="text-pink">会員管理画面より有料会員プランを確認することができます｡</span></p>
            </div>
        </div>
        <div class="card-body">
            <p class="text-medium-xs">当サイト｢コドモア｣に(一般会員とコドモア編集部)によって作成された無料掲載頁があるかどうか､検索バーより､
                サイト内検索をしてください｡園･学校関係者と確認出来次第､情報の加筆や削除依頼､また基本情報の上書き編集ができます｡</p>

            <div class="mt-1 form-inline d-flex justify-content-center md-form form-sm mt-0 pl-3 rounded overflow-hidden" style="border: 1px solid #333333">

                <input class="form-control form-control-sm flex-1 text-medium-xs border-0 mb-0 py-2" type="text" placeholder="施設名 サイト内検索"
                       aria-label="Search" id="txt_search">

                <div class="py-2 background-light-sky rounded" id="btn_search" style="padding-right: 12px !important; padding-left: 12px !important;">
                    <img class="img-icon1 img-icon" src="{{asset('img/search-icon.png')}}">
{{--                    <i class="fas fa-search text-white" aria-hidden="true"></i>--}}
                </div>

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
                //window.history.back();
                window.location.href = home_path + '';
            });



            $("#btn_search").click(function(event) {
                var search = $("#txt_search").val();

                window.location.href = home_path + '/register/republic/search?name=' + search;
                //window.location.href = 'http://example.com';
            });

        });
    </script>
@endsection
