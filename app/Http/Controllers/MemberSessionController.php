<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\MemberAuth; 
use App\Models\VerifyMember;
use App\Models\Member;
use Hash;

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
            return redirect(MemberAuth::HOME_URL);
        }

        return view('members.logIn');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        //沒有寫 MemberAuth.php 的寫法

        $member = Member::where([
            'email' => $request->email,
            // 'password'=>$request->password
        ])->first();

        if(!empty($member)){

            if(Hash::check($request->password,$member->password)){

                if($member->email_verified){
                    session(['memberId' => $member->id]);

                    return redirect(MemberAuth::HOME_URL);
                }
                return back()->with('fail','您需要確認您的帳戶。 我們已發送給您
                相關連結，請查看您的郵箱');
                
            }
                return back()->with('fail','密碼並未相符.請重新輸入');
            
            
        }

            return back()->with('fail','此電子信箱尚未註冊！');
        

        

        // 有寫 MemberAuth.php 的寫法
        
        // MemberAuth::logIn(
        //     $request->email,
        //     $request->password
        // );
        
        // return redirect(MemberAuth::HOME);
        // return redirect()->route('members.session.create');
    }
    public function delete(Request $request)
    {
        // session()->forget('memberId');
        
        // return redirect()->route('members.session.create');

        MemberAuth::logOut();
        return redirect()->route('members.session.create');
        // return redirect('/');
    }
    public function showForgotForm(){
        return view('members.forgotPW');
    }
    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:members,email'
        ]);
        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
            'email'=> $request->email,
            'token'=> $token,
            'created_at'=> \Carbon\Carbon::now('ROC'),
        ]);
        $action_link = route('reset',['token'=>$token,'email'=>$request->email]);
        $body = "我們收到了重置與關聯的 <b>Oshima</b> 帳號請求來自&nbsp;" .$request->email.
        "&nbsp;您可以通過點擊下面的連結重置您的密碼";

        \Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body],function($message)use($request){
            $message->from('oshima.itdepartment@gmail.com','Oshima');
            $message->to($request->email,'Your Name')->subject('重 置 密 碼');
        });

        return back()->with('success','我們已通過E-mail發送您的密碼重置連結，請至個人信箱收取。');
    }
    public function verification(){
        return view('members.verify_member');
    }
    public function verificationPassword(Request $request){

        $request->validate([
            'email'=>'required|email|exists:members,email',
            'verification_code' => 'required',
            'password'=>'required',
            // 'password_confirmation'=>'required',
        ]);

        //檢查驗證碼是否正確
        $verification = VerifyMember::where('verification_code',$request->verification_code)
              ->whereHas('member',function($query)use($request){
                   $query->where('email',$request->email);
              })->first();

              if(!$verification){
                 return back()->with('fail','驗證碼或郵件地址不正確');
              }

              //更新密碼
              $member = $verification->member;
              $member -> password = Hash::make($request->password);
              $member -> save();

              return redirect()->route('members.session.create')->with('info','密碼設置成功，請登入');
    }
    public function showResetForm(Request $request, $token = null){
        return view('members.reset')->with(['token'=>$token,'email'=>$request->email]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:members,email',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);

        $check_token= \DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail','Invalid token');
        }else{
            Member::where('email',$request->email)->update([
                'password'=>Hash::make($request->password)
            ]);

            \DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('members.session.create')->with('info','密碼已成功更新，請使用新密碼重新登入')
            ->with('verifiedEmail',$request->email);
        }

    }
    
} 
