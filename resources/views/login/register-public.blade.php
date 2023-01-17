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

        .left_bar{
            position: absolute;
            left: 0;
            width: 0.4rem;
            height: 100%;
        }

        .sky-border {
            border: 2px solid #B6EEEC;
        }

        input{
            border: 1px solid #666666 !important;
        }
        .custom-control-label::before {
            top: 1px !important;
            left: -1.2rem !important;
        }
        .custom-control-label::after {
            top: 1px !important;
            left: -1.2rem !important;
        }
        .fa-icon-right {
            position: absolute;
            right: 1em;
        }

        .fa-icon-left {
            position: absolute;
            left: 0.2em;
        }

        @media (min-width: 768px){
            .custom-control-label::before {
                top: 10px !important;
            }
            .custom-control-label::after {
                top: 10px !important;
            }
        }

    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">会員ログイン･新規会員登録</span> > 新規会員登録</p>

        </div>

        <div class="card-body text-title">
            <img class="height-4 img-icon mb-1" src="{{asset('img/fa-edit.png')}}"> 新規会員登録(無料)
        </div>

        <div class="card-body py-1">
            <p class="text-title background-dark-blue text-white p-1">学生本人(12歳以上)の方</p>

            <p class="text-medium-xs p-1">未成年者の方は事前に保護者の方から許可を
                いただいてから登録をお願いします｡</p>

            <div class="w-100">
                <div class="flex mt-1 my-2">
                    <div class="top-menu left_bar">
                    </div>
                    <div class="w-100 py-1 text-large-xs sub-menu pl-3">
                        [入学予定][現在通っている][卒園･卒業校]
                        を選択またはご記入ください
                        <span class="float-right mt-1 ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</span>
                    </div>


                </div>

            </div>

            <p class="text-normal p-1">※転園･転校･就園･就学歴がおありの方は
                ｢スクール情報を追加する｣をクリックして表示を増やして
                ご記入ください｡</p>


            <div id="add_old_school" class="d-none">
                <div class="sky-border p-2" id="old_index">
                    <input  class="mt-1 form-control text-small search-school require" placeholder="施設名などフリー検索"  id="search_str_index" >
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " name="old_prefecture" id="search_prefecture_index">
                        <option value="0">都道府県 検索</option>
                        @foreach($prefectures as $index => $prefecture)
                            <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                        @endforeach

                    </select>
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " id="search_city_index">
                        <option value="1">市区町村 検索</option>

                    </select>
                    <div class="mt-1 flex justify-content-center">
                        <button class="gray-btn-gradient text-large mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title  text-white" name="btn_old_search" id="btn_search_index">検索 </button><i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
                    </div>
                    <div id="old_garden_select_index">

                    </div>
                    <input  class="mt-1 form-control text-small require" placeholder="施設名などフリー検索"  id="garden_detail_index" >

                </div>
            </div>

            <div id="old_school_list">
                <div class="sky-border p-2" id="old_index_1">
                    <input  class="mt-1 form-control text-small search-school require" placeholder="施設名などフリー検索"  id="search_str_index_1" >
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " name="old_prefecture" id="search_prefecture_index_1">
                        <option value="0">都道府県 検索</option>
                        @foreach($prefectures as $index => $prefecture)
                            <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                        @endforeach

                    </select>
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " id="search_city_index_1">
                        <option value="0">市区町村 検索</option>
                    </select>
                    <div class="mt-1 flex justify-content-center">
                        <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full text-white text-height" name="btn_old_search" id="btn_search_index_1" style="border: none !important;">検索 </button><i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
                    </div>
                    <div id="old_garden_select_index_1">

                    </div>
                    <input  class="mt-1 form-control text-small require" placeholder="00年入学予定､00年卒園･卒業､またはクラス名" id="garden_detail_index_1" >

                </div>
            </div>



            <div class="flex mt-0">
                <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full text-medium text-blue" id="btn_add_old" style="margin-top: 2px !important;">スクール情報を追加する </button><i class="text-blue fas fa-icon-left fa-plus-circle ml-1 mb-1"></i>
            </div>

            <div class="flex mt-4 text-medium-xs">
                <div class="square"></div>
                上記にない場合お手数ですが下記にてご記入ください
            </div>

            <div id="add_current_school" class="d-none">
                <div class="sky-border p-2" id="cur_index">
                    <input  class="mt-1 form-control text-small search-school require" placeholder="施設名などフリー検索"  id="search_cur_str_index" >
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " name="cur_prefecture" id="search_cur_prefecture_index">
                        <option value="0">都道府県 検索</option>
                        @foreach($prefectures as $index => $prefecture)
                            <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                        @endforeach

                    </select>
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " id="search_cur_city_index">
                        <option value="1">市区町村 検索</option>

                    </select>
                    <div class="mt-1 flex justify-content-center">
                        <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full text-white" name="btn_cur_search" id="btn_cur_search_index">検索 </button><i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
                    </div>
                    <div id="cur_garden_select_index">

                    </div>
                    <input  class="mt-1 form-control text-small require" placeholder="施設名などフリー検索"  id="garden_cur_detail_index" >

                </div>
            </div>

            <div id="add_current_school_1" class="d-none">
                <div class="sky-border p-2" id="cur_index">
                    <input  class="mt-1 form-control text-small require" placeholder="園･学校の名前をご記入ください"  id="cur_search_str_index" >

                    <input  class="mt-1 form-control text-small require" placeholder="園･学校のある都道府県､市区町村郡をご記入ください"  id="cur_search_address_index" >

                    <input  class="mt-1 form-control text-small require" placeholder="00年入学予定､00年卒園･卒業､またはクラス名"  id="cur_garden_detail_index" >

                </div>
            </div>
            <div id="cur_school_list">
                <div class="sky-border p-2" id="cur_index_1">
                    <input  class="mt-1 form-control text-small search-school require" placeholder="施設名などフリー検索"  id="search_cur_str_index_1" >
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " name="cur_prefecture" id="search_cur_prefecture_index_1">
                        <option value="0">都道府県 検索</option>
                        @foreach($prefectures as $index => $prefecture)
                            <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                        @endforeach

                    </select>
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small " id="search_cur_city_index_1">
                        <option value="1">市区町村 検索</option>

                    </select>
                    <div class="mt-1 flex justify-content-center">
                        <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full text-white text-height" name="btn_cur_search" id="btn_cur_search_index_1" style="border: none !important;">検索 </button><i class="text-white fas fa-angle-down fa-icon-right ml-1"></i>
                    </div>
                    <div id="cur_garden_select_index_1">

                    </div>
                    <input  class="mt-1 form-control text-small require" placeholder="施設名などフリー検索"  id="garden_cur_detail_index_1" >

                </div>
            </div>
            <div class="flex mt-0">
                <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full text-medium text-blue" id="btn_add_current" style="margin-top: 2px !important;">スクール情報を追加する </button><i class="text-blue fas fa-icon-left fa-plus-circle ml-1 mb-1"></i>
            </div>


            <form class="needs-validation" novalidate id="register_form" action="<?=url('/register/public/confirm');?>" method="post">
                {{csrf_field()}}

                <input name="garden_info" id="garden_info" type="hidden">
                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        お名前
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <div class="row mt-1">
                    <div class="col-6 pr-1"><input  class="form-control text-small require"  placeholder="姓(例：山田)" name="first_name" required></div>
                    <div class="col-6 pl-1"><input  class="form-control text-small require"  placeholder="名(例：太郎)" name="second_name" required></div>
                </div>

                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        お名前 フリガナ
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <div class="row mt-1">
                    <div class="col-6 pr-1"><input  class="form-control text-small require"  placeholder="姓(例：ヤマダ)" name="first_name_huri" required></div>
                    <div class="col-6 pl-1"><input  class="form-control text-small require"  placeholder="名(例：タロウ)" name="second_name_huri" required></div>
                </div>

                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        性別
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <div class="d-flex mt-1 w-100">

                    <div class="col-3 custom-control custom-radio  d-flex align-items-center">
                        <input type="radio" class="custom-control-input text-small" id="female" value="1" name="gender" required>
                        <label class="custom-control-label text-small" for="female">女性</label>
                    </div>

                    <!-- Default inline 2-->
                    <div class="col-3 custom-control custom-radio d-flex align-items-center">
                        <input type="radio" class="custom-control-input text-small" id="male" value="2" name="gender" required>
                        <label class="custom-control-label text-small" for="male">男性</label>
                    </div>

                    <div class="col-3 custom-control custom-radio d-flex align-items-center">
                        <input type="radio" class="custom-control-input text-small" id="no_gender" value="3" name="gender" required>
                        <label class="custom-control-label text-small" for="no_gender">無回答</label>
                    </div>

                </div>



                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        生年月日
                    </p>

                </div>

{{--                <input  class="mt-1 form-control text-small require"  type="date" name="date" >--}}

                <div class="row">
                    <div class="col-4">
                        <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="date_year">
                            <option value="">年</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="date_month">
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
                    <div class="col-4">
                        <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="date_day">
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
                </div>

                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        住所
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <div class="mt-1 d-flex require justify-content-center">
                    <input class="form-control text-small  w-50" type="text" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','city','address');" placeholder="郵便番号(例：1234567)" name="post_code" required> <p class="ml-1 text-small mr-4 require w-50">住所自動入力</p>

{{--                    <input  class="form-control text-small  w-50"  placeholder="郵便番号(例：1234567)" name="post_code" required> <p class="ml-1 text-small mr-4 require">住所自動入力</p>--}}
{{--                    <input  class="mt-1 form-control text-small require"  placeholder="都道府県市区町村郡町域"  name="city" required>--}}
{{--                    <input  class="mt-1 form-control text-small require"  placeholder="以降の住所(建物名･階数など)をご記入ください" name="address" required>--}}
                </div>
                <input class="mt-1 form-control text-small require" type="text" size="20" placeholder="都道府県市区町村郡町域"  name="city" required>
                <input class="mt-1 form-control text-small require" type="text" size="60" placeholder="以降の住所(建物名･階数など)をご記入ください" name="address" required>



                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        電話番号(ハイフンなし)
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <input  class="mt-1 form-control text-small require"  placeholder=""  name="mobile" required>
                <p class="mt-1 text-small">※連絡がつきやすい電話番号をご記入ください｡</p>
                <div class="mt-2 d-flex justify-content-center background-light-gray">
                    <p class="p-1 text-small flex-1">
                        メールアドレス[半角英数字]
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <input  class="mt-1 form-control text-small require"  placeholder="" id="email" name="email" required>
                <p class="mt-1 text-small">※ログイン時のIDになります｡</p>


                <div class="mt-3 text-medium text-center">
                    <p>完了メールを正しく受け取るために</p>
                    <p>【info@kodomore-edu.com】からの</p>
                    <p>メールの受信許可をしてください｡</p>
                </div>
            </form>

        </div>
        <div class="card-body py-1">

            <div class="mt-1 flex justify-content-center">
                <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white" id="btn_register">入力内容を確認する </button><i class="text-white fas fa-angle-right ml-1"></i>
            </div>
            <div class="flex mt-1">
                <button class="mx-0 btn btn-outline-default btn-rounded waves-effect btn-full text-medium text-blue" id="btn_garden">もどる </button><i class="text-blue fas fa-angle-left ml-1"></i>
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
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script language="javascript" type="text/javascript">
        var count_old = 2;
        var count_cur = 2;
        function selectGarden(local_cur, local_old){
            if(local_cur !== null){
                var cur_garden = JSON.parse(local_cur);
                for(var i = 1; i <= cur_garden.length; i++){

                }
            }
            if(local_old !== null){
                var old_garden = JSON.parse(local_old);
                for(var i = 1; i <= old_garden.length; i++){
                    console.log($('input[name=radio_school_index_' + i + ']'));
                    $('input[name=radio_school_index_' + i + ']').each(function () {
                        console.log($(this));
                    })
                }
            }
        }
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            var local_cur = localStorage.getItem('cur_gardens_public_register')
            var local_old = localStorage.getItem('old_gardens_public_register')
            if(local_cur !== null){
                var cur = JSON.parse(local_cur);
                count_cur = cur.length + 1;
            }
            if(local_old !== null){
                var old = JSON.parse(local_old);
                count_old = old.length + 1;
            }
            inputField(local_cur, local_old);

            function inputField(local_cur, local_old){
                if(local_cur !== null){
                    var cur_garden = JSON.parse(local_cur);
                    console.log(cur_garden);
                    for(var i = 1; i <= cur_garden.length; i++){

                        if(i != 1){
                            var content = $("#add_current_school").html();
                            content = content.replace(/_index/g, "_index_" + i);

                            $("#cur_school_list").append(content);
                            $("#cur_index_" + i).removeClass('d-none');
                        }

                        $("#search_cur_str_index_" + i).val(cur_garden[i-1]['keyword']);
                        $("#garden_cur_detail_index_" + i).val(cur_garden[i-1]['detail']);
                    }
                }
                if(local_old !== null){
                    var old_garden = JSON.parse(local_old);
                    for(var i = 1; i <= old_garden.length; i++){
                        if(i != 1){
                            var content = $("#add_old_school").html();
                            content = content.replace(/_index/g, "_index_" + i);

                            $("#old_school_list").append(content);
                            $("#old_index_" + i).removeClass('d-none');
                        }
                        $("#search_str_index_" + i).val(old_garden[i-1]['keyword']);
                        $("#garden_detail_index_" + i).val(old_garden[i-1]['detail']);
                    }
                }
                selectPro(local_cur, local_old);
            }


            function selectPro(local_cur, local_old){
                if(local_cur !== null){
                    var cur_garden = JSON.parse(local_cur);
                    for(var i = 1; i <= cur_garden.length; i++){

                        var selectObj = $("#search_cur_prefecture_index_" + i);

                        for (var j = 0; j < selectObj[0].options.length; j++) {
                            if (selectObj[0].options[j].value== cur_garden[i-1]['pro']) {
                                selectObj[0].options[j].selected = true;
                            }
                        }

                        getCityList(cur_garden[i-1]['pro'], i, 1);
                    }
                }
                if(local_old !== null){
                    var old_garden = JSON.parse(local_old);
                    for(var i = 1; i <= old_garden.length; i++){

                        var selectObj = $("#search_prefecture_index_" + i);
                        for (var j = 0; j < selectObj[0].options.length; j++) {
                            if (selectObj[0].options[j].value == old_garden[i-1]['pro']) {
                                selectObj[0].options[j].selected = true;
                            }
                        }

                        getCityList(old_garden[i-1]['pro'], i, 0);
                    }
                }
                setTimeout(() => {
                    if(local_cur !== null){
                        var cur_garden = JSON.parse(local_cur);
                        for(var i = 1; i <= cur_garden.length; i++){
                            var selectCity = $("#search_cur_city_index_" + i)
                            for (var j = 0; j < selectCity[0].options.length; j++) {

                                if (selectCity[0].options[j].value == cur_garden[i-1]['city']) {
                                    selectCity[0].options[j].selected = true;
                                }
                            }
                            $("#btn_cur_search_index_" + i).trigger('click');
                        }
                    }
                    if(local_old !== null){
                        var old_garden = JSON.parse(local_old);
                        for(var i = 1; i <= old_garden.length; i++){

                            var selectCity = $("#search_city_index_" + i);
                            for (var j = 0; j < selectCity[0].options.length; j++) {
                                if (selectCity[0].options[j].value== old_garden[i-1]['city']) {
                                    selectCity[0].options[j].selected = true;
                                }
                            }
                            $("#btn_search_index_" + i).trigger('click');
                        }
                    }
                    setTimeout(() => {
                        if(local_cur !== null){
                            var cur_garden = JSON.parse(local_cur);
                            for(var i = 1; i <= cur_garden.length; i++){
                                $('input[name=radio_cur_school_index_' + i + ']').each(function () {
                                    console.log($(this)[0].value);
                                    if($(this)[0].value == cur_garden[i-1]['id']){
                                        $(this)[0].checked = true;
                                    }

                                })
                            }
                        }
                        if(local_old !== null){
                            var old_garden = JSON.parse(local_old);
                            for(var i = 1; i <= old_garden.length; i++){
                                $('input[name=radio_school_index_' + i + ']').each(function () {
                                    console.log($(this)[0].value);
                                    if($(this)[0].value == old_garden[i-1]['id']){
                                        $(this)[0].checked = true;
                                    }

                                })
                            }
                        }
                    }, 1000)
                }, 1000);
            }



            $("#btn_register").click(function(event) {
                var old_gardens = [];
                for(var i = 1; i < count_old; i ++) {
                    var garden_id = $('input[name=radio_school_index_' + i + ']:checked').val();
                    if(garden_id > 0) {
                        var garden_detail = $("#garden_detail_index_" + i).val();
                        var garden_info = {};
                        garden_info['id'] = garden_id;
                        garden_info['detail'] = garden_detail;
                        garden_info['keyword'] = $("#search_str_index_" + i).val();
                        garden_info['pro'] = $("#search_prefecture_index_" + i).val();
                        garden_info['city'] = $("#search_city_index_" + i).val();
                        old_gardens.push(garden_info);
                    }
                }

                var cur_gardens = [];
                for(var i = 1; i < count_cur; i ++) {
                    var garden_id = $('input[name=radio_cur_school_index_' + i + ']:checked').val();
                    if(garden_id > 0) {
                        var garden_detail = $("#garden_cur_detail_index_" + i).val();
                        var garden_info = {};
                        garden_info['id'] = garden_id;
                        garden_info['detail'] = garden_detail;
                        garden_info['keyword'] = $("#search_cur_str_index_" + i).val();
                        garden_info['pro'] = $("#search_cur_prefecture_index_" + i).val();
                        garden_info['city'] = $("#search_cur_city_index_" + i).val();
                        cur_gardens.push(garden_info);
                    }
                }
                var garden_detail = {};
                garden_detail['old'] = old_gardens;
                garden_detail['cur'] = cur_gardens;
                localStorage.setItem('old_gardens_public_register', JSON.stringify(old_gardens));
                localStorage.setItem('cur_gardens_public_register', JSON.stringify(cur_gardens));
                console.log(old_gardens);
                console.log(cur_gardens);
                var garden_str = JSON.stringify(garden_detail);
                $("#garden_info").val(garden_str);
                var forms = document.getElementById('register_form');
                forms.classList.add('was-validated');
                if (forms.checkValidity() === true) {

                    var url = home_path + "/ajax/check/user";
                    var email = $("#email").val();
                    $.ajax({
                        url:url,
                        type:'post',
                        data: {
                            email: email
                        },
                        success: function (response) {
                            if(response['status'] == false) {
                                forms.submit();
                            } else {
                                alertify.error("ユーザーが存在します");
                            }
                        },
                        error: function () {
                        }
                    });
                }
                //window.location.href = 'http://example.com';
            });


            function getCityList(prefecture_id, index, type) {
                var url = home_path + '/ajax/get-city/' + prefecture_id;
                $.ajax({
                    url: url,
                    success: function(response){

                        var cityList = response['city'];
                        if(type == 0) {
                            $(".old_city_" + index).remove();
                            cityList.forEach(city => {
                                var city_id = city['city_id'];
                                var city_name = city['city_name'];
                                $("#search_city_index_" + index).append("<option class='old_city_" + index + "' value='" + city_id + "'>" + city_name + "</option>");
                            });
                        } else {
                            $(".cur_city_" + index).remove();
                            cityList.forEach(city => {
                                var city_id = city['city_id'];
                                var city_name = city['city_name'];
                                $("#search_cur_city_index_" + index).append("<option class='cur_city_" + index + "' value='" + city_id + "'>" + city_name + "</option>");
                            });
                        }

                    }
                });
            }

            function changeEvent() {
                $(document).on('change', "[name=old_prefecture]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var prefecture_id = $(this).val();

                    getCityList(prefecture_id, index, 0);
                });

                $(document).on('change', "[name=cur_prefecture]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var prefecture_id = $(this).val();

                    getCityList(prefecture_id, index, 1);
                });

                $(document).on('click', "[name=btn_old_search]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var searchStr = $("#search_str_index_" + index).val();
                    var prefecture_id = $("#search_prefecture_index_" + index).val();
                    var city_id = $("#search_city_index_" + index).val();
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
                                response = response.replace(/radio_school_index/g, "radio_school_index_" + index);
                                $("#old_garden_select_index_" + index).html(response);
                            },
                            error: function () {
                            }
                        });
                    }

                });

                $(document).on('click', "[name=btn_cur_search]", function() {
                    var id = $(this).attr('id');
                    var split = id.split("index_");
                    var index = split[1];
                    var searchStr = $("#search_cur_str_index_" + index).val();
                    var prefecture_id = $("#search_cur_prefecture_index_" + index).val();
                    var city_id = $("#search_cur_city_index_" + index).val();
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
                                response = response.replace(/radio_school_index/g, "radio_cur_school_index_" + index);
                                $("#cur_garden_select_index_" + index).html(response);
                            },
                            error: function () {
                            }
                        });
                    }

                });
            }

            changeEvent();

            $("#btn_add_old").click(function(event) {
                var content = $("#add_old_school").html();

                content = content.replace(/_index/g, "_index_" + count_old);


                $("#old_school_list").append(content);
                $("#old_index_" + count_old).removeClass('d-none');
                count_old = count_old + 1;
            });



            $("#btn_add_current").click(function(event) {
                var content = $("#add_current_school").html();
                content = content.replace(/_index/g, "_index_" + count_cur);


                $("#cur_school_list").append(content);
                $("#cur_index_" + count_old).removeClass('d-none');
                count_cur = count_cur + 1;
            });

        });
    </script>
@endsection
