<nav class="menu overflow-auto" tabindex="0">
    <div class="smartphone-menu-trigger"></div>
    <header class="avatar pb-0">
        <img src="{{asset('img/garden_empty.png')}}" />
        <p class="mt-4 mb-2 text-menu-small text-white">School</p>
        <p class="my-2 text-menu-user text-white">{{$garden -> garden_name}}</p>
        <p class="my-2 text-menu-user text-white">{{session()->get(SESS_USERNAME)}}</p>

        @if(isset($tab_name))
            <input id="tab_name" style="display: none" value="{{$tab_name}}">
        @endif

        <div class="my-2 d-flex justify-content-center navbar-logout">
            <p class="my-2 px-2 logout text-menu-small" style="color: #B5DDDD; border-color: #B5DDDD">ログアウト</p>
        </div>


        <div class="form-inline d-flex justify-content-center md-form mt-0  rounded-pill py-1 px-3 mx-2">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input class="text-menu-small ml-2 w-75 mb-0 border-0" type="text" placeholder="Search"
                   aria-label="Search" id="garden_name">
        </div>

    </header>
    <ul class="pb-0">
        <div class="menu-border"></div>
        <li tabindex="0" class="py-3 background-menu icon-home "><p class="text-menu text-white">ホーム</p></li>
        <div class="menu-border"></div>
        <li tabindex="0" >
            <div id="menu_edit">

                <a class="flex collapsed background-menu icon-edit py-3 " data-toggle="collapse" href="#collapse_edit"
                   aria-expanded="false" aria-controls="collapse_edit" name="collapsed" relate-icon="collapsed-edit-rotate">

                    <p class="text-menu text-white">詳細ページ編集</p>
                    <i class="fa fa-plus fa-icon-right text-white" id="collapsed-edit-rotate"></i>
                </a>
                <div class="menu-border"></div>
            </div>

            <!-- Card body -->
            <div id="collapse_edit" class="collapse" aria-labelledby="menu_edit" >
                <ul class="p-0">

                    <li tabindex="0" class="py-1 background-sub-menu icon-edit-detail py-3"><p class="text-menu">詳細トップの登録･編集</p></li>
                    <div class="menu-border d-none"></div>
                    <li tabindex="0" class="py-1 background-child-menu" name="detail"><p class="text-menu">メイン情報</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="tag"><p class="text-menu">“ざっくり”OR検索</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="meta"><p class="text-menu">検索表示設定</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-sub-menu icon-edit-image py-3"><p class="text-menu">画像の登録･編集</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="info"><p class="text-menu">外観･内観･園庭など</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="uniform"><p class="text-menu">制服･オリジナルアイテム</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="staff"><p class="text-menu">園長･スタッフ</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="other"><p class="text-menu">その他</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="media"><p class="text-menu">メディアにて</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="review"><p class="text-menu">一般投稿･クチコミ</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="photo-gallery"><p class="text-menu">Photo Gallery</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-sub-menu icon-media py-3"><p class="text-menu">メディアにて紹介･掲載</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu" name="media-list"><p class="text-menu">内容作成</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-sub-menu icon-search py-3"><p class="text-menu">特徴</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu" name=""><p class="text-menu">特徴の登録</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-sub-menu icon-schedule py-3"><p class="text-menu">スケジュール</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu" name=""><p class="text-menu">年間行事</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu" name=""><p class="text-menu">園での1日</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu" name=""><p class="text-menu">送迎バスルート</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-sub-menu icon-edit-basic py-3"><p class="text-menu">基本情報の登録･編集</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu" name="main-uniform"><p class="text-menu">制服･オリジナルアイテム</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu "><p class="text-menu">教育方針･施設概要</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="price"><p class="text-menu">費用について</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-sub-menu icon-edit-guide py-3"><p class="text-menu">入園について登録･編集</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu "><p class="text-menu">入園について</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu "><p class="text-menu">資料＆願書を作る</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-sub-menu icon-edit-story py-3"><p class="text-menu">先生のお話</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu "><p class="text-menu">一覧＆新規作成</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-sub-menu icon-food py-3"><p class="text-menu">人気献立レシピ</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu "><p class="text-menu">一覧＆新規作成</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu "><p class="text-menu">園での1日</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-sub-menu icon-edit-faq py-3"><p class="text-menu">よくある質問FAQ</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="faq-childcare"><p class="text-menu">保育内容について</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="faq-food"><p class="text-menu">給食･おやつについて</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="faq-good"><p class="text-menu">持ち物について</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="faq-enter"><p class="text-menu">入園について</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-3 background-sub-menu icon-edit-request"><p class="text-menu">重要情報の変更依頼</p></li>
                    <div class="menu-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name="basic"><p class="text-menu">重要情報の変更依頼</p></li>
                    <div class="menu-child-border"></div>
                </ul>
            </div>


        </li>

        <li tabindex="0" >
            <div id="menu_event">

                <a class="flex collapsed background-menu icon-event py-3 " data-toggle="collapse" href="#collapse_event"
                   aria-expanded="false" aria-controls="collapse_event" name="collapsed" relate-icon="collapsed-event-rotate">

                    <p class="text-menu text-white">イベント情報</p>
                    <i class="fa fa-plus fa-icon-right text-white" id="collapsed-event-rotate"></i>
                </a>
                <div class="menu-border"></div>
            </div>

            <!-- Card body -->
            <div id="collapse_event" class="collapse" aria-labelledby="menu_event" >
                <ul class="p-0">
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">イベント情報</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">予約管理</p></li>
                    <div class="menu-child-border"></div>
                </ul>
            </div>


        </li>

        <li tabindex="0" >
            <div id="menu_blog">

                <a class="flex collapsed background-menu icon-blog py-3 " data-toggle="collapse" href="#collapse_blog"
                   aria-expanded="false" aria-controls="collapse_blog" name="collapsed" relate-icon="collapsed-blog-rotate">

                    <p class="text-menu text-white">ブログ</p>
                    <i class="fa fa-plus fa-icon-right text-white" id="collapsed-blog-rotate"></i>
                </a>
                <div class="menu-border"></div>
            </div>

            <!-- Card body -->
            <div id="collapse_blog" class="collapse" aria-labelledby="menu_blog" >
                <ul class="p-0">
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">一覧＆新規作成</p></li>
                    <div class="menu-child-border"></div>
                </ul>
            </div>


        </li>
        <li tabindex="0" >
            <div id="menu_communication">

                <a class="flex collapsed background-menu icon-communication py-3 " data-toggle="collapse" href="#collapse_communication"
                   aria-expanded="false" aria-controls="collapse_communication" name="collapsed" relate-icon="collapsed-communication-rotate">

                    <p class="text-menu text-white">コミュニケーション</p>
                    <i class="fa fa-plus fa-icon-right text-white" id="collapsed-communication-rotate"></i>
                </a>
                <div class="menu-border"></div>
            </div>

            <!-- Card body -->
            <div id="collapse_communication" class="collapse" aria-labelledby="menu_communication">
                <ul class="p-0">
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">園からのメッセージ</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">クチコミに返事をする</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">スクールホットライン</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">個別相談</p></li>
                    <div class="menu-child-border"></div>
                </ul>
            </div>


        </li>
        <li tabindex="0" >
            <div id="menu_snap">

                <a class="flex collapsed background-menu icon-snap py-3 " data-toggle="collapse" href="#collapse_snap"
                   aria-expanded="false" aria-controls="collapse_snap" name="collapsed" relate-icon="collapsed-snap-rotate">

                    <p class="text-menu text-white">KODOMORE<br>
                        スナップ</p>
                    <i class="fa fa-plus fa-icon-right text-white" id="collapsed-snap-rotate"></i>
                </a>
                <div class="menu-border"></div>
            </div>

            <!-- Card body -->
            <div id="collapse_snap" class="collapse" aria-labelledby="menu_snap" >
                <ul class="p-0">
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">画像登録</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">販売管理</p></li>
                    <div class="menu-child-border"></div>
                </ul>
            </div>


        </li>
        <li tabindex="0" >
            <div id="menu_setting">

                <a class="flex collapsed background-menu icon-setting py-3 " data-toggle="collapse" href="#collapse_setting"
                   aria-expanded="false" aria-controls="collapse_setting" name="collapsed" relate-icon="collapsed-setting-rotate">

                    <p class="text-menu text-white">設定</p>
                    <i class="fa fa-plus fa-icon-right text-white" id="collapsed-setting-rotate"></i>
                </a>
                <div class="menu-border"></div>
            </div>

            <!-- Card body -->
            <div id="collapse_setting" class="collapse" aria-labelledby="menu_setting" >
                <ul class="p-0">
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">アカウント情報</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">スタッフアカウント</p></li>
                    <div class="menu-child-border"></div>
                    <li tabindex="0" class="py-1 background-child-menu " name=""><p class="text-menu">詳細設定</p></li>
                    <div class="menu-child-border"></div>
                </ul>
            </div>


        </li>
        <li tabindex="0" class="py-3 background-sub-menu"><p class="text-menu pl-3" style="color: #333333">詳細ページの確認</p></li>
    </ul>
    <footer class="avatar pt-2" style="background-color: #D6F2F4;">
        <p class="text-menu p-0" style="color: #333333">スマートフォンの表示を見る</p>
        <p class="text-menu p-0" style="color: #333333; font-size: 12px !important;">※QRコードを読み取ってください</p>
        <div id="qr-code" class="mt-2">
        </div>
    </footer>
</nav>


