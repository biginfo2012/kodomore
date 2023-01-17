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

        .background-gray{
            background-color: #C4C4C4 !important;
        }






    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}">    > 保護者と生徒､スクールで公開情報を編集する
        </div>

        <div class="card-body text-title pb-0">
            <img class="height-4 img-icon pb-1" src="{{asset('img/fa-edit.png')}}"> 申請内容確認
        </div>

        <div class="card-body py-1">
            @if(count($gardenList) > 0)
                <p class="text-title-large text-pink">同一住所(電話番号)の</p>
                <p class="text-title-large text-pink mb-2">登録がありますがよろしいですか？</p>
                @foreach($gardenList as $garden)
                    <div class="top-menu pb-1 px-2 py-1 mt-1" style="background-color: #D6F2F4 !important;">
                        <p class="text-normal"><?=$garden->prefecture_name;?> <?=$garden->city_name;?>
                            @foreach($garden -> typeList as $type)
                                ｜ {{$type->type_name}}
                            @endforeach</p>
                        <p class="text-large-xs-medium"><?=$garden->garden_name;?></p>
                    </div>
                @endforeach
            @endif

            @if(!empty($public_name))
                    <div class="mt-3 background-light-gray">
                        <p class="text-small p-1">
                            設立元(法人･付属名)
                        </p>
                    </div>
                    <p class="mt-1 text-medium">{{$public_name}}</p>
                    <div class="mt-3 background-light-gray">
                        <p class="text-small p-1 ">
                            設立元(法人･付属名)カナ
                        </p>
                    </div>
                    <p class="text-medium mt-1">{{$public_name_second}}</p>
                @endif





            <div class="mt-3 background-light-gray">
                <p class="text-small p-1">
                    施設名
                </p>
            </div>
            <p class="text-medium mt-1">{{$garden_name}}</p>

            <div class="mt-3 background-light-gray">
                <p class="text-small p-1">
                    施設名カナ
                </p>
            </div>
            <p class="text-medium mt-1">{{$garden_name_second}}</p>

            <div class="mt-3 background-light-gray">
                <p class="text-small p-1">
                    郵便番号
                </p>
            </div>
            <p class="text-medium mt-1">{{$post_code}}</p>

            <div class="mt-3 background-light-gray">
                <p class="text-small p-1">
                    住所
                </p>
            </div>
            <p class="text-medium mt-1">{{$prefecture_name.$city_name.$town.$address}}</p>
            <div class="mt-3 background-light-gray">
                <p class="text-small p-1">
                    電話番号
                </p>
            </div>
            <p class="text-medium mt-1">{{$mobile}}</p>

            <div class="mt-3 background-light-gray">
                <p class="text-small p-1">
                    URL
                </p>
            </div>
            <p class="text-medium mt-1">{{$url}}</p>
        </div>

        <form id="register_form" action="<?=url('/school/create/complete');?>" method="post">
            {{csrf_field()}}
            <input type="hidden" name="public_name" value="{{$public_name}}">
            <input type="hidden" name="public_name_second" value="{{$public_name_second}}">
            <input type="hidden" name="garden_name" value="{{$garden_name}}">
            <input type="hidden" name="garden_name_second" value="{{$garden_name_second}}">
            <input type="hidden" name="post_code" value="{{$post_code}}">
            <input type="hidden" name="prefecture" value="{{$prefecture}}">
            <input type="hidden" name="city" value="{{$city}}">
            <input type="hidden" name="town" value="{{$town}}">
            <input type="hidden" name="address" value="{{$address}}">
            <input type="hidden" name="mobile" value="{{$mobile}}">
            <input type="hidden" name="url" value="{{$url}}">

            <div class="card-body py-1">
                <div class="flex mt-3">
                    <button class="mx-0 btn btn-outline-default rounded waves-effect btn-full text-medium text-blue" style="border: 1px solid #236888 !important;" id="btn_back">内容を修正する </button><i class="text-blue fas fa-angle-left ml-1"></i>
                </div>

                <div class="mt-2 flex justify-content-center">
                    <button class="gray-btn-gradient mx-0 btn btn-outline-default rounded waves-effect btn-full btn-title text-white " id="btn_submit">申請依頼する </button><i class="text-white fas fa-angle-right ml-1"></i>
                </div>


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
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {

            var home_path = $("#home_path").val();

            $("#btn_back").click(function(event) {
                event.preventDefault();
                history.back();
            })





        });
    </script>
@endsection
