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
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">    <span class="top-title-tag">新規会員登録</span> > <span class="top-title-tag">登録内容確認</span> > 登録完了
        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon pb-1" src="{{asset('img/fa-edit.png')}}"> 申請内容確認
        </div>

        <form class="needs-validation" novalidate id="register_form" action="<?=url('/register/password');?>" method="post">
            {{csrf_field()}}

            <div class="card-body py-1 text-center mt-5">
                <p class="text-pink p-1" style="font-size: 20px; font-family: YugoBold !important;">申請内容の送信を完了しました！</p>
                <p class="text-medium text-black p-1">ご協力ありがとうございます｡</p>
                <p class="text-medium text-black p-1">登録申請の反映には審査があり､</p>
                <p class="text-medium text-black p-1">時間がかかる場合があります｡</p>
            </div>
            <div class="card-body py-1 mb-5 pb-5">


                <div class="mt-3 flex justify-content-center">
                    <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_add">マイページへ </button><i class="text-white fas fa-angle-right ml-1"></i>
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
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            $("#btn_add").click(function(event) {
                event.preventDefault();
                window.location.href = home_path + '/parent/my-page';
                // const queryString = window.location.search;
                // const urlParams = new URLSearchParams(queryString);
                // const id = urlParams.get('id');

                //window.location.href = 'http://example.com';
            });

            $("#move_high").click(function(event) {
                window.location.href = home_path + '/high';
                //window.location.href = 'http://example.com';
            });
        });
    </script>
@endsection
