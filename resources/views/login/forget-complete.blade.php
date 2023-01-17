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

        footer.page-footer{
            margin-top: 0 !important;
            position: absolute;
            width: 100%;
            top: calc(100vh - 23px);
        }



    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex pb-0 pt-1">
        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/forget-icon.png')}}"> パスワードを忘れた場合
        </div>

        <form class="needs-validation" novalidate id="register_form" action="<?=url('/forget/modify');?>" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$id}}">
            <input type="hidden" name="mobile" value="{{$mobile}}">
            <input type="hidden" name="email" value="{{$email}}">
            <div class="card-body py-1 text-center mt-5">
                <p class="text-large-demi   text-pink p-0 mb-3" style="font-family: YugoBold !important;">送信を完了しました！</p>
                <p class="text-medium text-black p-0">ご入力いただいたメールアドレスに､</p>
                <p class="text-medium text-black p-0">再設定用URLと仮PWを送信いたします｡</p>
                <p class="text-medium text-black p-0">しばらくお待ちください｡</p>



            </div>
            <div class="card-body py-5 mb-5">


                <div class="mt-3 flex justify-content-center">
                    <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_add">パスワード設定する </button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>


            </div>
        </form>







    </div>


@endsection

@section('footer_top')
@endsection


@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });

            $("#btn_add").click(function(event) {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const id = urlParams.get('id');

                //window.location.href = 'http://example.com';
            });

            $("#move_high").click(function(event) {
                window.location.href = home_path + '/high';
                //window.location.href = 'http://example.com';
            });
        });
    </script>
@endsection
