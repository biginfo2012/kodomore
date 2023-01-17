<?php


namespace App\Model;
use DB;
use Hash;
use Illuminate\Support\Facades\Log;

class GardenModel
{
    public function saveJSON($json_content, $email, $title, $comment, $hash, $create_date) {
        $id = DB::table('t_save')->insertGetId([
            'hash'          => $hash,
            'email'         => $email,
            'title'         => $title,
            'comment'       => $comment,
            'json'          => $json_content,
            'create_date'   => $create_date
        ]);
        return $id;
    }

    public function getAllGarden() {
        return DB::select(
            "SELECT t_garden.*
                FROM t_garden
            "
        );
    }




}
