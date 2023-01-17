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
        <div class="card-header title-background text-small-xs d-flex pt-1 pb-0">

        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/fa-edit.png')}}"> 登録完了
        </div>


        <div class="card-body py-1 text-center mt-5">
            <p class="text-large-demi   text-pink p-1" style="font-family: YugoBold !important;">会員登録が完了しました！</p>
            <p class="text-medium text-black p-1">ご登録ありがとうございます｡</p>



        </div>
        <div class="card-body mb-5 py-5 ">



{{--            <div class="mt-3 flex justify-content-center">--}}
{{--                <button class=" mx-0 btn btn-outline-default btn-rounded waves-effect btn-full btn-title text-white" id="btn_top">トップページへ </button><i class="text-white fas fa-angle-right ml-1"></i>--}}
{{--            </div>--}}
            <div class="mt-3 flex justify-content-center">
                <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_detail">マイページへ </button><i class="text-white fas fa-angle-right ml-1"></i>
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
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });

            $("#btn_top").click(function(event) {

                window.location.href = home_path + '/login';

            });
            $("#btn_detail").click(function (event) {
                window.location.href = home_path + '/parent/my-page';
            });
        });
    </script>
@endsection
