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
            top: calc(100vh - 130px);
        }

    </style>
@endsection

@section('content')

    <div class="card">

        <div class="card-header title-background text-small-xs d-flex pb-0 pt-1">
        </div>

        <div class="card-body text-title">
            <i class="fa fa-question-circle"></i> 再設定完了
        </div>


        <div class="card-body py-1 text-center mt-5">
            <p class="text-large-demi   text-pink p-1" style="font-family: YugoBold !important;">パスワードを再設定いたしました</p>



        </div>
        <div class="card-body py-5 mb-5">


            <div class="flex mt-3">
                <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_top">マイページへ</button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>


        </div>








    </div>


@endsection

@section('footer_top')
@endsection


@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#btn_top").click(function(event) {
                window.location.href = home_path + '/login';
                //window.location.href = 'http://example.com';
            });

            $("#btn_add").click(function(event) {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const id = urlParams.get('id');

                //window.location.href = 'http://example.com';
            });

            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });
        });
    </script>
@endsection
