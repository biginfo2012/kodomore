<?php


namespace App\Model;
use DB;
use Hash;
use Illuminate\Support\Facades\Log;

class NewsModel
{
    public function getNewsById($newsId) {
        $newsInfo = DB::select(
            "SELECT *
                FROM t_news
                LEFT JOIN t_city ON t_news.city_id = t_city.city_id
                LEFT JOIN t_prefecture ON t_city.prefecture_id = t_prefecture.prefecture_id
                WHERE news_id = $newsId
            "
        );
        return $newsInfo[0];
    }

    public function getArticlesById($articlesId) {
        $newsInfo = DB::select(
            "SELECT *
                FROM t_articles
                LEFT JOIN t_prefecture ON t_articles.prefecture_id = t_prefecture.prefecture_id
                WHERE id = $articlesId
            "
        );
        return $newsInfo[0];
    }


    public function getNewsListByPrefecture($prefectureId) {
        return DB::select(
            "SELECT *
                FROM t_news
                WHERE prefecture_id = $prefectureId
                ORDER BY news_id
            "
        );
    }

    public function getArticlesListByPrefecture($prefectureId) {
        return DB::select(
            "SELECT *
                FROM t_articles
                WHERE prefecture_id = $prefectureId
                ORDER BY id desc
            "
        );
    }

    public function getArticlesCommentById($articlesId, $order) {
        if($order === 'new'){
            return DB::select(
                "SELECT t_articles_comments.*, t_articles_comments_follow.user_id as follow_id
                FROM t_articles_comments
                LEFT JOIN t_articles_comments_follow ON t_articles_comments.id = t_articles_comments_follow.comment_id
                WHERE article_id = $articlesId
                ORDER BY updated_at DESC
            "
            );
        }elseif ($order === 'old'){
            return DB::select(
                "SELECT t_articles_comments.*, t_articles_comments_follow.user_id as follow_id
                FROM t_articles_comments
                LEFT JOIN t_articles_comments_follow ON t_articles_comments.id = t_articles_comments_follow.comment_id
                WHERE article_id = $articlesId
                ORDER BY updated_at ASC
            "
            );
        }

    }
    public function getNewsCommentById($newsId, $order) {
        if($order === 'new'){
            return DB::select(
                "SELECT t_news_comments.*, t_news_comments_follow.user_id as follow_id
                FROM t_news_comments
                LEFT JOIN t_news_comments_follow ON t_news_comments.id = t_news_comments_follow.comment_id
                WHERE news_id = $newsId
                ORDER BY updated_at DESC
            "
            );
        }elseif ($order === 'old'){
            return DB::select(
                "SELECT t_news_comments.*, t_news_comments_follow.user_id as follow_id
                FROM t_news_comments
                LEFT JOIN t_news_comments_follow ON t_news_comments.id = t_news_comments_follow.comment_id
                WHERE news_id = $newsId
                ORDER BY updated_at ASC
                "
            );
        }

    }

    public function getArticlesContentListByPrefecture($articlesId) {
        return DB::select(
            "SELECT *
                FROM t_articles_content
                WHERE article_id = $articlesId
                ORDER BY item_order
            "
        );
    }

    public function getNewsListByPrefecture1($prefectureId) {
        return DB::select(
            "SELECT *
                FROM t_news
                WHERE prefecture_id = $prefectureId
                ORDER BY news_id
            "
        );
    }

    public function insertArticleComment($article_id, $user_id, $user_name, $content, $created_at){
        DB::table('t_articles_comments')->insert([
            'article_id'            => $article_id,
            'user_id'           => $user_id,
            'user_name' => $user_name,
            'content' => $content,
            'created_at' => $created_at,
            'updated_at' => $created_at
        ]);
    }
    public function insertNewsComment($news_id, $user_id, $user_name, $content, $created_at){
        DB::table('t_news_comments')->insert([
            'news_id'            => $news_id,
            'user_id'           => $user_id,
            'user_name' => $user_name,
            'content' => $content,
            'created_at' => $created_at,
            'updated_at' => $created_at
        ]);
    }
    public function updateArticleComment($comment_id, $content){
        DB::table('t_articles_comments')->where('id', $comment_id)->update(['content' => $content]);
    }
    public function updateNewsComment($comment_id, $content){
        DB::table('t_news_comments')->where('id', $comment_id)->update(['content' => $content]);
    }
    public function deleteArticleComment($comment_id){
        DB::table('t_articles_comments')->where('id', $comment_id)->delete();
    }
    public function deleteNewsComment($comment_id){
        DB::table('t_news_comments')->where('id', $comment_id)->delete();
    }

    public function followComment($user_id, $comment_id){
        DB::table('t_articles_comments_follow')->insert([
           'user_id' => $user_id,
           'comment_id' => $comment_id
        ]);
    }
    public function followNewsComment($user_id, $comment_id){
        DB::table('t_news_comments_follow')->insert([
            'user_id' => $user_id,
            'comment_id' => $comment_id
        ]);
    }
    public function getCommentByUserId($user_id){
        return DB::select(
            "SELECT t_articles_comments.*, t_articles.title as article_title
                FROM t_articles_comments
                LEFT JOIN t_articles ON t_articles_comments.article_id = t_articles.id
                WHERE t_articles_comments.user_id = $user_id
                ORDER BY t_articles_comments.updated_at DESC
            "
        );
    }
    public function getNewsCommentByUserId($user_id){
        return DB::select(
            "SELECT t_news_comments.*, t_news.title as news_title
                FROM t_news_comments
                LEFT JOIN t_news ON t_news_comments.news_id = t_news.news_id
                WHERE t_news_comments.user_id = $user_id
                ORDER BY t_news_comments.updated_at DESC
            "
        );
    }

    public function getProfile($user_id){
        return DB::table('t_articles_profile')->where('user_id', $user_id)->get()->first();
    }
    public function getNewsProfile($user_id){
        return DB::table('t_news_profile')->where('user_id', $user_id)->get()->first();
    }
    public function saveProfile($user_id, $post_name_setting, $post_name, $second_name_setting, $second_name, $profile_img){
        DB::table('t_articles_profile')->where('user_id', $user_id)->delete();
        DB::table('t_articles_profile')->insert([
            'user_id' => $user_id,
            'post_name_setting' => $post_name_setting,
            'post_name' => $post_name,
            'second_name_setting' => $second_name_setting,
            'second_name' => $second_name,
            'profile_img' => $profile_img
        ]);

    }
    public function saveNewsProfile($user_id, $post_name_setting, $post_name, $second_name_setting, $second_name, $profile_img){
        DB::table('t_news_profile')->where('user_id', $user_id)->delete();
        DB::table('t_news_profile')->insert([
            'user_id' => $user_id,
            'post_name_setting' => $post_name_setting,
            'post_name' => $post_name,
            'second_name_setting' => $second_name_setting,
            'second_name' => $second_name,
            'profile_img' => $profile_img
        ]);

    }





}
