
    <div class="card school-list">
        @if(!empty($gardenList))
            @foreach($gardenList as $index => $garden)
                <div class="card-body school-item rounded" >
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
                    <h6 class="text-truncate text-medium-title mb-1"><?=$garden->garden_name;?></h6>
                    <div class="d-flex ">
                        @if($garden -> status == '応募受付中')
                            <div style="flex: 3" ><p class="px-1 text-small ml-n1" style="width: fit-content; background-color: #FFFFC8">願書受付中 {{$garden -> reception_date}} </p></div>
                            <div class="flex-1"><p class="text-small float-right mr-n1">レビュー({{$garden->review}})</p></div>
                        @else
                            <div style="flex: 3" ><p class="px-1 text-small ml-n1" style="width: fit-content; background-color: #FFFFC8">{{$garden -> reception_date}} </p></div>
                            <div class="flex-1"><p class="text-small float-right mr-n1">レビュー({{$garden->review}})</p></div>
                        @endif

                    </div>

                    <div class="d-flex flex-wrap mt-1 ml-n1">
                        @foreach($garden -> keywordList as $keyword)
                            @if($keyword->keyword_id == '10' || $keyword->keyword_id == '9')
                                <div class="mr-1 mb-1 px-1 title-background  text-small rounded rounded-small text-white" style="background: #FF557E !important;">
                                    <?=$keyword->keyword_title;?>
                                </div>
                            @else
                                <div class="mr-1 mb-1 px-1 title-background  text-small rounded rounded-small" style="background: #E9F6FD !important;">
                                    <?=$keyword->keyword_title;?>
                                </div>
                            @endif

                        @endforeach
                    </div>


                    <div class="radio-image mx-n1">
                        @if(array_key_exists('img', $garden->imgInfo))
                            <img class="card-img-top school-detail" id="img_<?=$garden->garden_id;?>" src="<?=asset('img/garden/'.$garden->imgInfo["img"]);?>" style="border-radius: 0 !important;" alt="">


                            @if($garden->imgInfo["img"] !== 'NOIMAGE.jpg')
                                @if($garden->imgInfo["img_source"] == '公式サイトより')
                                    <div class="text-small-xs text-white d-flex" style="position: absolute; bottom: .25rem; right: .5rem;"><img class="img-icon height-1" src="{{asset('img/capture.png')}}"><p class="hit-the-floor ">{{$garden->garden_name.' 公式サイトより'}}</p></div>
                                @elseif(empty($garden->imgInfo["img_source"]))
                                    <div class="text-small-xs text-white d-flex" style="position: absolute; bottom: .25rem; right: .5rem;"><img class="img-icon height-1" src="{{asset('img/capture.png')}}"><p class="hit-the-floor ">{{$garden->garden_name}}</p></div>
                                @else
                                    <div class="text-small-xs text-white d-flex" style="position: absolute; bottom: .25rem; right: .5rem;"><img class="img-icon height-1" src="{{asset('img/capture.png')}}"><p class="hit-the-floor ">{{$garden->imgInfo["img_source"]}}</p></div>
                                @endif
                            @endif
                        @endif
                    </div>


                    <h6 class="text-truncate menu-icon text-medium-title school-detail my-1" id="title_<?=$garden->garden_id;?>"><?=$garden->comment_title;?></h6>
                    <p class="line-clamp text-small-xs"><?=$garden->comment_description;?></p>

                    <div class="d-flex flex-wrap mt-2 ml-n1">
                        @foreach($garden -> tagList as $tag)
                            <div class="mr-1 mb-1 px-1 title-background  text-small rounded rounded-small" style="color: #4D4D4D">
                                <?=$tag->tag_title;?>
                            </div>
                        @endforeach
                    </div>

                    <div class="favourite">
                        @if($garden->favourite === 1)
                            <img class="height-1 img-icon favourite_img" id="favourite_<?=$garden->garden_id;?>" src="{{asset('img/favourite.png')}}" data-enable="{{empty(session()->get(SESS_UID))?'disabled':''}}" data-favourite="1">
                        @else
                            <img class="height-1 img-icon favourite_img" id="favourite_<?=$garden->garden_id;?>" src="{{asset('img/favourite-add.png')}}" data-enable="{{empty(session()->get(SESS_UID))?'disabled':''}}" data-favourite="0">
                        @endif


                    </div>


                </div>
            @endforeach
            <input type="hidden" id="start" value="<?=$start;?>">
            <input type="hidden" id="end" value="<?=$end;?>">
            <input type="hidden" id="total" value="<?=$total;?>">
            <input type="hidden" id="perShow" value="<?=$perShow;?>">

            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-circle pg-blue mb-1">
                    @if($start > $perShow && $start < 2 * $perShow)
                        <li class="page-item " id="previous">
                            <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Previous">
                                <span aria-hidden="true">前へ</span>
                            </a>
                        </li>
                        <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>

                    @endif

                    @if($start > 2* $perShow)
                        <li class="page-item " id="first"><a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px">最初へ</a></li>
                        <li class="page-item " id="previous">
                            <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px;" aria-label="Previous">
                                <span aria-hidden="true">前へ</span>
                            </a>
                        </li>
                        <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>

                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        @if($i == $current)
                            <li class="page-item active text-large-xs-medium" id="page_<?=$i;?>"><a class="page-link text-large-xs-medium mx-1 px-2 py-1"><?=$i;?></a></li>
                        @else
                            <li class="page-item text-large-xs-medium" id="page_<?=$i;?>"><a class="page-link text-large-xs-medium mx-1 px-2 py-1"><?=$i;?></a></li>
                        @endif
                    @endfor
                    @if($end <= $total - 2* $perShow)
                        <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>
                        <li class="page-item" id="next">
                            <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                                <span aria-hidden="true">次へ</span>
                                {{--                        <span class="sr-only">次へ</span>--}}
                            </a>
                        </li>
                        <li class="page-item text-large-xs-medium" id="last"><a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" id="last">最後へ</a></li>
                    @endif
                    @if($end > $total - 2 * $perShow && $end < $total)
                        <span aria-hidden="true" class="text-large-xs-medium mt-1">...</span>
                        <li class="page-item" id="next">
                            <a class="page-link text-large-xs-medium mx-1 px-1 py-1" style="border-radius: 15px" aria-label="Next">
                                <span aria-hidden="true">次へ</span>
                                {{--                        <span class="sr-only">次へ</span>--}}
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        @else
            <p class="text-medium-xs text-center">お探しのキーワード検索では見つかりませんでした</p>
        <div class="text-center m-3">
            <a href="#school_list_info">
                <label class="rounded text-center category py-2 text-medium px-4 background-white" style="color: #236481; width: fit-content; border: 1px solid #236481;" name="type">
                    別のキーワードで検索する
                    <img class="height-1 img-icon" src="{{asset('img/research_icon.png')}}">
                </label>
            </a>
        </div>

        @endif


    </div>



