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

        .border-title {
            border-top: 1px solid #808080;
            border-bottom: 1px solid #808080;
            border-right: 1px solid #808080;
        }

        .background-light-pink {
            background-color: #FFEBEF;
        }

        .background-light-sky {
            background-color: #DFEAF0;
        }

        .text-dark-blue {
            color: #0098A2 !important;
        }

        .btn-normal {
            position: relative;
        }

        .btn-normal::before {
            content: "";
            width: 100%;
            height: 50%;
            background: black;
            opacity: .1;
            position: absolute;
            top: 50%;
            left: 0%;

        }

        .btn-dark-grey {
            background-color: #919191 !important;
        }

        form:invalid button[type='submit']{
            background-color: #C4C4C4 !important;
            border: 2px solid #C4C4C4 !important;
        }
        .map-overlay:after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: 0;
            height: 0;
            border-top: solid 20px #FFEBEF;
            border-left: solid 10px transparent;
            border-right: solid 10px transparent;
        }
        {{--.form-control.is-valid, .was-validated .form-control:valid{--}}
        {{--    background-image:url('{{asset('img/date-input.png')}}') !important;--}}
        {{--    background-repeat:no-repeat;--}}
        {{--    background-position: right calc(.375em + .475rem) center;--}}
        {{--    background-size: calc(.75em + .575rem) calc(.75em + .575rem);--}}
        {{--}--}}

        .date-input{
            background-image:url('{{asset('img/date-input.png')}}') !important;
            background-repeat:no-repeat;
            background-position: right calc(.375em + .475rem) center !important;
            background-size: calc(.75em + .575rem) calc(.75em + .575rem) !important;
        }
        /*.date-input::-webkit-inner-spin-button,*/
        /*.date-input::-webkit-calendar-picker-indicator {*/
        /*    display: none;*/
        /*    -webkit-appearance: none;*/
        /*}*/

        {{--[type="date"] {--}}
        {{--    background:#fff url('{{asset('img/date-input.png')}}')  97% 50% no-repeat ;--}}
        {{--}--}}
        /*[type="date"]::-webkit-inner-spin-button {*/
        /*    display: none;*/
        /*}*/
        [type="date"]::-webkit-calendar-picker-indicator {
            opacity: 0;
        }

        .custom-control-label::before{
            top: 2px !important;
        }
        .custom-control-label:after{
            top: 2px !important;
        }
        @media (min-width: 768px){
            .custom-control-label::before {
                top: 11.5px !important;
            }
            .custom-control-label::after {
                top: 11.5px !important;
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

        <div class="card-body text-large-xs">
            <img id="icon_move_home" class="sand-timer img-icon pb-2" src="{{asset('img/sand-clock-icon.png')}}"><span class="border-title">3分でできる</span>  スクール会員無料登録
        </div>

        <div class="card-body pt-0 pb-3">
            <div class="text-medium-title">
                <ul class="progressbar d-flex p-0">
                    <li class="active">検索</li>
                    <li class="active">入力①</li>
                    <li>入力②</li>
                    <li>確認</li>
                    <li>完了</li>
                </ul>
            </div>
        </div>

        <form class="needs-validation" novalidate id="modify_form" action="<?=url('/register/republic/modify/user');?>" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" id="original_id" name="original_id" value="{{$id}}">
            <p class="px-3 text-large-xs text-dark-blue">◆掲載施設情報</p>
            <div class="mt-2 background-light-gray px-3 py-1">
                <p class="text-small">
                    設立元(法人･付属名)
                </p>
                <p class="text-small-xs mt-1">
                    ※付属名について正式名称が｢〇〇〇大学付属 〇〇〇幼稚園｣の場合､〇〇〇大学付属はこちらにご記入いだだき､〇〇〇幼稚園は下記施設名にてご記入ください｡
                </p>
            </div>
            <div class="px-3 py-2">
                <div id="public_name_const" class="px-1">

                    @if(!empty($id))
                        <p class="text-title" id="public_name_content">
                            {{$garden -> garden_public_name}}
                        </p>

                        <p class="text-title" id="public_name_content_second">
                            {{$garden -> garden_public_name_second}}
                        </p>
                    @endif

                </div>

                <div class="p-1" name="toggle" data-const="public_name_const" data-modify="public_name_modify" data-icon="public_name_icon">
                    <p class="text-medium-xs top-title-tag "> 修正する <i class="text-medium-xs fas fa-angle-down" id="public_name_icon"></i> </p>
                </div>

                <div id="public_name_modify" class="d-none">
                    <div class="background-light-sky p-1 text-small">
                        設立元(法人･付属名)
                    </div>
                    @if(!empty($id))
                        <input  class="mt-1 form-control text-small relate-modify" data-content="public_name_content" name="public_name"  value="{{$garden -> garden_public_name}}" >
                    @else
                        <input  class="mt-1 form-control text-small relate-modify" data-content="public_name_content" name="public_name" >
                    @endif

                    <div class="background-light-sky mt-2 p-1 text-small">
                        設立元(法人･付属名)カナ
                    </div>
                    @if(!empty($id))
                        <input  class="mt-1 form-control text-small relate-modify" data-content="public_name_content_second" name="public_name_second"  value="{{$garden -> garden_public_name_second}}" >
                    @else
                        <input  class="mt-1 form-control text-small relate-modify" data-content="public_name_content_second" name="public_name_second" >
                    @endif
                </div>



            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        施設名
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

                <p class="text-small-xs mt-1">
                    ※付属名について正式名称が｢〇〇〇〇大学付属幼稚園｣の場合､〇〇〇〇大学付属幼稚園とこちらにご記入ください｡その場合､上記の法人名学園名または付属名は空欄となります｡
                </p>
            </div>
            <div class="px-3 py-2">
                <div id="garden_name_const" class="px-1">

                    @if(!empty($id))
                        <p class="text-title" id="garden_name_content">
                            {{$garden -> garden_name}}
                        </p>

                        <p class="text-title" id="garden_name_content_second">
                            {{$garden -> garden_name_second}}
                        </p>
                    @endif


                </div>

                <div class="p-1" name="toggle" data-const="garden_name_const" data-modify="garden_name_modify" data-icon="garden_name_icon">
                    <p class="text-medium-xs top-title-tag "> 修正する <i class="text-medium-xs fas fa-angle-down" id="garden_name_icon"></i> </p>
                </div>

                <div id="garden_name_modify" class="d-none">
                    <div class="background-light-sky p-1 text-small">
                        施設名

                    </div>
                    @if(!empty($id))
                        <input class="mt-1 form-control text-small relate-modify require" data-content="garden_name_content" name="garden_name" value="{{$garden -> garden_name}}" required>
                    @else
                        <input class="mt-1 form-control text-small relate-modify require" data-content="garden_name_content" name="garden_name" required>
                    @endif

                    <div class="background-light-sky mt-2 p-1 text-small">
                        施設名カナ
                    </div>

                    @if(!empty($id))
                        <input  class="mt-1 form-control text-small relate-modify require" data-content="garden_name_content_second" name="garden_name_second"  value="{{$garden -> garden_name_second}}" required>
                    @else
                        <input  class="mt-1 form-control text-small relate-modify require" data-content="garden_name_content_second" name="garden_name_second" required>
                    @endif

                </div>
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        園の種類
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

            </div>

            <div class="px-3 py-2">
                <div id="type_const" class="px-1">

                    @if(!empty($id))
                        <p class="text-title" id="type_content">
                            {{$garden -> type -> type_name}}
                        </p>
                    @endif


                </div>

                <div class="p-1" name="toggle" data-const="type_const" data-modify="type_modify" data-icon="type_icon">
                    <p class="text-medium-xs top-title-tag "> 修正する <i class="text-medium-xs fas fa-angle-down" id="type_icon"></i> </p>
                </div>

                <div id="type_modify" class="d-none">
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small require " data-content="type_content"  name="type" required>
                        <option value="0" selected disabled>選択してください</option>
                        @foreach($typeList as $index => $type)
                            @if(!empty($id) && $garden -> type -> type_id == $type -> type_id)
                                <option value="{{$type->type_id}}" selected>{{$type->type_name}}</option>
                            @else
                                <option value="{{$type->type_id}}" >{{$type->type_name}}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        園の分類
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

            </div>



            <div class="px-3 py-2">
                <div id="kind_const" class="px-1">


                    @if(!empty($id))
                        <p class="text-title" id="kind_content">
                            {{$garden -> kind_name}}
                        </p>
                    @endif


                </div>

                <div class="p-1" name="toggle" data-const="kind_const" data-modify="kind_modify" data-icon="kind_icon">
                    <p class="text-medium-xs top-title-tag "> 修正する <i class="text-medium-xs fas fa-angle-down" id="kind_icon"></i> </p>
                </div>

                <div id="kind_modify" class="d-none">
                    <select class="mt-1 px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small require" data-content="kind_content"  name="kind" required>
                        <option value="0" selected disabled>選択してください</option>
                        @foreach($kindList as $index => $kind)
                            @if(!empty($id) && $garden -> kind_id == $kind -> kind_id)
                                <option value="{{$kind->kind_id}}" selected>{{$kind->kind_name}}</option>
                            @else
                                <option value="{{$kind->kind_id}}" >{{$kind->kind_name}}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        住所
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

            </div>

            <div class="px-3 py-2">
                <div id="address_const" class="px-1">

                    <div class="d-flex">
                        @if(!empty($id))
                            <input type="hidden" id="original_post" value="{{$garden -> post_code}}">
                            <p class="text-title" id="post_content_first">

                            </p>
                            -
                            <p class="text-title" id="post_content_second">

                            </p>
                        @endif
                    </div>
                    <div class="d-flex">
                        @if(!empty($id))
                            <p class="text-title" id="prefecture_content">

                                {{$garden -> prefecture_name}}

                            </p>
                            <p class="text-title" id="city_content">

                                {{$garden -> city_name}}


                            </p>
                            <p class="text-title" id="town_content">

                                {{$garden -> town_name}}

                            </p>
                        @endif

                    </div>
                    @if(!empty($id))
                        <p class="text-title" id="address_content">

                            {{$garden -> address}}

                        </p>
                        <input type="hidden" id="original_city_id" value="{{$garden -> city_id}}">
                    @endif


                </div>

                <div class="p-1" name="toggle" data-const="address_const" data-modify="address_modify" data-icon="address_icon">
                    <p class="text-medium-xs top-title-tag "> 修正する <i class="text-medium-xs fas fa-angle-down" id="address_icon"></i> </p>
                </div>

                <div id="address_modify" class="d-none">
                    <div class="mt-1 d-flex justify-content-center">

                        <input type="text" class="form-control text-small require relate-modify" name="post_first" onkeyup="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city', 'town');" onchange="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city');" id="post_code_first" maxlength="3" required/>
                        <p class="text-small-xs px-2">-</p>
                        <input type="text" class="form-control text-small require relate-modify" name="post_second" onkeyup="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city', 'town');" onchange="AjaxZip3.zip2addr('post_first', 'post_second', 'prefecture', 'city');" id="post_code_second" maxlength="4" required/>

{{--                        <input  class="form-control text-small require relate-modify" data-content="post_content_first"  placeholder="郵便番号" name="post_first" type="number" required>--}}
{{--                        --}}
{{--                        <input  class=" form-control text-small require relate-modify" data-content="post_content_second" placeholder="" name="post_second" type="number" required>--}}
                        <p class="text-small-xs pl-2">住所自動入力</p>
                    </div>
                    <div class="mt-1 d-flex">
                        <div class="flex-1 mr-2">
                            <input class="form-control flex-1 mb-0 text-small require" name="prefecture" id="prefecture" required>
{{--                            <select class="custom-select custom-select-sm form-control form-control-sm  flex-1 mb-0 text-small require" data-content="prefecture_content" name="prefecture" id="prefecture" required>--}}
{{--                                <option value="0" selected disabled >都道府県</option>--}}
{{--                                @foreach($prefectureList as $index => $prefecture)--}}
{{--                                    @if(!empty($id) && $garden -> prefecture_id == $prefecture -> prefecture_id)--}}
{{--                                        <option value="{{$prefecture->prefecture_id}}" selected>{{$prefecture->prefecture_name}}</option>--}}
{{--                                    @else--}}
{{--                                        <option value="{{$prefecture->prefecture_id}}">{{$prefecture->prefecture_name}}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
                        </div>
                        <div class="flex-1">
                            <input class="form-control flex-1 mb-0 text-small require" name="city" id="city" required>
{{--                            <select class="custom-select custom-select-sm form-control form-control-sm  flex-1 mb-0 text-small require" data-content="city_content" name="city" required id="city">--}}
{{--                                <option value="0" selected disabled>市区町村郡</option>--}}
{{--                            </select>--}}
                        </div>
                    </div>
                    @if(!empty($id))
                        <input  class="mt-1 form-control text-small require relate-modify" data-content="town_content"   placeholder="町域" name="town" value="{{$garden -> town_name}}" required>
                    @else
                        <input  class="mt-1 form-control text-small require relate-modify" data-content="town_content"   placeholder="町域" name="town" required>
                    @endif

                    @if(!empty($id))
                        <input  class="mt-1 form-control text-small require relate-modify" data-content="address_content"   placeholder="以降の住所(建物名･階数など)をご記入ください" name="address" value="{{$garden -> address}}" required>
                    @else
                        <input  class="mt-1 form-control text-small require relate-modify" data-content="address_content"   placeholder="以降の住所(建物名･階数など)をご記入ください" name="address" required>
                    @endif




                </div>
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        電話番号
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

            </div>

            <div class="px-3 py-2">
                @if(!empty($id))
                    <input type="hidden" id="original_mobile" value="{{$garden -> mobile}}">
                    <div id="mobile_const" class="px-1 d-flex">
                        <p class="text-title" id="mobile_1">

                        </p>
                        -
                        <p class="text-title" id="mobile_2">

                        </p>
                        -
                        <p class="text-title" id="mobile_3">

                        </p>
                    </div>
                @endif


                <div class="p-1" name="toggle" data-const="mobile_const" data-modify="mobile_modify" data-icon="mobile_icon">
                    <p class="text-medium-xs top-title-tag "> 修正する <i class="text-medium-xs fas fa-angle-down" id="mobile_icon"></i> </p>
                </div>

                <div id="mobile_modify" class="d-none ">
                    <div class="d-flex justify-content-center">
                        <input  class="mt-1 form-control text-small relate-modify mr-1 require" data-content="mobile_1" name="mobile_1" type="number" required>
                        -
                        <input  class="mt-1 form-control text-small relate-modify mx-1 require" data-content="mobile_2" name="mobile_2" type="number" required>
                        -
                        <input  class="ml-1 mt-1 form-control text-small relate-modify require" data-content="mobile_3" name="mobile_3" type="number" required>
                    </div>

                </div>
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        確認用URL
                    </p>
                </div>

            </div>

            <div class="px-3 py-2">
                @if(!empty($id))
                    <input  class="mt-1 form-control text-small relate-modify" name="url" value="{{$garden -> url}}">
                @else
                    <input  class="mt-1 form-control text-small relate-modify"  name="url" >
                @endif
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        確認のための書類添付
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>


            </div>

            <div class="px-3 py-2">
                <p class="text-medium-xs mt-1">
                    園住所に届いた公共料金のお知らせや公的機関からの郵便物の他､消印のある郵便物など､園を確認できる書類を添付してください
                </p>

                <div class="mt-2 d-flex align-items-center text-medium-xs">
                    <button type="button" class="rounded px-3 py-2 btn-dark-grey btn-normal" id="btn_add_img" style="border: none; border-radius: 5px !important; color: white;">画像選択...</button>
                    <p class="ml-3">※最大5MB　1枚のみ</p>


                </div>


                @if(!empty($id) && !empty($garden -> photo_attachment))
                    <input type="hidden" name="photo_attachment" value="{{$garden -> photo_attachment}}">
                    <img class="img-responsive full-width img-content  pt-2" src="{{asset('/storage/img/garden/'.$garden -> photo_attachment)}}" id="img_default_body" >
                @else
                    <img class="img-responsive full-width img-content d-none pt-2" id="img_default_body" >
                @endif

                <input id="img_default" type="file" accept="image/*" name="file" style="display:none;" />
            </div>

            <div class="mt-2 background-light-gray px-3 py-1">
                <div class="d-flex justify-content-center">
                    <p class="p-1 text-small flex-1">
                        創立日
                    </p>
                    <p class="ml-2 background-pink text-white text-small-xs px-2 mr-2">必須</p>
                </div>

            </div>
            <div class="px-3 py-2">
                <div class="mt-2 custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="radio_accept_1" name="radio_accept" value="1" required>
                    <label class="custom-control-label text-medium-xs d-flex input_date" for="radio_accept_1">西暦 <input class="form-control text-small require relate-modify date-input ml-2" style="margin-top: -5px;" type="date" name="founding_1" id="soreki" disabled><label for="soreki"></label></label>
                </div>
                <div class="mt-3 custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="radio_accept_2" name="radio_accept" value="2" required>
                    <label class="custom-control-label text-medium-xs d-flex input_date" for="radio_accept_2">和暦 <input class="form-control text-small require relate-modify date-input ml-2" style="margin-top: -5px;" type="date" name="founding_2" id="wareki" disabled><label for="wareki"></label></label>
                </div>
{{--                @if(!empty($id))--}}
{{--                    <input  class="mt-1 form-control text-small require relate-modify date-input" type="date" name="founding" value="{{$garden -> founding}}" required>--}}
{{--                @else--}}
{{--                    <input  class="mt-1 form-control text-small require relate-modify date-input" type="date" name="founding" required>--}}
{{--                @endif--}}
            </div>

            <div class="mt-2 justify-content-center d-flex">
                <p class="position-relative text-medium-xs px-2 py-2 text-pink background-dark-pink map-overlay d-flex mb-0" ><label class="mb-0" style="margin-top: 4px">残りの必須項目数</label>　<label class="text-pink text-title-large-medium mb-0" id="require_count">0</label><label class="text-pink text-title-large-medium mb-0">/7</label></p>
            </div>

            <div class="card-body text-center">
                <button type="submit" class="gray-btn-gradient mx-0 btn rounded waves-effect btn-full btn-title text-white" id="btn_next" style="border: none !important; width: 60%">次へ  </button>

            </div>


        </form>





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

            var imgDefault = null;
            var home_path = $("#home_path").val();
            var imgSource;
            $("#move_garden").click(function(event) {
                //window.history.back();
                window.location.href = home_path + '';
            });

            $('[name="radio_accept"]').change(function () {
                var val = $(this).val();
                //console.log(val);
                if(val == '1'){
                    $('[name="founding_1"]')[0].disabled = false;
                    $('[name="founding_1"]')[0].required = true;
                    $('[name="founding_2"]')[0].disabled = true;
                    $('[name="founding_2"]')[0].required = false;
                    $('[name="founding_2"]').val('')

                }else{
                    $('[name="founding_1"]')[0].disabled = true;
                    $('[name="founding_1"]')[0].required = false;
                    $('[name="founding_2"]')[0].disabled = false;
                    $('[name="founding_2"]')[0].required = true;
                    $('[name="founding_1"]').val('')
                }
            })

            $('#soreki').click(function() {
                console.log('d')
                if($(this).attr('type') !== 'date'){
                    console.log($(this).attr('type'))
                    $(this).attr('type', 'date');
                }
            })
            $('#wareki').click(function() {
                console.log('d')
                if($(this).attr('type') !== 'date'){
                    console.log($(this).attr('type'))
                    $(this).attr('type', 'date');
                }
            })
            $('.input_date').click(function () {
                if($(this).find('input').attr('type') !== 'date'){
                    $(this).find('input').attr('type', 'date');
                }

            })

            $('[name=post_first]').keyup(function () {
                $('#post_content_first').text($(this).val())
            })
            $('[name=post_second]').keyup(function () {
                $('#post_content_second').text($(this).val());
            })

            $('[name=town]').keyup(function () {
                $('#town_content').text($(this).val())
            })
            $('[name=town]').on('input', function () {
                $('#town_content').text($(this).val())
            })

            $('[name="founding_1"]').change(function () {
                var $dob = $(this);
                //var d = moment($dob.val()).toDate();

                var date = $dob.val();
                if(date !== ''){
                    date = date.split('-');
                    var s = date[0] + '年 ' + date[1] + '月 ' + date[2] + '日'

                    $(this).attr('type', 'text');
                    $(this).val(s);
                }


            })


            $('[name="founding_2"]').change(function () {
                var $dob = $(this);
                //var d = moment($dob.val()).toDate();
                var date = $dob.val();
                if(date !== ''){
                    // date = date.split('-');
                    // var y = date[0], s;
                    // y = parseInt(y);
                    // if (isNaN(y)) { s = "数字を入力して下さい｡"; }
                    // else if (y > 1988) { s = "平成"+(y-1988)+"年"; }
                    // else if (y > 1925) { s = "昭和"+(y-1925)+"年"; }
                    // else if (y > 1911) { s = "大正"+(y-1911)+"年"; }
                    // else if (y > 1867) { s = "明治"+(y-1867)+"年"; }
                    // else { s = "西暦は1868(明治元年)より大きい年数を指定下さい｡"; }
                    // s = s + ' ' + date[1] + '月 ' + date[2] + '日'
                    $(this).attr('type', 'text');
                    $dob.val(getWarekiYmd(date));
                }

            })


            function getWarekiYmd(date){

                //年号毎の開始日付
                var m = new Date(1868,8,8);	//1868年9月8日～
                var t = new Date(1912,6,30);	//1912年7月30日～
                var s = new Date(1926,11,25);	//1926年12月25日～
                var h = new Date(1989,0,8);	//1989年1月8日～
                var a = new Date(2019,4,1);	//2019年5月1日～

                //対象日付
                var dt = new Date(date);             //当日の場合
                //  var dt = new Date(1989,0,7);   //日付指定の場合（月は-1してください）
                console.log(dt);

                var y = dt.getFullYear();
                var mo = ("00" + (dt.getMonth()+1)).slice(-2); //※
                var d = ("00" + dt.getDate()).slice(-2);       //※
                //※ゼロ埋めしたくない場合は以下に置き換えてください。
                //var mo = dt.getMonth()+1;
                //var d = dt.getDate();

                var gen="";
                var nen=0;

                //元号判定
                if(m<=dt && dt<t){
                gen = "明治";
                nen = (y - m.getFullYear())+1;
                }else if(t<=dt && dt<s){
                gen = "大正";
                nen = (y - t.getFullYear())+1;
                }else if(s<=dt && dt<h){
                gen = "昭和";
                nen = (y - s.getFullYear())+1;
                }else if(h<=dt && dt<a){
                gen = "平成";
                nen = (y - h.getFullYear())+1;
                }else if(a<=dt){
                gen = "令和";
                nen = (y - a.getFullYear())+1;
                }else{
                gen = "";
                }

                //1年の場合は"元"に置き換え
                if(nen == 1){
                nen = "元";
                }

                //日付生成
                var result = gen + nen + "年" + mo + "月" + d + "日";

                return result;
            }


            $("[name=toggle]").click(function(event) {
                event.preventDefault();
                var icon_id = $(this).data('icon');
                var modify_id = $(this).data('modify');
                if($("#" + icon_id).hasClass("fa-angle-down")) {
                    $("#" + icon_id).removeClass("fa-angle-down");
                    $("#" + icon_id).addClass("fa-angle-up");
                    $("#" + modify_id).removeClass("d-none");
                } else {
                    $("#" + icon_id).addClass("fa-angle-down");
                    $("#" + icon_id).removeClass("fa-angle-up");
                    $("#" + modify_id).addClass("d-none");
                }
            });



            var original_city_id = $("#original_city_id").val();
            var garden_id = $("#original_id").val();

            if(garden_id > 0) {
                var post_code = $("#original_post").val();
                var mobile = $("#original_mobile").val();

                var split_post = post_code.split("-");
                var split_mobile = mobile.split("-");
                $("#post_content_first").text(split_post[0]);
                $("#post_content_second").text(split_post[1]);

                $("[name=post_first]").val(split_post[0]);
                $("[name=post_second]").val(split_post[1]);

                $("#mobile_1").text(split_mobile[0]);
                $("#mobile_2").text(split_mobile[1]);
                $("#mobile_3").text(split_mobile[2]);

                $("[name=mobile_1]").val(split_mobile[0]);
                $("[name=mobile_2]").val(split_mobile[1]);
                $("[name=mobile_3]").val(split_mobile[2]);

            } else {
                $("[name=toggle]").each(function() {
                    var modify_id = $(this).data('modify');
                    $(this).addClass('d-none');
                    $("#" + modify_id).removeClass('d-none');
                });
            }

            $("#post_code_first").trigger('keyup');
            $("#post_code_second").trigger('keyup');


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
                            if(original_city_id > 0) {
                                $("#city").append("<option class='city_detail' value='" + city_id + "' selected>" + city_name + "</option>");
                            } else {
                                $("#city").append("<option class='city_detail' value='" + city_id + "'>" + city_name + "</option>");
                            }
                            original_city_id = 0;

                            var cnt = getRequiredCount();

                            $("#require_count").text(cnt);
                        });
                    }
                });
            }

            var prefecture_id = $("#prefecture").val();

            if(prefecture_id > 0) {
                getCityList(prefecture_id);
            }

            $(document).on('change', "[name=prefecture]", function() {

                var prefecture_id = $(this).val();

                getCityList(prefecture_id);
            });

            $("select").change(function(event) {
                var id = $(this).attr('id');
                var val = $('option:selected',this).text();
                var content_id = $(this).data('content');

                $("#" + content_id).html(val);
            });

            $(".relate-modify").change(function event() {
               var val = $(this).val();

               var content_id = $(this).data('content');
               $("#" + content_id).html(val);
            });


            $("#img_default").change(function() {
                if (this.files && this.files[0]) {
                    var file = this.files[0];
                    if (file.size > 5000000) {
                        alert('ファイル容量が5Mを超えています｡');
                        return;
                    }
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#img_default_body").removeClass("d-none");
                        $("#img_default_body").attr('src', e.target.result);
                        var cnt = getRequiredCount();
                        $("#require_count").text(cnt);
                    }
                    reader.readAsDataURL(this.files[0]); // convert to base64 string
                    imgDefault = this.files[0];
                }
            });

            $("#btn_add_img").click(function(event) {
                event.preventDefault();
                $("#img_default").click();
            });



            $("#btn_search").click(function(event) {
                var search = $("#txt_search").val();

                window.location.href = home_path + '/register/republic/search?name=' + search;
                //window.location.href = 'http://example.com';
            });

            function getRequiredCount() {
                var count = 7;
                if($("[name=founding_1]").val().length > 0 || $("[name=founding_2]").val().length > 0) {

                    count = count - 1;
                }
                if($("[name='garden_name']").val().length > 0 && $("[name=garden_name_second]").val().length > 0) {


                    count = count - 1;
                }

                if($("[name=type]").val() > 0) {

                    count = count - 1;
                }

                if($("[name=kind]").val() > 0) {

                    count = count - 1;
                }

                if($("[name=post_first]").val().length > 0 && $("[name=post_second]").val().length > 0 && $("[name=town]").val().length > 0 &&
                    $("[name=address]").val().length > 0 && $("[name=prefecture]").val().length > 0 && $("[name=city]").val().length > 0) {
                    count = count - 1;
                }

                if($("[name=mobile_1]").val().length > 0 && $("[name=mobile_2]").val().length > 0 && $("[name=mobile_3]").val().length > 0) {
                    count = count - 1;
                }
                if(!$("#img_default_body").hasClass("d-none")) {

                    count = count - 1;
                }
                $("#require_count").text(count);
                return count;
            }
            $(".require").change(function() {
                var cnt = getRequiredCount();

                $("#require_count").text(cnt);
            });

            $("#btn_next").click(function(event) {
                event.preventDefault();
                var forms = document.getElementById('modify_form');
                forms.classList.add('was-validated');
                var count = getRequiredCount();

                if (forms.checkValidity() === true && count == 0) {
                    var obj = {};
                    var garden_id = $("#original_id").val();
                    obj['garden_id'] = garden_id;
                    var garden_name = $("[name=garden_name]").val();
                    obj['garden_name'] = garden_name;
                    var garden_name_second = $("[name=garden_name_second]").val();
                    obj['garden_name_second'] = garden_name_second;
                    var public_name = $("[name=public_name]").val();
                    obj['public_name'] = public_name;
                    var public_name_second = $("[name=public_name_second]").val();
                    obj['public_name_second'] = public_name_second;
                    var type_index = $("[name=type]").val();
                    obj['type_index'] = type_index;
                    var type = $("[name=type] option:selected" ).text();
                    obj['type'] = type;
                    var kind_index = $("[name=kind]").val();
                    obj['kind_index'] = kind_index;
                    var kind = $("[name=kind] option:selected" ).text();
                    obj['kind'] = kind;
                    var post_code = $("[name=post_first]").val() + "-" + $("[name=post_second]").val();
                    obj['post_code'] = post_code;
                    var prefecture_index = $("[name=prefecture]").val();
                    obj['prefecture_index'] = prefecture_index;
                    var prefecture = $("[name=prefecture]" ).text();
                    obj['prefecture'] = prefecture;
                    var city_index = $("[name=city]").val();
                    obj['city_index'] = city_index;
                    var city = $("[name=city]" ).text();
                    obj['city'] = city;
                    var town = $("[name=town]").val();
                    obj['town'] = town;
                    var address = $("[name=address]").val();
                    obj['address'] = address;
                    var mobile = $("[name=mobile_1]").val() + "-" + $("[name=mobile_2]").val() + "-" + $("[name=mobile_3]").val();
                    obj['mobile'] = mobile;
                    var url = $("[name=url]").val();
                    obj['url'] = url;
                    var val = $("[name=founding_1]").val();

                    if(val.length > 0){
                        var founding = $("[name=founding_1]").val();
                    }
                    else{
                        var founding = $("[name=founding_2]").val();
                    }
                    //var founding = $("[name=founding]").val();
                    obj['founding'] = founding;

                    localStorage.setItem('garden', JSON.stringify(obj));
                    forms.submit();
                }
            })

            setTimeout(getRequiredCount, 500);






        });
    </script>
@endsection
