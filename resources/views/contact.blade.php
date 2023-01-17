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

        hr {
            border: none;
            border-top: 1px dashed #ABABAB;
            color: #fff;
            background-color: #fff;
            height: 0px;
            width: 100%;
            margin: 8px 0 16px 0;
        }






    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">  > コドモアとは
        </div>
        <div class="background-white">
            <ul class="nav nav-tabs top-menu m-0 mt-2 p-half pb-2 mx-n-half row" id="myTab" role="tablist" style="padding-top: 1px; padding-bottom: 4px !important;">
                <li class="nav-item col-3 px-0">
                    <a class="nav-link border-0 px-2 py-1 mr-half text-bold-menu active" id="kodomore-tab" data-toggle="tab" href="#kodomore" role="tab" aria-controls="home"
                       style="font-size: 12px !important;" aria-selected="true">コドモア概要</a>
                </li>
                <li class="nav-item col-3 px-0">
                    <a class="nav-link border-0 px-2 py-1 mr-half text-bold-menu" id="company-tab" data-toggle="tab" href="#company" role="tab" aria-controls="profile"
                       style="font-size: 12px !important;" aria-selected="false">運営会社</a>
                </li>
                <li class="nav-item col-3 px-0">
                    <a class="nav-link border-0 px-2 py-1 mr-half text-bold-menu" id="terms-tab" data-toggle="tab" href="#terms" role="tab" aria-controls="contact"
                       style="font-size: 12px !important;" aria-selected="false">利用規約</a>
                </li>
                <li class="nav-item col-3 px-0">
                    <a class="nav-link border-0 px-2 py-1 text-bold-menu" id="law-tab" data-toggle="tab" href="#law" role="tab" aria-controls="contact"
                       style="font-size: 12px !important; line-height: 13px !important;" aria-selected="false">特定商取引法
                        について
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kodomore" role="tabpanel" aria-labelledby="kodomore-tab">
                <div class="card-header text-title">
                    <img class="img-icon height-1-half mb-1" src="{{asset('img/prism.png')}}">
                    <div style="display: inline">
                        コドモア概要
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="p-3 background-white">
                        <img class="mb-2" src="{{asset('img/kodomore_overview.jpg')}}">
                        <p class="my-2 text-title text-pink" style="white-space: pre-line">子どもたちと保護者様の子育てを
                            応援するお役立ちサイト､コドモア｡</p>
                        <p class="text-medium-light my-2">　０歳児から高校生まで､子どもたちとその保護者様の学びと子育てを応援する教育専門サイトKODOMORE[コドモア]｡日本全国から世界へ広がる教育情報サイトとして､子どもたちの『もっと学びたい』『もっと知りたい』『もっと成長したい』というやる気を育てるためのコンテンツを厳選してお届けいたします｡</p>
                        <p class="text-medium-light mt-4">　幼稚園･保育所･小学校･中学校･高校など､園･学校･スクール(塾)教育関係者の方々の意見､一般からのレビューなど､すべてのユーザーがコミュニケーションの輪を広げ､子どもたちの未来を､共に考える場として活用していただけることを願います｡子育て応援､未来へつながる学びのWeb､KODOMORE[コドモア]は､いつも頑張る子どもたちとパパママの味方です！</p>
                    </div>




                </div>
            </div>
            <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                <div class="card-body">
                    <div class="px-2">

                        <div class="align-items-center">
                            <div class="position-relative">


                                <div class="d-flex justify-content-center position-absolute" style="bottom: -.25rem; left: 0; right: 0">
                                    <div class="background-bottom"></div>
                                </div>
                                <p class="text-medium-xs text-center "style="position: inherit; line-height: 1">会社名</p>
                            </div>

                            <p class="text-medium-xs text-center mt-2">株式会社アドキットインフォケーション</p>
                            <hr>
                        </div>
                        <div class="align-items-center">
                            <div class="position-relative">
                                <div class="d-flex justify-content-center position-absolute" style="bottom: -.25rem; left: 0; right: 0">
                                    <div class="background-bottom"></div>
                                </div>
                                <p class="text-medium-xs text-center "style="position: inherit; line-height: 1">設立</p>
                            </div>
                            <p class="text-medium-xs text-center mt-2">1996年4月</p>
                            <hr>
                        </div>
                        <div class="align-items-center">
                            <div class="position-relative">
                                <div class="d-flex justify-content-center position-absolute" style="bottom: -.25rem; left: 0; right: 0">
                                    <div class="background-bottom"></div>
                                </div>
                                <p class="text-medium-xs text-center "style="position: inherit; line-height: 1">代表</p>
                            </div>
                            <p class="text-medium-xs text-center mt-2">家田 里香</p>
                            <hr>
                        </div>
                        <div class="align-items-center">
                            <div class="position-relative">
                                <div class="d-flex justify-content-center position-absolute" style="bottom: -.25rem; left: 0; right: 0">
                                    <div class="background-bottom"></div>
                                </div>
                                <p class="text-medium-xs text-center "style="position: inherit; line-height: 1">従業員数</p>
                            </div>
                            <p class="text-medium-xs text-center mt-2">約90名</p>
                            <hr>
                        </div>

                        <div class="align-items-center">
                            <div class="position-relative">
                                <div class="d-flex justify-content-center position-absolute" style="bottom: -.25rem; left: 0; right: 0">
                                    <div class="background-bottom"></div>
                                </div>
                                <p class="text-medium-xs text-center "style="position: inherit; line-height: 1">平均年齢</p>
                            </div>
                            <p class="text-medium-xs text-center mt-2">33歳</p>
                            <hr>
                        </div>

                        <div class="align-items-center">
                            <div class="position-relative">
                                <div class="d-flex justify-content-center position-absolute" style="bottom: -.25rem; left: 0; right: 0">
                                    <div class="background-bottom"></div>
                                </div>
                                <p class="text-medium-xs text-center "style="position: inherit; line-height: 1">資本金</p>
                            </div>
                            <p class="text-medium-xs text-center mt-2">4,000万円</p>
                            <hr>
                        </div>

                        <div class="align-items-center">
                            <div class="position-relative">
                                <div class="d-flex justify-content-center position-absolute" style="bottom: -.25rem; left: 0; right: 0">
                                    <div class="background-bottom"></div>
                                </div>
                                <p class="text-medium-xs text-center "style="position: inherit; line-height: 1">本社所在地</p>
                            </div>
                            <p class="text-medium-xs text-center mt-2">岐阜県岐阜市下奈良1-1-8</p>
                            <p class="text-medium-xs text-center ">TEL.058-268-7577</p>
                            <p class="text-medium-xs text-center ">https://www.ad-kit.co.jp</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="terms-tab">
                <div class="card-header background-sky align-items-center d-flex">
                    <img class="img-icon height-1-half" src="{{asset('img/data-list.png')}}">
                    <div class="ml-2 text-title" >
                        利用規約
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-medium-xs">
                        株式会社アドキットインフォケーション(以下｢当社｣)が運営するKODOMORE[コドモア](以下｢当サイト｣)の利用について､以下の通り利用規約を定めます｡当サイト利用者(以下｢利用者｣)は､本規約に同意した上で当サイトを利用するものとします｡ご利用の際は､本規約をご一読の上､ご同意いただいた上でご利用ください｡
                    </p>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 1. KODOMORE[コドモア]の目的
                        </p>
                        <p class="text-medium-light">
                            当サイトは､園･学校･スクール(塾)探しをはじめ､利用者のより良い子育てライフを応援する総合サイトです｡市区町村別の幼稚園(保育所･こども園)･小学校･中学校･高校･スクール･塾の詳細情報やレビューの他､子育てに役立つニュースや情報のお届けや､イベント予約や出願など､様々なコンテンツで皆様の子育てをサポートします｡
                        </p>
                    </div>
                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 2. 利用について
                        </p>
                        <p class="text-medium-light">
                            利用者は､当サイト内及び当社提供のサービスを自己の責任で利用するものとし､当該サービスにおいて利用者間等でトラブルが発生した場合､当社は一切の責任を負わないものとします｡
                        </p>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 3. 会員登録
                        </p>
                        <div class="text-medium-light d-flex">
                            <p>(1) </p><p>	利用者は､当社所定の手続きによって､当サイトの会員登録手続きができるものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(2) </p><p>	会員の登録は､一般会員【保護者､学生本人(12歳以上)､その他一般(プロ)】と､園･学校･(塾)教育関係者会員とで､利用できる機能が異なる場合があります｡</p>

                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(3) </p><p>	当サイトは､会員登録をしていない利用者も利用することが可能ですが､会員へのサービスと提供内容が異なる場合があります｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(4) </p><p>	当サイト内において､資料請求､イベント等の予約､各種申込､出願を行う場合､一般会員登録が必要となります｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(5)</p><p>	サービスの提供内容は､当社が任意に決定し､随時変更できるものとします｡</p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 4. ログインアカウントおよびパスワードの
                              登録･管理
                        </p>
                        <p class="text-medium-light">
                            利用者は､会員登録に伴い発行されるログインアカウントおよびパスワードについて､適切な登録･管理を､自己の責任で行うものとします｡利用者の管理不十分等により不利益や損害が生じた場合､当社は一切の責任を負わないものとします｡
                        </p>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 5. 個人情報の保護
                        </p>
                        <p class="text-medium-light">
                            個人情報の保護については､当サイト内<a class="menu-icon text-decoration" href="{{url('/private')}}">｢プライバシーポリシー｣</a>をご参照ください｡
                        </p>
                    </div>
                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span>  6. 掲載内容およびクチコミレビュー･コメントの転載･利用について

                        </p>
                        <p class="text-medium-light">
                            当サイト内のコンテンツや､園･学校･スクール(塾)および個人の情報､画像､商標､デザイン等の著作権および財産権は､当社もしくは正当な権利者が保持しています｡当サイト内の掲載内容およびクチコミレビュー･コメントを､無断転載･無断利用することは禁止とします｡また､無断転載･無断利用によって利用者に不利益や損害が生じた場合､当社は一切の責任を負わないものとします｡
                        </p>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span>  7. クチコミレビュー･コメント投稿の利用
                        </p>
                        <div class="text-medium-light d-flex">
                            <p>(1) </p><p>	当サイトにクチコミレビュー･コメントを投稿する際は､会員登録が必要となります｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(2) </p><p>	当サイトへのクチコミレビュー･コメントの投稿は､当社が定める<a class="menu-icon text-decoration" href="{{url('/blog-guide')}}">｢投稿ガイドライン｣</a>に同意した上で行うものとし､これに反するクチコミレビュー･コメントは､当社判断により､修正依頼または削除を行う場合があります｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(3) </p><p>	当サイトに投稿されたクチコミレビュー･コメントの著作権は､投稿者本人にあるものとしますが､投稿者は投稿した時点で､その著作権の権限(国内外における複製や発信､第三者への使用許諾権等)を､無償で当社が利用することを許諾したものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(4) </p><p>	当社もしくは当社が使用を許諾した第三者が､クチコミレビュー･コメントを当社運営サイトおよび提携サイトにおいて使用する場合､その内容を要約､抜粋したり､投稿された画像の編集を行う場合があります｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(5) </p><p>	クチコミレビュー･コメントの投稿に､第三者の著作物を使用している場合は､その著作権者に対し､投稿者本人が許可を得ているものとみなします｡当社もしくは当社が使用を許諾した第三者が､クチコミレビュー･コメントを当社運営サイトおよび提携サイトにおいて使用する場合､そのクチコミレビューに使用された著作物の権利処理に関する責任は､そのクチコミレビューの投稿者本人にあるものとし､当社は一切の責任を負わないものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(6) </p><p>	クチコミレビュー･コメントの投稿画像に第三者が掲載されている場合､その肖像権者に対し､投稿者本人が許可を得ているものとみなします｡当社もしくは当社が使用を許諾した第三者が､クチコミレビュー･コメントを当社運営サイトおよび提携サイトにおいて使用する場合､そのクチコミレビュー･コメントに使用された画像の権利処理に関する責任は､そのクチコミレビュー･コメントの投稿者本人にあるものとし､当社は一切の責任を負わないものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(7) </p><p>	当社もしくは当社が使用を許諾した第三者が､クチコミレビュ･コメントーを当社運営サイトおよび提携サイトにおいて使用する場合､投稿者のハンドルネームを掲載する場合があります｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(8) </p><p>	投稿されたクチコミレビュー･コメントは､当社の判断により削除する場合があり､また､他の利用者や園･学校関係者がクチコミレビュー･コメント削除を依頼された場合､当社判断により削除しない場合がありますが､当社は投稿者および削除依頼者に､その事由を説明しないものとし､投稿者および削除依頼者も､その事由の説明を求めないものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(9) </p><p>	投稿されたクチコミレビューには､当該園･学校･スクール(塾)より返信が来る場合があり､投稿者はその返信に対し､１度だけ返信できるものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(10) </p><p>	投稿されたクチコミレビューは､当該レビューが投稿されたページの園･学校･スクール(塾)もしくは当サイト編集部の判断によって､スクールホットラインに移動される場合があります｡その際､移動されたクチコミレビューは､クチコミレビューとして表示されなくなります｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(11) </p><p>	クチコミレビューがスクールホットラインへ移動となった場合､当該園･学校･スクール(塾)および当サイト編集部は､その移動の事由を投稿者へ説明しないものとし､投稿者もその事由の説明を求めないものとします｡</p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span>  8. 一般会員による園･学校･スクール(塾)情報の登録
                        </p>
                        <div class="text-medium-light d-flex">
                            <p>(1) </p><p>	一般会員は､園･学校･スクール(塾)情報(以下｢スクール情報｣)を､新たに登録･編集することができるものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(2) </p><p>	スクール情報の登録は､当社が定める<a class="menu-icon text-decoration" href="{{url('/guide')}}">｢利用方法およびガイドライン｣</a>に同意した上で登録するものとし､これに反する内容の登録があった場合､当社判断により削除する場合があります｡</p>

                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(3) </p><p>	一般会員がスクール情報を登録･編集した後に､当サイト編集部および当該園･学校･スクール(塾)自身がスクール会員として掲載情報を編集する場合､一般会員の編集した情報よりも優先されるものとします｡そのため､当該園･学校･スクール(塾)および当サイト編集部が編集を行っている場合は､会員が情報の編集を行うことができなくなります｡一般会員および利用者が掲載情報に不備を発見した場合は､当サイト内｢みんなで学校(園)情報を編集｣フォームよりお知らせください｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(4) </p><p>	当サイトにスクール情報を登録する場合､登録
                                者自身が事前に情報の正確性を確認しているものとし､その情報に誤りがあった場合､当社は一切の責任を負わないものとします｡</p>

                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(5) </p><p>	当サイトに登録されたスクール情報の著作権は､登録した利用者本人(以下｢登録者｣)にあるも  のとしますが､登録者は登録した時点で､その著作  権の権限(国内外における複製や発信､第三者への使用許諾権等)を､無償で当社が利用することを許諾したものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(6) </p><p>	当社もしくは当社が使用を許諾した第三者が､登録内容(画像も含む)を当社運営サイトおよび提携サイトにおいて使用する場合があり､その際､登録内容を要約､抜粋したり､登録された画像の編集を行う場合があります｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(7) </p><p>	登録に､第三者の著作物を使用している場合は､その著作権者に対し､登録者本人が許可を得ているものとみなし､その登録に使用された著作物の権利処理に関する責任は､登録者本人にあるものとし､当社は一切の責任を負わないものとします｡また､当社運営サイトおよび提携サイトへの投登録内容の転載についても､著作権者に許可を得ているものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(8) </p><p>	登録画像に第三者が掲載されている場合､その肖像権者またはその代理人に対し､登録者本人が許可を得ているものとみなし､その登録に使用された画像の権利処理に関する責任は､登録者本人にあるものとし､当社は一切の責任を負わないものとします｡また､当社運営サイトおよび提携サイトへの登録画像の転載についても､肖像権者またはその代理人に許可を得ているものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(9) </p><p>	登録されたスクール情報は､当社の判断により削除される場合がありますが､当社は登録者に削除の事由を説明しないものとし､登録者もその事由の説明を求めないものとします｡</p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 9. 免責事項
                        </p>
                        <p class="text-medium-light">
                            当サイトの利用は､全て利用者本人の責任において利用するものとし､当社は一切の責任を負わないものとします｡
                        </p>

                        <div class="text-medium-light d-flex">
                            <p>(1) </p><div>	<p>スクール情報</p>
                                園･学校･スクール(塾)により､運営状況と掲載内容が異なる場合があります｡利用者は事前に園･学校･スクール(塾)に確認するものとし､掲載内容との相違によって利用者にトラブルや損害が生じた場合､当社は一切の補償･関与をしないものとします｡掲載情報に不備がある場合は､当サイト内<a class="menu-icon text-decoration" href="{{url('/question')}}">｢お問合わせ｣</a>フォームよりお知らせください｡</div>
                        </div>

                        <div class="text-medium-light d-flex">
                            <p>(2) </p><div>	<p>地図情報</p>
                                当サイト内に掲載された地図情報に関して､当社は情報の保証はしません｡地図情報の利用に関しては､地図提供元のGoogleInc.が定めるプライバシーポリシーおよびTermsofUseが適用されます｡</div>

                        </div>

                        <div class="text-medium-light d-flex">
                            <p>(3) </p><div>	<p>リンク先サイト</p>
                                当サイトからリンクされた第三者サイトに関して､当社は一切の責任を負いません｡</div>

                        </div>

                        <div class="text-medium-light d-flex">
                            <p>(4) </p><div>	<p>クチコミレビュー･コメント</p>
                                当サイトに掲載されたクチコミレビュー･コメントによって､利用者に不利益や損害が生じた場合､当社は一切の補償･関与をしないものとします｡</div>

                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 10. 禁止事項
                        </p>
                        <p class="text-medium-light">
                            当サイトの利用に際して､以下の行為を禁止します｡
                        </p>
                        <div class="text-medium-light d-flex">
                            <p>(1) </p><p>	当サイトで提供する情報を､当社の事前の同意なく､複写､若しくはその他の方法により再生､複製､送付､譲渡､頒布､配布､転売､又はこれらの目的で使用するために保管する行為</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(2) </p><p>	本規約又はガイドラインに違反する行為</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(3) </p><p>	法令または公序良俗に反する行為</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(4) </p><p>	違法行為･犯罪的行為･重大な危険行為に結びつくこと又はこれらを助長すること</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(5) </p><p>	当社及び他のお客様又は第三者の権利や名誉を
                                棄損する､または不利益や損害を与える恐れのある行為</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(6) </p><p>	当サイトの運営を妨げる､もしくは当社の名誉や信用を棄損する行為</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(7) </p><p>	当サイト会員登録時に虚偽の申告をしたり､複数
                                のアカウントを取得する行為</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(8) </p><p>	IDおよびパスワードの不正使用や､他の利用者および第三者に使用させる行為</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(9) </p><p>	その他､当社が不適切と判断すること</p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 11. アカウントの利用停止･削除
                        </p>
                        <p class="text-medium-light">
                            本規約に反する行為､もしくは当サイトの利用目的として不適切な行為があった場合､当社はその利用者のアカウントの利用停止または削除を行うことができるものとします｡アカウントの利用停止または削除により利用者に不利益や損害が生じた場合､当社は一切の責任を負わないものとします
                        </p>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 12. サービスの変更･廃止
                        </p>
                        <p class="text-medium-light">
                            当社は､その判断により､サービスの全てまたは一部を変更･廃止できるものとします｡
                        </p>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 13. 本規約の改定
                        </p>
                        <p class="text-medium-light">
                            当社は本規約を任意に改定･追記できるものとし､改定後は速やかに当サイトにて掲示します｡会員は､改定･追記後の規約に従うものとします｡
                        </p>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 14. 退会
                        </p>
                        <div class="text-medium-light d-flex">
                            <p>(1) </p><p>	会員が退会を希望する場合は､当社指定の退会手続によって退会するものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(2) </p><p>	会員は退会手続後､会員登録時に有していた一切の権利､特典を失うものとします｡</p>
                        </div>
                        <div class="text-medium-light d-flex">
                            <p>(3) </p><p>	退会手続後も投稿したレビューおよび園･学校･塾情報は削除されないものとし､利用者はそれを承諾したものとします｡</p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 15. お問い合わせ
                        </p>
                        <p class="text-medium-light">
                            当サイト･サービスにおけるご質問･ご相談は､当サイト内<a class="menu-icon text-decoration" href="{{url('/question')}}">｢お問合わせ｣</a>フォームにてご連絡ください｡
                        </p>
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="law" role="tabpanel" aria-labelledby="law-tab">
                <div class="card-header background-sky align-items-center d-flex">
                    <img class="img-icon height-1-half" src="{{asset('img/data-list.png')}}">
                    <div class="ml-2 text-title" >
                        特定商取引法 について
                    </div>
                </div>
                <div class="card-body">
                    <div class="py-2">
                        <div class="background-gray px-2 py-1 text-medium-xs">
                            事業者名
                        </div>
                        <div class="background-light-gray px-2 py-1 text-medium-xs">
                            株式会社アドキットインフォケーション
                        </div>
                    </div>

                    <div class="py-2">
                        <div class="background-gray px-2 py-1 text-medium-xs">
                            代表者
                        </div>
                        <div class="background-light-gray px-2 py-1 text-medium-xs">
                            家田 里香
                        </div>
                    </div>

                    <div class="py-2">
                        <div class="background-gray px-2 py-1 text-medium-xs">
                            所在地
                        </div>
                        <div class="background-light-gray px-2 py-1 text-medium-xs">
                            岐阜県岐阜市下奈良1-1-8
                        </div>
                    </div>

                    <div class="py-2">
                        <div class="background-gray px-2 py-1 text-medium-xs">
                            電話番号
                        </div>
                        <div class="background-light-gray px-2 py-1 text-medium-xs">
                            058-268-7577
                        </div>
                    </div>

                    <div class="py-2">
                        <div class="background-gray px-2 py-1 text-medium-xs">
                            メールアドレス
                        </div>
                        <div class="background-light-gray px-2 py-1 text-medium-xs">
                            info@kodomore-edu.com
                        </div>
                    </div>

                    <div class="pt-3 pb-2">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 利用料
                        </p>
                        <div class="text-medium-xs d-flex">
                            <p>1.</p><p>当サイト内における園･学校･塾情報ページの編集および情報公開にかかる掲載料金</p>
                        </div>
                        <div class="text-medium-xs d-flex">
                            <p>2.</p><p>当サイト内より資料請求･イベント予約･WEB願書ダウンロードなどが行われた際にかかる手数料</p>
                        </div>
                    </div>

                    <div class="pt-3 pb-2">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 有料コンテンツ投稿権利の購入と引渡し
                        </p>
                        <p class="text-medium-xs">
                            所定の手続きが完了次第､提携の管理画面より投稿を開始できます｡
                        </p>

                    </div>

                    <div class="pt-3 pb-2">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 返品について
                        </p>
                        <p class="text-medium-xs">
                            電子商品のため､返品にはご対応致しません｡
                        </p>

                    </div>

                    <div class="pt-3 pb-2">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 解約について
                        </p>
                        <p class="text-medium-xs">
                            所定の手続きの後､解約が可能です｡
                        </p>

                    </div>

                    <div class="pt-3 pb-2">
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span> 支払方法
                        </p>
                        <p class="text-medium-xs">
                            銀行振込･口座振込･各種クレジットカード
                        </p>

                    </div>

                    <div class="pt-3">
                        <div class="d-flex">
                            <div class="flex-1 d-flex justify-content-center">
                                <img class="height-2 img-icon mx-2" src="{{asset('img/mastercard.png')}}">
                            </div>
                            <div class="flex-1 d-flex justify-content-center">
                                <img class="height-4 img-icon mx-2" src="{{asset('img/visa.png')}}">
                            </div>
                            <div class="flex-1 d-flex justify-content-center">
                                <img class="height-2 img-icon mx-2" src="{{asset('img/express.png')}}">
                            </div>
                            <div class="flex-1 d-flex justify-content-center">
                                <img class="height-2 img-icon mx-2" src="{{asset('img/diners.png')}}">
                            </div>
                            <div class="flex-1 d-flex justify-content-center">
                                <img class="height-2 img-icon mx-2" src="{{asset('img/jcb.png')}}">
                            </div>
                        </div>

                    </div>

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
            $(".container").addClass("background-yellow");

            $(".nav-link").click(function(event) {
               var id = $(this).attr('id');
               if(id == 'kodomore-tab') {
                   $(".container").addClass("background-yellow");
               } else {
                   $(".container").removeClass("background-yellow");
               }
            });

            $("#move_garden").click(function(event) {
                var url = home_path;
                window.location.href = url;
            });
            function onHashChange() {
                var hash = window.location.hash;

                if (hash) {
                    // using ES6 template string syntax
                    $(`[data-toggle="tab"][href="${hash}"]`).trigger('click');
                }
            }

            window.addEventListener('hashchange', onHashChange, false);
            onHashChange();
        });


    </script>
@endsection
