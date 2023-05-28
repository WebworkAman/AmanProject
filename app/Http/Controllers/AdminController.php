<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use App\Models\FAQ;
use App\Models\Question;
use App\Models\Member;
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
    public function memberCreate(){

        $members = Member::all();
        return view('admin.Member.member-create', compact('members')) ;
    }
    public function showSetPermissions($memberId){
        
        $member = Member::find($memberId);
        $products = Product::all();
        $memberPermissions = $member->permissions->pluck('product_id')->toArray();

        return view('admin.Member.member-permissions', compact('member','products','memberPermissions')) ;
    }

    public function destroy(Member $member)
    {
         $member->delete();
    
        return redirect()->route('faqs.index')
            ->with('success', 'member deleted successfully.');
         
    }
}
