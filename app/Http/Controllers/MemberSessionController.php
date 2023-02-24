<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\MemberAuth; 
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
                return back()->with('fail','You need to confirm your account. We have sent you
                        activation link, please check your email');
                
            }
                return back()->with('fail','Password not matches.');
            
            
        }

            return back()->with('fail','This email is not registered.');
        

        

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
        $body = "We are received a request to reset the password for <b>Oshima</b> account associated with&nbsp;" .$request->email.
        ". You can reset your password by clicking the link below";

        \Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body],function($message)use($request){
            $message->from('wwa87819tw77@gmail.com','Oshima');
            $message->to($request->email,'Your Name')->subject('Reset Password');
        });

        return back()->with('success','we have e-mailed your password reset link');
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
