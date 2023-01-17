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
        <div class="card-header title-background text-small-xs d-flex pl-3 pr-0">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">ログイン </span> > <span id="move_my_page" class="top-title-tag">マイページ </span> > イベント予約の確認 > キャンセルする</p>

        </div>

        <div class="card-body text-title">
            <img class="height-2 img-icon py-1 mt-n1" src="{{asset('img/cancel-event.png')}}">キャンセルする
        </div>

        <div class="card-body py-1 text-center mt-5">
            <p class="text-large-demi text-blue-1 p-1" style="font-family: YugoBold !important;">キャンセルが完了しました｡</p>
            <p class="text-medium text-black p-1">ご利用ありがとうございました｡</p>
        </div>
        <div class="mt-5 flex justify-content-center mx-3">
            <button class=" mx-0 btn btn-outline-default gray-btn-gradient rounded waves-effect btn-full btn-title text-white" id="btn_add">マイページへ </button><i class="text-white fas fa-angle-right ml-1"></i>
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
            $("#move_my_page").click(function(event) {
                window.location.href = home_path + '/parent/my-page';
                //window.location.href = 'http://example.com';
            });
            $("#move_setting").click(function(event) {
                window.location.href = home_path + '/parent/setting';
                //window.location.href = 'http://example.com';
            });

            $("#btn_add").click(function (event) {
                window.location.href = home_path + '/parent/my-page';
            });

        });
    </script>
@endsection
