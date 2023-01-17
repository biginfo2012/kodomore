@extends('layouts.app')

@section('title')
    全国の幼稚園･保育所 入園
@endsection



@section('nav')
    @include('layouts.navbar')
@endsection

@section('css4page')
    <style>

        .top-badge {
            position: absolute;
            right: 0px;
            bottom: 0px;
            width: 8em;
        }



        .txt-small-date {
            font-size: 11px;
            color: #cdcdcd;
            font-family: "Times New Roman"
        }


        .img-height-24{
            height: 24px;
        }

        #move_news {
            font-size: 0.7rem;
            text-align: right;
            margin-right: 1.25rem;
            margin-top: -1rem;
            text-decoration: underline;
        }

        #collapsed-prefecture-rotate {
            font-size: 2rem;
            color: #cdcdcd;
        }


        .drop-down {
            width: auto;
            height: 1.25rem;
        }

        .border-radius-none{
            border: none !important;
            border-radius: 0 !important;
        }
        .margin-top-4{
            margin-top: -4px;
        }
        .background_procedure_type{
            background-image: url('{{asset('img/procedure_type_background.png')}}');
            background-size: cover;
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
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >  入園までの手続き
        </div>
        <div class="card-header text-title">
            <img class="img-icon img-height-24 mb-2" src="{{asset('img/procedure-icon.png')}}">
            <div style="display: inline">
                入園までの手続き
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="form-inline text-medium-light">
                初めてのお子様の入園は不安とわからないことがいっぱい…｡来年度入園させたいけどどうすればいいの？準備はいつから始めるの？手続きに必要なものって何があるの？最初は誰でも戸惑いますよね｡さらに､幼稚園､保育所､こども園と､いろいろな園があって園選びもわからないことがいっぱい！そんなママのために､施設別に園選びから入園までの流れや手続きの方法､気を付けるポイントなどを簡単にまとめました｡ぜひ､参考にしてみてくださいね｡
            </div>

            <div class="accordion md-accordion" id="accordionEx"  aria-multiselectable="false">

                <!-- Accordion card -->
                <div class="card mt-2 border-radius-none">

                    <!-- Card header -->
                    <div class="card-header background_procedure_type py-2 pl-2" id="heading1">

                        <a class="flex collapsed" data-toggle="collapse" href="#collapse1"
                           aria-expanded="false" aria-controls="collapse1" id="collapsed-garden" name="collapsed" relate-icon="collapsed-garden-rotate">
                            <h6 class="mb-0 text-white w-100 text-title">
                                幼稚園
                            </h6>
                        </a>
                    </div>
                    <div class="text-center margin-top-4">
                        <img class="height-2 img-icon mr-1" style="margin-top: -1rem" src="{{asset('img/omiss.png')}}" id="collapsed-garden-rotate">
                    </div>

                    <!-- Card body -->
                    <div id="collapse1" class="collapse" aria-labelledby="heading1" >
                        <div class="text-normal mt-2">
                           <div>
                               <img src="{{asset('img/procedure_garden_image1.png')}}">
                           </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ①幼稚園の見学､説明会への参加
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    入園前年度の５月ぐらいから､各園で説明会､見学会､開放イベントなどが続々と始まります｡幼稚園を決める前に､まずは気になった幼稚園の情報を集め､行事などに参加し､園の方針や雰囲気がお子様に合っているかを見定めてください｡そして､入園体験やプレなどで､お子様と園児たち､先生たちとの様子を参考にして､楽しく通える幼稚園を見つけてあげてください｡また､説明会への参加が入園条件となる園や､プレに入っていた方が入園有利な場合があるので､そういった情報は早めに入手するようにしましょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ②入園募集の届出申請期間の確認
                                    </div>
                                </div>
                                <div class="w-100 text-medium-xs">
                                    私立の幼稚園の募集は､園によって異なります｡願書の配布時期･受付時期は入園希望の幼稚園ホームページなどで細かくチェックしたり､見学会などの際に園の方に確認してみてください｡<br>
                                    公立の幼稚園の募集は市によって時期や申し込み方法が違いますので､居住地の市役所ホームページなどで確認し､募集期間を見逃さないように気を付けてください｡(定員を超えた場合は抽選になることが多いようです｡)
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ③申し込みに必要な書類を入手
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    申し込み用紙は､入園希望の園で直接受け取れます｡また､ホームページよりダウンロードできる園もあります｡公立幼稚園の場合は､市役所ホームページよりダウンロードすることも可能です｡また､用紙の提出は無く､ウェブサイトから申し込む園もありますので､園の入園案内のページをしっかり読みましょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ④入園申込書を提出
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    申し込み用紙に不備が無いように記入し､幼稚園に提出します｡各園で提出方法なども違いますので､ホームページでしっかり確認しましょう｡私立の場合､募集予定人数になり次第閉め切る園と､募集期間後に改めて抽選や面接などで決める園があるので注意してください｡公立の場合は､必ず受付期間内に直接幼稚園に申し込みましょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ⑤面接･試験･抽選など
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    選考方法は各園で違います｡基本的には定員内であれば入園申し込み後､健康診断､面接により決定となりますが､定員を超えた場合は抽選をして決める場合もあります｡入園試験などがある場合は､園より配布された資料をよく読み､事前に経験者から､どのような試験があるのか､どんな服装で臨むのが良いかなどの情報を集めておくと良いでしょう｡検定料や入園料を試験当日に払う園もあるので､事前に封筒に入れて用意しておくと安心です｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ⑥手続きをする
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    入園が決まったら､入園手続きをします｡手続きの方法や提出書類などは､園によって異なります｡漏れがないように書類へ記入､必要書類を用意し提出してください｡健康診断書が必要な場合もありますので､提出期限に間に合うように準備をしましょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ⑦園服･教材などの受け渡し
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    手続きが終わると､園服や教材の申し込み､受け渡しが行われます｡園指定のものは､園に行き､サイズを確認して申し込むことが多いようです｡園服などは､お子様の卒園までの成長なども考慮しながら購入しましょう｡必要な園グッズなども園によって違います｡商品､サイズ､手作りの指定有無などを確認し､入園式に間に合うように準備しましょう｡これから過ごす園生活をお子様が楽しく過ごせるように一緒に選んでみてはいかがでしょうか｡
                                </div>
                            </div>
                            <div class="w-100 text-medium-xs my-3">
                                ※2020年6月現在
                                ※自治体､各施設によって違いがあります｡詳しくはお問合わせください｡
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accordion card -->
                <div class="card mt-2 border-radius-none">

                    <!-- Card header -->
                    <div class="card-header background_procedure_type py-2 pl-2" id="heading2">

                        <a class="flex collapsed" data-toggle="collapse" href="#collapse2"
                           aria-expanded="false" aria-controls="collapse2" id="collapsed-nursery" name="collapsed" relate-icon="collapsed-nursery-rotate">
                            <h6 class="mb-0 text-white w-100 text-title">
                                保育所(園)
                            </h6>
                        </a>
                    </div>
                    <div class="text-center margin-top-4">
                        <img class="height-2 img-icon mr-1" style="margin-top: -1rem" src="{{asset('img/omiss.png')}}" id="collapsed-nursery-rotate">
                    </div>

                    <!-- Card body -->
                    <div id="collapse2" class="collapse" aria-labelledby="heading2" >
                        <div class="text-normal mt-2">
                            <div>
                                <img src="{{asset('img/procedure_garden_image2.png')}}">
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ①親子教室､園庭開放､一時預かり保育を利用
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    保育所では､未就園児を持つ親子を対象に､親子でのふれあい遊びを中心とした｢親子教室｣や｢子育てサロン｣を設けている園が多く､入園前に参加して園の様子をうかがうことができます｡また､園庭開放の日に園庭で園児たちと遊ばせたり､一時預かりなどを利用して､実際に希望する保育所で体験してみるのもいいと思います｡認可保育所の申し込みは第３希望以上を記入することが多いため､育児休業の間に希望保育所を３か所以上は回って探しておくと安心です｡また､認可保育所の選考から外れることも考えて認可外の所も見ておくと良いでしょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ②保育所の利用基準
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    保育所は両親が共働きや病気などで｢保育に欠ける｣ために預ける場所であり､希望者が簡単に入所できるわけではありません｡認可保育所の場合､保育所を利用したいと思っても､定員オーバーになると自治体が行う入所選考により､入れない場合もあります｡家族の就労形態や家庭･子どもの状況を配慮し保育を必要とする優先順位を付けて決定します｡４月から働く予定では利用基準から外れますのでご注意ください｡また､市によって保育の必要な事由や利用できる期間が異なります｡必ず､市のホームページで該当するかを確認して申し込みましょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ③保育利用申し込みの確認
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    認可保育所の場合は､各自治体で決まった期間に受付をしています｡市役所などのホームページや広報などで､受付期間をしっかりチェックしましょう｡詳細は自治体のウェブサイトで確認し､早めに入所案内などを入手し､受付オフシーズンに窓口などで相談に乗ってもらうのもいいかもしれません｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ④認可保育所の申し込みに必要な書類
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    ○支給認定申請書･保育利用申込書<br>
                                    ○家庭でお子さんの保育ができない状況を確認できる書類(就労証明など)※両親共に必要<br>
                                    ○収入､税額の確認できる書類(世帯の市民税が確認できる書類など)<br>
                                    ○認印<br>
                                    ○その他の個別で必要な提出書類(病気などの診断書､障害手帳､母子手帳､在学証明書など)<br>
                                    ※書類に不備があると再度役所に行かなければならないので不備がないように確認しましょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ⑤認可保育所の利用申込書を提出､<br>入所審査､選考
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    申込期日に間に合うように必要書類を揃え､記入漏れがないように確認し､提出します｡選考後､どの希望の保育所に決まったのか内定通知が届きます｡入所待ちとなった場合は､認可外保育所の手続きや二次募集などを行っている保育所､幼稚園などを探し､対策をとりましょう｡
                                    また､空きがある保育所の入園選考は月に1度行われますので､毎月ごとの申し込み期限を確認しましょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ⑥面接､健康診断
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    認可保育所の場合､内定通知で決まった保育所で､面接､健康診断が行われます｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ⑦入所決定
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    認可保育所の場合､入所が決定すると､保育時間帯などの通知が届きます｡手続きや必要な持ち物などは､各保育所によって異なるので､渡された書類で確認し､提出書類は漏れがないように記入して､期日を守って提出しましょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ⑧グッズなどの受け渡し
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    手続きが終わると､必要なグッズなどの申し込み､受け渡しが行われます｡指定のものは､直接行き､サイズを確認して申し込むことが多いようです｡必要なグッズなども保育所によって違います｡商品､サイズ､手作りの指定有無などを確認し､入所式に間に合うように準備しましょう｡これから過ごす園生活をお子様が楽しく過ごせるように一緒に選んでみてはいかがでしょうか｡
                                </div>
                            </div>
                            <div class="w-100 text-medium-xs my-3">
                                ※2020年6月現在
                                ※自治体､各施設によって違いがあります｡詳しくはお問合わせください｡
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion card -->
                <div class="card mt-2 border-radius-none">

                    <!-- Card header -->
                    <div class="card-header background_procedure_type py-2 pl-2" id="heading3">

                        <a class="flex collapsed" data-toggle="collapse" href="#collapse3"
                           aria-expanded="false" aria-controls="collapse3" id="collapsed-auth" name="collapsed" relate-icon="collapsed-auth-rotate">
                            <h6 class="mb-0 text-white w-100 text-title">
                                認定こども園
                            </h6>
                        </a>
                    </div>
                    <div class="text-center margin-top-4">
                        <img class="height-2 img-icon mr-1" style="margin-top: -1rem" src="{{asset('img/omiss.png')}}" id="collapsed-auth-rotate">
                    </div>

                    <!-- Card body -->
                    <div id="collapse3" class="collapse" aria-labelledby="heading3" >
                        <div class="text-normal mt-2">
                            <div>
                                <img src="{{asset('img/procedure_garden_image3.png')}}">
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ①希望の園がどのタイプにあたるのか確認する
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    認定こども園にはいろいろなタイプがあり､大まかに分けると幼稚園型､保育園型､幼保連携型､地方裁量型(認可外)の４種類に分かれます(分け方や名称については､各地域や施設によって異なります)｡ホームページや園に問い合わせるなどし､入所規定などを確認しましょう｡幼稚園や保育園同様､見学会､開放イベント､一時預かりなどがあれば､体験してみましょう｡認定こども園には､地域実情や保護者のニーズに応じて選択が可能となるような多様なタイプがありますので､いろいろ探してみてください｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ②申し込み
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    入園方法なども地域や施設によって異なりますが､各園や自治体のホームページなどで受付期間などを確認しましょう｡申し込み期間内に必要資料を揃え､第一希望の園に直接申し込む方法や居住地の役所の子育て支援関連部署において支給認定を受けてから園に申し込む方法があります｡申し込みは第３希望以上を記入することが多いため､３か所以上は回って探しておくのが良いでしょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ③必要書類
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    認定こども園のタイプにより､様々ですが､元来､幼稚園か保育園かで必要書類が変わってきます｡幼稚園や保育園の場合を参照にし､第一希望の園で必要書類を確認し､不備がないように揃え､記入して提出しましょう｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ④支給認定を受ける
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    書類の提出後､自治体で､家族の就労形態､子どもの年齢や保育の必要性に応じて､１号認定から３号認定まで３つの区分に分けられ､利用施設や利用時間が決まります｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ⑤面接､健康診断､入園
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    利用先こども園で､面接､健康診断などが行われ､入園が決定し､入園の手続きをします｡
                                </div>
                            </div>
                            <div class="w-100 mb-4">
                                <div class="flex mt-1 my-2">
                                    <div class="top-menu left_bar">
                                    </div>
                                    <div class="w-100 text-title sub-menu pl-3">
                                        ⑥園服･園グッズなどの受け渡し
                                    </div>

                                </div>
                                <div class="w-100 text-medium-xs">
                                    手続きが終わると､園服や園グッズの申し込み､受け渡しが行われます｡園指定のものは､園に行き､サイズを確認して申し込むことが多いようです｡園服などは､お子様の卒園までの成長なども考慮しながら購入しましょう｡必要な園グッズなども園によって違います｡商品､サイズ､手作りの指定有無などを確認し､入園式に間に合うように準備しましょう｡これから過ごす園生活をお子様が楽しく過ごせるように一緒に選んでみてはいかがでしょうか｡
                                </div>
                            </div>
                            <div class="w-100 text-medium-xs my-3">
                                ※2020年6月現在
                                ※自治体､各施設によって違いがあります｡詳しくはお問合わせください｡
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <!--Accordion wrapper-->




    <!-- Accordion wrapper -->
@endsection

@section('footer_image')
    <img src="{{ asset('img/footer_2.png') }}" style="width: 100%">
@endsection

@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 2rem;  margin-top: -140px">
        <div class="card-body background-opacity">

            <img src="{{asset('img/top.png')}}" class="img-top" id="move_welcome" style="bottom: -.5rem">
            <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>
@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {

            var home_path = $("#home_path").val();
            $("#move_welcome").click(function(event) {
                window.location.href = home_path + '/garden';
                //window.location.href = 'http://example.com';
            });

            $("#icon_move_home").click(function(event) {
                //window.location.href = home_path + '/school/' + prefecture_id;
                window.location.href = home_path + '/garden';
            });




            $(".prefecture").click(function(event) {
                var selectedId = $(this).attr('prefecture-id');
                window.location.href = home_path + '/school/' + selectedId;
                //window.location.href = 'http://example.com';
            });

        });
    </script>
@endsection
