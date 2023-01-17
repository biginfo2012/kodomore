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

        .background_procedure_type{
            background-image: url('{{asset('img/procedure_type_background.png')}}');
            background-size: cover;
        }

        .sky-border {
            border: 2px solid #B6EEEC;
        }

        .left_bar{
            position: absolute;
            left: 0;
            width: 0.4rem;
            height: 100%;
        }

    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">  > クチコミレビュー投稿ガイドライン
        </div>

        <div class="card-header text-title d-flex">
            <img class="mt-1 img-icon height-1" style="min-width: unset" src="{{asset('img/warning.png')}}">
            <div class="ml-1" >
                投稿ガイドライン
            </div>
        </div>

        <div class="card-header-border"></div>

        <div class="card-header">
            <p class="text-medium-xs">KODOMORE[コドモア]は､子どもたちとその保護者様の学びと子育てを応援する教育専門サイトです｡KODOMORE[コドモア]では､利用者の皆様に､子育ておよび､園･学校･スクール(塾)選び､受講の参考としていただくため､クチコミレビューや記事へのコメント投稿が可能となっています｡</p>
            <p class="text-medium-xs pt-2">忌憚のないご意見を頂戴したいところですが､利用者の皆様に快適にサービスをご利用頂くため､投稿に当たってのガイドラインを設けさせていただきました｡</p>
            <p class="text-medium-xs pt-2">皆様が快く利用できるよう､本ガイドラインの遵守をお願いいたします｡</p>
        </div>

        <div class="card-body pt-0">
            <div class="background_procedure_type mt-2 py-1 pl-2" id="heading1">

                <div class="flex">
                    <h6 class="mb-0 text-white w-100 text-title">
                        園･学校･スクールへのクチコミレビュー
                    </h6>
                </div>
            </div>

            <div>
                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>1. 実際に入園･入学･受講した感想を具体的にご投稿ください｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]は､園･学校･スクール(塾)を選ぶ参考としていただくサイトです｡大切なお子さまを預ける場を選ぶため､情報の正確性が重要となります｡第三者からの意見や､インターネット上の情報など､実際に入園･入学･受講(体験を含む)をしていない方の投稿や､分かりづらい表現の投稿はご遠慮ください｡</p>
                    <p class="text-pink">【例】</p>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>園･学校･スクール(塾)と無関係の内容が､投稿の大半を占めるものはNG</p>
                    </div>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>｢友達の子が通っている｣｢ネットで見たら良さそうだった｣など､実際に入園･入学･受講していないものはNG</p>
                    </div>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>過度に伏字や暗号等を使用したものや､絵文字など､環境によって正しく表示されないものはNG</p>
                    </div>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>｢先生がやさしい｣の一文のみなど､シーンや内容　の具体性に欠けるものはNG</p>
                    </div>
                </div>
                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>2. 事実関係の確認が困難な情報や断定的な批判はご遠慮ください｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]では､投稿内容の事実確認は行っておりません｡事実関係を確認できない情報や批判の投稿は､掲載園･学校･スクール(塾)へ悪影響を及ぼしかねないため､ご遠慮ください｡</p>
                    <p class="text-pink">【例】</p>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>｢特別に○○してもらえた｣など､正規ではない園･学校･スクール(塾)のサービスに関する情報は　NG</p>
                    </div>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>園･学校･スクール(塾)の噂話など､事実確認ができないものはNG</p>
                    </div>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>	｢先生が厳しい｣｢PTAの仕事が多い｣など､断定的な批判はNG</p>
                    </div>
                </div>
                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>3. 個人に対する投稿はご遠慮ください｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]のクチコミレビュー投稿は､皆様で園や学校･スクール(塾)の情報を共有し､参考にするための機能です｡園･学校･スクール(塾)などの教育関係者や他の保護者､生徒･児童など､個人に対しての投稿はご遠慮ください｡</p>
                    <p class="text-pink">【例】</p>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>｢○○先生の授業が分かりやすい｣｢今年のPTA会長は…｣など､個人を特定したものはNG</p>
                    </div>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>｢2年生の中に…｣｢年少と年長に子どもがいる親で…｣など､個人を特定できそうな内容を含むものはNG</p>
                    </div>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>	｢そんな事を言うなんておかしい｣など､他の投稿者への批判や意見など､投稿欄の秩序が乱れる恐れのあるものはNG</p>
                    </div>
                </div>
                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>4. クレームやトラブルの投稿はご遠慮ください｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">個人的なクレームやトラブルの報告､それを想起させる内容は､情報の確認が困難な上､園･学校･スクール(塾)や他の保護者･利用者への悪影響やトラブルに繋がりかねないため､ご遠慮ください｡</p>
                </div>
                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>5. 園･学校･スクールの法律違反･衛生管理に関する意見は､適切な機関へご連絡ください｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]では､掲載園･学校･スクール(塾)の法律違反や衛生管理に関しての対応はいたしかねます｡利用者様個人で､適切な機関へご連絡ください｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>6. 法律違反や迷惑行為に関する投稿はご遠慮ください｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">法律違反や迷惑行為を行った事に関する投稿は､園･学校･スクール(塾)などの教育関係者や他の利用者の気分を害したり､法律違反や迷惑行為を助長する恐れがありますので､ご遠慮ください｡</p>
                    <p class="text-pink">【例】</p>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>｢運動会や授業参観の時は駐車場がいっぱいになるので､路上駐車している人が多い｣など､違反行為に関する投稿はNG</p>
                    </div>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>｢先生が頼りないので､毎日のように電話して先生に意見している｣など､迷惑行為に関する投稿はNG</p>
                    </div>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>7. 著作権や肖像権､プライバシーの侵害となる投稿はご遠慮ください</p>
                </div>
                <div>
                    <p class="text-medium-xs">他の著作物からの無断引用や､園･学校･スクール(塾)などの教育関係者や保護者､生徒･児童または第三者のプライバシーに触れる投稿はご遠慮ください｡</p>
                    <p class="text-medium-xs text-pink">≪画像投稿≫</p>
                    <div class="text-medium-xs d-flex">
                        <p><span class="text-pink">●</span> </p><p>	人物や､個人名･学年･住所などの個人情報および､個人宅や車など､個人を特定できる所有物が写りこんでいないものを投稿するか､写っている場合はその人物(子どもの場合は保護者)および所有者に許可を得た上で投稿するようお願いいたします</p>

                    </div>
                    <div class="text-medium-xs d-flex">

                        <p><span class="text-pink">●</span> </p><p>	許可を得た場合でも､個人名や車体ナンバー等､個人を特定できる恐れのある情報は､犯罪に繋がる恐れがある為､加工で該当箇所を消去するか､掲載をご遠慮ください</p>

                    </div>
                    <div class="text-medium-xs d-flex">

                        <p><span class="text-pink">●</span> </p><p>	行事の写真等､多数の人物が写っており､許可を得ることが困難な場合は､個人を特定できないほど画像を加工するか､園･学校･スクール(塾)を通して許可を得た上でご投稿ください</p>

                    </div>
                    <p class="text-medium-xs text-pink">≪文章≫</p>
                    <p class="text-medium-xs">雑誌や書籍､Webページなど､第三者の著作物を引用する場合は､著作権者に許可を得た上で投稿するようお願いいたします｡</p>

                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>8. 投稿画像をフォトギャラリーおよびTOP画像に反映させる場合は､説明文(キャプション)と出典元(権利の所在)の記入が必要です｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">園･学校･スクール(塾)情報ページのクチコミレビューに投稿した画像は､投稿時に｢ギャラリーに反映させる｣ボタンを選択することによって､ページ内のフォトギャラリーおよびTOP画像に反映されることがあります｡｢ギャラリーに反映させる｣を選択する場合は､どのような場面の画像なのかが分かるよう､説明文(キャプション)をご記入ください｡(キャプションの内容は､園･学校･スクール(塾)およびKODOMORE[コドモア]編集部によって変更される場合もあります｡あらかじめご了承ください｡)また､著作権の侵害防止のため､必ず画像出典元(権利の所在)を記入してください｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>9. 他のサイトのURLやリンクを貼る行為は禁止します｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]では､クチコミレビュー内に貼られたURLやリンクに対する安全性の確認は行っていません｡他サイトのURLやリンクを貼る行為は､コンピュータウイルスへの感染など､他の利用者に損害を与えたり､トラブルとなる可能性がある為禁止しています｡クチコミレビュー内にURLやリンクを発見した場合は､その投稿を削除する場合があります｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>10. 対価を受け取ることを目的とした投稿(ステルスマーケティング)は禁止します｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]では､対価を受け取ることを目的とした投稿(ステルスマーケティング)は禁止しています｡発覚した場合には､投稿の削除やアカウントの停止といった処置を行う場合があります｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>11. 園･学校･スクール関係者による書き込みは禁止します｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]のクチコミレビュー投稿は､公正な意見を前提としています｡当該園･学校･スクール(塾)などの教育関係者によるクチコミレビューは､公平性を欠くため禁止いたします｡当該園･学校･スクール(塾)などの教育関係者様は､園･学校･スクール(塾)情報ページ内｢当園･学校･スクール会員からのメッセージを投稿する｣からご投稿ください｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>12. 第三者を不快にさせない表現でご投稿ください｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]のサービスを､全ての利用者様が快適に使用できるよう､第三者に不快感を与えない､節度ある表現を心掛けるようお願いいたします｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>13. クチコミレビュー削除について｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">投稿されたクチコミレビューは､当社の判断により削除する場合がありますが､その際､削除事由はお応えできません｡また､クチコミレビュー削除依頼された場合､当社判断により削除しない場合がありますが､その際の事由もお応えしかねます｡あらかじめご了承ください｡</p>
                </div>
                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>14. 園･学校･スクールからの返信に対し､批判や中傷など､トラブルの元となるような投稿を返す行為は禁止します｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]では､利用者と園･学校･スクール(塾)がより良い関係を築くことができるよう､クチコミレビューへの返信機能を設けています｡園･学校･スクール(塾)から返信があった場合､それに対して反論､批判､中傷等､トラブルの原因となりかねない投稿を返すことは禁止とします｡もしトラブルへと発展した場合は､当該クチコミレビューおよび返信の削除､投稿者アカウントの利用停止措置などを取らせていただく場合があります｡
                        ※KODOMORE[コドモア]編集部では､上記以外の対応の他､その他クチコミレビューにおけるトラブルについて一切の責任を負わないものとします｡</p>
                </div>
                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>15. 園･学校･スクールへの質問や意見を含む内容の投稿はご遠慮ください｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]のクチコミレビューには､園･学校･スクール(塾)から返信が来ることがありますが､他の利用者のサイト利用の妨げとならないよう､やり取りは投稿を含めて2往復までといたします｡園･学校･スクールと利用者間の投稿が多数になるような質問や意見を含む内容の投稿はご遠慮いただきますようお願いいたします｡また､当該園･学校･スクール(塾)およびKODOMORE[コドモア]編集部が上記に反すると判断したクチコミレビューは､｢スクールホットライン｣への移行またはクチコミレビューの削除をさせていただく場合があります｡
                        ※｢スクールホットライン｣は全ての園･学校･スクールのページに対応しているものではありません｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>16. ご意見･お問い合わせ｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">当サイトレビューに関するご意見やご質問は､当サイト内<a class="menu-icon text-decoration" href="{{url('question')}}">｢お問合わせ｣</a>フォームよりご連絡ください｡</p>
                </div>

            </div>

            <div class="background_procedure_type mt-2 py-1 pl-2" id="heading1">

                <div class="flex">
                    <h6 class="mb-0 text-white w-100 text-title">
                        記事へのコメント
                    </h6>
                </div>
            </div>

            <div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>1. 著作権の侵害となる投稿はご遠慮ください｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">雑誌や書籍､Webページなど､第三者の著作物を引用する場合は､著作権者に許可を得た上で投稿するようお願いいたします｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>2. 批判や誹謗中傷など､他者の気分を害する恐れのある投稿はご遠慮ください｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">記事内容および記事に関する人物や記事作成者､他の投稿者などへの､批判や誹謗中傷は､その対象者および他の利用者の気分を害する恐れがある為､ご遠慮ください｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>3. 他のサイトのURLやリンクを貼る行為は禁止します｡対価を受け取ることを目的とした投稿(ステルスマーケティング)は禁止します｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]では､対価を受け取ることを目的とした投稿(ステルスマーケティング)は禁止しています｡発覚した場合には､投稿の削除やアカウントの停止といった処置を行う場合があります｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>4. 対価を受け取ることを目的とした投稿(ステルスマーケティング)は禁止します｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]では､対価を受け取ることを目的とした投稿(ステルスマーケティング)は禁止しています｡発覚した場合には､投稿の削除やアカウントの停止といった処置を行う場合があります｡
                    </p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>5. 第三者を不快にさせない表現でご投稿ください｡</p>
                </div>

                <div>
                    <p class="text-medium-xs">KODOMORE[コドモア]のサービスを､全ての利用者様が快適に使用できるよう､第三者に不快感を与えない､節度ある表現を心掛けるようお願いいたします｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>6. コメント削除について｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">投稿されたコメントは､当社の判断により削除する場合があります｡その際､削除事由はお応えできかねますので､あらかじめご了承ください｡</p>
                </div>

                <div class="mt-2 text-large-xs d-flex">
                    <p><span class="menu-icon">◆</span>7. ご意見･お問い合わせ｡</p>
                </div>
                <div>
                    <p class="text-medium-xs">当サイトコメントに関するご意見やご質問は､当サイト内<a class="menu-icon text-decoration" href="{{url('question')}}">｢お問合わせ｣</a>フォームよりご連絡ください｡</p>
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

            $("#move_garden").click(function(event) {
                var url = home_path;
                window.location.href = url;
            });
        });


    </script>
@endsection
