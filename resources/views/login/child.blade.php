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

        .fa-plus-circle {
            position: absolute;
            left: 2em;
        }



    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header top-menu text-small-xs">
            <i class="fas fa-home menu-icon"></i> >   新規会員登録 > 登録内容確認 > 登録完了 > お子様の登録
        </div>
        <div class="card-body text-title">
            <img class="height-4 img-icon pb-1" src="{{asset('img/fa-edit.png')}}"> お子様の登録
        </div>

        <div class="card-body py-1">
            <p class="text-title background-pink text-white p-1">お子様について</p>
            <div class="mt-2 d-flex justify-content-center ">
                <input  class="form-control text-small require"  placeholder="お子様のお名前(例：山田 太郎)">
                <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
            </div>

            <div class="mt-2 d-flex justify-content-center ">
                <input  class="form-control text-small require"  placeholder="ふりがな(例：やまだ たろう)">
                <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
            </div>


            <p class="mt-1 text-small">※ニックネームは口コミ投稿者名として表示されます｡</p>
            <div class="mt-2  d-flex align-items-center">
                <div class="custom-control custom-radio  d-flex align-items-center">
                    <input type="radio" class="custom-control-input text-small" id="female" name="gender">
                    <label class="custom-control-label text-small" for="female">女性</label>
                </div>

                <!-- Default inline 2-->
                <div class="ml-2 custom-control custom-radio d-flex align-items-center">
                    <input type="radio" class="custom-control-input text-small" id="male" name="gender">
                    <label class="custom-control-label text-small" for="male">男性</label>
                </div>
                <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>



            </div>

            <p class="mt-2 text-small">■ お子様の生年月日</p>
            <div class="mt-1 d-flex justify-content-center ">
                <div class="d-flex require justify-content-center">
                    <div class="flex-1 d-flex"><input  class="form-control text-small "  placeholder=""><p class="text-small text-bottom">年</p></div>
                    <div class="ml-1 flex-1 d-flex"><input  class="form-control text-small "  placeholder=""><p class="text-small text-bottom">月</p></div>
                    <div class="ml-1 flex-1 d-flex"><input  class="form-control text-small "  placeholder=""><p class="text-small text-bottom">日</p></div>
                </div>

                <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
            </div>
            <p class="mt-1 text-small">※生年月日は口コミ投稿時に年齢として表示されます｡</p>

            <div class="mt-3 d-flex justify-content-center ">
                <div class="require">
                    <p class="text-medium">■ 在園･卒園されている園をお選びください</p>
                </div>

                <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
            </div>

            <input  class="mt-2 form-control text-small "  placeholder="選択した園が表示されます">
            <p class="mt-1 text-small">※選択した園の口コミを投稿することができます｡</p>



        </div>
        <div class="card-body py-1">
            <div class="flex mt-3">
                <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" id="btn_add">お子様情報を追加する </button><i class="text-blue fas fa-plus-circle ml-1"></i>
            </div>
            <div class="mt-3 flex justify-content-center">
                <button class=" mx-0 btn btn-outline-default btn-rounded waves-effect btn-full btn-title text-white" id="btn_register">入力結果を確認する </button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>
            <p class="text-small-xs">※お子様の情報はレビューには表示されませんのでご安心ください｡</p>
            <div class="flex mt-3">
                <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" id="btn_garden">TOPにもどる </button><i class="text-blue fas fa-angle-left ml-1"></i>
                <img src="<?php echo e(asset('img/top.png')); ?>" class="img-top" id="move_top" style="bottom: -1.5rem">
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
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            $("#move_ealer").click(function(event) {
                window.location.href = home_path + '/ealer';
                //window.location.href = 'http://example.com';
            });

            $("#move_high").click(function(event) {
                window.location.href = home_path + '/high';
                //window.location.href = 'http://example.com';
            });
        });
    </script>
@endsection
