<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Message;
use App\Models\Product;
use App\Models\Question;
use App\Models\CRM_Machines;

class ViewController extends Controller
{

    // <*--------  驗布 -----------*>

    public function __invoke(){

        return view('product/category/inspection/OC40N02');
        // -> with('questions','machines',Question::all());
    }
    function OC1(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 2)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 2) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',2)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/inspection/OC1', compact('questions','machines','products')) ;
    }
    function OC5B(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 3)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 3) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',3)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/inspection/OC5B', compact('questions','machines','products')) ;
    }
    function OC83(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 4)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 4) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',4)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/inspection/OC83', compact('questions','machines','products')) ;
    }

    // <*--------  鬆布 -----------*>

    function UW2(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 5)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 5) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',5)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/relaxing/UW2', compact('questions','machines','products')) ;
    }

    function UW2S(){

        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 6)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 6) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',6)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/relaxing/UW2S', compact('questions','machines','products')) ;
    }

    function OC100(){

        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 7)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 7) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',7)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/relaxing/OC100', compact('questions','machines','products')) ;

    }

    function OSP2000II(){

        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 8)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 8) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',8)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/relaxing/OSP2000II', compact('questions','machines','products')) ;

    }

    function OSP2008(){

        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 9)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 9) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',9)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/relaxing/OSP2008', compact('questions','machines','products')) ;

    }

    // <*--------  拉布 -----------*>

    function M190G(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 10)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 10) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',10)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/spreading/M190G', compact('questions','machines','products')) ;
    }
    function J3(Request $request){

        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 11)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 11) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',11)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

            return view('product/category/spreading/J3', compact('questions','machines','products')) ;
        }

    function KPro(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 12)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 12) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',12)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

            return view('product/category/spreading/KPro', compact('questions','machines','products')) ;
    }

    function KProLite(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 13)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 13) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',13)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/spreading/KProLite', compact('questions','machines','products')) ;
    }

    // function F8(){
    //     $questions = Question::where('product_id', 14)->get();
    //     return view('product/category/spreading/F8', compact('questions','machines')) ;
    // }

    function T5(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 14)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 14) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',14)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/spreading/T5', compact('questions','machines','products')) ;
    }

    function K5(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 44)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 44) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',44)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/spreading/K5', compact('questions','machines','products')) ;
    }

     // <*--------  裁剪 -----------*>

    function OneCut(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 15)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 15) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',15)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/cutting/OneCut', compact('questions','machines','products'));
    }

    function M6S(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 16)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 16) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',16)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/cutting/M6S', compact('questions','machines','products'));
    }

    function TAC(){

        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 18)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 18) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',18)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/cutting/TAC', compact('questions','machines','products'));
    }

    function OC510(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 19)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 19) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',19)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/cutting/OC510', compact('questions','machines','products'));
    }

    function OB90(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 20)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 20) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',20)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/cutting/OB90', compact('questions','machines','products'));
    }

    function A100U(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 21)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 21) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',21)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/cutting/A100U', compact('questions','machines','products'));
    }

    function LU933(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 22)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 22) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',22)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/cutting/LU933', compact('questions','machines','products'));
    }

    function OB700A(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 23)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 23) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',23)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/cutting/OB700A', compact('questions','machines','products'));
    }

    // <*--------  整燙定型 -----------*>

    function OP800SDS(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 24)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 24) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',24)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/ironing/OP800SDS', compact('questions','machines','products'));
    }

    function OP87(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 25)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 25) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',25)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/ironing/OP87', compact('questions','machines','products'));
    }

    function OP302(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 26)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 26) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',26)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/ironing/OP302', compact('questions','machines','products'));
    }

    function OP301(){
        return view('product/category/ironing/OP301');
    }

    function OP122A(){
        return view('product/category/ironing/OP122A');
    }

    function OP500(){
        return view('product/category/ironing/OP500')
        ;
    }

    function OP606(){
        return view('product/category/ironing/OP606')
        ;
    }

    function OP120T(){
        return view('product/category/ironing/OP120T')
        ;

    }

    function OP535(){
        return view('product/category/ironing/OP535')
        ;
    }

    function OP565(){
        return view('product/category/ironing/OP565')
        ;
    }

    function OP5881(){
        return view('product/category/ironing/OP5881')
        ;
    }

    function OP5851(){
        return view('product/category/ironing/OP5851')
        ;
    }
    // <*--------  轉印 -----------*>

    function OP10A5(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 27)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 27) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',27)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/heatTransfer/OP10A5', compact('questions','machines','products'));
    }

    function OP380A(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 28)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 28) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',28)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/heatTransfer/OP380A', compact('questions','machines','products'));
    }

    function OP15A(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 29)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 29) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',29)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/heatTransfer/OP15A', compact('questions','machines','products'));
    }

    function OP305S(){
        return view('product/category/heatTransfer/OP305S')
        ;
    }

    function OP15A4(){
        return view('product/category/heatTransfer/OP15A4')
        ;
    }

    function OS5R(){
        return view('product/category/heatTransfer/OS5R')
        ;
    }

    function OP54A(){
        return view('product/category/heatTransfer/OP54A')
        ;
    }

    function OP251(){
        return view('product/category/heatTransfer/OP251')
        ;
    }

    function OP105A(){
        return view('product/category/heatTransfer/OP105A')
        ;
    }

    function OP38AII(){
        return view('product/category/heatTransfer/OP38AII')
        ;
    }

    function OP5288(){
        return view('product/category/heatTransfer/OP5288')
        ;
    }

    // <*--------  黏合 -----------*>

    function OP450GS(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 30)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 30) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',30)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/fusingPress/OP450GS', compact('questions','machines','products'));
    }

    function OP1200NL(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 31)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 31) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',31)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/fusingPress/OP1200NL', compact('questions','machines','products'));
    }

    function OP1400(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 32)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 32) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',32)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/fusingPress/OP1400', compact('questions','machines','products'));
    }

    function OP1000NE(){
        return view('product/category/fusingPress/OP1000NE')
        ;
    }

    function OP600N(){
        return view('product/category/fusingPress/OP600N')
        ;
    }

    function OP60LN(){
        return view('product/category/fusingPress/OP60LN')
        ;
    }

    function OP600SP(){
        return view('product/category/fusingPress/OP600SP')
        ;
    }

    function OP100LE(){
        return view('product/category/fusingPress/OP100LE')
        ;
    }

    function OP600SPII(){
        return view('product/category/fusingPress/OP600SPII')
        ;
    }

    function OP900A(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 46)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 46) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',46)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/fusingPress/OP900A', compact('questions','machines','products'));
    }

    function OP600FA(){
        return view('product/category/fusingPress/OP600FA')
        ;
    }

    function Feeder(){
        return view('product/category/fusingPress/Feeder')
        ;
    }

    // <*--------  無縫黏合 -----------*>

    function MB9018B(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 33)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 33) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',33)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/seamless/MB9018B', compact('questions','machines','products'));
    }

    function OP114(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 34)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 34) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',34)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/seamless/OP114', compact('questions','machines','products'));
    }

    function OP114S(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 35)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 35) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',35)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/seamless/OP114S', compact('questions','machines','products'));
    }

    function OP701HAS(){
        return view('product/category/seamless/OP701HAS')
        ;
    }

    function OP11403(){
        return view('product/category/seamless/OP11403')
        ;
    }

    function OP11406(){
        return view('product/category/seamless/OP11406')
        ;
    }

    function OP11416(){
        return view('product/category/seamless/OP11416')
        ;
    }

    function OP115(){
        return view('product/category/seamless/OP115')
        ;
    }

    function OP11402(){
        return view('product/category/seamless/OP11402')
        ;
    }

    function OP115CSN(){
        return view('product/category/seamless/OP115CSN')
        ;
    }

    function OP11512T(){
        return view('product/category/seamless/OP11512T')
        ;
    }

    function OP806A(){
        return view('product/category/seamless/OP806A')
        ;
    }



    // <*--------  包裝 -----------*>

    function OFC1(){
        return view('product/category/packaging/OFC1')
        ;
    }

    function OFC450(){
        return view('product/category/packaging/OFC450')
        ;
    }

    function OSZ50(){
        return view('product/category/packaging/OSZ50')
        ;
    }

    function OSZK02(){
        return view('product/category/packaging/OSZK02')
        ;
    }

    function OSZ50X(){
        return view('product/category/packaging/OSZ50X')
        ;
    }

    function OSZ50N(){
        return view('product/category/packaging/OSZ50N')
        ;
    }

    function OSZ50XN(){
        return view('product/category/packaging/OSZ50XN')
        ;
    }
    // <*--------  金屬、重量檢測 -----------*>

    // 成衣
    function ON688CD5(){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 45)
                         ->where('company_ERP_id', $ERPId); // 假設產品ID為1


        // $questions = Question::with('answers')->where('product_id', 1)->get(); //假設產品ID為1

        if ($start_date && $end_date) {
            // 如果提供了開始日期和結束日期，添加日期條件
            $query->whereDate('created_at', '>=', $start_date)
              ->whereDate('created_at', '<=', $end_date);
        }

        if($filter === 'personal'){
            //個人問題
            $questions = Question::with('answers')
                 ->where('member_id', $memberId)
                 ->where('product_id', 45) // 假設產品 I D 為 1
                 ->get();
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',45)
                  ->get();
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->get();
        }

        return view('product/category/needleWeighing/clothing/ON688CD5', compact('questions','machines','products'));
    }

    function OMW600(){
        return view('product/category/needleWeighing/clothing/OMW600')
        ;
    }

    function ON30(){
        return view('product/category/needleWeighing/clothing/ON30')
        ;
    }

    function ON688P(){
        return view('product/category/needleWeighing/clothing/ON688P')
        ;
    }
    //食品
    function CWL300(){
        return view('product/category/needleWeighing/FoodBeverage/CWL300')
        ;
    }
    function MD400(){
        return view('product/category/needleWeighing/FoodBeverage/MD400')
        ;
    }
    function CW150(){
        return view('product/category/needleWeighing/FoodBeverage/CW150')
        ;
    }

    //一般大眾

    function ON003(){
        return view('product/category/needleWeighing/General/ON003')
        ;
    }

    // <*--------  鍋爐 -----------*>

    // 電蒸氣
    function WDR(){
        return view('product/category/Boiler/ElectricSteam/WDR')
        ;
    }
    function LDR(){
        return view('product/category/Boiler/ElectricSteam/LDR')
        ;
    }

    //燃氣

    function WNS(){
        return view('product/category/Boiler/GasFired/WNS')
        ;
    }
    function WNSInternal(){
        return view('product/category/Boiler/GasFired/WNSInternal')
        ;
    }
    function LSS(){
        return view('product/category/Boiler/GasFired/LSS')
        ;
    }
    function CWNS(){
        return view('product/category/Boiler/GasFired/CWNS')
        ;
    }
    function CWNSJ(){
        return view('product/category/Boiler/GasFired/CWNSJ')
        ;
    }

    //燃油

    function Oil_WNSInternal(){
        return view('product/category/Boiler/OilFired/WNSInternal')
        ;
    }
    function Oil_LSS(){
        return view('product/category/Boiler/OilFired/LSS')
        ;
    }
    function Oil_CWNS(){
        return view('product/category/Boiler/OilFired/CWNS')
        ;
    }
    function Oil_CWNSJ(){
        return view('product/category/Boiler/OilFired/CWNSJ')
        ;
    }

    //生物質

    function Bio_WNS(){
        return view('product/category/Boiler/Biomass/WNS')
        ;
    }
    function Bio_LSS(){
        return view('product/category/Boiler/Biomass/LSS')
        ;
    }
    function Bio_LSG(){
        return view('product/category/Boiler/Biomass/LSG')
        ;
    }
    function Bio_DZL(){
        return view('product/category/Boiler/Biomass/DZL')
        ;
    }
    function Bio_SZL(){
        return view('product/category/Boiler/Biomass/SZL')
        ;
    }
    function Bio_BMF(){
        return view('product/category/Boiler/Biomass/BMF')
        ;
    }

    //燃煤

    function Coal_DZL(){
        return view('product/category/Boiler/CoalFired/DZL')
        ;
    }
    function Coal_SZL(){
        return view('product/category/Boiler/CoalFired/SZL')
        ;
    }


    // <*--------  其他機械 -----------*>

    function ON5(){
        return view('product/category/others/ON5')
        ;
    }
    function ONCM(){
        return view('product/category/others/ONCM')
        ;
    }

    function WLS301(){
        return view('product/category/others/WLS301')
        ;
    }
    function OM78(){
        return view('product/category/others/OM78')
        ;
    }
    function OB201L(){
        return view('product/category/others/OB201L')
        ;
    }
    function OP408S(){
        return view('product/category/others/OP408S')
        ;
    }
    function OP747(){
        return view('product/category/others/OP747')
        ;
    }
    function OW40(){
        return view('product/category/others/OW40')
        ;
    }
    function DSFS(){
        return view('product/category/others/DSFS')
        ;
    }
    function OP102A(){
        return view('product/category/others/OP102A')
        ;
    }



}
