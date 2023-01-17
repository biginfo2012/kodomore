<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_csrf" content="{{csrf_token()}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_csrf_header" content="_token"/>
    <meta name="format-detection" content="telephone=no">
    @if(isset($garden))
        <meta name="garden_name_meta" content="{{$garden->garden_name}}">
        <meta name="garden_place_metas" content="{{$garden->prefecture_name}}">
    @endif



    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/alertify.min.js' )}}"></script>
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161447215-30"></script> -->
    @if(env('APP_ENV') == 'production')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-185747787-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-185747787-1');
    </script>
    @endif

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" href="{{ asset('favicon.jpg') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">
    <style>

        .btn-search {
            font-size: 1rem;
            font-weight: 800;
            background-color: #EA617C;
            {{--background-image: url("{{asset('img/top-search.png')}}");--}}
            border: 0px;
            background-repeat: round;
            color: white;
            padding: .6rem .4rem;
            border-radius: .5rem;
        }

        .box-shadow-none {
            box-shadow: none;
        }



        @font-face {
            font-family: YugoBold;
            src: url('{{ asset('fonts/YuGothic-Bold.otf') }}') format('opentype');
        }

        @font-face {
            font-family: YugoMedium;
            src: url('{{ asset('fonts/YuGothic-Medium.otf') }}') format('opentype');
        }

        @font-face {
            font-family: KosugiMaru;
            src: url('{{ asset('fonts/KosugiMaru-Regular.ttf') }}') format('truetype');
        }

        .txt-family-kosugi {
            font-family: KosugiMaru !important;
        }

        .nav-bar-custom{
            position: absolute;
            top: 100%;
            right: 0;
            background: #EFFAFB;
            width: 79%;
        }

        .scrollable {
            max-height: calc(100vh - 90px);
            overflow-y: scroll;
        }

        [name=move_list]{
            cursor: pointer !important
        }
        .star{
            cursor: pointer !important;
        }
        .help{
            cursor: pointer !important;
        }
        .more_detail{
            cursor: pointer !important;
        }
        .top-title-tag{
            cursor:pointer !important;
        }
        #previous{
            cursor: pointer !important;
        }
        #next{
            cursor: pointer !important;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">






    <!-- Fonts -->



    @yield('css4page')
    {{--    <link href="{{ asset('css/style_2.css') }}" rel="stylesheet">--}}
</head>
<body>

<div class="container" style="max-width: 750px; padding: 0px; position: relative">

    <header class="position-sticky w-100 background-white" id="top_header" style="z-index: 1100;">
        <p class="top-title text-small-xs pb-0" id="top_title">
            @yield('title')
        </p>
        @yield('nav')
    </header>



    <main>
        @yield('content')
    </main>


    <footer class="page-footer " style="margin-top: 2rem;">
        @if(!isset($login) || $login !== 'register')
            <div class="position-relative">
                <div class="footer-image">
                    <img src="{{asset('img/footer-image.png')}}">
                </div>
                <div class="position-absolute w-100 text-white" style="bottom: 0">
                    <div class="text-center py-2">
                        <p class="text-small-xs">運営：アドキットインフォケーション</p>
                    </div>

                    <div class="text-center py-1 d-none">
                        <p class="text-small-xs">KODOMOREプロデュース</p>
                        <p class="text-small-xs">株式会社アドキットインフォケーション</p>
                    </div>

                    <p class="footer-company w-100 text-center d-none">ｺドモアとは丨ブライ八シーポリシー丨お問合わせ</p>
                    <p class="footer-company w-100 text-center" style="margin-bottom: 7px !important; color: #216887 !important; font-size: 10px !important;">   <span id="move_contact" style="cursor:pointer;">コドモアとは</span><span class="px-0"></span>丨<span class="px-0"></span>
                        <span id="move_private" style="cursor:pointer;">プライバシーポリシー</span><span class="px-0"></span>丨<span class="px-0"></span>
                        <span id="move_question" style="cursor:pointer;">お問合わせ</span>丨<span class="px-0"></span>
                        <span id="move_ad" style="cursor:pointer;">広告掲載について</span></p>
                </div>

            </div>
        @endif


        <div class="text-center py-1 footer-company" style="background-color: #216887; font-size: 10px !important;">
            Copyright ©ad-kit.co,.ltd.  All Rights Reserved.
        </div>

    </footer>
    @yield('footer_top')


</div>





@yield('modal')
<input type="hidden" id="asset_path" value="<?=asset('');?>">
<input type="hidden" id="home_path" value="<?=url('/');?>">
<input id="default_image_path" type="hidden" value="<?=asset('img/');?>/"/>


<script>
    $(document).ready(function() {
        var token = $("meta[name='_csrf']").attr("content");
        var header = $("meta[name='_csrf_header']").attr("content");
        $('.top-title-tag').click(function () {
            console.log($(this)[0].textContent);
            if($(this)[0].textContent === '会員ログイン･新規会員登録'){
                location.href = home_path + '/login';
            }
            if($(this)[0].textContent === '新規会員登録'){
                window.history.back();
            }

        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });
        var home_path = $("#home_path").val();
        var default_image_path = $("#default_image_path").val();

        $(".navbar-menu").click(function(event) {
            //$("#navbarSupportedContent-4").toggle();
            if($(this)[0].getAttribute('aria-expanded')){
                $("#navbarSupportedContent-4").toggle('hide');
            }
            if($(this).find('.icon-menu').hasClass('d-none')){
                $(this).find('.icon-menu').removeClass('d-none')
                $(this).find('.x-icon').addClass('d-none')
                $("#move_top").removeClass("d-none");
            }
            else{
                $(this).find('.x-icon').removeClass('d-none')
                $(this).find('.icon-menu').addClass('d-none')
                $("#move_top").addClass("d-none");
            }
        });

        $(".navbar-login").click(function(event) {
            window.location.href = home_path + '/login';
        });

        $(".navbar-logout").click(function(event) {
            var url = home_path + '/logout';
            $.ajax({
                url:url,
                type:'get',
                data: {
                },
                success: function (response) {
                    alertify.success("成功ログアウト");
                    //window.location.reload();
                    window.location.href = home_path + '/login';
                },
                error: function () {
                }
            });
        });
        $(".navbar-my").click(function(event) {
            window.location.href = home_path + '/parent/my-page';
        });
        $(".navbar-garden").click(function(event) {
            window.location.href = home_path + '/garden';
        });
        $(".navbar-choose").click(function(event) {
            window.location.href = home_path + '/choose';
        });
        $(".navbar-procedure").click(function(event) {
            window.location.href = home_path + '/procedure';
        });
        $(".navbar-guide").click(function(event) {
            window.location.href = home_path + '/contact#terms';
        });
        $(".navbar-privacy").click(function(event) {
            window.location.href = home_path + '/private';
        });
        $(".navbar-question").click(function(event) {
            window.location.href = home_path + '/question';
        });

        $(".navbar-republic").click(function(event) {
            window.location.href = home_path + '/register/republic';
        });
        $("#move_garden").click(function(event) {
            window.location.href = home_path + '/';
            //window.location.href = 'http://example.com';
        });

        $("#move_top").click(function() {
            window.scrollTo(0, 0);
        });

        $(".title-kodomore").click(function () {
            window.location.href = home_path;
        })

        $("[name=collapsed]").click(function(event) {
            var aria_cotrol = $(this).attr('aria-controls');
            $("#" + aria_cotrol).toggle();
            var relate_icon = $(this).attr('relate-icon');
            if($("#" + relate_icon).hasClass("rotate")) {
                $("#" + relate_icon).removeClass("rotate");
            } else {
                $("#" + relate_icon).addClass("rotate");
            }
        });

        $("#move_contact").click(function(event) {
            window.location.href = home_path + '/contact';
        });

        $("#move_question").click(function(event) {
            window.location.href = home_path + '/question';
        });

        $("#move_private").click(function(event) {

            window.location.href = home_path + '/private';
        });

        $("#move_top").addClass("d-none");

        window.addEventListener("scroll", function(event) {
            var top = this.scrollY,
                left =this.scrollX;
            if(top <= 0) {
                $("#move_top").addClass("d-none");
                $("#top_title").removeClass("d-none");

                $("nav").addClass("box-shadow-none");

            } else {
                $("#move_top").removeClass("d-none");
                $("nav").removeClass("box-shadow-none");
                $("#top_title").addClass("d-none");
            }
        }, false);
    });

    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-161447215-30');



</script>
@yield('js4event')
</body>
</html>
