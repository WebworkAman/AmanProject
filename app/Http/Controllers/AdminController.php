<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use App\Models\FAQ;
use App\Models\Question;
use App\Models\Member;
use App\Models\Setting;
use App\Models\Tbm10;
use App\Models\MaintenanceRecord;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    private static $admin = null;

    public static function admin(){

        // `self::$member`可能為 null，因此 `empty` 應該改成 `is_null`，這樣會更加清晰。

        if(is_null(self::$admin) && session()->exists('adminId')){
            self::$admin = Admin::find(session('adminId'));
        }
        return self::$admin;
    }
    public function index(){
        $products = Product::all();
        return view('admin.index', compact('products'));
    }
    public function create(){
       

        return view('admin.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $admin = Admin::where([
            'email' => $request->email,
            'password'=>$request->password
        ])->first();

        if(!empty($admin)){
            return redirect('admin/index');
        }
        return back()->with('fail','帳號/密碼輸入錯誤');
    }
    public static function isLoggedIn(){
        return !empty(self::admin());
 
        // return !empty(self::$member);
        // 如果這樣寫會有問題
    }
    
    public function delete()
    {
        session()->forget('adminId');
        
        // self::$admin = null;
        return redirect()->route('login');
    }
    public function Setting(){

        $emailAddress = Setting::findOrFail(1) -> email_address;

        return view('admin.Setting.Setting', compact('emailAddress'));
    }
    public function submitMail(Request $request)
    {
        $validateData = $request->validate([
            'email_address' => 'required|email',
        ]);

        // $setting = new Setting;
        // $setting->email_address = $request -> input('email_address');
        // $setting->save();

        $setting = Setting::first(); //假設 Setting 模型代表信箱設定的資料表，使用 first 方法獲取第一筆資料。

        if($setting){
            $setting->email_address = $request -> input('email_address');
            $setting->save();
        }else{
            Setting::create(['email_address'=> $request->input('email_address')]);
        }

        
        return redirect()->back()->with('success','收信信箱已儲存');
    }
    
    public function faqList(){

        $faqs = FAQ::all();
        $products = Product::all();

        return view('admin.FAQ.faq-list', compact('faqs','products'));
    }
    public function QuestionList(){

        $questions = Question::all();
        $products = Product::all();
        return view('admin.Question.question-list', compact('questions','products'));
    }
     public function memberList(){

        $members = Member::all();
        return view('admin.Member.member-list', compact('members')) ;
    }
    public function ERP_List(){
        ini_set('memory_limit', '512M');

        $tbm10Data = Tbm10::paginate(10);
    
        return view('admin.ERP.ERP-list', compact('tbm10Data'));
    }
    public function Maintenance_List(){

        $maintenanceRecords = MaintenanceRecord::all();
         
        return view('admin.Maintenance.Mainten_list', compact('maintenanceRecords'));
    }
    public function Maintenance_create(){
         
        return view('admin.Maintenance.Mainten_create');
    }
    public function Maintenance_check(MaintenanceRecord $maintenanceRecord)
    {
        return view('admin.Maintenance.Mainten_check', compact('maintenanceRecord'));
    }
    public function Maintenance_store(Request $request){

        //驗證輸入
        $validateData = $request->validate([
            'customer_name' => 'required',
            'factory' => 'required',
            'equipment_model' => 'required',
            'purchase_date' => 'required|date',
            'serial_number' => 'required',
            'installation_date' => 'required|date',
            'maintenance_date' => 'required|date',
            'description' => 'required',
            'maintenance_content' => 'required',
            'quantity' => 'required|numeric',
            'maintenance_personnel' => 'required',
        ]);

        //建立維修履歷
        $maintenanceRecord = MaintenanceRecord::create($validateData);

        // 重定向或其他操作
        return redirect('admin/index')->with('success', '維修履歷已成功建立');
    }
    public function Maintenance_destroy(MaintenanceRecord $maintenanceRecord)
    {
         $maintenanceRecord->delete();
    
        return redirect()->back()
            ->with('success', '刪除成功.');
         
    }

    public function memberCreate(){


        return view('admin.Member.member-create') ;
    }
    public function showSetPermissions($memberId){
        
        $member = Member::find($memberId);
        $products = Product::all();
        $memberPermissions = $member->permissions->toArray();

        return view('admin.Member.member-permissions', compact('member','products','memberPermissions')) ;
    }

    public function updateMemberPermissions(Request $request, $memberId){

        $member = Member::find($memberId);
        $productIds = $request->input('products',[]);

        // 刪除舊的關聯
        $member->permissions()->detach();
        // $memberPermissions = new MemberPermissions;
        

            // 逐一建立新的關聯
        foreach ($productIds as $productId) {
            $member->permissions()->attach($productId);
           }


        // //逐一更新權限
        // foreach($productIds as $productId){
        //     $memberPermissions -> member_id = $member;
        //     $memberPermissions -> product_id = $productId;
        //     $memberPermissions ->save();
        // }

                // 提交成功後的訊息
                $message = '權限更新成功！';

                //將訊息儲存到 Session 中
                $request -> session()->flash('success',$message);
        
                // $url = url()->previous(); // 取得當前頁面的 URL
                // return redirect($url); // 重新導向當前頁面
        
                
                
         
         
        
     

        // return redirect()->back()->with('success', '權限更新成功');
        // 重新導向回當前頁面並顯示成功訊息
        return redirect()->route('faqs.index')
            ->with('success', $message);
    }

    public function destroy(Member $member)
    {
         $member->delete();
    
        return redirect()->route('faqs.index')
            ->with('success', '會員刪除成功.');
         
    }
}
