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
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">   > お問合わせ
        </div>


        <div class="card-body py-1 text-center mt-5">
            <p class="mt-4 text-title-large  text-pink p-1">送信完了しました！</p>
            <p class="text-medium text-black p-1">ありがとうございます｡</p>
            <p class="text-medium text-black p-1">詳細はメールにて送らせていただきます｡</p>
                <p class="text-medium text-black p-1">しばらくお待ちください｡</p>

        </div>
        <div class="card-body py-1 mt-2">


            <div class="mt-3 flex justify-content-center">
                <button class=" gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_top">トップページへ </button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>

            <div class="mt-3 flex justify-content-center">
                <button class="{{session()->get(SESS_UID) ? '': 'background-gray'}} gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_mypage">マイページへ </button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>

        </div>




    </div>


@endsection

@section('footer_image')
    <img src="{{ asset('img/footer_2.png') }}" style="width: 100%">
@endsection


@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#btn_garden").click(function(event) {
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });

            $("#btn_top").click(function(event) {
                window.location.href = home_path;
                //window.location.href = 'http://example.com';
            });
            $("#btn_mypage").click(function(event) {
                window.location.href = home_path +'/parent/my-page';
                //window.location.href = 'http://example.com';
            });



            $("#move_high").click(function(event) {
                window.location.href = home_path + '/high';
                //window.location.href = 'http://example.com';
            });
        });
    </script>
@endsection
