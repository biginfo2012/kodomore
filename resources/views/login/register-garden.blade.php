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

        .background-light-blue {
            background-color: #DFEAF0;
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
            <p class="text-title background-dark-blue text-white p-1">{{$type}}</p>
            <form class="needs-validation" novalidate id="register_form" action="<?=url('/register/garden/confirm');?>" method="post">
                {{csrf_field()}}
                <input type="hidden" id="garden_type" name="type" value="{{$typeIndex}}">
                <div class="mt-3 d-flex justify-content-center background-light-blue">
                    <p class="p-1 text-small flex-1">
                        施設名
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <input  class="mt-1 form-control text-small require"   name="facility_name" required>

                <div class="mt-3 d-flex justify-content-center background-light-blue">
                    <p class="p-1 text-small flex-1">
                        施設名カナ
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <input  class="mt-1 form-control text-small require"   name="facility_name_second" required>

                <div class="mt-3 d-flex justify-content-center background-light-blue">
                    <p class="p-1 text-small flex-1">
                        施設の住所
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <div class="mt-1 d-flex justify-content-center">
                    <input  class="form-control text-small require"  placeholder="郵便番号" name="facility_post" required>
                    <p class="text-small-xs px-2">-</p>
                    <input  class=" form-control text-small require"  placeholder="" name="facility_auto_address" >
                    <p class="text-small-xs pl-2">住所自動入力</p>
                </div>




                <div class="mt-1 d-flex">
                    <div class="flex-1 mr-2">
                        <select class="custom-select custom-select-sm form-control form-control-sm  flex-1 mb-0 text-small" name="facility_prefecture" required>

                            <option value="0" >都道府県</option>
                            @foreach($prefectures as $index => $prefecture)
                                <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-1">
                        <select class="custom-select custom-select-sm form-control form-control-sm  flex-1 mb-0 text-small" name="facility_city" required id="facility_city">
                            <option value="0" >市区町村郡</option>
                        </select>
                    </div>
                </div>


                <input  class="mt-1 form-control text-small require"  placeholder="町域" name="facility_town" required>
                <input  class="mt-1 form-control text-small require"  placeholder="以降の住所(建物名･階数など)をご記入ください" name="facility_address" required>

                <div class="mt-2 d-flex justify-content-center background-light-blue">
                    <p class="p-1 text-small flex-1">
                        施設の電話番号(ハイフンなし)
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <input  class="mt-1 form-control text-small require"   name="facility_mobile" required>

                <div class="mt-2 d-flex justify-content-center background-light-blue">
                    <p class="p-1 text-small flex-1">
                        施設のURL
                    </p>

                </div>

                <input  class="mt-1 form-control text-small require"   name="facility_url" required>
                <div class="w-100">
                    <div class="flex mt-1 my-2">
                        <div class="top-menu left_bar">
                        </div>
                        <div class="w-100 text-title sub-menu pl-3">
                            登録者さまの情報
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
                        年代
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>
                <div class="mt-1">
                    <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small w-50" name="old">
                        <option value="1">10代</option>
                        <option value="2">20代</option>
                        <option value="3">30代</option>
                        <option value="4">40代</option>
                        <option value="5">50代</option>
                        <option value="6">60代</option>
                    </select>
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
                            <option value="null">年</option>
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
                            <option value="null">月</option>
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
                            <option value="null">日</option>
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
                    <input  class="form-control text-small   w-50" name="zip01" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');" placeholder="郵便番号(例：1234567)" name="post_code" required> <p class="ml-1 text-small mr-4 require">住所自動入力</p>
                </div>
                <input  class="mt-1 form-control text-small require" type="text" name="pref01" size="20" placeholder="都道府県市区町村郡町域"  name="city" required>
                <input  class="mt-1 form-control text-small require" type="text" name="addr01" size="60" placeholder="以降の住所(建物名･階数など)をご記入ください" name="address" required>



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
                <button class=" mx-0 btn btn-outline-default btn-rounded waves-effect btn-full btn-title text-white" id="btn_register">入力内容を確認する </button><i class="text-white fas fa-angle-right ml-1"></i>
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
        $(document).ready(function() {
            var home_path = $("#home_path").val();
            $("#move_garden").click(function(event) {
                window.location.href = home_path + '/';
                //window.location.href = 'http://example.com';
            });

            function getCityList(prefecture_id) {
                var url = home_path + '/ajax/get-city/' + prefecture_id;
                $.ajax({
                    url: url,
                    success: function(response){

                        var cityList = response['city'];
                        $(".city_detail").remove();
                        cityList.forEach(city => {
                            var city_id = city['city_id'];
                            var city_name = city['city_name'];
                            $("#facility_city").append("<option class='city_detail' value='" + city_id + "'>" + city_name + "</option>");
                        });

                    }
                });
            }

            $(document).on('change', "[name=facility_prefecture]", function() {

                var prefecture_id = $(this).val();

                getCityList(prefecture_id);
            });

            $("#btn_register").click(function(event) {
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

        });
    </script>
@endsection
