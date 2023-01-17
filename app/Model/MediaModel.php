<?php


namespace App\Model;
use DB;
use Hash;
use Illuminate\Support\Facades\Log;

class MediaModel
{
    public function getYoutubeList($mediaId) {
        return DB::select(
            "SELECT *
            FROM t_garden_media_youtube
            WHERE media_id = $mediaId
            ORDER BY t_garden_media_youtube.order
            "
        );
    }

    public function getSubtitleList($mediaId) {
        return DB::select(
            "SELECT *
            FROM t_garden_media_subtitle
            WHERE media_id = $mediaId
            ORDER BY t_garden_media_subtitle.order"
        );
    }

    public function getContentList($mediaId) {
        return DB::select(
            "SELECT *
            FROM t_garden_media_content
            WHERE media_id = $mediaId
            ORDER BY t_garden_media_content.order"
        );
    }



    public function getMediaById($mediaId) {
        $newsInfo = DB::select(
            "SELECT *
                FROM t_garden_media
                LEFT JOIN t_garden ON t_garden_media.garden_id = t_garden.garden_id
                LEFT JOIN t_prefecture ON t_garden.prefecture_id = t_prefecture.prefecture_id
                WHERE media_id = $mediaId
            "
        );
        return $newsInfo[0];
    }

    public function getImageListById($mediaId) {
        return DB::select(
            "SELECT *
                FROM t_garden_media_img
                LEFT JOIN t_garden_img ON t_garden_img.id = t_garden_media_img.img_id
                WHERE t_garden_media_img.media_id = $mediaId
                ORDER BY t_garden_media_img.order
            "
        );
    }

    public function getImageById($imgId) {
        return DB::select(
            "SELECT *
                FROM t_garden_img
                WHERE t_garden_img.id = $imgId
            "
        );
    }

    public function getMediaListByGarden($gardenId) {
        return DB::select(
            "SELECT *
                FROM t_garden_media
                WHERE garden_id = $gardenId
                ORDER BY media_id desc
            "
        );
    }

    public function getMediaTypeCount($type, $gardenId) {
        return  DB::table('t_garden_media')->where('garden_id', $gardenId)->where('public_type', '=', $type)->count();
    }


    public function updateMediaDetail($media_id, $garden_id, $media_type, $media_name, $media_title, $public_type, $public_date, $public_time) {
        DB::table('t_garden_media')->where('media_id', '=', $media_id)
            ->update([
                'garden_id'   => $garden_id,
                'media_type' => $media_type,
                'media_name' => $media_name,
                'media_title' => $media_title,
                'public_type' => $public_type,
                'public_date' => $public_date,
                'public_time' => $public_time
            ]);
    }

    public function insertMediaDetail($garden_id, $media_type, $media_name, $media_title, $public_type, $public_date, $public_time) {
        return DB::table('t_garden_media')->insertGetId([
                'garden_id'   => $garden_id,
                'media_type' => $media_type,
                'media_name' => $media_name,
                'media_title' => $media_title,
                'public_type' => $public_type,
                'public_date' => $public_date,
            'public_time' => $public_time
            ]);
    }

    public function deleteImageByMedia($media_id, $image_id){
        DB::table('t_garden_img')->where('id', '=', $image_id)->delete();
        DB::table('t_garden_media_img')->where('media_id', '=', $media_id)->where('img_id', $image_id)->delete();
    }

    public function deleteImageById($image_id){
        DB::table('t_garden_img')->where('id', '=', $image_id)->delete();
    }

    public function updateImageCapById($image_id, $val){
        DB::table('t_garden_img')->where('id', '=', $image_id)->update([
            'img_source'   => $val,
        ]);
    }
    public function updateImageFavouriteById($image_id, $val){
        DB::table('t_garden_img')->where('id', '=', $image_id)->update([
            'favourite'   => $val,
        ]);
    }

    public function updateImageSourceById($image_id, $val){
        DB::table('t_garden_img')->where('id', '=', $image_id)->update([
            'caption'   => $val,
        ]);
    }

//    public function updatePageTime($image_id, $val){
//        DB::table('t_update_info')->where('id', '=', $image_id)->update([
//            'img_source'   => $val,
//        ]);
//    }

    public function removeAllSubtitle($media_id) {
        DB::table('t_garden_media_subtitle')->where('media_id', '=', $media_id)->delete();
    }

    public function addSubtitle($media_id, $subtitle, $order) {
        return DB::table('t_garden_media_subtitle')->insertGetId([
            'media_id'   => $media_id,
            'subtitle' => $subtitle,
            'order' => $order
        ]);
    }

    public function addFavourite($user_id, $image_id) {
        return DB::table('t_favourite')->insertGetId([
            'user_id'   => $user_id,
            'image_id' => $image_id,
        ]);
    }



    public function addGardenFavourite($user_id, $garden_id, $date) {
        return DB::table('t_garden_favourite')->insertGetId([
            'user_id'   => $user_id,
            'garden_id' => $garden_id,
            'favourite_date' => $date,
        ]);
    }

    public function delFavourite($user_id, $image_id) {
        DB::table('t_favourite')->where('user_id', '=', $user_id)->where('image_id', '=', $image_id)->delete();
    }
    public function delGardenFavourite($user_id, $garden_id) {
        DB::table('t_garden_favourite')->where('user_id', '=', $user_id)->where('garden_id', '=', $garden_id)->delete();
    }

    public function removeAllContent($media_id) {
        DB::table('t_garden_media_content')->where('media_id', '=', $media_id)->delete();
    }

    public function addContent($media_id, $subtitle, $order) {
        return DB::table('t_garden_media_content')->insertGetId([
            'media_id'   => $media_id,
            'content' => $subtitle,
            'order' => $order
        ]);
    }

    public function removeAllYoutube($media_id) {
        DB::table('t_garden_media_youtube')->where('media_id', '=', $media_id)->delete();
    }

    public function addYoutube($media_id, $subtitle, $order) {
        return DB::table('t_garden_media_youtube')->insertGetId([
            'media_id'   => $media_id,
            'url' => $subtitle,
            'order' => $order
        ]);
    }

    public function removeAllImage($media_id) {
        DB::table('t_garden_media_img')->where('media_id', '=', $media_id)->delete();
    }

    public function addImage($media_id, $img_id, $order) {
        return DB::table('t_garden_media_img')->insertGetId([
            'media_id'   => $media_id,
            'img_id' => $img_id,
            'order' => $order
        ]);
    }

    public function removeMedia($media_id) {
        DB::table('t_garden_media')->where('media_id', '=', $media_id)->delete();
    }

}
