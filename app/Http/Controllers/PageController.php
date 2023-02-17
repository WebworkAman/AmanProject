<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Member;
// use App\Libraries\MemberAuth;


class PageController extends Controller
{
    public function home(){

        // $member = null;

        // if(session()->exists('memberId')){
        //     $member = Member::find(session('memberId'));
        // }

        // return view('home',[
        //     'member' => $member
        // ]);
        // $id = $request->input('id');
         
        $pages = $this -> getPages();
         
                      
       
        return view('home',[
            "pages" => $pages
        ]);
            
       
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
                    "link" => "/inspection",
                    "imageUrl" => asset('imgs/1596784113.png'),
                    "sort" => "驗 布",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/relaxing",
                    "imageUrl" => asset('https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1597907651.png'),
                    "sort" => "鬆 布",
                    "FAQ-link"=>"/FAQ/inspection"

                ],
                [
                    "link" => "/spreading",
                    "imageUrl" => asset('imgs/1596784246.png'),
                    "sort" => "拉 布",
                    "FAQ-link"=>"/FAQ/inspection"

                ],
                [
                    "link" => "/cutting",
                    "imageUrl" => asset('imgs/1596784261.png'),
                    "sort" => "裁 剪",
                    "FAQ-link"=>"/FAQ/cutting"
                ],
                [
                    "link" => "/ironing",
                    "imageUrl" => asset('imgs/1597889061.png'),
                    "sort" => "整 燙 定 型",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/heatTransfer",
                    "imageUrl" => asset('imgs/1596784303.png'),
                    "sort" => "轉 印",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/fusingPress",
                    "imageUrl" => asset('imgs/1598492647.png'),
                    "sort" => "黏 合",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/seamless",
                    "imageUrl" => asset('imgs/1598492619.png'),
                    "sort" => "無 縫 黏 合",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/folding",
                    "imageUrl" => asset('imgs/1597908117.png'),
                    "sort" => "摺 衣",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/packaging",
                    "imageUrl" => asset('imgs/1596784354.png'),
                    "sort" => "包 裝",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/needle",
                    "imageUrl" => asset('imgs/1621919665.png'),
                    "sort" => "金 屬、重 量 檢 測",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/needle",
                    "imageUrl" => asset('imgs/1608539845.png'),
                    "sort" => "鍋 爐",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/needle",
                    "imageUrl" => asset('imgs/1596784420.png'),
                    "sort" => "其 它 機 械",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                [
                    "link" => "/needle",
                    "imageUrl" => asset('imgs/主題-5.png'),
                    "sort" => "主 題 系 列",
                    "FAQ-link"=>"/FAQ/inspection"
                ],
                ];
    }
}

?>
