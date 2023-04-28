<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
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
}
