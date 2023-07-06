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

    public function AdminStore(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:members',
            'password'=>'required|min:5|max:18',
            ]);

            $password=\Hash::make($request->password);
            $member = Member::create([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => $password,
            ]);

            return redirect()->route('faqs.index');

    }

    public function store(Request $request){
         $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:members',
                'password'=>'required|min:5|max:18',
                'password_confirmation'=>'required|min:5|max:18'

         ]);
        
        if($request->password === $request ->password_confirmation){

            
            $password=\Hash::make($request->password);
            // $member = Member::create([
            //     'name'=> $request->name,
            //     'email' => $request->email,
            //     'password' => $password,
            // ]);

            $member = Member::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'identity' => $request->identity,
                'phone' => $request->phone,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'tax_id' => $request->tax_id,
                'company_phone' => $request->company_phone,
                'company_fax' => $request->company_fax,
                'company_website' => $request->company_website,
                'company_ceo' => $request->company_ceo,
                'purchase_person' => $request->purchase_person,
                'purchase_person_phone' => $request->purchase_person_phone,
                'purchase_person_ext' => $request->purchase_person_ext,
                'purchase_person_email' => $request->purchase_person_email,
                'other_info' => $request->other_info,
                'purchase_date' => $request->purchase_date,
                'machine_model' => $request->machine_model,
                'machine_serial' => $request->machine_serial,
                'machine_installation' => $request->machine_installation,
                'contact_person' => $request->contact_person,
                'contact_person_name' => $request->contact_person_name,
                'contact_person_phone' => $request->contact_person_phone,
                'contact_person_ext' => $request->contact_person_ext,
                'contact_person_mobile' => $request->contact_person_mobile,
                'contact_person_email' => $request->contact_person_email,
                'contact_software' => $request->contact_software,
                'purchase_source' => $request->purchase_source,
                'other_description' => $request->other_description
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



            return redirect()->route('members.session.create')->with('info','註冊成功，請到信箱收取你的驗證連結.');
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
                       ->with('info','已完成驗證，請登入會員！')
                       ->with('verifiedEmail',$user->email);

            }
            else{
                return back()->with('info','你已完成過信箱驗證，請直接登入');
            }
        }

    }
}
