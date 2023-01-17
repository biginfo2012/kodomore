
    <input type="hidden" name="garden_count" value="{{count($gardenList)}}">
    <div class="text-medium justify-content-center p-1 sub-menu mb-3 rounded" name="select-description">
        @if(count($gardenList) == 0)
            @if(isset($review))
                <p class="pt-1 text-center">お探しの施設名はコドモアに登録されておりません<br>
                    お手数ですが下記より未登録園を登録してから<br>
クチコミレビューをしてください
                    </p>
                    <p class="txt-detail text-medium-light text-center text-decoration mt-2" id="edit_garden">保護者と生徒､スクールで公開情報を<span class="text-red" style="color: #D50000 !important;">編集</span>する<img class="height-1 img-icon mb-1" src="{{asset('img/pencil-icon.png')}}"></p>
            @else
                <p class="pt-1 text-center">お探しの施設名はコドモアに登録されておりません<br>
                    お探しの施設名を下記にてご記入ください</p>
            @endif

        @elseif(count($gardenList) == 1)
            <p class="pt-1 text-center">下記の施設名でよろしいですか？よろしければ</p>
            <p class="pb-1 text-center">施設名をクリックしてチェックを入れてください</p>
        @else
            <p class="pt-1 text-center">似た様な名称が複数見つかりました</p>
            <p class="pb-1 text-center">正しい施設名を選択してください</p>
        @endif
    </div>

    @foreach($gardenList as $index => $garden)
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input"  id="radio_school_index_{{$garden -> garden_id}}" value={{$garden -> garden_id}} name="radio_school_index">
            <label class="text-normal custom-control-label" for="radio_school_index_{{$garden -> garden_id}}" style="line-height: 1.1 !important;">
                <?=$garden->prefecture_name;?> <?=$garden->city_name;?>
                @foreach($garden -> typeList as $type)
                    ｜ {{$type->type_name}}
                @endforeach
            </label>
        </div>
        <p class="ml-4 text-large-xs mb-2" style="margin-top: -10px;"><?=$garden->garden_name;?></p>
    @endforeach



