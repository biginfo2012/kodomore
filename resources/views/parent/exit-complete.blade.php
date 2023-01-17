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
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p>ログイン > 会員情報･設定 > 退会する > 退会完了</p>
        </div>

        <div class="card-body text-title">
            <img class="height-2 img-icon pb-1" src="{{asset('img/exit.png')}}"> 退会する
        </div>

        <div class="card-body py-1 text-center mt-5">
            <p class="text-large-demi text-blue-1 p-1" style="font-family: YugoBold !important;">退会が完了しました｡</p>
            <p class="text-medium text-black p-1">ご利用ありがとうございました｡</p>
            <p class="text-medium text-black p-1 mt-3">いつでも再入会をお待ちしております｡</p>
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
