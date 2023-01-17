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
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">  > 利用方法およびガイドライン
        </div>

        <div class="card-header text-title d-flex">
            <img class="mt-1 img-icon height-1" style="min-width: unset" src="{{asset('img/warning.png')}}">
            <div class="ml-1" >
                <p class="text-medium-title pb-0 pt-1">園･学校･スクール(塾)情報の新規登録･編集機能</p>
                利用方法およびガイドライン
            </div>
        </div>

        <div class="card-header-border"></div>

        <div class="card-header">
            <p class="text-medium-xs">KODOMORE[コドモア]は､子どもたちとその保護者様の学びと子育てを応援する教育専門サイトです｡KODOMORE[コドモア]では､会員であれば誰でも園･学校･スクール(塾)情報の登録･編集を行うことができます｡以下のご利用方法･ガイドラインをご理解･同意いただいた上で､園･学校･スクール(塾)情報の登録･編集を行ってください｡
            </p>
        </div>
        <div class="background-white">
            <ul class="nav nav-tabs top-menu m-0 mt-2 mx-n-half row" id="myTab" role="tablist" style="padding-top: 1px; padding-bottom: 5px">
                <li class="nav-item col-6 px-0">
                    <a class="nav-link border-0 px-2 py-1 text-medium active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user"
                       aria-selected="true">一般会員用</a>
                </li>
                <li class="nav-item col-6 px-0">
                    <a class="nav-link border-0 px-2 py-1 text-medium" id="school-tab" data-toggle="tab" href="#company" role="tab" aria-controls="school"
                       aria-selected="false">スクール側</a>
                </li>

            </ul>
        </div>



        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">

                <div class="card-body pt-2">
                    <div class="background_procedure_type mt-2 py-1 pl-2" id="heading1">

                        <div class="flex">
                            <h6 class="mb-0 text-white w-100 text-title">
                                ご利用方法
                            </h6>
                        </div>
                    </div>

                    <div>
                        <div class="w-100 text-title">
                            <div class="flex mt-2 my-2">
                                <div class="top-menu left_bar">
                                </div>
                                <div class="w-100 py-1 text-title sub-menu pl-3" id="index_child">
                                    新規登録･編集可能項目
                                </div>
                            </div>
                        </div>
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span>施設名 <span class="menu-icon">◆</span>施設名(フリガナ) <span class="menu-icon">◆</span>所在地
                        </p>
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span>電話番号 <span class="menu-icon">◆</span>特徴アイコン <span class="menu-icon">◆</span>ギャラリー画像
                        </p>
                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span>園･学校紹介コメントおよびタイトル
                        </p>

                        <p class="text-large-xs">
                            <span class="menu-icon">◆</span>卒園児の主な進路  <span class="menu-icon">◆</span>保育対象年齢  <span class="menu-icon">◆</span>特徴
                        </p>
                    </div>


                    <div>
                        <div class="w-100 text-title">
                            <div class="flex mt-2 my-2">
                                <div class="top-menu left_bar">
                                </div>
                                <div class="w-100 py-1 text-title sub-menu pl-3" id="index_child">
                                    KODOMOREに登録の無い園･学校･スクール(塾)情報を新たに登録する場合
                                </div>
                            </div>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>1. </p><p> 会員ページにログイン</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>2. </p><p> TOPページ中央部｢保護者と生徒､スクールで公開情報を編集する｣より､登録したい園･学校･スクール(塾)名を検索</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>3. </p><p>検索結果に該当園･学校･スクール(塾)が無かった場合､｢登録申請する｣をクリック</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>4. </p><p>ガイドラインを確認の上､必要事項を記入し｢申請依頼する｣より登録申請を依頼</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>5. </p><p>コドモア編集部より登録アドレス宛に届いたメールの指定URLより､名称申請した園･学校･スクール(塾)の編集ページに入る</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>6. </p><p>ガイドラインを確認の上､編集可能な項目を記入</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>7. </p><p>｢編集を申請する｣をクリックして申請</p>
                        </div>
                        <p class="text-medium-xs mt-1">
                            ※一部項目のみの登録も可能ですが､施設名およびフリガナ､所在地､電話番号は必須項目となります｡
                        </p>
                        <p class="text-medium-xs">
                            ※画像を登録する場合は､必ず出典元を選択･表示してください｡
                        </p>
                        <p class="text-medium-xs">
                            ※既に登録のある施設の新規登録はできません｡必ず登録申請の前に検索し､重複する園が無いかご確認ください｡
                        </p>
                        <p class="text-medium-xs">
                            ※同一住所内に別の施設が入っている､電話番号を複数施設で共有しているなど､複数の施設で情報が重複している場合､｢同一住所(電話番号)の登録がありますがよろしいですか？｣という確認画面と共に表示される｢申請依頼する｣をクリックし､ご登録ください｡
                        </p>
                    </div>

                    <div>
                        <div class="w-100 text-title">
                            <div class="flex mt-2 my-2">
                                <div class="top-menu left_bar">
                                </div>
                                <div class="w-100 py-1 text-title sub-menu pl-3" id="index_child">
                                    登録済みの園･学校･スクール(塾)情報を編集する場合
                                </div>
                            </div>
                        </div>
                        <div class="w-100 text-medium-title" >
                            <div class="flex my-2 pl-1" style="background-color: #FFE4EA">
                                <p class="text-white" style="border-radius: 20px; background-color: #FF557E; padding: 0 5px !important; margin-bottom:1.2rem">
                                    A
                                </p>
                                <div class="w-100 py-1 pl-1" id="index_child" >
                                    当該園･学校･スクール(塾)情報ページより<br>編集する
                                </div>
                            </div>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>1. </p><p>	会員ページにログイン</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>2. </p><p>	当該園･学校･スクール(塾)ページ内｢みんなで学校(園)情報を編集する｣をクリック</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>3. </p><p>	ガイドラインを確認の上､編集･修正する項目を入力</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>4. </p><p>	｢編集･修正案を申請する｣をクリックして申請</p>
                        </div>
                        <div class="w-100 text-medium-title" >
                            <div class="flex my-2 pl-1" style="background-color: #FFE4EA">
                                <p class="text-white" style="border-radius: 20px; background-color: #FF557E;padding: 0 5px !important;margin-bottom:1.2rem">
                                    B
                                </p>
                                <div class="w-100 py-1 pl-1" id="index_child" >
                                    TOPページ中央｢保護者と生徒､スクールで公開情報を編集する｣より､編集する
                                </div>
                            </div>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>1. </p><p>	会員ページにログイン</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>2. </p><p>	｢保護者と生徒､スクールで公開情報を編集する｣より､編集したい施設名を検索</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>3. </p><p>	表示された施設名一覧より､該当する施設名を選択し､｢編集する｣をクリック</p>
                        </div>
                        <div class="text-large-xs d-flex">
                            <p>4. </p><p>	ガイドラインを確認の上､編集可能な項目を入力し､｢編集･修正案を申請する｣をクリックして申請</p>
                        </div>

                        <p class="text-medium-xs mt-1">
                            ※上記項目以外の内容に誤りを発見した場合は､編集ページ下部｢その他情報の誤りを報告する｣に記入し､｢編集･修正案を申請する｣より申請してください<br>
                            ※申請した編集･修正内容は､KODOMORE［コドモア］編集部および当該園･学校･スクール(塾)で審査および調査した上でサイト上に掲載されます｡その際､申請通り修正されない場合や､KODOMORE［コドモア］編集部によって加筆修正される場合があります｡あらかじめご了承ください｡
                        </p>

                    </div>

                    <div>
                        <div class="w-100 text-title">
                            <div class="flex mt-2 my-2">
                                <div class="top-menu left_bar">
                                </div>
                                <div class="w-100 py-1 text-title sub-menu pl-3" id="index_child">
                                    新規登録･編集ガイドライン
                                </div>
                            </div>
                        </div>

                        <p class="mt-1 text-medium-xs">KODOMORE[コドモア]に園･学校･スクール(塾)情報を新規登録および編集するにあたり､以下の通りガイドラインを設けます｡</p>
                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>1. </p><p>	正確な情報をご登録ください</p>
                        </div>
                        <div>
                            <p class="text-medium-xs">KODOMORE［コドモア］は､利用者の皆様の園･学校･スクール(塾)探しの参考としていただくためのサイトです｡誤った情報は､他の利用者の園･学校･スクール(塾)探しの妨げとなる他､園･学校･スクール(塾)の不利益や迷惑となる恐れがあります｡情報を登録･編集する際は､事前に園･学校･スクール(塾)に情報を確認し､入力情報に誤りがないか確認した上でご登録ください｡</p>
                            <p class="text-pink">【例】</p>
                            <div class="text-medium-xs d-flex">
                                <p><span class="text-pink">●</span> </p><p>｢○○第2幼稚園｣を｢○○第二幼稚園｣とするなど､不正確な表記はNG</p>
                            </div>
                            <div class="text-medium-xs d-flex">
                                <p><span class="text-pink">●</span> </p><p>ビル内にある園･学校･スクール(塾)の住所にビル名を記載しないなど､不備のある情報はNG</p>
                            </div>
                        </div>
                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>2. 紹介コメントは具体的な内容でご登録ください｡</p>
                        </div>
                        <div>
                            <p class="text-medium-xs">他の利用者の参考となるよう､紹介コメントは具体的に分かりやすい内容でご登録ください｡</p>
                            <p class="text-pink">【例】</p>
                            <div class="text-medium-xs d-flex">
                                <p><span class="text-pink">●</span> </p><p>	｢教育目標は“○○”｣の一文のみなど､短文のみの投稿はNG</p>
                            </div>
                            <div class="text-medium-xs d-flex">
                                <p><span class="text-pink">●</span> </p><p>	｢楽しい行事が多い｣など､具体例に欠けるものはNG</p>
                            </div>
                            <div class="text-medium-xs d-flex">
                                <p><span class="text-pink">●</span> </p><p>	｢■■という時間を設けるなど､“○○”という教育目標のもと､子どもたちの豊かな心を育むための取り組みをしています｡｣
                                    や｢運動会､発表会､作品展示会など､子どもたちの頑張る姿が見られる行事がたくさんあります｡｣など､具体的な保育内容や教育方針､行事を記載したものはOK</p>
                            </div>
                        </div>

                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>3. 著作権･肖像権にご配慮ください</p>
                        </div>
                        <div>
                            <p class="text-medium-xs">著作権･肖像権の保護のため､以下の点にご配慮の上ご登録ください｡</p>
                            <p class="text-medium-xs text-pink">≪紹介コメント･画像キャプション≫</p>
                            <p class="text-medium-xs">園･学校･スクール(塾)のホームページ等､他の著作物からの文章(抜粋も含む)の転載は､著作権の侵害に当たるためご遠慮ください｡他のサイトや著作物などを参考に文章を作成する場合､文章の構成､語句などが､原文と比較し5割以上一致しないよう､編集者独自の文章で作成いただきますようお願いいたします｡また､紹介コメントや画像キャプションの内容は､園･学校･スクール(塾)およびKODOMORE［コドモア］編集部によって変更される場合もあります｡あらかじめご了承ください｡</p>
                            <p class="text-medium-xs text-pink">≪画像≫</p>
                            <div class="text-medium-xs d-flex">
                                <p><span class="text-pink">●</span> </p><p>	登録する画像には､必ず出典元を選択･表示してください｡</p>

                            </div>
                            <div class="text-medium-xs d-flex">

                                <p><span class="text-pink">●</span> </p><p>	人物や､個人名･学年･住所などの個人情報および､個人宅や車など､
                                    個人を特定できる所有物が写りこんでいないものを投稿するか､
                                    写っている場合はその人物(子どもの場合は保護者)および所有者に許可を得た上でご投稿ください｡</p>

                            </div>
                            <div class="text-medium-xs d-flex">

                                <p><span class="text-pink">●</span> </p><p>	許可を得た場合でも､個人名や車体ナンバー等､個人を特定できる恐れのある情報は､
                                    犯罪に繋がる恐れがある為､加工で該当箇所を消去するか､掲載をご遠慮ください｡</p>

                            </div>
                            <div class="text-medium-xs d-flex">
                                <p><span class="text-pink">●</span> </p><p>	行事の画像等､多数の人物が写っており､許可を得ることが困難な場合は､個人を特定できないほど画像を加工するか､園･学校･スクール(塾)を通して許可を得た上でご投稿ください｡</p>
                            </div>
                        </div>

                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>4. 園･学校･スクール(塾)公式ホームページ以外のサイトのURLやリンクの登録はできません</p>
                        </div>

                        <div>
                            <p class="text-medium-xs">KODOMORE［コドモア］では､編集･修正の際に貼られたURLやリンクに対する安全性や情報の正確性の確認は行っていません｡園･学校･スクール(塾)の公式ホームページ以外のサイトのURLやリンクを貼る行為は､コンピュータウイルスへの感染など､他の利用者に損害を与えたり､誤情報の掲載などのトラブルとなる可能性がある為､登録しないでください｡</p>
                        </div>

                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>5. 批判や誹謗中傷につながる､否定的なコメントやキャプションの登録はご遠慮ください</p>
                        </div>

                        <div>
                            <p class="text-medium-xs">園･学校･スクール(塾)への批判や誹謗中傷につながるような否定的なコメントは､園･学校･スクール(塾)およびその関係者に対し､迷惑や不利益となる恐れがある為､ご遠慮ください｡</p>
                        </div>

                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>6. 第三者を不快にさせない表現でご投稿ください</p>
                        </div>

                        <div>
                            <p class="text-medium-xs">KODOMORE[コドモア]のサービスを､全ての利用者様が快適に使用できるよう､第三者に不快感を与えない､節度ある表現を心掛けるようお願いいたします｡</p>
                        </div>

                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>7. 既に登録のある園･学校･スクール(塾)情報の登録はできません</p>
                        </div>

                        <div>
                            <p class="text-medium-xs">KODOMORE[コドモア]では､情報の混乱を避けるため､１施設につき１ページのみの登録となっています｡
                                同一施設を複数登録することがないよう､既に登録済みでないかを確認の上ご登録ください｡既
                                に登録されている園･学校･スクール(塾)は､新規登録できませんが､名称や電話番号の情報が誤って登録されている場合､同一施設が登録されてしまう可能性があります｡
                                情報に誤りの無いようご確認の上ご登録ください｡</p>
                        </div>

                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>8. 登録内容は上書きされることがあります</p>
                        </div>

                        <div>
                            <p class="text-medium-xs">一度登録した内容は､他の利用者および園･学校･スクール(塾)･KODOMORE［コドモア］編集部によって上書きされる場合があります｡一般会員が登録･編集したページが上書きされた場合､KODOMORE［コドモア］編集部よりその報告や修正事由などをお伝えすることはしません｡あらかじめご了承ください｡</p>
                        </div>

                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>9. </p><p>	登録の削除について</p>
                        </div>
                        <div>
                            <p class="text-medium-xs">登録された園･学校･スクール(塾)情報は､当社の判断により削除される場合があります｡その際､削除事由はお応えできかねますので､ご了承ください｡</p>
                        </div>

                        <div class="mt-2 text-large-xs d-flex">
                            <p><span class="menu-icon">◆</span>10. </p><p>	ご意見お問い合わせ</p>
                        </div>
                        <div>
                            <p class="text-medium-xs">園･学校･スクール(塾)登録に関するご意見やご質問は､当サイト内<a class="menu-icon text-decoration" href="{{url('question')}}">｢お問合わせ｣</a>フォームよりご連絡ください｡</p>
                        </div>

                    </div>






                </div>
            </div>
            <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="school-tab">
                <div class="card-body">

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
