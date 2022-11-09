<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Member;
// use App\Libraries\MemberAuth;


class PageController extends Controller
{
    public function home(){

        // $member = null;

        // if(session()->exists('memberId')){
        //     $member = Member::find(session('memberId'));
        // }

        // return view('home',[
        //     'member' => $member
        // ]);
        return view('home');
    }
}

?>
