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
        <div class="card-header top-menu text-small-xs">
            <i class="fas fa-home menu-icon"></i> >  新規会員登録
        </div>
        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/fa-edit.png')}}"> 無料会員登録
        </div>

        <div class="card-body py-1">
            <p class="text-title background-pink text-white p-1">保護者の方について</p>
            <form class="needs-validation" novalidate id="register_form" action="<?=url('/register-confirm');?>" method="post">
                {{csrf_field()}}
                <div class="mt-2 d-flex justify-content-center ">
                    <input  class="form-control text-small require"  placeholder="保護者お名前(例：山田 太郎)" name="name" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>

                <div class="mt-2 d-flex justify-content-center ">
                    <input  class="form-control text-small require"  placeholder="保護者ふりがな(例：やまだ たろう)" name="second_name" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>

                <div class="mt-2 d-flex justify-content-center ">
                    <input  class="form-control text-small require"  placeholder="ニックネーム" name="account" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>
                <p class="mt-1 text-small">※ニックネームは口コミ投稿者名として表示されます｡</p>
                <div class="mt-2  d-flex align-items-center">
                    <div class="custom-control custom-radio  d-flex align-items-center">
                        <input type="radio" class="custom-control-input text-small" id="female" value="female" name="gender" required>
                        <label class="custom-control-label text-small" for="female">女性</label>
                    </div>

                    <!-- Default inline 2-->
                    <div class="ml-2 custom-control custom-radio d-flex align-items-center">
                        <input type="radio" class="custom-control-input text-small" id="male" value="male" name="gender" required>
                        <label class="custom-control-label text-small" for="male">男性</label>
                    </div>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>



                </div>

                <div class="mt-2 d-flex justify-content-center ">
                    <div class="d-flex require justify-content-center">
                        <input  class="form-control text-small  require"  placeholder="郵便番号(例：1234567)" name="post_code" required> <p class="ml-1 text-small mr-4">住所自動入力</p>
                    </div>

                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>

                <div class="mt-2 d-flex justify-content-center ">
                    <input  class="form-control text-small require"  placeholder="都道府県市区町村" name="city" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>

                <div class="mt-2 d-flex justify-content-center ">
                    <input  class="form-control text-small require"  placeholder="町名･番地･建物名" name="address" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>

                <div class="mt-2 d-flex justify-content-center ">
                    <input  class="form-control text-small require"  placeholder="電話番号〔携帯電話可〕(例09012345678)" name="mobile" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>

                <div class="mt-2 d-flex justify-content-center ">
                    <input  class="form-control text-small require"  placeholder="メールアドレス〔半角英数字〕" name="email" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>
                <p class="mt-1 text-small">※ログイン時のIDになります｡</p>
                <div class="mt-2 d-flex justify-content-center ">
                    <input  class="form-control text-small require"  placeholder="パスワード(半角英数字)" name="password" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 ">必須</p>
                </div>
            </form>

            <p class="mt-1 text-small">※ログイン時に使用します｡</p>
        </div>
        <div class="card-body py-1">

            <div class="mt-3 flex justify-content-center">
                <button class=" mx-0 btn btn-outline-default btn-rounded waves-effect btn-full btn-title text-white" id="btn_register">入力結果を確認する </button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>
            <div class="flex mt-3">
                <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" id="btn_garden">TOPにもどる </button><i class="text-blue fas fa-angle-left ml-1"></i>
                <img src="<?php echo e(asset('img/top.png')); ?>" class="img-top" id="move_top" style="bottom: -1.5rem">
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

            $("#btn_register").click(function(event) {
                var forms = document.getElementById('register_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    forms.submit();

                }
                //window.location.href = 'http://example.com';
            });

        });
    </script>
@endsection
