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
         $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:5|max:18',
                'password_confirmation'=>'required|min:5|max:18'

         ]);
        
        if($request->password === $request ->password_confirmation){
            $member = Member::create([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return back()->with('success','註冊成功，請到信箱收取你的驗證連結.');
        }else{
            return back()->with('fail','確認密碼與原密碼並不相同');
        }

        // $errorMessage = MemberAuth::signUp(

            //    $request->name,
            //    $request->email,
            //    $request->password,
            //    $request->password_confirmation

            //   驗證輸入格式有無錯誤。

            // $request->validate([
            //     'name'=>'required',
            //     'email'=>'required|email|unique:users',
            //     'password'=>'required|min:5|max:18',
            //     'password_confirmation'=>'required|min:5|max:18'

            // ])
              
    
            

            // );

        // if(!empty($errorMessage)){
        //     return back()->withErrors($errorMessage);
        // }

            // return redirect('/');  導向首頁
            // return back()->with()('success','註冊成功，請到信箱收取你的驗證連結.');
        
        

        
    }
}
