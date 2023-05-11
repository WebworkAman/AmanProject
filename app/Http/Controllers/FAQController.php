<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Message;
use App\Models\FAQ;
use App\Models\Product;


class FAQController extends Controller
{

    public function create()
    {
        $products = Product::all();
        return view('admin.FAQ.create', compact('products'));
    
    }

    public function OC40N02(){
        $faqs = FAQ::where('product_id', 1)->get();
        return view('product.FAQ.inspection.OC40N02', compact('faqs')) ;
    }
    
    public function OC1(){
        $faqs = FAQ::where('product_id', 2)->get();
        return view('product.FAQ.inspection.OC1', compact('faqs')) ;
    }

    public function OC5B(){
        $faqs = FAQ::where('product_id', 3)->get();
        return view('product.FAQ.inspection.OC5B', compact('faqs')) ;
    }
    
    public function OC83(){
        $faqs = FAQ::where('product_id', 4)->get();
        return view('product.FAQ.inspection.OC83', compact('faqs')) ;
    }

    public function create3(){
        return view('product.FAQ.spreading');
    }
    public function create5(){
        return view('product.FAQ.spreading');
    }


    public function TAC(){
        $faqs = FAQ::where('product_id', 18)->get();
        return view('product.FAQ.cutting.TAC', compact('faqs')) ;

    }
    // 管理者
    public function index()
    {
        $faqs = FAQ::all();

        return view('admin.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'question' => 'required|max:255',
            'answer' => 'required',
            
        ]);
        
        $faq = FAQ::create($validatedData);

        return redirect()->route('faqs.index', $faq->id)
            ->with('success', 'Question created successfully.');
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

  
           
         // 檢查是否有先前操控的子頁面表單傳遞回來
         $referer = request()->headers->get('referer');
         if(strpos($referer, 'faq-list') !== false){
            //重定向回 FAQ 列表頁面並帶回原先搜尋表單
            return redirect()->route('faqs.index')->withInput();
        }
    
        return redirect()->route('faqs.index')
            ->with('success', 'FAQ deleted successfully.');
         
    }
}