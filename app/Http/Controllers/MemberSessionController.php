<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member; 

class MemberSessionController extends Controller
{
    public function create()
    {    
        $member = null;
        if(session()->exists('memberId')){
            $member = Member::find(session('memberId'));
        }
        return view('members.login',[
            'member' => $member
        ]);
    }

    public function store(Request $request)
    {
        $member = Member::where([
            'email' => $request->email,
            'password'=>$request->password
        ])->first();

        if(!empty($member)){
            session(['memberId' => $member->id]);
        }

        // var_dump( $member );
        return redirect()->route('members.session.create');
    }
    public function delete(Request $request)
    {
        session()->forget('memberId');
        return redirect()->route('members.session.create');
    }
    
}
