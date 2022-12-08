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
               
            //    $request->email,
            //    $request->password,
            //    $request->password_confirmation

            //   驗證輸入格式有無錯誤。

            $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:5|max:18',
                'password_confirmation'=>'required|min:5|max:18'

            ])

        );

        if(!empty($errorMessage)){
            return back()->withErrors($errorMessage);
        }
        

        return redirect('/');
    }
}
