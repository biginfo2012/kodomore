@extends('layouts.app')

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
        .school-list {
            background-color: #FAFAD7;
            padding: .8rem;
        }
        .school-item {
            background-color: white;
            position: relative;
            margin-bottom: 1rem;
            border-radius: 5px !important;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header title-background text-small-xs d-flex ">
            <img id="icon_move_home" class="height-1 img-icon mr-1" src="{{asset('img/home.png')}}"> >
            <p><span class="top-title-tag">ログイン </span> > <span id="move_my_page" class="top-title-tag">マイページ </span> > 問い合せ履歴</p>
        </div>

        <div class="card-body text-large-medium-xs py-2 background-white-blue" style="border-bottom: 1px solid #ABABAB">
            <img class="height-2 img-icon py-1" src="{{asset('img/blog.png')}}"> 問合わせ履歴

            <div class="float-right sort-select">
                <select class="px-2 py-1 custom-select custom-select-sm form-control form-control-sm text-small" name="old">
                    <option value="new" selected>問合わせ/新しい順  </option>
                    <option value="old">問合わせ/古い順</option>
                </select>
            </div>
        </div>


        <div class="card school-list">
                @if(!empty($gardenList))
                    @foreach($gardenList as $index => $garden)
                        <div class="card-body school-item" >
                            <p class="text-small"><?=$garden->prefecture_name;?> ｜ <?=$garden->city_name;?> ｜ <?=$garden->town_name;?>
                                @foreach($garden -> typeList as $type)
                                    ｜ {{$type->type_name}}
                                @endforeach
                                @foreach($garden->tagList as $index => $tag)
                                     @if($tag->id == 68 || $tag->id == 69)
                                        ｜ {{$tag -> tag_title}}
                                    @endif
                                @endforeach
                            </p>
                            <h6 class="text-truncate text-medium-title mb-1 pb-1" style="border-bottom: 1px solid #ABABAB"><?=$garden->garden_name;?></h6>
                            <p class="text-normal text-3">イベント名A◯◯◯◯◯◯◯◯◯について</p>
                            <p class="text-42 text-small-xs">お問合せ内容が入ります｡この文章はダミーです｡読みやすい程度の本文をいれてください｡誌面の時よりも本文を増やしてもOKです｡この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡</p>
                            <p class="text-small-xs text-42 mt-2">問い合せ日：2020/00/00</p>

                            <h6 class="text-truncate text-medium-title mt-2 school-detail mt-2 pt-1" style="border-top: 1px solid #ABABAB">{{$garden->garden_name}}からの回答</h6>
                            <p class="text-42 text-small-xs">お問合せ内容が入ります｡この文章はダミーです｡読みやすい程度の本文をいれてください｡誌面の時よりも本文を増やしてもOKです｡この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡</p>
                            <p class="text-small-xs text-42 mt-2">回答日：2020/00/00</p>
                        </div>
                    @endforeach
                    <input type="hidden" id="start" value="<?=$start;?>">
                    <input type="hidden" id="end" value="<?=$end;?>">
                    <input type="hidden" id="total" value="<?=$total;?>">
                    <input type="hidden" id="perShow" value="<?=$perShow;?>">

                    <nav aria-label="Page navigation example" class="mt-2">
                            <ul class="pagination pagination-circle pg-blue mb-1">
                                @if($start > $perShow && $start < 2 * $perShow)
                                    <li class="page-item " id="previous">
                                        <a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Previous">
                                            <span aria-hidden="true">前へ</span>
                                        </a>
                                    </li>
                                    <span aria-hidden="true" class="text-medium-xs mt-1">...</span>

                                @endif

                                @if($start > 2* $perShow)
                                    <li class="page-item " id="first"><a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px">最初へ</a></li>
                                    <li class="page-item " id="previous">
                                        <a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px;" aria-label="Previous">
                                            <span aria-hidden="true">前へ</span>
                                        </a>
                                    </li>
                                    <span aria-hidden="true" class="text-medium-xs mt-1">...</span>

                                @endif

                                @for ($i = $start; $i <= $end; $i++)
                                    @if($i == $current)
                                        <li class="page-item active text-medium-xs" id="page_<?=$i;?>"><a class="page-link text-medium-xs mx-1 px-2 py-1"><?=$i;?></a></li>
                                    @else
                                        <li class="page-item text-medium-xs" id="page_<?=$i;?>"><a class="page-link text-medium-xs mx-1 px-2 py-1"><?=$i;?></a></li>
                                    @endif
                                @endfor
                                @if($end <= $total - 2* $perShow)
                                    <span aria-hidden="true" class="text-medium-xs mt-1">...</span>
                                    <li class="page-item" id="next">
                                        <a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                                            <span aria-hidden="true">次へ</span>
                                            {{--                        <span class="sr-only">次へ</span>--}}
                                        </a>
                                    </li>
                                    <li class="page-item text-medium-xs" id="last"><a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px" id="last">最後へ</a></li>
                                @endif
                                @if($end > $total - 2 * $perShow && $end < $total)
                                    <span aria-hidden="true" class="text-medium-xs mt-1">...</span>
                                    <li class="page-item" id="next">
                                        <a class="page-link text-medium-xs mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                                            <span aria-hidden="true">次へ</span>
                                            {{--                        <span class="sr-only">次へ</span>--}}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                @endif


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
            $("#move_my_page").click(function(event) {
                window.location.href = home_path + '/parent/my-page';
                //window.location.href = 'http://example.com';
            });

        });
    </script>
@endsection

