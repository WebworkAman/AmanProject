<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\MemberAuth;
use App\Models\VerifyMember;
use App\Models\Member;
use App\Models\CRM_MainCust_Info;
use App\Models\CRM_Machines;
use App\Models\CRM_Machines_Contactlist;
use App\Models\Tfm01;
use App\Models\Tbm01;

use App\Notifications\MachineDataAdded;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
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

                    if($member->stat_info == 'y'){
                        session(['memberId' => $member->id]);

                        return redirect(MemberAuth::HOME_URL);
                    }else{
                        return back()->with('fail','您已經離職，如有需要，請洽註冊公司更改資料');
                    }

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
            'password'=>'required|min:5|max:18|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            // 'password_confirmation'=>'required',
        ],[
            'password.required' => '請填寫密碼',
            'password.string' => '密碼必須是文字',
            'password.min' => '密碼不能少於 :min 個字元',
            'password.max' => '密碼不能超過 :max 個字元',
            'password.confirmed' => '密碼確認不符',
            'password.regex' => '密碼至少要有一個英文及數字',
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
              $member -> stat_info = 'y';
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

    public function memberBasic(Request $request){
        $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
        $companyId = $member -> company_ERP_id;

        $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();



        return view('members.memberBasicData', compact('crmMainCustInfo','member'));
    }

    // public function company(Request $request){
    //     $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。

    //     return view('members.companyData', compact('member'));
    // }
    public function company($companyId){
        $member = MemberAuth::member();
        // $company_ERP_id = $request->query('company_ERP_id');
        $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();

        // if (!$crmMainCustInfo) {
        //     // 如果找不到對應的 CRM_MainCust_Info 資料，可以進行相應處理，例如返回錯誤頁面或提示訊息等
        //     return back()->with('error', '找不到相應的公司基本資料');
        // }



        return view('members.companyData', compact('crmMainCustInfo','member'));
    }
        // 處理編輯模式表單提交
    public function CompanyUpdate(Request $request){

            $companyId = $request->input('company_id');
            $company = CRM_MainCust_Info::findOrFail($companyId);

            $updateRules = [
                'company_name' => 'required',
                'company_address.country' => 'required',
                'company_address.region' => 'required',
                'company_address.city' => 'required',
                'company_address.street' => 'required',
                // 添加其他需要更新的欄位的驗證
            ];

            $updateValidator = Validator::make($request->all(), $updateRules);

            if ($updateValidator->fails()) {

                return back()
                    ->withErrors($updateValidator)
                    ->withInput()
                    ->with('editMode',true); //將editMode 變數傳遞回視圖
            }


            $companyAddress = [
                'country' => $request->input('company_address.country'),
                'postal_code' => $request->input('company_address.postal_code'),
                'region' => $request->input('company_address.region'),
                'city' => $request->input('company_address.city'),
                'street' => $request->input('company_address.street'),
            ];

            $member = MemberAuth::member();

            $member->update([
                'company_tax_id' => $request->input('company_tax_id'),
            ]);

            $company->update([
                'company_name' => $request->input('company_name'),
                // 在這裡更新其他資料，根據需要添加其他資料的更新
                'company_address' => $companyAddress,
                'company_tax_id' => $request->input('company_tax_id'),
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
                    'fax_number' => $request->input('company_fax.fax_number'),
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


            ]);

            return redirect()->route('memberBasic')->with('info','修改成功');
        }

        public function companyMemberList(Request $request){

            $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
            $companyId = $member -> company_ERP_id;

            $members = Member::where('company_ERP_id', $companyId)
            ->orderBy('identity_perm')
            ->get();
            $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();

            // 檢查該公司已經有多少會員
            $memberCount = Member::where('company_ERP_id', $companyId)->count();


            return view('members.CompanyMemberList', compact('members','crmMainCustInfo','memberCount','member'));
        }
        public function updateStatusView(Request $request){

            $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
            $companyId = $member -> company_ERP_id;

            $members = Member::where('company_ERP_id', $companyId)
            ->orderBy('identity_perm')
            ->get();
            $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();



            return view('members.updateStatus', compact('members','crmMainCustInfo'));
        }
        public function updateStatus(Request $request, $id) {

            $member = Member::find($id);
            if (!$member) {
                // 如果找不到該會員，可能需要進行處理（例如顯示錯誤信息）
                return back()->with('error', '找不到該會員');
            }

            $newIdentity = $request->input('identity_perm');

            // 檢查是否選擇了廠長或採購
            if($newIdentity == 1 || $newIdentity == 2){
                $existingMembersWithSameIdentity = Member::where('company_ERP_id',$member->company_ERP_id)
                ->where('stat_info','y')
                ->where('identity_perm',$newIdentity)
                ->where('id','!=',$id)
                ->count();

                if($existingMembersWithSameIdentity > 0){
                    // 已經有同樣身份的在職會員，不允許更新
                    // 可以返回錯誤訊息或做其他處理

                    return back()->with('error', '已經有同樣身份的在職會員，不允許更新');
                }else{
                    // 沒有同樣身份的在職會員，允許更新
                    $member->identity_perm = $newIdentity;
                    $member->stat_info = $request->input('stat_info');
                    $member->save();
                    // 其他處理
                }
            }else{
                // 非廠長或採購身份，直接更新
                $member->identity_perm = $newIdentity;
                $member->stat_info = $request->input('stat_info');
                $member->save();
                // 其他處理

            }

            return back()->with('success', '在職狀況已更新');
        }

    public function companyMembersDestroy(Member $member){
             $member->delete();

            return redirect()->route('members.updateStatusView')
                ->with('success', '會員刪除成功.');

        }


    public function companCreateShow($companyId){

                 $member = MemberAuth::member();

                 $companyId = $member -> company_ERP_id;

                 $tfm01 = Tfm01::where('fa04',$companyId)->first();
                 $tbm01 = Tbm01::where('ba01',$companyId)->first();

                 if($tfm01){
                     $fa03 = Carbon::parse($tfm01->fa03);
                     $currentDate = Carbon::now();
                     $yearsDifference = $currentDate->diffInYears($fa03);
                 }else{
                     $yearsDifference = null;
                 };


             return view('members.createCompanyData', compact('member','tbm01','yearsDifference'));
        }


    public function companyCreate(Request $request){
        $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。

        // 先檢查 company_address 是否存在於請求中

         $rules = [
            'company_name' => 'required',
            'company_address.country' => 'required',
            'company_address.region' => 'required',
            'company_address.city' => 'required',
            'company_address.street' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

            // 如果驗證失敗
        if ($validator->fails()) {


            return back()
                   ->withErrors($validator)  // 傳遞驗證錯誤訊息到視圖
                   ->withInput();  // 保留用戶的輸入值
        }else{

        $companyERPId = $member->company_ERP_id;
        $companyTaxId = $member->company_tax_id;
        $newCompanyId = $request->input('company_tax_id');

        //公司地址
        $companyAddress = [
            'country' => $request->input('company_address.country'),
            'postal_code' => $request->input('company_address.postal_code'),
            'region' => $request->input('company_address.region'),
            'city' => $request->input('company_address.city'),
            'street' => $request->input('company_address.street'),
        ];
        //公司電話
        $companyPhone = [
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
        ];
        //公司傳真
        $companyFax = [
            'country_code' => $request->input('company_fax.country_code'),
            'area_code' => $request->input('company_fax.area_code'),
            'fax_number' => $request->input('company_fax.phone_number'),
        ];
        //公司採購人員電話
        $companyPurchasePersonPhone = [
            'country_code' => $request->input('company_purchase_person_phone.purchase_country_code'),
            'area_code' => $request->input('company_purchase_person_phone.purchase_area_code'),
            'phone_number' => $request->input('company_purchase_person_phone.purchase_phone_number'),
            'purchase_extension' =>  $request->input('company_purchase_person_phone.purchase_extension'),
        ];


        $filteredCompanyAddress = array_filter($companyAddress); // 過濾掉空值
        $filteredCompanyPhone = array_filter($companyPhone); // 過濾掉空值
        $filteredCompanyFax = array_filter($companyFax); // 過濾掉空值
        $filteredCompanyPurchasePersonPhone = array_filter($companyPurchasePersonPhone); // 過濾掉空值

        $company = CRM_MainCust_Info::create([

            'company_ERP_id' => $companyERPId,
            'company_tax_id' => $newCompanyId,
            'company_name' => $request->company_name,

            'company_address' => !empty($filteredCompanyAddress) ? json_encode($filteredCompanyAddress) : null,

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

        ]);


        return redirect()->route('memberBasic')->with('info','修改成功');

        }




    }

    public function companyMachineList(Request $request){

        $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
        $companyId = $member -> company_ERP_id;

        $members = Member::where('company_ERP_id', $companyId)
        ->orderBy('identity_perm')
        ->get();

        $crmMachines = CRM_Machines::where('company_ERP_id', $companyId)->get();
        $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();



        return view('members.companyMachinesList', compact('members','crmMachines','member','crmMainCustInfo'));
    }

    public function companyMachineData(Request $request,$machine){

        $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
        $companyId = $member -> company_ERP_id;

        $members = Member::where('company_ERP_id', $companyId)
        ->orderBy('identity_perm')
        ->get();

        $crmMachines = CRM_Machines::where('company_ERP_id', $companyId)->get();
        $crmMachine = CRM_Machines::find($machine);
        $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();

        $crmMachinesContactlist = CRM_Machines_Contactlist::where('crm_machine_id',$machine)->get();

        return view('members.companyMachine', compact('members','crmMachine','member','crmMainCustInfo','crmMachines','crmMachinesContactlist'));
    }
    public function deleteCompanyMachine($machine)
{
    $crmMachine = CRM_Machines::findOrFail($machine);

    // 如果需要，您可以在這裡添加權限檢查或其他安全性措施

    // 刪除機器資料
    $crmMachine->delete();

    return redirect()->route('companyMachineList')
        ->with('success', '機器資料已成功刪除');
}

    public function editMachineContact($machine, $id){
         $member = MemberAuth::member(); // 獲取會員訊息，類似之前的操作
         $crmMachine = CRM_Machines::find($machine);
         $crmMachinesContact = CRM_Machines_Contactlist::findOrFail($id);

         return view('members.editMachineContact', compact('crmMachine', 'crmMachinesContact'));
     }

    public function updateMachineContact(Request $request, $machine, $id){

        $crmMachinesContact = CRM_Machines_Contactlist::findOrFail($id);

         // 更新聯絡人資料
         $crmMachinesContact->update([
             // 其他欄位...
             'contact_person_position' => $request->contact_person_position,
             'other_contact_person_position' => $request->other_contact_person_position,
             'contact_person_name' => $request->contact_person_name,
             'contact_person_phone' => json_encode([
               'country_code' => $request->input('contact_person_phone.country_code'),
               'postal_code' => $request->input('contact_person_phone.postal_code'),
               'phone_number' => $request->input('contact_person_phone.phone_number'),
               'extension' => $request->input('contact_person_phone.extension'),
           ]),
             'contact_person_mobile' => $request->contact_person_mobile,
             'contact_person_email' => $request->contact_person_email,
             'contact_commu_software' => json_encode([
             'type' => $request->input('contact_software_type'),
             'id'   => $request->input('contact_software_data.software_id'),
           ]),
         ]);

         return redirect()->route('companyMachineData', ['machine' => $machine])
             ->with('success', '機器聯絡人已成功更新');
     }

    public function MachinesContactDestroy($machine, $id)
    {
        // 使用 $machine 和 $id 進行刪除操作
        $crmMachineContact = CRM_Machines_Contactlist::findOrFail($id);
        $crmMachineContact->delete();

        // return redirect()->back()->with('success', '聯絡人已刪除');
        return redirect()->route('companyMachineData', ['machine' => $machine])
                     ->with('success', '聯絡人已成功刪除');


    }

    public function companyMachineUpdateView(Request $request,$machine){

        $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
        $companyId = $member -> company_ERP_id;

        $members = Member::where('company_ERP_id', $companyId)
        ->orderBy('identity_perm')
        ->get();

        $crmMachines = CRM_Machines::where('company_ERP_id', $companyId)->get();
        $crmMachine = CRM_Machines::find($machine);
        $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();

        $crmMachinesContactlist = CRM_Machines_Contactlist::where('crm_machine_id',$machine)->get();

        return view('members.companyMachineUpdate', compact('members','crmMachine','member','crmMainCustInfo','crmMachines','crmMachinesContactlist'));
    }
    public function companyMachineUpdate(Request $request,$machine){

        $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
        $companyId = $member -> company_ERP_id;

        $members = Member::where('company_ERP_id', $companyId)
        ->orderBy('identity_perm')
        ->get();

        $crmMachines = CRM_Machines::where('company_ERP_id', $companyId)->get();
        $crmMachine = CRM_Machines::find($machine);

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


        $crmMachine->update([

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

            'installation_company_country' => $request->installation_company_address['installation_country'],
            'installation_company_postal_code' => $request->installation_company_address['installation_postal_code'],
            'installation_company_region' => $request->installation_company_address['installation_region'],
            'installation_company_city' => $request->installation_company_address['installation_city'],
            'installation_company_street' => $request->installation_company_address['installation_street'],

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


            //購入來源
            'purchase_manufacturer' => $request->purchase_manufacturer,
            'purchase_manufacturer_person' => $request->purchase_manufacturer_person,
            'purchase_manufacturer_phone' => $request->purchase_manufacturer_phone,

            'other_purchase_source' => $otherPurchaseSource,
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

        return redirect()->route('companyMachineData',$machine)->with('info','修改成功');
    }

    public function MachineContactAdd(Request $request,$machine){

        $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
        $companyId = $member -> company_ERP_id;

        $members = Member::where('company_ERP_id', $companyId)
        ->orderBy('identity_perm')
        ->get();

        $crmMachines = CRM_Machines::where('company_ERP_id', $companyId)->get();
        $crmMachine = CRM_Machines::find($machine);
        $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();

        $selectedOtherPurchaseSourceValue = $request->input('contact_person_position');

        // 如果選擇的職位名為 “其他”，則獲取輸入的其他職位名
        if($selectedOtherPurchaseSourceValue== '5'){
            $otherPurchaseSource = $request->input('other_contact_person_position');
        }else{
            $otherPurchaseMap = [
                '1' => '廠長',
                '2' => '組長',
                '3' => '機修保養人',
                '4' => '操作員',
            ];

            $selectedPurchaseSourceName = isset($otherPurchaseMap[$selectedOtherPurchaseSourceValue]) ? $otherPurchaseMap[$selectedOtherPurchaseSourceValue] : null;
            $otherPurchaseSource = $selectedPurchaseSourceName;
        }


        $selectedSoftwareType = $request->input('contact_software_type');

        // 如果選擇的職位名為 “其他”，則獲取輸入的其他職位名
        if($selectedSoftwareType == '4'){
            $otherSoftwareType = $request->input('other_contact_software_type');
        }else{
            $otherSoftwareTypeMap = [
                '1' => 'Whats App',
                '2' => 'Line',
                '3' => 'WeChat',
            ];

            $selectedSoftwareTypeName = isset($otherSoftwareTypeMap[$selectedSoftwareType]) ? $otherSoftwareTypeMap[$selectedSoftwareType] : null;
            $otherSoftwareType = $selectedSoftwareTypeName;
        }

        $request->validate([
            'contact_person_name'=>'required',
        ]);

        $crmMachinesContactlist = CRM_Machines_Contactlist::create([

              'crm_machine_id' => $machine,
              'contact_person_position' => $request->contact_person_position,
              'other_contact_person_position' => $request->other_contact_person_position,
              'contact_person_name' => $request->contact_person_name,
              'contact_person_phone' => json_encode([
                'country_code' => $request->input('contact_person_phone.country_code'),
                'postal_code' => $request->input('contact_person_phone.postal_code'),
                'phone_number' => $request->input('contact_person_phone.phone_number'),
                'extension' => $request->input('contact_person_phone.extension'),
            ]),
              'contact_person_mobile' => $request->contact_person_mobile,
              'contact_person_email' => $request->contact_person_email,
              'contact_commu_software' => json_encode([
              'type' => $otherSoftwareType,
              'id'   => $request->input('contact_software_data.software_id'),
            ]),

        ]);


        return redirect()->route('companyMachineData',$machine)->with('info','新增成功');
    }

    public function companyMachineAdd(Request $request){

        $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
        $companyId = $member -> company_ERP_id;

        $members = Member::where('company_ERP_id', $companyId)
        ->orderBy('identity_perm')
        ->get();

        $crmMachines = CRM_Machines::where('company_ERP_id', $companyId)->get();
        $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();


        return view('members.companyMachineAdd', compact('members','crmMachines','member','crmMainCustInfo'));
    }


    public function companyMachineAddPost(Request $request){

        $member = MemberAuth::member(); // 使用 MemberAuth::member() 獲取已驗證會員訊息。
        $companyId = $member -> company_ERP_id;
        $companyTaxId = $member->company_tax_id;

        $crmMachines = CRM_Machines::where('company_ERP_id', $companyId)->get();
        $crmMainCustInfo = CRM_MainCust_Info::where('company_ERP_id', $companyId)->first();
        $statInfo = 'y';


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


        $companyMachine = CRM_Machines::create([

            'company_ERP_id' => $companyId,
            'company_tax_id' => $companyTaxId,

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

            // 'installation_company_country' => $request->input('installation_company_address.installation_country'),
            // 'installation_company_postal_code' => $request->input('installation_company_address.installation_postal_code'),
            // 'installation_company_region' => $request->input('installation_company_address.installation_region'),
            // 'installation_company_city' => $request->input('installation_company_address.installation_city'),
            // 'installation_company_street' => $request->input('installation_company_address.installation_street'),


            'installation_company_country' => $request->installation_company_address['installation_country'],
            'installation_company_postal_code' => $request->installation_company_address['installation_postal_code'],
            'installation_company_region' => $request->installation_company_address['installation_region'],
            'installation_company_city' => $request->installation_company_address['installation_city'],
            'installation_company_street' => $request->installation_company_address['installation_street'],

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


            //購入來源
            'purchase_manufacturer' => $request->purchase_manufacturer,
            'purchase_manufacturer_person' => $request->purchase_manufacturer_person,
            'purchase_manufacturer_phone' => $request->purchase_manufacturer_phone,

            'other_purchase_source' => $otherPurchaseSource,
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
            'stat_info' => $statInfo,
        ]);

        // 發送郵件通知給系統管理者
        $adminEmail = 'aman@oshima.com.tw'; // 系統管理者的郵件地址
        Notification::route('mail', $adminEmail)->notify(new MachineDataAdded($companyMachine));


        return redirect()->route('companyMachineList')->with('info','新增成功');
    }



}
