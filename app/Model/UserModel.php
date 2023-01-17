<?php


namespace App\Model;
use DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserModel
{
    public function getUserByAccount($email, $password) {
        $user = DB::table('users')
            ->where([
                ['email', '=', $email],
            ])->get()->toArray();
        if (count($user)) {
            foreach ($user as $key => $value) {
                # code...
                if (Hash::check($password, $value->password)) {
                    $r_user = $value;

                }
            }
        }
        return $r_user;
    }

    public function getUserByEmail($email, $password) {
        $user = DB::table('t_user_normal')
            ->where([
                ['email', '=', $email],
            ])->get()->toArray();
        if (count($user)) {
            foreach ($user as $key => $value) {
                # code...
                if (Hash::check($password, $value->password)) {
                    $r_user = $value;

                }
            }
        }
        return $r_user;
    }

    public function getAdminUserByEmail($email, $password) {
        $user = DB::table('t_user_republic')
            ->where([
                ['email', '=', $email],
            ])->get()->toArray();
        if (count($user)) {
            foreach ($user as $key => $value) {
                # code...
                if (Hash::check($password, $value->password)) {
                    $r_user = $value;

                }
            }
            return $r_user;
        }
        else{
            return $user;
        }

    }

    public function getAdminUserByGarden($garden_id) {
        $user = DB::table('t_user_republic')
            ->where([
                ['garden_id', '=', $garden_id]
            ])
            ->first();
        return $user;
    }

    public function checkUserPw($user_id, $pw){
        $r_user = false;
        $user = DB::table('t_user_normal')
        ->where([
            ['id', '=', $user_id],
        ])->get()->toArray();
        if (count($user)) {
            foreach ($user as $key => $value) {
                # code...
                if (Hash::check($pw, $value->password)) {
                    $r_user = true;

                }
            }
        }
        return $r_user;
    }



    public function registerUser($name, $second_name, $account, $gender, $post_code, $address, $mobile, $email, $password) {
        $id = DB::table('users')->insertGetId([
            'name'                  => $name,
            'second_name'           => $second_name,
            'account'               => $account,
            'gender'                => $gender,
            'post_code'             => $post_code,
            'address'               => $address,
            'mobile'                => $mobile,
            'email'                 => $email,
            'password'              => Hash::make($password)
        ]);
        return $id;
    }

    public function registerNormalUser($first_name, $second_name, $first_name_huri, $second_name_huri, $old, $gender, $birthday,
                                       $post_code, $city, $address, $mobile, $email, $type) {
        $id = DB::table('t_user_normal')->insertGetId([
            'first_name'            => $first_name,
            'second_name'           => $second_name,
            'first_name_huri'       => $first_name_huri,
            'second_name_huri'      => $second_name_huri,
            'old'                   => $old,
            'gender'                => $gender,
            'birthday'              => $birthday,
            'post_code'             => $post_code,
            'city'                  => $city,
            'address'               => $address,
            'mobile'                => $mobile,
            'email'                 => $email,
            'status'                => 0,
            'type'                  => $type
        ]);
        return $id;
    }

    public function registerGardenUser($type_index, $facility_name, $facility_name_second, $facility_post, $facility_prefecture, $facility_city,
                $facility_address, $facility_mobile, $facility_url, $user_id) {
        $id = DB::table('t_user_garden')->insertGetId([
            'type'                   => $type_index,
            'facility_name'            => $facility_name,
            'facility_name_second'            => $facility_name_second,
            'facility_post'            => $facility_post,
            'facility_prefecture'            => $facility_prefecture,
            'facility_city'            => $facility_city,
            'facility_address'            => $facility_address,
            'facility_mobile'            => $facility_mobile,
            'facility_url'            => $facility_url,
            'user_id'            => $user_id,

        ]);
        return $id;
    }

    public function registerPassword($id, $password) {
        DB::table('t_user_normal')->where('id', '=', $id)
            ->update([
                'password' => Hash::make($password) ,
                'status'   => 1
            ]);
    }

    public function getUserByOnlyEmail($email) {
        $user = DB::table('t_user_normal')
            ->where([
                ['email', '=', $email],
            ])
            ->first();
        return $user;
    }
    public function deleteUserByOnlyEmail($email) {
       DB::table('t_user_normal')
            ->where([
                ['email', '=', $email],
            ])
            ->delete();
    }

    public function getUserById($id) {
        $user = DB::table('t_user_normal')
            ->where([
                ['id', '=', $id]
            ])
            ->first();
        return $user;
    }

    public function updateUser($user_id, $first_name, $second_name, $first_name_huri, $second_name_huri, $email, $mobile, $pw) {
        return DB::table('t_user_normal')
            ->where('id', $user_id)->update([
                'first_name' => $first_name,
                'second_name' => $second_name,
                'first_name_huri' => $first_name_huri,
                'second_name_huri' => $second_name_huri,
                'email' => $email,
                'mobile' => $mobile,
                'password' => Hash::make($pw)
            ]);
    }

    public function addExit($id, $reason, $use_rate) {
        return DB::table('t_exit_history')->insertGetId([
            'user_id'               => $id,
            'reason'            => $reason,
            'use_rate'           => $use_rate,
        ]);
    }

    public function updateExit($id) {
        return DB::table('t_user_normal')->where('id', $id)->update([
            'type'               => "exit_user",
        ]);
    }
    public function addChild($id, $first_name, $second_name, $first_name_huri, $second_name_huri, $gender, $birthday) {
        $id = DB::table('t_user_child')->insertGetId([
            'user_id'               => $id,
            'first_name'            => $first_name,
            'second_name'           => $second_name,
            'first_name_huri'       => $first_name_huri,
            'second_name_huri'      => $second_name_huri,
            'gender'                => $gender,
            'birthday'              => $birthday

        ]);
        return $id;
    }

    public function getChildByUserId($userId){
        return DB::table('t_user_child')->where('user_id', $userId)->get()->toArray();
    }

    public function addChildGarden($child_id, $garden_info, $type) {
        $id = DB::table('t_child_garden')->insertGetId([
            'child_id'            => $child_id,
            'garden_id'           => $garden_info -> id,
            'garden_detail'       => $garden_info -> detail,
            'type'                 => $type
        ]);
        return $id;
    }

    public function addStudentGarden($user_id, $garden_info, $type) {
        $id = DB::table('t_student')->insertGetId([
            'user_id'            => $user_id,
            'garden_id'           => $garden_info -> id,
            'garden_detail'       => $garden_info -> detail,
            'type'                 => $type
        ]);
        return $id;
    }

    public function addToken($email, $token) {
        DB::table('t_token')->where('email', '=', $email)->delete();
        $now = Date('Y-m-d H:i:s');
        DB::table('t_token')->insert([
            'email'            => $email,
            'token'           => $token,
            'created_at' => $now,
        ]);
    }

    public function getToken($email) {
        return DB::table('t_token')
            ->where([
                ['email', '=', $email]
            ])
            ->first();
    }

    public function saveMessageHistory($id, $email, $token, $type, $name){
        $now = Date('Y-m-d H:i:s');
        $id = DB::table('t_message')->insertGetId([
            'name'                  => $name,
            'user_id'           => $id,
            'token'               => $token,
            'type'                => $type,
            'email'                 => $email,
            'created_at' => $now,
            'read_status' => 0,
        ]);
        return $id;

    }

    public function getMessageHistory($user_id, $order){
        if($order == 'read'){
            return DB::table('t_message')->where('user_id', $user_id)->where('read_status', '0')->orderBy('created_at', 'desc')->get()->toArray();
        }
        else{
            return DB::table('t_message')->where('user_id', $user_id)->orderBy('created_at', 'desc')->get()->toArray();
        }

    }










}
