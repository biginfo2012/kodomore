<?php


namespace App\Model;
use DB;
use Hash;
use Illuminate\Support\Facades\Log;

class SchoolModel
{

    public function saveVisitGarden($user_id, $garden_id){
        $now = $now = Date('Y-m-d h:i:s');
        $id = DB::table('t_visit_garden')->insertGetId([
            'user_id'           => $user_id,
            'garden_id'               => $garden_id,
            'created_at' => $now,
        ]);
        return $id;
    }

    public function getVisitHistory($user_id, $order){
        $sql_str = "SELECT t_garden.*, t_prefecture.prefecture_name, t_visit_garden.created_at, t_city_area.city_name FROM t_garden
            LEFT JOIN t_prefecture ON t_garden.prefecture_id = t_prefecture.prefecture_id
            LEFT JOIN t_city_area ON t_garden.city_id = t_city_area.city_id
            LEFT JOIN t_visit_garden ON t_visit_garden.garden_id = t_garden.garden_id
            LEFT JOIN t_garden_tag ON t_garden_tag.garden_id = t_garden.garden_id
            WHERE t_visit_garden.user_id = $user_id
        ";

        $now = (string)date('Y-m-d');
        $now = "'" .$now ."'";
        if($order == 'today'){
            $sql_str = $sql_str." AND t_visit_garden.created_at like like '%".$now."%' ";
        }

        $sql_str = $sql_str." GROUP BY t_garden.garden_id";
        if($order == 'new'){
            $sql_str = $sql_str." ORDER BY t_visit_garden.created_at DESC";
        }
        if($order == 'old'){
            $sql_str = $sql_str." ORDER BY t_visit_garden.created_at ASC";
        }

        return DB::select(
            $sql_str
        );
    }

    public function getTypeCountDetail($cityListStr, $typeListStr, $search) {
        $sql_str = "SELECT t_type.*, count_type.cnt FROM t_type LEFT JOIN (
            SELECT count(t_garden_type.id) as cnt, t_garden_type.type_id
            FROM t_garden_type
            LEFT JOIN t_garden ON t_garden_type.garden_id = t_garden.garden_id
        ";
        $addWhere = false;
        if(!empty($typeListStr)) {
            $addWhere = true;
            $sql_str = $sql_str."WHERE t_garden_type.type_id in (".$typeListStr.") ";
        }
        if(!empty($cityListStr)) {
            if($addWhere == false) {
                $addWhere = true;
                $sql_str = $sql_str." WHERE ";
            } else {
                $sql_str = $sql_str." AND ";
            }
            $sql_str = $sql_str." t_garden.city_id in (".$cityListStr.") ";
        }
        if(!empty($search)) {
            if($addWhere == false) {
                $addWhere = true;
                $sql_str = $sql_str." WHERE ";
            } else {
                $sql_str = $sql_str." AND ";
            }
            $sql_str = $sql_str." t_garden.garden_name like '%".$search."%' ";
        }
        $sql_str = $sql_str." GROUP BY t_garden_type.type_id) as count_type ON t_type.type_id = count_type.type_id";

        return DB::select(
            $sql_str
        );
    }

    public function getTypeCountDetailByPrefecture($prefecture_id, $search, $cityListStr) {
        $sql_str = "SELECT t_type.*, IFNULL(count_type.cnt1, 0) as cnt FROM t_type LEFT JOIN (
            SELECT count(t_garden_type.id) as cnt1, t_garden_type.type_id
            FROM t_garden_type
            LEFT JOIN t_garden ON t_garden_type.garden_id = t_garden.garden_id
        ";

        $sql_str = $sql_str." WHERE t_garden.prefecture_id = $prefecture_id AND t_garden.garden_name like '%".$search."%' ";
        if(!empty($cityListStr)) {
            $sql_str = $sql_str." AND t_garden.city_id in (".$cityListStr.") ";
        }

        $sql_str = $sql_str." GROUP BY t_garden_type.type_id) as count_type ON t_type.type_id = count_type.type_id";

        return DB::select(
            $sql_str
        );
    }

    public function getTypeListByGardenId($gardenId) {
        $sql_str = "SELECT t_type.*, garden_type.garden_id FROM t_type LEFT JOIN (
            SELECT t_garden_type.garden_id, t_garden_type.type_id
            FROM t_garden_type
            WHERE garden_id = $gardenId) as garden_type ON t_type.type_id = garden_type.type_id
            GROUP BY t_type.type_id
        ";
        return DB::select(
            $sql_str
        );
    }

    public function getImageCount($gardenId) {
        return DB::table('t_garden_img')->where('garden_id', '=', $gardenId)->get()->count();
    }

    public function getGardenFaqByType($garden_id, $type){
        return DB::table('t_faq')->where('garden_id', $garden_id)->where('type', $type)->get();
    }

    public function updateGardenFaqById($id, $answer){
        DB::table('t_faq')->where('id', $id)->update(['answer' => $answer]);
    }

    public function createGardenFaq($garden_id, $question, $answer, $type){
        DB::table('t_faq')->insertGetId([
            'garden_id' => $garden_id,
            'question' => $question,
            'answer' => $answer,
            'type' => $type
        ]);
    }

    public function getGardenInfoById($gardenId) {
        return DB::select(
            "SELECT t_garden.*, t_prefecture.prefecture_name, t_city_area.city_name, t_garden_age.*, t_kind.kind_name FROM t_garden
            LEFT JOIN t_prefecture ON t_garden.prefecture_id = t_prefecture.prefecture_id
            LEFT JOIN t_city_area ON t_garden.city_id = t_city_area.city_id
            LEFT JOIN t_garden_age ON t_garden.garden_age_id = t_garden_age.id
            LEFT JOIN t_kind ON t_garden.kind_id = t_kind.kind_id
            WHERE t_garden.garden_id = $gardenId
            "
        );
    }
    public function getGardenFavourite($user_id) {
        return DB::select(
            "SELECT t_garden_favourite.garden_id
                FROM t_garden_favourite
                WHERE t_garden_favourite.user_id = $user_id
                ORDER BY t_garden_favourite.garden_id
            "
        );
    }

    public function getFavouriteGardenList($user_id, $order) {
        $sql_str = "SELECT t_garden.*, t_prefecture.prefecture_name, t_garden_favourite.favourite_date, t_city_area.city_name FROM t_garden
            LEFT JOIN t_prefecture ON t_garden.prefecture_id = t_prefecture.prefecture_id
            LEFT JOIN t_city_area ON t_garden.city_id = t_city_area.city_id
            LEFT JOIN t_garden_favourite ON t_garden_favourite.garden_id = t_garden.garden_id
            LEFT JOIN t_garden_tag ON t_garden_tag.garden_id = t_garden.garden_id
            WHERE t_garden_favourite.user_id = $user_id
        ";

        $now = (string)date('Y-m-d');
        $now = "'" .$now ."'";
        if($order == 'today'){
            $sql_str = $sql_str." AND t_garden_favourite.favourite_date = $now " ;
        }

        $sql_str = $sql_str." GROUP BY t_garden.garden_id";
        if($order == 'new'){
            $sql_str = $sql_str." ORDER BY t_garden_favourite.favourite_date DESC";
        }
        if($order == 'old'){
            $sql_str = $sql_str." ORDER BY t_garden_favourite.favourite_date ASC";
        }

        return DB::select(
            $sql_str
        );
//        return DB::table('t_garden_favourite')->leftjoin('t_garden', 't_garden_favourite.garden_id', '=', 't_garden.garden_id')->leftjoin('t_prefecture', 't_prefecture.prefecture_id', '=', 't_garden.prefecture_id')
//            ->leftjoin('t_city_area', 't_garden.city_id', '=', 't_city_area.city_id')->leftjoin('t_garden_tag', 't_garden_tag.garden_id', '=', 't_garden.garden_id')
//            ->select('t_garden_favourite.garden_id, t_city_area.*, t_garden_tag.*, t_prefecture.*')->where('user_id', $user_id)->orderBy('t_garden_favourite.created_at', 'asc')->get()->toArray();

    }

//    public function getChildGardenList($childId) {
//        $sql_str = "SELECT t_garden.*, t_prefecture.prefecture_name, t_city_area.city_name, t_student.type, t_student.garden_detail FROM t_garden
//            LEFT JOIN t_prefecture ON t_garden.prefecture_id = t_prefecture.prefecture_id
//            LEFT JOIN t_city_area ON t_garden.city_id = t_city_area.city_id
//            LEFT JOIN t_student ON t_student.garden_id = t_garden.garden_id
//            LEFT JOIN t_garden_tag ON t_garden_tag.garden_id = t_garden.garden_id
//            WHERE t_student.user_id = $childId
//        ";
//
//        $sql_str = $sql_str." GROUP BY t_garden.garden_id";
//        $sql_str = $sql_str." ORDER BY t_student.type ASC";
//        return DB::select(
//            $sql_str
//        );
//    }

    public function getChildGardenList($childId) {
        $sql_str = "SELECT t_garden.*, t_prefecture.prefecture_name, t_city_area.city_name, t_child_garden.type, t_child_garden.garden_detail FROM t_garden
            LEFT JOIN t_prefecture ON t_garden.prefecture_id = t_prefecture.prefecture_id
            LEFT JOIN t_city_area ON t_garden.city_id = t_city_area.city_id
            LEFT JOIN t_child_garden ON t_child_garden.garden_id = t_garden.garden_id
            LEFT JOIN t_garden_tag ON t_garden_tag.garden_id = t_garden.garden_id
            WHERE t_child_garden.child_id = $childId
        ";

        $sql_str = $sql_str." GROUP BY t_garden.garden_id";
        $sql_str = $sql_str." ORDER BY t_child_garden.type ASC";
        return DB::select(
            $sql_str
        );
    }

    public function getGardenList($cityListStr, $typeListStr, $tagListStr, $search, $kind, $prefecture_id) {
        $sql_str = "SELECT t_garden.*, t_prefecture.prefecture_name, t_city_area.city_name FROM t_garden
            LEFT JOIN t_prefecture ON t_garden.prefecture_id = t_prefecture.prefecture_id
            LEFT JOIN t_city_area ON t_garden.city_id = t_city_area.city_id
            LEFT JOIN t_garden_type ON t_garden_type.garden_id = t_garden.garden_id
            LEFT JOIN t_garden_tag ON t_garden_tag.garden_id = t_garden.garden_id
            WHERE t_garden.garden_name like '%$search%'
        ";
        if(!empty($prefecture_id) && $prefecture_id !== 0){
            $sql_str = $sql_str." AND t_garden.prefecture_id = $prefecture_id ";
        }
        if(!empty($typeListStr)) {
            $sql_str = $sql_str." AND t_garden_type.type_id in (".$typeListStr.") ";
        }
        if(!empty($cityListStr) && $cityListStr !== '1') {
            $sql_str = $sql_str." AND t_garden.city_id in (".$cityListStr.") ";
        }
        if(!empty($tagListStr)) {
            $sql_str = $sql_str." AND t_garden_tag.tag_id in (".$tagListStr.") ";
        }
//        if(!empty($search)) {
//            $sql_str = $sql_str." AND t_garden.garden_name like '%".$search."%' ";
//        }
        if(!empty($kind)) {
            $sql_str = $sql_str." AND t_garden.kind_id = $kind ";
        }

        $sql_str = $sql_str." GROUP BY t_garden.garden_id";
        return DB::select(
            $sql_str
        );
    }

    public function getGardenListByName($search) {
        $sql_str = "SELECT t_garden.*, t_prefecture.prefecture_name, t_city_area.city_name FROM t_garden
            LEFT JOIN t_prefecture ON t_garden.prefecture_id = t_prefecture.prefecture_id
            LEFT JOIN t_city_area ON t_garden.city_id = t_city_area.city_id
            LEFT JOIN t_garden_type ON t_garden_type.garden_id = t_garden.garden_id
            LEFT JOIN t_garden_tag ON t_garden_tag.garden_id = t_garden.garden_id
            WHERE t_garden.garden_name like '%$search%'
        ";

        $sql_str = $sql_str." GROUP BY t_garden.garden_id";
        return DB::select(
            $sql_str
        );
    }

    public function getGardenListByAddress($city_id, $town, $address, $mobile) {
        $sql_str = "SELECT t_garden.*, t_prefecture.prefecture_name, t_city_area.city_name FROM t_garden
            LEFT JOIN t_prefecture ON t_garden.prefecture_id = t_prefecture.prefecture_id
            LEFT JOIN t_city_area ON t_garden.city_id = t_city_area.city_id
            LEFT JOIN t_garden_type ON t_garden_type.garden_id = t_garden.garden_id
            LEFT JOIN t_garden_tag ON t_garden_tag.garden_id = t_garden.garden_id
            WHERE (t_city_area.city_name = '$city_id' AND t_garden.town_name = '$town' AND t_garden.address = '$address') OR (t_garden.mobile = '$mobile')
        ";

        $sql_str = $sql_str." GROUP BY t_garden.garden_id";
        return DB::select(
            $sql_str
        );
    }

    public function getTagList($gardenIdList) {
        return DB::select(
            "SELECT t_tag.*
            FROM t_tag
            LEFT JOIN t_garden_tag ON t_tag.id = t_garden_tag.tag_id
            WHERE t_garden_tag.garden_id in ($gardenIdList)  GROUP BY t_tag.id"
        );
    }
    public function getDirList($gardenIdList) {
        return DB::select(
            "SELECT t_garden_direction.*
            FROM t_garden_direction
            WHERE t_garden_direction.garden_id in ($gardenIdList)  ORDER BY t_garden_direction.id"
        );
    }

    public function getFaqList($gardenId) {
        return DB::select(
            "SELECT t_faq.*
            FROM t_faq
            WHERE t_faq.garden_id = $gardenId ORDER BY t_faq.id"
        );
    }
    public function getMetaInfoByGardenId($gardenId) {
        return DB::select(
            "SELECT t_meta.*
            FROM t_meta
            WHERE t_meta.garden_id = $gardenId ORDER BY t_meta.id"
        );
    }
    public function getPriceList($gardenId) {
        return DB::select(
            "SELECT t_price.*
            FROM t_price
            WHERE t_price.garden_id = $gardenId ORDER BY t_price.id"
        );
    }

    public function getWholeKeywordList($gardenId) {
        return DB::select(
            "SELECT t_keyword.*, t_select.id as select_id
            FROM t_keyword
            LEFT JOIN (SELECT * FROM t_garden_keyword WHERE t_garden_keyword.garden_id = $gardenId) as t_select ON t_keyword.keyword_id = t_select.keyword_id
             ORDER BY t_keyword.keyword_id"
        );
    }

    public function getKeywordList($gardenId) {
        return DB::select(
            "SELECT t_keyword.*
            FROM t_keyword
            LEFT JOIN t_garden_keyword ON t_keyword.keyword_id = t_garden_keyword.keyword_id
            WHERE t_garden_keyword.garden_id = $gardenId ORDER BY t_keyword.keyword_id"
        );
    }

    public function getAllType() {
        return DB::select(
            "SELECT *
            FROM t_type "
        );
    }

    public function getAllKind() {
        return DB::select(
            "SELECT *
            FROM t_kind "
        );
    }




    public function getTypeList($gardenId) {
        return DB::select(
            "SELECT t_type.*
            FROM t_type
            LEFT JOIN t_garden_type ON t_garden_type.type_id = t_type.type_id
            WHERE t_garden_type.garden_id = $gardenId"
        );
    }

    public function getTagContentList($gardenId, $type_id) {
        return DB::select(
            "SELECT content
            FROM t_garden_tag_content
            WHERE garden_id = $gardenId AND tag_type_id = $type_id"
        );
    }

    public function getNotificationList($gardenId) {
        return DB::select(
            "SELECT content, type
            FROM t_garden_notification
            WHERE garden_id = $gardenId "
        );
    }

    public function getExperienceListByGardenId($gardenId) {
        return DB::select(
            "SELECT t_experience.*
            FROM t_experience
            LEFT JOIN t_garden_experience ON t_experience.id = t_garden_experience.experience_id
            WHERE t_garden_experience.garden_id = $gardenId"
        );
    }


    public function getGardenImageList($gardenId) {
        return DB::select(
            "SELECT t_garden_img.*
            FROM t_garden_img
            WHERE t_garden_img.garden_id = $gardenId"
        );
    }

    public function getGardenTopImageList($gardenId) {
        return DB::select(
            "SELECT t_garden_img.*
            FROM t_garden_img
            WHERE t_garden_img.garden_id = $gardenId AND t_garden_img.top = '1'"
        );
    }

    public function getGardenImageByType($gardenId, $image_type) {
        return DB::select(
            "SELECT t_garden_img.*
            FROM t_garden_img
            WHERE t_garden_img.garden_id = $gardenId AND t_garden_img.type = $image_type"
        );
    }
    public function getMainUniformImageByGardenId($gardenId) {
        return DB::select(
            "SELECT *
            FROM t_garden_main_uniform
            LEFT JOIN t_garden_img ON t_garden_img.id = t_garden_main_uniform.image_id
            WHERE t_garden_main_uniform.garden_id = $gardenId
            ORDER BY t_garden_main_uniform.order_item"
        );
    }
    public function getReviewByGardenId($gardenId) {
        return DB::select(
            "SELECT t_review.*
            FROM t_review
            WHERE t_review.garden_id = $gardenId
            ORDER BY t_review.id"
        );
    }
    public function getReviewByUserId($userId) {
        return DB::select(
            "SELECT t_review.*
            FROM t_review
            WHERE t_review.user_id = $userId
            ORDER BY t_review.id"
        );
    }
    public function getReviewByReviewId($reviewId) {
        return DB::select(
            "SELECT t_review.*
            FROM t_review
            WHERE t_review.id = $reviewId
            "
        );
    }
    public function getCommentByCommentId($reviewId)
    {
        return DB::select(
            "SELECT t_articles_comments.*
            FROM t_articles_comments
            WHERE t_articles_comments.id = $reviewId
            "
        );
    }
    public function getNewsCommentByCommentId($reviewId)
    {
        return DB::select(
            "SELECT t_news_comments.*
            FROM t_news_comments
            WHERE t_news_comments.id = $reviewId
            "
        );
    }
    public function getGardenPhotoByType($gardenId) {
        return  DB::table('t_garden_img')->where('garden_id', '=', $gardenId)->where('type', 10)->orwhere('type', 11)->orwhere('type', 12)->orwhere('type', 13)->get();
    }
    public function getUserPhotoFavourite($userId) {
        return  DB::table('t_favourite')->where('user_id', '=', $userId)->get()->toArray();
    }
    public function getGoodsList($gardenId) {
        return DB::select(
            "SELECT *
            FROM t_goods
            WHERE garden_id = $gardenId"
        );
    }

    public function updateGardenTag($gardenId, $tagList) {
        DB::table('t_garden_tag')->where('garden_id', '=', $gardenId)->delete();
        foreach($tagList as $tag) {
            DB::table('t_garden_tag')->insertGetId([
                'garden_id'       => $gardenId,
                'tag_id'       => $tag
            ]);
        }
    }

    public function updateGardenKeyword($gardenId, $keywordList) {
        DB::table('t_garden_keyword')->where('garden_id', '=', $gardenId)->delete();
        foreach($keywordList as $keyword) {
            DB::table('t_garden_keyword')->insertGetId([
                'garden_id'       => $gardenId,
                'keyword_id'       => $keyword
            ]);
        }
    }

    public function updateGardenTagContent($gardenId, $contentList) {
        DB::table('t_garden_tag_content')->where('garden_id', '=', $gardenId)->delete();
        foreach($contentList as $contentInfo) {
            $typeId = $contentInfo -> type_id;
            $contents = $contentInfo -> content;
            foreach($contents as $content) {
                DB::table('t_garden_tag_content')->insertGetId([
                    'garden_id'       => $gardenId,
                    'tag_type_id'       => $typeId,
                    'content'       => $content
                ]);
            }

        }
    }

    public function updateGardenNotification($gardenId, $contentList) {
        DB::table('t_garden_notification')->where('garden_id', '=', $gardenId)->delete();
        Log::info(count($contentList));
        foreach($contentList as $contentInfo) {
            DB::table('t_garden_notification')->insertGetId([
                'garden_id'       => $gardenId,
                'type'       => $contentInfo -> type,
                'content'       => $contentInfo -> content
            ]);

        }
    }
    public function updateGardenDirection($gardenId, $contentList) {
        DB::table('t_garden_direction')->where('garden_id', '=', $gardenId)->delete();
        Log::info(count($contentList));
        foreach($contentList as $contentInfo) {
            DB::table('t_garden_direction')->insertGetId([
                'garden_id'       => $gardenId,
                'start_target'       => $contentInfo -> start_target,
                'direction'       => $contentInfo -> direction,
                'during_time'       => $contentInfo -> during_time
            ]);

        }
    }

    public function updateGardenMainUniformImage($gardenId, $contentList) {
        DB::table('t_garden_main_uniform')->where('garden_id', '=', $gardenId)->delete();
        Log::info(count($contentList));
        foreach($contentList as $contentInfo) {
            DB::table('t_garden_main_uniform')->insertGetId([
                'garden_id'       => $gardenId,
                'image_type'       => $contentInfo -> type,
                'order_item'       => $contentInfo -> order,
                'image_id' => $contentInfo -> id,
            ]);

            DB::table('t_garden_img')->where('id', $contentInfo -> id)->update([
                'img_source' => $contentInfo->source,
            ]);

        }
    }
    public function updateGardenMeta($gardenId, $tag_1, $tag_2, $tag_3, $tag_4, $tag_5, $tag_6, $tag_7, $meta_title, $meta_description, $memo) {
        DB::table('t_meta')->where('garden_id', '=', $gardenId)->delete();
        DB::table('t_meta')->insertGetId([
            'garden_id'       => $gardenId,
            'tag_1'       => $tag_1,
            'tag_2'       => $tag_2,
            'tag_3'       => $tag_3,
            'tag_4'       => $tag_4,
            'tag_5'       => $tag_5,
            'tag_6'       => $tag_6,
            'tag_7'       => $tag_7,
            'meta_title'       => $meta_title,
            'meta_description'       => $meta_description,
            'memo'       => $memo,
        ]);
    }
    public function updateGardenPrice($gardenId, $contentList) {
        DB::table('t_price')->where('garden_id', '=', $gardenId)->delete();
        Log::info(count($contentList));
        foreach($contentList as $contentInfo) {
            if(!empty($contentInfo->item_title)){
                DB::table('t_price')->insertGetId([
                    'garden_id'       => $gardenId,
                    'type'       => $contentInfo -> type,
                    'item_title'       => $contentInfo -> item_title,
                    'sale' => $contentInfo -> sale,
                    'sale_contain' => $contentInfo -> sale_contain,
                    'add_info' => $contentInfo -> add_info,
                    'public_status' => $contentInfo -> public_status,
                ]);
            }
            else{
                DB::table('t_price')->insertGetId([
                    'garden_id'       => $gardenId,
                    'type'       => $contentInfo -> type,
                    'item_title'       => '',
                    'sale' => '',
                    'sale_contain' => '',
                    'add_info' => '',
                    'public_status' => '',
                ]);
            }

        }
    }

    public function updateGardenPublicImage($gardenId, $contentList) {
        DB::table('t_garden_img')->where('garden_id', $gardenId)->update([
            'public_type'       => 0,
        ]);
        foreach($contentList as $contentInfo) {
            DB::table('t_garden_img')->where('id', $contentInfo->id)->update([
                'public_type'       => $contentInfo->value,
            ]);
        }
    }

    public function updateGardenTopImage($gardenId, $contentList) {
        DB::table('t_garden_img')->where('garden_id', $gardenId)->update([
            'top'       => 0,
        ]);
        for($i = 0; $i < count($contentList); $i++){
            DB::table('t_garden_img')->where('id', $contentList[$i])->update([
                'top'       => 1,
            ]);
        }
    }

    public function updateGardenLayoutImage($imgId, $src) {
            DB::table('t_garden_img')->where('id', $imgId)->update([
                'img'       => $src,
            ]);
    }

    public function updateReviewAttention($reviewId, $value) {
        DB::table('t_review')->where('id', $reviewId)->update([
            'attention'       => $value,
        ]);
    }
    public function updateCommentAttention($reviewId, $value) {
        DB::table('t_articles_comments')->where('id', $reviewId)->update([
            'attention'       => $value,
        ]);
    }
    public function updateNewsCommentAttention($reviewId, $value) {
        DB::table('t_news_comments')->where('id', $reviewId)->update([
            'attention'       => $value,
        ]);
    }
    public function updateReviewHelp($reviewId, $value) {
        DB::table('t_review')->where('id', $reviewId)->update([
            'help'       => $value,
        ]);
    }
    public function updateCommentHelp($reviewId, $value) {
        DB::table('t_articles_comments')->where('id', $reviewId)->update([
            'help'       => $value,
        ]);
    }
    public function updateNewsCommentHelp($reviewId, $value) {
        DB::table('t_news_comments')->where('id', $reviewId)->update([
            'help'       => $value,
        ]);
    }
    public function deleteReview($reviewId) {
        DB::table('t_review')->where('id', $reviewId)->delete();
    }

    public function updateGardenDetail($gardenId, $commentTitle, $commentDescription, $reception_status, $reception_date, $map_setting, $map_iframe) {
        DB::table('t_garden')->where('garden_id', '=', $gardenId)
            ->update([
                'comment_title'   => $commentTitle,
                'comment_description' => $commentDescription,
                'status' => $reception_status,
                'reception_date' => $reception_date,
                'map_setting' => $map_setting,
                'map_iframe' => $map_iframe,
            ]);
    }

    public function updateGardenUserDetail($gardenId, $public_name, $public_name_second, $garden_name, $garden_name_second, $kind_id, $post_code, $prefecture,
                                           $city, $town, $address, $mobile, $url, $founding, $photo_attachment) {
        DB::table('t_garden')->where('garden_id', '=', $gardenId)
            ->update([
                'garden_name'   => $garden_name,
                'garden_name_second' => $garden_name_second,
                'garden_public_name' => $public_name,
                'garden_public_name_second' => $public_name_second,
                'prefecture_id' => $prefecture,
                'city_id' => $city,
                'town_name' => $town,
                'address' => $address,
                'post_code' => $post_code,
                'kind_id' => $kind_id,
                'mobile' => $mobile,
                'url' => $url,
                'founding' => $founding,
                'photo_attachment' => $photo_attachment,
            ]);
    }

    public function insertGardenUserDetail($public_name, $public_name_second, $garden_name, $garden_name_second, $kind_id, $post_code, $prefecture,
                                           $city, $town, $address, $mobile, $url, $founding, $photo_attachment) {
        return DB::table('t_garden')->insertGetId([
                'garden_name'   => $garden_name,
                'garden_name_second' => $garden_name_second,
                'garden_public_name' => $public_name,
                'garden_public_name_second' => $public_name_second,
                'prefecture_id' => $prefecture,
                'city_id' => $city,
                'town_name' => $town,
                'address' => $address,
                'post_code' => $post_code,
                'kind_id' => $kind_id,
                'mobile' => $mobile,
                'url' => $url,
                'founding' => $founding,
                'photo_attachment' => $photo_attachment,
            ]);
    }
    public function insertGardenReviewDetail($garden_id, $user_id, $post_name, $nick_name, $profile_img_setting, $relation_type, $relation_value,
                                           $rate, $total_rate, $total_text, $title, $up_date, $img) {
        return DB::table('t_review')->insertGetId([
            'garden_id'   => $garden_id,
            'user_id' => $user_id,
            'post_name' => $post_name,
            'nick_name' => $nick_name,
            'profile_img_setting' => $profile_img_setting,
            'relation_type' => $relation_type,
            'relation_value' => $relation_value,
            'total_rate' => $total_rate,
            'total_text' => $total_text,
            'title' => $title,
            'up_date' => $up_date,
            'eval1_rate' => $rate[0]->rate,
            'eval1_text' => $rate[0]->rate_text,
            'eval2_rate' => $rate[1]->rate,
            'eval2_text' => $rate[1]->rate_text,
            'eval3_rate' => $rate[2]->rate,
            'eval3_text' => $rate[2]->rate_text,
            'eval4_rate' => $rate[3]->rate,
            'eval4_text' => $rate[3]->rate_text,
            'eval5_rate' => $rate[4]->rate,
            'eval5_text' => $rate[4]->rate_text,
            'eval6_rate' => $rate[5]->rate,
            'eval6_text' => $rate[5]->rate_text,
            'eval7_rate' => $rate[6]->rate,
            'eval7_text' => $rate[6]->rate_text,
            'eval8_rate' => $rate[7]->rate,
            'eval8_text' => $rate[7]->rate_text,

        ]);
    }

    public function updateGardenReviewDetail($review_id, $garden_id, $user_id, $post_name, $nick_name, $profile_img_setting, $relation_type, $relation_value,
                                             $rate, $total_rate, $total_text, $title, $up_date, $img) {
        return DB::table('t_review')->where('id', $review_id)->update([
            'garden_id'   => $garden_id,
            'user_id' => $user_id,
            'post_name' => $post_name,
            'nick_name' => $nick_name,
            'profile_img_setting' => $profile_img_setting,
            'relation_type' => $relation_type,
            'relation_value' => $relation_value,
            'total_rate' => $total_rate,
            'total_text' => $total_text,
            'title' => $title,
            'up_date' => $up_date,
            'eval1_rate' => $rate[0]->rate,
            'eval1_text' => $rate[0]->rate_text,
            'eval2_rate' => $rate[1]->rate,
            'eval2_text' => $rate[1]->rate_text,
            'eval3_rate' => $rate[2]->rate,
            'eval3_text' => $rate[2]->rate_text,
            'eval4_rate' => $rate[3]->rate,
            'eval4_text' => $rate[3]->rate_text,
            'eval5_rate' => $rate[4]->rate,
            'eval5_text' => $rate[4]->rate_text,
            'eval6_rate' => $rate[5]->rate,
            'eval6_text' => $rate[5]->rate_text,
            'eval7_rate' => $rate[6]->rate,
            'eval7_text' => $rate[6]->rate_text,
            'eval8_rate' => $rate[7]->rate,
            'eval8_text' => $rate[7]->rate_text,

        ]);
    }



    public function insertRepublicUserDetail($id, $first_name, $second_name, $first_name_huri, $second_name_huri, $mobile, $contact_first_name,
                                             $contact_second_name, $contact_first_name_huri, $contact_second_name_huri, $contact_type, $contact_mobile, $email) {
        return DB::table('t_user_republic')->insertGetId([
            'garden_id'   => $id,
            'email' => $email,
            'first_name' => $first_name,
            'second_name' => $second_name,
            'first_name_huri' => $first_name_huri,
            'second_name_huri' => $second_name_huri,
            'contact_first_name' => $contact_first_name,
            'contact_second_name' => $contact_second_name,
            'contact_first_name_huri' => $contact_first_name_huri,
            'contact_second_name_huri' => $contact_second_name_huri,
            'contact_type' => $contact_type,
            'mobile' => $mobile,
            'contact_mobile' => $contact_mobile
        ]);
    }

    public function updateGardenMapDetail($gardenId, $mapUrl) {
        DB::table('t_garden')->where('garden_id', '=', $gardenId)
            ->update([
                'bus_route_img'   => $mapUrl
            ]);
    }

    public function updateGardenLogo($gardenId, $mapUrl, $type) {
        DB::table('t_garden')->where('garden_id', '=', $gardenId)
            ->update([
                'photo'   => $mapUrl,
                'photo_type'   => $type,
            ]);
    }

//    public function addGardenImg($gardenId, $imgUrl, $imgCaption, $type) {
//            DB::table('t_garden_img')->insertGetId([
//                'garden_id'       => $gardenId,
//                'img'       => $imgUrl,
//                'type' => $type,
//                'caption' => $imgCaption,
//            ]);
//    }

    public function addGardenImg($gardenId, $imgUrl, $imgCaption, $type) {
            DB::table('t_garden_img')->insertGetId([
                'garden_id'       => $gardenId,
                'img'       => $imgUrl,
                'type' => $type,
                'caption' => $imgCaption,
            ]);
    }

    public function addGardenImgDetail($gardenId, $imgUrl, $imgCaption, $imgSource, $type) {

        return DB::table('t_garden_img')->insertGetId([
            'garden_id'       => $gardenId,
            'img'       => $imgUrl,
            'type' => $type,
            'img_source' => $imgSource,
            'caption' => $imgCaption,
        ]);

    }
    public function deleteGardenReviewImgDetail($gardenId) {

        return DB::table('t_garden_img')->where('garden_id', $gardenId)->where('type', 14)->delete();

    }
    public function addReviewImage($imgId, $reviewId, $status) {
        return DB::table('t_review_image')->insertGetId([
            'img_id'       => $imgId,
            'review_id'       => $reviewId,
            'reflect_status' => $status,
        ]);

    }
    public function addReviewReflect($review_id, $post_userid, $post_order, $content, $profile) {
        return DB::table('t_review_reflect')->insertGetId([
            'review_id'       => $review_id,
            'post_user_id'       => $post_userid,
            'post_order' => $post_order,
            'content' => $content,
            'profile' => $profile
        ]);
    }
    public function updateReviewReflectProfile($review_id, $profile) {
        return DB::table('t_review_reflect')->where('review_id', $review_id)->where('post_order', '1')->update([
            'profile' => $profile
        ]);
    }

    public function deleteReviewImage($reviewId) {
        return DB::table('t_review_image')->where('review_id', $reviewId)->delete();

    }

    public function getReviewImage($reviewId) {
        return DB::select(
            "SELECT t_review_image.*, t_garden_img.caption, t_garden_img.img
            FROM t_review_image
            LEFT JOIN t_garden_img ON t_garden_img.id = t_review_image.img_id
            WHERE t_review_image.review_id = $reviewId
            "
        );
    }
    public function getReviewReflect($reviewId) {
        return DB::select(
            "SELECT t_review_reflect.*
            FROM t_review_reflect
            WHERE t_review_reflect.review_id = $reviewId
            ORDER BY t_review_reflect.post_order
            "
        );
    }

//    public function updateGardenImg($id, $imgCaption) {
//        DB::table('t_garden_img')->where('id', '=', $id)
//            ->update([
//                'caption'   => $imgCaption
//            ]);
//    }

    public function deleteGardenImg($gardenId, $idList) {
        DB::delete("DELETE FROM t_garden_img WHERE garden_id = $gardenId AND id NOT IN ($idList)");
    }

    public function deleteGardenImgById($gardenId, $type) {
        DB::delete("DELETE FROM t_garden_img WHERE garden_id = $gardenId AND type = $type");
    }

    public function deleteMediaImgByType($mediaId, $type) {
        DB::delete("DELETE t_garden_img FROM t_garden_img LEFT JOIN t_garden_media_img ON t_garden_img.id = t_garden_media_img.img_id WHERE t_garden_media_img.media_id = $mediaId AND t_garden_img.type = $type");
    }

    public function getSchoolCount($prefecture_id) {
        if(empty($prefecture_id)) {
            return DB::select(
                "SELECT count(garden_id) as count
                    FROM t_garden "
            )[0] -> count;
        }
        return DB::select(
            "SELECT count(garden_id)
                    FROM t_garden as count
                    WHERE prefecture_id = $prefecture_id"
        )[0] -> count;
    }

    //特徴情報取得
    public function getSchoolFeature($gardenId) {
        return DB::select(
            "SELECT *
             FROM t_feature
             WHERE garden_id = $gardenId
             ORDER BY feature_id ASC
             LIMIT 5"
        );
    }

    //預かり時間取得
    public function getSchoolGardenTime($gardenId) {
        return DB::select(
            "SELECT *
            FROM t_garden_time
            JOIN t_garden_time_detail
            ON t_garden_time.garden_time_id = t_garden_time_detail.garden_time_id
            JOIN t_garden_time_remark
            ON t_garden_time.garden_id = t_garden_time_remark.garden_id
            WHERE t_garden_time.garden_id = $gardenId"
        );
    }

    //休園日取得
    public function getSchoolCloseDay($gardenId) {
        return DB::select(
            "SELECT *
            FROM t_close_day
            LEFT OUTER JOIN t_close_day_detail
            ON t_close_day.close_day_id = t_close_day_detail.close_day_id
            WHERE t_close_day.garden_id = $gardenId"
        );
    }

    //休演日情報備考・表示フラグ取得
    public function getSchoolGardenRemark($gardenId) {
        return DB::select(
            "SELECT display, remark
            FROM t_garden_time_remark
            WHERE garden_id = $gardenId"
        );
    }

    //系列園取得
    public function getSchoolSeries($gardenId) {
        return DB::select(
            "SELECT *
            FROM t_series
            WHERE garden_id = $gardenId
            ORDER BY sort_no"
        );
    }

    //入園にかかる費用取得
    public function getSchoolJoinFee($gardenId) {
        return DB::select(
            "SELECT
            t_garden.entrance_fee,
            t_garden.year_fee,
            t_garden.monthly_fee,
            t_garden.deposit_fee,
            t_garden.special_fee
            FROM t_garden
            WHERE garden_id = $gardenId"
        );
    }

    //園が所有するグッズ取得
    public function getSchoolGoods($gardenId) {
        return DB::select(
            "SELECT *
            FROM t_goods
            WHERE garden_id = $gardenId"
        );
    }

    //入園について取得
    public function getSchoolJoinDetail($gardenId) {
        return DB::select(
            "SELECT
            capacity,
            document_request,
            distribution_date,
            reception_date,
            document_submit,
            exam_fee,
            payment_procedure,
            entrance_remark
            FROM t_garden
            WHERE garden_id = $gardenId"
        );
    }

    //リレーションタイプ判定
    public function checkRelationType($relation_type, $relation_value) {
        if($relation_type == '1'){
            $relation_text = $relation_value . ' / 保護者';
            return $relation_text;
        }
        elseif ($relation_type == '2'){
            $relation_text = $relation_value . '卒園 / 保護者';
            return $relation_text;
        }
        elseif ($relation_type == '3') {
            $relation_text = $relation_value . '卒園 / 本人';
            return $relation_text;
        }
        elseif($relation_type == '4'){
            $relation_text = $relation_value . '在校 / 保護者';
            return $relation_text;
        }
        elseif($relation_type == '5'){
            $relation_text = $relation_value . '卒業 / 保護者';
            return $relation_text;
        }
        elseif ($relation_type == '6'){
            $relation_text = $relation_value . '卒業 / 本人';
            return $relation_text;
        }
        elseif($relation_type == '7'){
            $relation_text = $relation_value;
            return $relation_text;
        }
    }
}
