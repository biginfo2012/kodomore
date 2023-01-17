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



    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">  >  <span class="top-title-tag">保護者と生徒､スクールで公開情報を編集する </span> > 施設名
        </div>



        <form class="needs-validation" novalidate id="register_form">
            {{csrf_field()}}

            <div class="card-body py-1 text-center mt-5 px-2">
                <p class="text-large-demi   text-pink" style="font-family: YugoBold !important;">登録内容の編集･修正申請を</p>
                <p class="text-large-demi   text-pink pb-2" style="font-family: YugoBold !important;">受け取りました！</p>
                <p class="text-medium-light text-black">正確な情報記載へのご協力ありがとうございます｡</p>
                <p class="text-medium-light text-black">項目の反映には審査があり､時間がかかる</p>
                <p class="text-medium-light text-black">場合があります｡また､全ての項目が</p>
                <p class="text-medium-light text-black">反映されるとは限りません｡ご了承下さい｡</p>
            </div>
            <div class="card-body mb-5 pb-5 pt-1">


                <div class="mt-3 flex justify-content-center">
                    <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_add">マイページへ </button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>

{{--                <div class="mt-2 flex justify-content-center">--}}
{{--                    <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_add">トップページ </button><i class="text-white fas fa-angle-right ml-1"></i>--}}
{{--                </div>--}}


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
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            $("#btn_add").click(function(event) {
                // const queryString = window.location.search;
                // const urlParams = new URLSearchParams(queryString);
                // const id = urlParams.get('id');
                event.preventDefault();
                window.location.href = home_path + '/parent/my-page';
            });

            $("#move_high").click(function(event) {
                window.location.href = home_path + '/high';
                //window.location.href = 'http://example.com';
            });
        });
    </script>
@endsection
