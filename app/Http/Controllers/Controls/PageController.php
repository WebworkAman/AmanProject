<?php

namespace App\Http\Controllers\Controls;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{

    function home(){
               
        $pages =[
            [
                "imageUrl" => asset('imgs/1596784113.png')
            ],
            [
                "imageUrl" => asset('imgs/1596784246.png')               
            ]
            ];
                      
    
            
        $page = $pages[0];  

        return view('home',[
            "product" => $product
        ]);
    }
//     function index(){

//         $pages = $this->getPages();

//         return view('/',[
//           "pages" => $pages
//         ]

//         );
          
//   }
    public function show(){


        // $pages = $this -> getPages();
        

        // $index = $id - 1; 
        
        // if($index >= 0 && $index < count($products)){
        //     //show page

        //     $page = $pages[$index];

        //     return view('page.show',[
        //       "page" => $page
        // ]);
        // }else{
        //     //404 not found
            
        //     abort(404);
        // }
    }

    // private function getPages (){
    //     return[
            
    //             [
    //                 "imageUrl" => asset('imgs/1596784113.png')
    //             ],
    //             [
    //                 "imageUrl" => asset('imgs/1596784246.png')               
    //             ]
    
            
    //             ];
    // }
}
