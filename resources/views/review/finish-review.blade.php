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

        .border-title {
            border-top: 1px solid #808080;
            border-bottom: 1px solid #808080;
            border-right: 1px solid #808080;
            padding: 0.25rem !important;
        }

        .background-light-pink {
            background-color: #FFEBEF;
        }

        .background-light-sky {
            background-color: #ADE4E9;
        }



        .border-light-bottom {
            border-bottom: 2px solid #CCCCCC;
        }
    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p>ログイン > マイページ >  クチコミレビュー投稿 > 内容確認  > 完了</p>

        </div>

        <div class="card-body text-title px-2">
            <img class="height-4 img-icon mb-1" src="{{asset('img/black-message.png')}}"> クチコミレビューの投稿を完了
        </div>

        <div class="card-body py-1 text-center mt-4">
            <p class="text-title-large text-blue-1 p-1" style="font-family: YugoBold !important; color: #FF557E !important;">クチコミレビュー投稿を受付ました｡</p>
            <p class="text-medium-light text-black p-1">ご協力ありがとうございます｡<br>
                クチコミレビュー項目の反映には審査があり､<br>
                時間がかかる場合があります｡</p>
        </div>
        <div class="flex justify-content-center mx-3">
            <input type="hidden" id="garden_id" value="{{$garden_id}}">
            <button class="gray-btn-gradient mx-0 text-title-large btn btn-outline-default rounded waves-effect btn-full text-white text-height" id="btn_detail">投稿した園･学校ページへ </button><i class="text-white fas fa-angle-right ml-1"></i>
        </div>
        <p class="text-medium-light text-black p-1 mt-4 mx-3 mb-n2">クチコミレビューの編集･削除はマイページから</p>
        <div class="flex justify-content-center mx-3">
            <button class=" gray-btn-gradient mx-0 text-    title-large btn btn-outline-default rounded waves-effect btn-full text-white text-height" id="move_my_page">マイページへ</button><i class="text-white fas fa-angle-right ml-1"></i>
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
                //window.history.back();
                window.location.href = home_path + '';
            });

            $('#btn_detail').click(function () {
                event.preventDefault();
                var garden_id = $('#garden_id').val()
                window.location.href = home_path + '/school/detail/' + garden_id;
            })

            $("#move_my_page").click(function(event) {
                event.preventDefault();
                window.location.href = home_path + '/parent/my-page';
                //window.location.href = 'http://example.com';
            });



        });
    </script>
@endsection
