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

        form:invalid button{
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }
        .card-header-border {
            background-color: #48D4D0;
            height: .25rem;
            width: 100%;
        }



        .question {
            background-color: #EFFAFB !important;
        }

        .category.active {
            color: #1C3F54;
            background-color: white;
            border: 1px solid #31BCC7;
        }

        .category {
            background-color: #31BCC7;
            color: white;
            font-size: 13px;
            font-family: YugoBold;
        }

    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">    >  よくある質問(FAQ)
        </div>



        <div class="card-header  align-items-center d-flex">
            <img class="img-icon height-2" src="{{asset('img/faq-white.png')}}">
            <div class="ml-2 text-title" >
                よくある質問(FAQ)
            </div>
        </div>

        <div class="card-header-border"></div>

        <div class="card-body py-1">
            <div class="mt-2 form-inline d-flex justify-content-center md-form form-sm mt-0 rounded mb-0 py-0 " style="border: 1px solid #333333; border-radius: 50px !important;">

                <input class="form-control form-control-sm w-75 text-small border-0 mb-0 py-2" type="text" placeholder="フリー検索"
                       aria-label="Search"  id="search" >
                <img class="height-1 img-icon" src="{{asset('img/zoomer.png')}}">
            </div>
            <div class="mt-2">
                <div class="d-flex">
                    <a class="flex-1 category rounded text-medium-xs z-depth-1 text-center py-1" href="#user">会員について</a>
                    <a class="flex-1 ml-2 rounded category text-medium-xs z-depth-1 text-center  py-1" href="#mail">メールについて</a>

                </div>
                <div class="d-flex mt-2">
                    <a class="flex-1 category rounded text-medium-xs text-center z-depth-1 py-1" href="#edit">編集について</a>
                    <a class="flex-1 ml-2 category rounded text-medium-xs text-center z-depth-1 py-1" href="#review">投稿について</a>
                </div>

            </div>
        </div>

        <div id="user">
            <div class="d-flex justify-content-center mt-2 question p-2">
                <img src="{{asset('img/question.png')}}" class="height-2 img-icon">
                <div class="ml-1 flex-1">

                    <h6 class="text-medium mb-0">会員登録は無料ですか？</h6>
                </div>
            </div>
            <div class="d-flex mt-1 p-2">
                <img src="{{asset('img/answer.png')}}" class="height-1-half img-icon" style="min-width: unset">
                <div class="ml-1">
                    <p class="text-normal">はい｡無料でご登録いただけます｡</p>
                </div>
            </div>
        </div>


        <div id="user">
            <div class="d-flex justify-content-center mt-2 question p-2">
                <img src="{{asset('img/question.png')}}" class="height-2 img-icon">
                <div class="ml-1 flex-1">

                    <h6 class="text-medium mb-0">会員になると､どんな機能を利用できますか？</h6>
                </div>
            </div>
            <div class="d-flex mt-1 p-2">
                <img src="{{asset('img/answer.png')}}" class="height-1-half img-icon" style="min-width: unset">
                <div class="ml-1">
                    <p class="text-normal">KODOMORE[コドモア]会員には､一般会員とスクール会員(園･学校･スクール(塾)教育関係者)の2種類があり､どちらも以下の機能をご利用いただけます｡</p>
                    <p class="text-normal">    <span class="menu-icon">◆</span>園･学校･スクール(塾)情報の閲覧･検索</p>
                    <p class="text-normal"><span class="menu-icon">◆</span>園･学校･スクール(塾)情報の登録･編集</p>
                    <p class="text-normal"><span class="menu-icon">◆</span>園･学校･スクール(塾)情報ページへのクチコミレビュー投稿</p>
                    <p class="text-normal"><span class="menu-icon">◆</span>新着ニュース等の記事へのクチコミレビュー投稿</p>
                    <p class="text-normal"><span class="menu-icon">◆</span>園･学校等へのイベント予約､資料請求､WEB願書フォームのダウンロード</p>
                    <p class="text-normal"><span class="menu-icon">◆</span>園や学校などの所属や有している資格の表示機能
                        (レビュー･コメント投稿の際､投稿者名とともに表示)
                    </p>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-center mt-2 question p-2">
                <img src="{{asset('img/question.png')}}" class="height-2 img-icon">
                <div class="ml-1 flex-1">

                    <h6 class="text-medium mb-0">会員登録の方法を教えてください｡</h6>
                </div>
            </div>
            <div class="d-flex mt-1 p-2">
                <img src="{{asset('img/answer.png')}}" class="height-1-half img-icon" style="min-width: unset">
                <div class="ml-1">
                    <p class="text-normal">以下の手順でご登録いただけます｡ご登録後は､TOP画面最上部､｢ログイン｣より会員ID(メールアドレス)およびパスワードを入力し､ログインしてください｡</p>
                    <p class="text-normal">(1)TOP画面｢ログイン｣より｢会員ログイン･新規会員登録｣ページへ</p>
                    <p class="text-normal">(2)会員区分を選択し､｢新規会員登録｣をクリック</p>
                    <p class="text-normal">(3)各項目を入力し､｢仮登録する｣をクリック</p>
                    <p class="text-normal">(4)登録したアドレス宛に届いた本登録用URLにて､本登録フォームへ</p>
                    <p class="text-normal">(5)各項目を入力し､｢会員登録する｣をクリックして完了
                    </p>
                </div>
            </div>
        </div>

        <div id="mail">
            <div class="d-flex justify-content-center mt-2 question p-2">
                <img src="{{asset('img/question.png')}}" class="height-2 img-icon">
                <div class="ml-1 flex-1">

                    <h6 class="text-medium mb-0">編集申請をしたのですが､確認メールが来ません｡</h6>
                </div>
            </div>
            <div class="d-flex mt-1 p-2">
                <img src="{{asset('img/answer.png')}}" class="height-1-half img-icon" style="min-width: unset">
                <div class="ml-1">
                    <p class="text-normal">メールの受信設定によっては､KODOMORE[コドモア]からのメールが迷惑メールに入っていたり､受信拒否されてしまう場合があります｡迷惑メールにも見当たらない場合は､お手数ですが｢info@kodomore-edu.com｣をドメイン設定したうえで､再度編集申請していただきますようお願いいたします｡
                    </p>
                </div>
            </div>
        </div>

        <div id="edit">
            <div class="d-flex justify-content-center mt-2 question p-2">
                <img src="{{asset('img/question.png')}}" class="height-2 img-icon">
                <div class="ml-1 flex-1">

                    <h6 class="text-medium mb-0">園や学校の情報を新しく登録する方法を教えてください｡</h6>
                </div>
            </div>
            <div class="d-flex mt-1 p-2">
                <img src="{{asset('img/answer.png')}}" class="height-1-half img-icon" style="min-width: unset">
                <div class="ml-1">
                    <p class="text-normal">ログイン後､TOPページ下部｢保護者と生徒､スクールで公開情報を編集する｣をクリックしてから登録フォームに入り､
                        登録したい情報を入力してください｡詳しくは各会員用<span class="menu-icon text-decoration" name="guide">｢利用方法およびガイドライン｣</span>をご覧ください｡</p>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-center mt-2 question p-2">
                <img src="{{asset('img/question.png')}}" class="height-2 img-icon">
                <div class="ml-1 flex-1">

                    <h6 class="text-medium mb-0">園の情報を登録できない項目がありました｡</h6>
                </div>
            </div>
            <div class="d-flex mt-1 p-2">
                <img src="{{asset('img/answer.png')}}" class="height-1-half img-icon" style="min-width: unset">
                <div class="ml-1">
                    <p class="text-normal">一般会員とスクール会員とでは､登録できる項目が異なります｡スクール会員が登録できる項目には､
                        一部有料となる項目もあります｡詳しくは各会員用<span class="menu-icon text-decoration" name="guide">｢利用方法およびガイドライン｣</span>をご覧ください｡</p>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-center mt-2 question p-2">
                <img src="{{asset('img/question.png')}}" class="height-2 img-icon">
                <div class="ml-1 flex-1">

                    <h6 class="text-medium mb-0">園や学校の情報を追記･編集する方法を教えてください｡</h6>
                </div>
            </div>
            <div class="d-flex mt-1 p-2">
                <img src="{{asset('img/answer.png')}}" class="height-1-half img-icon" style="min-width: unset">
                <div class="ml-1">
                    <p class="text-normal">ログイン後､TOPページ下部｢保護者と生徒､スクールで公開情報を編集する｣をクリックして編集したい施設名を検索し､｢編集する｣ボタンより編集画面に入り編集するか､
                        園･学校･塾の詳細ページの｢みんなで学校(園)情報を編集する｣より編集画面に入り､編集してください｡当該園･学校･スクール(塾)･KODOMORE[コドモア]編集部が既に登録･編集を行っているページは､
                        編集することができません｡その場合は､｢編集･修正案を申請する｣ボタンより､修正を依頼してください｡</p>
                </div>
            </div>
        </div>

        <div id="review">
            <div class="d-flex justify-content-center mt-2 question p-2">
                <img src="{{asset('img/question.png')}}" class="height-2 img-icon">
                <div class="ml-1 flex-1">

                    <h6 class="text-medium mb-0">クチコミレビューやコメントを投稿する<br>
                        方法を教えてください｡</h6>
                </div>
            </div>
            <div class="d-flex mt-1 p-2">
                <img src="{{asset('img/answer.png')}}" class="height-1-half img-icon" style="min-width: unset">
                <div class="ml-1">
                    <p class="text-normal">ログイン後､園･学校･スクール(塾)情報に関するクチコミレビューは､各園･学校･スクール(塾)の詳細ページの｢クチコミレビューを投稿しよう｣より､子育て最旬情報の記事などに関するコメントは､各記事ページ下部の｢記事にコメントを投稿しよう｣よりご投稿ください｡投稿の際は､｢投稿ガイドライン｣をご覧の上ご投稿ください｡
                        </p>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-center mt-2 question p-2">
                <img src="{{asset('img/question.png')}}" class="height-2 img-icon">
                <div class="ml-1 flex-1">

                    <h6 class="text-medium mb-0">本名でないとクチコミレビュー投稿できませんか？</h6>
                </div>
            </div>
            <div class="d-flex mt-1 p-2">
                <img src="{{asset('img/answer.png')}}" class="height-1-half img-icon" style="min-width: unset">
                <div class="ml-1">
                    <p class="text-normal">ニックネームなど､本名以外での投稿も可能ですが､健全なサイト利用のため､本名での投稿を推奨しています｡</p>
                </div>
            </div>
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
            $("#btn_garden").click(function(event) {
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });

            $("#btn_register").click(function(event) {
                var forms = document.getElementById('register_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    forms.submit();
                }
                //window.location.href = 'http://example.com';
            });

            $("[name=guide]").click(function(event) {
               var url = home_path + '/guide';
               window.location.href = url;
            });

            $("a").click(function(){
                $( ".category" ).each(function( index ) {
                    $(this).removeClass('active');
                })
                $(this).addClass('active');
                var id = $(this).attr('href');
                $('html, body').animate({
                    scrollTop: $(id).offset().top - $("#top_header").height()
                });
            });



        });
    </script>
@endsection
