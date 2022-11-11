<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\MemberAuth; 

class MemberSessionController extends Controller
{
    public function create()
    {    
        // $member = null;

        // if(session()->exists('memberId')){
        //     $member = Member::find(session('memberId'));
        // }

        // return view('members.login',[
        //     'member' => $member
        // ]);

        if(MemberAuth::isLoggedIn()){
            return redirect(MemberAuth::HOME);
        }

        return view('members.logIn');
    }

    public function store(Request $request)
    {
        //沒有寫 MemberAuth.php 的寫法

        // $member = Member::where([
        //     'email' => $request->email,
        //     'password'=>$request->password
        // ])->first();

        // if(!empty($member)){
        //     session(['memberId' => $member->id]);
        // }

        // 有寫 MemberAuth.php 的寫法
        
        MemberAuth::logIn(
            $request->email,
            $request->password
        );
        
        return redirect(MemberAuth::HOME);
    }
    public function delete(Request $request)
    {
        // session()->forget('memberId');
        
        // return redirect()->route('members.session.create');

        MemberAuth::logOut();
        return redirect()->route('members.session.create');
        // return redirect('/');
    }
    
} 
