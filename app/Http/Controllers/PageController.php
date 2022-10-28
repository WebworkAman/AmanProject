<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class PageController extends Controller
{
    public function home(){
        $member =null;
        if(session()->exist('memberId')){
            $member = Member::find(session('memberId'));
        }

        return view('home',[
            'member' => $member

        ]);
    }
}
