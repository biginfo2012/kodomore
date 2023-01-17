<!--Navbar -->
<nav class=" navbar box-shadow-none pr-2">
    <a class="navbar-brand p-0" style="margin-right: 8px; display: flex"><img class="title-kodomore img-kodo-height" src="<?=asset('img/kodomore.png');?>"></a>
    <div class="text-small txt-family-kosugi nav-text-container img-kodo-height">
        @if(isset($menuComments))
            @foreach($menuComments as $comment)
                <p class="mb-0" style="word-spacing: -3px !important;">{{$comment}}</p>
            @endforeach
        @endif
    </div>
    @if(!isset($login))
        @if(!empty(session()->get(SESS_UID)))
{{--            <div class="navbar-toggler text-black text-center ml-3 navbar-logout" >--}}
{{--                <img src="{{asset('img/small_logout.png')}}" style="height: 18px; margin-left: 8px;">--}}
{{--                <p class="text-menu mt-2 ">ログアウト</p>--}}
{{--            </div>--}}
            <div style="width: 56px;">
            </div>

        @else
            <div class="navbar-toggler text-black text-center ml-3 navbar-login" >
                <img src="{{asset('img/login-account.png')}}" style="margin-left: 0;">
                <p class="text-menu mt-1">アカウント</p>
            </div>
        @endif
    @else
        <div style="width: 56px;">
        </div>
    @endif

    @if(isset($login) && $login == 'register')
        <div style="width: 36px;">
        </div>
    @else
        <div class="navbar-toggler text-center text-black ml-1 navbar-menu" data-toggle="collapse" data-target="#navbarSupportedContent-4"
             aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation" style="">
            <img class="icon-menu " src="{{asset('img/menu-navbar.png')}}" >
            <img class="d-none x-icon " src="{{asset('img/x-icon-menu.png')}}" >
            <p class="text-menu mt-1">メニュー</p>
        </div>

        <div class="collapse navbar-collapse nav-bar-custom p-3 z-depth-5 scrollable" id="navbarSupportedContent-4" style="display: none !important; z-index: 1050;">
            <ul class="navbar-nav ml-auto">
                <div class="form-group">
                    @if(!empty(session()->get(SESS_UID)))
                        {{--                <div class="col-12 text-black text-center title-background navbar-logout d-flex pl-4 py-2" >--}}
                        {{--                    <img class="mr-2 img-icon height-half" style="width: 24px !important; height: 24px !important;" src="{{asset('img/person.png')}}">--}}
                        {{--                    <p class="text-menu mt-2 text-normal-title">こんにちは､{{session()->get(SESS_USERNAME)}}さん</p>--}}
                        {{--                </div>--}}
                        {{--                <div class="mt-2 text-black text-center mt-4 mx-3 navbar-logout d-flex" style="border-bottom: 1px solid">--}}
                        {{--                    <img class="img-icon height-half" style="width: 24px !important; height: 24px !important;" src="{{asset('img/small_logout.png')}}">--}}
                        {{--                    <p class="text-menu mt-2">ログアウト</p>--}}
                        {{--                </div>--}}
                        <div class="text-black text-center my-1 ml-1 navbar-logout d-flex pl-1 pb-1 mb-3" style="border-bottom: 1px solid #333333">
                            <img class="mr-2 img-icon height-half"  src="{{asset('img/small_logout.png')}}">
                            <p class="text-medium-xs my-1">ログアウト</p>
                        </div>
                        <div class="text-black text-center ml-1 d-flex navbar-my pl-1 pb-1 mb-3" style="border-bottom: 1px solid #333333">
                            <img class="mr-2 img-icon height-half" style="" src="{{asset('img/person-icon-nav.png')}}">
                            <p class="text-medium-xs my-1">マイページ</p>
                        </div>
                    @else

                        {{--                    <div class="col-12 text-black text-center title-background navbar-logout d-flex pl-4 py-2 mb-4" >--}}
                        {{--                        <img class="mr-2 img-icon height-half" style="width: 24px !important; height: 24px !important;" src="{{asset('img/person.png')}}">--}}
                        {{--                        <p class="my-1 text-normal-title">こんにちは､◯◯ ◯◯さん</p>--}}
                        {{--                    </div>--}}
                        <div class="text-black text-center my-1 ml-1 navbar-login d-flex pl-1 pb-1 mb-3" style="border-bottom: 1px solid #333333">
                            <img class="mr-2 img-icon height-half"  src="{{asset('img/small_login.png')}}">
                            <p class="text-medium-xs my-1">ログイン･新規会員登録</p>
                        </div>
                        <div class="text-black text-center ml-1 navbar-login d-flex pl-1 pb-1 mb-3" style="border-bottom: 1px solid #333333">
                            <img class="mr-2 img-icon height-half" style="" src="{{asset('img/person-icon-nav.png')}}">
                            <p class="text-medium-xs my-1">マイページ</p>
                        </div>
                    @endif

                    <div class="text-black text-center ml-1 navbar-garden d-flex pl-1 pb-1 mb-0" style="border-bottom: 1px dashed #CCCCCC">
                        <img class="mr-2 img-icon height-half" style="" src="{{asset('img/info-nav.png')}}">
                        <p class="text-medium-xs my-1">幼稚園･保育所 情報</p>
                    </div>
                    <div class="text-black text-center ml-1 navbar-choose d-flex pl-3 pb-1 pt-1 mb-0" style="border-bottom: 1px dashed #CCCCCC; background-color: white">
                        <img class="mr-2 sub-menu-img" style="" src="{{asset('img/red-next.png')}}">
                        <p class="text-normal my-1">幼稚園･保育所･こども園どう選ぶ？</p>
                    </div>
                    <div class="text-black text-center ml-1 navbar-procedure d-flex pl-3 pb-1 mb-3 pt-1" style="border-bottom: 1px solid #333333; background-color: white">
                        <img class="mr-2 sub-menu-img" style="" src="{{asset('img/red-next.png')}}">
                        <p class="text-normal my-1">入園までの手続き</p>
                    </div>
                    <div class="text-black text-center ml-1 navbar-logout d-flex text-gray pl-1 pb-1 mb-3" style="border-bottom: 1px solid #333333">
                        <img class="mr-2 img-icon height-half"  src="{{asset('img/info-primary-nav.png')}}">
                        <p class="text-medium-xs my-1">小学校 受験と情報</p>
                    </div>
                    <div class="text-black text-center ml-1 navbar-logout d-flex text-gray pl-1 pb-1 mb-3" style="border-bottom: 1px solid #333333">
                        <img class="mr-2 img-icon height-half"  src="{{asset('img/info-middle-nav.png')}}">
                        <p class="text-medium-xs my-1">中学校 受験と情報</p>
                    </div>
                    <div class="text-black text-center ml-1 navbar-logout d-flex text-gray pl-1 pb-1 mb-3" style="border-bottom: 1px solid #333333">
                        <img class="mr-2 img-icon height-half"  src="{{asset('img/info-high-nav.png')}}">
                        <p class="text-medium-xs my-1">高校 受験と情報</p>
                    </div>
                    <div class="text-black text-center ml-1 navbar-logout d-flex text-gray pl-1 pb-1 mb-5" style="border-bottom: 1px solid #333333">
                        <img class="mr-2 img-icon height-half"  src="{{asset('img/info-school-nav.png')}}">
                        <p class="text-medium-xs my-1">塾･スクール</p>
                    </div>

                    <div class="text-black text-center ml-1 navbar-guide d-flex pb-1 mb-3 px-4 mt-5" style="border-bottom: 1px solid #333333">
                        <p class="text-small">利用規約</p>
                    </div>
                    <div class="text-black text-center ml-1 navbar-privacy d-flex pb-1 mb-3 px-4" style="border-bottom: 1px solid #333333">
                        <p class="text-small">プライバシーポリシー</p>
                    </div>
                    <div class="text-black text-center ml-1 navbar-question    d-flex pb-1 mb-3 px-4" style="border-bottom: 1px solid #333333">
                        <p class="text-small ">お問合わせ</p>
                    </div>
                    <div class="text-black text-center ml-1 navbar-republic d-flex pb-1 mb-2 px-4" style="border-bottom: 1px solid #333333">
                        <p class="text-small">掲載ご希望の園･学校関係者様へ</p>
                    </div>



                </div>

            </ul>
        </div>
    @endif





</nav>
<!--/.Navbar -->
