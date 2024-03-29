<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Member;
use App\Models\Message;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\MemberPermission;
use App\Models\CRM_Machines;


class FAQController extends Controller
{

    public function createSearch(Request $request)
    {

         $products = Product::all();


    return view('layouts.search-show', ['products'=> $products]);
    // return view('layouts.search-show', ['results'=> $results]);
    }
    public function search(Request $request)
    {
    $product = $request->input('product_id');
    $keyword = $request->input('keyword');
    // 根據關鍵字搜尋產品名稱列表
    // $faqs = FAQ::where('question', 'like', '%'.$keyword.'%')->get();
    // $products = Product::all();

    if (empty($product) && empty($keyword)) {
        return redirect()->back()->with('error', '請至少輸入一個選項 ✎ ');
    }
    $faqs = FAQ::query();

    if($product){

        //判斷會員是否有該產品權限
        $memberId = session()->get('memberId');
        $hasPermission = MemberPermission::where('member_id', $memberId)
             ->where('product_id',$product)
             ->exists();
        if($hasPermission){
            $faqs->where('product_id',$product);
         }else {
            $faqs->where('product_id', null); // 將搜尋條件設為 null，以確保不會返回任何結果
        }
    }

    if($keyword){
        $faqs->where('question', 'like', '%'.$keyword.'%');
    }

    $results = $faqs->get();
    $products = Product::all(); // 获取所有产品

    // return view('layouts.search-show', ['faqs' => $faqs,'products'=> $products]);
    return view('layouts.search-show', ['results'=> $results,'products' => $products]);
    }

    //----------------------------- 禁止進入權限
    public function forbid(){
        return view("layouts.forbid");
    }
    //----------------------------- 驗布系列
    public function OC40N02(){

        $memberId = session()->get('memberId');
        $id = 1;
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 1)->get();

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        if($hasPermission == $id){
            return view('product.FAQ.inspection.OC40N02', compact('faqs','machines')) ;

        }else{
             // 沒有權限，顯示訊息
             return view('layouts.forbid');
        }



    }
    public function OC1(){
        $memberId = session()->get('memberId');
        $id = 2;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 2)->get();


        if($hasPermission == $id){
            return view('product.FAQ.inspection.OC1', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    public function OC5B(){
        $memberId = session()->get('memberId');
        $id = 3;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 3)->get();


        if($hasPermission == $id){
            return view('product.FAQ.inspection.OC5B', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    public function OC83(){
        $memberId = session()->get('memberId');
        $id = 4;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 4)->get();


        if($hasPermission == $id){

            return view('product.FAQ.inspection.OC83', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    //----------------------------- 鬆布系列
    public function UW2(){
        $memberId = session()->get('memberId');
        $id = 5;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 5)->get();

        if($hasPermission == $id){
            return view('product.FAQ.relaxing.UW2', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    public function UW2S(){
        $memberId = session()->get('memberId');
        $id = 6;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 6)->get();


        if($hasPermission == $id){
             return view('product.FAQ.relaxing.UW2S', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    public function OC100(){
        $memberId = session()->get('memberId');
        $id = 7;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 7)->get();


        if($hasPermission == $id){
             return view('product.FAQ.relaxing.OC100', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    public function OSP2000II(){
        $memberId = session()->get('memberId');
        $id = 8;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 8)->get();

        if($hasPermission == $id){
            return view('product.FAQ.relaxing.OSP2000II', compact('faqs')) ;
        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    public function OSP2008(){
        $memberId = session()->get('memberId');
        $id = 9;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 9)->get();


        if($hasPermission == $id){
            return view('product.FAQ.relaxing.OSP2008', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    //----------------------------- 拉布系列
    public function M190G(){
        $memberId = session()->get('memberId');
        $id = 10;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 10)->get();


        if($hasPermission == $id){
            return view('product.FAQ.spreading.M190G', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    public function J3(){
        $memberId = session()->get('memberId');
        $id = 11;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 11)->get();


        if($hasPermission == $id){
            return view('product.FAQ.spreading.J3', compact('faqs')) ;
        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    public function KPro(){
        $memberId = session()->get('memberId');
        $id = 12;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 12)->get();


        if($hasPermission == $id){
            return view('product.FAQ.spreading.KPro', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    public function KProLite(){
        $memberId = session()->get('memberId');
        $id = 13;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 13)->get();


        if($hasPermission == $id){
             return view('product.FAQ.spreading.KProLite', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
    // public function F8(){
    //     $memberId = session()->get('memberId');
    //     $id = 14;
    //     //檢查權限
    //     $hasPermission = MemberPermission::where('member_id',$memberId)
    //                   ->where('product_id',$id)->exists();

    //     $faqs = FAQ::where('product_id', 14)->get();


    //     if($hasPermission == $id){
    //          return view('product.FAQ.spreading.F8', compact('faqs')) ;

    //     }else{
    //          // 没有权限，显示提示信息
    //          return view('layouts.forbid');
    //     }
    // }
    public function T5(){
        $memberId = session()->get('memberId');
        $id = 14;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 14)->get();


        if($hasPermission == $id){
            return view('product.FAQ.spreading.T5', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }

    public function K5(){
        $memberId = session()->get('memberId');
        $id = 44;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 44)->get();


        if($hasPermission == $id){
            return view('product.FAQ.spreading.K5', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }
    }
     //----------------------------- 裁剪系列
     public function OneCut(){
        $memberId = session()->get('memberId');
        $id = 15;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 15)->get();

        if($hasPermission == $id){
            return view('product.FAQ.cutting.OneCut', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
    public function M6S(){
        $memberId = session()->get('memberId');
        $id = 16;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 16)->get();


        if($hasPermission == $id){
             return view('product.FAQ.cutting.M6S', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
        public function OC510(){
        $memberId = session()->get('memberId');
        $id = 17;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 17)->get();


        if($hasPermission == $id){
             return view('product.FAQ.cutting.OC510', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
    public function TAC(){
        $memberId = session()->get('memberId');
        $id = 18;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 18)->get();


        if($hasPermission == $id){
             return view('product.FAQ.cutting.TAC', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }

    public function OB90(){
        $memberId = session()->get('memberId');
        $id = 20;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 20)->get();


        if($hasPermission == $id){
             return view('product.FAQ.cutting.OB90', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
    public function A100U(){
        $memberId = session()->get('memberId');
        $id = 21;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 21)->get();


        if($hasPermission == $id){
             return view('product.FAQ.cutting.A100U', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
    public function LU933(){
        $memberId = session()->get('memberId');
        $id = 22;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 22)->get();

        if($hasPermission == $id){
             return view('product.FAQ.cutting.LU933', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
    public function OB700A(){
        $memberId = session()->get('memberId');
        $id = 23;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 23)->get();


        if($hasPermission == $id){
             return view('product.FAQ.cutting.OB700A', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
     //----------------------------- 整燙系列
     public function OP800SDS(){
        $memberId = session()->get('memberId');
        $id = 24;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 24)->get();


        if($hasPermission == $id){
             return view('product.FAQ.ironing.OP800SDS', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
    public function OP87(){
        $memberId = session()->get('memberId');
        $id = 25;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 25)->get();


         if($hasPermission == $id){
             return view('product.FAQ.ironing.OP87', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
    public function OP302(){
        $memberId = session()->get('memberId');
        $id = 26;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 26)->get();


        if($hasPermission == $id){
             return view('product.FAQ.ironing.OP302', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }

     //----------------------------- 轉印系列

     public function OP10A5(){
        $memberId = session()->get('memberId');
        $id = 27;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 27)->get();


         if($hasPermission == $id){
             return view('product.FAQ.heatTransfer.OP10A5', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
    public function OP380A(){
        $memberId = session()->get('memberId');
        $id = 28;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 28)->get();


        if($hasPermission == $id){
             return view('product.FAQ.heatTransfer.OP380A', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
    public function OP15A(){
        $memberId = session()->get('memberId');
        $id = 29;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

        $faqs = FAQ::where('product_id', 29)->get();


        if($hasPermission == $id){
             return view('product.FAQ.heatTransfer.OP15A', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

    }
         //----------------------------- 黏合系列

     public function OP450GS(){
        $memberId = session()->get('memberId');
        $id = 30;
        //檢查權限
        $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

            $faqs = FAQ::where('product_id', 30)->get();


        if($hasPermission == $id){
             return view('product.FAQ.fusingPress.OP450GS', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

        }
        public function OP1200NL(){
            $memberId = session()->get('memberId');
            $id = 31;
             //檢查權限
            $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

            $faqs = FAQ::where('product_id', 31)->get();


            if($hasPermission == $id){
                return view('product.FAQ.fusingPress.OP1200NL', compact('faqs')) ;

            }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
            }

             }
        public function OP1400(){
            $memberId = session()->get('memberId');
            $id = 32;
            //檢查權限
            $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

            $faqs = FAQ::where('product_id', 32)->get();


                if($hasPermission == $id){
                    return view('product.FAQ.fusingPress.OP1400', compact('faqs')) ;

                }else{
                    // 没有权限，显示提示信息
                    return view('layouts.forbid');
        }
        }

        public function OP900A(){
            $memberId = session()->get('memberId');
            $id = 46;
             //檢查權限
            $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

            $faqs = FAQ::where('product_id', 46)->get();


            if($hasPermission == $id){
                return view('product.FAQ.fusingPress.OP900A', compact('faqs')) ;

            }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
            }

             }

        //----------------------------- 黏合系列

         public function MB9018B(){
            $memberId = session()->get('memberId');
            $id = 33;
            //檢查權限
            $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

            $faqs = FAQ::where('product_id', 33)->get();

        if($hasPermission == $id){
             return view('product.FAQ.seamless.MB9018B', compact('faqs')) ;

        }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
        }

        }
        public function OP114(){
            $memberId = session()->get('memberId');
            $id = 34;
            //檢查權限
            $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

            $faqs = FAQ::where('product_id', 34)->get();
            return view('product.FAQ.seamless.OP114', compact('faqs')) ;
                    if($hasPermission == $id){
            return view('product.FAQ.inspection.OC1', compact('faqs')) ;

            }else{
                // 没有权限，显示提示信息
             return view('layouts.forbid');
            }

            }
        public function OP114S(){
            $memberId = session()->get('memberId');
            $id = 35;
            //檢查權限
            $hasPermission = MemberPermission::where('member_id',$memberId)
                      ->where('product_id',$id)->exists();

            $faqs = FAQ::where('product_id', 35)->get();


            if($hasPermission == $id){
             return view('product.FAQ.seamless.OP114S', compact('faqs')) ;

            }else{
             // 没有权限，显示提示信息
             return view('layouts.forbid');
            }

           }
           //----------------------------- 金屬、重量檢測系列
                //----------------------------- 成衣
                public function ON688CD5(){
                    $memberId = session()->get('memberId');
                    $id = 45;
                    //檢查權限
                    $hasPermission = MemberPermission::where('member_id',$memberId)
                              ->where('product_id',$id)->exists();

                    $faqs = FAQ::where('product_id', 45)->get();


                    if($hasPermission == $id){
                     return view('product.FAQ.needleWeighing.clothing.ON688CD5', compact('faqs')) ;

                    }else{
                     // 没有权限，显示提示信息
                     return view('layouts.forbid');
                    }

                   }

    // 管理者
    public function index()
    {

        return view('admin.index');
    }

    public function edit(FAQ $faq)
    {
        return view('admin.edit', compact('faq'));
    }
    public function update(Request $request, FAQ $faq)
    {
    $validatedData = $request->validate([
        'question' => 'required|max:255',
        'answer' => 'required',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'video' => 'nullable|mimes:mp4,mov,avi,mpeg',
    ]);

    $faq->question = $request->input('question');
    $faq->answer = $request->input('answer');

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('public/photos');
        $faq->photo = $photoPath;
    }

    if ($request->hasFile('video')) {
        $videoPath = $request->file('video')->store('public/videos');
        $faq->video = $videoPath;
    }

    $faq->save();

    return redirect()->route('faqList')
        ->with('success', '常見問題更新成功.');
     }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi,mpeg|max:20480',
        ],[
            'video.max' => '附加影片超過限制大小',
        ]);

        $productIds = $request->input('product_id');
        $hasError = false;

        foreach($productIds as $productId){

            $faq = new FAQ;
            $faq -> product_id = $productId;
            $faq -> question = $request->input('question');
            $faq -> answer = $request-> input('answer');

            if($request->hasFile('photo')){
                $photoPath = $request->file('photo')->store('public/photos');
                $faq->photo = $photoPath;
            }

            if($request->hasFile('video')){
                if($request->file('video')->isValid()){
                    $hasError = true;
                    break; // 驗證失敗,停止迴圈
                }


                $videoPath = $request->file('video')->store('public/videos');
                $faq->video = $videoPath;

                $faq->save();
            }

            if($hasError){
                return redirect()->back()->withErrors(['video' => '影片上傳失敗']);
            }else{
                return redirect()->route('faqList', $productId) // 修改這行
                ->with('success', '常見問題建立成功.');
            }



        }



        // return redirect()->route('faqs.index', $faq->id)
        //     ->with('success', '常見問題建立成功.');
    }
    public function delete(Request $request, $id)
    {
        // 獲取表單數據
        $data = $request->all();

        // 將表單數據存儲在cookie中
        $cookie = cookie('form_data', json_encode($data), 30);

        // 執行刪除操作
        $faq = Faq::find($id);
        $faq->delete();

        // 返回上一頁，並附帶cookie
        return redirect()->back()->withCookie($cookie);
    }



    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect()->route('faqList')
            ->with('success', '常見問題刪除成功.');
    }
}
