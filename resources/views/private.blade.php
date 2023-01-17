@extends('layouts.app')

@section('title')
    全国の幼稚園･保育所 入園､小学校･中学校･高校 入学と受験情報
@endsection

@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>
        .news--image{
            position:relative;
            overflow:hidden;
            padding-bottom:75%;
        }
        .news--image > img{
            height: 100%;
            object-fit: cover;
            position:absolute;
        }

        .news-list {
            background-color: #FFF5F7;
        }

        .news-flower {
            position: absolute;
            top: 0; left: 0;
            z-index: 100
        }

        .news-flower-bottom {
            position: absolute;
            right: 0;
            z-index: 100
        }

        @media (max-width: 767px) {
            .news-flower-bottom {
                bottom: -2.25rem !important;
            }
        }

        @media (max-width: 575px) {
            .news-flower-bottom {
                bottom: -1.5rem !important;
            }
        }

        @media (max-width: 375px) {
            .news-flower-bottom {
                bottom: -1.35rem !important;
            }
        }

        @media (min-width: 768px){
            .news-flower-bottom {
                bottom: -3rem !important;
            }
        }

        @media (max-width: 320px) {
            .news-flower-bottom {
                bottom: -1rem !important;
            }
        }


        .nav-link {
            background-color: white;
            border-radius: 0 !important;
            text-align: center;
            align-items: center;
            height: 100%;
            justify-content: center;
            display: flex;
        }

        .nav-link.active {
            color: white !important;
            background-color: transparent !important;
        }

        .background-yellow {
            background-image: url("{{asset('img/contact_background.png')}}");
        }

        .card-header {
            background-color: transparent;
        }

        .background-bottom {
            background-color: #CDEFF2;
            width: 40%;
            height: .5rem;
        }

        .background-sky {
            background-color: #DAF6F6;
        }

        .background-gray {
            background-color: #dedede;
        }

        .background-light-gray {
            background-color: #eeeeee;
        }

        .money-card {
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .card {
            background-color: transparent;
        }

        .card-body {
            margin-bottom: -2rem;
        }

        .card-header-border {
            background-color: #48D4D0;
            height: .25rem;
            width: 100%;
        }






    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">  > プライバシーポリシー
        </div>



        <div class="card-header  align-items-center d-flex">
            <img class="img-icon height-1-half" src="{{asset('img/private.png')}}">
            <div class="ml-2 text-title" >
                プライバシーポリシー
            </div>
        </div>
        <div class="card-header-border"></div>

        <div class="card-body">
            <p class="text-medium-xs">
                株式会社アドキットインフォケーション(以下当社)が運営するKODOMORE[コドモア](以下当サイト)は､当サイト利用者(以下｢利用者｣)の個人情報の取り扱いに対する重要性を認識し､個人情報保護に関する法律(以下｢個人情報保護法｣)を遵守すると共に､以下のプライバシーポリシーに則り､利用者の個人情報保護のため､厳正な管理に努めます｡
            </p>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span> 第1条　個人情報の利用目的
                </p>
                <p class="text-medium-light">
                    当サイトは､以下の目的のために利用者の個人情報を利用します｡
                </p>
                <div class="text-medium-light d-flex">
                    <p>(1) </p><p>	ログイン時の本人確認等､当サイトのサービス提供の為</p>
                </div>
                <div class="text-medium-light d-flex">
                    <p>(2) </p><p>	当社が提供するサービスについての情報案内</p>
                </div>
                <div class="text-medium-light d-flex">
                    <p>(3) </p><p>	当サイトサービスの改善､新サービスの開発の為</p>
                </div>
                <div class="text-medium-light d-flex">
                    <p>(4) </p><p>	当サイトサービスに関し､必要に応じて会員および利用者と連絡を取る為</p>
                </div>
                <div class="text-medium-light d-flex">
                    <p>(5) </p><p>	その他､上記利用目的に付随する目的の為</p>
                </div>
            </div>
            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span> 第2条　個人情報の適正な取得
                </p>
                <p class="text-medium-light">
                    当社は､当サイトにおける利用目的に必要な個人情報を適正に取得し､不正な手段により取得しません｡
                </p>
            </div>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span> 第3条　個人情報利用の制限
                </p>
                <p class="text-medium-light">
                    当社は､あらかじめご本人の同意を得ず､利用目的に必要な範囲を超えて個人情報を取り扱うことはありません｡ただし､次の場合はこの限りではありません｡
                </p>
                <div class="text-medium-light d-flex">
                    <p>(1) </p><p>	法令に基づく場合</p>
                </div>
                <div class="text-medium-light d-flex">
                    <p>(2) </p><p>	公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合</p>

                </div>
                <div class="text-medium-light d-flex">
                    <p>(3) </p><p>	国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合</p>
                </div>

            </div>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span> 第4条　個人情報の安全管理
                </p>
                <p class="text-medium-light">
                    当社は､個人情報の紛失､破壊､改ざん､漏えいなどのリスクに対し､必要かつ適切な管理を行い､個人情報の安全管理に努めます｡
                </p>
            </div>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span> 第5条　個人情報の第三者提供および業務委託
                </p>
                <p class="text-medium-light">
                    当社は法に基づく場合を含め､利用目的の達成に必要な範囲内で､利用者の個人情報を第三者に提供する場合があります｡また､当社が許諾した業者に対し､利用目的に必要な範囲内で業務委託する場合があります｡
                </p>
            </div>
            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span>  第6条　個人情報の開示
                </p>
                <p class="text-medium-light">
                    当社は､個人情報保護法の定めに基づき､利用者から個人情報の開示を求められた場合は､以下の場合を除き､利用者本人からのご請求であることを確認の上で､遅滞なく開示を行います｡
                </p>
                <div class="text-medium-light d-flex">
                    <p>(1) </p><p>	本人または第三者の生命､身体､財産､およびその他の権利･利益を害する恐れのある場合</p>
                </div>
                <div class="text-medium-light d-flex">
                    <p>(2) </p><p>	法令に違反する恐れのある場合</p>
                </div>
                <div class="text-medium-light d-flex">
                    <p>(3) </p><p>	当社の業務に支障を及ぼす恐れのある場合</p>
                </div>
            </div>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span>  第7条　個人情報の訂正･利用停止
                </p>
                <p class="text-medium-light">
                    当社は､利用者ご本人より個人情報の訂正･利用停止等の請求があった場合､利用者ご本人であることを確認の上調査を行い､相応の事由と認めた場合､遅延することなく訂正･利用停止手続きを行います｡
                </p>

            </div>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span> 第8条　アクセス解析ツールについて
                </p>


                <div class="text-medium-light d-flex">
                    <p>(1) </p><p>	当サイトでは､利用状況の把握と利便性向上を目的としたアクセス解析のため､Googleによるアクセス解析ツール｢GoogleAnalytics(グーグルアナリティクス)｣を利用しています｡</p>

                </div>

                <div class="text-medium-light d-flex">
                    <p>(2) </p><p>	GoogleAnalyticsは､トラフィックデータの収集のためにCookie(クッキー)を使用しています｡</p>

                </div>

                <div class="text-medium-light d-flex">
                    <p>(3) </p><p>	当サイトで収集するトラフィックデータは､匿名での属性･興味･関心に関する情報の収集･分析を目的としたものであり､個人を特定するものではありません｡</p>

                </div>

                <p class="text-medium-light">
                    この機能はCookieを無効にすることで収集を拒否することが出来ますので､お使いのブラウザの設定をご確認ください｡GoogleAnalyticsの詳細に関しては､<a class="menu-icon text-decoration" id="browser_setting" href="https://marketingplatform.google.com/about/analytics/terms/jp/">こちら</a>をご参照ください｡
                </p>
            </div>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span> 第9条　広告の配信について
                </p>
                <div class="text-medium-light d-flex">
                    <p>(1) </p><p>	当サイトでは､第三者による広告配信サービス｢Google Adsense (グーグルアドセンス)｣を利用しています｡</p>

                </div>

                <div class="text-medium-light d-flex">
                    <p>(2) </p><p>	当サイトでは､ユーザーの興味に応じた広告を表示するため｢Cookie(クッキー)｣を使用することがあります｡ </p>

                </div>

                <div class="text-medium-light d-flex">
                    <p>(3) </p><p>	当サイトに配信された広告コンテンツにアクセスした場合､閲覧者のブラウザのCookieを通じ､当該広告配信事業者が､直接情報を収集する場合があります｡</p>

                </div>
                <div class="text-medium-light d-flex">
                    <p>(4) </p><p>	Cookieを無効にする設定およびGoogle Adsenseに関する詳細は､<a class="menu-icon text-decoration" id="browser_setting" href="https://policies.google.com/technologies/ads?hl=ja">こちら</a>をご参照ください｡</p>

                </div>

            </div>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span>  第10条　位置情報の取得
                </p>
                <p class="text-medium-light">
                    当社は､利用者の同意がある場合に限り､利用者が当サイトを利用した際の位置情報を取得する場合があります｡位置情報は､当サイトにおける利用履歴から､利用者におすすめの園･学校･塾やサービスをご紹介するなど､当サイトのサービス向上のために利用されます｡
                </p>

            </div>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span> 第11条　IR情報としての利用
                </p>
                <p class="text-medium-light">
                    当サイト運営によって取得した統計データを､当社IR情報として公開することがあります｡
                </p>

            </div>

            <div class="mt-3">
                <p class="text-large-xs">
                    <span class="menu-icon">◆</span> 第12条　お問い合わせ
                </p>
                <p class="text-medium-light">
                    個人情報保護についてのご意見､ご質問､苦情､情報の開示･訂正･利用停止のお申し出等に関するお問い合わせは､当サイト内<a class="menu-icon text-decoration" id="question" href="{{url('/question')}}">｢お問合わせ｣</a>ページよりお問い合わせください｡
                </p>

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


            $("#browser_setting").click(function(event) {
                var url = "https://marketingplatform.google.com/about/analytics/terms/jp/";
                window.location.href = url;
            });

            $("#police_advertise").click(function(event) {
                var url = "https://policies.google.com/technologies/ads?hl=ja";
                window.location.href = url;
            });

            $("#question").click(function(event) {
                var url = home_path + '/question';
                window.location.href = url;
            });
        });


    </script>
@endsection
