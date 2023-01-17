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

        .background-gray{
            background-color: #C4C4C4 !important;
        }

        .custom-radio .custom-control-label::before {
            border-radius: 38%;
            top: 0.25rem;
        }
        .custom-radio .custom-control-label::after {
            top: 0.25rem !important;
        }

    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span id="move_my_page" class="top-title-tag">ログイン </span> > <span id="" class="top-title-tag">マイページ</span> > クチコミレビュー投稿削除申請する</p>

        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/delete-black.png')}}"> クチコミレビュー投稿削除申請する
        </div>

        <div class="card-body py-1">
            <div class="background-lighter-gray text-center">
                <p class="text-medium-xs p-1 ">
                    注意事項
                </p>
            </div>
            <div class="mt-2 text-3 text-small">
                <p>クチコミレビュー削除依頼された場合､当社判断により削除しない
                    場合がありますが､その際の事由もお応えしかねます｡<br>
                    あらかじめご了承ください｡
                </p>
            </div>
            <form class="needs-validation" name="complete" novalidate id="validation_form" method="post" action="{{url('/require/finish')}}">
                {{csrf_field()}}

                <input type="hidden" name="post_user_id" value="{{$post_user_id}}">
                <input type="hidden" name="review_id" value="{{$review_id}}">
                <input type="hidden" name="reason" value="{{$reason}}">


                <div class="mt-4 background-lighter-gray text-center">
                    <p class="text-medium-xs p-1 ">
                        削除申請依頼を送信します｡よろしいですか？
                    </p>
                </div>
                <div class="mt-2 custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">
                    <label class="custom-control-label text-medium-xs" for="radio_accept">はい</label>
                </div>

                <div class="mt-4 flex justify-content-center">
                    <button type="submit" class="background-gray gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_submit" disabled>削除申請を送信する</button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>
            </form>

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
            $("#move_my_page").click(function(event) {
                window.location.href = home_path + '/parent/my-page';
                //window.location.href = 'http://example.com';
            });
            $("#move_setting").click(function(event) {
                window.location.href = home_path + '/parent/setting';
                //window.location.href = 'http://example.com';
            });

            $("#btn_submit").click(function (event) {
                event.preventDefault();
                document.complete.submit();
            });

            $("[name='limit-length']").on('input', function () {
                var val = $(this).val();
                var length = val.length;
                var maxLength = $(this).attr('maxlength');
                $(this).parent().next().find('p').html(length + '/' + maxLength);
            })

            $('input[type=radio][name=radio_accept]').change(function() {
                $("#btn_submit").removeClass("background-gray");
                $('#btn_submit')[0].disabled = false;
            });

        });
    </script>
@endsection
