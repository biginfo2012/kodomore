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

    <title>KODOMORE(コドモア)は､みんなでつくる幼稚園･保育所､小･中学･高校受験とクチコミ情報</title>
    <meta name="description" content="0〜18歳までの子供達の育ちを応援するKODOMORE(コドモア)は､幼稚園･保育所の入園準備や､小･中学･高校受験や学校生活の情報を､編集部､学校サイド､一般ユーザーが自由編集して構築する教育ポータル｡保護者や先生､そして生徒本人による学校評価やクチコミレビューも｡教科毎の学習方法や無料プリントダウンロードあり｡リアルな受験偏差値もどんどん公開！"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.qrcode.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/alertify.min.js' )}}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161447215-30"></script>



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



        @font-face {
            font-family: YugoBold;
            src: url('{{ asset('fonts/YuGothic-Bold.otf') }}') format('opentype');
        }

        @font-face {
            font-family: YugoMedium;
            src: url('{{ asset('fonts/YuGothic-Medium.otf') }}') format('opentype');
        }

        body {
            background: #F2F2F2;
            margin: 0;
            font-family: "Open Sans", Helvetica Neue, Helvetica, Arial, sans-serif;
            padding-left: 240px;
        }
        main {
            position: relative;
            /*height: 100vh;*/
        }

        .menu-border {
            width: 100%;
            height: 2px;
            background-color: #E4E4E4;
        }

        .menu-child-border {
            width: 100%;
            height: 0px;
            border-top: 1px dashed #7AA4B7;
        }

        .logout {
            border-radius: 10px;
            border: 1px solid white;
            width: fit-content;
        }

        .fa-search {
            color: #808080;
        }

        .form-inline {
            background-color: white;
        }

        .text-menu {
            font-size: 18px;
            font-family: YugoBold;
        }

        .text-menu-small {
            font-size: 16px;
            font-family: YugoMedium;
        }

        .text-menu-user {
            font-size: 20px;
            font-family: YugoMedium;
        }

        .text-top-title {
            font-size: 40px;
            font-family: YugoBold;
        }
        main .helper {
            background: rgba(0, 0, 0, 0.2);
            color: #ffea92;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate3d(-50%, -50%, 0);
            padding: 1.2em 2em;
            text-align: center;
            border-radius: 20px;
            font-size: 2em;
            font-weight: bold;
        }
        main .helper span {
            color: rgba(0, 0, 0, 0.2);
            font-size: 0.4em;
            display: block;
        }
        .menu {
            background: #31BCC7;
            height: 100vh;
            width: 240px;
            position: fixed;
            left: 0;
            z-index: 1001;
            outline: none;
        }
        .menu .avatar {

            padding: 2em 0.5em;
            text-align: center;
        }
        .menu .avatar img {
            width: 120px;

            overflow: hidden;
            background-color: white;
            box-shadow: 0 0 0 10px rgba(255,255,255,1),0 0 0 13px rgba(0, 0, 0, 0.08);
        }
        .menu .avatar h2 {
            font-weight: normal;
            margin-bottom: 0;
        }
        .menu ul {
            list-style: none;
            padding: 0.5em 0;
            margin: 0;
        }
        .background-menu {
            display: flex;
            align-items: center;
            position: relative;
            background-color: #0098A2;
            font-size: 0.95em;
            font-weight: regular;

            transition: all 0.15s linear;
            cursor: pointer;
            border-left: 10px solid #216887;
        }

        .background-sub-menu {
            background-color: #5AC9D2;
            font-size: 0.95em;
            font-weight: regular;
            background-repeat: no-repeat;
            background-position: left 8px center;
            background-size: auto 24px;
            transition: all 0.15s linear;
            cursor: pointer;
        }

        .text-menu {
            /*color: black;*/
            padding: 0 0 0 2.5em;
        }

        .background-child-menu {
            background-color: #D6F2F4;
            font-size: 0.95em;
            font-weight: regular;
            background-repeat: no-repeat;
            background-position: left 20px center;
            background-size: auto 12px;
            transition: all 0.15s linear;
            cursor: pointer;
            background-image: url({{asset('img/menu/icon_child.png')}});
        }

        .background-child-menu.active {
            background-color: white;
        }

        .background-sub-menu.active {
            /*border-left: 10px solid #236888;*/
            background-color: #FF557E;
            color: white !important;
        }

        .background-menu {
            background-repeat: no-repeat;
            background-position: left 8px center;
            background-size: 28px 28px;
        }

        .background-sub-menu.active:before {
            position: absolute;
            margin-top: -16px;
            left: calc(100% - 18px);
            display: inline-block;
            border-top-width: 28px;
            border-top-style: solid;
            border-top-color: #5AC9D2;
            border-right: 0px solid transparent;
            border-left: 18px solid transparent;
            border-bottom: 28px solid #5AC9D2;
            content: " ";
        }
        .icon-home {
            background-image: url({{asset('img/menu/home_icon.png')}});
        }
        .icon-edit {
            background-image: url({{asset('img/menu/detail-edit-icon.png')}});
        }
        .icon-blog {
            background-image: url({{asset('img/menu/blog-icon.png')}});
        }
        .icon-event {
            background-image: url({{asset('img/menu/event-icon.png')}});
        }
        .icon-snap{
            background-image: url({{asset('img/menu/snap-icon.png')}});
        }
        .icon-setting{
            background-image: url({{asset('img/menu/setting-icon.png')}});
        }
        .icon-communication {
            background-image: url({{asset('img/menu/communication-icon.png')}});
        }
        .icon-deposit {
            background-image: url({{asset('img/menu/icon_deposit.png')}});
        }
        .icon-feature {
            background-image: url({{asset('img/menu/icon_feature.png')}});
        }
        .icon-annual {
            background-image: url({{asset('img/menu/icon_annual.png')}});
        }
        .icon-24 {
            background-image: url({{asset('img/menu/icon_24.png')}});
        }
        .icon-route {
            background-image: url({{asset('img/menu/icon_route.png')}});
        }
        .icon-recipe {
            background-image: url({{asset('img/menu/icon_recipe.png')}});
        }
        .icon-relate {
            background-image: url({{asset('img/menu/icon_relate.png')}});
        }

        .icon-edit-detail {
            background-image: url({{asset('img/menu/detail-register-icon.png')}});
        }

        .icon-edit-faq {
            background-image: url({{asset('img/menu/detail-question-icon.png')}});
        }

        .icon-media{
            background-image: url({{asset('img/menu/detail-media-icon.png')}});
        }
        .icon-search{
            background-image: url({{asset('img/menu/detail-search-icon.png')}});
        }
        .icon-schedule{
            background-image: url({{asset('img/menu/detail-schedule-icon.png')}});
        }

        .icon-edit-image {
            background-image: url({{asset('img/menu/detail-img-icon.png')}});
        }

        .icon-edit-message {
            background-image: url({{asset('img/menu/icon_edit_message.png')}});
        }

        .icon-edit-request {
            background-image: url({{asset('img/menu/icon_edit_request.png')}});
        }

        .icon-edit-story {
            background-image: url({{asset('img/menu/icon_edit_story.png')}});
        }

        .icon-edit-basic {
            background-image: url({{asset('img/menu/detail-main-icon.png')}});
        }
        .icon-food {
            background-image: url({{asset('img/menu/detail-food-icon.png')}});
        }

        .icon-edit-guide {
            background-image: url({{asset('img/menu/icon_edit_guide.png')}});
        }

        .menu ul li:focus {
            outline: none;
        }

        nav::-webkit-scrollbar {
            background: #E6E6E6;
            width: 12px;
        }



        /* Handle */
        nav::-webkit-scrollbar-thumb {
            background: #90CBCC;
            border-radius: 6px;
        }

        body::-webkit-scrollbar {
            background: #E6E6E6;
            width: 12px;
        }



        /* Handle */
        body::-webkit-scrollbar-thumb {
            background: #90CBCC;
            border-radius: 6px;
        }



        @media screen and (max-width: 900px) and (min-width: 400px) {
            body {
                /*padding-left: 90px;*/
            }
            .menu {
                /*width: 90px;*/
            }
            .menu .avatar {
                padding: 0.5em;
                position: relative;
            }
            .menu .avatar img {
                width: 60px;
            }
            .menu .avatar h2 {
                opacity: 0;
                position: absolute;
                top: 50%;
                left: 100px;
                margin: 0;
                min-width: 200px;
                border-radius: 4px;
                background: rgba(0, 0, 0, 0.4);
                transform: translate3d(-20px, -50%, 0);
                transition: all 0.15s ease-in-out;
            }
            .menu .avatar:hover h2 {
                opacity: 1;
                transform: translate3d(0px, -50%, 0);
            }
            .menu ul li {
                /*height: 60px;*/
                /*background-position: center center;*/
                /*background-size: 30px auto;*/
                /*position: relative;*/
            }
            .menu ul li span {
                /*opacity: 0;*/
                /*position: absolute;*/
                /*background: rgba(0, 0, 0, 0.5);*/
                /*padding: 0.2em 0.5em;*/
                /*border-radius: 4px;*/
                /*top: 50%;*/
                /*left: 80px;*/
                /*transform: translate3d(-15px, -50%, 0);*/
                /*transition: all 0.15s ease-in-out;*/
            }
            .menu ul li span:before {
                /*content: "";*/
                /*width: 0;*/
                /*height: 0;*/
                /*position: absolute;*/
                /*top: 50%;*/
                /*left: -5px;*/
                /*border-top: 5px solid transparent;*/
                /*border-bottom: 5px solid transparent;*/
                /*border-right: 5px solid rgba(0, 0, 0, 0.5);*/
                /*transform: translateY(-50%);*/
            }
            .menu ul li:hover span {
                /*opacity: 1;*/
                /*transform: translate3d(0px, -50%, 0);*/
            }
        }
        @media screen and (max-width: 400px) {
            body {
                padding-left: 0;
            }
            .menu {
                width: 230px;
                box-shadow: 0 0 0 100em rgba(0, 0, 0, 0);
                transform: translate3d(-230px, 0, 0);
                transition: all 0.3s ease-in-out;
            }
            .menu .smartphone-menu-trigger {
                width: 40px;
                height: 40px;
                position: absolute;
                left: 100%;
                background: #5bc995;
            }
            .menu .smartphone-menu-trigger:before,
            .menu .smartphone-menu-trigger:after {
                content: "";
                width: 50%;
                height: 2px;
                background: #fff;
                border-radius: 10px;
                position: absolute;
                top: 45%;
                left: 50%;
                transform: translate3d(-50%, -50%, 0);
            }
            .menu .smartphone-menu-trigger:after {
                top: 55%;
                transform: translate3d(-50%, -50%, 0);
            }
            .menu ul li {
                padding: 1em 1em 1em 3em;
                font-size: 1.2em;
            }
            .menu:focus {
                transform: translate3d(0, 0, 0);
                box-shadow: 0 0 0 100em rgba(0, 0, 0, 0.6);
            }
            .menu:focus .smartphone-menu-trigger {
                pointer-events: none;
            }




        }

        .logout {
            cursor: pointer;
        }

        .title-kodomore {
            cursor: pointer;
        }


    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Fonts -->



    @yield('css4page')
    {{--    <link href="{{ asset('css/style_2.css') }}" rel="stylesheet">--}}
</head>
<body>


    <header class="w-100 background-white">
        @yield('nav')
    </header>

    <main >
        @yield('content')
    </main>


</div>


@yield('modal')
<input type="hidden" id="asset_path" value="<?=asset('');?>">
<input type="hidden" id="home_path" value="<?=url('');?>">
<input id="default_image_path" type="hidden" value="<?=asset('img/');?>/"/>


<script>
    //var home_path = $("#home_path").val();
    var home_path = {!! json_encode(url('')) !!};

    var tab_name = $('#tab_name').val();
    var name;
    var exitPage = function (next_name) {
        var url = home_path + '/admin/school/' + next_name;
        window.location.href = url;
        //window.location.replace(url);
    }

    $('#qr-code').qrcode({
        width: 128,
        height: 128,
        text: home_path + '/test/admin/school/' + tab_name
    });
    $('#campaign_url').on('change', function () {
        var url = $(this).val();
        $('#qr-code').html('');
        $('#qr-code').qrcode({
            width: 128,
            height: 128,
            text: home_path + 'test/admin/school/' + tab_name
        });

    })

    $(document).ready(function () {
        //$("[name=collapsed]").trigger('click')
        var token = $("meta[name='_csrf']").attr("content");
        var header = $("meta[name='_csrf_header']").attr("content");

        $("#move_top").addClass("d-none");

        $(".navbar-logout").click(function(event) {
            var url = home_path + '/admin/logout';
            $.ajax({
                url:url,
                type:'get',
                data: {
                },
                success: function (response) {
                    alertify.success("成功ログアウト");
                    window.location.reload();
                },
                error: function () {
                }
            });
        });

        $('.title-kodomore').click(function() {
            window.location.href = (home_path);
        });

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


        if (tab_name) {
            var tab = 'li[name="' + tab_name + '"]';
            $(tab).addClass('active');
            $(tab).parent().parent().prev().find('.background-menu')
            var aria_cotrol = $(tab).parent().parent().prev().find('.background-menu').attr('aria-controls');
            $("#" + aria_cotrol).toggle();
            var relate_icon =$(tab).parent().parent().prev().find('.background-menu').attr('relate-icon');
            if ($("#" + relate_icon).hasClass("fa-plus")) {
                $("#" + relate_icon).addClass("fa-minus");
                $("#" + relate_icon).removeClass("fa-plus");
            } else if ($("#" + relate_icon).hasClass("fa-minus")) {
                $("#" + relate_icon).addClass("fa-plus");
                $("#" + relate_icon).removeClass("fa-minus");
            }
            if(tab_name === 'detail' || tab_name ==='tag' || tab_name === 'meta'){
                $('.background-sub-menu')[0].classList.add('active');
            }
            else if(tab_name === 'media-list'){
                $('.background-sub-menu')[2].classList.add('active');
            }
            else if(tab_name.includes('faq')){
                $('.background-sub-menu')[9].classList.add('active');
            }
            else if(tab_name.includes('main') || tab_name.includes('price')){
                $('.background-sub-menu')[5].classList.add('active');
            }
            else if(tab_name.includes('basic')){
                $('.background-sub-menu')[10].classList.add('active');
            }
            else{
                $('.background-sub-menu')[1].classList.add('active');
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });


        $('li').click(function () {
            name = $(this)[0].getAttribute('name');
            if (name !== 'null') {
                if (tab_name !== name) {
                    //var url = home_path +'/admin/school/' + name
                    is_Exit(name);
                    //window.location.replace(url);
                }
            }

            // if(name !== null){
            //
            // }
        })


        $("[name=collapsed]").click(function (event) {
            var aria_cotrol = $(this).attr('aria-controls');
            $("#" + aria_cotrol).toggle();
            var relate_icon = $(this).attr('relate-icon');
            if ($("#" + relate_icon).hasClass("fa-plus")) {
                $("#" + relate_icon).addClass("fa-minus");
                $("#" + relate_icon).removeClass("fa-plus");
            } else if ($("#" + relate_icon).hasClass("fa-minus")) {
                $("#" + relate_icon).addClass("fa-plus");
                $("#" + relate_icon).removeClass("fa-minus");
            }
        });

        // $(".background-child-menu").click(function (event) {
        //
        //     $(".background-child-menu").each(function () {
        //         $(this).removeClass('active');
        //     });
        //     $(this).addClass('active');
        // });

        // $(".background-menu").click(function (event) {
        //     if ($(this).hasClass('active')) {
        //         $(".background-menu").each(function () {
        //             $(this).removeClass('active');
        //         });
        //     } else {
        //         $(".background-menu").each(function () {
        //             $(this).removeClass('active');
        //         });
        //         $(this).addClass('active');
        //     }
        //
        //
        // });

    });

    $(window).ready(function() {
        //alert("window load occurred!");
        var tab = 'li[name="' + tab_name + '"]';
        console.log("Offset is");
        console.log($(tab).offset());
        $('nav').scrollTop($(tab).offset().top - 300);
    });

    // window.onload(function() {
    //     var tab = 'li[name="' + tab_name + '"]';
    //     console.log("Offset is");
    //     $(tab).offset();
    // });


    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-161447215-30');


</script>
@yield('js4event')
</body>
</html>
