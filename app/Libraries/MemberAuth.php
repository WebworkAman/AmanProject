<?php

namespace App\Libraries;
use App\Models\Member;

class MemberAuth{

    private static $member = null;

    public static function member(){
        if(empty(self::$member)&&session()->exists('memberId')){
            self::$member = Member::find(session('memberId'));
        }
        return self::$member;
    }

    public static function isLoggedin(){
        return !empty(self::member());
 
        // return !empty(self::$member);
        // 如果這樣寫會有問題
    }

    public static function logIn($email,$password){
        self::$member = Member::where([
            'email'=> $email,
            'password'=> $password

        ])->first();

        if(!empty(self::$member)){
            session(['memberId'=>self::$member->id]);
        }
    }


}