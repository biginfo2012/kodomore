<div class="card-body news-background">
    @foreach($reviewList as $index=>$review)

            <div class="blog-answer rounded position-relative">
                <div class="d-flex position-relative mb-1 pb-2" style="border-bottom: 1px solid #ABABAB">
                    <img src="{{asset('img/blue-user.png')}}" class="avatar mr-2">
                    <div>
                        <div class="d-flex mt-2">
                            @if(empty($review->post_name))
                                <p class="text-normal-title">{{$review->garden->garden_name}}<br>投稿ネーム{{$review->nick_name}}</p>
                            @else
                                <p class="text-normal-title">{{$review->garden->garden_name}}<br>投稿ネーム{{$review->post_name}}</p>
                            @endif
                            <p class="text-small blog-answer-user" style="position: absolute;right: 0;bottom: 0;">
                                {{$review->relation_text}}</p>
                        </div>
                    </div>
                </div>
                <div class="w-100 float-right mb-2 pb-1" style="border-bottom: 1px solid #ABABAB">
                    <div class="d-flex float-right" style="height: fit-content; ">
                        <p class="text-small float-right mt-2" style="color: #4D4D4D">総合評価 {{$review->total_rate}}点</p>
                        <div class="col-8 pl-1">
                            <div class="rateyo"
                                 data-rateyo-rating="{{$review->total_rate}}"
                                 data-rateyo-num-stars="5"
                                 data-rateyo-rated-fill="#31BCC7"
                                 data-rateyo-normal-fill="#CBF7F6"
                                 data-rateyo-score="4"></div>
                            {{--                    <span class='score'>0</span>--}}
                            {{--                    <span class='result'>0</span>--}}
                        </div>
                    </div>
                </div>

                <p class="text-small"><span style="color: #216887">●</span> ICT導入度 {{$review->eval1_rate}}点</p>
                <p class="text-small ml-3 line-clamp">{{$review->eval1_text}}</p>

                <div class="detail">
                    <p class="text-small mt-2"><span style="color: #216887">●</span> 授業の工夫度 {{$review->eval2_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval2_text}}</p>
                    <p class="text-small mt-2"><span style="color: #216887">●</span> 全体的な講師の質 {{$review->eval3_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval3_text}}</p>
                    <p class="text-small mt-2"><span style="color: #216887">●</span> 保護者との連携充実度 {{$review->eval4_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval4_text}}</p>
                    <p class="text-small mt-2"><span style="color: #216887">●</span> いじめ対策 {{$review->eval5_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval5_text}}</p>
                    <p class="text-small mt-2"><span style="color: #216887">●</span> 校風の良さ {{$review->eval6_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval6_text}}</p>
                    <p class="text-small mt-2"><span style="color: #216887">●</span> 生徒の進路満足度 {{$review->eval7_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval7_text}}</p>
                    <p class="text-small mt-2"><span style="color: #216887">●</span> 部活や課外レッスンの充実度 {{$review->eval8_rate}}点</p>
                    <p class="text-small ml-3">{{$review->eval8_text}}</p>


                    <p class="text-medium-title pt-2" style="border-top: 2px solid #ABABAB">{{$review->title}}</p>
                    <p class="text-small">{{$review->total_text}}</p>
                    @if(isset($review->image))
                        @foreach($review->image as $image)
                            <img class="height-3 img-icon" src="{{asset('/storage/img/garden/'. $image->img)}}">
                        @endforeach
                    @endif
                    <p class="text-small">投稿日：{{$review->up_date}}</p>


                    @if($review->garden_id == 1)
                        @if(isset($review->reflect))
                            @foreach($review->reflect as $index=>$reflect)
                                <div class="divide-line"></div>
                                <div class="d-flex">
                                    @if($index == 1)
                                        <img src="{{asset('img/user1.png')}}" class="avatar">
                                    @else
                                        <img src="{{asset('img/user2.png')}}" class="avatar">
                                    @endif

                                    <div>
                                        @if($index == 1)
                                            @if(empty($review->post_name))
                                                <p class="text-small-xs-bold">投稿ネーム{{$review->nick_name}}</p>
                                            @else
                                                <p class="text-small-xs-bold">投稿ネーム{{$review->post_name}}</p>
                                            @endif
                                        @else
                                            <p class="text-small-xs-bold">{{$review->garden->garden_name}}側からの返事</p>
                                        @endif

                                        <p class="text-small">{{$reflect->content}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                            <div class="post_user">
                                <p class="text-small-xs mt-2"><img class="height-1 img-icon mr-1" src="{{asset('img/circle-star.png')}}" style="height: 0.9rem !important;">{{$review->attention}}人が注目した！</p>
                                <p class="text-small-xs mt-2"><img class="height-1 img-icon mb-1" src="{{asset('img/light.png')}}" style="margin-left: 1px;margin-right: 5px !important;">{{$review->help}}人が役に立った</p>
                                @if(empty($review->reflect))
                                    <div class="text-center mt-2">
                                        <p><span class="text-small py-1 px-3 mr-1 modify" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/modify.png')}}">修正する</span><span class="text-small py-1 px-3 ml-1 delete" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除する</span></p>
                                    </div>
                                @elseif(count($review->reflect)==1)
                                    <div class="text-center mt-2" style="">
                                        <p><a class="text-small py-1 px-1 mr-1 modify text-3" style="border: 1px solid #333333; border-radius: 5rem" href="{{url('/replay/post-user/' . $review->id)}}"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/back-icon.png')}}">返事をする(1回のみ)</a></p>
                                    </div>
                                @endif

                            </div>

                    @else
                            <div class="post_user">
                                <p class="text-small-xs mt-2"><img class="height-1 img-icon mr-1" src="{{asset('img/circle-star.png')}}" style="height: 0.9rem !important;">{{$review->attention}}人が注目した！</p>
                                <p class="text-small-xs mt-2"><img class="height-1 img-icon mb-1" src="{{asset('img/light.png')}}" style="margin-left: 1px;margin-right: 5px !important;">{{$review->help}}人が役に立った</p>
                                <div class="text-center mt-2">
                                    <p><span class="text-small py-1 px-3 mr-1 modify" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/modify.png')}}">修正する</span><span class="text-small py-1 px-3 ml-1 delete" style="border: 1px solid #333333; border-radius: 5rem"><img class="height-1 img-icon pb-1 mr-1" src="{{asset('img/delete-black.png')}}">削除する</span></p>
                                </div>
                            </div>

                    @endif




                    <input type="hidden" name="review_id" value="{{$review->id}}">

                    <div class="divide-line d-none"></div>

                    <div class="d-none">
                        <img src="{{asset('img/empty_user.png')}}" class="avatar">
                        <div>
                            <div class="d-flex">
                                <p class="text-small">投稿ネーム</p>
                                <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>
                            </div>
                            <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>
                            <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡
                                文字の大きさ､量､字間､行間等を...</p>
                        </div>
                    </div>


                    <div class="divide-line d-none"></div>

                    <div class="d-none">
                        <img src="{{asset('img/empty_user.png')}}" class="avatar">
                        <div>
                            <div class="d-flex">
                                <p class="text-small">投稿ネーム</p>
                                <p class="text-small blog-answer-user">クラス：未満児 / 保護者</p>
                            </div>
                            <h6 class="text-medium-xs">子どもの生きる力を育てる幼稚園</h6>
                            <p class="text-small">この文章はダミーです｡文字の大きさ､量､字間､行間等を確認するために入れています｡この文章はダミーです｡
                                文字の大きさ､量､字間､行間等を...</p>
                        </div>
                    </div>

                </div>
            </div>


    @endforeach
</div>
