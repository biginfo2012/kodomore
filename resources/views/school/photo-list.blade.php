@if(count($imgList) > 0 && $imgList[0]->img !== 'NOIMAGE.jpg')
    <div class="card-body photo-background mt-3">
        <div class="text-medium-title p-0">
            <span class="menu-icon">◆</span><?=$garden->garden_name;?> Photo Gallery
        </div>
        <div class="row mt-1 px-2">
            <div class="photo-start5">
                @foreach($imgList as $index => $img)
                    @if($index < 5)
                        <div class="mt-3 p-1 background-white">
                            <div class="position-relative">
                                <img class="height-1 img-icon position-absolute favourite_img" data-status="0" data-id="{{$img->id}}" style="right: 4px; top: 4px;" src="{{asset('img/unfavourite.png')}}">
                                <img src="{{asset('/storage/img/garden/'.$img -> img)}}" class="" >
                                @if($img->img_source == '公式サイトより')
                                    <div class="text-small-xs text-white d-flex"
                                         style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                            class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                        <p class="hit-the-floor ">{{$garden->garden_name.' 公式サイトより'}}</p></div>
                                @elseif(empty($img->img_source))
                                    <div class="text-small-xs text-white d-flex"
                                         style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                            class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                        <p class="hit-the-floor ">{{$garden->garden_name}}</p></div>
                                @else
                                    <div class="text-small-xs text-white d-flex"
                                         style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                            class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                        <p class="hit-the-floor ">{{$img->img_source}}</p></div>
                                @endif
                            </div>
                            <p class="text-small mt-1"><?=$img->caption;?></p>
                        </div>
                    @endif
                @endforeach
            </div>
            @if(count($imgList) > 5)
                <p id="photo_detail" class="text-small text-decoration" style="color: #216887">もっと見る</p>
            @endif

            <div class="rest_photo d-none">
                @if(count($imgList) > 5)
                    @foreach($imgList as $index => $img)
                        @if($index >= 5)
                            <div class="mt-3 p-1 background-white">
                                <div class="position-relative">
                                    <img class="height-1 img-icon position-absolute" style="right: 4px; top: 4px;" src="{{asset('img/unfavourite.png')}}">
                                    <img src="{{asset('/storage/img/garden/'.$img -> img)}}" class="" >
                                    @if($img->img_source == '公式サイトより')
                                        <div class="text-small-xs text-white d-flex"
                                             style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                                class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                            <p class="hit-the-floor ">{{$garden->garden_name.' 公式サイトより'}}</p></div>
                                    @elseif(empty($img->img_source))
                                        <div class="text-small-xs text-white d-flex"
                                             style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                                class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                            <p class="hit-the-floor ">{{$garden->garden_name}}</p></div>
                                    @else
                                        <div class="text-small-xs text-white d-flex"
                                             style="position: absolute; bottom: .25rem; right: .5rem;"><img
                                                class="img-icon height-1" src="{{asset('img/capture.png')}}">
                                            <p class="hit-the-floor ">{{$img->img_source}}</p></div>
                                    @endif
                                </div>
                                <p class="text-small mt-1"><?=$img->caption;?></p>
                            </div>
                        @endif
                    @endforeach
                @endif

                    @if($last > 1)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-circle pg-blue mb-1">
                                <p class="text-small text-decoration mt-1" style="color: #216887">とじる</p>
                                @for ($i = 1; $i <= $last; $i++)
                                    @if($i == $current)
                                        <li class="page-item active text-large-xs-medium" id="page_<?=$i;?>"><a class="page-link text-large-xs-medium mx-1 px-2 py-1"><?=$i;?></a></li>
                                    @else
                                        <li class="page-item text-large-xs-medium" id="page_<?=$i;?>"><a class="page-link text-large-xs-medium mx-1 px-2 py-1"><?=$i;?></a></li>
                                    @endif
                                @endfor
                            </ul>
                        </nav>
                    @else
                        <p class="text-small text-decoration" style="color: #216887">とじる</p>
                    @endif

            </div>



        </div>

    <input type="hidden" id="start" value=">">
    <input type="hidden" id="last" value="{{$last}}">
    <input type="hidden" id="total" value="{{$total}}">
    <input type="hidden" id="current" value="{{$current}}">



    </div>


@endif

