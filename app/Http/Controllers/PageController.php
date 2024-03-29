<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CRM_Product_Series;


class PageController extends Controller
{

    // 首頁

    public function home(){

        // $member = null;

        // if(session()->exists('memberId')){
        //     $member = Member::find(session('memberId'));
        // }

        // return view('home',[
        //     'member' => $member
        // ]);
        // $id = $request->input('id');

        // $pages = $this -> getPages();
        $products = Product::all ();
        $series = CRM_Product_Series::all();



        // return view('home',["pages" => $pages],compact("products"));
        return view('home',compact("products","series"));

    }

    // 產品系列分頁
    public function series($series){

        //根據 $series 參數從數據庫中獲取相應的系列產品數據
        $seriesData = CRM_Product_Series::where('name',$series)->first();
        $seriesId = $seriesData -> id;

        if(!$seriesData){
            abort(404); //如果找不到相對應的系列的話，可以返回404錯誤頁面
        }

        // 獲取該系列的所有產品數據
        $products = Product::where('CRM_Product_Series_id',$seriesId)->get();


        // 返回視圖，並將產品數據遞給視圖
        return view('product.category.series',compact('products','seriesData'));

    }
    public function inspection(){

        $series_id = 1;

        $products = Product::where('CRM_Product_Series_id',$series_id)->get();


        return view('product/category/inspection',compact('products'));
    }

    // function show($id, Request $request){

    //     // $pages = $this -> getPages();

    //     $index = $id - 1;
    //     if($index < 0 || $index >= count($pages)){
    //         //404 not found

    //         abort(404);
    //     }
    //         //show page
    //         $page = $pages[$index];


    //         return view('home',[
    //             "page" => $page
    //         ]);
    // }

        private function getPages (){
        return[

                [
                    "link" => asset('inspection'),
                    "imageUrl" => asset('imgs/1596784113.png'),
                    "sort" => "驗 布",
                    "FAQ-link"=>asset('/FAQ/inspection'),
                    "message"=>""
                ],
                [
                    "link" => asset('relaxing'),
                    "imageUrl" => asset('https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1597907651.png'),
                    "sort" => "鬆 布",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"

                ],
                [
                    "link" => asset('spreading'),
                    "imageUrl" => asset('imgs/1596784246.png'),
                    "sort" => "拉 布",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"

                ],
                [
                    "link" => asset('cutting'),
                    "imageUrl" => asset('imgs/1596784261.png'),
                    "sort" => "裁 剪",
                    "FAQ-link"=>asset('/FAQ/cutting'),
                    "message"=>""
                ],
                [
                    "link" => asset('ironing'),
                    "imageUrl" => asset('imgs/1597889061.png'),
                    "sort" => "整 燙 定 型",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"
                ],
                [
                    "link" => asset('heatTransfer'),
                    "imageUrl" => asset('imgs/1596784303.png'),
                    "sort" => "轉 印",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"
                ],
                [
                    "link" => asset('fusingPress'),
                    "imageUrl" => asset('imgs/1598492647.png'),
                    "sort" => "黏 合",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"
                ],
                [
                    "link" => asset('seamless'),
                    "imageUrl" => asset('imgs/1598492619.png'),
                    "sort" => "無 縫 黏 合",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"
                ],
                [
                    "link" => asset('packaging'),
                    "imageUrl" => asset('imgs/1596784354.png'),
                    "sort" => "包 裝",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"
                ],
                [
                    "link" => asset('needleWeighing'),
                    "imageUrl" => asset('imgs/1621919665.png'),
                    "sort" => "金 屬、重 量 檢 測",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"
                ],
                [
                    "link" => asset('Boiler'),
                    "imageUrl" => asset('imgs/1608539845.png'),
                    "sort" => "鍋 爐",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"
                ],
                [
                    "link" => asset('others'),
                    "imageUrl" => asset('imgs/1596784420.png'),
                    "sort" => "其 它 機 械",
                    "FAQ-link"=>"#",
                    "message"=>"alert('此產品暫無常見問題')"
                ],
                // [
                //     "link" => "/needle",
                //     "imageUrl" => asset('imgs/主題-5.png'),
                //     "sort" => "主 題 系 列",
                //     "FAQ-link"=>"#",
                //     "message"=>"alert('此產品暫無常見問題')"
                // ],
                ];
    }
}

?>
