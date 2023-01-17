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
        }
        .border-light-bottom {
            margin: 1.5rem 0rem 0.5rem 0;

            border-bottom: 2px solid #CCCCCC;
        }

        form:invalid button[type='submit']{
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }

        .text-dark-blue {
            color: #0098A2 !important;
        }

        .custom-control-label::before {
            top: 2.5px;
        }
        .custom-control-label::after {
            top: 2.5px;
        }
        .map-overlay:after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: 0;
            height: 0;
            border-top: solid 20px #FFEBEF;
            border-left: solid 10px transparent;
            border-right: solid 10px transparent;
        }


    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">会員ログイン･新規会員登録</span> > 新規会員登録</p>

        </div>

        <div class="card-body text-large-xs">
            <img id="icon_move_home" class="sand-timer img-icon pb-2" src="{{asset('img/sand-clock-icon.png')}}"><span class="border-title">3分でできる</span>  スクール会員無料登録
        </div>

        <div class="card-body pt-0">
            <div class="text-medium-title">
                <ul class="progressbar d-flex p-0">
                    <li class="active">検索</li>
                    <li class="active">入力①</li>
                    <li class="active">入力②</li>
                    <li>確認</li>
                    <li>完了</li>
                </ul>
            </div>
        </div>


        <form class="needs-validation" novalidate id="register_form" action="<?=url('/register/republic/confirm');?>" method="post">
            {{csrf_field()}}
            <input type="hidden" name="photo_attachment" id="photo_attachment" value="{{$photo_attachment}}">
            <p class="px-3 text-large-xs text-dark-blue">◆代表者情報</p>
            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        代表者名
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>


            </div>

            <div class="px-3 py-2">
                <div class="row mt-1">
                    <div class="col-6 pr-1"><input  class="form-control text-small require"  placeholder="姓(例：山田)" name="first_name" required></div>
                    <div class="col-6 pl-1"><input  class="form-control text-small require"  placeholder="名(例：太郎)" name="second_name" required></div>
                </div>


                <div class="row mt-1">
                    <div class="col-6 pr-1"><input  class="form-control text-small require"  placeholder="姓(例：ヤマダ)" name="first_name_huri" required></div>
                    <div class="col-6 pl-1"><input  class="form-control text-small require"  placeholder="名(例：タロウ)" name="second_name_huri" required></div>
                </div>
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        代表者携帯電話番号
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>


            </div>

            <div class="px-3 py-2">
                <input  class="mt-1 form-control text-small relate-modify require" name="mobile" placeholder="半角数字(ハイフンなし)" type="number" required>
            </div>

            <div class="border-light-bottom"></div>

            <p class="px-3 text-large-xs text-dark-blue">◆担当者情報</p>
            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        代表者名
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>


            </div>

            <div class="px-3 py-2">
                <div class="custom-control custom-checkbox text-medium-xs">
                    <input type="checkbox" class="custom-control-input keyword-detail text-medium-small"  id="contact_user" >
                    <label class="custom-control-label text-medium-small" for="contact_user">代表者と同じ</label>
                </div>
                <div class="row mt-1">
                    <div class="col-6 pr-1"><input  class="form-control text-small require"  placeholder="姓(例：山田)" name="contact_first_name" required></div>
                    <div class="col-6 pl-1"><input  class="form-control text-small require"  placeholder="名(例：太郎)" name="contact_second_name" required></div>
                </div>


                <div class="row mt-1">
                    <div class="col-6 pr-1"><input  class="form-control text-small require"  placeholder="姓(例：ヤマダ)" name="contact_first_name_huri" required></div>
                    <div class="col-6 pl-1"><input  class="form-control text-small require"  placeholder="名(例：タロウ)" name="contact_second_name_huri" required></div>
                </div>
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        担当職務
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
            </div>

            <div class="px-3 py-2">
                <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small require "  name="contact_type" required>
                    <option value="" selected disabled>選択してください</option>
                    <option value="1" >保育士</option>
                    <option value="2" >幼稚園教諭</option>
                    <option value="3" >管理栄養士</option>
                    <option value="4" >看護師</option>
                    <option value="5" >園長</option>
                    <option value="6" >オーナー</option>
                    <option value="7" >学校教員</option>
                    <option value="8" >学校運営者</option>
                    <option value="9" >学校広報</option>
                    <option value="10" >塾･スクール講師</option>
                    <option value="11" >塾･スクール運営者</option>

                </select>
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        担当者携帯電話番号
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>


            </div>

            <div class="px-3 py-2">
                <div class="custom-control custom-checkbox text-medium-xs">
                    <input type="checkbox" class="custom-control-input keyword-detail text-medium-small"  id="contact_mobile" >
                    <label class="custom-control-label text-medium-small" for="contact_mobile">代表者と同じ</label>
                </div>
                <input  class="mt-1 form-control text-small require "  name="contact_mobile" required placeholder="半角数字(ハイフンなし)" type="number">
                <p class="text-small-xs mt-1">
                    ※または連絡の取りやすい電話番号をご記入ください
                </p>
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        メールアドレス
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>


            </div>

            <div class="px-3 py-2">
                <input  class="mt-1 form-control text-small require" name="email" required placeholder="半角英数">
                <p class="text-small-xs mt-1">
                    ※管理画面ログイン用のID､パスワードを送信します
                </p>
            </div>

            <div class="border-light-bottom"></div>


            <div class="px-3 py-2">
                <p class="text-medium-xs">
                    お申込みの際は､必ず利用方法およびガイドラインの
                    スクール側をご確認の上､お申込みください｡
                </p>

                <div class="mt-2 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input require" id="radio_accept" name="radio_accept" value="1" required>
                    <label class="custom-control-label text-medium-xs" for="radio_accept"><span class="ml-1 menu-icon text-decoration" id="privacy">｢プライバシーポリシー｣</span>に同意します｡</label>
                </div>
            </div>

            <div class="mt-2 justify-content-center d-flex">
                <p class="position-relative text-medium-xs px-2 py-2 text-pink background-dark-pink map-overlay d-flex mb-0" ><label class="mb-0" style="margin-top: 4px">残りの必須項目数</label>　<label class="text-pink text-title-large-medium mb-0" id="require_count">0</label><label class="text-pink text-title-large-medium mb-0">/7</label></p>
            </div>
{{--            <div class="mt-2 justify-content-center d-flex">--}}
{{--                <p class="text-medium-xs px-2 py-2 text-pink background-light-pink">残りの必須項目数　</p>--}}
{{--                <p class="text-title-large-medium px-2 py-1 text-pink background-light-pink"><span id="require_count">0</span>/7</p>--}}
{{--            </div>--}}

            <div class="card-body text-center">
                <button type="submit" class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white px-0" style="width: 60%; border: none !important;" id="btn_next">入力内容の確認  </button>

            </div>
        </form>
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
            var sameName = false;
            var sameMobile = false;

            function changeContactName() {
                $("[name=contact_first_name]").val($("[name=first_name]").val());
                $("[name=contact_second_name]").val($("[name=second_name]").val());
                $("[name=contact_first_name_huri]").val($("[name=first_name_huri]").val());
                $("[name=contact_second_name_huri]").val($("[name=second_name_huri]").val());
            }
            function changeContactMobile() {
                $("[name=contact_mobile]").val($("[name=mobile]").val());
            }

            $("#contact_user").change(function() {
                if(this.checked) {
                    sameName = true;
                    changeContactName();
                } else {
                    sameName = false;
                }
                $("[name=contact_first_name]").prop( "disabled", sameName );
                $("[name=contact_second_name]").prop( "disabled", sameName );
                $("[name=contact_first_name_huri]").prop( "disabled", sameName );
                $("[name=contact_second_name_huri]").prop( "disabled", sameName );
            });
            $("#contact_mobile").change(function() {
                if(this.checked) {
                    sameMobile = true;
                    changeContactMobile();
                } else {
                    sameMobile = false;
                }
                $("[name=contact_mobile]").prop( "disabled", sameMobile );
            });

            function getRequiredCount() {
                var count = 7;
                if($("[name=first_name]").val().length > 0 && $("[name=second_name]").val().length > 0 && $("[name=first_name_huri]").val().length > 0 &&
                    $("[name=second_name_huri]").val().length > 0) {
                    count = count - 1;
                }

                if($("[name=mobile]").val().length > 0) {
                    count = count - 1;
                }

                if($("[name=contact_first_name]").val().length > 0 && $("[name=contact_second_name]").val().length > 0 && $("[name=contact_first_name_huri]").val().length > 0 &&
                    $("[name=contact_second_name_huri]").val().length > 0) {
                    count = count - 1;
                }

                if($("[name=contact_type]").val() > 0) {
                    count = count - 1;
                }



                if($("[name=contact_mobile]").val().length > 0 ) {
                    count = count - 1;
                }

                if($("[name=email]").val().length > 0 ) {
                    count = count - 1;
                }

                if($("[name=radio_accept]:checked").val() > 0 ) {
                    count = count - 1;
                }
                $("#require_count").text(count);
                return count;
            }

            $(".require").change(function() {
                var cnt = getRequiredCount();
                $("#require_count").text(cnt);
                if(sameName == true) {
                    changeContactName();
                }
                if(sameMobile == true){
                    changeContactMobile();
                }
            });



            $("#btn_next").click(function(event) {
                event.preventDefault();
                var forms = document.getElementById('register_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var obj = {};
                    var first_name = $("[name=first_name]").val();
                    obj['first_name'] = first_name;
                    var second_name = $("[name=second_name]").val();
                    obj['second_name'] = second_name;
                    var first_name_huri = $("[name=first_name_huri]").val();
                    obj['first_name_huri'] = first_name_huri;
                    var second_name_huri = $("[name=second_name_huri]").val();
                    obj['second_name_huri'] = second_name_huri;
                    var mobile = $("[name=mobile]").val();
                    obj['mobile'] = mobile;

                    var contact_first_name = $("[name=contact_first_name]").val();
                    obj['contact_first_name'] = contact_first_name;
                    var contact_second_name = $("[name=contact_second_name]").val();
                    obj['contact_second_name'] = contact_second_name;
                    var contact_first_name_huri = $("[name=contact_first_name_huri]").val();
                    obj['contact_first_name_huri'] = contact_first_name_huri;
                    var contact_second_name_huri = $("[name=contact_second_name_huri]").val();
                    obj['contact_second_name_huri'] = contact_second_name_huri;
                    var contact_type = $("[name=contact_type] option:selected" ).text();
                    obj['contact_type'] = contact_type;
                    var contact_type_index = $("[name=contact_type]").val();
                    obj['contact_type_index'] = contact_type_index;
                    var contact_mobile = $("[name=contact_mobile]").val();
                    obj['contact_mobile'] = contact_mobile;

                    var email = $("[name=email]").val();
                    obj['email'] = email;

                    localStorage.setItem('user', JSON.stringify(obj));
                    var photo_attachment = $("#photo_attachment").val();
                    localStorage.setItem('photo_attachment', photo_attachment);
                    forms.submit();

                }
                //window.location.href = 'http://example.com';
            });

            setTimeout(getRequiredCount, 500);

        });
    </script>
@endsection
