<?php


namespace App\Model;
use DB;
use Hash;
use Illuminate\Support\Facades\Log;

class HomeModel
{
    public function getAllArea($prefecture_id) {
        return DB::select(
            "SELECT *
                FROM t_area
                WHERE prefecture_id = $prefecture_id
            "
        );
    }

    public function getAllCityByArea($area_id, $searchStr) {
        $searchContent = "'%".$searchStr."%'";
        $sql_str =  "SELECT t_city_area.city_id, t_city_area.city_name, IFNULL(cnt1,0) as cnt
                FROM t_city_area 
                 LEFT JOIN (
                    SELECT count(garden_id) as cnt1, city_id 
                    FROM  t_garden WHERE garden_name like $searchContent GROUP BY city_id
                ) as count_city on t_city_area.city_id = count_city.city_id WHERE area_id = $area_id
            ";
        return DB::select(
            $sql_str
        );
    }

    public function getAllPrefecture() {
        return DB::select(
            "SELECT *
                FROM t_prefecture ORDER BY is_active DESC, prefecture_id
            "
        );
    }



    function cmp_area($a, $b)
    {
        $first_count = count($a -> city_list);
        $second_count = count($b -> city_list);
        if ($first_count == $second_count) {
            return 0;
        }
        return ($first_count < $second_count) ? 1 : -1;
    }

    public function getPrefectureInfo($prefecture_id) {
        return DB::select(
            "SELECT *
                FROM t_prefecture WHERE prefecture_id = $prefecture_id
            "
        );
    }

    public function getAllCityGroupByArea($prefecture_id, $searchStr) {
        $areaList = $this->getAllArea($prefecture_id);
        $answerList = [];
        foreach($areaList as $area) {
            $areaId = $area -> area_id;
            $cityList = $this->getAllCityByArea($areaId, $searchStr);
            $area -> city_list = $cityList;
            if(count($cityList) > 0) {
                array_push($answerList, $area);
            }
        }
        return $answerList;
    }

    public function divideArea($areaList) {
        $answerList = [];
        $leftList = [];
        $rightList = [];
        $totalCount = 0;
        $leftCount = 0;
        $isLeft = true;
        foreach($areaList as $area) {
            $size = count($area -> city_list);
            $totalCount = $totalCount + $size;
        }

        foreach ($areaList as $area) {
            $size = count($area -> city_list);
            if(abs($leftCount * 2 + $size * 2 - $totalCount) > abs($leftCount * 2 - $totalCount)) {
                $isLeft = false;
            }
            $leftCount = $leftCount + $size;
            if($isLeft == false) {
                array_push($rightList, $area);
            } else {
                array_push($leftList, $area);
            }
        }
        array_push($answerList, $leftList);
        array_push($answerList, $rightList);
        return $answerList;
    }

    public function getAllType() {
        return DB::select(
            "SELECT *
                FROM t_type
            "
        );
    }

    public function getAllTag() {
        return DB::select(
            "SELECT *
                FROM t_tag
                LIMIT 0, 5
            "
        );
    }

    public function getTagListByType($type_id) {
        return DB::select(
            "SELECT * 
            FROM t_tag 
            WHERE type_id = $type_id ORDER BY order_index"
        );
    }

    public function getTagTypeList() {
        return DB::select(
            "SELECT * 
            FROM t_tag_type WHERE id != 1 ORDER BY id"
        );
    }

    public function getAllTagByType() {
        $typeList = $this->getTagTypeList();
        foreach ($typeList as $type) {
            $tagList = $this->getTagListByType($type -> id);
            $type -> tagList = $tagList;
        }
        return $typeList;
    }

    public function getAllKind() {
        return DB::select(
            "SELECT *
                FROM t_kind ORDER BY sort_id
            "
        );
    }




}
