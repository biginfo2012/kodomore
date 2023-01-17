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

        .custom-control-label::before {
            top: .2rem !important;
            width: 1.2rem !important;
            height: 1.2rem !important;
        }
        .custom-control-label::after {
            top: .2rem !important;
            width: 1.2rem !important;
            height: 1.2rem !important;
        }

    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">{{$garden->prefecture_name}}の幼稚園､保育所</span> > <span
                    class="top-title-tag">園一覧</span>
                @foreach($garden -> typeList as $type)
                    > <span class="top-title-tag">{{$type->type_name}}</span>
                @endforeach

                > <span class="top-title-tag">{{$garden->garden_name}}</span>管理者に報告</p>

        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/forbidden.png')}}"> 管理者に報告
        </div>

        <div class="card-body py-1">
            <p class="text-title background-dark-blue text-white p-1 mt-0">報告内容(複数選択可)</p>

            <form class="needs-validation" name="complete" novalidate id="validation_form" method="post" action="{{url('/warn/finish')}}">
                {{csrf_field()}}

                <input type="hidden" name="review_id" value="{{$review_id}}">
                <input type="hidden" name="garden_id" value="{{$garden->garden_id}}">

                <div class="mt-3 custom-control custom-checkbox text-medium-light">
                    <input type="checkbox" class="custom-control-input" id="warn_1" name="warn_1" value="1">
                    <label class="custom-control-label text-large " for="warn_1">当該園(校)に関係のない投稿</label>
                </div>
                <div class="mt-1 custom-control custom-checkbox text-medium-light">
                    <input type="checkbox" class="custom-control-input" id="warn_2" name="warn_2" value="2">
                    <label class="custom-control-label text-large " for="warn_2">第三者が不快に思う表現</label>
                </div>
                <div class="mt-1 custom-control custom-checkbox text-medium-light">
                    <input type="checkbox" class="custom-control-input" id="warn_3" name="warn_3" value="3">
                    <label class="custom-control-label text-large " for="warn_3">短文での投稿</label>
                </div>
                <div class="mt-1 custom-control custom-checkbox text-medium-light">
                    <input type="checkbox" class="custom-control-input" id="warn_4" name="warn_4" value="4">
                    <label class="custom-control-label text-large " for="warn_4">暴力的･攻撃的または卑猥な表現</label>
                </div>
                <div class="mt-1 custom-control custom-checkbox text-medium-light">
                    <input type="checkbox" class="custom-control-input" id="warn_5" name="warn_5" value="5">
                    <label class="custom-control-label text-large " for="warn_5">荒らし行為</label>
                </div>
                <div class="mt-1 custom-control custom-checkbox text-medium-light">
                    <input type="checkbox" class="custom-control-input" id="warn_6" name="warn_6" value="6">
                    <label class="custom-control-label text-large " for="warn_6">法令や規約に違反する投稿</label>
                </div>
                <div class="mt-1 custom-control custom-checkbox text-medium-light">
                    <input type="checkbox" class="custom-control-input" id="warn_7" name="warn_7" value="7">
                    <label class="custom-control-label text-large " for="warn_7">個人に関する投稿</label>
                </div>
                <div class="mt-1 custom-control custom-checkbox text-medium-light">
                    <input type="checkbox" class="custom-control-input" id="warn_8" name="warn_8" value="8">
                    <label class="custom-control-label text-large " for="warn_8">宣伝･広告を目的とした投稿</label>
                </div>
                <div class="mt-1 custom-control custom-checkbox text-medium-light">
                    <input type="checkbox" class="custom-control-input" id="warn_9" name="warn_9" value="9">
                    <label class="custom-control-label text-large " for="warn_9">その他､運営上不適切と判断される投稿</label>
                </div>
                <div class="mt-3 background-lighter-gray text-left">
                    <p class="text-normal p-1 ">
                        報告内容の詳細をご記入ください
                    </p>
                </div>
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-small" placeholder="" rows="5" name="limit-length" maxlength="1000" required></textarea>

                    {{--                <p class="text-small float-right">1/1000</p>--}}
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute" style="right: 0">
                        0 /1000</p>
                </div>

                <div class="mt-4 flex justify-content-center">
                    <button type="submit" class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_submit" disabled><img class="height-2 img-icon pb-1 pr-1" src="{{asset('img/notify.png')}}">削除依頼を送信する</button><i class="text-white fas fa-angle-right ml-1"></i>
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

            $('input[type=checkbox]').change(function() {
                $("#btn_submit").removeClass("background-gray");
                $('#btn_submit')[0].disabled = false;
            });

        });
    </script>
@endsection
