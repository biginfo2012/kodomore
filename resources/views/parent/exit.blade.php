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
            <p><span id="move_my_page" class="top-title-tag">ログイン </span> > <span id="move_setting" class="top-title-tag">会員情報･設定 </span> > 退会する</p>

        </div>

        <div class="card-body text-title">
            <img class="height-2 img-icon pb-1" src="{{asset('img/exit.png')}}"> 退会する
        </div>

        <div class="card-body py-1">
            <div class="background-lighter-gray text-center">
                <p class="text-medium-xs p-1 ">
                    注意事項
                </p>
            </div>
            <div class="mt-2 text-3 text-small">
                <p>･退会は取り消しができません｡<br>
                    ･退会後､現在ログイン中の会員PWではログインができなくなります｡<br>
                    ･イベント予約中やWEB出願中の場合､退会できません｡
                </p>
            </div>
            <div class="mt-4 background-lighter-gray text-center">
                <p class="text-medium-xs p-1 ">
                    退会理由
                </p>
            </div>
            <form class="needs-validation" name="complete" novalidate id="validation_form" method="post" action="{{url('/parent/exit/complete')}}">
                {{csrf_field()}}
                <div class="mt-2 justify-content-center">
                    <textarea class="form-control text-small" placeholder="退会理由を教えてください(必須)(1,000文字以内)" rows="4" name="limit-length" maxlength="1000" required></textarea>

                    {{--                <p class="text-small float-right">1/1000</p>--}}
                </div>
                <div class="position-relative">
                    <p class="text-small position-absolute" style="right: 0">
                        0 /1000</p>
                </div>
                <div class="mt-4 background-lighter-gray text-center">
                    <p class="text-medium-xs p-1 ">
                        コドモアは活用できましたか？
                    </p>
                </div>
                <div class="mt-3 custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="radio_accept_1" name="radio_reason" value="1" required>
                    <label class="custom-control-label text-medium-xs" for="radio_accept_1">とても活用できた</label>
                </div>
                <div class="mt-1 custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="radio_accept_2" name="radio_reason" value="2" required>
                    <label class="custom-control-label text-medium-xs" for="radio_accept_2">まあまあ活用できた</label>
                </div>
                <div class="mt-1 custom-control custom-radio" >
                    <input type="radio" class="custom-control-input" id="radio_accept_3" name="radio_reason" value="3" required>
                    <label class="custom-control-label text-medium-xs" for="radio_accept_3">あまり活用しなかった</label>
                </div>
                <div class="mt-1 custom-control custom-radio" >
                    <input type="radio" class="custom-control-input" id="radio_accept_4" name="radio_reason" value="4" required>
                    <label class="custom-control-label text-medium-xs" for="radio_accept_4">全く活用していない</label>
                </div>
                <div class="mt-1 custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="radio_accept_5" name="radio_reason" value="5" required>
                    <label class="custom-control-label text-medium-xs" for="radio_accept_5">どちらでもない</label>
                </div>
                <div class="mt-4 background-lighter-gray text-center">
                    <p class="text-medium-xs p-1 ">
                        退会手続きを行います｡よろしいですか？
                    </p>
                </div>
                <div class="mt-3 custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="radio_accept" name="radio_accept" value="1">
                    <label class="custom-control-label text-medium-xs" for="radio_accept">はい</label>
                </div>

                <div class="mt-4 flex justify-content-center">
                    <button type="submit" class="background-gray gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white " id="btn_submit" disabled>退会する</button><i class="text-white fas fa-angle-right ml-1"></i>
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
                var forms = document.getElementById('validation_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    document.complete.submit();
                }
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
