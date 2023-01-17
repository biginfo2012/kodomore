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

        .search-school::placeholder {
            color: #31bCC7;
        }
        .btn-outline-default {
            border: 1px solid #2bbbad !important;
        }
        .custom-control-label::before {
            top: 1px;
            left: -1.2rem !important;
        }
        .custom-control-label::after {
            top: 1px;
            left: -1.2rem !important;
        }
        .custom-control-label1::before {
            top: 2.5px !important;
            left: -1.2rem !important;
        }
        .custom-control-label1::after {
            top: 2.5px !important;
            left: -1.2rem !important;
        }
        .custom-control-label2::before {
            top: 2px !important;
        }
        .custom-control-label2::after {
            top: 2px !important;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label:before{
            background-color: #ABDBE1;
            border-color: #ABDBE1;
        }

    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex pt-1 pb-0">
        </div>

        <div class="card-body text-title pb-2">
            <img class="height-4 img-icon mb-1" src="{{asset('img/fa-edit.png')}}"> パスワード設定＆お子様(お孫様)登録
        </div>

        <div class="card-body pb-1 pt-0">
            <div id="add_old_school" class="d-none">
                <div class="sky-border p-2" id="old_index">
                    <input  class="mt-1 form-control text-small search-school require" placeholder="施設名などフリー検索"  id="search_str_index"  style="border-color: #31BCC7 !important;">
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " name="old_prefecture" id="search_prefecture_index">
                        <option value="0">都道府県 検索</option>
                        @foreach($prefectures as $index => $prefecture)
                            @if($prefecture->prefecture_name == '岐阜県' || $prefecture->prefecture_name == '愛知県')
                                <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                            @else
                                <option class="text-gray" value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                            @endif
                        @endforeach

                    </select>
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " id="search_city_index">
                        <option value="1">市区町村 検索</option>

                    </select>
                    <div class="mt-1 flex justify-content-center">
                        <button class="gray-btn-gradient mx-0 btn btn-outline-default waves-effect btn-full btn-title text-white rounded" name="btn_old_search" id="btn_search_index" style="border: 0 !important;">検索 </button><i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
                    </div>
                    <div id="old_garden_select_index">

                    </div>
                    <input  class="mt-1 form-control text-small require" placeholder="00年入園･入学予定､00年卒園･卒業､またはクラス名"  id="garden_detail_index" >

                </div>
            </div>

            <div id="add_current_school" class="d-none">
                <div class="sky-border p-2" id="cur_index">
                    <input  class="mt-1 form-control text-small search-school require" placeholder="施設名などフリー検索"  id="search_cur_str_index" style="border-color: #31BCC7 !important;">
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " name="cur_prefecture" id="search_cur_prefecture_index">
                        <option value="0">都道府県 検索</option>
                        @foreach($prefectures as $index => $prefecture)
                            @if($prefecture->prefecture_name == '岐阜県' || $prefecture->prefecture_name == '愛知県')
                                <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                            @endif
                        @endforeach

                    </select>
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " id="search_cur_city_index">
                        <option value="1">市区町村 検索</option>

                    </select>
                    <div class="mt-1 flex justify-content-center">
                        <button class="gray-btn-gradient mx-0 btn btn-outline-default waves-effect btn-full btn-title text-white rounded" name="btn_cur_search" id="btn_cur_search_index">検索 </button><i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
                    </div>
                    <div id="cur_garden_select_index">

                    </div>
                    <input  class="mt-1 form-control text-small require" placeholder="施設名などフリー検索"  id="garden_cur_detail_index" >

                </div>
            </div>

            <div id="add_current_school_1" class="d-none">
                <div class="sky-border p-2" id="cur_index_1">
                    <input  class="mt-1 form-control text-small require search-school" placeholder="園･学校の名前をご記入ください"  id="cur_search_str_index_1" style="border-color: #31BCC7 !important;">

                    <input  class="mt-1 form-control text-small require" placeholder="園･学校のある都道府県､市区町村郡をご記入ください"  id="cur_search_address_index_1" >

                    <input  class="mt-1 form-control text-small require" placeholder="00年入園･入学予定､00年卒園･卒業､またはクラス名"  id="cur_garden_detail_index_1" >

                </div>
            </div>

            <div id="add_child" class="d-none">
                <div id="child" class="mb-3 position-relative">
                    <div class="position-absolute child-delete d-none" style="top: -14px; right: 14px; z-index: 1">
                        <img class="height-2 img-icon pb-1" src="{{asset('img/child-delete.png')}}">
                    </div>
                    <div class="w-100">
                        <div class="flex mt-2 my-2">
                            <div class="top-menu left_bar">
                            </div>
                            <div class="w-100 py-1 text-title sub-menu pl-3" id="index_child">
                                第一子
                            </div>


                        </div>
                    </div>

                    <div class="mt-2 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            お名前
                        </p>
                        <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6 pr-1"><input  class="form-control text-small require"  placeholder="お子様姓(例：山田)" id="first_name_child" required></div>
                        <div class="col-6 pl-1"><input  class="form-control text-small require"  placeholder="お子様名(例：一郎)" id="second_name_child" required></div>
                    </div>

                    <div class="mt-3 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            お名前 フリガナ
                        </p>
                        <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                    </div>
                    <div class="row mt-1">
                        <div class="col-6 pr-1"><input  class="form-control text-small require"  placeholder="セイ(例：ヤマダ)" id="first_name_huri_child" required></div>
                        <div class="col-6 pl-1"><input  class="form-control text-small require"  placeholder="メイ(例：イチロウ)" id="second_name_huri_child" required></div>
                    </div>

                    <div class="mt-3 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            お子様の性別
                        </p>
                        <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                    </div>
                    <div class="d-flex mt-1 w-100">
                        <div class="col-3 custom-control custom-radio  d-flex align-items-center">
                            <input type="radio" class="custom-control-input text-small" id="gender_child_female" value="1" name="gender_child" required>
                            <label class="custom-control-label text-small" for="gender_child_female">女性</label>
                        </div>

                        <!-- Default inline 2-->
                        <div class="col-3 custom-control custom-radio d-flex align-items-center">
                            <input type="radio" class="custom-control-input text-small" id="gender_child_male" value="2" name="gender_child" required>
                            <label class="custom-control-label text-small" for="gender_child_male">男性</label>
                        </div>

                        <div class="col-3 custom-control custom-radio d-flex align-items-center">
                            <input type="radio" class="custom-control-input text-small" id="gender_child_not" value="3" name="gender_child" required>
                            <label class="custom-control-label text-small" for="gender_child_not">無回答</label>
                        </div>

                    </div>

                    <div class="mt-3 d-flex justify-content-center background-light-gray">
                        <p class="p-1 text-small flex-1">
                            お子様の生年月日(予定日)
                        </p>
                        <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                    </div>

                    <input  class="mt-1 form-control text-small d-none"  type="date" id="date_child">

                    <div class="row mt-1">
                        <div class="col-4 pr-0">
                            <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="date_year" required>
                                <option value="">年</option>
                                @for($i = 2021; $i >=1990; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-4 pl-2 pr-1">
                            <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="date_month" required>
                                <option value="">月</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-4 pl-1">
                            <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="date_day" required>
                                <option value="">日</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                        <div class="col-12 ">
                            <p class="text-small text-right"><span name="old_year">----</span>歳<span name="old_month">--</span><span class="month_cnt">ヶ月</span></p>
                        </div>
                    </div>

                    <div class="row mt-2" style="margin-left: -20px;margin-right: -20px;">
                        <div class="col-12 sub-menu pb-3" style="border-bottom: 1px solid #ABABAB">
                            <div class="w-100 py-3 text-small position-relative">
                                <p class="px-2 py-1 background-white">入学(園)希望校(園)､または現在通っている学校(園)の<br>
                                    情報などをご記入ください｡</p>
                                <span class="mt-1 ml-2 background-pink text-white text-small-xs px-2 mr-2 position-absolute" style="bottom: 21px; right: 0">必須</span>
                            </div>

                            <div class="mt-0 ml-2 custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input text-medium-small" id="check_enter_child_100">
                                <label class="custom-control-label1 custom-control-label text-medium-light" for="check_enter_child_100">未就園〔予定園や希望園なし〕</label>
                            </div>

                            <div class="flex">
                                <button class="mt-3 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" name="btn_add_area" style="background-color: white !important; border-color: #236888 !important" id="">スクール情報を選択または記入する</button>
                            </div>

                            <div class="d-none">
                                <div class="w-100 py-3 text-small position-relative">
                                    <p class="px-2">※転園･転校･就園･就学歴がおありの方は<br>
                                        ｢スクール情報を追加する｣をクリックして表示を増やして<br>
                                        ご記入ください｡</p>
                                </div>

                                <div class="w-100">
                                    <div id="old_school_list_child" class="background-white"></div>
                                    <div class="flex mt-0">
                                        <button class="m-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" name="btn_add_old" style="background-color: white !important; border-color: #236888 !important" id="btn_add_old_child">スクール情報を追加する </button><i class="text-blue fas fa-icon-left fa-plus-circle ml-1"></i>
                                    </div>
                                    <p class="mt-4 text-normal">■ 上記にない場合お手数ですが下記にてご記入ください</p>
                                    <div id="cur_school_list_child" class="background-white"></div>

                                    <div class="flex mt-0">
                                        <button class="m-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" name="btn_add_cur" id="btn_add_cur_child" style="background-color: white !important;border-color: #236888 !important">スクール情報を追加する </button><i class="text-blue fas fa-icon-left fa-plus-circle ml-1"></i>
                                    </div>
                                </div>
                            </div>


                        </div>



                    </div>

{{--                    <div class="w-100">--}}
{{--                        <div class="flex mt-3 my-2">--}}
{{--                            <div class="top-menu left_bar">--}}
{{--                            </div>--}}
{{--                            <div class="w-100 py-1 text-large-xs sub-menu pl-3">--}}
{{--                                [入学予定][現在通っている][卒園･卒業校]--}}
{{--                                を選択またはご記入ください--}}
{{--                                <span class="float-right mt-1 ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</span>--}}
{{--                            </div>--}}


{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <p class="text-normal p-1">※転園･転校･就園･就学歴がおありの方は--}}
{{--                        ｢スクール情報を追加する｣をクリックして表示を増やしてご記入ください｡</p>--}}

{{--                    <div class="mt-1 ml-2 custom-control custom-checkbox">--}}

{{--                        <input type="checkbox" class="custom-control-input tag-detail text-medium-small" id="check_enter_child">--}}
{{--                        <label class="custom-control-label text-medium-light" for="check_enter_child">未就園[入学予定園なし]</label>--}}
{{--                    </div>--}}


                </div>

            </div>

            <form class="needs-validation" novalidate id="register_form" action="<?=url('/register/parent/child-confirm');?>" method="post">

                {{csrf_field()}}
                <input type="hidden" id="user_id" name="user_id" value="{{$id}}">
                <input type="hidden" id="email" name="email" value="{{$email}}">
                <input type="hidden" id="child_detail" name="child_detail">
                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        会員ID(メールアドレス)
                    </p>
                </div>
                <p  class="mt-1 text-small" name="email" >{{$email}}</p>

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        お送りした仮パスワードを入れてください
                    </p>

                </div>
                <div class="d-flex mt-1  justify-content-center">
                    <input  class="form-control text-small require"  placeholder="パスワード" name="code" id="code" required>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <div class="mt-3 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        新しくパスワードを設定してください<br>(半角英数字8〜32文字)
                    </p>

                </div>
                <div class="d-flex mt-1  justify-content-center">
                    <input  class="form-control text-small require" type="password" placeholder="パスワード(半角英数字8〜32文字)" id="password" name="password" required minlength="8" maxlength="32">
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <div class="d-flex mt-1  justify-content-center">
                    <input  class="form-control text-small require" type="password" placeholder="パスワード[確認用]半角英数字8〜32文字" id="confirm_password" name="confirm_password" required minlength="8" maxlength="32">
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <p class="mt-1 text-small mb-3">※ログイン時に使用します｡</p>

                <div class="background_procedure_type mt-2 py-1 pl-2" id="heading1">

                    <div class="flex">
                        <h6 class="mb-0 text-white w-100 text-title">
                            お子様(お孫様)について
                        </h6>
                    </div>
                </div>
                <div class="text-small  mt-2">
                    ※お子様の情報はレビューなどへは表示されませんのでご安心ください｡
                </div>

                <div id="child_list">

                </div>

                <div class="flex mt-3">
                    <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-pink" style="border-color: #FF557E !important;" name="btn_add_child" id="btn_add_child">お子様情報を追加する </button><i class="text-pink fas fa-icon-left fa-plus-circle ml-1"></i>
                </div>
                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        お子様の成長に合わせた最新子育て情報と受験情報を
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <div class="mt-1 custom-control custom-radio text-medium">
                    <input type="radio" class="custom-control-input" id="radio_receive" name="radio_receive" required>
                    <label class="custom-control-label2 custom-control-label" for="radio_receive">受け取る</label>
                </div>
                <div class="mt-1 custom-control custom-radio text-medium">
                    <input type="radio" class="custom-control-input" id="radio_receive_not" name="radio_receive" required>
                    <label class="custom-control-label2 custom-control-label" for="radio_receive_not">受け取らない</label>
                </div>

                <p class="p-1 text-small">
                    ※後で変更できます｡
                </p>

                <div class="py-1 mb-3">

                    <div class="mt-1 flex justify-content-center">
                        <button type="submit" class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white background-gray" id="btn_register" style="border: 0 !important;">入力内容を確認する </button><i class="text-white fas fa-angle-right ml-1"></i>
                    </div>
                </div>

            </form>
        </div>





    </div>


@endsection

@section('footer_top')
    <div class="card background-transparent position-sticky" style="bottom: 1.5rem;  margin-top: -50px">
        <div class="card-body background-opacity">
            <img src="{{asset('img/up.png')}}" class="img-up" id="move_top" style="bottom: -.5rem">
        </div>
    </div>
@endsection

@section('js4event')
    <script language="javascript" type="text/javascript">
        var count_child = 0;
        var arr_count_old = [];
        var arr_count_cur = [];
        var constChildArr = ['第一子', '第二子', '第三子', '第四子', '第五子', '第六子', '第七子', '第八子', '第九子', '第十子', '第十一子', '第十二子'];
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });
            $(document).on('change', 'input', function(){
                var forms = document.getElementById('register_form');
                if(forms.checkValidity() === true){
                    $('#btn_register').removeClass('background-gray');
                }
                else{
                    $('#btn_register').addClass('background-gray');
                }

            })

            $(document).on('change', '[name=date_year]', function () {
                var now = new Date();
                var y = $(this).val();
                var m = $(this).parent().next().find('[name=date_month]').val();
                console.log(m)
                if(m == ''){
                    var year = now.getFullYear() - y;
                    console.log(year)
                }
                else{
                    if(m > now.getMonth()){
                        var year = now.getFullYear() - y - 1;
                    }else{
                        var year = now.getFullYear() - y;
                    }
                }
                if(year>2019 || year < 0){
                    year = '----';
                }

                if(parseInt(year)>=4){

                    $(this).parent().next().next().next().find('span[name=old_month]').addClass('d-none');
                    $(this).parent().next().next().next().find('span.month_cnt').addClass('d-none');
                }
                else{
                    $(this).parent().next().next().next().find('span[name=old_month]').removeClass('d-none');
                    $(this).parent().next().next().next().find('span.month_cnt').removeClass('d-none');
                }


                $(this).parent().next().next().next().find('span[name=old_year]').text(year);
                console.log(year);

            })
            $(document).on('change', '[name=date_month]', function () {
                var now = new Date();
                var m = $(this).val();
                var y = $(this).parent().prev().find('[name=date_year]').val();
                console.log(y)
                if(y == ''){
                    var month = now.getMonth() - m + 1;
                }
                else{
                    if(m > now.getMonth()){
                        var month = 12 + now.getMonth() - m + 1;
                        if(y>0){
                            $(this).parent().next().next().find('span[name=old_year]').text(now.getFullYear() - y -1);
                        }else{
                            $(this).parent().next().next().find('span[name=old_year]').text('----');
                        }

                    }else{
                        var month = now.getMonth() - m + 1;
                    }
                }
                console.log(y);
                if(y<=0 || y>2019){
                    month = '--'
                }

                $(this).parent().next().next().find('span[name=old_month]').text(month);


            })

            //$('[name="date_year"]').change()



            $("#btn_register").click(function(event) {
                event.preventDefault();
                var childInfo = [];
                for(var child_id = 0; child_id < count_child; child_id ++) {
                    var old_gardens = [];
                    for(var i = 0; i < arr_count_old[child_id]; i ++) {
                        var garden_id = $("input[name=radio_school_child_" + child_id + "_index_" + i + ']:checked').val();

                        if(garden_id > 0) {
                            var garden_detail = $("#garden_detail_child_" + child_id + "_index_" + i).val();
                            var garden_info = {};
                            garden_info['id'] = garden_id;
                            garden_info['detail'] = garden_detail;
                            old_gardens.push(garden_info);
                        }
                    }

                    var cur_gardens = [];
                    for(var i = 0; i < arr_count_cur[child_id]; i ++) {
                        var garden_id = $("input[name=radio_cur_school_child_" + child_id + "_index_" + i + ']:checked').val();

                        if(garden_id > 0) {
                            var garden_detail = $("#garden_cur_detail_child_" + child_id + "_index_" + i).val();
                            var garden_info = {};
                            garden_info['id'] = garden_id;
                            garden_info['detail'] = garden_detail;
                            cur_gardens.push(garden_info);
                        }
                    }

                    var garden_detail = {};
                    garden_detail['old'] = old_gardens;
                    garden_detail['cur'] = cur_gardens;
                    garden_detail['first_name'] = $("#first_name_child_" + child_id).val();
                    garden_detail['second_name'] = $("#second_name_child_" + child_id).val();
                    garden_detail['first_name_huri'] = $("#first_name_huri_child_" + child_id).val();
                    garden_detail['second_name_huri'] = $("#second_name_huri_child_" + child_id).val();
                    garden_detail['gender'] =  $("input[name=gender_child_" + child_id + ']:checked').val();
                    //garden_detail['date'] = $("#date_child_" + child_id).val();

                    var year = $('#date_child_' + child_id).next().find('[name="date_year"]').val();
                    var month = $('#date_child_' + child_id).next().find('[name="date_month"]').val();
                    var date = $('#date_child_' + child_id).next().find('[name="date_day"]').val();
                    if(year !== null && month !== null && date !== null){
                        garden_detail['date'] = year + '-' + month + '-' + date;
                        console.log(garden_detail['date'])
                    }
                    else{
                        garden_detail['date'] = '0000-00-00' ;
                    }

                    if($('#check_enter_child_' + child_id).is(":checked")) {
                        garden_detail['enter_garden'] = 1;
                    } else {
                        garden_detail['enter_garden'] = 0;
                    }
                    childInfo.push(garden_detail);
                }
                var childInfoStr = JSON.stringify(childInfo);
                $("#child_detail").val(childInfoStr);
                var forms = document.getElementById('register_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {
                    var password = $("#password").val();
                    var confirm_password = $("#confirm_password").val();
                    var url = home_path + "/ajax/register/modify-password";
                    console.log(password)

                    if(password == confirm_password) {
                        console.log(confirm_password)
                        var id = $('#user_id').val();
                        var code = $("#code").val();
                        var email =$("#email").val();

                        $.ajax({
                            url:url,
                            type:'post',
                            data: {
                                id: id,
                                code: code,
                                email: email,
                                password: password,
                            },
                            success: function (response) {
                                if(response['status'] == true) {
                                    forms.submit();
                                } else {
                                    alertify.error("失敗した登録");
                                }
                            },
                            error: function () {
                            }
                        });

                    }



                }
                //window.location.href = 'http://example.com';
            });

            function addOld(child_id) {
                var content = $("#add_old_school").html();
                var count_old = arr_count_old[child_id];
                content = content.replace(/_index/g, "_child_" + child_id + '_index_' + count_old);
                $("#old_school_list_child_" + child_id).append(content);
                count_old = count_old + 1;
                arr_count_old[child_id] = count_old;
            }

            function addCur(child_id) {
                var content = $("#add_current_school_1").html();
                var count_cur = arr_count_cur[child_id];
                content = content.replace(/_index/g, "_child_" + child_id + '_index_' + count_cur);
                $("#cur_school_list_child_" + child_id).append(content);
                count_cur = count_cur + 1;
                arr_count_cur[child_id] = count_cur;
            }

            function addChild() {
                var content = $("#add_child").html();

                content = content.replace(/_child/g, "_child_" + count_child);


                $("#child_list").append(content);
                $("#date_child_" + count_child).attr('type', 'date');
                $("#old_index_" + count_child).removeClass('d-none');
                arr_count_old.push(0);
                arr_count_cur.push(0);
                addOld(count_child);
                addCur(count_child);
                $("#index_child_" + count_child).html(constChildArr[count_child]);
                if(count_child !== 0){
                    $('html, body').animate({
                    scrollTop: $("#index_child_" + count_child).offset().top-65
                }, 1000);
                    //location.href = "#index_child_" + count_child;
                }
                //location.href = "#index_child_" + count_child;
                count_child = count_child + 1;

                $('.child-delete').each(function (index) {
                    console.log($('.child-delete').length);
                    if(index == $('.child-delete').length-1 && index != 1){
                        $(this).removeClass('d-none');
                    }
                    else{
                        $(this).addClass('d-none');
                    }
                })

            }

            function getCityList(child_id, prefecture_id, index, type) {
                var url = home_path + '/ajax/get-city/' + prefecture_id;
                $.ajax({
                    url: url,
                    success: function(response){

                        var cityList = response['city'];
                        if(type == 0) {
                            $(".old_city_" + child_id + "_" + index).remove();
                            cityList.forEach(city => {
                                var city_id = city['city_id'];
                                var city_name = city['city_name'];
                                $("#search_city_child_" + child_id + "_index_" + index).append("<option class='old_city_" + child_id + "_" + index + "' value='" + city_id + "'>" + city_name + "</option>");
                            });
                        } else {
                            $(".cur_city_" + child_id + "_" + index).remove();
                            cityList.forEach(city => {
                                var city_id = city['city_id'];
                                var city_name = city['city_name'];
                                $("#search_cur_city_child_" + child_id + "_index_" + index).append("<option class='cur_city_" + child_id + "_" + index + "' value='" + city_id + "'>" + city_name + "</option>");
                            });
                        }

                    }
                });
            }

            function changeEvent() {
                $(document).on('change', "[name=old_prefecture]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("child_");
                    var index_pre = split[1];
                    split = index_pre.split('_index_');
                    var child_id = split[0];
                    var index = split[1];
                    var prefecture_id = $(this).val();
                    getCityList(child_id, prefecture_id, index, 0);
                });

                $(document).on('click', '.child-delete', function () {
                    $(this).parent().remove();
                    count_child = count_child - 1;
                    $('.child-delete').each(function (index) {
                    console.log($('.child-delete').length);
                    if(index == $('.child-delete').length-1 && index != 1){
                        $(this).removeClass('d-none');
                    }
                    else{
                        $(this).addClass('d-none');
                    }
                })
                })

                $(document).on('click', '[name="btn_add_area"]', function () {
                    event.preventDefault();
                    $(this).parent().next().removeClass('d-none');
                    $(this).addClass('d-none');

                })

                $(document).on('change', "[name=cur_prefecture]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("child_");
                    var index_pre = split[1];
                    split = index_pre.split('_index_');
                    var child_id = split[0];
                    var index = split[1];
                    var prefecture_id = $(this).val();
                    getCityList(child_id, prefecture_id, index, 1);
                });

                $(document).on('click', "[name=btn_add_old]", function(event) {
                    event.preventDefault();
                    var id = $(this).attr('id');
                    var split = id.split("child_");
                    var child_id = split[1];
                    addOld(child_id);
                });

                $(document).on('click', "[name=btn_add_cur]", function(event) {
                    event.preventDefault();
                    var id = $(this).attr('id');
                    var split = id.split("child_");
                    var child_id = split[1];
                    addCur(child_id);
                });

                $(document).on('click', "[name=btn_old_search]", function() {
                    event.preventDefault();
                    var id = $(this).attr('id');
                    var split = id.split("child_");
                    var index_pre = split[1];
                    split = index_pre.split('_index_');
                    var child_id = split[0];
                    var index = split[1];
                    var searchStr = $("#search_str_child_" + child_id + "_index_" + index).val();
                    var prefecture_id = $("#search_prefecture_child_" + child_id + "_index_" + index).val();
                    var city_id = $("#search_city_child_" + child_id + "_index_" + index).val();
                    var url = home_path + '/ajax/school-list-info';
                    if(city_id > 0) {
                        $.ajax({
                            url:url,
                            type:'post',
                            data: {
                                cityList: city_id,
                                search: searchStr,
                                prefecture_id: prefecture_id,
                                currentPage: 1,
                                perPage: 5
                            },
                            success: function (response) {
                                response = response.replace(/radio_school_index/g, "radio_school_child_" + child_id + "_index_" + index);
                                $("#old_garden_select_child_" + child_id + "_index_" + index).html(response);
                            },
                            error: function () {
                            }
                        });
                    }

                });

                $(document).on('click', "[name=btn_cur_search]", function() {
                    event.preventDefault();
                    var id = $(this).attr('id');
                    var split = id.split("child_");
                    var index_pre = split[1];
                    split = index_pre.split('_index_');
                    var child_id = split[0];
                    var index = split[1];
                    var searchStr = $("#search_cur_str_child_" + child_id + "_index_" + index).val();
                    var prefecture_id = $("#search_cur_prefecture_child_" + child_id + "_index_" + index).val();
                    var city_id = $("#search_cur_city_child_" + child_id + "_index_" + index).val();
                    var url = home_path + '/ajax/school-list-info';
                    if(city_id > 0) {
                        $.ajax({
                            url:url,
                            type:'post',
                            data: {
                                cityList: city_id,
                                search: searchStr,
                                prefecture_id: prefecture_id,
                                currentPage: 1,
                                perPage: 5
                            },
                            success: function (response) {
                                response = response.replace(/radio_school_index/g, "radio_cur_school_child_" + child_id + "_index_" + index);
                                $("#cur_garden_select_child_" + child_id + "_index_" + index).html(response);
                            },
                            error: function () {
                            }
                        });
                    }

                });


            }

            $("#btn_add_child").click(function () {
                event.preventDefault();
               addChild();
            });

            addChild();
            changeEvent();

        });
    </script>
@endsection
