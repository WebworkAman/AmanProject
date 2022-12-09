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

            $message = 'Dear <b>'.$request->name.'</b>';
            $message.= '感謝您的註冊,我們需要驗證你的郵件信箱去完成帳號註冊';

            $mail_data = [
                'recipient'=>$request->email,
                'fromEmail'=>$request->email,
                'fromName'=>$request->name,
                'subject'=>'會員註冊認證信',
                'body'=> $message,
                'actionLink'=>'www.google.com'
            ];

            \Mail::send('email-template',$mail_data,function($message)use($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'],$mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });



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
