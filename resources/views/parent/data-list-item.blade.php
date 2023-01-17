@if(!empty($gardenList))
    @foreach($gardenList as $index => $garden)
        <div class="card-body school-item rounded py-2 mb-0" style="border-bottom: 1px solid #ABABAB">

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
            <div class="row">
                <div class="col-4 pr-0">
                    <div class="radio-image">
                        @if(array_key_exists('img', $garden->imgInfo))
                            <img class="card-img-top school-detail" id="img_<?=$garden->garden_id;?>" src="<?=asset('img/garden/'.$garden->imgInfo["img"]);?>" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-8 pl-1">
                    <h6 class="text-truncate text-medium-title mb-1"><?=$garden->garden_name;?></h6>
                    <div class="d-flex ">
                        @if($garden -> status == '応募受付中')
                            <div style="flex: 2" ><p class="px-1 text-small " style="width: fit-content; background-color: #FFFFC8; line-height: 1.1;">願書受付中 {{$garden -> reception_date}} </p></div>
                            <div class="flex-1 d-none"><p class="text-small float-right">レビュー(00)</p></div>
                        @else
                            <p class="text-small">{{$garden -> status}}</p>
                        @endif
                    </div>
                    <div class="d-flex flex-wrap mt-1">
                        @foreach($garden -> keywordList as $keyword)
                            @if($keyword->keyword_id == '8' || $keyword->keyword_id == '9')
                                <div class="mr-1 mb-1 px-1 text-small rounded rounded-small" style="background-color: #E9F6FD">
                                    <?=$keyword->keyword_title;?>
                                </div>
                            @else
                                <div class="mr-1 mb-1 px-1 text-small rounded rounded-small" style="background-color: #E9F6FD">
                                    <?=$keyword->keyword_title;?>
                                </div>
                            @endif

                        @endforeach
                    </div>
                    <p class="text-small-xs float-right" style="color: #8E8E8E">閲覧日 {{$garden->favourite_date}}</p>
                </div>
            </div>


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
