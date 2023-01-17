@if(!empty($gardenList))
    @foreach($gardenList as $index => $garden)
        <div class="card-body school-item px-3 pt-2 pb-0 view" style="background-color: #F5F9FA">
            @if($index == 2)
                <div class="align-middle text-center w-100 h-100 mask flex-center rgba-green-strong" style="z-index: 3">
                    <p class="text-size-50 text-white">キャンセルしました</p>
                </div>

            @endif
                @if($index == 3)
                    <div class="align-middle text-center w-100 h-100 mask flex-center rgba-green-strong" style="z-index: 3">
                        <p class="text-size-50 text-white">イベント終了</p>
                    </div>

                @endif

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
            <div class="row">
                <div class="col-4 pr-0">
                    <div class="radio-image">
                        @if(array_key_exists('img', $garden->imgInfo))
                            <img class="card-img-top school-detail" id="img_<?=$garden->garden_id;?>" src="<?=asset('img/garden/'.$garden->imgInfo["img"]);?>" alt="" style="border-radius: 0 !important;">
                        @endif
                    </div>
                </div>

                <div class="col-8 pl-1">
                    <div class="flex-wrap mt-0">
                        <p><span class="text-medium-xs text-3">開催日時</span><span class="text-large-medium-xs text-3">2020年00月00日</span><span class="text-small text-3">(曜)</span></p>
                        <p class="text-medium-xs text-3" style="margin-top: -5px">第2部 / 午前00：00〜午後00：00</p>
                        <p class="text-large-xs line-clamp1 event-name">イベント名が入ります〇〇イベント名が入ります〇〇イベント名が入ります〇〇</p>
                        <p class="text-small text-3">【持ち物】 ◯◯◯･◯◯◯</p>
                        <p class="text-small text-3" style="margin-top: -3px">【集合時間】 午前00：00まで</p>
                        <p class="text-small text-3" style="margin-top: -3px">【集合場所】 ◯◯幼稚園･◯◯◯</p>
                    </div>
                </div>
            </div>

            <div class="text-center margin-top-4">
                <img class="rotate-icon width-1 whole_text_show mx-auto" src="{{asset('img/blue-drop.png')}}">
            </div>

            <div class="row mb-2">
                @if($index !== 2 && $index !== 3)
                    <div class="col-6">
                        <div class="text-center">
                            <p class="text-normal title-background ml-3 py-1 z-depth-1 my-2 cancel_event" style="color: #666666; border-radius: 13px;">キャンセルする</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <p class="text-normal title-background mr-3 py-1 z-depth-1 my-2 change_event" style="color: #666666; border-radius: 13px;">参加人数の変更</p>
                        </div>
                    </div>
                @endif
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
