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

        // return view('members.login');
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
        
        
        
        // return redirect()->route('members.session.create');
        return redirect('/');
    }
    public function delete(Request $request)
    {
        session()->forget('memberId');
        // return redirect('/');
        return redirect()->route('members.session.create');

    }
    
}
