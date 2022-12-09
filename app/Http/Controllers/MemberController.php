<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\VerifyMember;
use App\Libraries\MemberAuth;
use Carbon\Carbon;


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

            $last_id = $member->id;
            $token = $last_id.hash('sha256',\Str::random(120));
            $verifyURL = route('verify',['token'=>$token,'service'=>'Email_verification']);

            VerifyMember::create([
                'user_id'=>$last_id,
                'token'=>$token,
            ]);

            $message = 'Dear <b>'.$request->name.'</b>';
            $message.= '感謝您的註冊,我們需要驗證你的郵件信箱去完成帳號註冊';

            $mail_data = [
                'recipient'=>$request->email,
                'fromEmail'=>$request->email,
                'fromName'=>$request->name,
                'subject'=>'會員註冊認證信',
                'body'=> $message,
                'actionLink'=>$verifyURL,
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

    public function verify(Request $request){
        $token = $request->token;
        $verifyUser = VerifyMember::where('token',$token)->first();

        if(!is_null($verifyUser)){
            $user = $verifyUser->user;
            if(!$user->email_verified || !$user->email_verified_at){
                $verifyUser->user->email_verified=1;
                $verifyUser->user->email_verified_at=Carbon::now('ROC');
                $verifyUser->user->save();
                return redirect()->route('members.session.create')
                       ->with('info','已成功登入信箱，請登入會員！')
                       ->with('verifiedEmail',$user->email);

            }
            else{
                return back()->with('info','你已完成過信箱驗證，請直接登入');
            }
        }

    }
}
