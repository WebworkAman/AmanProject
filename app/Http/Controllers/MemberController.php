<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Libraries\MemberAuth;

class MemberController extends Controller
{
    public function create()
    {
        return view('members.register');
    }

    public function store(Request $request){
        
        // if($request->password === $request ->password_confirmation){
        //     $member = Member::create([
        //         'email' => $request->email,
        //         'password' => $request->password,
        //     ]);
        // }else{
        //     abort(404);
        // }

        $errorMessage = MemberAuth::signUp(
               $request->email,
               $request->password,
               $request->password_confirmation

        );

        if(!empty($errorMessage)){
            return back()->withErrors($errorMessage);
        }
        

        return redirect('/');
    }
}
