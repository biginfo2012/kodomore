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

            <div class="card-body py-1 text-center mt-5 pt-5">
               <img src="{{asset('img/red-warn-board.png')}}">
                <p class="text-medium text-black p-1 mt-4">未登録もしくはお電話番号･IDが間違っている</p>
                <p class="text-medium text-black p-1">可能性があります｡<span class="text-decoration" id="back_forget" style="color: #31BCC7">再確認</span>していただくか</p>
                <p class="text-medium text-black p-1">お問合わせフォームにて<span class="text-decoration" id="question" style="color: #31BCC7">お問合わせ</span>ください｡</p>



            </div>








    </div>


@endsection

@section('footer_top')
@endsection


@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#question").click(function(event) {
                window.location.href = home_path + '/question';
                //window.location.href = 'http://example.com';
            });

            $('#back_forget').click(function () {
                window.location.href = home_path + '/forget';
            })
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
