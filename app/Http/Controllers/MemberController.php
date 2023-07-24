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
                'password'=>'required|min:5|max:18|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
                'password_confirmation'=>'required|min:5|max:18'

         ], [
            'name.required' => '請填寫姓名',
            'name.string' => '姓名必須是文字',
            'name.max' => '姓名不能超過 :max 個字元',
            
            'email.required' => '請填寫電子郵件',
            'email.email' => '請填寫有效的電子郵件地址',
            'email.unique' => '此電子郵件已經被註冊過了',
            
            'password.required' => '請填寫密碼',
            'password.string' => '密碼必須是文字',
            'password.min' => '密碼不能少於 :min 個字元',
            'password.max' => '密碼不能超過 :max 個字元',
            'password.confirmed' => '密碼確認不符',
            'password.regex' => '密碼至少要有一個英文及數字',
    
            'password_confirmation.required' => '請填寫確認密碼',
            'password_confirmation.string' => '確認密碼必須是文字',
            'password_confirmation.min' => '確認密碼不能少於 :min 個字元',
            'password_confirmation.max' => '確認密碼不能超過 :max 個字元',
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
                'company_address' => json_encode([
                    'country' => $request->input('company_address.country'),
                    'postal_code' => $request->input('company_address.postal_code'),
                    'region' => $request->input('company_address.region'),
                    'city' => $request->input('company_address.city'),
                    'street' => $request->input('company_address.street'),
                ]),
                'company_tax_id' => $request->company_tax_id,
                'company_phone' => json_encode([
                    [
                        'country_code_1' => $request->input('company_phone.country_code_1'),
                        'area_code_1' => $request->input('company_phone.area_code_1'),
                        'phone_number_1' => $request->input('company_phone.phone_number_1'),
                    ],
                    [
                        'country_code_2' => $request->input('company_phone.country_code_2'),
                        'area_code_2' => $request->input('company_phone.area_code_2'),
                        'phone_number_2' => $request->input('company_phone.phone_number_2'),
                    ],
                    [
                        'country_code_3' => $request->input('company_phone.country_code_3'),
                        'area_code_3' => $request->input('company_phone.area_code_3'),
                        'phone_number_3' => $request->input('company_phone.phone_number_3'),
                    ],
                ]),
                'company_fax' => json_encode([
                    'country_code' => $request->input('company_fax.country_code'),
                    'area_code' => $request->input('company_fax.area_code'),
                    'fax_number' => $request->input('company_fax.phone_number'),
                ]),
                'company_website' => $request->company_website,
                'company_ceo' => $request->company_ceo,
                'company_purchase_person_name' => $request->company_purchase_person_name,
                'company_purchase_person_phone' => json_encode([
                
                        'country_code' => $request->input('company_purchase_person_phone.purchase_country_code'),
                        'area_code' => $request->input('company_purchase_person_phone.purchase_area_code'),
                        'phone_number' => $request->input('company_purchase_person_phone.purchase_phone_number'),
                        'purchase_extension' =>  $request->input('company_purchase_person_phone.purchase_extension'),
                    
           
                ]),
                'company_email' => $request->company_email,
                'company_other_info' => $request->company_other_info,

                //機器基本資料建檔
                'machine_purchase_date' => $request->machine_purchase_date,
                'machine_model' => $request->machine_model,
                'machine_serial' => $request->machine_serial,
                'installation_company_name' => $request->installation_company_name,
                'installation_company_address' => json_encode([
                    'country' => $request->input('installation_company_address.installation_country'),
                    'postal_code' => $request->input('installation_company_address.installation_postal_code'),
                    'region' => $request->input('installation_company_address.installation_region'),
                    'city' => $request->input('installation_company_address.installation_city'),
                    'street' => $request->input('installation_company_address.installation_street'),
                ]),
                'installation_vat_number' => $request->installation_vat_number,
                'installation_company_phone' => json_encode([
                    [
                        'country_code_1' => $request->input('installation_company_phone.country_code_1'),
                        'area_code_1' => $request->input('installation_company_phone.area_code_1'),
                        'phone_number_1' => $request->input('installation_company_phone.phone_ddnumber_1'),
                    ],
                    [
                        'country_code_2' => $request->input('installation_company_phone.country_code_2'),
                        'area_code_2' => $request->input('installation_company_phone.area_code_2'),
                        'phone_number_2' => $request->input('installation_company_phone.phone_number_2'),
                    ],
                    [
                        'country_code_3' => $request->input('installation_company_phone.country_code_3'),
                        'area_code_3' => $request->input('installation_company_phone.area_code_3'),
                        'phone_number_3' => $request->input('installation_company_phone.phone_number_3'),
                    ],
                ]),
                'installation_company_fax' => json_encode([
                    'country_code' => $request->input('installation_company_fax.country_code'),
                    'area_code' => $request->input('installation_company_fax.area_code'),
                    'fax_number' => $request->input('installation_company_fax.fax_number'),
                ]),
                'contact_person_position' => $request->contact_person_position,
                'contact_person_name' => $request->contact_person_name,
                'contact_person_phone' => json_encode([
                        'country_code' => $request->input('contact_person_phone.country_code'),
                        'area_code' => $request->input('contact_person_phone.area_code'),
                        'phone_number' => $request->input('contact_person_phone.phone_number'),
                        'contact_extension' => $request->input('contact_person_phone.extension'),
                ]),
                'contact_person_mobile' => $request->contact_person_mobile,
                'contact_person_email' => $request->contact_person_email,
                'contact_software_data' => json_encode([
                    'contact_software_type' => $request->input('contact_software_type'),
                    'contact_software_id' => $request->input('contact_software_data.software_id'),
            
                ]),
                
                //購入來源
                'purchase_manufacturer' => $request->purchase_manufacturer,
                'purchase_manufacturer_person' => $request->purchase_manufacturer_person,
                'purchase_manufacturer_phone' => $request->purchase_manufacturer_phone,
                'other_purchase_source' => $request->other_purchase_source,
                'other_purchase_company' => $request->other_purchase_company,
                'other_purchase_company_name' => $request->other_purchase_company_name,
                'other_purchase_company_address' => json_encode([
                    'country' => $request->input('other_purchase_company_address.country'),
                    'postal_code' => $request->input('other_purchase_company_address.postal_code'),
                    'region' => $request->input('other_purchase_company_address.region'),
                    'city' => $request->input('other_purchase_company_address.city'),
                    'street' => $request->input('other_purchase_company_address.street'),
                ]),
                'other_purchase_tax_id' => $request->other_purchase_tax_id,
                'other_purchase_company_phone' => json_encode([
                        'country_code' => $request->input('other_purchase_company_phone.country_code'),
                        'area_code' => $request->input('other_purchase_company_phone.area_code'),
                        'phone_number' => $request->input('other_purchase_company_phone.phone_number'),

                ]),
                'other_purchase_name' => $request->other_purchase_name,
                'other_purchase_phone' => $request->other_purchase_phone,
                'other_purchase_description' => $request->other_purchase_description,
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
