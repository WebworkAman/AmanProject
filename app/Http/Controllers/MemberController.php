<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\VerifyMember;
use App\Models\Tbm01;
use App\Models\Tbm02;
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
                // 'password'=>'required|min:5|max:18|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
                // 'password_confirmation'=>'required|min:5|max:18'

                // 'company_name'=>'required',

                // 'company_address[country]'=>'required',

         ], [
            'company_tax_id.required' => '請填寫統一編號',

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

            // 'company_address[country].required' => '請填寫此欄位',
         ]);

        $companyTaxId = $request->company_tax_id;
        $email = $request ->email;

        $tbm01 = Tbm01::where('ba19',$companyTaxId)->first();
        $tbm02 = Tbm02::where('bb06',$email)->first();

        
        if(!$tbm01){

             if(!$tbm02){
                return back()->with('fail','目前未成為公司客戶，欲知詳情請洽歐西瑪');
             }else{
                
                //獲取同筆 bb011 資料
                $bb011Value = $tbm02->bb011;
                
                //判斷 ba01 值是否以 'C' 為開頭
                if(strpos($bb011Value,'C')===0){

                $company_ERP_id = $tbm02->bb011;
                $stat_info = '';
                $identityPermValue = $request->identity_prem;

                //檢查是否已經存在具有相同 identitly_perm 值的紀錄

                $existingMemberIdentity1 = Member::where('company_ERP_id', $company_ERP_id)
                ->where('identity_perm', 1)
                ->first();
    
                $existingMemberIdentity2 = Member::where('company_ERP_id', $company_ERP_id)
                ->where('identity_perm', 2)
                ->first();

                $existingMemberIdentity3 = Member::where('company_ERP_id', $company_ERP_id)
                ->where('identity_perm', 3)
                ->where('stat_info','y')
                ->count();

                if($existingMemberIdentity1  && $request->identity_perm == 1){
                    // 如果已經存在相同 identity_perm 的記錄，且值不為 3，則不能重複註冊
                      return back()->with('fail', '該公司已有採購註冊，請重新選取其他身份');
                }elseif($existingMemberIdentity2 && $request->identity_perm == 2){
                    // 如果已經存在相同 identity_perm 的記錄，且值不為 3，則不能重複註冊
                      return back()->with('fail', '該公司已有廠長註冊，請重新選取其他身份');
                }
                else{

                    if ($existingMemberIdentity3 >= 10) {
                        return back()->with('fail', '超過限制，無法註冊新會員');
                    }else{

                        $member = Member::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'identity_perm' => $request->identity_perm,
                            'company_tax_id' => $companyTaxId,
                            'company_ERP_id' => $company_ERP_id,
                            'stat_info' => $stat_info,           
        
                        ]);
                        
            
                        $last_id = $member->id;
                        $token = $last_id.hash('sha256',\Str::random(120));
                        $verifyURL = route('verify',['token'=>$token,'service'=>'Email_verification']);
                        $verificationCode = \Str::random(6);
            
                        VerifyMember::create([
                            'user_id'=>$last_id,
                            'token'=>$token,
                            'verification_code'=>$verificationCode,
                        ]);
                        
                        $message = '親愛的 <b>'.$request->name.'</b><br>';
                        $message.= '感謝您的註冊，系統發送的驗證碼如下：';
            
                        $mail_data = [
                            'recipient'=>$request->email,
                            'fromEmail'=>$request->email,
                            'fromName'=>$request->name,
                            'subject'=>'會員註冊認證信',
                            'verification_code'=>$verificationCode,
                            'body'=> $message,
                            'actionLink'=>$verifyURL,
                        ];
            
                        \Mail::send('email-template',$mail_data,function($message)use($mail_data){
                            $message->to($mail_data['recipient'])
                                    ->from($mail_data['fromEmail'],$mail_data['fromName'])
                                    ->subject($mail_data['subject']);
                        });
            
                        
            
                        return redirect()->route('members.session.create')->with('info','註冊成功，請到信箱收取你的驗證連結.');

                    }

                    

                }
            
    

                }else{
                   return back()->with('fail','目前未成為公司客戶，欲知詳情請洽歐西瑪');
                }
         

             }
                

        }else{

            // 獲取同筆 ba01 值
            $ba01Value = $tbm01->ba01;

            if(strpos($ba01Value, 'C') === 0 || strpos($ba01Value, 'T') === 0){
                
                $company_ERP_id = $ba01Value;
                $stat_info = '';
                $identityPermValue = $request->identity_perm;

                $existingMemberIdentity1 = Member::where('company_tax_id', $companyTaxId)
                ->where('identity_perm', 1)
                ->first();
    
                $existingMemberIdentity2 = Member::where('company_tax_id', $companyTaxId)
                ->where('identity_perm', 2)
                ->first();
                $existingMemberIdentity3 = Member::where('company_ERP_id', $company_ERP_id)
                ->where('identity_perm', 3)
                ->where('stat_info','y')
                ->count();


                if($existingMemberIdentity1  && $request->identity_perm == 1){
                    // 如果已經存在相同 identity_perm 的記錄，且值不為 3，則不能重複註冊
                    return back()->with('fail', '該公司已有採購註冊，請重新選取其他身份');
                }elseif($existingMemberIdentity2  && $request->identity_perm == 2){
                    return back()->with('fail', '該公司已有廠長註冊，請重新選取其他身份');
                }
                else{


                    if ($existingMemberIdentity3 >= 10) {
                        return back()->with('fail', '超過限制，無法註冊新會員');
                    }else{

                    $member = Member::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'identity_perm' => $request->identity_perm,
                        'company_tax_id' => $companyTaxId,
                        'company_ERP_id' => $company_ERP_id,
                        'stat_info' => $stat_info,           
    
                    ]);
                    
        
                    $last_id = $member->id;
                    $token = $last_id.hash('sha256',\Str::random(120));
                    $verifyURL = route('verify',['token'=>$token,'service'=>'Email_verification']);
                    $verificationCode = \Str::random(6);
        
                    VerifyMember::create([
                        'user_id'=>$last_id,
                        'token'=>$token,
                        'verification_code'=>$verificationCode,
                    ]);
                    
                    $message = '親愛的 <b>'.$request->name.'</b><br>';
                    $message.= '感謝您的註冊，系統發送的驗證碼如下：';
        
                    $mail_data = [
                        'recipient'=>$request->email,
                        'fromEmail'=>$request->email,
                        'fromName'=>$request->name,
                        'subject'=>'會員註冊認證信',
                        'verification_code'=>$verificationCode,
                        'body'=> $message,
                        'actionLink'=>$verifyURL,
                    ];
        
                    \Mail::send('email-template',$mail_data,function($message)use($mail_data){
                        $message->to($mail_data['recipient'])
                                ->from($mail_data['fromEmail'],$mail_data['fromName'])
                                ->subject($mail_data['subject']);
                    });
        
                    
        
                    return redirect()->route('members.session.create')->with('info','註冊成功，請到信箱收取你的驗證連結.');

                };

                }

            }else{
                return back()->with('fail','目前未成為公司客戶，欲知詳情請洽歐西瑪');
            }    

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

    private function registerMember(Request $request)
    {
        $companyTaxId = $request->company_tax_id;
        $email = $request ->email;


        if($request->password === $request ->password_confirmation){

            
            $password=\Hash::make($request->password);
            // $member = Member::create([
            //     'name'=> $request->name,
            //     'email' => $request->email,
            //     'password' => $password,
            // ]);


            // 獲取選擇的職位名
            $selectedPositionValue = $request->input('contact_person_position');

            // 如果選擇的職位名為 “其他”，則獲取輸入的其他職位名
            if($selectedPositionValue== '5'){
                $otherPosition = $request->input('other_contact_person_position');
            }else{
                $positionMap = [
                    '1' => '廠長',
                    '2' => '組長',
                    '3' => '機修保養人',
                    '4' => '操作員',
                    '5' => '其他',
                ];

                $selectedPositionName = isset($positionMap[$selectedPositionValue]) ? $positionMap[$selectedPositionValue] : null;
                $otherPosition = $selectedPositionName;
            }


            

            $contactSoftwareType = $request->input('contact_software_type');
            $contactSoftwareId = $request->input('contact_software_data.software_id');
            
            if ($contactSoftwareType === '4') {
                // 如果選擇的是其他，將輸入的其他通訊軟體名稱存入
                $otherContactSoftwareType = $request->input('other_contact_software_type');
            
                $contactSoftwareData = [
                    'contact_software_type' => $otherContactSoftwareType,
                    'contact_software_id' => $contactSoftwareId,
                ];
            } else {
                // 如果選擇的不是其他，將原先 value 值對應的名稱存入
                $softwareTypes = [
                    '1' => 'Whats APP',
                    '2' => 'Line',
                    '3' => 'WeChat',
                    // 添加其他 value 值對應的名稱
                ];
            
                $selectedSoftwareType = isset($softwareTypes[$contactSoftwareType]) ? $softwareTypes[$contactSoftwareType] : null;
            
                $contactSoftwareData = [
                    'contact_software_type' => $selectedSoftwareType,
                    'contact_software_id' => $contactSoftwareId,
                ];
            }
            
            $contactSoftwareDataJson = json_encode($contactSoftwareData);


            

                        // 獲取
                        $selectedOtherPurchaseSourceValue = $request->input('other_purchase_source');

                        // 如果選擇的職位名為 “其他”，則獲取輸入的其他職位名
                        if($selectedOtherPurchaseSourceValue== '6'){
                            $otherPurchaseSource = $request->input('other_other_purchase_source');
                        }else{
                            $otherPurchaseMap = [
                                '1' => '製造商同業',
                                '2' => '代理商',
                                '3' => '貿易商',
                                '4' => '成衣廠',
                                '5' => '針車行',
                            ];
            
                            $selectedPurchaseSourceName = isset($otherPurchaseMap[$selectedOtherPurchaseSourceValue]) ? $otherPurchaseMap[$selectedOtherPurchaseSourceValue] : null;
                            $otherPurchaseSource = $selectedPurchaseSourceName;
                        }
            


            $member = Member::create([
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => $password,
                'identity_perm' => $request->identity_perm,
                'company_tax_id' => $companyTaxId,
                // 'phone' => $request->phone,


                //機器基本資料建檔
                // 'machine_purchase_date' => $request->machine_purchase_date,
                // 'machine_model' => $request->machine_model,
                // 'machine_serial' => $request->machine_serial,
                // 'installation_company_name' => $request->installation_company_name,
                // 'installation_company_address' => json_encode([
                //     'country' => $request->input('installation_company_address.installation_country'),
                //     'postal_code' => $request->input('installation_company_address.installation_postal_code'),
                //     'region' => $request->input('installation_company_address.installation_region'),
                //     'city' => $request->input('installation_company_address.installation_city'),
                //     'street' => $request->input('installation_company_address.installation_street'),
                // ]),
                // 'installation_vat_number' => $request->installation_vat_number,
                // 'installation_company_phone' => json_encode([
                //     [
                //         'country_code_1' => $request->input('installation_company_phone.country_code_1'),
                //         'area_code_1' => $request->input('installation_company_phone.area_code_1'),
                //         'phone_number_1' => $request->input('installation_company_phone.phone_ddnumber_1'),
                //     ],
                //     [
                //         'country_code_2' => $request->input('installation_company_phone.country_code_2'),
                //         'area_code_2' => $request->input('installation_company_phone.area_code_2'),
                //         'phone_number_2' => $request->input('installation_company_phone.phone_number_2'),
                //     ],
                //     [
                //         'country_code_3' => $request->input('installation_company_phone.country_code_3'),
                //         'area_code_3' => $request->input('installation_company_phone.area_code_3'),
                //         'phone_number_3' => $request->input('installation_company_phone.phone_number_3'),
                //     ],
                // ]),
                // 'installation_company_fax' => json_encode([
                //     'country_code' => $request->input('installation_company_fax.country_code'),
                //     'area_code' => $request->input('installation_company_fax.area_code'),
                //     'fax_number' => $request->input('installation_company_fax.fax_number'),
                // ]),
                // 'contact_person_position' => $otherPosition,
                // 'contact_person_name' => $request->contact_person_name,
                // 'contact_person_phone' => json_encode([
                //         'country_code' => $request->input('contact_person_phone.country_code'),
                //         'area_code' => $request->input('contact_person_phone.area_code'),
                //         'phone_number' => $request->input('contact_person_phone.phone_number'),
                //         'contact_extension' => $request->input('contact_person_phone.extension'),
                // ]),
                // 'contact_person_mobile' => $request->contact_person_mobile,
                // 'contact_person_email' => $request->contact_person_email,
                // 'contact_software_data' => $contactSoftwareDataJson,
                
                //購入來源
                // 'purchase_manufacturer' => $request->purchase_manufacturer,
                // 'purchase_manufacturer_person' => $request->purchase_manufacturer_person,
                // 'purchase_manufacturer_phone' => $request->purchase_manufacturer_phone,
                // 'other_purchase_source' => $otherPurchaseSource,
                // 'other_purchase_company' => $request->other_purchase_company,
                // 'other_purchase_company_name' => $request->other_purchase_company_name,
                // 'other_purchase_company_address' => json_encode([
                //     'country' => $request->input('other_purchase_company_address.country'),
                //     'postal_code' => $request->input('other_purchase_company_address.postal_code'),
                //     'region' => $request->input('other_purchase_company_address.region'),
                //     'city' => $request->input('other_purchase_company_address.city'),
                //     'street' => $request->input('other_purchase_company_address.street'),
                // ]),
                // 'other_purchase_tax_id' => $request->other_purchase_tax_id,
                // 'other_purchase_company_phone' => json_encode([
                //         'country_code' => $request->input('other_purchase_company_phone.country_code'),
                //         'area_code' => $request->input('other_purchase_company_phone.area_code'),
                //         'phone_number' => $request->input('other_purchase_company_phone.phone_number'),

                // ]),
                // 'other_purchase_name' => $request->other_purchase_name,
                // 'other_purchase_phone' => $request->other_purchase_phone,
                // 'other_purchase_description' => $request->other_purchase_description,
            ]);
            

            $last_id = $member->id;
            $token = $last_id.hash('sha256',\Str::random(120));
            $verifyURL = route('verify',['token'=>$token,'service'=>'Email_verification']);
            $verificationCode = \Str::random(6);

            VerifyMember::create([
                'user_id'=>$last_id,
                'token'=>$token,
                'verification_code'=>$verificationCode,
            ]);
            
            $message = '親愛的 <b>'.$request->name.'</b><br>';
            $message.= '感謝您的註冊，系統發送的驗證碼如下：';

            $mail_data = [
                'recipient'=>$request->email,
                'fromEmail'=>$request->email,
                'fromName'=>$request->name,
                'subject'=>'會員註冊認證信',
                'verification_code'=>$verificationCode,
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
                return redirect()->route('verification.password')
                       ->with('info','請輸入郵件驗證碼和新密碼！')
                       ->with('verifiedEmail',$user->email);

            }
            else{
                return back()->with('info','你已完成過信箱驗證，請直接登入');
            }
        }

    }


}
