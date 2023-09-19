<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Product;
use App\Models\Question;
use App\Models\CRM_Machines;

class ProductController extends Controller
{


    //產生視圖
    public function __invoke(Request $request){
        $products = Product::all();

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $machines = CRM_Machines::where('company_ERP_id',$ERPId)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filter = $request->input('filter'); // 獲取用戶選擇的篩選器值

        $query = Question::with('answers')
                         ->where('product_id', 1)
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
                 ->where('product_id', 1) // 假設產品 I D 為 1
                 ->paginate(5);
        }elseif($filter === 'company'){
            //公司問題
            $questions = Question::with('answers')
                  ->where('company_ERP_id', $ERPId)
                  ->where('product_id',1)
                  ->paginate(5);
        }else {
            // 默認情況下顯示所有問題
            $questions = $query->paginate(5);
        }



        return view('product/category/inspection/OC40N02', compact('questions','machines','products'));

        // return view('product/category/inspection/OC40N02')
        // -> with('questions',Question::all());
    }

    function index(){

          $products = $this->getProducts();

          return view('/',[
            "products" => $products
          ]);

    }
    function show($id, Request $request){

        // $id = $request -> input('id');
        // var_dump($id);


        $products = $this -> getProducts();


        $index = $id - 1;

        if($index >= 0 && $index < count($products)){
            //show page

            $product = $products[$index];

            return view('product.show',[
              "product" => $product
        ]);
        }else{
            //404 not found

            abort(404);
        }
    }
    public function showProduct($product_title)
    {
        //從產品名稱查詢
        $product = Product::where('title',$product_title)->first();

        //如果產品不存在，則顯示 404 錯誤訊息
        if(!$product){
            abort(404);
        }

        //取得當前產品的提問資料
        // $questions = $product->questions;

        return view('products.show',['product' => $product]);

    }

    private function getProducts(){
        return[

                [
                    "imageUrl" => asset('imgs/1596784113.png')
                ],
                [
                    "imageUrl" => asset('imgs/1596784246.png')
                ]

                ];
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');

    // 根據關鍵字搜尋產品名稱列表
    $products = Product::where('title', 'like', '%'.$keyword.'%')->get();

    return view('layouts.search-show', ['products' => $products]);
    }

}
